<?php

namespace App\Admin\Actions\Grid;

use App\Admin\Repositories\Order;
use App\Models\OrderVideo;
use App\Models\RechargeLogs;
use App\Services\ShowApi\VideoOrderService;
use App\Services\UserMsgService;
use Dcat\Admin\Actions\Response;
use Dcat\Admin\Grid\RowAction;
use Dcat\Admin\Traits\HasPermissions;
use Exception;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReGetCard extends RowAction
{
    protected $model;
    
    /**
     * @return string
     */
    protected $title = '<i class="fa  fa-send-o"> 补发卡密</i>';
    
    /**
     * Handle the action request.
     *
     * @param  Request  $request
     *
     * @return Response
     * @throws \Throwable
     */
    public function handle(Request $request)
    : Response {
        $order_video_id = $this->getKey();
        DB::beginTransaction();
        try {
            $OrderVideo = OrderVideo::find($order_video_id);
            if (empty($OrderVideo)) {
                throw new Exception('订单信息不存在');
            }
            $Order = $OrderVideo->orders;
            if ($Order->pay_status != Order::PAY_STATUS_SUCCEEDED) {
                throw new Exception('订单未支付不可补发');
            }
            /* 获取卡密 */
            $VideoService = new VideoOrderService();
            $VideoService->recharge($Order->id, $Order);
            /* 发送消息 */
            $RechageLogs = RechargeLogs::where('order_no', '=', $Order->order_no)->first();
            $data = ['sys_order_id' => $RechageLogs->reorder_id ?? '', 'order_id' => $Order->order_no ?? ''];
            $UserMsgService = new UserMsgService();
            $UserMsgService->sendWanWeiVideoMsg($Order->id, $data, $Order);
        } catch (Exception $e) {
            DB::rollBack();
            throw $e;
            $this->response()->error($e->getMessage());
        }
        DB::commit();
        return $this->response()
                    ->success('卡密补发成功')
                    ->refresh();
    }
    
    /**
     * @return string|void
     */
    protected function href()
    {
        // return admin_url('auth/users');
    }
    
    /**
     * @return string|array|void
     */
    public function confirm()
    {
        return '确认补发该订单卡密？';
    }
    
    /**
     * @param  Model|Authenticatable|HasPermissions|null  $user
     *
     * @return bool
     */
    protected function authorize($user)
    : bool {
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
