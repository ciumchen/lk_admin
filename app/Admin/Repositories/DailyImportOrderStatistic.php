<?php

namespace App\Admin\Repositories;

use App\Models\DailyImportOrderStatistic as Model;
use Dcat\Admin\Repositories\EloquentRepository;

class DailyImportOrderStatistic extends EloquentRepository
{
    /**
     * Model.
     *
     * @var string
     */
    protected $eloquentClass = Model::class;
}
