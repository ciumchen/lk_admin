<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

/**
 * App\Models\RechargeLogs
 *
 * @property int $id
 * @property string|null $order_no trade_order表 -- order_no
 * @property string|null $reorder_id 充值订单 id
 * @property string $type 充值类型：HF 话费；YK 油卡；MT 美团
 * @property int $status 充值状态
 * @property \Illuminate\Support\Carbon|null $created_at 创建时间
 * @property \Illuminate\Support\Carbon|null $updated_at 更新时间
 * @method static \Illuminate\Database\Eloquent\Builder|RechargeLogs newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|RechargeLogs newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|RechargeLogs query()
 * @method static \Illuminate\Database\Eloquent\Builder|RechargeLogs whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RechargeLogs whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RechargeLogs whereOrderNo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RechargeLogs whereReorderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RechargeLogs whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RechargeLogs whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RechargeLogs whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class RechargeLogs extends Model
{
    use HasFactory;

    protected $table = 'recharge_logs';

    /**判断数据是否已存在
     * @param string $reorderId
     * @return mixed
     */
    public function exRecharges(string $reorderId)
    {
        return DB::table($this->table)->where('reorder_id', $reorderId)->exists();
    }
}
