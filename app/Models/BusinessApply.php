<?php

namespace App\Models;

use Dcat\Admin\Traits\HasDateTimeFormatter;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\BusinessApply
 *
 * @property int $id
 * @property int $uid uid
 * @property string $img 营业执照图片
 * @property string $phone 联系电话
 * @property string $name 商店名称
 * @property string|null $work 主营业务
 * @property string|null $address 商家地址
 * @property string|null $remark 备注
 * @property int $status 1审核中，2审核通过，3审核失败
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $img2 门店照图片
 * @property string|null $img_details1 商户详情照1
 * @property string|null $img_details2 商户详情照2
 * @property string|null $img_details3 商户详情照3
 * @method static \Illuminate\Database\Eloquent\Builder|BusinessApply newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BusinessApply newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BusinessApply query()
 * @method static \Illuminate\Database\Eloquent\Builder|BusinessApply whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BusinessApply whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BusinessApply whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BusinessApply whereImg($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BusinessApply whereImg2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BusinessApply whereImgDetails1($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BusinessApply whereImgDetails2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BusinessApply whereImgDetails3($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BusinessApply whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BusinessApply wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BusinessApply whereRemark($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BusinessApply whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BusinessApply whereUid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BusinessApply whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BusinessApply whereWork($value)
 * @mixin \Eloquent
 */
class BusinessApply extends Model
{
	use HasDateTimeFormatter;
    protected $table = 'business_apply';

}
