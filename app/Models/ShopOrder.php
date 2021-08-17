<?php

namespace App\Models;

use Dcat\Admin\Traits\HasDateTimeFormatter;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\ShopOrder
 *
 * @property int $id
 * @property int $store_id
 * @property int $user_id 用户id
 * @property string $order_no 订单号
 * @property string $total_price 订单总费用(包含运费）
 * @property string $pay_price 实际支付总费用(含运费）
 * @property string $express_price 运费
 * @property string|null $name 收货人姓名
 * @property string|null $mobile 收货人手机
 * @property string|null $address 收货地址
 * @property string $remark 订单备注
 * @property int $is_pay 支付状态：0=未支付，1=已支付
 * @property int $pay_type 支付方式：1=微信支付
 * @property int $pay_time 支付时间
 * @property int $is_send 发货状态：0=未发货，1=已发货
 * @property int $send_time 发货时间
 * @property string $express 物流公司
 * @property string $express_no
 * @property int $is_confirm 确认收货状态：0=未确认，1=已确认收货
 * @property int $confirm_time 确认收货时间
 * @property int $is_comment 是否已评价：0=未评价，1=已评价
 * @property int $apply_delete 是否申请取消订单：0=否，1=申请取消订单
 * @property int $addtime
 * @property int $is_delete
 * @property int $is_price 是否发放佣金
 * @property int $parent_id 用户上级ID
 * @property string $first_price 一级佣金
 * @property string $second_price 二级佣金
 * @property string $third_price 三级佣金
 * @property string $coupon_sub_price 优惠券抵消金额
 * @property string|null $content
 * @property int $is_offline 是否到店自提 0--否 1--是
 * @property int|null $clerk_id 核销员user_id
 * @property string|null $address_data 收货地址信息，json格式
 * @property int $is_cancel 是否取消
 * @property string|null $offline_qrcode 核销码
 * @property string|null $before_update_price 修改前的价格
 * @property int|null $shop_id 自提门店ID
 * @property string|null $discount 会员折扣
 * @property int|null $user_coupon_id 使用的优惠券ID
 * @property string|null $integral 积分使用
 * @property int $give_integral 是否发放积分【1=> 已发放 ， 0=> 未发放】
 * @property int|null $parent_id_1 用户上二级ID
 * @property int|null $parent_id_2 用户上三级ID
 * @property int|null $is_sale 是否超过售后时间
 * @property string|null $words 商家留言
 * @property string|null $version 版本
 * @property string|null $express_price_1 减免的运费
 * @property int|null $is_recycle
 * @property string|null $rebate 自购返利
 * @property string|null $before_update_express 价格修改前的运费
 * @property string|null $seller_comments 商家备注
 * @property int $mch_id 入驻商户id
 * @property int $order_union_id 合并订单的id
 * @property int $is_transfer 是否已转入商户账户：0=否，1=是
 * @property int|null $type 0:普通订单 1大转盘订单 2虚拟商品 3卡密商品 4o2o商品
 * @property string|null $share_price 发放佣金的金额
 * @property int $is_show 是否显示 0--不显示 1--显示
 * @property string $currency 货币：活力币
 * @property string|null $consumer_price 消费卡抵扣金额
 * @property int|null $consumer_id 使用的消费卡id
 * @property int|null $invoice_type 发票类型 0 无 1 普票 2增值税专用票
 * @property int|null $invoice_id 用户发票抬头id
 * @property string|null $send_email 卡密虚拟商品发送的邮箱
 * @property int|null $is_balance 是否余额抵扣 0 否 1是
 * @property string|null $user_dedu_balance 用户余额抵扣金额
 * @property int|null $order_source 订单来源 1微信小程序 2 微信公众号 3 App 4 PC
 * @property int|null $vr_type 虚拟商品类型  0正常 1虚拟 2卡密
 * @property int|null $transfer_rate 扣除比列 千分之 0-1000
 * @property int|null $is_revoke 订单是否取消已退款 0否 1是
 * @property string|null $ali_order_no 1688订单号
 * @property int|null $ali_is_pay 1688订单是否支付
 * @property string|null $ali_sum_price 1688商品总金额
 * @property string|null $ali_refund 1688退款信息
 * @property int|null $is_live 是否直播订单 0 否 1是
 * @property int|null $anchor_id 主播id 默认 0
 * @property int|null $is_live_price 是否发放提成 默认0 否 1 是
 * @property string|null $live_price 主播提成的金额
 * @property int|null $live_id 直播间id
 * @property int|null $is_quick 是否为快速下单  默认0 否  1 是
 * @property int|null $is_partner 是否是收付通 1=是
 * @property string|null $jdvop_order_no 京东vop订单号
 * @property int|null $jdvop_is_pay 是否支付 0 = 未支付   1 = 已经支付
 * @property string|null $jdvop_sum_price 京东订单总金额   ，包含运费
 * @property string|null $jdvop_refund 京东vop退款金额
 * @property int|null $jdvop_is_invoice vop订单是否开票  0 =  未开票   1  = 已开票
 * @property string $platform_ratio 平台比例
 * @property string $mch_ratio 商户比例
 * @property-read \App\Models\ShopUser $mchUser
 * @method static \Illuminate\Database\Eloquent\Builder|ShopOrder newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ShopOrder newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ShopOrder query()
 * @method static \Illuminate\Database\Eloquent\Builder|ShopOrder whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShopOrder whereAddressData($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShopOrder whereAddtime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShopOrder whereAliIsPay($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShopOrder whereAliOrderNo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShopOrder whereAliRefund($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShopOrder whereAliSumPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShopOrder whereAnchorId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShopOrder whereApplyDelete($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShopOrder whereBeforeUpdateExpress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShopOrder whereBeforeUpdatePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShopOrder whereClerkId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShopOrder whereConfirmTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShopOrder whereConsumerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShopOrder whereConsumerPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShopOrder whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShopOrder whereCouponSubPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShopOrder whereCurrency($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShopOrder whereDiscount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShopOrder whereExpress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShopOrder whereExpressNo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShopOrder whereExpressPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShopOrder whereExpressPrice1($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShopOrder whereFirstPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShopOrder whereGiveIntegral($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShopOrder whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShopOrder whereIntegral($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShopOrder whereInvoiceId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShopOrder whereInvoiceType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShopOrder whereIsBalance($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShopOrder whereIsCancel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShopOrder whereIsComment($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShopOrder whereIsConfirm($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShopOrder whereIsDelete($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShopOrder whereIsLive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShopOrder whereIsLivePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShopOrder whereIsOffline($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShopOrder whereIsPartner($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShopOrder whereIsPay($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShopOrder whereIsPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShopOrder whereIsQuick($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShopOrder whereIsRecycle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShopOrder whereIsRevoke($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShopOrder whereIsSale($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShopOrder whereIsSend($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShopOrder whereIsShow($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShopOrder whereIsTransfer($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShopOrder whereJdvopIsInvoice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShopOrder whereJdvopIsPay($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShopOrder whereJdvopOrderNo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShopOrder whereJdvopRefund($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShopOrder whereJdvopSumPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShopOrder whereLiveId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShopOrder whereLivePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShopOrder whereMchId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShopOrder whereMchRatio($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShopOrder whereMobile($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShopOrder whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShopOrder whereOfflineQrcode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShopOrder whereOrderNo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShopOrder whereOrderSource($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShopOrder whereOrderUnionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShopOrder whereParentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShopOrder whereParentId1($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShopOrder whereParentId2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShopOrder wherePayPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShopOrder wherePayTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShopOrder wherePayType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShopOrder wherePlatformRatio($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShopOrder whereRebate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShopOrder whereRemark($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShopOrder whereSecondPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShopOrder whereSellerComments($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShopOrder whereSendEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShopOrder whereSendTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShopOrder whereSharePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShopOrder whereShopId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShopOrder whereStoreId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShopOrder whereThirdPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShopOrder whereTotalPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShopOrder whereTransferRate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShopOrder whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShopOrder whereUserCouponId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShopOrder whereUserDeduBalance($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShopOrder whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShopOrder whereVersion($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShopOrder whereVrType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShopOrder whereWords($value)
 * @mixin \Eloquent
 */
class ShopOrder extends Model
{
	use HasDateTimeFormatter;
    protected $connection = 'mysql_center';
    protected $table = "ttshop_order";


    public function mchUser(){
        return $this->belongsTo(ShopUser::class, 'id', 'oid');
    }
}
