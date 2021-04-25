<?php

namespace App\Admin\Forms;

use App\Admin\Repositories\AssetsLog;
use App\Models\AssetsType;
use App\Models\WithdrawLog;
use App\Services\AssetsService;
use Dcat\Admin\Traits\LazyWidget;
use Dcat\Admin\Widgets\Form;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;
use exception;

class RefuseWithdraw extends Form
{
    use LazyWidget; // 使用异步加载功能
    /**
     * Handle the form request.
     *
     * @param array $input
     *
     * @return Response
     */
    public function handle(array $input)
    {
        $id = $this->payload['id'] ?? null;
        if(!$id){
            return $this->error('ID错误');
        }
        $remark = $input['remark'];
        DB::beginTransaction();
        try{
            $log = WithdrawLog::lockForUpdate()->find($id);
            if(!$log)
            {
                throw new exception('记录不存在', 500);
            }

            if($log->status != 3)
            {
                throw new exception('记录状态异常', 500);
            }

            $assets = AssetsType::find($log->assets_type_id);
            //给用户加余额
            AssetsService::BalancesChange($log->uid,$assets->id,$assets->assets_name,$log->amount,AssetsLog::OPERATE_TYPE_REFUSE_WITHDRAW,'拒绝用户提现');

            //修改状态
            $log->remark = $remark;
            $log->status = \App\Admin\Repositories\WithdrawLog::STATUS_REFUSED;
            $log->save();

            DB::commit();
        }catch (\Exception $exception)
        {
            DB::rollBack();
            return $this->error($exception->getMessage());
        }
        return $this->location(null, '操作成功');
    }

    /**
     * Build a form here.
     */
    public function form()
    {
        $this->text('remark', '拒绝原因')->default('拒绝提现')->required();
    }

    /**
     * The data of the form.
     *
     * @return array
     */
    public function default()
    {
        return [
            'remark'  => '',
        ];
    }
}
