<?php

namespace App\Models;

use Dcat\Admin\Traits\HasDateTimeFormatter;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Asset
 *
 * @property int $id
 * @property int $uid uid
 * @property int $assets_type_id 资产类型ID
 * @property string $assets_name 资产名称
 * @property string $amount 数量
 * @property string $freeze_amount 冻结数量
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\AssetsType $type
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|Asset newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Asset newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Asset query()
 * @method static \Illuminate\Database\Eloquent\Builder|Asset whereAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Asset whereAssetsName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Asset whereAssetsTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Asset whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Asset whereFreezeAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Asset whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Asset whereUid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Asset whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property int $change_times 资产变更次数
 * @method static \Illuminate\Database\Eloquent\Builder|Asset whereChangeTimes($value)
 */
class Asset extends Model
{
	use HasDateTimeFormatter;

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
    public function type()
    {
        return $this->belongsTo(AssetsType::class, 'assets_type_id','id');
    }
}
