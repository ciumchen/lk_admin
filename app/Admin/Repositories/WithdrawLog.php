<?php

namespace App\Admin\Repositories;

use App\Models\WithdrawLog as Model;
use Dcat\Admin\Repositories\EloquentRepository;

class WithdrawLog extends EloquentRepository
{
    /**
     * Model.
     *
     * @var string
     */
    protected $eloquentClass = Model::class;

    const STATUS_DEFAULT = 1;
    const STATUS_SUCCESS = 2;
    const STATUS_TO_BE_REVIEWED = 3;
    const STATUS_REFUSED = 4;

    /**
     * 状态
     * @var array
     */
    public static $statusLabel = array(
        self::STATUS_DEFAULT => "默认",
        self::STATUS_SUCCESS => "成功",
        self::STATUS_TO_BE_REVIEWED => "大额待审核",
        self::STATUS_REFUSED => "已拒绝",
    );
}
