<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\GatherShoppingCard
 *
 * @method static \Illuminate\Database\Eloquent\Builder|GatherShoppingCard newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|GatherShoppingCard newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|GatherShoppingCard query()
 * @mixin \Eloquent
 * @property int $id
 * @property int $gid gather表 id
 * @property int $uid 用户id
 * @property int $guid gather_users表 id
 * @property string $money 购物卡金额
 * @property int $status 是否允许使用：0 否；1 是
 * @property \Illuminate\Support\Carbon|null $created_at 创建时间
 * @property \Illuminate\Support\Carbon|null $updated_at 更新时间
 * @property int $type 操作类型：1购物卡余额添加，2购物卡余额扣除
 * @property string $name 操作类型名称
 * @property-read \App\Models\UserShoppingCardDhLog $gwkDhLog
 * @method static \Illuminate\Database\Eloquent\Builder|GatherShoppingCard whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GatherShoppingCard whereGid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GatherShoppingCard whereGuid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GatherShoppingCard whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GatherShoppingCard whereMoney($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GatherShoppingCard whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GatherShoppingCard whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GatherShoppingCard whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GatherShoppingCard whereUid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GatherShoppingCard whereUpdatedAt($value)
 */
class GatherShoppingCard extends Model
{
    use HasFactory;

    protected $table = 'gather_shopping_card';

    /**格式化输出日期
     * Prepare a date for array / JSON serialization.
     * @param  \DateTimeInterface  $date
     * @return string
     */
    protected function serializeDate(\DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function gwkDhLog()
    {
        return $this->belongsTo(UserShoppingCardDhLog::class, 'id','gather_shopping_card_id');
    }

    const EXCHANGE_TYPE = array(
        'exchange_zl' => '代充',
        'exchange_pl' => '批量代充',
        'exchange_mt' => '美团',
        'exchange_hf' => '直充',
        'exchange_lr' => '录单',
        'exchange_give_dc' => '赠送购物卡',
        'exchange_give_add' => '接收赠送购物卡',
    );


}
