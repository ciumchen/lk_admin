<?php


namespace App\Models;

use Dcat\Admin\Traits\HasDateTimeFormatter;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\UserIdImg
 *
 * @property int $id
 * @property int $uid 商户uid
 * @property int $business_apply_id business_apply表的id
 * @property string|null $img_just 身份证正面照
 * @property string|null $img_back 身份证反面照
 * @property string|null $img_hold 身份证手持照
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|UserIdImg newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserIdImg newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserIdImg query()
 * @method static \Illuminate\Database\Eloquent\Builder|UserIdImg whereBusinessApplyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserIdImg whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserIdImg whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserIdImg whereImgBack($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserIdImg whereImgHold($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserIdImg whereImgJust($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserIdImg whereUid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserIdImg whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property string $order_no 订单号
 * @property string $mobile 充值手机号
 * @property int $order_id 订单(order)表ID
 * @property string $money 充值金额
 * @property string $trade_no 接口方返回单号
 * @property int $status 充值状态:0充值中,1成功,9撤销
 * @property int $pay_status 平台订单付款状态:0未付款,1已付款
 * @property string $goods_title 商品名称
 * @property int $create_type 订单类型:1充值订单,代充订单
 * @property int $num 数量
 * @property int $has_child 是否有子订单
 * @method static \Illuminate\Database\Eloquent\Builder|MobileAgent whereCreateType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MobileAgent whereGoodsTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MobileAgent whereHasChild($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MobileAgent whereMobile($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MobileAgent whereMoney($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MobileAgent whereNum($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MobileAgent whereOrderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MobileAgent whereOrderNo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MobileAgent wherePayStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MobileAgent whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MobileAgent whereTradeNo($value)
 */
class MobileAgent extends Model
{
    protected $table = 'order_mobile_recharge';
}
