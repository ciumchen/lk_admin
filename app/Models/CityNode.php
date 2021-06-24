<?php

namespace App\Models;

use Dcat\Admin\Traits\HasDateTimeFormatter;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\CityNode
 *
 * @property int $id
 * @property int|null $uid 站长UID
 * @property string|null $name 站点名称
 * @property int $province 省
 * @property int|null $city 市
 * @property int|null $district 区
 * @property int $user_number 站点用户数
 * @property int $new_user_number 昨日新增站点用户数
 * @property int $user_active 活跃用户数
 * @property int $status 1正常返佣，2不参与返佣
 * @property string $total_consumption 站点总消费额
 * @property string $yesterday_consumption 昨日站点消费额
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\CityData|null $cityDataCity
 * @property-read \App\Models\CityData|null $cityDataDistrict
 * @property-read \App\Models\CityData $cityDataProvince
 * @property-read \App\Models\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder|CityNode newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CityNode newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CityNode query()
 * @method static \Illuminate\Database\Eloquent\Builder|CityNode whereCity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CityNode whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CityNode whereDistrict($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CityNode whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CityNode whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CityNode whereNewUserNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CityNode whereProvince($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CityNode whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CityNode whereTotalConsumption($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CityNode whereUid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CityNode whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CityNode whereUserActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CityNode whereUserNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CityNode whereYesterdayConsumption($value)
 * @mixin \Eloquent
 */
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
