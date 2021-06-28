<?php

namespace App\Services;

use App\Models\Order;
use App\Models\UserMessage;
use App\Services\ShowApi\VideoOrderService;
use Exception;

class UserMsgService
{
    
    /**
     * Description:万维视频消息
     *
     * @param  int                     $order_id
     * @param  array                   $data
     * @param  \App\Models\Order|null  $Order
     *
     * @throws \Exception
     * @author lidong<947714443@qq.com>
     * @date   2021/6/23 0023
     */
    public function sendWanWeiVideoMsg($order_id, $data, Order $Order = null)
    {
        if (empty($Order)) {
            $Order = Order::find($order_id);
        }
        $description = (new OrderService())->getDescription($order_id, $Order);
        try {
            /* 更新充值记录 */
            $VideoOrderService = new VideoOrderService();
            $VideoOrderService->updateRechargeLogs($data, $description);
            /* 插入消息 */
            $UserMsg = new UserMessage();
            $UserMsg->setVideoMsg($order_id, $Order);
        } catch (Exception $e) {
            throw $e;
        }
    }
}
