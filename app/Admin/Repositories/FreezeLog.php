<?php

namespace App\Admin\Repositories;

use App\Models\FreezeLog as Model;
use Dcat\Admin\Repositories\EloquentRepository;

class FreezeLog extends EloquentRepository
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
    const OPERATE_TYPE_EXCHANGE_IETS = 'exchagne_iets';//兑换iets

    /**
     * 类型文本.
     *
     * @var array
     */
    public static $operateTypeTexts = [
        self::OPERATE_TYPE_EXCHANGE_IETS => '兑换IETS',
    ];
}
