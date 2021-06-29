<?php

namespace App\Models;

use Dcat\Admin\Traits\HasDateTimeFormatter;

use Illuminate\Database\Eloquent\Model;

class LkShopSelfSupportOrder extends Model
{
	use HasDateTimeFormatter;
    protected $table = 'lk_shop_self_support_order';
    
}
