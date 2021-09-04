<?php

namespace App\Models;

use Dcat\Admin\Traits\HasDateTimeFormatter;

use Illuminate\Database\Eloquent\Model;

class UserCityData extends Model
{
    use HasDateTimeFormatter;

    protected $table = 'user_city_data';

    //获取省份信息
    public function province()
    {
        return $this->belongsTo(CityData::class, 'province_id', 'id');
    }

    //获取市信息
    public function city()
    {
        return $this->belongsTo(CityData::class, 'city_id', 'id');
    }

    //获取区信息
    public function district()
    {
        return $this->belongsTo(CityData::class, 'district_id', 'id');
    }
}
