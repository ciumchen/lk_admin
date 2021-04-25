<?php

namespace App\Models;

use Dcat\Admin\Traits\HasDateTimeFormatter;

use Illuminate\Database\Eloquent\Model;

class CityData extends Model
{
	use HasDateTimeFormatter;
    protected $table = 'city_data';
    public $timestamps = false;

}
