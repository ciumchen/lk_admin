<?php

namespace App\Models;

use Exception;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * App\Models\WithdrawCashLog
 *
 * @property int         $id
 * @property string      $balance_type      本平台内提现账户类型:来拼金或可提现余额
 * @property string      $channel           提现渠道:支付宝或微信
 * @property string      $money             提现金额
 * @property int         $user_id           用户ID
 * @property string      $alipay_user_id    提现支付宝UID
 * @property string      $alipay_account    用户支付宝账户
 * @property string      $order_no          提现订单号
 * @property string      $alipay_nickname   用户支付宝昵称
 * @property string      $alipay_avatar     用户支付宝头像
 * @property string      $real_name         用户真实姓名
 * @property string      $out_trade_no      转账单号[支付宝返回]
 * @property string      $pay_fund_order_id 支付资金流水号[支付宝返回]
 * @property string|null $trans_date        订单支付时间[支付宝返回]
 * @property string      $alipay_status     状态[支付宝返回]
 * @property string      $handling_ratio    手续费比例
 * @property string      $handling_price    手续费
 * @property string      $actual_amount     实际到账金额
 * @property string      $balance_fee       提现后账户余额
 * @property int         $status            交易状态:1处理中,2成功,3失败
 * @property string|null $remark            业务备注
 * @property string|null $failed_reason     提现失败原因
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static Builder|WithdrawCashLog newModelQuery()
 * @method static Builder|WithdrawCashLog newQuery()
 * @method static Builder|WithdrawCashLog query()
 * @method static Builder|WithdrawCashLog whereActualAmount($value)
 * @method static Builder|WithdrawCashLog whereAlipayAccount($value)
 * @method static Builder|WithdrawCashLog whereAlipayAvatar($value)
 * @method static Builder|WithdrawCashLog whereAlipayNickname($value)
 * @method static Builder|WithdrawCashLog whereAlipayStatus($value)
 * @method static Builder|WithdrawCashLog whereAlipayUserId($value)
 * @method static Builder|WithdrawCashLog whereBalanceFee($value)
 * @method static Builder|WithdrawCashLog whereBalanceType($value)
 * @method static Builder|WithdrawCashLog whereChannel($value)
 * @method static Builder|WithdrawCashLog whereCreatedAt($value)
 * @method static Builder|WithdrawCashLog whereFailedReason($value)
 * @method static Builder|WithdrawCashLog whereHandlingPrice($value)
 * @method static Builder|WithdrawCashLog whereHandlingRatio($value)
 * @method static Builder|WithdrawCashLog whereId($value)
 * @method static Builder|WithdrawCashLog whereMoney($value)
 * @method static Builder|WithdrawCashLog whereOrderNo($value)
 * @method static Builder|WithdrawCashLog whereOutTradeNo($value)
 * @method static Builder|WithdrawCashLog wherePayFundOrderId($value)
 * @method static Builder|WithdrawCashLog whereRealName($value)
 * @method static Builder|WithdrawCashLog whereRemark($value)
 * @method static Builder|WithdrawCashLog whereStatus($value)
 * @method static Builder|WithdrawCashLog whereTransDate($value)
 * @method static Builder|WithdrawCashLog whereUpdatedAt($value)
 * @method static Builder|WithdrawCashLog whereUserId($value)
 * @mixin \Eloquent
 */
class WithdrawCashLog extends BaseModel
{
    use HasFactory;
    
    protected $table = 'withdraw_cash_logs';
    
    protected $appends = ['status_text', 'balance_type_text', 'channel_text'];
    
    // 提现账户类型定义
    const BALANCE_PIN_TUAN     = 'pin_tuan';
    
    const BALANCE_CAN_WITHDRAW = 'can_withdraw';
    
    //状态定义
    const STATUS_DEFAULT = 1;
    
    const STATUS_SUCCESS = 2;
    
    const STATUS_FAILED  = 3;
    
    //提现渠道定义
    const CHANNEL_DEFAULT = 'unknown';
    
    const CHANNEL_ALIPAY  = 'alipay';
    
    /**
     * @var string[] 账户类型对应文字
     */
    public static $balanceText = [
        self::BALANCE_PIN_TUAN     => '来拼金',
        self::BALANCE_CAN_WITHDRAW => '补贴金',
    ];
    
    /**
     * @var string[] 状态文字
     */
    public static $statusText = [
        self::STATUS_DEFAULT => '处理中',
        self::STATUS_SUCCESS => '成功',
        self::STATUS_FAILED  => '失败',
    ];
    
    /**
     * @var string[] 样式
     */
    public static $statusStyle = [
        self::STATUS_DEFAULT => 'info',
        self::STATUS_SUCCESS => 'success',
        self::STATUS_FAILED  => 'danger',
    ];
    
    /**
     * @var string[] 提现渠道文字
     */
    public static $channelText = [
        self::CHANNEL_DEFAULT => '未知',
        self::CHANNEL_ALIPAY  => '支付宝',
    ];
    
    /**
     * Description:查询今天已经提现的额度
     *
     * @param $uid
     *
     * @return int|mixed
     * @author lidong<947714443@qq.com>
     * @date   2021/8/13 0013
     */
    public static function getTodayMoneyCount($uid)
    {
        return WithdrawCashLog::whereUserId($uid)
                              ->where('status', '=', '2')
                              ->whereBetween('created_at', [date('Y-m-d').' 00:00:00', date('Y-m-d H:i:s')])
                              ->sum('money');
    }
    
    /**
     * Description:
     *
     * @param $uid
     *
     * @return \App\Models\WithdrawCashLog|Builder|Model|\Illuminate\Database\Query\Builder|object|null
     * @author lidong<947714443@qq.com>
     * @date   2021/8/13 0013
     */
    public static function getLastLogsCreateTime($uid)
    {
        $time = WithdrawCashLog::whereUserId($uid)->orderByDesc('created_at')->value('created_at');
        return (empty($time) ? 0 : $time->toDateTimeString());
    }
    
    /**
     * Description:生成提现订单
     *
     * @param \App\Models\User $user
     * @param                  $money
     * @param                  $order_no
     *
     * @return $this
     * @throws \Exception
     * @author lidong<947714443@qq.com>
     * @date   2021/8/10 0010
     */
    public function setOrder(User $user, $money, $order_no)
    {
        try {
            $handling_ratio = Setting::getSetting('handling_ratio');
            $handling_price = bcmul($money, ($handling_ratio / 100), 2);
            $this->user_id = $user->id;
            $this->money = $money;
            $this->order_no = $order_no;
            $this->actual_amount = $money - $handling_price;
            $this->handling_ratio = $handling_ratio;
            $this->handling_price = $handling_price;
            $this->real_name = $user->real_name;
            $this->alipay_user_id = $user->alipay_user_id;
            $this->alipay_account = $user->alipay_account;
            $this->alipay_avatar = $user->alipay_avatar;
            $this->alipay_nickname = $user->alipay_nickname;
            $this->status = 1;
            $this->save();
        } catch (Exception $e) {
            throw $e;
        }
        return $this;
    }
    
    /**
     * Description:可提现余额
     *
     * @param \App\Models\User $user
     * @param                  $money
     * @param                  $order_no
     *
     * @author lidong<947714443@qq.com>
     * @date   2021/8/10 0010
     */
    public function setCanWithdrawOrder(User $user, Assets $Assets, $money, $order_no)
    {
        try {
            $this->balance_type = self::BALANCE_CAN_WITHDRAW;
            $this->balance_fee = $Assets->amount - $money;
            $this->setOrder($user, $money, $order_no);
        } catch (Exception $e) {
            throw $e;
        }
        return $this;
    }
    
    /**
     * Description:拼团金提现订单生成
     *
     * @param \App\Models\User $user
     * @param                  $money
     * @param                  $order_no
     *
     * @return $this
     * @throws \Exception
     * @author lidong<947714443@qq.com>
     * @date   2021/8/10 0010
     */
    public function setPinTuanOrder(User $user, $money, $order_no)
    {
        try {
            $this->balance_type = self::BALANCE_PIN_TUAN;
            $this->balance_fee = $user->balance_tuan - $money;
            $this->setOrder($user, $money, $order_no);
        } catch (Exception $e) {
            throw $e;
        }
        return $this;
    }
    
    /**
     * Description:状态文字
     *
     * @param $value
     *
     * @return string
     * @author lidong<947714443@qq.com>
     * @date   2021/8/10 0010
     */
    public function getStatusTextAttribute($value)
    {
        $value = '';
        if (isset($this->attributes[ 'status' ]) && !empty($this->attributes[ 'status' ])) {
            $value = self::$statusText[ $this->attributes[ 'status' ] ] ?: '未知';
        }
        return $value;
    }
    
    /**
     * Description:渠道文字
     *
     * @param $value
     *
     * @return string
     * @author lidong<947714443@qq.com>
     * @date   2021/8/10 0010
     */
    public function getChannelTextAttribute($value)
    {
        $value = '';
        if (isset($this->attributes[ 'channel' ]) && !empty($this->attributes[ 'channel' ])) {
            $value = self::$channelText[ $this->attributes[ 'channel' ] ] ?: '未知';
        }
        return $value;
    }
    
    /**
     * Description:账户类型文字
     *
     * @param $value
     *
     * @return string
     * @author lidong<947714443@qq.com>
     * @date   2021/8/10 0010
     */
    public function getBalanceTypeTextAttribute($value)
    {
        $value = '';
        if (isset($this->attributes[ 'balance_type' ]) && !empty($this->attributes[ 'balance_type' ])) {
            $value = self::$balanceText[ $this->attributes[ 'balance_type' ] ] ?: '未知';
        }
        return $value;
    }
}
