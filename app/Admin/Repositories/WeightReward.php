<?php

namespace App\Admin\Repositories;

use App\Models\WeightRewards as Model;
use Dcat\Admin\Repositories\EloquentRepository;

class WeightReward extends EloquentRepository
{
    
    /**
     * Model.
     *
     * @var string
     */
    protected $eloquentClass = Model::class;
}
