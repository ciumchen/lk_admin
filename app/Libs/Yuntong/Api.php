<?php

namespace App\Libs\Yuntong;

trait Api
{

    /**
     * @var string 订单支付接口
     */
    private $pay_api = '/v2/pay';

    /**
     * @var string 订单查询接口
     */
    private $query_api = '/v2/query';

    /**
     * @var string 订单退款接口
     */
    private $refund_api = '/v2/refund';


}
