<?php

namespace App\Models;

use Dcat\Admin\Traits\HasDateTimeFormatter;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\BusinessData
 *
 * @property int $id
 * @property int $uid uid
 * @property string|null $banners 商家头图
 * @property string|null $contact_number 联系方式
 * @property string|null $address 商家详细地址
 * @property \App\Models\CityData|null $province 省
 * @property \App\Models\CityData|null $city 市
 * @property \App\Models\CityData|null $district 区
 * @property string|null $lt 经度
 * @property string|null $lg 纬度
 * @property int $category_id 店铺类别
 * @property int $status 1正常，2休息，3已关店,4店铺已被封禁
 * @property string|null $run_time 营业时间
 * @property string|null $content 商家内容介绍
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string $name 商店名称
 * @property string $main_business 主营业务
 * @property int $is_recommend 是否推荐，0不推荐，1推荐
 * @property int $sort 排序，数字越大越靠前
 * @property string $limit_price 单日录单限额
 * @property int $state 商户单独设置今日限额开关，默认0，0表示关闭，1表示开启
 * @property int $business_apply_id business_apply表的id
 * @property-read \App\Models\BusinessApply $business_apply
 * @property-read \App\Models\BusinessCategory $cate
 * @property-read \App\Models\User $user
 * @property-read \App\Models\UserIdImg $userIdImg
 * @method static \Illuminate\Database\Eloquent\Builder|BusinessData newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BusinessData newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BusinessData query()
 * @method static \Illuminate\Database\Eloquent\Builder|BusinessData whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BusinessData whereBanners($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BusinessData whereBusinessApplyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BusinessData whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BusinessData whereCity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BusinessData whereContactNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BusinessData whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BusinessData whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BusinessData whereDistrict($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BusinessData whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BusinessData whereIsRecommend($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BusinessData whereLg($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BusinessData whereLimitPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BusinessData whereLt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BusinessData whereMainBusiness($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BusinessData whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BusinessData whereProvince($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BusinessData whereRunTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BusinessData whereSort($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BusinessData whereState($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BusinessData whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BusinessData whereUid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BusinessData whereUpdatedAt($value)
 * @mixin \Eloquent
 */
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
    //申请商家
    public function business_apply()
    {
        return $this->belongsTo(BusinessApply::class, 'business_apply_id','id');
    }

    public function userIdImg()
    {
        return $this->belongsTo(UserIdImg::class, 'business_apply_id','business_apply_id');
    }

}
