<?php

namespace App\Models;

use Dcat\Admin\Traits\HasDateTimeFormatter;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\LkShopMallOrder
 *
 * @property int $id
 * @property int $uid 消费者UID
 * @property int $business_uid 商户UID
 * @property string $profit_ratio 让利比列(%)
 * @property string $price 消费金额
 * @property string $profit_price 实际让利金额
 * @property int $status 1审核中，2审核通过，3审核失败
 * @property string|null $name 消费商品名
 * @property string|null $order_no 商户订单号
 * @property int|null $oid order 表 -- id
 * @property string|null $description 订单类型：lkshop_sh 商户订单 lkshop_1688 1688订单
 * @property string|null $remark 备注
 * @property int $shop_order_id 商城订单id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int|null $is_confirm 确认收货状态：0=未确认，1=已确认收货
 * @method static \Illuminate\Database\Eloquent\Builder|LkShopMallOrder newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|LkShopMallOrder newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|LkShopMallOrder query()
 * @method static \Illuminate\Database\Eloquent\Builder|LkShopMallOrder whereBusinessUid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LkShopMallOrder whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LkShopMallOrder whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LkShopMallOrder whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LkShopMallOrder whereIsConfirm($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LkShopMallOrder whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LkShopMallOrder whereOid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LkShopMallOrder whereOrderNo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LkShopMallOrder wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LkShopMallOrder whereProfitPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LkShopMallOrder whereProfitRatio($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LkShopMallOrder whereRemark($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LkShopMallOrder whereShopOrderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LkShopMallOrder whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LkShopMallOrder whereUid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LkShopMallOrder whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class LkShopMallOrder extends Model
{
	use HasDateTimeFormatter;
    protected $table = 'lkshop_order';

}
