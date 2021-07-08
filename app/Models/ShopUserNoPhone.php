<?php

namespace App\Models;

use Dcat\Admin\Traits\HasDateTimeFormatter;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\ShopUserNoPhone
 *
 * @property int $id
 * @property int|null $user_id lk商城用户id
 * @property string|null $type 记录类型，no_phone 没有绑定手机号
 * @property int|null $status 状态：1 开启；0 关闭
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|ShopUserNoPhone newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ShopUserNoPhone newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ShopUserNoPhone query()
 * @method static \Illuminate\Database\Eloquent\Builder|ShopUserNoPhone whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShopUserNoPhone whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShopUserNoPhone whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShopUserNoPhone whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShopUserNoPhone whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShopUserNoPhone whereUserId($value)
 * @mixin \Eloquent
 */
class ShopUserNoPhone extends Model
{
	use HasDateTimeFormatter;
    protected $table = "lkshop_user_no_phone";


}
