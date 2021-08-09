<?php

namespace App\Admin\Repositories;

use App\Models\LkKthyOrder as Model;
use Dcat\Admin\Repositories\EloquentRepository;

class LkKthyOrder extends EloquentRepository
{
    /**
     * Model.
     *
     * @var string
     */
    protected $eloquentClass = Model::class;
}
