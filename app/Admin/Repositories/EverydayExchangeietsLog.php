<?php

namespace App\Admin\Repositories;

use App\Models\EverydayExchangeietsLog as Model;
use Dcat\Admin\Repositories\EloquentRepository;

class EverydayExchangeietsLog extends EloquentRepository
{
    /**
     * Model.
     *
     * @var string
     */
    protected $eloquentClass = Model::class;

    const STATUS_0       = 0;
    const STATUS_1       = 1;
    const STATUS_2       = 2;

    public static $statusText = [
        self::STATUS_0 => "未分红",
        self::STATUS_1 => "未分红",
        self::STATUS_2 => "已分红",
    ];

    static public $statusColor = [
        self::STATUS_0 => 'danger',//primary
        self::STATUS_1 => 'danger',
        self::STATUS_2 => 'success',
        4                    => 'info',
    ];




}
