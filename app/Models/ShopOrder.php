<?php

namespace App\Models;

use Dcat\Admin\Traits\HasDateTimeFormatter;

use Illuminate\Database\Eloquent\Model;

class ShopOrder extends Model
{
	use HasDateTimeFormatter;
    protected $connection = 'mysql_center';
    protected $table = "ttshop_order";


    public function mchUser(){
        return $this->belongsTo(ShopUser::class, 'id', 'oid');
    }
}
