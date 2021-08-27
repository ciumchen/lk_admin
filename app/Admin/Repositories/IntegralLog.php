<?php

namespace App\Admin\Repositories;

use App\Models\IntegralLog as Model;
use Dcat\Admin\Repositories\EloquentRepository;

class IntegralLog extends EloquentRepository
{
    /**
     * Model.
     *
     * @var string
     */
    protected $eloquentClass = Model::class;

    /**
     * 类型.
     */
    const USER_STATUS_SF1 = 1;
    const USER_STATUS_SF2 = 2;

    const TYPE_HF = 'HF';
    const TYPE_YK = 'YK';
    const TYPE_MT = 'MT';
    const TYPE_ZL = 'ZL';

    const TYPE_LR = 'LR';
    const TYPE_VC = 'VC';
    const TYPE_AT = 'AT';
    const TYPE_UB = 'UB';
    const TYPE_CLP = 'CLP';
    const TYPE_CLM = 'CLM';
    const TYPE_SHOP = 'SHOP';
    const TYPE_MZL = 'MZL';
    const TYPE_KTHY = 'KTHY';
    const TYPE_PT = 'PT';
    const TYPE_rebate = 'rebate';

    /**
     * 类型文本.
     *
     * @var array
     */
    public static $operateTypeTexts = [
        self::USER_STATUS_SF1 => "普通用户",
        self::USER_STATUS_SF2 => "商家",
    ];

    public static $ontegralLogTypeTexts = [
        self::TYPE_HF => "话费",
        self::TYPE_YK => "油卡",
        self::TYPE_MT => "美团",
        self::TYPE_ZL => "代充",

        self::TYPE_LR => "录单",
        self::TYPE_VC => "视频会员",
        self::TYPE_AT => "飞机票",
        self::TYPE_UB => "生活缴费",
        self::TYPE_CLP => "兑换额度(话费)",
        self::TYPE_CLM => "兑换额度(美团)",
        self::TYPE_SHOP => "来客优选",
        self::TYPE_MZL => "批量代充",
        self::TYPE_KTHY => "开通会员",
        self::TYPE_PT => "拼团补贴",
        self::TYPE_rebate => "分红扣除",
    ];
}
