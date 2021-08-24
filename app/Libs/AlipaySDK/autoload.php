<?php

namespace AlipaySDK;

class Autoloader
{
    protected static $files = [
        'AopClient.php',
        'AopCertification.php',
        'request/AlipayTradeQueryRequest.php',
        'request/AlipayTradeWapPayRequest.php',
        'request/AlipayTradeAppPayRequest.php',
    ];
    
    public static function autoload($className)
    {
        $path = str_replace('\\', DIRECTORY_SEPARATOR, $className);
        $file = __DIR__.DIRECTORY_SEPARATOR.'aop'.DIRECTORY_SEPARATOR.$path.'.php';
        if (file_exists($file)) {
            require_once $file;
        }
    }
}

spl_autoload_register("\AlipaySDK\Autoloader::autoload");
