<?php

namespace App\Admin\Repositories;

use App\Models\IntegralLog as Model;
use Dcat\Admin\Repositories\EloquentRepository;

class IntegralLog extends EloquentRepository
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

    /**
     * 类型文本.
     *
     * @var array
     */
    public static $operateTypeTexts = [
    ];
}
