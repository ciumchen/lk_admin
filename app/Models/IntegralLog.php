<?php

namespace App\Models;

use Dcat\Admin\Traits\HasDateTimeFormatter;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\IntegralLog
 *
 * @property int $id
 * @property int $uid uid
 * @property string $operate_type 操作类型
 * @property string $amount 变动数量
 * @property string $amount_before_change 变动前数量
 * @property int $role 1普通用户，2商家
 * @property string|null $ip ip
 * @property string|null $user_agent ua
 * @property string|null $remark 备注
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $order_no trade_order表 -- order_no
 * @property int|null $activityState 积分活动状态,0表示关闭,1标识开启
 * @property int|null $consumer_uid 贡献积分的消费者uid
 * @property string|null $description 订单类型
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|IntegralLog newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|IntegralLog newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|IntegralLog query()
 * @method static \Illuminate\Database\Eloquent\Builder|IntegralLog whereActivityState($value)
 * @method static \Illuminate\Database\Eloquent\Builder|IntegralLog whereAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|IntegralLog whereAmountBeforeChange($value)
 * @method static \Illuminate\Database\Eloquent\Builder|IntegralLog whereConsumerUid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|IntegralLog whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|IntegralLog whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|IntegralLog whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|IntegralLog whereIp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|IntegralLog whereOperateType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|IntegralLog whereOrderNo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|IntegralLog whereRemark($value)
 * @method static \Illuminate\Database\Eloquent\Builder|IntegralLog whereRole($value)
 * @method static \Illuminate\Database\Eloquent\Builder|IntegralLog whereUid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|IntegralLog whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|IntegralLog whereUserAgent($value)
 * @mixin \Eloquent
 */
class IntegralLog extends Model
{
	use HasDateTimeFormatter;
    protected $table = 'integral_log';

    const TYPE_SPEND = 'spend';
    const TYPE_REBATE = 'rebate';

    /**
     * 类型文本.
     *
     * @var array
     */
    public static $operateTypeTexts = [
        self::TYPE_SPEND => '消费订单完成',
        self::TYPE_REBATE => '分红扣除积分',

    ];
    protected $fillable = [
        'uid',
        'amount',
        'amount_before_change',
        'operate_type',
        'role',
        'remark',
        'ip',
        'user_agent',
    ];
    /**
     * 用户信息
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'uid','id');
    }

    /**写入日志
     * @param $uid
     * @param $amount
     * @param $operateType
     * @param $amountBeforeChange
     * @param string $remark
     * @param $role
     */
    public static function addLog($uid, $amount, $operateType, $amountBeforeChange, $role, $remark = '')
    {

        self::create([
            'uid' => $uid,
            'amount' => $amount,
            'amount_before_change' => $amountBeforeChange,
            'operate_type' => $operateType,
            'role' => $role,
            'remark' => $remark,
            'ip' => '',
            'user_agent' => ''
        ]);

    }

    const INTEGRAL_TYPE = [
        'HF'     => '话费',
        'YK'     => '油卡',
        'MT'     => '美团',
        'ZL'     => '代充',
        'LR'     => '录单',
        'VC'     => '视频会员',
        'AT'     => '飞机票',
        'UB'     => '生活缴费',
        'CLP'    => '兑换额度(话费)',
        'CLM'    => '兑换额度(美团)',
        'SHOP'   => '来客优选',
        'MZL'    => '批量代充',
        'KTHY'   => '开通会员',
        'PT'     => '拼团补贴',
        'rebate' => '分红扣除',
        'GLR'    => '广告补贴',
    ];
}
