<?php

namespace Bmapi\Core;

use Exception;

class Aes
{

    protected static $method;
    protected static $iv_len;

    public function __construct($method = '')
    {
        if (!in_array(strtolower($method), openssl_get_cipher_methods())) {
            $method = 'aes-128-cbc';
        }
        self::$method = $method;
        self::$iv_len = openssl_cipher_iv_length($method);
    }


    /**
     * 加密方法
     *
     * @param string $content    待加密内容
     * @param string $secret_key 加密密钥[加解密保持统一]
     *
     * @return string
     * @throws \Exception
     */
    public static function encrypt($content, $secret_key)
    {
        if (empty($content)) {
            throw new Exception("Error: Missing required arguments: encrypt content!");
        }
        if (empty($secret_key) || strlen(trim($secret_key)) < self::$iv_len) {
            throw new Exception("Error: Invalid arguments:encrypt secret key!");
        }
        $secret_key = substr($secret_key, 0, self::$iv_len);
        $content = trim($content);
        $iv = $secret_key;
        $encrypt_content = openssl_encrypt($content, self::$method, $secret_key, 0, $iv);
        return base64_encode($encrypt_content);
    }

    /**
     * 解密方法
     *
     * @param string $content    待加密内容
     * @param string $secret_key 解密密钥[加解密保持统一]
     *
     * @return string
     * @throws \Exception
     */
    public static function decrypt($content, $secret_key)
    {
        if (empty($content)) {
            throw new Exception("Error: Missing required arguments: decrypt content!");
        }
        if (empty($secret_key) || strlen(trim($secret_key)) < self::$iv_len) {
            throw new Exception("Error: Invalid arguments:decrypt secret key!");
        }
        $secret_key = substr($secret_key, 0, self::$iv_len);
        $content = base64_decode($content);
        $iv = $secret_key;
        $encrypt_content = openssl_decrypt($content, self::$method, $secret_key, 0, $iv);
        return trim($encrypt_content);
    }

}
