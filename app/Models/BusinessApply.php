<?php

namespace App\Models;

use Dcat\Admin\Traits\HasDateTimeFormatter;

use Illuminate\Database\Eloquent\Model;

class BusinessApply extends Model
{
	use HasDateTimeFormatter;
    protected $table = 'business_apply';
    
}
