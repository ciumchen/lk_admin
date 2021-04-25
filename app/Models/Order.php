<?php

namespace App\Models;

use Dcat\Admin\Traits\HasDateTimeFormatter;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
	use HasDateTimeFormatter;
    protected $table = 'order';

    /**
     * 用户信息
     */
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

    /**商家资料
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function businessData(){
        return $this->belongsTo(BusinessData::class, 'business_uid','uid');
    }
}
