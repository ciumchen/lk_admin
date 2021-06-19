<?php

namespace App\Models;

use Dcat\Admin\Traits\HasDateTimeFormatter;

use Illuminate\Database\Eloquent\Model;

class DailyImportOrderStatistic extends Model
{
	use HasDateTimeFormatter;
    protected $table = 'order_integral_lk_distribution';

}
