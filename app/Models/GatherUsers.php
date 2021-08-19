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
