<?php
/**
 * 云通
 */

namespace App\Libs\Yuntong;

/**
 * @TODO:把账号抽象一个类，然后定义接口,pay类接收账户接口
 * 把账号抽象一个类，然后定义接口,pay类接收账户接口
 */
class Config
{

//    const APP_ID = 'app_d5d748e6d3e04dfe8a'; /* 来客 TODO:上线使用 */
//    const APP_SECRET = 'sk_live_8B06DB8F29F94B20B50F9DCFA4DF904A'; /* 来客 TODO:上线使用 */
    const APP_ID = 'app_2ac357bae1ce441397'; /* 接口测试APP */
    const APP_SECRET = 'sk_live_3a8a4723c00242cc9561'; /* 接口测试APP */
    const API_DOMIAN = 'http://api.foceplay.com';

    protected $appID;
    protected $appSecret;

    public function __construct($appID = '', $appSecret = '')
    {
        $this->appID = $appID ?: self::APP_ID;
        $this->appSecret = $appSecret ?: self::APP_SECRET;
    }


}
