<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GatherTrade extends Model
{
    use HasFactory;
    protected $table = 'gather_trade';

    protected $guarded = [];

    public function orders()
    {
        return $this->belongsTo(Order::class, 'oid');
    }

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
