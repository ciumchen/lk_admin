<?php

namespace App\Models;

use Dcat\Admin\Traits\HasDateTimeFormatter;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\RealNameAuthenTication
 *
 * @method static \Illuminate\Database\Eloquent\Builder|RealNameAuthenTication newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|RealNameAuthenTication newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|RealNameAuthenTication query()
 * @mixin \Eloquent
 * @property int $id
 * @property int|null $uid users表 -- id
 * @property string $name 姓名
 * @property string $num_id 身份证号
 * @property int $status 审核状态：0未审核，1审核通过，2审核不通过
 * @property string|null $img_just 身份证正面
 * @property string|null $img_back 身份证反面
 * @property string|null $remark 备注
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|RealNameAuthenTication whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RealNameAuthenTication whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RealNameAuthenTication whereImgBack($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RealNameAuthenTication whereImgJust($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RealNameAuthenTication whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RealNameAuthenTication whereNumId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RealNameAuthenTication whereRemark($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RealNameAuthenTication whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RealNameAuthenTication whereUid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RealNameAuthenTication whereUpdatedAt($value)
 */
class RealNameAuthenTication extends Model
{
	use HasDateTimeFormatter;
    protected $table = 'real_name_auth';

}
