<?php

namespace App\Models;

use Dcat\Admin\Traits\HasDateTimeFormatter;

use Illuminate\Database\Eloquent\Model;

class GwkLog extends Model
{
	use HasDateTimeFormatter;
    protected $table = 'gwk_log';
    
}
