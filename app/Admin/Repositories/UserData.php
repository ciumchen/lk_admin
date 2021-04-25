<?php

namespace App\Admin\Repositories;

use App\Models\UserData as Model;
use Dcat\Admin\Repositories\EloquentRepository;

class UserData extends EloquentRepository
{
    /**
     * Model.
     *
     * @var string
     */
    protected $eloquentClass = Model::class;
}
