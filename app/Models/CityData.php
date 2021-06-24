<?php

namespace App\Models;

use Dcat\Admin\Traits\HasDateTimeFormatter;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\CityData
 *
 * @property int $id
 * @property string $name 城市名称
 * @property int $code 城市编码
 * @property int $p_code 上级code
 * @method static \Illuminate\Database\Eloquent\Builder|CityData newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CityData newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CityData query()
 * @method static \Illuminate\Database\Eloquent\Builder|CityData whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CityData whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CityData whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CityData wherePCode($value)
 * @mixin \Eloquent
 */
class CityData extends Model
{
	use HasDateTimeFormatter;
    protected $table = 'city_data';
    public $timestamps = false;

}
