<?php

namespace App\Models;

use Dcat\Admin\Traits\HasDateTimeFormatter;

use Illuminate\Database\Eloquent\Model;


class LkshopOrderLog extends Model
{
    use HasDateTimeFormatter;

    protected $table = 'lkshop_order_log';


}
