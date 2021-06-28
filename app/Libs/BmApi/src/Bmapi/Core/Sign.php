<?php

namespace Bmapi\Core;

use Exception;

class Sign
{

    /**
     * @var string 加密方式
     */
    protected static $sign_method = 'sha1';

    /**
     * @var string[] 不参与签名字段
     */
    protected static $ignore_keys = ["file", "image", "logo", 'sign'];

    /**
     * 生成签名
     *
     * @param array  $params
     *
     * @param string $secret
     *
     * @return string
     * @throws \Exception
     */
    public static function generateSign(array $params, $secret)
    {
        try {
            if (!is_array($params)) {
                throw new Exception('Error: Sign params must be array!');
            }
            ksort($params);
            $sign_string = '';
            foreach ($params as $k => $v) {
                if (!in_array($k, self::$ignore_keys)) {
                    $sign_string .= $k . $v;
                }
            }
            unset($k, $v);
            $sign_string = $secret . $sign_string . $secret;
        } catch (Exception $e) {
            throw $e;
        }
        return strtoupper(call_user_func(self::$sign_method, $sign_string));
    }

    /**
     * 验证签名
     *
     * @param array  $params
     * @param string $secret
     *
     * @return bool
     * @throws \Exception
     */
    public static function checkSign(array $params, $secret)
    {
        try {
            if (!array_key_exists('sign', $params)) {
                throw new Exception('Error: The sign field does not exist in the params.');
            }
            $sign = $params[ 'sign' ];
            $new_sign = self::generateSign($params, $secret);
            return strtoupper($sign) == strtoupper($new_sign);
        } catch (Exception $e) {
            throw $e;
        }
    }
}
