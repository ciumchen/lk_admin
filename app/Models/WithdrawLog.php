<?php

namespace App\Models;

use Dcat\Admin\Traits\HasDateTimeFormatter;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\WithdrawLog
 *
 * @property int $id
 * @property int $uid
 * @property int $assets_type_id 资金类型ID
 * @property string $assets_type 资金类型
 * @property string $address 地址
 * @property string $amount 数量
 * @property string $fee 手续费
 * @property string|null $tx_hash 交易HASH
 * @property int $status 1默认 2成功 3审核中 4拒绝
 * @property string $ip ip
 * @property string $remark 备注
 * @property string|null $user_agent
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|WithdrawLog newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|WithdrawLog newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|WithdrawLog query()
 * @method static \Illuminate\Database\Eloquent\Builder|WithdrawLog whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WithdrawLog whereAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WithdrawLog whereAssetsType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WithdrawLog whereAssetsTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WithdrawLog whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WithdrawLog whereFee($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WithdrawLog whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WithdrawLog whereIp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WithdrawLog whereRemark($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WithdrawLog whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WithdrawLog whereTxHash($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WithdrawLog whereUid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WithdrawLog whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WithdrawLog whereUserAgent($value)
 * @mixin \Eloquent
 */
class WithdrawLog extends Model
{
	use HasDateTimeFormatter;
    protected $table = 'withdraw_logs';

    /**
     * 用户信息
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'uid','id');
    }

}
