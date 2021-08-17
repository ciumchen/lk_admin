<?php

namespace App\Models;

use Dcat\Admin\Traits\HasDateTimeFormatter;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\ShopUser
 *
 * @property int $id
 * @property int $type 用户类型：0=管理员，1=普通用户
 * @property string $username
 * @property string $password
 * @property string $auth_key
 * @property string $access_token
 * @property int $addtime
 * @property int $is_delete
 * @property string $wechat_open_id 微信openid
 * @property string $wechat_union_id 微信用户union id
 * @property string $nickname 昵称
 * @property string $avatar_url 头像url
 * @property int $store_id 商城id
 * @property int $is_distributor 是否是分销商 0--不是 1--是 2--申请中
 * @property int $parent_id 父级ID
 * @property int $time 成为分销商的时间
 * @property string $total_price 累计佣金
 * @property string $price 可提现佣金
 * @property int $is_clerk 是否是核销员 0--不是 1--是
 * @property int $saas_id SaaS账户id
 * @property int|null $shop_id
 * @property int|null $level 会员等级
 * @property int $integral 用户当前积分
 * @property int $total_integral 用户总获得积分
 * @property string|null $money 余额
 * @property string|null $contact_way 联系方式
 * @property string|null $comments 备注
 * @property string|null $binding 授权手机号
 * @property string $wechat_platform_open_id 微信公众号openid
 * @property int $platform 小程序平台 0 => 微信, 1 => 支付宝
 * @property int $blacklist 黑名单 0.否 | 1.是
 * @property int $parent_user_id 可能成为上级的ID
 * @property int|null $is_app 是否app注册  0否  1是
 * @property int|null $mch_id 商户id 商户后台设置管理员时用到
 * @property string|null $clientid 客户id
 * @property string|null $apple_openid 苹果openID
 * @property int|null $is_web 1 = pc  2 = mobile
 * @property string|null $app_source app来源
 * @method static \Illuminate\Database\Eloquent\Builder|ShopUser newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ShopUser newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ShopUser query()
 * @method static \Illuminate\Database\Eloquent\Builder|ShopUser whereAccessToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShopUser whereAddtime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShopUser whereAppSource($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShopUser whereAppleOpenid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShopUser whereAuthKey($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShopUser whereAvatarUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShopUser whereBinding($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShopUser whereBlacklist($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShopUser whereClientid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShopUser whereComments($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShopUser whereContactWay($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShopUser whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShopUser whereIntegral($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShopUser whereIsApp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShopUser whereIsClerk($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShopUser whereIsDelete($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShopUser whereIsDistributor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShopUser whereIsWeb($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShopUser whereLevel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShopUser whereMchId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShopUser whereMoney($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShopUser whereNickname($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShopUser whereParentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShopUser whereParentUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShopUser wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShopUser wherePlatform($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShopUser wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShopUser whereSaasId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShopUser whereShopId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShopUser whereStoreId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShopUser whereTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShopUser whereTotalIntegral($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShopUser whereTotalPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShopUser whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShopUser whereUsername($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShopUser whereWechatOpenId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShopUser whereWechatPlatformOpenId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShopUser whereWechatUnionId($value)
 * @mixin \Eloquent
 */
class ShopUser extends Model
{
	use HasDateTimeFormatter;
    protected $connection = 'mysql_center';
    protected $table = "ttshop_user";


}
