<?php

namespace App\Admin\Repositories;

use App\Models\WithdrawCashLog as Model;
use Dcat\Admin\Repositories\EloquentRepository;

class WithdrawCashLog extends EloquentRepository
{
    /**
     * Model.
     *
     * @var string
     */
    protected $eloquentClass = Model::class;
}
