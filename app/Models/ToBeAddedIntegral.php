<?php

namespace App\Models;

use Dcat\Admin\Traits\HasDateTimeFormatter;

use Illuminate\Database\Eloquent\Model;

class ToBeAddedIntegral extends Model
{
	use HasDateTimeFormatter;
    protected $table = 'order';
    public function user()
    {
        return $this->belongsTo(User::class, 'uid','id');
    }

    /**
     * 商家信息
     */
    public function business()
    {
        return $this->belongsTo(User::class, 'business_uid','id');
    }

    public function select_trade_order()
    {
        return $this->belongsTo(TradeOrder::class, 'id','oid');
    }

    /**商家资料
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function businessData(){
        return $this->belongsTo(BusinessData::class, 'business_uid','uid');
    }
}
