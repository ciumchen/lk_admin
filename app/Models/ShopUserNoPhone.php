<?php

namespace App\Models;

use Dcat\Admin\Traits\HasDateTimeFormatter;

use Illuminate\Database\Eloquent\Model;

class ShopUserNoPhone extends Model
{
	use HasDateTimeFormatter;
    protected $table = "lkshop_user_no_phone";


}
