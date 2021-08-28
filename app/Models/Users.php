<?php

namespace App\Models;

use Dcat\Admin\Traits\HasDateTimeFormatter;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

/**
 * App\Models\Users
 *
 * @property int $id
 * @property int|null $invite_uid 邀请人id
 * @property int $role 1普通用户，2商家
 * @property int $business_lk 商家权
 * @property int $lk 消费者权
 * @property string $integral 消费者积分
 * @property string $business_integral 商家积分
 * @property string $phone 手机号
 * @property string|null $username 用户名
 * @property string|null $avatar 用户名头像
 * @property string $salt 盐
 * @property string $code_invite 邀请码
 * @property int $status 1正常，2异常
 * @property int $is_auth 1未实名，2已实名
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string $return_integral 已返消费者积分
 * @property string $return_business_integral 已返商家积分
 * @property string $return_lk 已返LK积分
 * @property string|null $ban_reason 封禁原因
 * @property int $member_head 1为普通用户，2为盟主
 * @property string $sign 个性签名
 * @property int $sex 性别:0保密,1男,2女
 * @property string|null $birth 生日
 * @property string $real_name 真实姓名
 * @method static \Illuminate\Database\Eloquent\Builder|Users newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Users newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Users query()
 * @method static \Illuminate\Database\Eloquent\Builder|Users whereAvatar($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Users whereBanReason($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Users whereBirth($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Users whereBusinessIntegral($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Users whereBusinessLk($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Users whereCodeInvite($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Users whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Users whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Users whereIntegral($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Users whereInviteUid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Users whereIsAuth($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Users whereLk($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Users whereMemberHead($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Users wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Users whereRealName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Users whereReturnBusinessIntegral($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Users whereReturnIntegral($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Users whereReturnLk($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Users whereRole($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Users whereSalt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Users whereSex($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Users whereSign($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Users whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Users whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Users whereUsername($value)
 * @mixin \Eloquent
 * @property int $market_business 市商身份，0不是，1是
 * @method static \Illuminate\Database\Eloquent\Builder|Users whereMarketBusiness($value)
 * @property int|null $shop_uid 商城用户uid
 * @property int|null $member_status 来客会员状态，0普通用户，1会员
 * @property string $alipay_user_id 用户支付宝ID
 * @property string $alipay_account 用户支付宝账户
 * @property string $alipay_nickname 用户支付宝昵称
 * @property string $alipay_avatar 用户支付宝头像
 * @property string $balance_tuan 拼团金额账户
 * @property string $balance_allowance 可提现额度[补贴]
 * @property string $balance_consume 再消费额度
 * @method static \Illuminate\Database\Eloquent\Builder|Users whereAlipayAccount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Users whereAlipayAvatar($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Users whereAlipayNickname($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Users whereAlipayUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Users whereBalanceAllowance($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Users whereBalanceConsume($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Users whereBalanceTuan($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Users whereMemberStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Users whereShopUid($value)
 * @property string $gather_card 拼团购物卡金额
 * @method static \Illuminate\Database\Eloquent\Builder|Users whereGatherCard($value)
 */
class Users extends Model
{
    use HasDateTimeFormatter;
    
    protected $table = 'users';
    
    /**
     * Description:
     *
     * @param  array  $filter
     * @param  int  $limit
     *
     * @return \Illuminate\Support\Collection
     * @author lidong<947714443@qq.com>
     * @date 2021/8/23 0023
     */
    public static function getAllUserListWithoutIds(array $filter = [], int $limit = 0)
    : Collection {
        $Users = Users::whereNotIn('id', $filter);
        if ($limit > 0) {
            $Users->limit($limit);
        }
        return $Users->get();
    }
    
    /**
     * Description:
     *
     * @return array
     * @author lidong<947714443@qq.com>
     * @date 2021/8/23 0023
     */
    public static function getUserAllIds()
    : array
    {
        return Users::all()->pluck('id')->toArray();
    }
    
    /**
     * Description:
     *
     * @param  array  $ids
     *
     * @return \Illuminate\Support\Collection
     * @author lidong<947714443@qq.com>
     * @date 2021/8/23 0023
     */
    public static function getUserList(array $ids = [], $limit = 0)
    : Collection {
        $Users = Users::whereIn('id', $ids);
        if ($limit > 0) {
            $Users->limit($limit);
        }
        return $Users->get();
    }
}
