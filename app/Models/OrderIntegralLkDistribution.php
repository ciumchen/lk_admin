<?php

namespace App\Models;

use Dcat\Admin\Traits\HasDateTimeFormatter;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\OrderIntegralLkDistribution
 *
 * @property int $id
 * @property int|null $day 控制录单日期
 * @property int|null $switch 释放开关默认0表示未释放,1表示释放
 * @property string|null $count_lk lk统计
 * @property string|null $count_profit_price 录单累计实际让利金额
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $price_5 订单消费金额5%让利比例的累计
 * @property string|null $price_10 订单消费金额10%让利比例的累计
 * @property string|null $price_20 订单消费金额20%让利比例的累计
 * @method static \Illuminate\Database\Eloquent\Builder|OrderIntegralLkDistribution newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|OrderIntegralLkDistribution newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|OrderIntegralLkDistribution query()
 * @method static \Illuminate\Database\Eloquent\Builder|OrderIntegralLkDistribution whereCountLk($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderIntegralLkDistribution whereCountProfitPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderIntegralLkDistribution whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderIntegralLkDistribution whereDay($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderIntegralLkDistribution whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderIntegralLkDistribution wherePrice10($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderIntegralLkDistribution wherePrice20($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderIntegralLkDistribution wherePrice5($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderIntegralLkDistribution whereSwitch($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderIntegralLkDistribution whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property int|null $dr_count 导入订单数量统计
 * @method static \Illuminate\Database\Eloquent\Builder|OrderIntegralLkDistribution whereDrCount($value)
 * @property string|null $other_price 订单消费金额其他让利比例的累计
 * @method static \Illuminate\Database\Eloquent\Builder|OrderIntegralLkDistribution whereOtherPrice($value)
 */
class OrderIntegralLkDistribution extends Model
{
	use HasDateTimeFormatter;


    protected $table = 'order_integral_lk_distribution';
    protected $fillable = [
        'day',
        'count_lk',
        'created_at',
        'updated_at',
    ];
}
