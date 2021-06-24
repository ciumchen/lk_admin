<?php

namespace App\Models;

use Dcat\Admin\Traits\HasDateTimeFormatter;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Ad
 *
 * @property int $id
 * @property string $name 广告名称
 * @property int $position 位置
 * @property string|null $img_url 图片
 * @property int $status 状态 1显示 2不显示
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Ad newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Ad newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Ad query()
 * @method static \Illuminate\Database\Eloquent\Builder|Ad whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ad whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ad whereImgUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ad whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ad wherePosition($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ad whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ad whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Ad extends Model
{
	use HasDateTimeFormatter;
    protected $table = 'ad';
    
}
