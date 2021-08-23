<?php

namespace App\Admin\Repositories;

use App\Models\UserLevelRelation as Model;
use Dcat\Admin\Repositories\EloquentRepository;

class UserLevelRelation extends EloquentRepository
{
    /**
     * Model.
     *
     * @var string
     */
    protected $eloquentClass = Model::class;
}
