<?php

namespace App\Models;

use Dcat\Admin\Traits\HasDateTimeFormatter;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\ShopMch
 *
 * @property int $id
 * @property int $store_id
 * @property int $user_id
 * @property int $addtime
 * @property int $is_delete
 * @property int $is_open 是否营业：0=否，1=是
 * @property int $is_lock 是否被系统关闭：0=否，1=是
 * @property int $review_status 审核状态：0=待审核，1=审核通过，2=审核不通过
 * @property string|null $review_result 审核结果
 * @property int $review_time 审核时间
 * @property string $realname
 * @property string $tel
 * @property string $name
 * @property int $province_id
 * @property int $city_id
 * @property int $district_id
 * @property string $address
 * @property int $mch_common_cat_id 所售类目
 * @property int $o2o_cat_id o2o商户入驻分类
 * @property string $service_tel 客服电话
 * @property string|null $logo logo
 * @property string|null $header_bg 背景图
 * @property int $transfer_rate 商户手续费
 * @property string $account_money 商户余额
 * @property int $sort 排序：升序
 * @property string|null $wechat_name 微信号
 * @property int $is_recommend 好店推荐：0.不推荐|1.推荐
 * @property int $is_popular 热门店铺推荐   0 不推荐 1推荐
 * @property string $longitude 经度
 * @property string $latitude 纬度
 * @property string $main_content 主营范围
 * @property string|null $summary
 * @property int $mch_type 商家入驻类型   1 B2B2C商户   2 O2O商户  3 平台供应商
 * @property int $mch_money_status 商户入驻保证金是否缴纳   0 未缴纳   1 已缴纳
 * @property float|null $mch_money 商户入驻费用
 * @property string|null $mch_message 商户自定义资料
 * @property int $fictitious_follow 商户虚拟粉丝（关注)人数
 * @property int|null $is_invoice 是否开具发票 0 否 1是 默认 0
 * @property string|null $choice_invoice 选择的发票类型 1 普票 2 增值税专用发票
 * @property int|null $account_type 分账类型 1=微信支付宝账户  2=微信/支付宝指定账户
 * @property string|null $wx_account_name 微信收款方账号
 * @property string|null $alipay_account_name 支付宝收款账户
 * @property string|null $collection_app_key 99api密钥
 * @method static \Illuminate\Database\Eloquent\Builder|ShopMch newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ShopMch newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ShopMch query()
 * @method static \Illuminate\Database\Eloquent\Builder|ShopMch whereAccountMoney($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShopMch whereAccountType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShopMch whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShopMch whereAddtime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShopMch whereAlipayAccountName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShopMch whereChoiceInvoice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShopMch whereCityId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShopMch whereCollectionAppKey($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShopMch whereDistrictId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShopMch whereFictitiousFollow($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShopMch whereHeaderBg($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShopMch whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShopMch whereIsDelete($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShopMch whereIsInvoice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShopMch whereIsLock($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShopMch whereIsOpen($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShopMch whereIsPopular($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShopMch whereIsRecommend($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShopMch whereLatitude($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShopMch whereLogo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShopMch whereLongitude($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShopMch whereMainContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShopMch whereMchCommonCatId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShopMch whereMchMessage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShopMch whereMchMoney($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShopMch whereMchMoneyStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShopMch whereMchType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShopMch whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShopMch whereO2oCatId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShopMch whereProvinceId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShopMch whereRealname($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShopMch whereReviewResult($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShopMch whereReviewStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShopMch whereReviewTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShopMch whereServiceTel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShopMch whereSort($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShopMch whereStoreId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShopMch whereSummary($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShopMch whereTel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShopMch whereTransferRate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShopMch whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShopMch whereWechatName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShopMch whereWxAccountName($value)
 * @mixin \Eloquent
 */
class ShopMch extends Model
{
	use HasDateTimeFormatter;
    protected $connection = 'mysql_center';
    protected $table = "ttshop_mch";

    public function getMchUserId($mch_id){
        return ShopMch::where('id',$mch_id)->value('user_id');
    }

}
