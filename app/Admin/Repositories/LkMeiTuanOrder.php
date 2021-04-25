<?php

namespace App\Admin\Repositories;

use App\Models\LkMeiTuanOrder as Model;
use Dcat\Admin\Repositories\EloquentRepository;

class LkMeiTuanOrder extends EloquentRepository
{
    /**
     * Model.
     *
     * @var string
     */
    protected $eloquentClass = Model::class;
}
