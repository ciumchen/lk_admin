<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\GatherUsers
 *
 * @method static \Illuminate\Database\Eloquent\Builder|GatherUsers newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|GatherUsers newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|GatherUsers query()
 * @mixin \Eloquent
 * @property int $id
 * @property int $gid gather表 id
 * @property int $uid 用户id
 * @property int $status 用户状态：0 异常；1 正常
 * @property int $type 是否中奖：0 否；1 是
 * @property \Illuminate\Support\Carbon|null $created_at 创建时间
 * @property \Illuminate\Support\Carbon|null $updated_at 更新时间
 * @method static \Illuminate\Database\Eloquent\Builder|GatherUsers whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GatherUsers whereGid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GatherUsers whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GatherUsers whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GatherUsers whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GatherUsers whereUid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GatherUsers whereUpdatedAt($value)
 */
class GatherUsers extends Model
{
    use HasFactory;

    protected $table = 'gather_users';

    /**格式化输出日期
     * Prepare a date for array / JSON serialization.
     * @param  \DateTimeInterface  $date
     * @return string
     */
    protected function serializeDate(\DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    const GATHERUSER_TYPE = [
        0 => '未中奖',
        1 => '中奖',
    ];
}
