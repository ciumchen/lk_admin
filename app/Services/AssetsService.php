<?php
/**
 * Created by PhpStorm.
 * User: woshi
 * Date: 2018/12/26
 * Time: 17:31
 */

namespace App\Services;

use App\Models\Asset;

use App\Models\AssetsLog;
use App\Models\AssetsType;
use App\Models\FreezeLog;
use Exception;
use Illuminate\Support\Facades\DB;

class AssetsService
{
    /**
     * 获取指定资产余额
     * @param int $uid
     * @param int $assets_id
     * @return float|mixed|null
     */
    public static function getBalance(int $uid, int $assets_id)
    {
        return self::getBalanceData($uid, $assets_id)->amount ?? null;
    }

    /**获取余额orm
     * @param int $uid
     * @param int $assets_id
     * @return Asset
     */
    public static function getBalanceData(int $uid, int $assets_id)
    {
        $data = Asset::where('uid', $uid)
            ->where('assets_type_id', $assets_id)
            ->lockForUpdate()
            ->first();

        if (!$data) {
            //获取资产类型
            $assets = AssetsType::find($assets_id);
            if($assets)
            {
                $data = new Asset();
                $data->uid = $uid;
                $data->assets_type_id = $assets_id;
                $data->assets_name = $assets->assets_name;
                $data->amount = 0;
                $data->freeze_amount = 0;
                $data->save();
            }
        }
        return $data;
    }

    /**
     * 新的资产变动方法
     * @param int $uid
     * @param int $assets_id
     * @param string $assets_name
     * @param float $amount
     * @param string $operate_type
     * @param null $remark
     * @param null $tx_hash
     * @param null $transaction_id
     * @param null $trade_type
     * @return int
     * @throws exception
     */
    public static function BalancesChange($orderNo,int $uid, int $assets_id, string $assets_name,$amount, string $operate_type, $remark = null,$tx_hash = null,$trade_type=null)
    {
        $info = self::changeWithoutLog($uid, $assets_id, $amount,$trade_type);
        //写入日志
        $balancesLogs = new AssetsLog();
        $balancesLogs->assets_type_id = $assets_id;
        $balancesLogs->assets_name = $assets_name;
        $balancesLogs->uid = $uid;
        $balancesLogs->operate_type = $operate_type;
        $balancesLogs->amount = $amount;
        $balancesLogs->amount_before_change = $info['amount_before_change'];
        $balancesLogs->tx_hash = $tx_hash;
        $balancesLogs->ip = request()->server('HTTP_ALI_CDN_REAL_IP', request()->ip());
        $balancesLogs->user_agent = isset($_SERVER['HTTP_USER_AGENT']) ? mb_substr($_SERVER['HTTP_USER_AGENT'],0,255,'utf-8') : '';
        $balancesLogs->remark = $remark;
        $balancesLogs->order_no = $orderNo;
        $balancesLogs->save();
        return $balancesLogs->id;
    }

    /**
     * 改变余额不写日志
     * @param int $uid
     * @param int $assets_id
     * @param NULL $trade_type
     * @param float $amount
     * @return float|mixed
     * @throws exception
     */
    public static function changeWithoutLog(int $uid, int $assets_id,$amount,$trade_type=null)
    {

        //当前余额
        $assets = self::getBalanceData($uid, $assets_id);
        $amount_before_change = $assets->amount;
        $amount_after_change = bcadd($amount_before_change, $amount, 18);

        //如果是扣除操作，结果小于0则报错
        if (bccomp($amount, 0, 18) < 0) {
            if (bccomp($amount_after_change, 0, 18) < 0) {
                throw new Exception('余额不足', 175);
            }
        }
        $assets->amount = $amount_after_change;
        $assets->save();
        return ['amount_before_change' => $amount_before_change, 'amount_after_change' => $amount_after_change];
    }

    /**
     * 根据名字和主网类型获取资产类型
     * @param $assets_name
     * @param $net_type
     * @return bool|mixed
     */
    public static function getAssetsTypeByNameAndNet($assets_name,$net_type = null)
    {
        $assets_type = AssetsType::where("assets_name",$assets_name)
            ->first();
        if(empty($assets_type))
        {
            return  false;
        }
        return $assets_type;
    }

    /**冻结余额操作
     * @param int $uid
     * @param int $assets_id
     * @param string $assets_name
     * @param $amount
     * @param string $operate_type
     * @param string $remark
     * @throws Exception
     */
    public static function freezeChange(int $uid, int $assets_id, string $assets_name, $amount, string $operate_type, string $remark){
        //当前余额
        $freeze_assets = self::getBalanceData($uid, $assets_id);
        $freeze_amount_before_change = $freeze_assets->freeze_amount;
        $freeze_amount_after_change = bcadd($freeze_amount_before_change, $amount, 18);
        //如果是扣除操作，结果小于0则报错
        if (bccomp($amount, 0, 6) < 0) {
            if (bccomp($freeze_amount_after_change, 0, 6) < 0) {
                throw new Exception("uid:{$uid} {$freeze_assets->name }冻结余额异常" . $freeze_amount_after_change, 175);
            }
        }
        $freeze_assets->freeze_amount = $freeze_amount_after_change;
        $freeze_assets->save();
        //写入冻结日志
        $freeze = new FreezeLog();
        $freeze->uid = $uid;
        $freeze->assets_type_id = $assets_id;
        $freeze->assets_name = $assets_name;
        $freeze->amount = $amount;
        $freeze->amount_before_change = $freeze_amount_before_change;
        $freeze->operate_type = $operate_type;
        $freeze->ip = request()->server('HTTP_ALI_CDN_REAL_IP', request()->ip());
        $freeze->user_agent = isset($_SERVER['HTTP_USER_AGENT']) ? mb_substr($_SERVER['HTTP_USER_AGENT'], 0, 255, 'utf-8') : '';
        $freeze->assets_type_id = $assets_id;
        $freeze->remark = $remark;
        $freeze->save();
    }
}
