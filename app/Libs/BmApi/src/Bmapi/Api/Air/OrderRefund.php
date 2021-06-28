<?php

namespace Bmapi\Api\Air;

use Bmapi\Core\ApiRequest;

/**
 * 飞机票订单退票
 * Class ItemsList
 * @package Bmapi\Api\Air
 */
class OrderRefund extends ApiRequest
{

    /**
     * @var string 接口名称
     */
    protected $method = 'qianmi.elife.air.order.refund';

    /**
     * @var array 接口参数
     */
    private $paramsKey = [
        'tradeNo',
        'returnType',
        'orderNos',
    ];

    /**
     * @return array
     */
    public function apiParams()
    : array
    {
        $params = [];
        foreach ($this->paramsKey as $k) {
            if (isset($this->$k)) {
                $params[ $k ] = $this->$k;
            }
        };
        return array_merge(parent::apiParams(), $params);
    }

    /**
     * 设置订单主编号
     * @param string $val
     * @return $this
     */
    public function setTradeNo($val)
    {
        $this->tradeNo = $val;
        return $this;
    }

    /**
     * 设置退票类型：3 退票
     * @param int $val
     * @return $this
     */
    public function setReturnType($val)
    {
        $this->returnType = $val;
        return $this;
    }

    /**
     * 设置订单子单编号集合
     * @param string $val
     * @return $this
     */
    public function setOrderNos($val)
    {
        $this->orderNos = $val;
        return $this;
    }

    /**
     * @return int
     */
    public function getTradeNo()
    {
        return $this->tradeNo;
    }

    /**
     * @return string
     */
    public function getReturnType()
    {
        return $this->returnType;
    }

    /**
     * @return string
     */
    public function getOrderNos()
    {
        return $this->orderNos;
    }
}
