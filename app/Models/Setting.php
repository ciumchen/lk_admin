<?php

namespace App\Models;

use Dcat\Admin\Traits\HasDateTimeFormatter;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
	use HasDateTimeFormatter;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'key',
        'value',
        'msg',
    ];

    /**
     * @param $key
     * @return mixed
     */
    public static function getSetting($key){

        return Setting::where('key', $key)->value('value');
    }

    /**获取
     * @param $key
     * @return false|string[]
     */
    public static function getManySetting($key){
        $data = self::getSetting($key);

        $data = explode('|', $data);

        return $data;
    }

}
