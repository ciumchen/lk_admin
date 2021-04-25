<?php

namespace App\Admin\Actions\Grid;

use App\Models\AssetsType;
use App\Models\User;
use App\Models\WithdrawLog;
use Dcat\Admin\Actions\Response;
use Dcat\Admin\Grid\RowAction;
use Dcat\Admin\Traits\HasPermissions;
use EthereumRPC\EthereumRPC;
use ERC20\ERC20;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class ManualWithdraw extends RowAction
{
    /**
     * @return string
     */
	protected $title = '<i class="fa fa-check"> 手动提现</i>';

    /**
     * Handle the action request.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function handle(Request $request)
    {
        $is_lock = Cache::pull('withdraw_log_key_'.$this->getKey());
        if($is_lock == 1)
        {
            return $this->response()->error('请勿重复提交！');
        }
        Cache::put('withdraw_log_key_'.$this->getKey(), 1);
        $withdraw_log = WithdrawLog::lockForUpdate()->find($this->getKey());
        if (!$withdraw_log) {
            Cache::forget('withdraw_log_key_'.$this->getKey());
            return $this->response()->error('提现记录不存在！');
        }

        $user = User::find($withdraw_log->uid);
        if (null === $user) {
            Cache::forget('withdraw_log_key_'.$this->getKey());
            return $this->response()->error('提现用户不存在！');
        }

        //资产类型
        $assets = AssetsType::find($withdraw_log->assets_type_id);

        if(!$assets) {
            Cache::forget('withdraw_log_key_'.$this->getKey());
            return $this->response()->error('错误的资产类型！');
        }

        //先改状态
        $withdraw_log->status = \App\Admin\Repositories\WithdrawLog::STATUS_SUCCESS;
        if(!$withdraw_log->save())
        {
            Cache::forget('withdraw_log_key_'.$this->getKey());
            return $this->response()->error('数据操作失败！');
        }

        //转账
        try{
            //合约地址
            $url_arr = parse_url(env("WITHDRAW_RPC_HOST"));
            //实例化通证
            $geth = new EthereumRPC($url_arr['host'], $url_arr['port']);
            $erc20 = new ERC20($geth);
            $contract_address = $assets->contract_address;
            $token = $erc20->token($contract_address);
            //托管地址（发送方）
            $payer = env('WITHDRAW_ADDRESS');
            //判断余额
            $payer_balance = $token->balanceOf($payer);
            if(bccomp($payer_balance, bcadd($withdraw_log->amount,1000,8), 0) < 0)
            {
                Cache::forget('withdraw_log_key_'.$this->getKey());
                return $this->response()->error('托管账户余额不足！');
            }
            //转账
            $data = $token->encodedTransferData($withdraw_log->address, $withdraw_log->amount);

            $transaction = $geth->personal()->transaction($payer, $contract_address)
                ->amount("0")
                ->data($data);
            $transaction->gas(90000,"0.000000001");
            $txId = $transaction->send(env('WITHDRAW_PASSWORD'));

            if ($txId && strlen($txId) == 66) {
                $withdraw_log->tx_hash = $txId;
                $withdraw_log->save();
            }else{
                Cache::forget('withdraw_log_key_'.$this->getKey());
                return $this->response()->error('转账失败！');
            }
        } catch (\Exception $exception) {
            Cache::forget('withdraw_log_key_'.$this->getKey());
            return $this->response()->error('转账失败！');
        }

        Cache::forget('withdraw_log_key_'.$this->getKey());
        return $this->response()
            ->success('操作成功')
            ->refresh();
    }

    /**
	 * @return string|array|void
	 */
	public function confirm()
	{
		 return ['Confirm?', '确认此操作？'];
	}

    /**
     * @param Model|Authenticatable|HasPermissions|null $user
     *
     * @return bool
     */
    protected function authorize($user): bool
    {
        return true;
    }

    /**
     * @return array
     */
    protected function parameters()
    {
        return [];
    }
}
