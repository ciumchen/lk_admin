<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\AssetsLogs
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
 * @property-read mixed $updated_date
 * @method static \Illuminate\Database\Eloquent\Builder|AssetsLogs newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AssetsLogs newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AssetsLogs query()
 * @method static \Illuminate\Database\Eloquent\Builder|AssetsLogs whereAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AssetsLogs whereAmountBeforeChange($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AssetsLogs whereAssetsName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AssetsLogs whereAssetsTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AssetsLogs whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AssetsLogs whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AssetsLogs whereIp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AssetsLogs whereOperateType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AssetsLogs whereOrderNo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AssetsLogs whereRemark($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AssetsLogs whereTxHash($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AssetsLogs whereUid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AssetsLogs whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AssetsLogs whereUserAgent($value)
 * @mixin \Eloquent
 */
class AssetsLogs extends Model
{
    protected $table = 'assets_logs';
    protected $fillable = [
        'assets_type_id',
        'assets_name',
        'uid',
        'amount_before_change',
        'amount',
        'operate_type',
        'tx_hash',
        'ip',
        'user_agent',
        'remark',
    ];
    protected $appends = ['updated_date'];



    /**
     * 类型.
     */
    const OPERATE_TYPE_USDT_TO_IETS = 'usdt_to_iets';
    const OPERATE_TYPE_WITHDRAW_TO_WALLET = 'withdraw_to_wallet';
    const OPERATE_TYPE_MARKET_BUSINESS = 'give_market_business';
    const OPERATE_TYPE_WITHDRAW_TO_WALLET_FEE = 'withdraw_to_wallet_fee';
    const OPERATE_TYPE_REFUSE_WITHDRAW = 'refuse_withdraw';
    const OPERATE_TYPE_CHARITY_REBATE = 'charity_rebate';//公益捐赠分红
    const OPERATE_TYPE_PLATFORM_REBATE = 'platform_rebate';//平台分红
    const OPERATE_TYPE_USER_REBATE = 'user_rebate';//用户分红
    const OPERATE_TYPE_BUSINESS_REBATE = 'business_rebate';//商家分红
    const OPERATE_TYPE_INVITE_REBATE = 'invite_rebate';//邀请分红
    const OPERATE_TYPE_DISTRICT_REBATE = 'district_rebate';//区站长分红
    const OPERATE_TYPE_CITY_REBATE = 'city_rebate';//市站长分红
    const OPERATE_TYPE_SHARE_B_REBATE = 'share_b_rebate';//邀请商家
    const OPERATE_TYPE_EXCHANGE_IETS = 'exchagne_iets';//兑换iets
    const OPERATE_TYPE_EXCHANGE_IETS_SUB_ENCOURATGE = 'exchagne_iets_sub';//兑换扣除
    const OPERATE_TYPE_IETS_TO_USDT = 'IETS兑换为USDT';
    const OPERATE_TYPE_PROVINCE_REBATE = 'province_rebate';//省站长分红
    /**
     * 类型文本.
     *
     * @var array
     */
    public static $operateTypeTexts = [
        self::OPERATE_TYPE_USDT_TO_IETS => 'usdt兑换iets',
        self::OPERATE_TYPE_WITHDRAW_TO_WALLET => '提现到钱包',
        self::OPERATE_TYPE_MARKET_BUSINESS => '赠送给市商',
        self::OPERATE_TYPE_WITHDRAW_TO_WALLET_FEE => '提现到钱包手续费',
        self::OPERATE_TYPE_REFUSE_WITHDRAW => '拒绝提现',
        self::OPERATE_TYPE_CHARITY_REBATE => '公益捐赠分红',
        self::OPERATE_TYPE_PLATFORM_REBATE => '平台分红',
        self::OPERATE_TYPE_USER_REBATE => '用户分红',
        self::OPERATE_TYPE_BUSINESS_REBATE => '商家分红',
        self::OPERATE_TYPE_INVITE_REBATE => '邀请分红',
        self::OPERATE_TYPE_DISTRICT_REBATE => '区站长分红',
        self::OPERATE_TYPE_CITY_REBATE => '市站长分红',
        self::OPERATE_TYPE_SHARE_B_REBATE => '邀请商家分红',
        self::OPERATE_TYPE_EXCHANGE_IETS => '兑换IETS',
        self::OPERATE_TYPE_EXCHANGE_IETS_SUB_ENCOURATGE => '兑换扣除',
        self::OPERATE_TYPE_IETS_TO_USDT => '转换为USDT',
        self::OPERATE_TYPE_PROVINCE_REBATE => '省站长分红',
    ];

    public function getUpdatedDateAttribute($value)
    {
//        dd($value);
        return date("Y-m-d H:i:s",strtotime($this->attributes['updated_at']));
    }

}
