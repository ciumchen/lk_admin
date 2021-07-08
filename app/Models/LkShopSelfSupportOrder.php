<?php

namespace App\Models;

use Dcat\Admin\Traits\HasDateTimeFormatter;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\LkShopSelfSupportOrder
 *
 * @method static \Illuminate\Database\Eloquent\Builder|LkShopSelfSupportOrder newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|LkShopSelfSupportOrder newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|LkShopSelfSupportOrder query()
 * @mixin \Eloquent
 */
class LkShopSelfSupportOrder extends Model
{
	use HasDateTimeFormatter;
    protected $table = 'lk_shop_self_support_order';
    
}
