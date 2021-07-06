<?php

namespace App\Admin\Repositories;

use App\Models\OrderMobileRechargeDetails as Model;
use Dcat\Admin\Repositories\EloquentRepository;

class OrderMobileDetails extends EloquentRepository
{
    protected $eloquentClass = Model::class;
}