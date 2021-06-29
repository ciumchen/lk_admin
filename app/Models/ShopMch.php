<?php

namespace App\Models;

use Dcat\Admin\Traits\HasDateTimeFormatter;

use Illuminate\Database\Eloquent\Model;

class ShopMch extends Model
{
	use HasDateTimeFormatter;
    protected $connection = 'mysql_center';
    protected $table = "ttshop_mch";

    public function getMchUserId($mch_id){
        return ShopMch::where('id',$mch_id)->value('user_id');
    }

}
