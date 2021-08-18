<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Carbon;

/**
 * App\Models\BmRechargeOrder
 *
 * @property int               $id
 * @property string            $rechargeAccount 充值账号
 * @property string            $saleAmount      建议零售价
 * @property string            $orderProfit     订单利润，单位元，保留2位小数
 * @property string|null       $orderTime       订单生成时间，格式：yyyy-MM-dd hh:mm:ss
 * @property string|null       $operateTime     订单处理时间，格式：yyyy-MM-dd hh:mm:ss
 * @property int               $payState        订单付款状态 0 未付款1 已付款
 * @property int               $rechargeState   订单充值状态 0充值中 1成功 9撤销
 * @property int               $classType       商品类型：1:实物商品 2:直充商品 3:卡密商品 4:话费充值 6:支付和金币充值
 * @property string            $itemCost        商品单价，单位元，保留2位小数
 * @property string            $orderCost       订单成本，单位元，保留2位小数
 * @property string            $facePrice       面值，单位元，保留2位小数
 * @property string|null       $revokeMessage   撤销原因
 * @property string|null       $billId          订单编号
 * @property int               $itemNum         商品数量
 * @property string            $itemName        商品名称
 * @property string            $supUserId       供货商编号
 * @property string            $orderTimeFull   供货商编号
 * @property Carbon|null       $created_at
 * @property Carbon|null       $updated_at      *
 * @property-read mixed|string $create_time
 * @property-read mixed|string $update_time
 * @method static Builder|BmRechargeOrder newModelQuery()
 * @method static Builder|BmRechargeOrder newQuery()
 * @method static Builder|BmRechargeOrder query()
 * @method static Builder|BmRechargeOrder whereBillId($value)
 * @method static Builder|BmRechargeOrder whereClassType($value)
 * @method static Builder|BmRechargeOrder whereCreatedAt($value)
 * @method static Builder|BmRechargeOrder whereFacePrice($value)
 * @method static Builder|BmRechargeOrder whereId($value)
 * @method static Builder|BmRechargeOrder whereItemCost($value)
 * @method static Builder|BmRechargeOrder whereItemName($value)
 * @method static Builder|BmRechargeOrder whereItemNum($value)
 * @method static Builder|BmRechargeOrder whereOperateTime($value)
 * @method static Builder|BmRechargeOrder whereOrderCost($value)
 * @method static Builder|BmRechargeOrder whereOrderProfit($value)
 * @method static Builder|BmRechargeOrder whereOrderTime($value)
 * @method static Builder|BmRechargeOrder whereOrderTimeFull($value)
 * @method static Builder|BmRechargeOrder wherePayState($value)
 * @method static Builder|BmRechargeOrder whereRechargeAccount($value)
 * @method static Builder|BmRechargeOrder whereRechargeState($value)
 * @method static Builder|BmRechargeOrder whereRevokeMessage($value)
 * @method static Builder|BmRechargeOrder whereSaleAmount($value)
 * @method static Builder|BmRechargeOrder whereSupUserId($value)
 * @method static Builder|BmRechargeOrder whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class BmRechargeOrder extends BaseModel
{
    use HasFactory;
    
    //订单付款状态 0 未付款1 已付款
    const PAY_STATE_DEFAULT = 0;
    
    const PAY_STATE_SUCCESS = 1;
    
    //订单充值状态 0充值中 1成功 9撤销
    const RECHARGE_STATE_DEFAULT = 0;
    
    const RECHARGE_STATE_SUCCESS = 1;
    
    const RECHARGE_STATE_CANCEL  = 9;
    
    // 商品类型：1:实物商品 2:直充商品 3:卡密商品 4:话费充值 6:支付和金币充值
    const CLASS_TYPE_DEFAULT         = 0;
    
    const CLASS_TYPE_IN_KIND         = 1;
    
    const CLASS_TYPE_RECHARGE        = 2;
    
    const CLASS_TYPE_CD_KEY          = 3;
    
    const CLASS_TYPE_MOBILE_RECHARGE = 4;
    
    const CLASS_TYPE_PAY             = 6;
    
    /**
     * @var string[] 支付状态文字
     */
    public static $payStateText = [
        self::PAY_STATE_DEFAULT => '未付款',
        self::PAY_STATE_SUCCESS => '已付款',
    ];
    
    /**
     * @var string[] 支付状态样式
     */
    public static $payStateStyle = [
        self::PAY_STATE_DEFAULT => 'warning',
        self::PAY_STATE_SUCCESS => 'success',
    ];
    
    /**
     * @var string[] 支付状态文字
     */
    public static $rechargeStateText = [
        self::RECHARGE_STATE_DEFAULT => '充值中',
        self::RECHARGE_STATE_SUCCESS => '成功',
        self::RECHARGE_STATE_CANCEL  => '撤销',
    ];
    
    /**
     * @var array 支付状态样式
     */
    public static $rechargeStateStyle = [
        self::RECHARGE_STATE_DEFAULT => 'danger',
        self::RECHARGE_STATE_SUCCESS => 'success',
        self::RECHARGE_STATE_CANCEL  => 'dark',
    ];
    
    /**
     * @var string[] 商品类型文字
     */
    public static $classTypeText = [
        self::CLASS_TYPE_DEFAULT         => '未知',
        self::CLASS_TYPE_IN_KIND         => '实物',
        self::CLASS_TYPE_RECHARGE        => '直充',
        self::CLASS_TYPE_CD_KEY          => '卡密',
        self::CLASS_TYPE_MOBILE_RECHARGE => '话费',
        self::CLASS_TYPE_PAY             => '支付',
    ];
}
