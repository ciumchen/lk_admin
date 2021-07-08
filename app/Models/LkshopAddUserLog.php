<?php

namespace App\Models;

use Dcat\Admin\Traits\HasDateTimeFormatter;

use Illuminate\Database\Eloquent\Model;


/**
 * App\Models\LkshopAddUserLog
 *
 * @property int $id
 * @property int|null $user_id lk商城用户id
 * @property string|null $type 操作类型
 * @property int|null $status 状态：1 开启；0 关闭
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|LkshopAddUserLog newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|LkshopAddUserLog newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|LkshopAddUserLog query()
 * @method static \Illuminate\Database\Eloquent\Builder|LkshopAddUserLog whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LkshopAddUserLog whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LkshopAddUserLog whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LkshopAddUserLog whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LkshopAddUserLog whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LkshopAddUserLog whereUserId($value)
 * @mixin \Eloquent
 */
class LkshopAddUserLog extends Model
{
    use HasDateTimeFormatter;

    protected $table = 'lkshop_add_user_log';


}
