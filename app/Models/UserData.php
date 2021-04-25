<?php

namespace App\Models;

use Dcat\Admin\Traits\HasDateTimeFormatter;

use Illuminate\Database\Eloquent\Model;

class UserData extends Model
{
	use HasDateTimeFormatter;
    protected $table = 'user_data';

    /**
     * 用户信息
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'uid','id');
    }

}
