<?php

namespace App\Admin\Repositories;

use App\Models\LkShopMerchantOrder as Model;
use Dcat\Admin\Repositories\EloquentRepository;

class LkShopMerchantOrder extends EloquentRepository
{
    /**
     * Model.
     *
     * @var string
     */
    protected $eloquentClass = Model::class;
}
