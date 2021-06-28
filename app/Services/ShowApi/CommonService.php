<?php

namespace App\Services\ShowApi;

use App\Models\RechargeLogs;
use Exception;
use Illuminate\Support\Facades\Log;

class CommonService
{
    
    /**
     * Description:
     *
     * @param  array   $data  订单信息获取
     * @param  string  $type  类型
     *
     * @author lidong<947714443@qq.com>
     * @date   2021/6/23 0023
     */
    public function updateRechargeLogs($data, $type)
    {
        try {
            $rechargeLogs = new RechargeLogs();
            $recharge = $rechargeLogs->where('reorder_id', '=', $data[ 'sys_order_id' ])
                                     ->first();
            if (!empty($recharge)) {
                $recharge->created_at = date("Y-m-d H:i:s");
                $recharge->updated_at = date("Y-m-d H:i:s");
                $recharge->save();
            } else {
                $recharge = $rechargeLogs;
                $recharge->reorder_id = $data[ 'sys_order_id' ];
                $recharge->order_no = $data[ 'order_id' ];
                $recharge->type = $type;
                $recharge->status = 1;
                $recharge->created_at = date("Y-m-d H:i:s");
                $recharge->updated_at = date("Y-m-d H:i:s");
                $recharge->save();
            }
        } catch (Exception $e) {
            Log::debug('WanWeiUpdateRechargeLogs', [json_encode($data)]);
            throw $e;
        }
        return $recharge;
    }
}
