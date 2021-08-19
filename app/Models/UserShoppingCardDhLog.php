<?php

namespace App\Models;

use Dcat\Admin\Traits\HasDateTimeFormatter;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\UserShoppingCardDhLog
 *
 * @method static \Illuminate\Database\Eloquent\Builder|UserShoppingCardDhLog newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserShoppingCardDhLog newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserShoppingCardDhLog query()
 * @mixin \Eloquent
 */
class UserShoppingCardDhLog extends Model
{
	use HasDateTimeFormatter;
    protected $table = 'user_shopping_card_dh_log';
    
}
