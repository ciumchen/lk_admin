<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\IntegralLogs
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
 * @property-read mixed $updated_date
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|IntegralLogs newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|IntegralLogs newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|IntegralLogs query()
 * @method static \Illuminate\Database\Eloquent\Builder|IntegralLogs whereActivityState($value)
 * @method static \Illuminate\Database\Eloquent\Builder|IntegralLogs whereAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|IntegralLogs whereAmountBeforeChange($value)
 * @method static \Illuminate\Database\Eloquent\Builder|IntegralLogs whereConsumerUid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|IntegralLogs whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|IntegralLogs whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|IntegralLogs whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|IntegralLogs whereIp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|IntegralLogs whereOperateType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|IntegralLogs whereOrderNo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|IntegralLogs whereRemark($value)
 * @method static \Illuminate\Database\Eloquent\Builder|IntegralLogs whereRole($value)
 * @method static \Illuminate\Database\Eloquent\Builder|IntegralLogs whereUid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|IntegralLogs whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|IntegralLogs whereUserAgent($value)
 * @mixin \Eloquent
 */
class IntegralLogs extends Model
{
    protected $table = 'integral_log';
    const TYPE_SPEND = 'spend';
    const TYPE_REBATE = 'rebate';

    protected $appends = ['updated_date'];



    public static $typeLabel = [
        'consumption' => '消费增加',
        'Jangli' => '让利增加',
        self::TYPE_SPEND => '消费订单完成',
        self::TYPE_REBATE => '分红扣除积分',
    ];

    public static $rolLabel = [
        1 => '普通积分',
        2 => '商家积分',
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
        'order_no',
        'activityState',
        'consumer_uid',
        'description'
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
    public static function addLog($uid, $amount, $operateType, $amountBeforeChange, $role, $remark = '',$orderNo='',$activityState=0,$consumer_uid='',$description='')
    {

        self::create([
            'uid' => $uid,
            'amount' => $amount,
            'amount_before_change' => $amountBeforeChange,
            'operate_type' => $operateType,
            'role' => $role,
            'remark' => $remark,
            'ip' => '',
            'user_agent' => '',
            'order_no'=>$orderNo,
            'activityState'=>$activityState,
            'consumer_uid'=>$consumer_uid,
            'description'=>$description
        ]);

    }

    public function getUpdatedDateAttribute($value)
    {
//        dd($value);
        return date("Y-m-d H:i:s",strtotime($this->attributes['updated_at']));
    }

}
