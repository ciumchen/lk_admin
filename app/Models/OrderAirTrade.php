<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Exceptions\LogicException;

/**
 * App\Models\OrderAirTrade
 *
 * @property int $id
 * @property string|null $trade_no 主订单号
 * @property string|null $order_no 子订单号
 * @property string $total_face_price 票面价（元）
 * @property string $total_other_fee 费用总和（元）
 * @property string $total_pay_cash 实际支付金额（元）
 * @property int $order_type 票务类型：1 火车票，2 飞机票，3 汽车票
 * @property int $state 订单状态：0 预定中，1 已完成，2 预定完成待支付，9 已取消
 * @property int $order_state 子订单状态：0 交易中，1 出票成功，6 退票中，7 退票失败，9 出票失败，10 已退票，11 已退款
 * @property int $bill_state 支付状态： 0 未支付，1 已支付
 * @property string|null $title 订单标题
 * @property string|null $item_id 标准商品编号
 * @property string|null $passenger_name 乘客姓名
 * @property string|null $passenger_tel 乘客联系号码
 * @property int $idcard_type 证件类型 0 身份证
 * @property string|null $idcard_no 证件号码
 * @property string|null $ticket_no 车票号码
 * @property string $pay_cash 实际支付的金额，保留两位小数（元）
 * @property string $other_fee 其它费用总和，保留两位小数（元）
 * @property string $refund_fee 退款手续费，保留两位小数（元）
 * @property int $seat_type 座位类型： 0 二等座 ，1 一等座，2 特等座，3 商务座，4 无座，5 硬座，6 软座，7 硬卧，8 软卧，9 高级软卧，10 火车其他座，11 经济舱，12 头等舱，21 汽车座位
 * @property string|null $legs 航段
 * @property string|null $contact_name 联系人
 * @property string|null $contact_tel 联系人电话
 * @property string|null $start_time 发车时间
 * @property string|null $start_station 出发站
 * @property string|null $recevie_station 抵达站
 * @property string|null $train_no 车次号
 * @property string|null $remark 备注
 * @property string $total_refund_amount 实际支付金额（元差额退款（元）
 * @property string|null $bill_time 支付时间
 * @property string|null $etime 完成时间
 * @property string|null $ctime 创建时间
 * @property string|null $utime 更新时间
 * @property int $aid air_trade_logs 表 -- id
 * @method static \Illuminate\Database\Eloquent\Builder|OrderAirTrade newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|OrderAirTrade newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|OrderAirTrade query()
 * @method static \Illuminate\Database\Eloquent\Builder|OrderAirTrade whereAid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderAirTrade whereBillState($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderAirTrade whereBillTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderAirTrade whereContactName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderAirTrade whereContactTel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderAirTrade whereCtime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderAirTrade whereEtime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderAirTrade whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderAirTrade whereIdcardNo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderAirTrade whereIdcardType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderAirTrade whereItemId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderAirTrade whereLegs($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderAirTrade whereOrderNo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderAirTrade whereOrderState($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderAirTrade whereOrderType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderAirTrade whereOtherFee($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderAirTrade wherePassengerName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderAirTrade wherePassengerTel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderAirTrade wherePayCash($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderAirTrade whereRecevieStation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderAirTrade whereRefundFee($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderAirTrade whereRemark($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderAirTrade whereSeatType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderAirTrade whereStartStation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderAirTrade whereStartTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderAirTrade whereState($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderAirTrade whereTicketNo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderAirTrade whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderAirTrade whereTotalFacePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderAirTrade whereTotalOtherFee($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderAirTrade whereTotalPayCash($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderAirTrade whereTotalRefundAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderAirTrade whereTradeNo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderAirTrade whereTrainNo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderAirTrade whereUtime($value)
 * @mixin \Eloquent
 * @property int $oid order 表 -- id
 * @method static \Illuminate\Database\Eloquent\Builder|OrderAirTrade whereOid($value)
 */
class OrderAirTrade extends Model
{
    use HasFactory;

    const UPDATED_AT = 'utime';

    protected $table = 'order_air_trade';

    /**新增机票订单数据
    * @param array $data
    * @throws
    */
    public function setAirTrade(array $data)
    {
        DB::table($this->table)->insert($data);
    }

    /**更新机票订单数据
    * @param string $tradeNo
    * @param array $data
    * @throws
    */
    public function updAirTrade(string $tradeNo, array $data)
    {
        $tradeData = (new OrderAirTrade())::where('trade_no', $tradeNo)->exists();
        if (!$tradeData)
        {
            throw new LogicException('机票订单信息不存在');
        }

        (new OrderAirTrade())::where('trade_no', $tradeNo)->whereIn('order_no', $data)->update(['state' => 9, 'order_state' => 10, 'utime' => date('Y-m-d H:i:s')]);
    }

    /**获取机票订单数据
     * @param string $orderNo
     * @return mixed
     * @throws
     */
    public function airOrderInfo(string $orderNo)
    {
        return (new AirTradeLogs())
            ->join('order_air_trade', function($join){
                $join->on('air_trade_logs.id', 'order_air_trade.aid');
            })
            ->where('air_trade_logs.order_no', $orderNo)
            ->distinct('air_trade_logs.order_no')
            ->get()
            ->first();
    }
}
