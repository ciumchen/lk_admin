<?php

namespace App\Libs\Yuntong;

use Exception;

class Sign
{

    /**
     * @param array $data
     * @param array $salt
     * @return string
     * @throws Exception
     */
    static public function make(array $data, array $salt = [])
    {
        try {
            if (is_array($data) && !empty($data)) {
                $exclude = [
                    'create_time',
                    'sign',
                    'pay_time',
                    'refund_time',
                    'return_url',
                    'scene',
                    'merchant_id',
                    'ip',
                    'open_id'
                ];
                foreach ($exclude as $key) { /*去除不参与签名的字段*/
                    if (array_key_exists($key, $data)) {
                        unset($data[ $key ]);
                    }
                }
                $status = ksort($data);
                if ($status == false) {
                    throw new Exception('array key sort failed');
                }
                if (!empty($salt)) {
                    $data = array_merge($data, $salt);
                }
                $str = self::params_build($data);
                $sign = md5($str);
            } else {
                throw new Exception('sign can not be generate by empty array.');
            }
        } catch (Exception $e) {
            throw $e;
        }
        return $sign;
    }

    /**
     * @param array $data
     * @param array $salt
     * @return bool
     * @throws Exception
     */
    static public function check(array $data, array $salt = [])
    {
        try {
            $origin_sign = $data[ 'sign' ];
            if ($data[ 'amount' ]) { /*防止json_decode之后自动省略*/
                $data[ 'amount' ] = sprintf("%.2f", $data[ 'amount' ]);
            }
            $sign = self::make($data, $salt);
            if (strtolower($sign) == strtolower($origin_sign)) {
                return true;
            } else {
                return false;
            }
        } catch (Exception $e) {
            throw $e;
        }
    }

    /**
     * @param array $array
     * @return string
     */
    static public function params_build($array = [])
    {
        $str = '';
        foreach ($array as $k => $val) {
            $str .= $k . '=' . $val . '&';
        }
        $str = trim($str, '&');
        return $str;
    }


}
