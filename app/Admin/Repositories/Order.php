<?php

namespace App\Admin\Repositories;

use App\Models\Order as Model;
use Dcat\Admin\Repositories\EloquentRepository;

class Order extends EloquentRepository
{
    /**
     * Model.
     *
     * @var string
     */
    protected $eloquentClass = Model::class;

    const STATUS_DEFAULT = 1;
    const STATUS_SUCCESS = 2;
    const STATUS_REFUSED = 3;

    /**
     * 状态
     * @var array
     */
    public static $statusLabel = array(
        self::STATUS_DEFAULT => "审核中",
        self::STATUS_SUCCESS => "审核通过",
        self::STATUS_REFUSED => "审核不通过",
    );
}
