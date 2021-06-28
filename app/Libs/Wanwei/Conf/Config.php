<?php

namespace Wanwei\Conf;

/**
 * Description:万维易源接口配置
 *
 * Class Config
 *
 * @package Wanwei\Conf
 * @author  lidong<947714443@qq.com>
 * @date    2021/6/21 0021
 */
class Config
{
    
    const APP_ID   = '681142';
//    const APP_ID   = '682548';
    
    const APP_SIGN = '3caeab0540a94f8995f6e40ac70395de';
//    const APP_SIGN = 'b834612ee91548f6adbdc4f7f3b465b8';
    
    const API_URL  = 'https://route.showapi.com';
    
    public function getAppId()
    {
        return self::APP_ID;
    }
    
    public function getAppSign()
    {
        return self::APP_SIGN;
    }
    
    public function getApiUrl()
    {
        return self::API_URL;
    }
}
