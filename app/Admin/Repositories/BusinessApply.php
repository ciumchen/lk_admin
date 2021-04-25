<?php

namespace App\Admin\Repositories;

use App\Models\BusinessApply as Model;
use Dcat\Admin\Repositories\EloquentRepository;

class BusinessApply extends EloquentRepository
{
    /**
     * Model.
     *
     * @var string
     */
    protected $eloquentClass = Model::class;

    const STATUS_DEFAULT = 1;//审核中
    const STATUS_PASSED = 2;//审核通过
    const STATUS_FAILED = 3;//审核不通过

    /**
     * 审核状态
     * @var string[]
     */
    public static $statusLabel = [
        self::STATUS_DEFAULT => '审核中',
        self::STATUS_PASSED => '审核通过',
        self::STATUS_FAILED => '审核不通过',
    ];
}
