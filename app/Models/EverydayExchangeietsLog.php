<?php

namespace App\Models;

use Dcat\Admin\Traits\HasDateTimeFormatter;

use Illuminate\Database\Eloquent\Model;

class EverydayExchangeietsLog extends Model
{
	use HasDateTimeFormatter;
    protected $table = 'everyday_exchangeiets_log';

    protected $fillable = [
        'day',
        'type',
        'status',
        'created_at',
        'updated_at',
    ];
}
