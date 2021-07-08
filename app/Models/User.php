<?php

namespace App\Models;

use Dcat\Admin\Traits\HasDateTimeFormatter;
use Illuminate\Database\Eloquent\Model;
use App\Exceptions\LogicException;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;
use Laravel\Sanctum\HasApiTokens;
/**
 * App\Models\User
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
 * @property-read User|null $invite
 * @property-read \App\Models\UserData|null $userData
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereAvatar($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereBanReason($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereBirth($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereBusinessIntegral($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereBusinessLk($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCodeInvite($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereIntegral($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereInviteUid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereIsAuth($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereLk($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereMemberHead($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRealName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereReturnBusinessIntegral($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereReturnIntegral($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereReturnLk($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRole($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereSalt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereSex($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereSign($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUsername($value)
 * @mixin \Eloquent
 * @property int $market_business 市商身份，0不是，1是
 * @method static \Illuminate\Database\Eloquent\Builder|User whereMarketBusiness($value)
 */
class User extends Model
{
	use HasDateTimeFormatter;

	protected $fillable = [
        'invite_uid',
        'phone',
        'username',
        'salt',
        'code_invite',
	    'status',
        'ban_reason'
    ];
    //正常用户状态
    const STATUS_NORMAL = 1;

    const STATUS_BANNED = 2;//已封禁

    const ROLE_NORMAL   = 1;  //普通用户

    const ROLE_BUSINESS = 2;//商家

    const NO_IS_AUTH    = 1;   //未实名

    const YES_IS_AUTH   = 2;  //已实名

    const CUSTOMER      = 1;     //普通用户

    const LEADER        = 2;       //盟主


    /**
     * 用户信息
     */
    public function userData()
    {
        return $this->hasOne(UserData::class, 'uid');

    }

    /**
     * 要邀请人信息
     */
    public function invite()
    {
        return $this->belongsTo(User::class, 'invite_uid','id');
    }

    //修改密码
    public function changePassword(string $password)
    {
        $salt = Str::random(6);
        //$password = '123456';
        Password::create([
            'password' => encrypt_password($this->phone, $password, $salt),
        ]);
        $this->update(['salt' => $salt]);
    }
}
