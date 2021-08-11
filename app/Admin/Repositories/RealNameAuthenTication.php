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
}
