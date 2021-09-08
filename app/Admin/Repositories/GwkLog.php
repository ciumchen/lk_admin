<?php

namespace App\Admin\Repositories;

use App\Models\GwkLog as Model;
use Dcat\Admin\Repositories\EloquentRepository;

class GwkLog extends EloquentRepository
{
    /**
     * Model.
     *
     * @var string
     */
    protected $eloquentClass = Model::class;
}
