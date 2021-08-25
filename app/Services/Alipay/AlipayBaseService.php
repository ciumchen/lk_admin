<?php

namespace App\Services\Alipay;

use AlipayAop\AopCertClient;
use AlipayAop\AopClient;
use Exception;
use Illuminate\Support\Facades\Log;

class AlipayBaseService
{
    /**
     * WEB网页跳转授权URL
     */
    const ALIPAY_WEB_OPEN_URL = 'https://openauth.alipay.com/oauth2/publicAppAuthorize.htm';
    
    /**
     * H5点击跳转链接
     */
    const ALIPAY_H5_CLICK_URL = 'alipays://platformapi/startapp';
    
    protected static $config = [
        'app_id'                  => '',
        'alipay_public_cert_path' => '',
        'alipay_root_cert_path'   => '',
        'gateway'                 => '',
        'sign_type'               => '',
        'mch_pid'                 => '',
        'app_public_cert_path'    => '',
        'alipay_public_key'       => '',
        'app_public_key'          => '',
        'app_private_key'         => '',
        'salt'                    => '',
        'api_version'             => '1.0',
        'charset'                 => 'UTF-8',
        'format'                  => 'json',
    ];
    
    /**
     * @param array|null $config 支付宝相关配置
     *                           [
     *                           'app_id'                  => '',
     *                           'alipay_public_cert_path' => '',
     *                           'alipay_root_cert_path'   => '',
     *                           'gateway'                 => '',
     *                           'sign_type'               => '',
     *                           'mch_pid'                 => '',
     *                           'app_public_cert_path'    => '',
     *                           'alipay_public_key'       => '',
     *                           'app_public_key'          => '',
     *                           'app_private_key'         => '',
     *                           'salt'                    => '',
     *                           'api_version'             => '',
     *                           'charset'                 => '',
     *                           'format'                  => '',
     *                           ]
     */
    public function __construct(array $config = null)
    {
        $default_config = self::getDefaultConfig();
        if (is_array($config) && !empty($config)) {
            $default_config = array_merge($default_config, $config);
        }
        self::$config = $default_config;
    }
    
    /**
     * Description:默认获取系统配置
     *
     * @return array
     * @author lidong<947714443@qq.com>
     * @date   2021/8/6 0006
     */
    public static function getDefaultConfig()
    {
        $default_config = [
            'app_id'                  => config('alipay.app_id'),
            'alipay_public_cert_path' => config('alipay.alipay_public_cert_path'),
            'alipay_root_cert_path'   => config('alipay.alipay_root_cert_path'),
            'gateway'                 => config('alipay.gateway'),
            'sign_type'               => config('alipay.sign_type'),
            'mch_pid'                 => config('alipay.mch_pid'),
            'app_public_cert_path'    => config('alipay.app_public_cert_path'),
            'alipay_public_key'       => config('alipay.alipay_public_key'),
            'app_public_key'          => config('alipay.app_public_key'),
            'app_private_key'         => config('alipay.app_private_key'),
            'salt'                    => config('alipay.salt'),
        ];
        return array_merge(self::$config, $default_config);
    }
    
    /**
     * Description:获取证书模式请求类
     *
     * @return \AlipayAop\AopCertClient
     * @throws \Exception
     * @author lidong<947714443@qq.com>
     * @date   2021/8/6 0006
     */
    public function getAopCertClient()
    : AopCertClient
    {
        $AopCertClient = new AopCertClient();
        try {
            $appCertPath = self::$config[ 'app_public_cert_path' ];
            $alipayCertPath = self::$config[ 'alipay_public_cert_path' ];
            $rootCertPath = self::$config[ 'alipay_root_cert_path' ];
            $AopCertClient->gatewayUrl = self::$config[ 'gateway' ];
            $AopCertClient->appId = self::$config[ 'app_id' ];
            $AopCertClient->rsaPrivateKey = self::$config[ 'app_private_key' ];
            $AopCertClient->signType = self::$config[ 'sign_type' ];
            $AopCertClient->apiVersion = self::$config[ 'api_version' ];
            $AopCertClient->postCharset = self::$config[ 'charset' ];
            $AopCertClient->format = self::$config[ 'format' ];
            //是否校验自动下载的支付宝公钥证书，如果开启校验要保证支付宝根证书在有效期内
            $AopCertClient->isCheckAlipayPublicCert = false;
            //调用getPublicKey从支付宝公钥证书中提取公钥
            $AopCertClient->alipayrsaPublicKey = $AopCertClient->getPublicKey($alipayCertPath);
            //调用getCertSN获取证书序列号
            $AopCertClient->appCertSN = $AopCertClient->getCertSN($appCertPath);
            //调用getRootCertSN获取支付宝根证书序列号
            $AopCertClient->alipayRootCertSN = $AopCertClient->getRootCertSN($rootCertPath);
        } catch (Exception $e) {
            throw $e;
        }
        return $AopCertClient;
    }
    
    /**
     * Description:
     *
     * @throws \Exception
     * @author lidong<947714443@qq.com>
     * @date   2021/8/6 0006
     */
    public function getAopClient()
    {
        try {
            $AopClient = new AopClient();
            $AopClient->gatewayUrl = self::$config[ 'gateway' ];
            $AopClient->appId = self::$config[ 'app_id' ];
            $AopClient->rsaPrivateKey = self::$config[ 'app_private_key' ];
            $AopClient->alipayrsaPublicKey = self::$config[ 'rsa_public_key' ];
            $AopClient->apiVersion = self::$config[ 'api_version' ];
            $AopClient->signType = self::$config[ 'sign_type' ];
            $AopClient->postCharset = self::$config[ 'charset' ];
            $AopClient->format = self::$config[ 'format' ];
        } catch (Exception $e) {
            throw $e;
        }
        return $AopClient;
    }
    
    /**
     * Description:生成完整的WEB授权链接
     *
     * @param string $return_url 同步回调地址
     *
     * @return string
     * @author lidong<947714443@qq.com>
     * @date   2021/8/7 0007
     */
    public function getWebOpenUrl($return_url = '')
    {
        $auth_data = [
            'app_id'       => config('alipay.app_id'),
            'scope'        => 'auth_user',
            'redirect_uri' => $return_url,
        ];
        return self::ALIPAY_WEB_OPEN_URL.'?'.urldecode(http_build_query($auth_data));
    }
    
    /**
     * Description:生成H5跳转授权链接
     *
     * @param $return_url
     *
     * @return string
     * @author lidong<947714443@qq.com>
     * @date   2021/8/7 0007
     */
    public function getH5ClickUrl($return_url)
    {
        $open_url = $this->getWebOpenUrl($return_url);
        $alipay_data = [
            'appId' => '20000067',
            'url'   => urlencode($open_url),
        ];
        return self::ALIPAY_H5_CLICK_URL.'?'.urldecode(http_build_query($alipay_data));
    }
}
