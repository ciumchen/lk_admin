<?php

namespace App\Services\ShowApi;

use Bmapi\Api\BmOrder\OrderList;

class BmOrderService extends CommonService
{
    public function getList()
    {
        try {
            $OrderList = new OrderList();
        } catch (\Exception $e) {
        }
    }
}