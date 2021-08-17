<?php


namespace App\Models;

use Dcat\Admin\Traits\HasDateTimeFormatter;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\ManyMobile
 *
 * @property int $id
 * @property int $order_mobile_id order_mobile订单ID
 * @property int $order_id order订单ID
 * @property string $order_no 子订单号
 * @property string $trade_no 接口方返回单号
 * @property string $mobile 充值手机
 * @property string $money 充值金额
 * @property int $status 充值状态:0充值中,1成功,9撤销
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|ManyMobile newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ManyMobile newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ManyMobile query()
 * @method static \Illuminate\Database\Eloquent\Builder|ManyMobile whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ManyMobile whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ManyMobile whereMobile($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ManyMobile whereMoney($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ManyMobile whereOrderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ManyMobile whereOrderMobileId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ManyMobile whereOrderNo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ManyMobile whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ManyMobile whereTradeNo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ManyMobile whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class ManyMobile extends Model
{
    protected $table = 'order_mobile_recharge_details';
}
