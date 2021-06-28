<?php

namespace Bmapi\Api\Air;

use Bmapi\Core\ApiRequest;

/**
 * 查询飞机站点信息列表
 * Class StationsList
 *
 * @package Bmapi\Api\Air
 */
class StationsList extends ApiRequest
{

    /**
     * @var string 接口名称
     */
    protected $method = 'qianmi.elife.air.stations.list';

    /**·
     * @var array 接口参数
     */
    private $paramsKey = [];

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
     * 设置页码
     *
     * @param int $val
     *
     * @return $this
     */
    public function setPageNo($val)
    {
        $this->pageNo = $val;
        return $this;
    }

    /**
     * 设置单页数据条数
     *
     * @param int $val
     *
     * @return $this
     */
    public function setPageSize($val)
    {
        $this->pageSize = $val;
        return $this;
    }

    /**
     * 设置标准商品名称,支持不带特殊字符的模糊匹配
     *
     * @param string $val
     *
     * @return $this
     */
    public function setItemName($val)
    {
        $this->itemName = $val;
        return $this;
    }

    /**
     * @return int
     */
    public function getPageNo()
    {
        return $this->pageNo;
    }

    /**
     * @return int
     */
    public function getPageSize()
    {
        return $this->pageSize;
    }

    /**
     * @return string
     */
    public function getItemName()
    {
        return $this->itemName;
    }
}
