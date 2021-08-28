<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Gather
 *
 * @method static \Illuminate\Database\Eloquent\Builder|Gather newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Gather newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Gather query()
 * @mixin \Eloquent
 * @property int $id
 * @property int $type 拼团类型
 * @property int $status 状态：0 开团中；1 开奖中；3 已终止
 * @property \Illuminate\Support\Carbon|null $created_at 创建时间
 * @property \Illuminate\Support\Carbon|null $updated_at 更新时间
 * @property int $scaler 拼团人数
 * @method static \Illuminate\Database\Eloquent\Builder|Gather whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Gather whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Gather whereScaler($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Gather whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Gather whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Gather whereUpdatedAt($value)
 */
class Gather extends Model
{
    use HasFactory;

    protected $table = 'gather';

    const GATHER_STATUS = [
        0 => '待开启',
        1 => '开团中',
        3 => '已终止',
    ];

    const GATHER_TYPE = [
        1 => '100元来客购物卡',
        2 => '美团',
        3 => '油卡',
        4 => '录单',
    ];

    /**格式化输出日期
     * Prepare a date for array / JSON serialization.
     * @param  \DateTimeInterface  $date
     * @return string
     */
    protected function serializeDate(\DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
