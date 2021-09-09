<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\WeightRewards
 *
 * @property int                             $id
 * @property string                          $count_date    统计日期YYYmmdd
 * @property string                          $silver_money  银卡金额
 * @property string                          $gold_money    金卡金额
 * @property string                          $diamond_money 钻石计金额
 * @property string                          $money         订单金额
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 *
 * @property int                             $is_deal       是否已处理[分红]
 * @method static Builder|WeightRewards whereIsDeal($value)
 * @method static Builder|WeightRewards newModelQuery()
 * @method static Builder|WeightRewards newQuery()
 * @method static Builder|WeightRewards query()
 * @method static Builder|WeightRewards whereCountDate($value)
 * @method static Builder|WeightRewards whereCreatedAt($value)
 * @method static Builder|WeightRewards whereDiamondMoney($value)
 * @method static Builder|WeightRewards whereGoldMoney($value)
 * @method static Builder|WeightRewards whereId($value)
 * @method static Builder|WeightRewards whereMoney($value)
 * @method static Builder|WeightRewards whereSilverMoney($value)
 * @method static Builder|WeightRewards whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class WeightRewards extends Model
{
    
    use HasFactory;
    
    protected $table = 'weight_rewards';
    
    const IS_DEAL_NO  = 0;
    
    const IS_DEAL_YES = 1;
    
    public static $isDealText = [
        self::IS_DEAL_NO  => '否',
        self::IS_DEAL_YES => '是',
    ];
    
    public static $isDealStyle = [
        self::IS_DEAL_NO  => 'dark',
        self::IS_DEAL_YES => 'success',
    ];
}
