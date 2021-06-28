<?php

namespace Bmapi\Interfaces;

/**
 * 斑马力方 配置接口
 * Interface ConfigInterface
 *
 * @package App\Libs\Bmapi\interfaces
 */
interface ConfigInterface
{

    /**
     * 获取APP_KEY
     *
     * @return string
     */
    public function getAppKey();

    /**
     * 获取APP_SECRET
     *
     * @return string
     */
    public function getAppSecret();

    /**
     * 获取ACCESS_TOKEN
     *
     * @return string
     */
    public function getAccessToken();
}
