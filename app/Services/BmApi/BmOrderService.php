<?php

namespace App\Services\BmApi;

use App\Models\BmRechargeOrder;
use Bmapi\Api\BmOrder\OrderList;

class BmOrderService
{
    public function getOrderLists($date, $page = 0, $pageSize = 10)
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
        } catch (\Exception $e) {
            throw $e;
        }
        return $list;
    }
    
    public function saveOrderList($list)
    {
        $BmRechargeOrder = new BmRechargeOrder();
        foreach ($list as $row) {
            try {
                $BmRechargeOrder->rechargeAccount = $row[ 'rechargeAccount' ];
                $BmRechargeOrder->saleAmount = $row[ 'saleAmount' ];
                $BmRechargeOrder->orderProfit = $row[ 'orderProfit' ];
                $BmRechargeOrder->orderTime = $row[ 'orderTime' ];
                $BmRechargeOrder->operateTime = $row[ 'operateTime' ];
                $BmRechargeOrder->payState = $row[ 'payState' ];
                $BmRechargeOrder->rechargeState = $row[ 'rechargeState' ];
                $BmRechargeOrder->classType = $row[ 'classType' ];
                $BmRechargeOrder->itemCost = $row[ 'itemCost' ];
                $BmRechargeOrder->orderCost = $row[ 'orderCost' ];
                $BmRechargeOrder->facePrice = $row[ 'facePrice' ];
                $BmRechargeOrder->revokeMessage = $row[ 'revokeMessage' ];
                $BmRechargeOrder->billId = $row[ 'billId' ];
                $BmRechargeOrder->itemNum = $row[ 'itemNum' ];
                $BmRechargeOrder->itemName = $row[ 'itemName' ];
                $BmRechargeOrder->supUserId = $row[ 'supUserId' ];
                $BmRechargeOrder->orderTimeFull = $row[ 'orderTimeFull' ];
                $BmRechargeOrder->save();
            } catch (\Exception $e) {
            }
        }
    }
    
    public function addOrders($date)
    {
        try {
            $page = 0;
            $pageSize = 10;
            do {
                $this->getOrderLists($date, $page, $pageSize);
                $offset = '';
            } while ($offset);
        } catch (\Exception $e) {
        }
    }
}
