<?php

namespace Bmapi\Interfaces;

interface RequestInterface
{

    /**
     * 获取接口业务参数
     *
     * @return array
     */
    public function apiParams()
    : array;

    /**
     * 获取接口参数
     *
     * @return array
     */
    public function commonParams()
    : array;

    /**
     * 组装推送参数
     *
     * @return $this
     */
    public function postParams()
    : object;
}
