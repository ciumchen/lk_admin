<?php

namespace App\Models;

use Dcat\Admin\Traits\HasDateTimeFormatter;

use Illuminate\Database\Eloquent\Model;

class LkKthyOrder extends Model
{
	use HasDateTimeFormatter;
    protected $table = 'lk_kthy_order';
    
}
