<?php

namespace App\Admin\Repositories;

use App\Models\UserLpjLog as Model;
use Dcat\Admin\Repositories\EloquentRepository;

class UserLpjLog extends EloquentRepository
{
    /**
     * Model.
     *
     * @var string
     */
    protected $eloquentClass = Model::class;
}
