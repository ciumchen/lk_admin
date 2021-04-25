<?php

namespace App\Models;

use Dcat\Admin\Traits\HasDateTimeFormatter;

use Illuminate\Database\Eloquent\Model;

class BanList extends Model
{
	use HasDateTimeFormatter;
	protected $table = "ban_list";

	protected $fillable = [
	    'uid',
        'reason',
        'ip'
    ];

}
