<?php

namespace App\Models;

use Dcat\Admin\Traits\HasDateTimeFormatter;

use Illuminate\Database\Eloquent\Model;


/**
 * App\Models\LkshopOrder
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
 * @method static \Illuminate\Database\Eloquent\Builder|LkshopOrder newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|LkshopOrder newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|LkshopOrder query()
 * @method static \Illuminate\Database\Eloquent\Builder|LkshopOrder whereBusinessUid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LkshopOrder whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LkshopOrder whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LkshopOrder whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LkshopOrder whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LkshopOrder whereOid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LkshopOrder whereOrderNo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LkshopOrder wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LkshopOrder whereProfitPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LkshopOrder whereProfitRatio($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LkshopOrder whereRemark($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LkshopOrder whereShopOrderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LkshopOrder whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LkshopOrder whereUid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LkshopOrder whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class LkshopOrder extends Model
{
    use HasDateTimeFormatter;

    protected $table = 'lkshop_order';


}
