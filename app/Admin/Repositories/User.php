<?php

namespace App\Admin\Repositories;

use App\Models\User as Model;
use Dcat\Admin\Repositories\EloquentRepository;

class User extends EloquentRepository
{
    /**
     * Model.
     *
     * @var string
     */
    protected $eloquentClass = Model::class;

    //正常用户状态
    const STATUS_NORMAL = 1;
    const STATUS_BANNED = 2;//已封禁
    const ROLE_NORMAL = 1;//普通用户
    const ROLE_BUSINESS = 2;//商家
    const NO_IS_AUTH = 1;//未实名
    const YES_IS_AUTH = 2;//已实名

    const MARKET_BUSINESS_0 = 0;
    const MARKET_BUSINESS_1 = 1;


    /**
     * 状态label
     * @var string[]
     */
    public static $statusLabel = [
        self::STATUS_NORMAL => '正常',
        self::STATUS_BANNED => '禁用'
    ];
    /**
     * 状态label
     * @var string[]
     */
    public static $memberHeadLabel = [
        1 => '普通用户',
        2 => '盟主',
        3 => '已关闭盟主权益',
    ];

    /**
     * 实名label
     * @var string[]
     */
    public static $authLabel = [
        self::NO_IS_AUTH => '未实名',
        self::YES_IS_AUTH => '已实名'
    ];

    /**
     * 角色
     * @var array
     */
    public static $roleLabel = [
        self::ROLE_NORMAL => "普通用户",
        self::ROLE_BUSINESS => "商家",
    ];

    public static $market_business = [
        self::MARKET_BUSINESS_0 => "不是市商",
        self::MARKET_BUSINESS_1 => "是市商",
    ];
}
