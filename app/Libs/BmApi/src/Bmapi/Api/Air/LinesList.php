<?php

namespace Bmapi\Api\Air;

use Bmapi\Core\ApiRequest;

/**
 * 查询航线列表
 * Class LinesList
 *
 * @package Bmapi\Api\Air
 */
class LinesList extends ApiRequest
{

    /**
     * @var string 接口名称
     */
    protected $method = 'qianmi.elife.air.lines.list';

    /**
     * @var array 接口参数
     */
    private $paramsKey = [
        'from',
        'to',
        'date',
        'itemId'
    ];

    /**
     * @return array
     */
    public function apiParams(): array
    {
        $params = [];
        foreach ($this->paramsKey as $k) {
            if (isset($this->$k)) {
                $params[$k] = $this->$k;
            }
        };
        return array_merge(parent::apiParams(), $params);
    }

    /**
     * 设置起飞站点(机场)三字码
     *
     * @param string $val
     *
     * @return $this
     */
    public function setFrom($val)
    {
        $this->from = $val;
        return $this;
    }

    /**
     * 设置目的地站点(机场)三字码
     *
     * @param string $val
     *
     * @return $this
     */
    public function setTo($val)
    {
        $this->to = $val;
        return $this;
    }

    /**
     * @return string
     */
    public function getTo()
    {
        return $this->to;
    }

    /**
     * 设置起飞日期
     *
     * @param string $val
     *
     * @return $this
     */
    public function setDate($val)
    {
        $this->date = $val;
        return $this;
    }

    /**
     * 设置标准商品编号,支持不带特殊字符的模糊匹配
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
     * @return string
     */
    public function getFrom()
    {
        return $this->from;
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
    public function getItemId()
    {
        return $this->itemId;
    }

}
