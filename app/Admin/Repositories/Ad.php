<?php

namespace App\Admin\Repositories;

use App\Models\Ad as Model;
use Dcat\Admin\Repositories\EloquentRepository;

class Ad extends EloquentRepository
{
    /**
     * Model.
     *
     * @var string
     */
    protected $eloquentClass = Model::class;

    const SHOW = 1;//显示
    const HIDE = 2;//隐藏
    const INDEX = 1;//首页
    const BUSINESS = 2;//商家页

    /**
     * 是否显示
     * @var string[]
     */
    public static $statusLabel = [
        self::SHOW => '显示',
        self::HIDE => '隐藏',
    ];

    /**
     * 位置
     * @var string[]
     */
    public static $positionLabel = [
        self::INDEX => '首页广告',
        self::BUSINESS => '商家列表页广告',
    ];
}
