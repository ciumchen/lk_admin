<?php

namespace Wanwei\Api;

use Exception;

class HotelOrder extends RequestBase
{
    
    /**
     * Description:
     *
     * @param  string  $page        页码
     * @param  string  $limit       每页条数，最大30条
     * @param  string  $cityName    城市
     * @param  string  $inDate      入住时间，格式为：YYYY-MM-DD（默认2天后）
     * @param  string  $outDate     离开时间，格式为：YYYY-MM-DD（默认3天后）
     * @param  string  $sortKey     排序规则(默认recommend.推荐值排序)
     *                              recommend:推荐值降序
     *                              satisfaction :口碑
     *                              price-asc:起价升序
     *                              price-desc:起价降序
     * @param  string  $star        星级
     *                              TWO:二星级,
     *                              THREE:三星级,
     *                              FOUR:四星级,
     *                              FIVE:五星级,
     *                              BUDGET:经济型,
     *                              CONFORT:舒适型,
     *                              HIGHEND:高档型,
     *                              LUXURY:豪华型【多个以逗号:‘,’分隔】
     * @param  string  $minPrice    房价最低价
     * @param  string  $maxPrice    房价最高价
     * @param  string  $poiKey      区域关键字
     *                              可以使用关键字搜索中的displayName
     *                              （poiKey、poiCode、longitude、latitude四个值需结合使用）
     * @param  string  $poiCode     经纬度对应的编号
     *                              poi类型值：
     *                              1-城市，
     *                              2-行政区，
     *                              3-商圈，
     *                              4-景点，
     *                              7-酒店，
     *                              12-机场，
     *                              13-地铁，
     *                              14-火车站
     *                              （poiKey、poiCode、longitude、latitude四个值需结合使用）
     * @param  string  $longitude   经度（poiKey、poiCode、longitude、latitude四个值需结合使用）
     * @param  string  $latitude    维度（poiKey、poiCode、longitude、latitude四个值需结合使用）
     * @param  string  $keyWords    搜索关键词
     *
     * @return mixed
     * @throws \Exception
     * @author lidong<947714443@qq.com>
     * @date   2021/6/22 0022
     */
    public function hotelSearch(
        $page,
        $limit,
        $cityName = '',
        $inDate = '',
        $outDate = '',
        $sortKey = '',
        $star = '',
        $minPrice = '',
        $maxPrice = '',
        $poiKey = '',
        $poiCode = '',
        $longitude = '',
        $latitude = '',
        $keyWords = ''
    ) {
        $apiMethod = '1653-1';/* 接口标识 */
        $params = [
            'page'      => $page,
            'limit'     => $limit,
            'cityName'  => $cityName,
            'inDate'    => $inDate,
            'outDate'   => $outDate,
            'sortKey'   => $sortKey,
            'star'      => $star,
            'minPrice'  => $minPrice,
            'maxPrice'  => $maxPrice,
            'poiKey'    => $poiKey,
            'poiCode'   => $poiCode,
            'longitude' => $longitude,
            'latitude'  => $latitude,
            'keyWords'  => $keyWords,
        ];
        try {
            $ShowApi = $this->getShowApi($apiMethod);
            foreach ($params as $key => $val) {
                if (!empty($val)) {
                    $ShowApi->addTextPara($key, $val);
                }
            }
            $response = $ShowApi->post();
            $result = $this->fetchResult($response->getContent());
            if (!array_key_exists('data', $result)) {
                if (array_key_exists('ret_code', $result) && $result[ 'ret_code' ] != '0') {
                    throw new Exception($result[ 'remark' ].'--'.json_encode($result));
                }
                throw  new Exception('酒店获取失败：'.json_encode($result));
            }
            return $result[ 'data' ];
        } catch (Exception $e) {
            throw $e;
        }
    }
    
    /**
     * Description:获取酒店支持的城市
     *
     * @return mixed
     * @throws \Exception
     * @author lidong<947714443@qq.com>
     * @date   2021/6/25 0025
     */
    public function getStandByCity()
    {
        $apiMethod = '1653-2';/* 接口标识 */
        try {
            $ShowApi = $this->getShowApi($apiMethod);
            $response = $ShowApi->post();
            $result = $this->fetchResult($response->getContent());
            if (!array_key_exists('cityNameList', $result)) {
                if (array_key_exists('ret_code', $result) && $result[ 'ret_code' ] != '0') {
                    throw new Exception($result[ 'remark' ].'--'.json_encode($result));
                }
                throw  new Exception('酒店支持城市获取失败：'.json_encode($result));
            }
            return $result[ 'cityNameList' ];
        } catch (Exception $e) {
            throw $e;
        }
    }
    
    /**
     * Description:获取酒店详情
     *
     * @param  string  $hotelId
     *
     * @return mixed
     * @throws \Exception
     * @author lidong<947714443@qq.com>
     * @date   2021/6/25 0025
     */
    public function getHotelDetails($hotelId)
    {
        $apiMethod = '1653-3';/* 接口标识 */
        try {
            $ShowApi = $this->getShowApi($apiMethod);
            $ShowApi->addTextPara('hotelId', $hotelId);
            $response = $ShowApi->post();
            $result = $this->fetchResult($response->getContent());
            if (!array_key_exists('data', $result)) {
                if (array_key_exists('ret_code', $result) && $result[ 'ret_code' ] != '0') {
                    throw new Exception($result[ 'remark' ].'--'.json_encode($result));
                }
                throw  new Exception('酒店支持城市获取失败：'.json_encode($result));
            }
            return $result[ 'data' ];
        } catch (Exception $e) {
            throw $e;
        }
    }
    
    /**
     * Description: 获取酒店信息
     *
     * @param  string  $hotelId     酒店ID
     * @param  string  $inDate      入住时间，格式为：YYYY-MM-DD（默认2天后）
     * @param  string  $outDate     离开时间，格式为：YYYY-MM-DD（默认3天后）
     * @param  string  $excludeOta  排除禁止OTA裸售的数据，默认true
     *
     * @return mixed
     * @throws \Exception
     * @author lidong<947714443@qq.com>
     * @date   2021/6/25 0025
     */
    public function getHotelRooms($hotelId, $inDate = '', $outDate = '', $excludeOta = 'true')
    {
        $apiMethod = '1653-4';/* 接口标识 */
        $excludeOta = (empty($excludeOta) || $excludeOta != 'false') ? 'true' : 'false';
        $params = [
            'hotelId'    => $hotelId,
            'inDate'     => $inDate,
            'outDate'    => $outDate,
            'excludeOta' => $excludeOta,
        ];
        try {
            $ShowApi = $this->getShowApi($apiMethod);
            foreach ($params as $key => $val) {
                if (!empty($val)) {
                    $ShowApi->addTextPara($key, $val);
                }
            }
            $response = $ShowApi->post();
            $result = $this->fetchResult($response->getContent());
            if (!array_key_exists('roomInfo', $result)) {
                if (array_key_exists('ret_code', $result) && $result[ 'ret_code' ] != '0') {
                    throw new Exception($result[ 'remark' ].'--'.json_encode($result));
                }
                throw  new Exception('房间信息获取失败：'.json_encode($result));
            }
            return $result[ 'roomInfo' ];
        } catch (Exception $e) {
            throw $e;
        }
    }
    
    /**
     * Description:
     *
     * @param  string  $hotelId        酒店ID
     * @param  string  $roomId         价格计划id
     * @param  string  $numberOfRooms  预订房间数
     * @param  string  $inDate         入店时间
     * @param  string  $outDate        离店时间
     * @param  string  $child          入住儿童数
     * @param  string  $man            成人数
     * @param  string  $childAges      入住儿童的年龄数，注意如果有多名儿童的年龄请用,分隔
     *
     * @return mixed
     * @throws \Exception
     * @author lidong<947714443@qq.com>
     * @date   2021/6/25 0025
     */
    public function getRoomPrice($hotelId, $roomId, $numberOfRooms, $inDate, $outDate, $child, $man, $childAges = '')
    {
        $apiMethod = '1653-5';/* 接口标识 */
        $params = [
            'hotelId'       => $hotelId,
            'roomId'        => $roomId,
            'numberOfRooms' => $numberOfRooms,
            'inDate'        => $inDate,
            'outDate'       => $outDate,
            'child'         => $child,
            'man'           => $man,
            'childAges'     => $childAges,
        ];
        try {
            $ShowApi = $this->getShowApi($apiMethod);
            foreach ($params as $key => $val) {
                if (!empty($val)) {
                    $ShowApi->addTextPara($key, $val);
                }
            }
            $response = $ShowApi->post();
            $result = $this->fetchResult($response->getContent());
            if (!array_key_exists('data', $result)) {
                if (array_key_exists('ret_code', $result) && $result[ 'ret_code' ] != '0') {
                    throw new Exception($result[ 'remark' ].'--'.json_encode($result));
                }
                throw  new Exception('房间价格信息获取失败：'.json_encode($result));
            }
            return $result[ 'data' ];
        } catch (Exception $e) {
            throw $e;
        }
    }
}
