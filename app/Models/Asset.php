<?php

namespace App\Models;

use Dcat\Admin\Traits\HasDateTimeFormatter;

use Illuminate\Database\Eloquent\Model;

class Asset extends Model
{
	use HasDateTimeFormatter;

    /**
     * 用户信息
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'uid','id');
    }

    /**
     * 类型
     */
    public function type()
    {
        return $this->belongsTo(AssetsType::class, 'assets_type_id','id');
    }
}
