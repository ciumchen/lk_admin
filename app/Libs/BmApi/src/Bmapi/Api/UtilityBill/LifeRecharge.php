<?php

namespace Bmapi\Api\UtilityBill;

use Bmapi\Core\ApiRequest;
use Exception;

class LifeRecharge extends ApiRequest
{
    
    /**
     * @var string 接口名称
     */
    protected $method = 'bm.elife.directRecharge.lifeRecharge.payBill';
    
    /**
     * @var String 商品编号
     */
    private $itemId;
    
    /**
     * 费用
     * 支持两位小数
     * 判断预付费后付费（prepaidFlag）：
     * 预付费单位缴费金额大于等于欠费金额，且最低缴费金额为10元 ，
     * 后付费单位缴费金额必须等于查到的欠费金额，缴费服务时段8：00-22：00
     *
     * @var String 费用
     */
    private $itemNum;
    
    /**
     * @var String 缴费账号
     */
    private $rechargeAccount;
    
    /**
     * @var String 用户名
     */
    private $customerName;
    
    /**
     * @var String 用户地址
     */
    private $customerAddress;
    
    /**
     * 账期
     * 查询账户信息若有返回（billCycle字段）则必须要传入，否则充值失败
     *
     * @var String
     */
    private $billCycle;
    
    /**
     * @var String 合同号，查询账户信息若有返回，则必须要传入
     */
    private $contractNo;
    
    /**
     * @var String 外部订单编号
     */
    private $outerTid;
    
    /**
     * 回调url
     * （使用回调前请开通消息服务）
     * 商户成功收到回调之后，返回给平台success字符串。
     * 否则将每一分钟发送回调信息一次，共发送4次,以POST方式发送（回调数据键值对格式）。
     *
     * @var String
     */
    private $callback;
    
    /**
     * 账期标识
     * 查询账户信息若有返回（contentId字段）则必须要传入
     *
     * @var String
     */
    private $contentId;
    
    /**
     * 扩展字段
     * 查询账户信息若有返回（item4字段）则必须要传入
     *
     * @var String
     */
    private $item4;
    
    /**
     * 充值结果
     *
     * @var array|null
     */
    private $data = null;
    
    /**
     * @var string[] 接口参数键名
     */
    private $paramsKey = [
        'itemId',
        'itemNum',
        'rechargeAccount',
        'customerName',
        'customerAddress',
        'billCycle',
        'contractNo',
        'outerTid',
        'callback',
        'contentId',
        'item4',
    ];
    
    /**
     * 业务参数处理
     *
     * @return array 接口业务参数
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
        $this->data = $result[ 'data' ];
        return $this;
    }
    
    /**
     * 获取结果数据
     *
     * @return array|null
     */
    public function getData()
    {
        return $this->data;
    }
    
    /************************************************/
    /**
     * @param $val
     *
     * @return $this
     */
    public function setItemId($val)
    {
        $this->itemId = $val;
        return $this;
    }
    
    /**
     * @param $val
     *
     * @return $this
     */
    public function setItemNum($val)
    {
        $this->itemNum = $val;
        return $this;
    }
    
    /**
     * @param $val
     *
     * @return $this
     */
    public function setRechargeAccount($val)
    {
        $this->rechargeAccount = $val;
        return $this;
    }
    
    /**
     * @param $val
     *
     * @return $this
     */
    public function setCustomerName($val)
    {
        $this->customerName = $val;
        return $this;
    }
    
    /**
     * @param $val
     *
     * @return $this
     */
    public function setCustomerAddress($val)
    {
        $this->customerAddress = $val;
        return $this;
    }
    
    /**
     * @param $val
     *
     * @return $this
     */
    public function setBillCycle($val)
    {
        $this->billCycle = $val;
        return $this;
    }
    
    /**
     * @param $val
     *
     * @return $this
     */
    public function setContractNo($val)
    {
        $this->contractNo = $val;
        return $this;
    }
    
    /**
     * @param $val
     *
     * @return $this
     */
    public function setOuterTid($val)
    {
        $this->outerTid = $val;
        return $this;
    }
    
    /**
     * @param $val
     *
     * @return $this
     */
    public function setCallback($val)
    {
        $this->callback = $val;
        return $this;
    }
    
    /**
     * @param $val
     *
     * @return $this
     */
    public function setContentId($val)
    {
        $this->contentId = $val;
        return $this;
    }
    
    /**
     * @param $val
     *
     * @return $this
     */
    public function setItem4($val)
    {
        $this->item4 = $val;
        return $this;
    }
    
    /**
     * @return String
     */
    public function getItemId()
    {
        return $this->itemId;
    }
    
    /**
     * @return String
     */
    public function getItemNum()
    {
        return $this->itemNum;
    }
    
    /**
     * @return String
     */
    public function getRechargeAccount()
    {
        return $this->rechargeAccount;
    }
    
    /**
     * @return String
     */
    public function getCustomerName()
    {
        return $this->customerName;
    }
    
    /**
     * @return String
     */
    public function getCustomerAddress()
    {
        return $this->customerAddress;
    }
    
    /**
     * @return String
     */
    public function getBillCycle()
    {
        return $this->billCycle;
    }
    
    /**
     * @return String
     */
    public function getContractNo()
    {
        return $this->contractNo;
    }
    
    /**
     * @return String
     */
    public function getOuterTid()
    {
        return $this->outerTid;
    }
    
    /**
     * @return String
     */
    public function getCallback()
    {
        return $this->callback;
    }
    
    /**
     * @return String
     */
    public function getContentId()
    {
        return $this->contentId;
    }
    
    /**
     * @return String
     */
    public function getItem4()
    {
        return $this->item4;
    }
}
