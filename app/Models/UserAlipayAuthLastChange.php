<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * App\Models\UserAlipayAuthLastChange
 *
 * @property int         $id
 * @property int         $user_id               用户ID
 * @property string      $alipay_user_id        用户alipayID
 * @property string      $alipay_nickname       用户支付宝昵称
 * @property string      $alipay_avatar         用户支付宝头像
 * @property string      $alipay_alipay_user_id 用户支付宝alipay_user_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static Builder|UserAlipayAuthLastChange newModelQuery()
 * @method static Builder|UserAlipayAuthLastChange newQuery()
 * @method static Builder|UserAlipayAuthLastChange query()
 * @method static Builder|UserAlipayAuthLastChange whereAlipayAlipayUserId($value)
 * @method static Builder|UserAlipayAuthLastChange whereAlipayAvatar($value)
 * @method static Builder|UserAlipayAuthLastChange whereAlipayNickname($value)
 * @method static Builder|UserAlipayAuthLastChange whereAlipayUserId($value)
 * @method static Builder|UserAlipayAuthLastChange whereCreatedAt($value)
 * @method static Builder|UserAlipayAuthLastChange whereId($value)
 * @method static Builder|UserAlipayAuthLastChange whereUpdatedAt($value)
 * @method static Builder|UserAlipayAuthLastChange whereUserId($value)
 * @mixin \Eloquent
 */
class UserAlipayAuthLastChange extends Model
{
    use HasFactory;
    
    protected $table = 'user_alipay_auth_last_change';
    
    /**
     * Description:获取用户
     *
     * @param $uid
     *
     * @return int
     * @author lidong<947714443@qq.com>
     * @date   2021/8/16 0016
     */
    public static function getLastLog($uid)
    {
        $time = UserAlipayAuthLastChange::whereUserId($uid)->orderByDesc('created_at')->value('created_at');
        return (empty($time) ? 0 : $time->toDateTimeString());
    }
    
    /**
     * Description:记录用户最后一次授权
     *
     * @param $uid
     * @param $alipay_user_id
     * @param $alipay_nickname
     * @param $alipay_avatar
     * @param $alipay_alipay_user_id
     *
     * @throws \Exception
     * @author lidong<947714443@qq.com>
     * @date   2021/8/16 0016
     */
    public function saveLog($uid, $alipay_user_id, $alipay_nickname, $alipay_avatar, $alipay_alipay_user_id)
    {
        try {
            $this->user_id = $uid;
            $this->alipay_user_id = $alipay_user_id;
            $this->alipay_nickname = $alipay_nickname;
            $this->alipay_avatar = $alipay_avatar;
            $this->alipay_alipay_user_id = $alipay_alipay_user_id;
            $this->save();
        } catch (\Exception $e) {
            throw $e;
        }
    }
}
