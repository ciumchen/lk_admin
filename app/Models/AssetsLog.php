<?php

namespace App\Models;

use Dcat\Admin\Traits\HasDateTimeFormatter;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\AssetsLog
 *
 * @property int $id
 * @property int $assets_type_id 资产类型id
 * @property string $assets_name 资产名称
 * @property int $uid uid
 * @property string $operate_type 操作类型
 * @property string $amount 变动数量
 * @property string $amount_before_change 变动前数量
 * @property string|null $tx_hash 交易hash
 * @property string|null $ip ip
 * @property string $user_agent ua
 * @property string|null $remark 备注
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $order_no 订单号
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|AssetsLog newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AssetsLog newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AssetsLog query()
 * @method static \Illuminate\Database\Eloquent\Builder|AssetsLog whereAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AssetsLog whereAmountBeforeChange($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AssetsLog whereAssetsName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AssetsLog whereAssetsTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AssetsLog whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AssetsLog whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AssetsLog whereIp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AssetsLog whereOperateType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AssetsLog whereOrderNo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AssetsLog whereRemark($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AssetsLog whereTxHash($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AssetsLog whereUid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AssetsLog whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AssetsLog whereUserAgent($value)
 * @mixin \Eloquent
 */
class AssetsLog extends Model
{
	use HasDateTimeFormatter;
    protected $table = 'assets_logs';

    /**
     * 用户信息
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'uid','id');
    }

}
