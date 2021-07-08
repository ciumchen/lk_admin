<?php

namespace App\Models;

use Exception;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class OrderMobileRecharge
 *
 * @property int                                                                                    $id
 * @property string                                                                                 $order_no    订单号
 * @property string                                                                                 $mobile      充值手机号
 * @property int                                                                                    $order_id
 *           订单(order)表ID
 * @property \Illuminate\Support\Carbon|null                                                        $created_at  创建时间
 * @property \Illuminate\Support\Carbon|null                                                        $updated_at  更新时间
 * @property string                                                                                 $money       充值金额
 * @property string                                                                                 $trade_no
 *           接口方返回单号
 * @property int                                                                                    $status
 *           充值状态:0充值中,1成功,9撤销
 * @property int                                                                                    $pay_status
 *           平台订单付款状态:0未付款,1已付款
 * @property string                                                                                 $goods_title 商品名称
 * @property int                                                                                    $uid         充值用户ID
 * @property int                                                                                    $create_type
 *           订单类型:1充值订单,代充订单
 * @method static Builder|OrderMobileRecharge newModelQuery()
 * @method static Builder|OrderMobileRecharge newQuery()
 * @method static Builder|OrderMobileRecharge query()
 * @method static Builder|OrderMobileRecharge whereCreateType($value)
 * @method static Builder|OrderMobileRecharge whereCreatedAt($value)
 * @method static Builder|OrderMobileRecharge whereGoodsTitle($value)
 * @method static Builder|OrderMobileRecharge whereId($value)
 * @method static Builder|OrderMobileRecharge whereMobile($value)
 * @method static Builder|OrderMobileRecharge whereMoney($value)
 * @method static Builder|OrderMobileRecharge whereOrderId($value)
 * @method static Builder|OrderMobileRecharge whereOrderNo($value)
 * @method static Builder|OrderMobileRecharge wherePayStatus($value)
 * @method static Builder|OrderMobileRecharge whereStatus($value)
 * @method static Builder|OrderMobileRecharge whereTradeNo($value)
 * @method static Builder|OrderMobileRecharge whereUid($value)
 * @method static Builder|OrderMobileRecharge whereUpdatedAt($value)
 * @mixin \Eloquent
 * @package App\Models
 * @property int                                                                                    $num         数量
 * @property int                                                                                    $has_child   是否有子订单
 * @method static Builder|OrderMobileRecharge whereHasChild($value)
 * @method static Builder|OrderMobileRecharge whereNum($value)
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\OrderMobileRechargeDetails[] $details
 * @property-read int|null                                                                          $details_count
 */
class OrderMobileRecharge extends AdminBaseModel
{
    use HasFactory;
    
    const CREATE_TYPE_RECHARGE = 1;
    
    const CREATE_TYPE_ZL       = 2;
    
    const CREATE_TYPE_MZL      = 3;
    
    /**
     * @var string 表名
     */
    protected $table = 'order_mobile_recharge';
    /**
     * @var string[] 类型对应文字
     */
    public static $createTypeText = [
        self::CREATE_TYPE_RECHARGE => '直充',
        self::CREATE_TYPE_ZL       => '代充',
        self::CREATE_TYPE_MZL      => '批量代充',
    ];
    
    /**
     * Description:
     *
     * @param  int     $order_id  order表ID
     * @param  string  $order_no  订单号
     * @param  int     $uid       用户ID
     * @param  string  $mobile    手机号
     * @param  string  $money     充值金额
     *
     * @return $this
     * @throws \Exception
     * @author lidong<947714443@qq.com>
     * @date   2021/7/2 0002
     */
    public function setOrder($order_id, $order_no, $uid, $mobile, $money)
    {
        try {
            $this->mobile = $mobile;
            $this->money = $money;
            $this->order_id = $order_id;
            $this->order_no = $order_no;
            $this->uid = $uid;
            $this->save();
        } catch (Exception $e) {
            throw  $e;
        }
        return $this;
    }
    
    /**
     * Description:创建话费订单
     *
     * @param  int     $order_id  order表ID
     * @param  string  $order_no  订单号
     * @param  int     $uid       用户ID
     * @param  string  $mobile    手机号
     * @param  string  $money     充值金额
     *
     * @return $this
     * @throws \Exception
     * @author lidong<947714443@qq.com>
     * @date   2021/7/5 0005
     */
    public function setMobileOrder($order_id, $order_no, $uid, $mobile, $money)
    {
        try {
            $this->create_type = 1;
            $this->setOrder($order_id, $order_no, $uid, $mobile, $money);
        } catch (Exception $e) {
            throw  $e;
        }
        return $this;
    }
    
    /**
     * 创建代充订单
     *
     * @param  int     $order_id  order表ID
     * @param  string  $order_no  订单号
     * @param  int     $uid       用户ID
     * @param  string  $mobile    手机号
     * @param  string  $money     充值金额
     *
     * @return \App\Models\OrderMobileRecharge
     * @throws \Exception
     */
    public function setDlMobileOrder($order_id, $order_no, $uid, $mobile, $money)
    {
        try {
            $this->create_type = 2;
            $this->setOrder($order_id, $order_no, $uid, $mobile, $money);
        } catch (Exception $e) {
            throw  $e;
        }
        return $this;
    }
    
    /**
     * Description:
     *
     * @param  int     $order_id  order表ID
     * @param  string  $order_no  订单号
     * @param  int     $uid       用户ID
     * @param  string  $mobile    手机号
     * @param  string  $money     充值金额
     *
     * @return $this
     * @throws \Exception
     * @author lidong<947714443@qq.com>
     * @date   2021/7/2 0002
     */
    public function setZLManyMobileOrder($order_id, $order_no, $uid, $mobile, $money)
    {
        try {
            $this->create_type = 3;
            $this->setOrder($order_id, $order_no, $uid, $mobile, $money);
        } catch (Exception $e) {
            throw $e;
        }
        return $this;
    }
    
    /**
     * Description:关联详情
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     * @author lidong<947714443@qq.com>
     * @date   2021/7/2 0002
     */
    public function details()
    {
        return $this->hasMany(OrderMobileRechargeDetails::class, 'order_mobile_id', 'id');
    }
    
    /**
     * Description:
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     * @author lidong<947714443@qq.com>
     * @date   2021/7/6 0006
     */
    public function orders()
    {
        return $this->belongsTo(Order::class, 'order_id', 'id');
    }
}
