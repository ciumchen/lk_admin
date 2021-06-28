<?php

namespace App\Models;

use Dcat\Admin\Traits\HasDateTimeFormatter;

use Illuminate\Database\Eloquent\Model;


class LkshopAddUserLog extends Model
{
    use HasDateTimeFormatter;

    protected $table = 'lkshop_add_user_log';


}
