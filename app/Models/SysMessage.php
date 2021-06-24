<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\SysMessage
 *
 * @property int $id
 * @property int|null $type 消息类型：1 单个用户, 2 所有用户, 3 所有商家, 4 所有盟主, 5 所有站长
 * @property string|null $user_id users表 -- id
 * @property int $status 消息状态：1 成功；0 失败
 * @property string $title 消息标题
 * @property string $content 消息内容
 * @property \Illuminate\Support\Carbon|null $created_at 创建时间
 * @property \Illuminate\Support\Carbon|null $updated_at 更新时间
 * @property string|null $deleted_at 删除时间
 * @method static \Illuminate\Database\Eloquent\Builder|SysMessage newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SysMessage newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SysMessage query()
 * @method static \Illuminate\Database\Eloquent\Builder|SysMessage whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SysMessage whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SysMessage whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SysMessage whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SysMessage whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SysMessage whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SysMessage whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SysMessage whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SysMessage whereUserId($value)
 * @mixin \Eloquent
 */
class SysMessage extends Model
{
    use HasFactory;

    protected $table = 'sys_message';
}
