<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

/**
 * App\Models\ConvertLogs
 *
 * @property int $id
 * @property int $uid 充值用户id
 * @property string $phone 充值手机号/卡号
 * @property string $user_name 充值姓名
 * @property string $price 充值金额
 * @property string $usdt_amount 兑换金额
 * @property string $order_no 充值订单号
 * @property int $oid order 表 id
 * @property int $type 兑换类型：1 话费；2 美团
 * @property int $status 兑换状态：0 待兑换；1 处理中； 2 成功；3 失败
 * @property \Illuminate\Support\Carbon|null $created_at 创建时间
 * @property \Illuminate\Support\Carbon|null $updated_at 更新时间
 * @property-read \App\Models\Order $orders
 * @method static \Illuminate\Database\Eloquent\Builder|ConvertLogs newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ConvertLogs newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ConvertLogs query()
 * @method static \Illuminate\Database\Eloquent\Builder|ConvertLogs whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ConvertLogs whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ConvertLogs whereOid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ConvertLogs whereOrderNo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ConvertLogs wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ConvertLogs wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ConvertLogs whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ConvertLogs whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ConvertLogs whereUid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ConvertLogs whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ConvertLogs whereUsdtAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ConvertLogs whereUserName($value)
 * @mixin \Eloquent
 */
class ConvertLogs extends Model
{
    use HasFactory;
    protected $table = 'convert_logs';

    public function orders()
    {
        return $this->belongsTo(Order::class, 'oid', 'id');
    }

    public function getCreatedAtAttribute($value)
    {
        if ($value) {
            $value = Carbon::createFromFormat(
                'Y-m-d\TH:i:s.vv\Z',
                date('Y-m-d\TH:i:s.vv\Z', strtotime($value))
            )
                           ->format('Y-m-d H:i:s');
        }
        return $value;
    }
    
    public function getUpdatedAtAttribute($value)
    {
        if ($value) {
            $value = Carbon::createFromFormat(
                'Y-m-d\TH:i:s.vv\Z',
                date('Y-m-d\TH:i:s.vv\Z', strtotime($value))
            )
                           ->format('Y-m-d H:i:s');
        }
        return $value;
    }
}
