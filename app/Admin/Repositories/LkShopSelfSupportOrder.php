<?php

namespace App\Admin\Repositories;

use App\Models\LkShopSelfSupportOrder as Model;
use Dcat\Admin\Repositories\EloquentRepository;

class LkShopSelfSupportOrder extends EloquentRepository
{
    /**
     * Model.
     *
     * @var string
     */
    protected $eloquentClass = Model::class;
}
