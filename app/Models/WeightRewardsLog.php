<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\WeightRewardsLog
 *
 * @property int                             $id
 * @property string                          $order_no      订单号
 * @property string                          $count_date    统计日期YYYmmdd
 * @property string                          $silver_money  银卡已累计金额
 * @property string                          $gold_money    金卡已累计金额
 * @property string                          $diamond_money 钻石卡已累计金额
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static Builder|WeightRewardsLog newModelQuery()
 * @method static Builder|WeightRewardsLog newQuery()
 * @method static Builder|WeightRewardsLog query()
 * @method static Builder|WeightRewardsLog whereCountDate($value)
 * @method static Builder|WeightRewardsLog whereCreatedAt($value)
 * @method static Builder|WeightRewardsLog whereDiamondMoney($value)
 * @method static Builder|WeightRewardsLog whereGoldMoney($value)
 * @method static Builder|WeightRewardsLog whereId($value)
 * @method static Builder|WeightRewardsLog whereOrderNo($value)
 * @method static Builder|WeightRewardsLog whereSilverMoney($value)
 * @method static Builder|WeightRewardsLog whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property string $silver_ratio 银卡比例
 * @property string $gold_ratio 金卡比例
 * @property string $diamond_ratio 钻石卡比例
 * @property string $money 订单金额
 * @method static Builder|WeightRewardsLog whereDiamondRatio($value)
 * @method static Builder|WeightRewardsLog whereGoldRatio($value)
 * @method static Builder|WeightRewardsLog whereMoney($value)
 * @method static Builder|WeightRewardsLog whereSilverRatio($value)
 */
class WeightRewardsLog extends Model
{
    
    use HasFactory;
    
    protected $table = 'weight_rewards_log';
}
