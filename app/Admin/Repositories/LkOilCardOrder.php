<?php

namespace App\Admin\Repositories;

use App\Models\LkOilCardOrder as Model;
use Dcat\Admin\Repositories\EloquentRepository;

class LkOilCardOrder extends EloquentRepository
{
    /**
     * Model.
     *
     * @var string
     */
    protected $eloquentClass = Model::class;
}
