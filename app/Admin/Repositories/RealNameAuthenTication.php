<?php

namespace App\Admin\Repositories;

use App\Models\RealNameAuthenTication as Model;
use Dcat\Admin\Repositories\EloquentRepository;

class RealNameAuthenTication extends EloquentRepository
{
    /**
     * Model.
     *
     * @var string
     */
    protected $eloquentClass = Model::class;

    const SFZ_STATUS_DEFAULT = 0;//审核中
    const SFZ_STATUS_PASSED = 1;//审核通过
    const SFZ_STATUS_FAILED = 2;//审核不通过

    /**
     * 审核状态
     * @var string[]
     */
    public static $sfz_statusLabel = [
        self::SFZ_STATUS_DEFAULT => '未认证',
        self::SFZ_STATUS_PASSED => '认证通过',
        self::SFZ_STATUS_FAILED => '认证不通过',
    ];


}
