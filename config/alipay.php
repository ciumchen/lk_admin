<?php

return [
    'app_id'                  => env('LK_ALIPAY_APPID', ''), // 应用APPID
    'gateway'                 => env('LK_ALIPAY_GATEWAY', 'https://openapi.alipay.com/gateway.do'), //支付宝网关地址
    'mch_pid'                 => env('LK_ALIPAY_MCH_PID', ''), // 合作人PID
    'alipay_public_key'       => env('LK_ALIPAY_PUBLIC_KEY', ''), // 支付宝公钥
    'app_public_key'          => env('LK_ALIPAY_APP_PUBLIC_KEY', ''), // 应用公钥
    'app_private_key'         => env('LK_ALIPAY_APP_PRIVATE_KEY', ''), // 应用私钥
    'sign_type'               => env('LK_ALIPAY_SIGN_TYPE', ''), // 密钥加密方式
    'salt'                    => env('LK_ALIPAY_SALT', ''), //接口内容加密方式
    'app_public_cert_path'    => realpath(env('LK_ALIPAY_APP_PUBLIC_CERT_PATH', '')), // 应用公钥证书地址
    'alipay_public_cert_path' => realpath(env('LK_ALIPAY_PUBLIC_CERT_PATH', '')), // 支付宝公钥证书地址
    'alipay_root_cert_path'   => realpath(env('LK_ALIPAY_ROOT_CERT_PATH', '')), // 支付宝根证书地址
];
