<?php

namespace App\Models;

use Exception;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * App\Models\UserAlipayAuthToken
 *
 * @property int         $id
 * @property int         $uid                   用户ID
 * @property string      $auth_code             支付宝用户授权后的auth_code
 * @property string      $app_id                用户授权APPID
 * @property string      $source                用户授权source
 * @property string      $scope                 用户授权scope
 * @property int         $is_used               是否已被使用过:0未使用,1已使用
 * @property string      $alipay_user_id        用户支付宝UID
 * @property string      $alipay_alipay_user_id 用户支付宝alipay_user_id
 * @property string      $access_token          用户访问令牌
 * @property int         $expires_in            访问令牌的有效时间，单位是秒
 * @property string      $refresh_token         刷新令牌。通过该令牌可以刷新access_token
 * @property int         $re_expires_in         刷新令牌的有效时间，单位是秒
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static Builder|UserAlipayAuthToken newModelQuery()
 * @method static Builder|UserAlipayAuthToken newQuery()
 * @method static Builder|UserAlipayAuthToken query()
 * @method static Builder|UserAlipayAuthToken whereAppId($value)
 * @method static Builder|UserAlipayAuthToken whereAuthCode($value)
 * @method static Builder|UserAlipayAuthToken whereCreatedAt($value)
 * @method static Builder|UserAlipayAuthToken whereId($value)
 * @method static Builder|UserAlipayAuthToken whereScope($value)
 * @method static Builder|UserAlipayAuthToken whereSource($value)
 * @method static Builder|UserAlipayAuthToken whereUid($value)
 * @method static Builder|UserAlipayAuthToken whereUpdatedAt($value)
 * @method static Builder|UserAlipayAuthToken whereAccessToken($value)
 * @method static Builder|UserAlipayAuthToken whereAlipayUserId($value)
 * @method static Builder|UserAlipayAuthToken whereExpiresIn($value)
 * @method static Builder|UserAlipayAuthToken whereIsUsed($value)
 * @method static Builder|UserAlipayAuthToken whereReExpiresIn($value)
 * @method static Builder|UserAlipayAuthToken whereRefreshToken($value)
 * @method static Builder|UserAlipayAuthToken whereAlipayAlipayUserId($value)
 * @mixin \Eloquent
 */
class UserAlipayAuthToken extends Model
{
    use HasFactory;
    
    protected $table = 'user_alipay_auth_token';
    
    /**
     * Description:通过UID获取用户授权token
     *
     * @param $uid
     *
     * @return mixed|null
     * @author lidong<947714443@qq.com>
     * @date   2021/8/7 0007
     */
    public static function getUserAuthCode($uid)
    {
        try {
            $userToken = UserAlipayAuthToken::whereUid($uid)
                                            ->where(
                                                'updated_at',
                                                '>',
                                                date('Y-m-d H:i:s', strtotime('-1 days'))
                                            )
                                            ->where('is_used', '=', '0')
                                            ->orderByDesc('created_at')
                                            ->first();
            if (empty($userToken)) {
                throw new Exception('UserAlipayAuthToken-无数据');
            }
            $userToken->is_used = 1;
            $userToken->save();
        } catch (Exception $e) {
            return null;
        }
        return $userToken->auth_code;
    }
    
    /**
     * Description:
     *
     * @param int    $uid
     * @param string $auth_code
     * @param string $app_id
     * @param string $source
     * @param string $scope
     *
     * @throws \Exception
     * @author lidong<947714443@qq.com>
     * @date   2021/8/7 0007
     */
    public function saveAuthCode($uid, $auth_code, $app_id, $source, $scope)
    {
        try {
            $info = UserAlipayAuthToken::whereUid($uid)->first();
            if ($info) {
                $info->is_used = 0;
                $info->auth_code = $auth_code;
                $info->app_id = $app_id;
                $info->source = $source;
                $info->scope = $scope;
                $info->save();
                $id = $info->id;
            } else {
                $this->uid = $uid;
                $this->auth_code = $auth_code;
                $this->app_id = $app_id;
                $this->source = $source;
                $this->scope = $scope;
                $this->save();
                $id = $this->id;
            }
        } catch (Exception $e) {
            throw $e;
        }
        return $id;
    }
}
