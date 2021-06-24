<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\OrderVideo
 *
 * @method static \Illuminate\Database\Eloquent\Builder|OrderVideo newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|OrderVideo newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|OrderVideo query()
 * @mixin \Eloquent
 * @property int $id
 * @property string $order_no 订单号
 * @property int $user_id 充值用户ID
 * @property string $account 充值账号
 * @property int $order_id 订单表ID
 * @property string $money 充值金额
 * @property string $trade_no 接口方返回单号
 * @property int $pay_status 平台订单付款状态:0未付款,1已付款
 * @property int $status 充值状态:0充值中,1成功,9撤销
 * @property string $goods_title 商品名称
 * @property string $item_id 会员充值 标准商品编号
 * @property int $create_type 订单类型:1优酷会员,2迅雷会员,3土豆会员,4爱奇艺会员,5乐视会员,6好莱坞会员,7芒果TV移动PC端会员,8芒果TV全屏会员,9搜狐会员,10腾讯会员,
 * @property \Illuminate\Support\Carbon|null $created_at 创建时间
 * @property \Illuminate\Support\Carbon|null $updated_at 更新时间
 * @property string $channel 下单渠道:bm斑马力方,ww万维易源
 * @property string|null $card_list 订单卡密信息
 * @method static \Illuminate\Database\Eloquent\Builder|OrderVideo whereAccount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderVideo whereCardList($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderVideo whereChannel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderVideo whereCreateType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderVideo whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderVideo whereGoodsTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderVideo whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderVideo whereItemId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderVideo whereMoney($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderVideo whereOrderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderVideo whereOrderNo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderVideo wherePayStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderVideo whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderVideo whereTradeNo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderVideo whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderVideo whereUserId($value)
 */
class OrderVideo extends Model
{
    
    use HasFactory;
    
    protected $table = 'order_video';
}
