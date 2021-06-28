<?php

namespace Bmapi\Conf;

use Bmapi\Interfaces\ConfigInterface;

/**
 * 斑马力方 接口配置文档
 * Class Config
 *
 * @package Bmapi\Conf
 */
class Config implements ConfigInterface
{

    const APP_KEY      = '10002911';

    const APP_SECRET   = 'oBfoIUjgyTREH5c70qeAueUXgAoZT0AW';

    const ACCESS_TOKEN = '2dd520ba581a4db5a3fcbd074e19d618';

    /**
     * 获取 APP_KEY
     *
     * @return string
     */
    public function getAppKey()
    {
        return self::APP_KEY;
    }

    /**
     * 获取 ACCESS_TOKEN
     *
     * @return string
     */
    public function getAccessToken()
    {
        return self::ACCESS_TOKEN;
    }

    /**
     * 获取 APP_SECRET
     *
     * @return string
     */
    public function getAppSecret()
    {
        return self::APP_SECRET;
    }
}
