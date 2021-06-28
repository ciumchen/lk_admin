<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\UserMessage
 *
 * @property int                             $id
 * @property int|null                        $user_id    users表 -- id
 * @property int|null                        $type       消息类型：1 充值；2 录单；8 系统
 * @property int                             $status     消息状态：1 成功；0 失败
 * @property int                             $sys_mid    sys_message表 -- id
 * @property \Illuminate\Support\Carbon|null $created_at 创建时间
 * @property \Illuminate\Support\Carbon|null $updated_at 更新时间
 * @property string|null                     $deleted_at 删除时间
 * @property int                             $is_del     是否删除：0 否；1 是
 * @property string|null                     $order_no   trade_order表 -- order_no
 * @method static \Illuminate\Database\Eloquent\Builder|UserMessage newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserMessage newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserMessage query()
 * @method static \Illuminate\Database\Eloquent\Builder|UserMessage whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserMessage whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserMessage whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserMessage whereIsDel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserMessage whereOrderNo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserMessage whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserMessage whereSysMid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserMessage whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserMessage whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserMessage whereUserId($value)
 * @mixin \Eloquent
 */
class UserMessage extends Model
{
    
    use HasFactory;
    
    protected $table = 'user_message';
    
    /**
     * Description:
     *
     * @param  int                     $order_id
     * @param  \App\Models\Order|null  $Order
     *
     * @throws \Exception
     * @author lidong<947714443@qq.com>
     * @date   2021/6/23 0023
     */
    public function setVideoMsg($order_id, Order $Order = null)
    {
        if (empty($Order)) {
            $Order = Order::find($order_id);
        }
        $date = date("Y-m-d H:i:s");
        try {
            $this->user_id = $Order->uid;
            $this->status = 1;
            $this->type = 5;
            $this->sys_mid = 0;
            $this->is_del = 0;
            $this->order_no = $Order->order_no;
            $this->created_at = $date;
            $this->updated_at = $date;
            $this->save();
        } catch (\Exception $e) {
            throw $e;
        }
    }
}
