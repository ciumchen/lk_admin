<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\GatherTrade
 *
 * @property-read \App\Models\Order $orders
 * @method static \Illuminate\Database\Eloquent\Builder|GatherTrade newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|GatherTrade newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|GatherTrade query()
 * @mixin \Eloquent
 * @property int $id
 * @property int $gid gather表 id
 * @property int $uid 用户id
 * @property int $business_uid 商户id
 * @property int $oid order表 id
 * @property string $order_no 订单编号
 * @property int $guid gather_users表 id
 * @property string $profit_ratio 让利比列
 * @property string $price 消费金额
 * @property string $profit_price 实际让利金额
 * @property int $status 状态：0 待处理；1 成功；2 失败
 * @property \Illuminate\Support\Carbon|null $created_at 创建时间
 * @property \Illuminate\Support\Carbon|null $updated_at 更新时间
 * @method static \Illuminate\Database\Eloquent\Builder|GatherTrade whereBusinessUid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GatherTrade whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GatherTrade whereGid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GatherTrade whereGuid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GatherTrade whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GatherTrade whereOid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GatherTrade whereOrderNo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GatherTrade wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GatherTrade whereProfitPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GatherTrade whereProfitRatio($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GatherTrade whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GatherTrade whereUid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GatherTrade whereUpdatedAt($value)
 */
class GatherTrade extends Model
{
    use HasFactory;
    protected $table = 'gather_trade';

    protected $guarded = [];

    public function orders()
    {
        return $this->belongsTo(Order::class, 'oid');
    }

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
