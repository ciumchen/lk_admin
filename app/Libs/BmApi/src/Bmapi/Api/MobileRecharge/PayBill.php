<?php

namespace Bmapi\Api\MobileRecharge;

use Bmapi\Core\ApiRequest;
use Exception;

/**
 * 话费订单充值
 * Class PayBill
 *
 * @package Bmapi\Api\MobileRecharge
 */
class PayBill extends ApiRequest
{
    
    protected $method = 'bm.elife.recharge.mobile.payBill';
    
    private $paramsKey = [
        'mobileNo',
        'rechargeAmount',
        'outerTid',
        'callback',
        'itemId',
        'payType',
    ];
    
    /**
     * @var string 需要充值的手机号码
     */
    private $mobileNo;
    
    /**
     * @var string 充值金额，需要充值的话费金额，如50、100、200等
     */
    private $rechargeAmount;
    
    /**
     * @var string 外部订单编号
     */
    private $outerTid;
    
    /**
     * 回调url（使用回调前请开通消息服务）
     * 商户成功收到回调之后，返回给平台success字符串。
     * 否则将每一分钟发送回调信息一次，共发送4次,以POST方式发送（回调数据键值对格式）。
     *
     * @var string
     */
    private $callback;
    
    /**
     * @var string 话费充值商品编号，如果传递则使用传递的商品编号进行充值，否则系统自动内部匹配商品
     */
    private $itemId;
    
    /**
     * @var string 运营商类型 联通-UNICOM 移动-MOBILE 电信-TELECOM
     */
    private $payType;
    
    private $bill = [];
    
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
    
    public function fetchResult()
    {
        $result = json_decode($this->result, true);
        if (!is_array($result)) {
            return parent::fetchResult();
        }
        if (array_key_exists('errorToken', $result)) {
            throw new Exception($this->result);
        }
        $this->bill = $result[ 'data' ];
        return $this;
    }
    
    public function getBill()
    {
        return $this->bill;
    }
    
    /*******************************************************/
    public function setMobileNo($val)
    {
        $this->mobileNo = $val;
        return $this;
    }
    
    public function setRechargeAmount($val)
    {
        $this->rechargeAmount = $val;
        return $this;
    }
    
    public function setOuterTid($val)
    {
        $this->outerTid = $val;
        return $this;
    }
    
    public function setCallback($val)
    {
        $this->callback = $val;
        return $this;
    }
    
    public function setItemId($val)
    {
        $this->itemId = $val;
        return $this;
    }
    
    public function setPayType($val)
    {
        $this->payType = $val;
        return $this;
    }
    
    /*******************************************************/
    public function getMobileNo()
    {
        return $this->mobileNo;
    }
    
    public function getRechargeAmount()
    {
        return $this->rechargeAmount;
    }
    
    public function getOuterTid()
    {
        return $this->outerTid;
    }
    
    public function getCallback()
    {
        return $this->callback;
    }
    
    public function getItemId()
    {
        return $this->itemId;
    }
    
    public function getPayType()
    {
        return $this->payType;
    }
}