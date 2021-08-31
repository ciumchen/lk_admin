<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdvertUsers extends Model
{
    use HasFactory;

    protected $table = 'advert_users';

    /**格式化输出日期
     * Prepare a date for array / JSON serialization.
     * @param  \DateTimeInterface  $date
     * @return string
     */
    protected function serializeDate(\DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    const ADVERT_TYPE = [
        1  => '幸运抽奖',
        2  => '答题',
        3  => '猜成语',
        4  => '刮刮乐',
        10 => '拆红包',
        11 => '拆红包翻倍',
        12 => '签到',
        13 => '签到翻倍',
        14 => '任务奖励',
        15 => '任务翻倍奖励',
        16 => '蘑菇',
        17 => '集碎片',
        18 => '达标兑换',
        19 => '步数兑换',
        20 => '气泡兑换',
        21 => '拉新',
        22 => '拉活'
    ];

    const ADVERT_STATUS = [
        0 => '异常',
        1 => '正常',
    ];

    const ADVERT_BRAND = [
        1 => '奖励',
        2 => '拼团',
    ];
}
