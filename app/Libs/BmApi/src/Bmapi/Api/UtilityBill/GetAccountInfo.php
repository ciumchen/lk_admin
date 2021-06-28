<?php

namespace Bmapi\Api\UtilityBill;

use Bmapi\Core\ApiRequest;
use Exception;

/**
 * 查询水电煤欠费账单
 * 兼容qianmi.elife.directRecharge.lifeRecharge.getAccountInfo接口查询功能
 * Class GetAccountInfo
 *
 * @package App\Libs\BmApi\src\Bmapi\Api\UtilityBill
 */
class GetAccountInfo extends ApiRequest
{
    
    /**
     * @var string API接口名称
     */
    protected $method = 'bm.elife.directRecharge.waterCoal.getAccountInfo';
    
    /**
     * @var String 标准商品编号(页面选择)
     */
    private $itemId;
    
    /**
     * @var String 缴费单标识号（户号或条形码）
     */
    private $account;
    
    /**
     * @var String 缴费项目编号，水费c2670，电费c2680，气费c2681，(属性查询接口中返回的参数cid)
     */
    private $projectId;
    
    /**
     * @var String 缴费单位V编号(属性查询接口中返回的参数itemProps-"type": "BRAND"下的vid)
     */
    private $unitId;
    
    /**
     * @var String 省名称(后面不带"省"，属性查询接口中返回的参数itemProps-"type": "PRVCIN"下的vname)
     */
    private $province;
    
    /**
     * @var String 市名称(后面不带"市"，属性查询接口中返回的参数itemProps-"type": "CITYIN"下的vname)
     */
    private $city;
    
    /**
     * @var String 缴费单位名称(属性查询接口中返回的参数itemProps-"type": "BRAND"下的vname)
     */
    private $unitName;
    
    /**
     * @var String 城市V编号(属性查询接口中返回的参数itemProps-"type": "CITYIN"下的vid)
     */
    private $cityId;
    
    /**
     * @var String 缴费方式：1是条形码 2是户号
     */
    private $modeType;
    
    /**
     * @var String 缴费方式V编号 (属性查询接口中返回的参数itemProps-"type": "SPECIAL"下的vid)
     */
    private $modeId;
    
    /**
     * @var int 查询结果状态1.成功0.失败
     */
    private $status = 0;
    
    /**
     * 返回信息说明：
     * 1.查询数据正常返回：“查询成功”
     * 2.查询完成，未获取账户信息：如“已缴费成功/超过受理期”
     * 3.查询异常：“未查询到用户信息”
     *
     * @var string
     */
    private $message = '';
    
    /**
     * @var array 账单信息
     */
    private $bill = [];
    
    /**
     * @var string[] 接口参数
     */
    private $paramsKey = [
        'itemId',
        'account',
        'projectId',
        'unitId',
        'province',
        'city',
        'unitName',
        'cityId',
        'modeType',
        'modeId',
    ];
    
    /**
     * 接口业务参数
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
        };
        return array_merge(parent::apiParams(), $params);
    }
    
    /**
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
        $this->bill = $result[ 'water_coal_ubqs_response' ][ 'waterCoalBills' ][ 'waterCoalBill' ];
        $this->status = $result[ 'water_coal_ubqs_response' ][ 'status' ];
        $this->message = $result[ 'water_coal_ubqs_response' ][ 'message' ];
        return $this;
    }
    
    /**
     * 获取账单信息
     *
     * @return array
     */
    public function getBill()
    {
        return $this->bill;
    }
    
    /**
     * 获取查询结果状态
     *
     * @return String
     */
    public function getStatus()
    {
        return $this->status;
    }
    
    /**
     * 获取查询结果提示信息
     *
     * @return String
     */
    public function getMessage()
    {
        return $this->message;
    }
    /**************************************************************/
    /**
     * 设置标准商品编号(页面选择)
     *
     * @param string $val
     *
     * @return $this
     */
    public function setItemId($val)
    {
        $this->itemId = $val;
        return $this;
    }
    
    /**
     * 设置缴费单标识号（户号或条形码）
     *
     * @param string $val
     *
     * @return $this
     */
    public function setAccount($val)
    {
        $this->account = $val;
        return $this;
    }
    
    /**
     * 设置缴费项目编号，水费c2670，电费c2680，气费c2681，(属性查询接口中返回的参数cid)
     *
     * @param string $val
     *
     * @return $this
     */
    public function setProjectId($val)
    {
        $this->projectId = $val;
        return $this;
    }
    
    /**
     * 设置缴费单位V编号(属性查询接口中返回的参数itemProps-"type": "BRAND"下的vid)
     *
     * @param string $val
     *
     * @return $this
     */
    public function setUnitId($val)
    {
        $this->unitId = $val;
        return $this;
    }
    
    /**
     * 设置省名称(后面不带"省"，属性查询接口中返回的参数itemProps-"type": "PRVCIN"下的vname)
     *
     * @param string $val
     *
     * @return $this
     */
    public function setProvince($val)
    {
        $this->province = $val;
        return $this;
    }
    
    /**
     * 设置市名称(后面不带"市"，属性查询接口中返回的参数itemProps-"type": "CITYIN"下的vname)
     *
     * @param string $val
     *
     * @return $this
     */
    public function setCity($val)
    {
        $this->city = $val;
        return $this;
    }
    
    /**
     * 设置缴费单位名称(属性查询接口中返回的参数itemProps-"type": "BRAND"下的vname)
     *
     * @param string $val
     *
     * @return $this
     */
    public function setUnitName($val)
    {
        $this->unitName = $val;
        return $this;
    }
    
    /**
     * 设置城市V编号(属性查询接口中返回的参数itemProps-"type": "CITYIN"下的vid)
     *
     * @param string $val
     *
     * @return $this
     */
    public function setCityId($val)
    {
        $this->cityId = $val;
        return $this;
    }
    
    /**
     * 设置缴费方式：1是条形码 2是户号
     *
     * @param string $val
     *
     * @return $this
     */
    public function setModeType($val)
    {
        $this->modeType = $val;
        return $this;
    }
    
    /**
     * 设置缴费方式V编号 (属性查询接口中返回的参数itemProps-"type": "SPECIAL"下的vid)
     *
     * @param string $val
     *
     * @return $this
     */
    public function setModeId($val)
    {
        $this->modeId = $val;
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
    public function getAccount()
    {
        return $this->account;
    }
    
    /**
     * @return String
     */
    public function getProjectId()
    {
        return $this->projectId;
    }
    
    /**
     * @return String
     */
    public function getUnitId()
    {
        return $this->unitId;
    }
    
    /**
     * @return String
     */
    public function getProvince()
    {
        return $this->province;
    }
    
    /**
     * @return String
     */
    public function getCity()
    {
        return $this->city;
    }
    
    /**
     * @return String
     */
    public function getUnitName()
    {
        return $this->unitName;
    }
    
    /**
     * @return String
     */
    public function getCityId()
    {
        return $this->cityId;
    }
    
    /**
     * @return String
     */
    public function getModeType()
    {
        return $this->modeType;
    }
    
    /**
     * @return String
     */
    public function getModeId()
    {
        return $this->modeId;
    }
}
