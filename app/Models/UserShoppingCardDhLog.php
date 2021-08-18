<?php

namespace App\Models;

use Dcat\Admin\Traits\HasDateTimeFormatter;

use Illuminate\Database\Eloquent\Model;

class UserShoppingCardDhLog extends Model
{
	use HasDateTimeFormatter;
    protected $table = 'user_shopping_card_dh_log';
    
}
