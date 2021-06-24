<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\OrderAirRefund
 *
 * @property int $id
 * @property string|null $trade_no 订单主编号
 * @property int $return_type 退票类型:3-退票
 * @property string|null $order_nos 订单子单编号集合
 * @property \Illuminate\Support\Carbon|null $created_at 创建时间
 * @property \Illuminate\Support\Carbon|null $updated_at 更新时间
 * @method static \Illuminate\Database\Eloquent\Builder|OrderAirRefund newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|OrderAirRefund newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|OrderAirRefund query()
 * @method static \Illuminate\Database\Eloquent\Builder|OrderAirRefund whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderAirRefund whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderAirRefund whereOrderNos($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderAirRefund whereReturnType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderAirRefund whereTradeNo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderAirRefund whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class OrderAirRefund extends Model
{
    use HasFactory;

    protected $table = 'order_air_refund';
}
