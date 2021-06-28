<?php

namespace Bmapi\Core;

ini_set('date.timezone', 'Etc/GMT-8');

use Bmapi\Conf\Config;
use Bmapi\Interfaces\RequestInterface;
use Exception;

class ApiRequest implements RequestInterface
{
    
    /**
     * 请求地址:
     * 正式环境:
     * HTTP请求地址:http://api.bm001.com/api
     * HTTPS请求地址:https://api.bm001.com/api
     *
     * 测试环境:
     * http://test.api.bm001.com/api
     *
     */
//    const API_HOST = 'https://api.bm001.com/api';
//    const API_HOST = 'http://api.bm001.com/api';
    const API_HOST = 'http://test.api.bm001.com/api';
    
    /**
     * 注册之后从斑马力方客服处获取
     * 在 [Bmapi\conf\Config] 中配置
     *
     * @var string APP_KEY
     */
    protected $app_key;
    
    /**
     * 注册之后从斑马力方客服处获取
     * 在 [Bmapi\Conf\Config] 中配置
     *
     * @var string APP_SECRET
     */
    protected $app_secret;
    
    /**
     * 登录 [http://sale.bm001.com/]
     * 从 [http://sale.bm001.com/testtool/index] 页面获取
     *
     * 在 [Bmapi\Conf\Config] 中配置
     *
     * @var string 授权 Token
     */
    protected $access_token;
    
    /**
     * @var \Bmapi\Conf\Config 配置文件
     */
    protected $config;
    
    /**
     * 接口版本
     *
     * @var string
     */
    protected $version = '1.1';
    
    /**
     * @var string 请求数据格式
     */
    protected $format = 'json';
    
    /**
     * @var array POST需要推送的所有参数
     */
    protected $allPostParams = [];
    
    /**
     * @var string API接口名称
     */
    protected $method;
    
    /**
     * @var mixed 接口返回结果
     */
    protected $result;
    
    /**
     * ApiRequest constructor.
     *
     * @param \Bmapi\Conf\Config|null $config
     */
    public function __construct(Config $config = null)
    {
        if ($config == null) {
            $config = new Config();
        }
        $this->config = $config;
        $this->app_key = $config->getAppKey();
        $this->app_secret = $config->getAppSecret();
        $this->access_token = $config->getAccessToken();
        $this->init();
    }
    
    /**
     * 用于子类初始化
     */
    public function init()
    {
    }
    
    /**
     * 公共参数
     *
     * @return array
     */
    public function commonParams()
    : array
    {
        $common_params = [];
        $common_params[ 'appKey' ] = $this->app_key;
        $common_params[ 'format' ] = $this->format;
        $common_params[ 'method' ] = $this->method;
        $common_params[ 'v' ] = $this->version;
        $common_params[ 'access_token' ] = $this->access_token;
        $common_params[ 'timestamp' ] = self::msectime();
        return $common_params;
    }
    
    /**
     * 接口业务参数
     *
     * @return array
     */
    public function apiParams()
    : array
    {
        return [];
    }
    
    /**
     * 组装推送参数
     *
     * @return \Bmapi\core\ApiRequest
     * @throws \Exception
     */
    public function postParams()
    : object
    {
        $data = array_merge($this->commonParams(), $this->apiParams());
        $data[ 'sign' ] = Sign::generateSign($data, $this->app_secret);
        $this->allPostParams = $data;
        return $this;
    }
    
    /**
     * 回调数据验签
     *
     * @param array $data
     *
     * @return bool
     */
    public function checkSign(array $data)
    {
        try {
            if (empty($data)) {
                throw new Exception('验证数据为空');
            }
            if (!Sign::checkSign($data, $this->app_secret)) {
                throw new Exception('验签失败');
            }
        } catch (Exception $e) {
            return false;
        }
        return true;
    }
    
    /**
     * 解析返回结果
     *
     * @return mixed|null
     */
    public function fetchResult()
    {
        if (empty($this->result)) {
            return null;
        }
        return $this->result;
    }
    
    /**
     * 获取返回结果
     *
     * @return bool|string
     * @throws \Exception
     */
    public function getResult()
    {
        if (empty($this->allPostParams)) {
            $this->postParams();
        }
        $url = $this->generateRequestUrl($this->allPostParams);
        $result = self::postRequest($url, $this->allPostParams);
        $this->result = $result;
        $this->fetchResult();
        return $result;
    }
    
    /**
     * 生成请求带参数链接
     *
     * @param array $data
     *
     * @return string
     */
    public function generateRequestUrl(array $data)
    {
        $url = self::API_HOST . '?';
        foreach ($data as $key => $val) {
            $url .= "$key=" . urlencode($val) . "&";
        }
        return rtrim($url, "&");
    }
    
    /**
     * 当前毫秒数时间戳
     *
     * @return float
     */
    public static function msectime()
    {
        [$usec, $sec] = explode(' ', microtime());
        return (float)sprintf('%.0f', (floatval($usec) + floatval($sec)) * 1000);
    }
    
    /**
     * 发起 post 请求
     *
     * @param string $url  请求链接
     * @param array  $data 推送的数据
     *
     * @return bool|string
     * @throws \Exception
     */
    public static function postRequest($url, $data = [])
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_FAILONERROR, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_0);
        if (strlen($url) > 5 && strtolower(substr($url, 0, 5)) == "https") {
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        }
        // POST数据
        if (is_array($data) && count($data)) {
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        }
        $output = curl_exec($ch);
        if (curl_errno($ch) > 0) {
            throw (new Exception(curl_error($ch)));
        } else {
            $http_status_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
            if (200 !== $http_status_code) {
                throw new Exception($output, $http_status_code);
            }
        }
        curl_close($ch);
        return $output;
    }
}
