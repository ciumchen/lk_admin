<?php

namespace App\Libs\Yuntong;

use Exception;
use Illuminate\Support\Facades\Log;

class YuntongPay extends Config
{
    
    use Api;
    
    /**
     * [必须]
     *
     * @var string 订单标题
     */
    private $goods_title;
    
    /**
     * [必须]
     *
     * @var string 订单明细
     */
    private $goods_desc;
    
    /**
     * [必须]
     *
     * @var string 商户订单号
     */
    private $order_id;
    
    /**
     * [必须]
     *
     * @var float 支付金额
     */
    private $amount;
    
    /**
     * [必须]
     *
     * @var string 支付类型 固定值：alipay|wx|unionpay
     */
    private $type;
    
    /**
     * [必须]
     *
     * @var  支付方式 固定值：app|wap|qr|mini|pub
     */
    private $method;
    
    /**
     * [必须]
     *
     * @var string 异步通知地址
     */
    private $notify_url;
    
    /**
     * @var string 同步返回地址 仅支持app和wap渠道
     */
    protected $return_url = '';
    
    /**
     * @var string 场景 固定值[ios|android]
     */
    protected $scene = '';
    
    /**
     * @var string 商户id 特定场景传递，默认不传
     */
    protected $merchant_id = '';
    
    /**
     * 用户端IP
     * 在type为wx，method为wap时必填（微信H5）
     */
    protected $ip = '';
    
    /**
     * 可选参数
     *
     * @var array
     */
    private $optional_param = ['return_url', 'scene', 'merchant_id', 'ip'];
    
    /**
     * @return bool|string
     * @throws Exception
     */
    public function pay()
    {
        try {
            $data = [];
            $data[ 'app_id' ] = $this->appID;
            $data[ 'goods_title' ] = $this->goods_title;
            $data[ 'goods_desc' ] = $this->goods_desc;
            $data[ 'order_id' ] = $this->order_id;
            $data[ 'amount' ] = $this->amount;
            $data[ 'type' ] = $this->type;
            $data[ 'method' ] = $this->method;
            $data[ 'notify_url' ] = $this->notify_url;
            foreach ($this->optional_param as $val) { /* 判断可选参数是否设置 */
                if ($this->$val) {
                    $data[ $val ] = $this->$val;
                }
            }
            $data[ 'sign' ] = Sign::make($data, ['secret' => $this->appSecret]);
            $res = Request::PostRequest(self::API_DOMIAN . $this->pay_api, $data);
            $res = json_decode($res, true);
            if (is_array($res) && $res[ 'code' ] == '000001') {
                return $res[ 'data' ][ 'pay_info' ];
            } elseif (is_array($res)) {
                Log::debug('提交数据', [json_encode($data)]);
                throw new Exception(
                    '请求错误：' . $res[ 'code' ] . '-' . $res[ 'result' ] . '-' . $res[ 'data' ][ 'error_info' ]
                );
            } else {
                throw new Exception('返回结果解析异常'.$res);
            }
        } catch (Exception $e) {
            throw $e;
        }
    }
    
    /**
     * 查询
     *
     * @param $order_id
     *
     * @return mixed|string
     * @throws Exception
     */
    public function OrderQuery(string $order_id)
    {
        try {
            $data = [
                'app_id' => $this->appID,
                'method' => 'query',
            ];
            $data[ 'order_id' ] = $order_id;
            $data[ 'sign' ] = Sign::make($data, ['secret' => $this->appSecret]);
            $res = Request::PostRequest(self::API_DOMIAN . $this->query_api, $data);
            $res = json_decode($res, true);
            if (is_array($res) && $res[ 'code' ] == '000003') {
                return $res[ 'data' ][ 'order_info' ];
            } elseif (is_array($res)) {
                throw new Exception(
                    '请求错误：' . $res[ 'code' ] . '-' . $res[ 'result' ] . '-' . $res[ 'data' ][ 'error_info' ]
                );
            } else {
                throw new Exception('返回结果解析异常');
            }
        } catch (Exception $e) {
            throw $e;
        }
    }
    
    /**
     * 退款
     *
     * @param string $order_id
     *
     * @return bool|mixed
     * @throws Exception
     */
    public function OrderRefund(string $order_id)
    {
        try {
            $data = [
                'app_id' => $this->appID,
                'method' => 'refund',
            ];
            $data[ 'order_id' ] = $order_id;
            $data[ 'sign' ] = Sign::make($data, ['secret' => $this->appSecret]);
            $res = Request::PostRequest(self::API_DOMIAN . $this->refund_api, $data);
            $res = json_decode($res, true);
            if (is_array($res) && $res[ 'code' ] == '000002') {
                return $res[ 'data' ][ 'refund_info' ];
            } elseif (is_array($res)) {
                throw new Exception(
                    '请求错误：' . $res[ 'code' ] . '-' . $res[ 'result' ] . '-' . $res[ 'data' ][ 'error_info' ]
                );
            } else {
                throw new Exception('返回结果解析异常');
            }
        } catch (Exception $e) {
            throw $e;
        }
    }
    
    /**
     * 异步通知接收
     *
     * @param array $data
     *
     * @return array|bool
     * @throws Exception
     */
    public function Notify(array $data)
    {
        try {
            if (!is_array($data) || empty($data)) {
                throw new Exception('数据格式错误');
            }
            if (Sign::check($data, ['secret' => $this->appSecret])) {
                return $data;
            } else {
                throw new Exception('验签失败');
            }
        } catch (Exception $e) {
            throw $e;
        }
    }
    
    /**
     * 异步通知处理成功返回;
     */
    public function Notify_success()
    {
        die('success');
    }
    
    public function Notify_failed()
    {
        exit('failed');
    }
    
    /********************************************************************************/
    /**
     * 设置商品名称
     *
     * @param $val
     *
     * @return $this
     */
    public function setGoodsTitle($val)
    {
        $this->goods_title = $val;
        return $this;
    }
    
    /**
     * 设置商品描述
     *
     * @param $val
     *
     * @return $this
     */
    public function setGoodsDesc($val)
    {
        $this->goods_desc = $val;
        return $this;
    }
    
    /**
     * 设置商户订单号
     *
     * @param $val
     *
     * @return $this
     */
    public function setOrderId($val)
    {
        $this->order_id = $val;
        return $this;
    }
    
    /**
     * 设置价格 [单位/元]
     *
     * @param $val
     *
     * @return $this
     */
    public function setAmount($val)
    {
        $this->amount = $val;
        return $this;
    }
    
    /**
     * @param $val
     *
     * @return $this
     */
    public function setType($val)
    {
        $this->type = $val;
        return $this;
    }
    
    /**
     * @param $val
     *
     * @return $this
     */
    public function setMethod($val)
    {
        $this->method = $val;
        return $this;
    }
    
    /**
     * @param $val
     *
     * @return $this
     */
    public function setNotifyUrl($val)
    {
        $this->notify_url = $val;
        return $this;
    }
    
    /**
     * @param $val
     *
     * @return $this
     */
    public function setReturnUrl($val)
    {
        $this->return_url = $val;
        return $this;
    }
    
    /**
     * @param $val
     *
     * @return $this
     */
    public function setScene($val)
    {
        $this->scene = $val;
        return $this;
    }
    
    /**
     * @param $val
     *
     * @return $this
     */
    public function setMerchantId($val)
    {
        $this->merchant_id = $val;
        return $this;
    }
    
    /**
     * @param $val
     *
     * @return $this
     */
    public function setIp($val)
    {
        $this->ip = $val;
        return $this;
    }
}
