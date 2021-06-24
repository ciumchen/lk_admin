<?php

namespace App\Models;

use Dcat\Admin\Traits\HasDateTimeFormatter;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\FreezeLog
 *
 * @property int $id
 * @property int $assets_type_id 资产类型id
 * @property string $assets_name 资产名称
 * @property int $uid uid
 * @property string $operate_type 操作类型
 * @property string $amount 变动数量
 * @property string $amount_before_change 变动前数量
 * @property string|null $ip ip
 * @property string $user_agent ua
 * @property string|null $remark 备注
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|FreezeLog newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|FreezeLog newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|FreezeLog query()
 * @method static \Illuminate\Database\Eloquent\Builder|FreezeLog whereAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FreezeLog whereAmountBeforeChange($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FreezeLog whereAssetsName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FreezeLog whereAssetsTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FreezeLog whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FreezeLog whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FreezeLog whereIp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FreezeLog whereOperateType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FreezeLog whereRemark($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FreezeLog whereUid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FreezeLog whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FreezeLog whereUserAgent($value)
 * @mixin \Eloquent
 */
class FreezeLog extends Model
{
	use HasDateTimeFormatter;
    protected $table = 'freeze_logs';

    /**
     * 用户信息
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'uid','id');
    }

}
