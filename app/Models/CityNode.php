<?php

namespace App\Models;

use Dcat\Admin\Traits\HasDateTimeFormatter;

use Illuminate\Database\Eloquent\Model;

class CityNode extends Model
{
	use HasDateTimeFormatter;
    protected $table = 'city_node';
    public function cityDataProvince(){
        return $this->belongsTo(CityData::class, 'province', 'code');
    }

    public function cityDataCity(){
        return $this->belongsTo(CityData::class, 'city', 'code');
    }

    public function cityDataDistrict(){
        return $this->belongsTo(CityData::class, 'district', 'code');
    }
    /**
     * 属于此用户的
     */
    public function user()
    {
        return $this->hasOne(User::class, 'id', 'uid');
    }
    public static $statusLabel= [
        1 => '正常',
        2 => '不参与分佣'
    ];
}
