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

    const USER_TYPE_GWK1 = 'exchange_zl';
    const USER_TYPE_GWK2 = 'exchange_pl';
    const USER_TYPE_GWK3 = 'exchange_mt';
    const USER_TYPE_GWK4 = 'exchange_hf';
    const USER_TYPE_GWK5 = 'exchange_lr';


    public static $operateTypeTextsGWK = [
        self::USER_TYPE_GWK1 => "代充",
        self::USER_TYPE_GWK2 => "批量代充",
        self::USER_TYPE_GWK3 => "美团",
        self::USER_TYPE_GWK4 => "直充",
        self::USER_TYPE_GWK5 => "录单",

    ];

}
