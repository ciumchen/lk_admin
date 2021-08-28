<?php

namespace App\Models;

use Dcat\Admin\Traits\HasDateTimeFormatter;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\UserLpjLog
 *
 * @method static \Illuminate\Database\Eloquent\Builder|UserLpjLog newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserLpjLog newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserLpjLog query()
 * @mixin \Eloquent
 * @property int $id
 * @property int|null $uid users表 -- id
 * @property string|null $operate_type 操作类型,充值：recharge，提现：withdrawal，消费：consumption
 * @property string $money 变动来拼金
 * @property string $money_before_change 变动前来拼金
 * @property string $order_no 充值订单号
 * @property int $status 充值状态:1处理中,2成功,3失败
 * @property string|null $remark 备注
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|UserLpjLog whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserLpjLog whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserLpjLog whereMoney($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserLpjLog whereMoneyBeforeChange($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserLpjLog whereOperateType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserLpjLog whereOrderNo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserLpjLog whereRemark($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserLpjLog whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserLpjLog whereUid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserLpjLog whereUpdatedAt($value)
 */
class UserLpjLog extends Model
{
	use HasDateTimeFormatter;
    protected $table = 'user_lpj_log';

    const STATUS_DEFAULT       = 1;
    const STATUS_SUCCESS       = 2;
    const STATUS_REFUSED       = 3;

    /**
     * 类型.
     */
    const USER_TYPE_SF1 = 'recharge';
    const USER_TYPE_SF2 = 'withdrawal';
    const USER_TYPE_SF3 = 'consumption';

    const USER_STATUS_SF1 = 1;
    const USER_STATUS_SF2 = 2;
    const USER_STATUS_SF3 = 3;

    /**
     * 状态
     *
     * @var array
     */
    public static $statusLabel = [
        self::STATUS_DEFAULT => "处理中",
        self::STATUS_SUCCESS => "成功",
        self::STATUS_REFUSED => "失败",
    ];

    static public $statusLabelStyle = [
        self::STATUS_DEFAULT => 'primary',
        self::STATUS_SUCCESS => 'success',
        self::STATUS_REFUSED => 'danger',
        4                    => 'info',
    ];


    public static $operateTypeTexts = [
        self::USER_TYPE_SF1 => "充值",
        self::USER_TYPE_SF2 => "提现",
        self::USER_TYPE_SF3 => "消费",
    ];

    public static $operateStatus = [
        self::USER_STATUS_SF1 => "处理中",
        self::USER_STATUS_SF2 => "成功",
        self::USER_STATUS_SF3 => "失败",
    ];

}
