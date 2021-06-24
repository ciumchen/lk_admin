<?php

namespace App\Models;

use Dcat\Admin\Traits\HasDateTimeFormatter;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\LkPhoneBillOrder
 *
 * @property int $id
 * @property int|null $user_id 买家id
 * @property string|null $title 商品标题
 * @property string $price 商品价格
 * @property int|null $num 购买数量
 * @property string|null $numeric 话费：手机号；美团、油卡：卡号
 * @property string|null $telecom 话费充值运营商
 * @property string|null $pay_time 付款时间
 * @property string|null $end_time 结束时间
 * @property string|null $modified_time 最后更新时间
 * @property string $status 交易状态：await 待支付；pending 支付处理中； succeeded 支付成功；failed 支付失败
 * @property string $order_from 订单来源：alipay；wx
 * @property string $order_no 订单号
 * @property string $need_fee 支付金额
 * @property string $profit_ratio 让利比例
 * @property string $profit_price 实际让利金额
 * @property string $integral 订单用户积分
 * @property string|null $description 支付附加说明：MT - 美团；HF - 话费；YK - 油卡
 * @property int|null $oid order表 -- id
 * @property \Illuminate\Support\Carbon|null $created_at 创建时间
 * @property string|null $remarks 美团卡用户姓名
 * @property \Illuminate\Support\Carbon|null $updated_at 更新时间
 * @property-read \App\Models\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder|LkPhoneBillOrder newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|LkPhoneBillOrder newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|LkPhoneBillOrder query()
 * @method static \Illuminate\Database\Eloquent\Builder|LkPhoneBillOrder whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LkPhoneBillOrder whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LkPhoneBillOrder whereEndTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LkPhoneBillOrder whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LkPhoneBillOrder whereIntegral($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LkPhoneBillOrder whereModifiedTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LkPhoneBillOrder whereNeedFee($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LkPhoneBillOrder whereNum($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LkPhoneBillOrder whereNumeric($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LkPhoneBillOrder whereOid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LkPhoneBillOrder whereOrderFrom($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LkPhoneBillOrder whereOrderNo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LkPhoneBillOrder wherePayTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LkPhoneBillOrder wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LkPhoneBillOrder whereProfitPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LkPhoneBillOrder whereProfitRatio($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LkPhoneBillOrder whereRemarks($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LkPhoneBillOrder whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LkPhoneBillOrder whereTelecom($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LkPhoneBillOrder whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LkPhoneBillOrder whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LkPhoneBillOrder whereUserId($value)
 * @mixin \Eloquent
 */
class LkPhoneBillOrder extends Model
{
	use HasDateTimeFormatter;


    protected $table = 'trade_order';

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id','id');
    }

}
