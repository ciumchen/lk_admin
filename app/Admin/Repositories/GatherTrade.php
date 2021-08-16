<?php

namespace App\Admin\Repositories;

use App\Models\GatherTrade as Model;
use Dcat\Admin\Repositories\EloquentRepository;

class GatherTrade extends EloquentRepository
{

    protected $eloquentClass = Model::class;

    /* 订单状态[第三方] */
    const STATUS_DEFAULT  = 0; /* 默认状态[待兑换] */
    const STATUS_PROGRESS = 1; /* 处理中 */
    const STATUS_SUCCESS  = 2; /* 成功 */
    const STATUS_FAIL     = 3; /* 失败 */

    /**
     * @var string[] 订单状态对应样式
     */
    public static $statusLabelStyle = [
        self::STATUS_DEFAULT => 'primary',
        self::STATUS_SUCCESS => 'success',
        self::STATUS_FAIL    => 'danger',
    ];
}
