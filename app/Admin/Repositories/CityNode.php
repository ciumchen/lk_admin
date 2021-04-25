<?php

namespace App\Admin\Repositories;

use App\Models\CityNode as Model;
use Dcat\Admin\Repositories\EloquentRepository;

class CityNode extends EloquentRepository
{
    /**
     * Model.
     *
     * @var string
     */
    protected $eloquentClass = Model::class;

}
