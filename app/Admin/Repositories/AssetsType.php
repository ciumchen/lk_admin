<?php

namespace App\Admin\Repositories;

use App\Models\AssetsType as Model;
use Dcat\Admin\Repositories\EloquentRepository;

class AssetsType extends EloquentRepository
{
    /**
     * Model.
     *
     * @var string
     */
    protected $eloquentClass = Model::class;

    const CAN_RECHARGE = 1;//可充值
    const CANT_RECHARGE = 2;//不可充值
    const CAN_WITHDRAW = 1;//可提现
    const CANT_WITHDRAW = 2;//不可提现

    /**
     * 是否可充值
     * @var string[]
     */
    public static $rechargeLabel = [
        self::CAN_RECHARGE => '可充值',
        self::CANT_RECHARGE => '不可充值',
    ];

    /**
     * 是否可提现
     * @var string[]
     */
    public static $withdrawLabel = [
        self::CAN_WITHDRAW => '可提现',
        self::CANT_WITHDRAW => '不可提现'
    ];

    /**
     * 获取资产类型
     * @return string[]
     */
    public static function getAssetsArr()
    {
        $arr = [];

        $assets = \App\Models\AssetsType::get();
        foreach ($assets as $v)
        {
            $arr[$v->id] = $v->assets_name;
        }

        return $arr;
    }
}
