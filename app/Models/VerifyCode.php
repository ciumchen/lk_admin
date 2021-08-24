<?php

namespace App\Models;

use App\Exceptions\LogicException;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;
use Overtrue\EasySms\EasySms;
use Overtrue\EasySms\Exceptions\NoGatewayAvailableException;

/**
 * App\Models\VerifyCode
 *
 * @property int $id
 * @property string $phone 手机号
 * @property string $code 验证码
 * @property int $type 类型: 1 登录，2 注册，3 修改密码
 * @property int $used 是否使用
 * @property string|null $expires_at 过期时间
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|VerifyCode newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|VerifyCode newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|VerifyCode query()
 * @method static \Illuminate\Database\Eloquent\Builder|VerifyCode whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VerifyCode whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VerifyCode whereExpiresAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VerifyCode whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VerifyCode wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VerifyCode whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VerifyCode whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VerifyCode whereUsed($value)
 * @mixin \Eloquent
 */
class VerifyCode extends Model
{
    //验证码类型
    const TYPE_REGISTER = 1;//注册
    const TYPE_LOGIN = 2;//登录
    const TYPE_FORGET_PASSWORD = 3;//找回密码
    const TYPE_WITHDRAW_TO_WALLET = 4;//提现到钱包
    const TYPE_UPDATE_USER_PHONE = 5;//修改用户手机号
    const TYPE_TONGYONG = 100;//通用验证码
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'phone',
        'code',
        'type',
        'used',
        'expires_at',
    ];

    public static $typeLabels = [
        self::TYPE_LOGIN => 'login',
        self::TYPE_REGISTER => 'register',
        self::TYPE_FORGET_PASSWORD => 'forget_password',
        self::TYPE_WITHDRAW_TO_WALLET => 'withdraw_to_wallet',
        self::TYPE_UPDATE_USER_PHONE => 'update_user_phone',
        self::TYPE_TONGYONG => 'tongyong',

    ];

    public static $typeTexts = [
        self::TYPE_LOGIN => '登录',
        self::TYPE_REGISTER => '注册',
        self::TYPE_FORGET_PASSWORD => '找回密码',
        self::TYPE_WITHDRAW_TO_WALLET => '提现到钱包',
        self::TYPE_UPDATE_USER_PHONE => '修改用户手机号',
        self::TYPE_TONGYONG => '通用验证码',

    ];

    public static $typeTemplates = [
        self::TYPE_LOGIN => 'SMS_196170272',
        self::TYPE_REGISTER => 'SMS_196170270',
        self::TYPE_FORGET_PASSWORD => 'SMS_196170269',
        self::TYPE_WITHDRAW_TO_WALLET => 'SMS_196170273',
        self::TYPE_UPDATE_USER_PHONE => 'SMS_219395043',
        self::TYPE_TONGYONG => 'SMS_222455404',
    ];

    /**
     * 将验证码标记为已使用.
     *
     * @return void
     */
    public function markAsUsed()
    {
        $this->update([
            'used' => 1,
        ]);
    }

    /**发送验证码
     * @param string $phone
     * @param string $code
     * @param int $type
     * @return mixed
     * @throws LogicException
     */
    public static function send(string $phone, string $code, int $type)
    {
        if (!in_array($type, array_keys(self::$typeLabels))) {
            throw new LogicException('无效的验证码类型');
        }

        if (in_array($type, [self::TYPE_REGISTER])) {
            if (User::hasPhone($phone)) {
                throw new LogicException('手机号已被使用');
            }
        } else {
            if (!User::hasPhone($phone)) {
                throw new LogicException('手机号未注册');
            }
        }

        if (!Cache::add('verify_code_'.$phone.'_'.$type.'_locked', 1, 60)) {
            throw new LogicException('验证码发送过快，请稍后再试');
        }

        if (app()->environment('prod', 'production')) {
            try {
                $easySms = new EasySms(config('easysms'));

                $easySms->send($phone, [
                    'template' => self::$typeTemplates[$type],
                    'data' => [
                        'code' => $code,
                    ],
                ]);
            } catch (NoGatewayAvailableException $e) {
                foreach ($e->getExceptions() as $exception) {
                    report($exception);
                }
            } catch (\Exception $e) {
                report($e);
            }
        }

        $verifyCode = static::create([
            'phone' => $phone,
            'code' => $code,
            'type' => $type,
            'expires_at' => now()->addMinutes(3),
        ]);

        return $verifyCode;
    }

    /**
     * 确认验证码是否正确.
     *
     * @param string $phone
     * @param string $code
     * @param int    $type
     *
     * @return bool
     */
    public static function check(string $phone, string $code, int $type): bool
    {
        $latest = static::where('phone', $phone)->where('type', $type)->latest()->first();

        if (null === $latest ||
            $latest->used ||
            now()->gt($latest->expires_at) ||
            $latest->code !== $code) {
            return false;
        }

        $latest->markAsUsed();

        Cache::forget('verify_code_'.$phone.'_'.$type.'_locked');

        return true;
    }

    public static function updateUserPhonCheck(string $phone, string $code, int $type): bool
    {
        $latest = static::where('phone', $phone)->where('type', $type)->latest()->first();
        if (null === $latest ||
            $latest->used ||
            (time() > strtotime($latest->expires_at)) ||
            $latest->code !== $code) {
            return false;
        }

        $latest->markAsUsed();

        Cache::forget('verify_code_'.$phone.'_'.$type.'_locked');

        return true;
    }
}
