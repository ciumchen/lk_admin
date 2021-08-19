<?php

namespace App\Admin\Repositories;

use App\Models\UserLevel as Model;
use Dcat\Admin\Repositories\EloquentRepository;

class UserLevel extends EloquentRepository
{
    /**
     * Model.
     *
     * @var string
     */
    protected $eloquentClass = Model::class;
}
