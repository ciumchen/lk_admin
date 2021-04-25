<?php

namespace App\Models;

use Dcat\Admin\Traits\HasDateTimeFormatter;

use Illuminate\Database\Eloquent\Model;

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
}
