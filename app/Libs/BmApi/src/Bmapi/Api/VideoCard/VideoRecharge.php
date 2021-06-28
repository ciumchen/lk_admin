<?php

namespace Bmapi\Api\VideoCard;

use Bmapi\Core\ApiRequest;

class VideoRecharge extends ApiRequest
{
    
    /**
     * @var string 接口名称
     */
    protected $method = 'bm.elife.video.card.payBill';
    
    /**
     * 充值账号（手机号），各大视频网站的会员号
     * (如果视频卡商品对接的供货商是S066500，那么account填写手机号)。
     *
     * @var string 充值账号
     */
    private $account;
    
    /**
     * @var string 标准商品编号
     */
    private $itemId;
    
    /**
     * @var string 外部订单编号
     */
    private $outerTid;
    
    /**
     * 回调url
     * （使用回调前请开通消息服务）
     * 商户成功收到回调之后，返回给平台success字符串。
     * 否则将每一分钟发送回调信息一次，共发送4次,以POST方式发送（回调数据键值对格式）。
     *
     * @var string 回调url
     */
    private $callback;
    
    /**
     * @var string[] 参数键名
     */
    private $paramsKey = [
        'account',
        'itemId',
        'outerTid',
        'callback',
    ];
    
    private $bill = [];
    
    /**
     * 接口参数组装
     *
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
        $this->bill = $result[ 'data' ];
        return $this;
    }
    
    /**
     * 获取账单数据
     *
     * @return array
     */
    public function getBill()
    {
        return $this->bill;
    }
    
    /*********************************************/
    public function setAccount($val)
    {
        $this->account = $val;
        return $this;
    }
    
    public function setItemId($val)
    {
        $this->itemId = $val;
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
    
    /*********************************************/
    public function getAccount()
    {
        return $this->account;
    }
    
    public function getItemId()
    {
        return $this->itemId;
    }
    
    public function getOuterTid()
    {
        return $this->outerTid;
    }
    
    public function getCallback()
    {
        return $this->callback;
    }
}
