<?php

namespace Bmapi\Api\Air;

use Bmapi\Core\ApiRequest;

/**
 * 飞机票订单支付
 * Class ItemsList
 * @package Bmapi\Api\Air
 */
class OrderPayBill extends ApiRequest
{

    /**
     * @var string 接口名称
     */
    protected $method = 'qianmi.elife.air.order.payBill';

    /**
     * @var array 接口参数
     */
    private $paramsKey = [
        'seatCode',
        'passagers',
        'itemId',
        'contactName',
        'contactTel',
        'date',
        'from',
        'to',
        'companyCode',
        'flightNo',
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
     * 设置舱位编码
     * @param int $val
     * @return $this
     */
    public function setSeatCode($val)
    {
        $this->seatCode = $val;
        return $this;
    }

    /**
     * 设置乘客信息
     * @param int $val
     * @return $this
     */
    public function setPassagers($val)
    {
        $this->passagers = $val;
        return $this;
    }

    /**
     * 设置飞机票标准商品编号
     * @param string $val
     * @return $this
     */
    public function setItemId($val)
    {
        $this->itemId = $val;
        return $this;
    }

    /**
     * 设置订票联系人
     * @param string $val
     * @return $this
     */
    public function setContactName($val)
    {
        $this->contactName = $val;
        return $this;
    }

    /**
     * 设置联系电话
     * @param string $val
     * @return $this
     */
    public function setContactTel($val)
    {
        $this->contactTel = $val;
        return $this;
    }

    /**
     * 设置出发日期
     * @param string $val
     * @return $this
     */
    public function setDate($val)
    {
        $this->date = $val;
        return $this;
    }

    /**
     * 设置起飞站点(机场)三字码
     * @param string $val
     * @return $this
     */
    public function setFrom($val)
    {
        $this->from = $val;
        return $this;
    }

    /**
     * 设置抵达站点(机场)三字码
     * @param string $val
     * @return $this
     */
    public function setTo($val)
    {
        $this->to = $val;
        return $this;
    }

    /**
     * 设置航空公司编码
     * @param string $val
     * @return $this
     */
    public function setCompanyCode($val)
    {
        $this->companyCode = $val;
        return $this;
    }

    /**
     * 设置航班号
     * @param string $val
     * @return $this
     */
    public function setflightNo($val)
    {
        $this->flightNo = $val;
        return $this;
    }

    /**
     * @return int
     */
    public function getSeatCode()
    {
        return $this->seatCode;
    }

    /**
     * @return int
     */
    public function getPassagers()
    {
        return $this->passagers;
    }

    /**
     * @return string
     */
    public function getItemId()
    {
        return $this->itemId;
    }

    /**
     * @return string
     */
    public function getContactName()
    {
        return $this->contactName;
    }

    /**
     * @return string
     */
    public function getContactTel()
    {
        return $this->contactTel;
    }

    /**
     * @return string
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @return string
     */
    public function getFrom()
    {
        return $this->from;
    }

    /**
     * @return string
     */
    public function getTo()
    {
        return $this->to;
    }

    /**
     * @return string
     */
    public function getCompanyCode()
    {
        return $this->companyCode;
    }

    /**
     * @return string
     */
    public function getFlightNo()
    {
        return $this->flightNo;
    }
}
