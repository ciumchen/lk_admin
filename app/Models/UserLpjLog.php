<?php

namespace App\Models;

use Dcat\Admin\Traits\HasDateTimeFormatter;

use Illuminate\Database\Eloquent\Model;

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
