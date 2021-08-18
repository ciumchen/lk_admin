<?php

namespace App\Admin\Repositories;

use App\Models\UserShoppingCardDhLog as Model;
use Dcat\Admin\Repositories\EloquentRepository;

class UserShoppingCardDhLog extends EloquentRepository
{
    /**
     * Model.
     *
     * @var string
     */
    protected $eloquentClass = Model::class;
}
