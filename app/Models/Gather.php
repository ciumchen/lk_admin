<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gather extends Model
{
    use HasFactory;

    protected $table = 'gather';

    const GATHER_STATUS = [
        0 => '待开启',
        1 => '开团中',
        3 => '已终止',
    ];

    /**格式化输出日期
     * Prepare a date for array / JSON serialization.
     * @param  \DateTimeInterface  $date
     * @return string
     */
    protected function serializeDate(\DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
