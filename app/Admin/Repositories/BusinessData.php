<?php

namespace App\Admin\Repositories;

use App\Models\BusinessData as Model;
use Dcat\Admin\Repositories\EloquentRepository;

class BusinessData extends EloquentRepository
{
    /**
     * Model.
     *
     * @var string
     */
    protected $eloquentClass = Model::class;

    public static $statusLabel = [
        1=>'正常',
        2=>'休息',
        3=>'商家已被封禁',
    ];
}
