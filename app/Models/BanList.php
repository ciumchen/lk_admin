<?php

namespace App\Models;

use Dcat\Admin\Traits\HasDateTimeFormatter;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\BanList
 *
 * @property int $id
 * @property int $uid 用户ID
 * @property string $reason 封禁原因
 * @property string $ip ip
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|BanList newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BanList newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BanList query()
 * @method static \Illuminate\Database\Eloquent\Builder|BanList whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BanList whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BanList whereIp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BanList whereReason($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BanList whereUid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BanList whereUpdatedAt($value)
 * @mixin \Eloquent
 */
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
