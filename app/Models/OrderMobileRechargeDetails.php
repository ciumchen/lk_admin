<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

/**
 * App\Models\OrderMobileRechargeDetails
 *
 * @property int                                  $id
 * @property int                                  $order_mobile_id order_mobile订单ID
 * @property int                                  $order_id        order订单ID
 * @property string                               $mobile          充值手机
 * @property string                               $money           充值金额
 * @property int                                  $status          充值状态:0充值中,1成功,9撤销
 * @property string                               $order_no        子订单号
 * @property string                               $trade_no        接口方返回单号
 * @property \Illuminate\Support\Carbon|null      $created_at
 * @property \Illuminate\Support\Carbon|null      $updated_at
 * @property-read \App\Models\OrderMobileRecharge $pMobile
 * @method static Builder|OrderMobileRechargeDetails newModelQuery()
 * @method static Builder|OrderMobileRechargeDetails newQuery()
 * @method static Builder|OrderMobileRechargeDetails query()
 * @method static Builder|OrderMobileRechargeDetails whereCreatedAt($value)
 * @method static Builder|OrderMobileRechargeDetails whereId($value)
 * @method static Builder|OrderMobileRechargeDetails whereMobile($value)
 * @method static Builder|OrderMobileRechargeDetails whereMoney($value)
 * @method static Builder|OrderMobileRechargeDetails whereOrderId($value)
 * @method static Builder|OrderMobileRechargeDetails whereOrderMobileId($value)
 * @method static Builder|OrderMobileRechargeDetails whereStatus($value)
 * @method static Builder|OrderMobileRechargeDetails whereUpdatedAt($value)
 * @mixin \Eloquent
 * @method static Builder|OrderMobileRechargeDetails whereOrderNo($value)
 * @method static Builder|OrderMobileRechargeDetails whereTradeNo($value)
 */
class OrderMobileRechargeDetails extends Model
{
    use HasFactory;
    
    protected $table = 'order_mobile_recharge_details';
    
    /**
     * Description:
     *
     * @param  array  $data
     *
     * @return bool
     * @throws \Exception
     * @author lidong<947714443@qq.com>
     * @date   2021/7/5 0005
     */
    public function addAll(array $data)
    {
        try {
            $date = Carbon::now();
            foreach ($data as $key => $val) {
                $data[ $key ][ 'created_at' ] = $date;
                $data[ $key ][ 'updated_at' ] = $date;
            }
            $res = DB::table($this->getTable())->insert($data);
        } catch (\Exception $e) {
            throw $e;
        }
        return $res;
    }
    
    /**
     * Description:批量更新状态
     *
     * @param  array  $where
     * @param  int    $status
     *
     * @return bool|int
     * @throws \Exception
     * @author lidong<947714443@qq.com>
     * @date   2021/7/5 0005
     */
    public function updateStatusAll(array $where, $status = 1)
    {
        try {
            $res = $this->where($where)->update(['status' => $status]);
        } catch (\Exception $e) {
            throw $e;
        }
        return $res;
    }
    
    /**
     * Description:反查上级
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     * @author lidong<947714443@qq.com>
     * @date   2021/7/6 0006
     */
    public function pMobile()
    {
        return $this->belongsTo(OrderMobileRecharge::class, 'order_mobile_id', 'id');
    }
}
