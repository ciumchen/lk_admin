<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Exceptions\LogicException;

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
