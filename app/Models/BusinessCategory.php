<?php

namespace App\Models;

use Dcat\Admin\Traits\HasDateTimeFormatter;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\BusinessCategory
 *
 * @property int $id
 * @property string $name 分类名称
 * @property string|null $img_url 分类图片
 * @property int $parent_id 上级分类
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int $sort 排序，数字越大越靠前
 * @method static \Illuminate\Database\Eloquent\Builder|BusinessCategory newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BusinessCategory newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BusinessCategory query()
 * @method static \Illuminate\Database\Eloquent\Builder|BusinessCategory whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BusinessCategory whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BusinessCategory whereImgUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BusinessCategory whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BusinessCategory whereParentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BusinessCategory whereSort($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BusinessCategory whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class BusinessCategory extends Model
{
	use HasDateTimeFormatter;
    protected $table = 'business_category';
    
}
