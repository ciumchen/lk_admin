<?php

namespace App\Models;

use Dcat\Admin\Traits\HasDateTimeFormatter;

use Illuminate\Database\Eloquent\Model;

class RealNameAuthenTication extends Model
{
	use HasDateTimeFormatter;
    protected $table = 'real_name_auth';

}
