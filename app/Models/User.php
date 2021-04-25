<?php

namespace App\Models;

use Dcat\Admin\Traits\HasDateTimeFormatter;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
	use HasDateTimeFormatter;

	protected $fillable = [
	    'status',
        'ban_reason'
    ];

    /**
     * 用户信息
     */
    public function userData()
    {
        return $this->hasOne(UserData::class, 'uid');

    }

    /**
     * 要邀请人信息
     */
    public function invite()
    {
        return $this->belongsTo(User::class, 'invite_uid','id');
    }
}
