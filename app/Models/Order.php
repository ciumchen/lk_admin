<?php

namespace App\Models;

use App\Admin\Repositories\AdvertTrade;
use Dcat\Admin\Traits\HasDateTimeFormatter;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Order
 *
 * @property int                                       $id
 * @property int                                       $uid                  消费者UID
 * @property int                                       $business_uid         商家UID
 * @property string|null                               $profit_ratio         让利比列(%)
 * @property string                                    $price                消费金额
 * @property string|null                               $profit_price         实际让利金额
 * @property int                                       $status               1审核中，2审核通过，3审核失败
 * @property string                                    $name                 消费商品名
 * @property string|null                               $remark               备注
 * @property \Illuminate\Support\Carbon|null           $created_at
 * @property \Illuminate\Support\Carbon|null           $updated_at
 * @property int                                       $state                盟主订单标识,1非盟主订单，2盟主订单
 * @property string|null                               $pay_status           支付状态：await 待支付；pending 支付处理中； succeeded
 *           支付成功；failed 支付失败,ddyc订单异常
 * @property string|null                               $to_be_added_integral 用户待加积分
 * @property int|null                                  $to_status            订单处理状态：默认0,1表示待处理,2表示已处理
 * @property int|null                                  $line_up              排队状态,默认0不排队,1表示排队
 * @property string                                    $order_no             斑马充值订单号
 * @property-read \App\Models\User                     $business
 * @property-read \App\Models\BusinessData             $businessData
 * @property-read \App\Models\TradeOrder               $select_trade_order
 * @property-read \App\Models\User                     $user
 * @method static \Illuminate\Database\Eloquent\Builder|Order newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Order newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Order query()
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereBusinessUid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereLineUp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereOrderNo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order wherePayStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereProfitPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereProfitRatio($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereRemark($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereState($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereToBeAddedIntegral($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereToStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereUid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property-read \App\Models\OrderAirTrade|null       $air
 * @property-read \App\Models\OrderMobileRecharge|null $mobile
 * @property-read \App\Models\OrderVideo               $order_video
 * @property-read \App\Models\TradeOrder|null          $trade
 * @property-read \App\Models\OrderUtilityBill|null    $utility
 * @property-read \App\Models\OrderVideo|null          $video
 * @property int|null $import_day 导入日期
 * @property int|null $member_gl_oid 购买来客会员邀请人订单关联用户订单oid
 * @property-read \App\Models\ConvertLogs|null $convert
 * @property-read \App\Models\GatherTrade|null $gatherTrade
 * @property-read \App\Models\LkshopOrder $lkshop_order
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereImportDay($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereMemberGlOid($value)
 * @property string $description 订单类型
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereDescription($value)
 */
class Order extends Model
{

    use HasDateTimeFormatter;

    protected $table = 'order';

    const STATUS_DEFAULT = 1;//审核中

    const STATUS_SUCCEED = 2;//审核通过

    const STATUS_FAILED  = 3;//审核不通过

    /**
     * 类型文本.
     *
     * @var array
     */
    public static $statusLabel = [
        self::STATUS_DEFAULT => '正在审核',
        self::STATUS_SUCCEED => '审核通过',
        self::STATUS_FAILED  => '审核不通过',
    ];

    /**
     * 用户信息
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'uid', 'id');
    }

    /**
     * 商家信息
     */
    public function business()
    {
        return $this->belongsTo(User::class, 'business_uid', 'id');
    }

    public function select_trade_order()
    {
        return $this->belongsTo(TradeOrder::class, 'id', 'oid');
    }

    /**商家资料
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function businessData()
    {
        return $this->belongsTo(BusinessData::class, 'business_uid', 'uid');
    }

    /**视频会员卡
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function order_video()
    {
        return $this->belongsTo(OrderVideo::class, 'id', 'order_id');
    }

    public function lkshop_order()
    {
        return $this->belongsTo(LkshopOrder::class, 'id', 'oid');
    }

    //******************************************************************************************************
    //获取订单号
    public function getOrderNo($orderId, $Order = null)
    {
        if (empty($Order)) {
            $Order = Order::find($orderId);
        }
        try {
            $orderNo = '';
            $data = '';
            if (empty($Order)) {
                throw new Exception('订单数据为空');
            }
            if (!empty($data = $Order->trade)) { /* 兼容trade_order */
                $description = $Order->trade->description;
                $orderNo = $data->order_no;
            }
            if (!empty($data = $Order->video)) { /* 视频会员订单 */
                $description = 'VC';
                $orderNo = $data->order_no;
            }
            if (!empty($data = $Order->air)) { /* 机票订单 */
                $description = 'AT';
                $orderNo = $data->order_no;
            }
            if (!empty($data = $Order->utility)) { /* 生活缴费 */
                $description = 'UB';
                $orderNo = $data->order_no;
            }
            /* 判断 是否已经获取到对应类型的订单*/
            return $orderNo;
            if (empty($description)) {
                return $description = 0;
            }
        } catch (Exception $e) {
            throw $e;
        }
        return $description;
    }

    /*
    * Description:TradeOrder表关联
    *
    * @return \Illuminate\Database\Eloquent\Relations\HasOne
    * @author lidong<947714443@qq.com>
    * @date   2021/6/11 0011
    */
    public function trade()
    {
        return $this->hasOne(TradeOrder::class, 'oid', 'id');
    }

    /**
     * Description:视频会员订单关联模型
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     * @author lidong<947714443@qq.com>
     * @date   2021/6/11 0011
     */
    public function video()
    {
        return $this->hasOne(OrderVideo::class, 'order_id', 'id');
    }

    /**
     * Description:
     * TODO:机票订单关联模型
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     * @author lidong<947714443@qq.com>
     * @date   2021/6/11 0011
     */
    public function air()
    {
        return $this->hasOne(OrderAirTrade::class, 'oid', 'id');
    }

    /**
     * Description:斑马手机充值
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     * @author lidong<947714443@qq.com>
     * @date   2021/6/11 0011
     */
    public function mobile()
    {
        return $this->hasOne(OrderMobileRecharge::class, 'order_id', 'id');
    }

    /**
     * Description:斑马生活缴费
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     * @author lidong<947714443@qq.com>
     * @date   2021/6/15 0015
     */
    public function utility()
    {
        return $this->hasOne(OrderUtilityBill::class, 'order_id', 'id');
    }

    /**
     * Description:兑换充值
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     * @author
     * @date
     */
    public function convert()
    {
        return $this->hasOne(ConvertLogs::class, 'oid', 'id');
    }

    /**
     * Description:拼团录单
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     * @author
     * @date
     */
    public function gatherTrade()
    {
        return $this->hasOne(GatherTrade::class, 'oid', 'id');
    }

    /**
     * Description:广告录单
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     * @author
     * @date
     */
    public function advertTrade()
    {
        return $this->hasOne(AdvertTrade::class, 'oid');
    }
}
