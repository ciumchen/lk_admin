<?php

namespace App\Models;

use Dcat\Admin\Traits\HasDateTimeFormatter;

use Illuminate\Database\Eloquent\Model;

class BusinessCategory extends Model
{
	use HasDateTimeFormatter;
    protected $table = 'business_category';
    
}
