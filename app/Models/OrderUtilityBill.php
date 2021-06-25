<?php

namespace App\Models;

use Exception;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class OrderUtilityBill
 *
 * @property int                             $id
 * @property string                          $order_no     订单号
 * @property int                             $user_id      充值用户ID
 * @property string                          $account      充值账号
 * @property int                             $order_id     订单表ID
 * @property string                          $money        充值金额
 * @property string                          $trade_no     接口方返回单号
 * @property int                             $pay_status   平台订单付款状态:0未付款,1已付款
 * @property int                             $status       充值状态:0充值中,1成功,9撤销
 * @property string                          $goods_title  商品名称
 * @property int                             $create_type  订单类型:1水费,2电费,3燃气费
 * @property \Illuminate\Support\Carbon|null $created_at   创建时间
 * @property \Illuminate\Support\Carbon|null $updated_at   更新时间
 * @property string                          $bill_cycle   账单账期
 * @property string                          $contract_no  账单合同号
 * @property string                          $content_id   账期标识
 * @property string                          $item4        扩展字段
 * @property int                             $prepaid_flag 账号类型：1是预付费 2后付费
 * @property string                          $penalty      滞纳金
 * @property string                          $balance      余额
 * @property string                          $pay_amount   应缴金额
 * @property string                          $item_id      标准商品ID,接口返回
 * @method static \Illuminate\Database\Eloquent\Builder|OrderUtilityBill whereAccount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderUtilityBill whereBalance($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderUtilityBill whereBillCycle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderUtilityBill whereContentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderUtilityBill whereContractNo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderUtilityBill whereCreateType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderUtilityBill whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderUtilityBill whereGoodsTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderUtilityBill whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderUtilityBill whereItem4($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderUtilityBill whereItemId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderUtilityBill whereMoney($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderUtilityBill whereOrderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderUtilityBill whereOrderNo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderUtilityBill wherePayAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderUtilityBill wherePayStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderUtilityBill wherePenalty($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderUtilityBill wherePrepaidFlag($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderUtilityBill whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderUtilityBill whereTradeNo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderUtilityBill whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderUtilityBill whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderUtilityBill newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|OrderUtilityBill newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|OrderUtilityBill query()
 * @mixin \Eloquent
 * @package App\Models
 * @author lidong<947714443@qq.com>
 * @date 2021/6/15 0015
 */
class OrderUtilityBill extends Model
{
    
    use HasFactory;
    
    protected $table = 'order_utility_bill';
    
    /**
     * 生成水费账单
     *
     * @param string $account
     * @param float  $money
     * @param string $order_no
     * @param int    $order_id
     * @param int    $uid
     *
     * @param        $itemId
     * @param string $billCycle
     * @param string $contractNo
     * @param string $contentId
     * @param string $item4
     *
     * @return $this
     * @throws \Exception
     */
    public function setWaterOrder(
        $account,
        $money,
        $order_no,
        $order_id,
        $uid,
        $itemId,
        $billCycle = '',
        $contractNo = '',
        $contentId = '',
        $item4 = ''
    ) {
        try {
            $this->create_type = '1';
            $this->setOrder(
                $account,
                $money,
                $order_no,
                $order_id,
                $uid,
                $itemId,
                $billCycle,
                $contractNo,
                $contentId,
                $item4
            );
        } catch (Exception $e) {
            throw  $e;
        }
        return $this;
    }
    
    /**
     * 生成电费订单
     *
     * @param        $account
     * @param        $money
     * @param        $order_no
     * @param        $order_id
     * @param        $uid
     *
     * @param        $itemId
     * @param string $billCycle
     * @param string $contractNo
     * @param string $contentId
     * @param string $item4
     *
     * @return $this
     * @throws \Exception
     */
    public function setElectricityOrder(
        $account,
        $money,
        $order_no,
        $order_id,
        $uid,
        $itemId,
        $billCycle = '',
        $contractNo = '',
        $contentId = '',
        $item4 = ''
    ) {
        try {
            $this->create_type = '2';
            $this->setOrder(
                $account,
                $money,
                $order_no,
                $order_id,
                $uid,
                $itemId,
                $billCycle,
                $contractNo,
                $contentId,
                $item4
            );
        } catch (Exception $e) {
            throw  $e;
        }
        return $this;
    }
    
    /**
     * 生成燃气费订单
     *
     * @param        $account
     * @param        $money
     * @param        $order_no
     * @param        $order_id
     * @param        $uid
     *
     * @param        $itemId
     * @param string $billCycle
     * @param string $contractNo
     * @param string $contentId
     * @param string $item4
     *
     * @return $this
     * @throws \Exception
     */
    public function setGasOrder(
        $account,
        $money,
        $order_no,
        $order_id,
        $uid,
        $itemId,
        $billCycle = '',
        $contractNo = '',
        $contentId = '',
        $item4 = ''
    ) {
        try {
            $this->create_type = '3';
            $this->setOrder(
                $account,
                $money,
                $order_no,
                $order_id,
                $uid,
                $itemId,
                $billCycle,
                $contractNo,
                $contentId,
                $item4
            );
        } catch (Exception $e) {
            throw  $e;
        }
        return $this;
    }
    
    /**
     * Description:
     *
     * @param string $account
     * @param string $money
     * @param string $order_no
     * @param int    $order_id
     * @param int    $uid
     * @param string $itemId
     * @param string $billCycle
     * @param string $contractNo
     * @param string $contentId
     * @param string $item4
     *
     * @return $this
     * @throws \Exception
     * @author lidong<947714443@qq.com>
     * @date   2021/6/15 0015
     */
    public function setOrder(
        $account,
        $money,
        $order_no,
        $order_id,
        $uid,
        $itemId,
        $billCycle = '',
        $contractNo = '',
        $contentId = '',
        $item4 = ''
    ) {
        try {
            $this->order_no = $order_no;
            $this->account = $account;
            $this->money = $money;
            $this->order_id = $order_id;
            $this->user_id = $uid;
            $this->item_id = $itemId;
            if ($billCycle) {
                $this->bill_cycle = $billCycle;
            }
            if ($contractNo) {
                $this->contract_no = $contractNo;
            }
            if ($contentId) {
                $this->content_id = $contentId;
            }
            if ($item4) {
                $this->item4 = $item4;
            }
            $this->save();
        } catch (Exception $e) {
            throw $e;
        }
        return $this;
    }
}
