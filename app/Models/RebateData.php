<?php

namespace App\Models;

use Dcat\Admin\Traits\HasDateTimeFormatter;

use Illuminate\Database\Eloquent\Model;

class RebateData extends Model
{
	use HasDateTimeFormatter;
    protected $table = 'rebate_data';
    protected $fillable = [
    'day'
    ];
}
