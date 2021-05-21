<?php

namespace App\Admin\Repositories;

use App\Models\AssetsLog as Model;
use Dcat\Admin\Repositories\EloquentRepository;

class AssetsLog extends EloquentRepository
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
    const OPERATE_TYPE_WITHDRAW_TO_WALLET = 'withdraw_to_wallet';
    const OPERATE_TYPE_WITHDRAW_TO_WALLET_FEE = 'withdraw_to_wallet_fee';
    const OPERATE_TYPE_REFUSE_WITHDRAW = 'refuse_withdraw';
    const OPERATE_TYPE_CHARITY_REBATE = 'charity_rebate';//公益捐赠分红
    const OPERATE_TYPE_PLATFORM_REBATE = 'platform_rebate';//平台分红
    const OPERATE_TYPE_USER_REBATE = 'user_rebate';//用户分红
    const OPERATE_TYPE_BUSINESS_REBATE = 'business_rebate';//商家分红
    const OPERATE_TYPE_INVITE_REBATE = 'invite_rebate';//邀请分红
    const OPERATE_TYPE_DISTRICT_REBATE = 'district_rebate';//区站长分红
    const OPERATE_TYPE_CITY_REBATE = 'city_rebate';//市站长分红
    const OPERATE_TYPE_SHARE_B_REBATE = 'share_b_rebate';//邀请商家
    const OPERATE_TYPE_EXCHANGE_IETS = 'exchagne_iets';//兑换iets
    const OPERATE_TYPE_EXCHANGE_IETS_SUB_ENCOURATGE = 'exchagne_iets_sub';//兑换扣除
    const OPERATE_TYPE_IETS_TO_USDT = 'IETS兑换为USDT';

    /**
     * 类型文本.
     *
     * @var array
     */
    public static $operateTypeTexts = [
        self::OPERATE_TYPE_WITHDRAW_TO_WALLET => '提现到钱包',
        self::OPERATE_TYPE_WITHDRAW_TO_WALLET_FEE => '提现到钱包手续费',
        self::OPERATE_TYPE_REFUSE_WITHDRAW => '拒绝提现',
        self::OPERATE_TYPE_CHARITY_REBATE => '公益捐赠分红',
        self::OPERATE_TYPE_PLATFORM_REBATE => '平台分红',
        self::OPERATE_TYPE_USER_REBATE => '用户分红',
        self::OPERATE_TYPE_BUSINESS_REBATE => '商家分红',
        self::OPERATE_TYPE_INVITE_REBATE => '邀请分红',
        self::OPERATE_TYPE_DISTRICT_REBATE => '区站长分红',
        self::OPERATE_TYPE_CITY_REBATE => '市站长分红',
        self::OPERATE_TYPE_SHARE_B_REBATE => '邀请商家分红',
        self::OPERATE_TYPE_EXCHANGE_IETS => '兑换',
        self::OPERATE_TYPE_EXCHANGE_IETS_SUB_ENCOURATGE => '兑换扣除',
        self::OPERATE_TYPE_IETS_TO_USDT => 'IETS兑换为USDT',
    ];

}
