<?php

namespace App\Services\BmApi;

use App\Models\BmRechargeOrder;
use Bmapi\Api\BmOrder\OrderList;
use Illuminate\Support\Facades\Log;

class BmOrderService
{
    /**
     * Description: 获取接口列表
     *
     * @param  string  $date
     * @param  int     $page
     * @param  int     $pageSize
     * @param  int     $total
     *
     * @return array
     * @throws \Exception
     * @author lidong<947714443@qq.com>
     * @date   2021/8/18 0018
     */
    public function getOrderLists($date, $page = 0, $pageSize = 10, &$total = 0)
    {
        try {
            $date = empty($date) ? date('Y-m-d', strtotime('-1 days')) : $date;
            $page = intval($page) < 0 ? 0 : intval($page);
            $pageSize = intval($pageSize) < 1 ? 10 : intval($pageSize);
            $OrderList = new OrderList();
            $OrderList->setPageNo($page)
                      ->setPageSize($pageSize)
                      ->setOrderTime($date)
                      ->getResult();
            $list = $OrderList->getLists();
            $total = $OrderList->getTotalCount();
        } catch (\Exception $e) {
            throw $e;
        }
        return $list;
    }
    
    /**
     * Description:
     *
     * @param  array  $list
     *
     * @author lidong<947714443@qq.com>
     * @date   2021/8/18 0018
     */
    public function saveOrderList($list)
    {
        foreach ($list as $row) {
            try {
                $BmRechargeOrder = new BmRechargeOrder();
                $BmRechargeOrder->rechargeAccount = $row[ 'rechargeAccount' ] ?? '';
                $BmRechargeOrder->saleAmount = $row[ 'saleAmount' ] ?? 0;
                $BmRechargeOrder->orderProfit = $row[ 'orderProfit' ] ?? 0;
                $BmRechargeOrder->orderTime = $row[ 'orderTime' ] ? date(
                    'Y-m-d H:i:s',
                    strtotime(date('Y-', strtotime($row[ 'operateTime' ])).$row[ 'orderTime' ])
                ) : null;
                $BmRechargeOrder->operateTime = $row[ 'operateTime' ] ? date(
                    'Y-m-d H:i:s',
                    strtotime($row[ 'operateTime' ])
                ) : null;
                $BmRechargeOrder->payState = $row[ 'payState' ] ?? 0;
                $BmRechargeOrder->rechargeState = $row[ 'rechargeState' ] ?? 0;
                $BmRechargeOrder->classType = $row[ 'classType' ] ?? 0;
                $BmRechargeOrder->itemCost = $row[ 'itemCost' ] ?? 0;
                $BmRechargeOrder->orderCost = $row[ 'orderCost' ] ?? 0;
                $BmRechargeOrder->facePrice = $row[ 'facePrice' ] ?? 0;
                $BmRechargeOrder->revokeMessage = $row[ 'revokeMessage' ];
                $BmRechargeOrder->billId = $row[ 'billId' ] ?? '';
                $BmRechargeOrder->itemNum = $row[ 'itemNum' ] ?? 0;
                $BmRechargeOrder->itemName = $row[ 'itemName' ] ?? '';
                $BmRechargeOrder->supUserId = $row[ 'supUserId' ] ?? '';
                $BmRechargeOrder->orderTimeFull = $row[ 'orderTimeFull' ];
                $BmRechargeOrder->save();
            } catch (\Exception $e) {
                Log::debug('BmOrderSaveError:'.$e->getMessage(), []);
                echo "订单号：".$row[ 'billId' ]."保存失败 \n ";
            }
        }
    }
    
    /**
     * Description:
     *
     * @param  string  $date
     *
     * @author lidong<947714443@qq.com>
     * @date   2021/8/18 0018
     */
    public function addOrders($date)
    {
        try {
            set_time_limit(0);
            $page = 0;
            $pageSize = 10;
            $total = 0;
            do {
                $list = $this->getOrderLists($date, $page, $pageSize, $total);
                $this->saveOrderList($list);
                $offset = ($page + 1) * $pageSize;
                $page++;
                dump("\$page = ".$page);
                dump("\$pageSize = ".$pageSize);
                dump("\$total = ".$total);
                dump("\$offset = ".$offset);
                dump("------");
                sleep(5);
            } while ($offset < $total);
        } catch (\Exception $e) {
            Log::debug('BmOrderSearchError:'.$e->getMessage());
            echo $e->getMessage()."\n ";
        }
    }
}
