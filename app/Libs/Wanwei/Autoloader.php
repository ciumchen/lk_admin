<?php

namespace Wanwei;

/**
 * Description:万维接口自动加载
 *
 * Class Autoloader
 *
 * @package Wanwei
 * @author  lidong<947714443@qq.com>
 * @date    2021/6/21 0021
 */
class Autoloader
{
    
    public static function autoload($className)
    {
        $path = str_replace('\\', DIRECTORY_SEPARATOR, $className);
        $file = dirname(__DIR__) . DIRECTORY_SEPARATOR . $path . '.php';
        if (file_exists($file)) {
            require_once $file;
        }
    }
}

spl_autoload_register("\Wanwei\Autoloader::autoload");
