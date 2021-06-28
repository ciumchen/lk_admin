<?php

namespace Wanwei\Api;

use Exception;

class VideoCard extends RequestBase
{
    
    /**
     * Description:视频卡会员列表
     *
     * @return mixed
     * @throws \Exception
     * @author lidong<947714443@qq.com>
     * @date   2021/6/21 0021
     */
    public function getList()
    {
        $apiMethod = '1715-1'; /* 接口标识 */
        try {
            $ShowApi = $this->getShowApi($apiMethod);
            $response = $ShowApi->post();
            $result = $this->fetchResult($response->getContent());
            if (!array_key_exists('list', $result)) {
                throw  new Exception('列表遗失：' . json_encode($result));
            }
            return $result[ 'list' ];
        } catch (Exception $e) {
            throw $e;
        }
    }
    
    /**
     * Description:提取视频卡密信息
     *
     * @param string $genusId  产品id
     * @param string $order_no 订单id，不可超过32个字符
     * @param string $count    购买数量（单个订单最多购买6个兑换卡）
     *
     * @return mixed
     * @throws \Exception
     * @author lidong<947714443@qq.com>
     * @date   2021/6/21 0021
     */
    public function getVideoCard($genusId, $order_no, $count = '1')
    {
        $apiMethod = '1715-2';/* 接口标识 */
        $params = [
            'genusId' => $genusId,
            'count'   => $count,
            'orderId' => $order_no,
        ];
        try {
            $ShowApi = $this->getShowApi($apiMethod);
            foreach ($params as $key => $row) {
                if (!empty($row)) {
                    $ShowApi->addTextPara($key, $row);
                }
            }
            $response = $ShowApi->post();
            $result = $this->fetchResult($response->getContent());
            if (!array_key_exists('cardList', $result)) {
                if (array_key_exists('ret_code', $result) && $result[ 'ret_code' ] != '0') {
                    throw new Exception($result[ 'remark' ] . '--' . json_encode($result));
                }
                throw  new Exception('卡密获取失败：' . json_encode($result));
            }
            return $result[ 'cardList' ];
        } catch (Exception $e) {
            throw $e;
        }
    }
    
    /**
     * Description:订单信息查询
     *
     * @param string $order_no
     *
     * @return mixed
     * @throws \Exception
     * @author lidong<947714443@qq.com>
     * @date   2021/6/21 0021
     */
    public function getVideoOrder($order_no)
    {
        $apiMethod = '1715-3';/* 接口标识 */
        $params = [
            'orderId' => $order_no,
        ];
        try {
            $ShowApi = $this->getShowApi($apiMethod);
            foreach ($params as $key => $row) {
                if (!empty($row)) {
                    $ShowApi->addTextPara($key, $row);
                }
            }
            $response = $ShowApi->post();
            return $this->fetchResult($response->getContent());
        } catch (Exception $e) {
            throw $e;
        }
    }
}
