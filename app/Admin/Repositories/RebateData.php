<?php

namespace App\Admin\Repositories;

use App\Models\RebateData as Model;
use Dcat\Admin\Repositories\EloquentRepository;

class RebateData extends EloquentRepository
{
    /**
     * Model.
     *
     * @var string
     */
    protected $eloquentClass = Model::class;
}
