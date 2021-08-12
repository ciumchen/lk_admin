<?php

namespace App\Admin\Forms;

use App\Admin\Repositories\AssetsLog;
use App\Admin\Repositories\Order;
use App\Models\AssetsType;
use App\Models\CityNode;
use App\Models\IntegralLog;
use App\Models\RebateData;
use App\Models\Setting;
use App\Models\TradeOrder;
use App\Models\User;
use App\Services\AssetsService;
use App\Services\EncourageService;
use Dcat\Admin\Traits\LazyWidget;
use Dcat\Admin\Widgets\Form;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;
use exception;
use App\Models\OrderMobileRechargeDetails;
class ManyMobile extends Form
{
    use LazyWidget;

    // 使用异步加载功能

    /**
     * Handle the form request.
     *
     * @param array $input
     *
     * @return Response
     */
    public function handle(array $input)
    {
        $id = $this->payload[ 'id' ] ?? null;
        if (!$id) {
            return $this->error('ID错误');
        }
//        $remark = $input[ 'remark' ];
        $status = $input[ 'status' ];
        DB::beginTransaction();
        try {
            $data = OrderMobileRechargeDetails::find($id);
            $data->status = $status;
            $data->save();

            DB::commit();
        } catch (\Exception $exception) {
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
//        充值状态:0充值中,1成功,9撤销
        $this->radio('status', '充值状态')
             ->options([
                           0 => '充值中',
                           1 => '充值成功',
                           9 => '充值撤销',
                       ])
             ->default(1)
//             ->when(1, function () {
//                 $this->text('remark', '拒绝原因4')->default('');
//             })
             ->required();
    }

    /**
     * The data of the form.
     *
     * @return array
     */
    public function default()
    {
        return [
            'remark' => '',
        ];
    }


}
