<?php

namespace App\Admin\Repositories;

use App\Models\OrderMobileRecharge as Model;
use Dcat\Admin\Repositories\EloquentRepository;

class OrderMobile extends EloquentRepository
{
    /**
     * Model.
     *
     * @var string
     */
    protected $eloquentClass = Model::class;
}
