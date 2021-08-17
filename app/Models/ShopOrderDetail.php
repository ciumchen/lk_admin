<?php

namespace App\Models;

use Dcat\Admin\Traits\HasDateTimeFormatter;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\ShopOrderDetail
 *
 * @property int $id
 * @property int $order_id
 * @property int $goods_id
 * @property int $num 商品数量
 * @property string $total_price 此商品的总价
 * @property int $addtime
 * @property int $is_delete
 * @property string $attr 商品规格
 * @property string $pic 商品规格图片
 * @property int $integral 单品积分获得
 * @property int $is_level 是否使用会员折扣 0--不适用 1--使用
 * @property string|null $vr_list_id 对应购买的卡密id，多个则逗号分隔
 * @property int|null $vr_data_id 对应的卡库id
 * @property int|null $type 类型 0 普通商品 1虚拟 2卡密
 * @property string|null $auto_vr_cont 虚拟商品发货内容
 * @property int|null $auto_send 是否自动发货 0 否 1是
 * @property int|null $parts_id 套餐id
 * @property string|null $parts_price 套餐价格
 * @property string|null $consumer_price 消费卡单商品抵扣金额
 * @property string|null $user_dedu_balance 组合支付余额抵扣金额
 * @property string|null $reality_price 没优惠抵扣的商品价格
 * @property string|null $ali_unit_price 1688商品单价
 * @property int $live_id 主播id
 * @property string $live_price 主播分销价格
 * @method static \Illuminate\Database\Eloquent\Builder|ShopOrderDetail newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ShopOrderDetail newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ShopOrderDetail query()
 * @method static \Illuminate\Database\Eloquent\Builder|ShopOrderDetail whereAddtime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShopOrderDetail whereAliUnitPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShopOrderDetail whereAttr($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShopOrderDetail whereAutoSend($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShopOrderDetail whereAutoVrCont($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShopOrderDetail whereConsumerPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShopOrderDetail whereGoodsId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShopOrderDetail whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShopOrderDetail whereIntegral($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShopOrderDetail whereIsDelete($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShopOrderDetail whereIsLevel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShopOrderDetail whereLiveId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShopOrderDetail whereLivePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShopOrderDetail whereNum($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShopOrderDetail whereOrderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShopOrderDetail wherePartsId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShopOrderDetail wherePartsPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShopOrderDetail wherePic($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShopOrderDetail whereRealityPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShopOrderDetail whereTotalPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShopOrderDetail whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShopOrderDetail whereUserDeduBalance($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShopOrderDetail whereVrDataId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShopOrderDetail whereVrListId($value)
 * @mixin \Eloquent
 */
class ShopOrderDetail extends Model
{
	use HasDateTimeFormatter;
    protected $connection = 'mysql_center';
    protected $table = "ttshop_order_detail";


//    public function mchUser(){
//        return $this->belongsTo(ShopUser::class, 'id', 'oid');
//    }
}
