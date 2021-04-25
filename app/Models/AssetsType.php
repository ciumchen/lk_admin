<?php

namespace App\Models;

use Dcat\Admin\Traits\HasDateTimeFormatter;

use Illuminate\Database\Eloquent\Model;

class AssetsType extends Model
{
	use HasDateTimeFormatter;
    protected $table = 'assets_type';

    const DEFAULT_ASSETS_NAME = 'iets';
    const DEFAULT_ASSETS_ENCOURAGE = 'encourage';

}
