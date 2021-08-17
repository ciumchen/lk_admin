<?php

namespace App\Admin\Repositories;

use App\Models\BmRechargeOrder as Model;
use Dcat\Admin\Repositories\EloquentRepository;

class BmRechargeOrder extends EloquentRepository
{
    /**
     * Model.
     *
     * @var string
     */
    protected $eloquentClass = Model::class;
}
