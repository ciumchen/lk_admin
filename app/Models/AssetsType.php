<?php

namespace App\Models;

use Dcat\Admin\Traits\HasDateTimeFormatter;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\AssetsType
 *
 * @property int $id
 * @property string|null $contract_address 合约地址
 * @property string $assets_name 资产名称
 * @property int $recharge_status 是否可充值，1可充值，2不能充值
 * @property int $can_withdraw 是否能提现，1能，2不能
 * @property string $withdraw_fee 提现手续费（%）
 * @property string $large_withdraw_amount 提现审核额度
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|AssetsType newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AssetsType newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AssetsType query()
 * @method static \Illuminate\Database\Eloquent\Builder|AssetsType whereAssetsName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AssetsType whereCanWithdraw($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AssetsType whereContractAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AssetsType whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AssetsType whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AssetsType whereLargeWithdrawAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AssetsType whereRechargeStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AssetsType whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AssetsType whereWithdrawFee($value)
 * @mixin \Eloquent
 */
class AssetsType extends Model
{
	use HasDateTimeFormatter;
    protected $table = 'assets_type';

    const DEFAULT_ASSETS_NAME = 'usdt';
    const DEFAULT_ASSETS_ENCOURAGE = 'encourage';

}
