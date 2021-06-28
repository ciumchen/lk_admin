<?php

if (!function_exists('dot_convert')) {
    /**
     * 各种圆点转换为国标圆点
     * 对于姓名间隔符“·”，严格按照国家标准，统一采用“·”（GB13000编码为00B7，GB18030编码为A1A4）表示。
     * 参考资料 http://www.gov.cn/xinwen/2016-05/09/content_5071481.htm.
     *
     * @param $str
     *
     * @return string
     *
     * @author hteen
     */
    function dot_convert($str)
    {
        $dots = ['‧', '•', '∙', '∘', '⋄', '⋅', '◉', '◦', 'ㆍ', '・', '･'];
        return str_replace($dots, '·', $str);
    }
}
if (!function_exists('encrypt_password')) {
    /**
     * 加密密码
     *
     * @param string $phone
     * @param string $password
     * @param string $salt
     *
     * @return string
     */
    function encrypt_password($phone, $password, $salt)
    {
        $hashedPassword = hash('sha256', 'lk_app' . $phone . $password);
        return hash('sha256', 'lk_app_' . $phone . $hashedPassword . $salt);
    }
}
if (!function_exists('request_ip')) {
    /**
     * 获取客户端 IP 地址
     *
     * @return string
     */
    function request_ip()
    {
        return request()->server('HTTP_ALI_CDN_REAL_IP', value(function () {
            $ip = request()->ip();
            if (request()->hasHeader('X_FORWARDED_FOR')) {
                $ips = [];
                foreach (explode(',', request()->header('X_FORWARDED_FOR')) as $v) {
                    $ips[] = trim($v);
                }
                return head($ips) ?: $ip;
            }
            return $ip;
        }));
    }
}
if (!function_exists('ali_oss_url')) {
    /**
     * 阿里云 OSS 地址
     *
     * @param string $path
     * @param string $host
     *
     * @return string
     */
    function ali_oss_url(string $path, $host = null)
    {
        if (preg_match('/^(https?|itms-services):\/\//', $path)) {
            return $path;
        }
        if (null === $host) {
            if (config('ali.oss.sts.is_cname')) {
                $host = config('ali.oss.sts.cdn');
            }
            $host = $host ?: sprintf('https://%s.%s', config('ali.oss.sts.bucket'), config('ali.oss.sts.endpoint'));
        }
        return rtrim($host, '/') . '/' . ltrim($path, '/');
    }
}
if (!function_exists('rtrim_zero')) {
    /**
     * 移除小数位的多余的0.
     *
     * @param $value
     *
     * @return string
     */
    function rtrim_zero(string $value)
    {
        if (!is_numeric($value)) {
            return $value;
        }
        $arr = explode('.', $value);
        if (2 === count($arr)) {
            if ($str = rtrim($arr[ 1 ], '0')) {
                $arr[ 1 ] = $str;
            } else {
                unset($arr[ 1 ]);
            }
        }
        return (string)implode('.', $arr);
    }
}
if (!function_exists('format_decimal')) {
    /**
     * 格式化小数位数.
     *
     * @param $value
     *
     * @return string
     */
    function format_decimal($num, int $len = 2)
    {
        $mlen = $len + 1;
        return sprintf("%.{$len}f", substr(sprintf("%.{$mlen}f", $num), 0, -1));
    }
}
if (!function_exists('verify_id_card')) {
    /**
     * 验证身份正号码
     *
     * @param string $idCard
     *
     * @return string
     */
    function verify_id_card(string $idCard)
    {
        if (18 != strlen($idCard)) {
            return false;
        }
        $str = substr($idCard, 0, 17);
        // 加权因子
        $factor = [7, 9, 10, 5, 8, 4, 2, 1, 6, 3, 7, 9, 10, 5, 8, 4, 2];
        // 校验码对应值
        $verifyNumbers = ['1', '0', 'X', '9', '8', '7', '6', '5', '4', '3', '2'];
        $checksum = 0;
        for ($i = 0; $i < strlen($str); ++$i) {
            $checksum += substr($str, $i, 1) * $factor[ $i ];
        }
        $mod = $checksum % 11;
        return $verifyNumbers[ $mod ] === strtoupper(substr($idCard, 17, 1));
    }
}
if (!function_exists('cat_nest_order_sn')) {
    /**
     * 猫窝订单号.
     *
     * @return string
     */
    function cat_nest_order_sn()
    {
        return date('YmdHis') . sprintf('%05s', mt_rand(1, 99999));
    }
}
if (!function_exists('apiSuccess')) {
    /**
     * 成功返回
     *
     * @param array  $data
     * @param string $msg
     *
     * @return string
     */
    function apiSuccess($data = [], $msg = 'success')
    {
        $return_array = [
            'code' => 0,
            'data' => $data,
            'msg'  => $msg,
        ];
        return response()->json($return_array);
    }
}
if (!function_exists('createOrderNo')) {
    /**
     * 来客订单号
     *
     * @return string
     */
    function createOrderNo()
    {
        return "PY_" . date("YmdHis") . rand(100000, 999999);
    }
}
if (!function_exists('createNotifyUrl')) {
    /**
     * Description:获取异步通知地址
     *
     * @param $notify_url
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\UrlGenerator|string|string[]
     * @author lidong<947714443@qq.com>
     * @date   2021/6/11 0011
     */
    function createNotifyUrl($notify_url)
    {
        if (strpos('http://', $notify_url) === false && strpos('https://', $notify_url) === false) {
            $notify_url = url($notify_url);
        }
        if (strpos($notify_url, 'lk.catspawvideo.com') !== false) {
            $notify_url = str_replace('http://', 'https://', $notify_url);
        }
        return $notify_url;
    }
}
