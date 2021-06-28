<?php

namespace Bmapi\Api\UtilityBill;

use Bmapi\Core\ApiRequest;
use Exception;

/**
 * 查询水电煤标准商品属性列表
 *
 * 查询指定单一水电煤商品的所有标准属性
 * Class ItemPropsList
 *
 * @package Bmapi\Api\UtilityBill
 */
class ItemPropsList extends ApiRequest
{
    
    /**
     * @var string 接口名称
     */
    protected $method = 'bm.elife.directRecharge.waterCoal.item.props.list';
    
    /**
     * @var int 水电煤标准商品编号，由查询商品接口返回
     */
    private $itemId;
    
    /**
     * @var array
     */
    private $list = [];
    
    /**
     * @var string 所在标准类目编号（公共事业商品即缴费类型projectId）
     */
    private $cid;
    
    /**
     * @return array 接口业务参数
     */
    public function apiParams()
    : array
    {
        $data = [];
        if (!empty($this->itemId) && is_numeric($this->itemId)) {
            $data[ 'itemId' ] = $this->itemId;
        }
        return array_merge(parent::apiParams(), $data);
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
        $this->list = $result[ 'item_props_list_response' ][ 'itemProps' ][ 'itemProp' ];
        $this->cid = $result[ 'item_props_list_response' ][ 'cid' ];
        return $this;
    }
    
    /**
     * 设置需要查询的商品编号
     *
     * @param int $val 商品编号 查询[水电煤类标准商品列表] 获得
     *
     * @return $this
     */
    public function setItemId(int $val)
    {
        $this->itemId = $val;
        return $this;
    }
    
    /**
     * @throws \Exception
     */
    public function getNextParams()
    {
        if (empty($this->list)) {
            throw new Exception('未获取到属性信息');
        }
        $data = [];
        foreach ($this->list as $row) {
            switch ($row[ 'type' ]) {
                case 'CITYIN':
                    $data[ 'city' ] = $row[ 'vname' ];
                    $data[ 'city_id' ] = $row[ 'vid' ];
                    break;
                case 'SPECIAL':
                    $data[ 'mode_id' ] = $row[ 'vid' ];
                    break;
                case 'PRVCIN':
                    $data[ 'province' ] = $row[ 'vname' ];
                    break;
                case 'BRAND':
                    $data[ 'unit_id' ] = $row[ 'vid' ];
                    $data[ 'unit_name' ] = $row[ 'vname' ];
                    break;
                default:
                    ;
            }
        }
        return $data;
    }
    
    /**
     * @return array 结果返回的列表
     */
    public function getList()
    {
        return $this->list;
    }
    
    /**
     * @return string 结果返回所在标准类目编号（公共事业商品即缴费类型projectId）
     */
    public function getCid()
    {
        return $this->cid;
    }
}
