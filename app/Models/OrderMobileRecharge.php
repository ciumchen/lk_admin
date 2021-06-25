<?php

namespace App\Models;

use Exception;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class OrderMobileRecharge
 *
 * @property int                             $id
 * @property string                          $order_no    订单号
 * @property string                          $mobile      充值手机号
 * @property int                             $order_id    订单(order)表ID
 * @property \Illuminate\Support\Carbon|null $created_at  创建时间
 * @property \Illuminate\Support\Carbon|null $updated_at  更新时间
 * @property string                          $money       充值金额
 * @property string                          $trade_no    接口方返回单号
 * @property int                             $status      充值状态:0充值中,1成功,9撤销
 * @property int                             $pay_status  平台订单付款状态:0未付款,1已付款
 * @property string                          $goods_title 商品名称
 * @property int                             $uid         充值用户ID
 * @property int                             $create_type 订单类型:1充值订单,代充订单
 * @method static \Illuminate\Database\Eloquent\Builder|OrderMobileRecharge newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|OrderMobileRecharge newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|OrderMobileRecharge query()
 * @method static \Illuminate\Database\Eloquent\Builder|OrderMobileRecharge whereCreateType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderMobileRecharge whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderMobileRecharge whereGoodsTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderMobileRecharge whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderMobileRecharge whereMobile($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderMobileRecharge whereMoney($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderMobileRecharge whereOrderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderMobileRecharge whereOrderNo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderMobileRecharge wherePayStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderMobileRecharge whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderMobileRecharge whereTradeNo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderMobileRecharge whereUid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderMobileRecharge whereUpdatedAt($value)
 * @mixin \Eloquent
 * @package App\Models
 */
class OrderMobileRecharge extends Model
{
    
    use HasFactory;
    
    protected $table = 'order_mobile_recharge';
    
    /**
     * 创建代充订单
     *
     * @param int    $order_id order表ID
     * @param string $order_no 订单号
     * @param int    $uid      用户ID
     * @param string $mobile   手机号
     * @param float  $money    充值金额
     *
     * @return \App\Models\OrderMobileRecharge
     * @throws \Exception
     */
    public function setDlMobileOrder($order_id, $order_no, $uid, $mobile, $money)
    {
        try {
            $this->mobile = $mobile;
            $this->money = $money;
            $this->create_type = '2';
            $this->order_id = $order_id;
            $this->order_no = $order_no;
            $this->uid = $uid;
            $this->save();
        } catch (Exception $e) {
            throw  $e;
        }
        return $this;
    }
}
