<?php

namespace App\Admin\Repositories;

use App\Models\CityData as Model;
use Dcat\Admin\Repositories\EloquentRepository;

class CityData extends EloquentRepository
{
    /**
     * Model.
     *
     * @var string
     */
    protected $eloquentClass = Model::class;
}
