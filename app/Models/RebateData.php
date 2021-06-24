<?php

namespace App\Models;

use Dcat\Admin\Traits\HasDateTimeFormatter;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\RebateData
 *
 * @property int $id
 * @property string $day 返佣日期
 * @property string $consumer 消费者返佣（元）
 * @property string $business 商家
 * @property string $welfare 公益
 * @property string $share 分享
 * @property string $market 市商
 * @property string $platform 平台
 * @property int $people 消费人数
 * @property int $join_consumer 消费者参与人数
 * @property int $join_business 商家参与人数
 * @property int $new_business 新增商家
 * @property string $total_consumption 总消费金额
 * @property string $consumer_lk_iets 消费者单个LK分配IETS数量
 * @property string $business_lk_iets 商家单个LK分配IETS数量
 * @property int $status 是否返佣，1未返佣，2已返佣
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|RebateData newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|RebateData newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|RebateData query()
 * @method static \Illuminate\Database\Eloquent\Builder|RebateData whereBusiness($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RebateData whereBusinessLkIets($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RebateData whereConsumer($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RebateData whereConsumerLkIets($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RebateData whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RebateData whereDay($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RebateData whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RebateData whereJoinBusiness($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RebateData whereJoinConsumer($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RebateData whereMarket($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RebateData whereNewBusiness($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RebateData wherePeople($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RebateData wherePlatform($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RebateData whereShare($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RebateData whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RebateData whereTotalConsumption($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RebateData whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RebateData whereWelfare($value)
 * @mixin \Eloquent
 */
class RebateData extends Model
{
	use HasDateTimeFormatter;
    protected $table = 'rebate_data';
    protected $fillable = [
    'day'
    ];
}
