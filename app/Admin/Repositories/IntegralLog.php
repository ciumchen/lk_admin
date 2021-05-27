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
    ];
}
