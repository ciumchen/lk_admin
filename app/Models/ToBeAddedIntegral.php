<?php

namespace App\Models;

use Dcat\Admin\Traits\HasDateTimeFormatter;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\ToBeAddedIntegral
 *
 * @property int $id
 * @property int $uid 消费者UID
 * @property int $business_uid 商家UID
 * @property string|null $profit_ratio 让利比列(%)
 * @property string $price 消费金额
 * @property string|null $profit_price 实际让利金额
 * @property int $status 1审核中，2审核通过，3审核失败
 * @property string $name 消费商品名
 * @property string|null $remark 备注
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int $state 盟主订单标识,1非盟主订单，2盟主订单
 * @property string|null $pay_status 支付状态：await 待支付；pending 支付处理中； succeeded 支付成功；failed 支付失败,ddyc订单异常
 * @property string|null $to_be_added_integral 用户待加积分
 * @property int|null $to_status 订单处理状态：默认0,1表示待处理,2表示已处理
 * @property int|null $line_up 排队状态,默认0不排队,1表示排队
 * @property string $order_no 斑马充值订单号
 * @property-read \App\Models\User $business
 * @property-read \App\Models\BusinessData $businessData
 * @property-read \App\Models\TradeOrder $select_trade_order
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|ToBeAddedIntegral newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ToBeAddedIntegral newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ToBeAddedIntegral query()
 * @method static \Illuminate\Database\Eloquent\Builder|ToBeAddedIntegral whereBusinessUid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ToBeAddedIntegral whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ToBeAddedIntegral whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ToBeAddedIntegral whereLineUp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ToBeAddedIntegral whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ToBeAddedIntegral whereOrderNo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ToBeAddedIntegral wherePayStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ToBeAddedIntegral wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ToBeAddedIntegral whereProfitPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ToBeAddedIntegral whereProfitRatio($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ToBeAddedIntegral whereRemark($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ToBeAddedIntegral whereState($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ToBeAddedIntegral whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ToBeAddedIntegral whereToBeAddedIntegral($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ToBeAddedIntegral whereToStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ToBeAddedIntegral whereUid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ToBeAddedIntegral whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property int|null $import_day 导入日期
 * @property int|null $member_gl_oid 购买来客会员邀请人订单关联用户订单oid
 * @method static \Illuminate\Database\Eloquent\Builder|ToBeAddedIntegral whereImportDay($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ToBeAddedIntegral whereMemberGlOid($value)
 */
class ToBeAddedIntegral extends Model
{
	use HasDateTimeFormatter;
    protected $table = 'order';
    public function user()
    {
        return $this->belongsTo(User::class, 'uid','id');
    }

    /**
     * 商家信息
     */
    public function business()
    {
        return $this->belongsTo(User::class, 'business_uid','id');
    }

    public function select_trade_order()
    {
        return $this->belongsTo(TradeOrder::class, 'id','oid');
    }

    /**商家资料
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function businessData(){
        return $this->belongsTo(BusinessData::class, 'business_uid','uid');
    }
}
