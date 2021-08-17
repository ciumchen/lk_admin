<?php

namespace App\Models;

use Dcat\Admin\Traits\HasDateTimeFormatter;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\LkKthyOrder
 *
 * @method static \Illuminate\Database\Eloquent\Builder|LkKthyOrder newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|LkKthyOrder newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|LkKthyOrder query()
 * @mixin \Eloquent
 */
class LkKthyOrder extends Model
{
	use HasDateTimeFormatter;
    protected $table = 'lk_kthy_order';
    
}
