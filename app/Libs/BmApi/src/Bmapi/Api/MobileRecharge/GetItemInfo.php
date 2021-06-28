<?php

namespace Bmapi\Api\MobileRecharge;

use Bmapi\Core\ApiRequest;
use Exception;

/**
 * 查询单个话费直充商品
 * Class GetItemInfo
 *
 * @package Bmapi\Api\MobileRecharge
 */
class GetItemInfo extends ApiRequest
{
    
    protected $method = 'bm.elife.recharge.mobile.getItemInfo';
    
    /**
     * @var string 需要充值的手机号码
     */
    private $mobileNo;
    
    /**
     * @var string 正整数，例如20、50、100等面值
     */
    private $rechargeAmount;
    
    /**
     * @var string 运营商类型 联通-UNICOM 移动-MOBILE 电信-TELECOM
     */
    private $payType;
    
    /**
     * @var array 接口参数
     */
    private $paramsKey = [
        'mobileNo',
        'rechargeAmount',
        'payType',
    ];
    
    /**
     * @var array
     */
    private $itemInfo = [];
    
    public function apiParams()
    : array
    {
        $params = [];
        foreach ($this->paramsKey as $k) {
            if (isset($this->$k)) {
                $params[ $k ] = $this->$k;
            }
        }
        return array_merge(parent::apiParams(), $params);
    }
    
    /**
     * 结果解析
     *
     * @return $this|mixed|null
     * @throws \Exception
     */
    public function fetchResult()
    {
        $result = json_decode($this->result, true);
        if (!is_array($result)) {
            return parent::fetchResult();
        }
        if (array_key_exists('errorToken', $result)) {
            throw new Exception($this->result);
        }
        $this->itemInfo = $result[ 'data' ];
        return $this;
    }
    
    /**
     * 获取查询信息
     *
     * @return array
     */
    public function getItemInfo()
    {
        return $this->itemInfo;
    }
    
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
    
    public function setPayType($val)
    {
        $this->payType = $val;
        return $this;
    }
    
    public function getMobileNo($val)
    {
        return $this->mobileNo;
    }
    
    public function getRechargeAmount($val)
    {
        return $this->rechargeAmount;
    }
    
    public function getPayType($val)
    {
        return $this->payType;
    }
}
