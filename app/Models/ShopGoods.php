<?php

namespace App\Models;

use Dcat\Admin\Traits\HasDateTimeFormatter;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\ShopGoods
 *
 * @property int         $id
 * @property int         $store_id
 * @property string      $name                    商品名称
 * @property string      $price                   售价
 * @property string      $original_price          原价（只做显示用）
 * @property string      $detail                  商品详情，图文
 * @property int         $cat_id                  商品类别
 * @property int         $status                  上架状态：0=下架，1=上架 -1从选品库待审核
 * @property int         $addtime
 * @property int         $is_delete
 * @property string      $attr                    规格的库存及价格
 * @property string      $service                 商品服务选项
 * @property int         $sort                    排序  升序
 * @property int         $virtual_sales           虚拟销量
 * @property string|null $cover_pic               商品缩略图
 * @property string|null $video_url               视频
 * @property string      $unit                    单位
 * @property int         $individual_share        是否单独分销设置：0=否，1=是
 * @property string      $share_commission_first  一级分销佣金比例
 * @property string      $share_commission_second 二级分销佣金比例
 * @property string      $share_commission_third  三级分销佣金比例
 * @property float|null  $weight                  重量
 * @property int         $freight                 运费模板ID
 * @property string|null $full_cut                满减
 * @property string|null $integral                积分设置
 * @property int         $use_attr                是否使用规格：0=不使用，1=使用
 * @property int|null    $share_type              佣金配比 0--百分比 1--固定金额
 * @property int|null    $quick_purchase          是否加入快速购买  0--关闭   1--开启
 * @property int|null    $hot_cakes               是否加入热销  0--关闭   1--开启
 * @property string|null $cost_price
 * @property int         $member_discount         是否参与会员折扣  0=参与   1=不参与
 * @property string|null $rebate                  自购返利
 * @property int         $mch_id                  入驻商户的id
 * @property int         $goods_num               商品总库存
 * @property int         $mch_sort                多商户自己的排序
 * @property int         $confine_count           购买限制:0.不限制|大于0等于限购数量
 * @property int         $is_level                是否享受会员折扣 0-不享受 1--享受
 * @property int         $type                    类型 0--商城或多商户 2--砍价商品
 * @property int         $is_negotiable           是否面议 0 不面议 1面议
 * @property int         $attr_setting_type       分销设置类型 0.普通设置|1.详细设置
 * @property int         $is_spell                是否拼单 1拼单 0不拼单
 * @property int         $is_recycle              回收站删除 0 未删除 1已删除
 * @property int         $brand_id                品牌id
 * @property string      $subtitle                商品副标题
 * @property int         $auto_send               虚拟商品 是否自动发货 0 否 1是
 * @property string|null $auto_vr_cont            自动发货的内容
 * @property int         $wares_id                选品库id
 * @property int|null    $wares_status            供货商商品状态 1下架 2删除 3店铺不存在
 * @property int         $card_data               选择卡密库的id
 * @property int         $vr_type                 是否虚拟 0 否(默认) 1 虚拟 2 卡密
 * @property int         $is_examine              是否审核 0未审核 1审核通过 2审核失败
 * @property string|null $payment                 砍价支付方式
 * @property int|null    $source                  商品来源 0=普通商品 1=淘宝 2=天猫 3=京东 4=1688
 * @property int|null    $osg_id                  1688商品id
 * @property string|null $purchase_price          成本价
 * @property string|null $supplierLoginId         1688店铺id
 * @property int|null    $is_lead                 是否开启直播带货 0 否 1是
 * @property int|null    $lead_type               直播带货类型 0 百分比 1 固定金额  默认 0
 * @property string|null $lead_price              直播提现金额
 * @property int|null    $is_hot                  商品热卖 1=热卖
 * @property int|null    $is_best                 商品推荐  1=推荐
 * @property int|null    $mch_is_hot              商户热卖 1=热卖
 * @property int|null    $mch_is_best             商户推荐 1=商户推荐
 * @property string|null $lead_attr               使用属性展示的直播价格
 * @property string|null $label_id                标签id
 * @property string|null $price_increase          1688售价加价比例
 * @property string|null $market_increase         1688市场价加价比例
 * @property int|null    $packing_id              包装清单id
 * @property int|null    $after_sales_id          售后保障id
 * @property int|null    $vop_id                  京东vop商品货号
 * @property string|null $wareQD                  vop商品包装清单
 * @property int|null    $isSelf                  是否自营  0=非自营   1--自营
 * @property string      $platform_ratio          商户比例
 * @property string      $mch_ratio               平台比例
 * @method static Builder|ShopGoods newModelQuery()
 * @method static Builder|ShopGoods newQuery()
 * @method static Builder|ShopGoods query()
 * @method static Builder|ShopGoods whereAddtime($value)
 * @method static Builder|ShopGoods whereAfterSalesId($value)
 * @method static Builder|ShopGoods whereAttr($value)
 * @method static Builder|ShopGoods whereAttrSettingType($value)
 * @method static Builder|ShopGoods whereAutoSend($value)
 * @method static Builder|ShopGoods whereAutoVrCont($value)
 * @method static Builder|ShopGoods whereBrandId($value)
 * @method static Builder|ShopGoods whereCardData($value)
 * @method static Builder|ShopGoods whereCatId($value)
 * @method static Builder|ShopGoods whereConfineCount($value)
 * @method static Builder|ShopGoods whereCostPrice($value)
 * @method static Builder|ShopGoods whereCoverPic($value)
 * @method static Builder|ShopGoods whereDetail($value)
 * @method static Builder|ShopGoods whereFreight($value)
 * @method static Builder|ShopGoods whereFullCut($value)
 * @method static Builder|ShopGoods whereGoodsNum($value)
 * @method static Builder|ShopGoods whereHotCakes($value)
 * @method static Builder|ShopGoods whereId($value)
 * @method static Builder|ShopGoods whereIndividualShare($value)
 * @method static Builder|ShopGoods whereIntegral($value)
 * @method static Builder|ShopGoods whereIsBest($value)
 * @method static Builder|ShopGoods whereIsDelete($value)
 * @method static Builder|ShopGoods whereIsExamine($value)
 * @method static Builder|ShopGoods whereIsHot($value)
 * @method static Builder|ShopGoods whereIsLead($value)
 * @method static Builder|ShopGoods whereIsLevel($value)
 * @method static Builder|ShopGoods whereIsNegotiable($value)
 * @method static Builder|ShopGoods whereIsRecycle($value)
 * @method static Builder|ShopGoods whereIsSelf($value)
 * @method static Builder|ShopGoods whereIsSpell($value)
 * @method static Builder|ShopGoods whereLabelId($value)
 * @method static Builder|ShopGoods whereLeadAttr($value)
 * @method static Builder|ShopGoods whereLeadPrice($value)
 * @method static Builder|ShopGoods whereLeadType($value)
 * @method static Builder|ShopGoods whereMarketIncrease($value)
 * @method static Builder|ShopGoods whereMchId($value)
 * @method static Builder|ShopGoods whereMchIsBest($value)
 * @method static Builder|ShopGoods whereMchIsHot($value)
 * @method static Builder|ShopGoods whereMchRatio($value)
 * @method static Builder|ShopGoods whereMchSort($value)
 * @method static Builder|ShopGoods whereMemberDiscount($value)
 * @method static Builder|ShopGoods whereName($value)
 * @method static Builder|ShopGoods whereOriginalPrice($value)
 * @method static Builder|ShopGoods whereOsgId($value)
 * @method static Builder|ShopGoods wherePackingId($value)
 * @method static Builder|ShopGoods wherePayment($value)
 * @method static Builder|ShopGoods wherePlatformRatio($value)
 * @method static Builder|ShopGoods wherePrice($value)
 * @method static Builder|ShopGoods wherePriceIncrease($value)
 * @method static Builder|ShopGoods wherePurchasePrice($value)
 * @method static Builder|ShopGoods whereQuickPurchase($value)
 * @method static Builder|ShopGoods whereRebate($value)
 * @method static Builder|ShopGoods whereService($value)
 * @method static Builder|ShopGoods whereShareCommissionFirst($value)
 * @method static Builder|ShopGoods whereShareCommissionSecond($value)
 * @method static Builder|ShopGoods whereShareCommissionThird($value)
 * @method static Builder|ShopGoods whereShareType($value)
 * @method static Builder|ShopGoods whereSort($value)
 * @method static Builder|ShopGoods whereSource($value)
 * @method static Builder|ShopGoods whereStatus($value)
 * @method static Builder|ShopGoods whereStoreId($value)
 * @method static Builder|ShopGoods whereSubtitle($value)
 * @method static Builder|ShopGoods whereSupplierLoginId($value)
 * @method static Builder|ShopGoods whereType($value)
 * @method static Builder|ShopGoods whereUnit($value)
 * @method static Builder|ShopGoods whereUseAttr($value)
 * @method static Builder|ShopGoods whereVideoUrl($value)
 * @method static Builder|ShopGoods whereVirtualSales($value)
 * @method static Builder|ShopGoods whereVopId($value)
 * @method static Builder|ShopGoods whereVrType($value)
 * @method static Builder|ShopGoods whereWareQD($value)
 * @method static Builder|ShopGoods whereWaresId($value)
 * @method static Builder|ShopGoods whereWaresStatus($value)
 * @method static Builder|ShopGoods whereWeight($value)
 * @mixin \Eloquent
 */
class ShopGoods extends Model
{
    use HasDateTimeFormatter;
    
    protected $connection = 'mysql_center';
    
    protected $table = "ttshop_goods";

//    public function mchUser(){
//        return $this->belongsTo(ShopUser::class, 'id', 'oid');
//    }
}
