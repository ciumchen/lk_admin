<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Exceptions\LogicException;

/**
 * App\Models\TradeOrder
 *
 * @property int $id
 * @property int|null $user_id 买家id
 * @property string|null $title 商品标题
 * @property string $price 商品价格
 * @property int|null $num 购买数量
 * @property string|null $numeric 话费：手机号；美团、油卡：卡号
 * @property string|null $telecom 话费充值运营商
 * @property string|null $pay_time 付款时间
 * @property string|null $end_time 结束时间
 * @property string|null $modified_time 最后更新时间
 * @property string $status 交易状态：await 待支付；pending 支付处理中； succeeded 支付成功；failed 支付失败
 * @property string $order_from 订单来源：alipay；wx
 * @property string $order_no 订单号
 * @property string $need_fee 支付金额
 * @property string $profit_ratio 让利比例
 * @property string $profit_price 实际让利金额
 * @property string $integral 订单用户积分
 * @property string|null $description 支付附加说明：MT - 美团；HF - 话费；YK - 油卡
 * @property int|null $oid order表 -- id
 * @property \Illuminate\Support\Carbon|null $created_at 创建时间
 * @property string|null $remarks 美团卡用户姓名
 * @property \Illuminate\Support\Carbon|null $updated_at 更新时间
 * @method static \Illuminate\Database\Eloquent\Builder|TradeOrder newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TradeOrder newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TradeOrder query()
 * @method static \Illuminate\Database\Eloquent\Builder|TradeOrder whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TradeOrder whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TradeOrder whereEndTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TradeOrder whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TradeOrder whereIntegral($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TradeOrder whereModifiedTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TradeOrder whereNeedFee($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TradeOrder whereNum($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TradeOrder whereNumeric($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TradeOrder whereOid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TradeOrder whereOrderFrom($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TradeOrder whereOrderNo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TradeOrder wherePayTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TradeOrder wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TradeOrder whereProfitPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TradeOrder whereProfitRatio($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TradeOrder whereRemarks($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TradeOrder whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TradeOrder whereTelecom($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TradeOrder whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TradeOrder whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TradeOrder whereUserId($value)
 * @mixin \Eloquent
 */
class TradeOrder extends Model
{
    use HasFactory;

    protected $table = 'trade_order';

    /**生成订单
     * @param array $data
     * @return bool
     * @throws
     */
    public function setOrder(array $data)
    {
        return DB::table($this->table)->insert($data);
    }

    /**检查是否已经支付
     * @param int $uid
     * @return array
     * @throws
     */
    public function checkOrderPay (int $uid)
    {
        $res = DB::table($this->table)->where([['user_id', '=', $uid], ['status', '=', 'await']])->get();
        if (!$res)
            throw new LogicException('请先下单');

        if (count($res) > 0)
        {
            return ['code' => 1, 'msg' => '订单待支付'];
        } else
        {
            return ['code' => -1, 'msg' => '订单已支付'];
        }
    }

    /**更新订单状态
     * @param array $data
     * @throws
     */
    public function upTradeOrder(array $data)
    {
        $orderInfo = DB::table('trade_order')->where('order_no', '=', $data['order_no'])->get()->toArray();
        $order = [];
        foreach ($orderInfo as $val)
        {
            $order = $val;
        }
        $orderData = get_object_vars($order);

        if (!$orderInfo)
            throw new LogicException('订单不存在');
        if ($orderData['status'] != 'await')
            throw new LogicException('订单已支付');

        $orderIntegral = 0;

        //计算让利金额
        $profitPrice = $orderData['need_fee'] * $orderData['profit_ratio'];

        try {
            if ($data['status'] == 'succeeded' && !in_array($orderData['status'], ['pending', 'succeeded']))
            {
                //更新订单表
                $upData = [
                    'status' => $data['status'],
                    'profit_price' => $profitPrice,
                    'integral' => $orderIntegral,
                    'pay_time' => $data['pay_time'],
                    'end_time' => $data['end_time'],
                ];
                DB::table('trade_order')->where('order_no', $data['order_no'])->update($upData);
            }
        } catch (Exception $e) {
            throw $e;
        }
    }

    /**获取用户信息
     * @param string $orderNo
     * @return array
     * @throws
     */
    public function userInfo(string $orderNo)
    {
        return DB::table($this->table)->where('order_no', $orderNo)->get()->toArray();
    }

    /**获取用户信息
     * @param array $data
     * @return array
     * @throws
     */
    public function checkOrder(array $data)
    {
        DB::table('pay_logs')->where('order_no', $data['order_no'])->delete();

        $res = DB::table($this->table)->where('order_no', $data['order_no'])->first();
        $resData = get_object_vars($res);
        var_dump($resData);
        if (!$resData)
        {
            throw new LogicException('订单不存在');
        }

        if (!in_array($resData['status'], ['failed', 'await']))
        {
            throw new LogicException('订单不属于待支付或支付失败状态');
        }

        return $resData;
    }
}
