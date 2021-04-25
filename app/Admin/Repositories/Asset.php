<?php

namespace App\Admin\Repositories;

use App\Models\Asset as Model;
use Dcat\Admin\Repositories\EloquentRepository;

class Asset extends EloquentRepository
{
    /**
     * Model.
     *
     * @var string
     */
    protected $eloquentClass = Model::class;
}
