<?php

namespace App\Libs\Yuntong;

class Request
{

    /**
     * @param       $url
     * @param array $data
     * @param bool  $SSLStatus
     *
     * @return bool|string
     * @throws \Exception
     */
    public static function PostRequest($url, $data = [], $SSLStatus = false)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        if ($SSLStatus) {
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        }
        // POST数据
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        $output = curl_exec($ch);
        if (curl_errno($ch) > 0) {
            throw (new \Exception(curl_error($ch)));
        }
        curl_close($ch);
        return $output;
    }


}
