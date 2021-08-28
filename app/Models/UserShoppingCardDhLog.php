<?php

namespace App\Models;

use Dcat\Admin\Traits\HasDateTimeFormatter;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\UserShoppingCardDhLog
 *
 * @method static \Illuminate\Database\Eloquent\Builder|UserShoppingCardDhLog newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserShoppingCardDhLog newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserShoppingCardDhLog query()
 * @mixin \Eloquent
 * @property int $id
 * @property int|null $uid users表 -- id
 * @property string|null $operate_type 操作类型,兑换代充：exchange_dc,批量代充：exchange_pl,兑换美团：exchange_mt
 * @property string $money 变动购物卡金额
 * @property string $money_before_change 变动前购物卡余额
 * @property string $order_no 充值订单号
 * @property int $status 兑换状态:1处理中,2成功,3失败
 * @property string|null $remark 备注
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int|null $gather_shopping_card_id gather_shopping_card表的id
 * @method static \Illuminate\Database\Eloquent\Builder|UserShoppingCardDhLog whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserShoppingCardDhLog whereGatherShoppingCardId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserShoppingCardDhLog whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserShoppingCardDhLog whereMoney($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserShoppingCardDhLog whereMoneyBeforeChange($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserShoppingCardDhLog whereOperateType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserShoppingCardDhLog whereOrderNo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserShoppingCardDhLog whereRemark($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserShoppingCardDhLog whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserShoppingCardDhLog whereUid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserShoppingCardDhLog whereUpdatedAt($value)
 */
class UserShoppingCardDhLog extends Model
{
	use HasDateTimeFormatter;
    protected $table = 'user_shopping_card_dh_log';

    const USER_TYPE_GWK1 = 'exchange_zl';
    const USER_TYPE_GWK2 = 'exchange_pl';
    const USER_TYPE_GWK3 = 'exchange_mt';
    const USER_TYPE_GWK4 = 'exchange_hf';
    const USER_TYPE_GWK5 = 'exchange_lr';


    public static $operateTypeTextsGWK = [
        self::USER_TYPE_GWK1 => "代充",
        self::USER_TYPE_GWK2 => "批量代充",
        self::USER_TYPE_GWK3 => "美团",
        self::USER_TYPE_GWK4 => "直充",
        self::USER_TYPE_GWK5 => "录单",

    ];

}
