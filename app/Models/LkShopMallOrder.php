<?php

namespace App\Models;

use Dcat\Admin\Traits\HasDateTimeFormatter;

use Illuminate\Database\Eloquent\Model;

class LkShopMallOrder extends Model
{
	use HasDateTimeFormatter;
    protected $table = 'lkshop_order';

}
