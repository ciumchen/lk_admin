<?php

namespace App\Models;

use Dcat\Admin\Traits\HasDateTimeFormatter;

use Illuminate\Database\Eloquent\Model;

class BusinessData extends Model
{
	use HasDateTimeFormatter;
    protected $table = 'business_data';

    /**
     * 用户信息
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'uid','id');
    }

    /**
     * 类型
     */
    public function cate()
    {
        return $this->belongsTo(BusinessCategory::class, 'category_id','id');
    }

    /**
     * 省份
     */
    public function province()
    {
        return $this->belongsTo(CityData::class, 'province','code');
    }

    /**
     * 城市
     */
    public function city()
    {
        return $this->belongsTo(CityData::class, 'city','code');
    }

    /**
     * 地区
     */
    public function district()
    {
        return $this->belongsTo(CityData::class, 'district','code');
    }

}
