<?php

namespace App\Models;

use Dcat\Admin\Traits\HasDateTimeFormatter;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\UserData
 *
 * @property int $id
 * @property int $uid uid
 * @property string|null $last_login 最后登录时间
 * @property string|null $last_ip 最后登录ip
 * @property string|null $change_address_time 上次修改地址时间
 * @property string|null $change_password_time 上次修改密码时间
 * @property string|null $change_password_ip 修改密码ip
 * @property string|null $id_card 身份证号
 * @property string|null $name 姓名
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|UserData newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserData newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserData query()
 * @method static \Illuminate\Database\Eloquent\Builder|UserData whereChangeAddressTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserData whereChangePasswordIp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserData whereChangePasswordTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserData whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserData whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserData whereIdCard($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserData whereLastIp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserData whereLastLogin($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserData whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserData whereUid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserData whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class UserData extends Model
{
	use HasDateTimeFormatter;
    protected $table = 'user_data';

    /**
     * 用户信息
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'uid','id');
    }

}
