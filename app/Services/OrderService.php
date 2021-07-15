<?php

namespace App\Services;

use App\Exceptions\LogicException;
use App\Models\AirTradeLogs;
use App\Models\AssetsLogs;
use App\Models\AssetsType;
use App\Models\CityNode;
use App\Models\IntegralLogs;
use App\Models\Order;
use App\Models\OrderMobileRecharge;
use App\Models\RebateData;
use App\Models\Setting;
use App\Models\TradeOrder;
use App\Models\User;
use App\Services\AirOrderService;
use App\Services\bmapi\MobileRechargeService;
use App\Services\bmapi\UtilityBillRechargeService;
use App\Services\bmapi\VideoCardService;
use App\Services\ShowApi\VideoOrderService;
use Exception;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Models\LkshopOrder;

class OrderService
{
    /**完成订单
     *
     * @param string $orderNo
     *
     * @return mixed
     */
    public function completeOrder(string $orderNo)
    {
        $tradeOrderInfo = TradeOrder::where('status', 'succeeded')
                                    ->where('order_no', $orderNo)
                                    ->first();
//        $tradeOrderInfo = TradeOrder::where('order_no', $orderNo)->first();
//        dd($tradeOrderInfo);
        $id = $tradeOrderInfo->oid;
        $consumer_uid = $tradeOrderInfo->user_id;
        $description = $tradeOrderInfo->description;
        DB::beginTransaction();
        try {
            $order = Order::lockForUpdate()
                          ->find($id);
            if ($order->status != Order::STATUS_DEFAULT) {
                return false;
            }
            $order->status = Order::STATUS_SUCCEED;
            $order->pay_status = 'succeeded';//测试自动审核不要改支付状态
            $order->updated_at = date("Y-m-d H:i:s");
            //用户应返还几分比例
            $userRebateScale = Setting::getManySetting('user_rebate_scale');
            $businessRebateScale = Setting::getManySetting('business_rebate_scale');
            $rebateScale = array_combine($businessRebateScale, $userRebateScale);
            //判断控单是否开启
            $setValue = Setting::where('key', 'consumer_integral')
                               ->value('value');
            if ($setValue == 1) {
                $order->line_up = 1;
                $customer = User::find($order->uid);
                //按比例计算实际获得积分
                $profit_ratio_offset = ($order->profit_ratio < 1) ? $order->profit_ratio * 100 : $order->profit_ratio;
                $profit_ratio = bcdiv($rebateScale[ intval($profit_ratio_offset) ], 100, 4);
                $order->to_be_added_integral = bcmul($order->price, $profit_ratio, 2);
            } else {
                //通过，给用户加积分、更新LK
                $customer = User::lockForUpdate()
                                ->find($order->uid);
                //按比例计算实际获得积分
                $profit_ratio_offset = ($order->profit_ratio < 1) ? $order->profit_ratio * 100 : $order->profit_ratio;
                $profit_ratio = bcdiv($rebateScale[ intval($profit_ratio_offset) ], 100, 4);
                $customerIntegral = bcmul($order->price, $profit_ratio, 2);
                $amountBeforeChange = $customer->integral;
                $customer->integral = bcadd($customer->integral, $customerIntegral, 2);
                $lkPer = Setting::getSetting('lk_per') ?? 300;
                //更新LK
                $customer->lk = bcdiv($customer->integral, $lkPer, 0);
                $customer->save();
                IntegralLogs::addLog(
                    $customer->id,
                    $customerIntegral,
                    IntegralLogs::TYPE_SPEND,
                    $amountBeforeChange,
                    1,
                    '消费者完成订单',
                    $orderNo,
                    0,
                    $consumer_uid,
                    $description
                );
                //开启邀请补贴活动，添加邀请人积分，否则添加uid2用的商户积分
                $this->addInvitePoints(
                    $order->business_uid,
                    $order->profit_price,
                    $description,
                    $consumer_uid,
                    $orderNo
                );
            }
            $business = User::find($order->business_uid);
            //返佣
            $this->encourage($order, $customer, $business, $orderNo);
            $order->save();
            DB::commit();
        } catch (Exception $exception) {
            DB::rollBack();
            var_dump($exception->getMessage());
        }
    }
    
    /**完成订单
     *
     * @param string $orderNo
     *
     * @return mixed
     * @throws
     */
    public function completeBmOrder(string $orderNo)
    {
        $airOrderInfo = Order::where('pay_status', 'await')
                             ->where('order_no', $orderNo)
                             ->first();
        $type = '';
        if (!$airOrderInfo) {
            throw new LogicException('订单信息不存在');
        }
        if ($airOrderInfo->name == '飞机票') {
            $type = 'AT';
        }
        $id = $airOrderInfo->id;
        $consumer_uid = $airOrderInfo->uid;
        $description = $type;
        DB::beginTransaction();
        try {
            $order = Order::lockForUpdate()
                          ->find($id);
            if ($order->status != Order::STATUS_DEFAULT) {
                return false;
            }
            $order->status = Order::STATUS_SUCCEED;
            $order->pay_status = 'succeeded';//测试自动审核不要改支付状态
            $order->updated_at = date("Y-m-d H:i:s");
            //用户应返还几分比例
            $userRebateScale = Setting::getManySetting('user_rebate_scale');
            $businessRebateScale = Setting::getManySetting('business_rebate_scale');
            $rebateScale = array_combine($businessRebateScale, $userRebateScale);
            //判断控单是否开启
            $setValue = Setting::where('key', 'consumer_integral')
                               ->value('value');
            if ($setValue == 1) {
                $order->line_up = 1;
                $customer = User::find($order->uid);
                //按比例计算实际获得积分
                $profit_ratio_offset = ($order->profit_ratio < 1) ? $order->profit_ratio * 100 : $order->profit_ratio;
                $profit_ratio = bcdiv($rebateScale[ intval($profit_ratio_offset) ], 100, 4);
                $order->to_be_added_integral = bcmul($order->price, $profit_ratio, 2);
            } else {
                //通过，给用户加积分、更新LK
                $customer = User::lockForUpdate()
                                ->find($order->uid);
                //按比例计算实际获得积分
                $profit_ratio_offset = ($order->profit_ratio < 1) ? $order->profit_ratio * 100 : $order->profit_ratio;
                $profit_ratio = bcdiv($rebateScale[ intval($profit_ratio_offset) ], 100, 4);
                $customerIntegral = bcmul($order->price, $profit_ratio, 2);
                $amountBeforeChange = $customer->integral;
                $customer->integral = bcadd($customer->integral, $customerIntegral, 2);
                $lkPer = Setting::getSetting('lk_per') ?? 300;
                //更新LK
                $customer->lk = bcdiv($customer->integral, $lkPer, 0);
                $customer->save();
                IntegralLogs::addLog(
                    $customer->id,
                    $customerIntegral,
                    IntegralLogs::TYPE_SPEND,
                    $amountBeforeChange,
                    1,
                    '消费者完成订单',
                    $orderNo,
                    0,
                    $consumer_uid,
                    $description
                );
                //开启邀请补贴活动，添加邀请人积分，否则添加uid2用的商户积分
                $this->addInvitePoints(
                    $order->business_uid,
                    $order->profit_price,
                    $description,
                    $consumer_uid,
                    $orderNo
                );
            }
            $business = User::find($order->business_uid);
            //返佣
            $this->encourage($order, $customer, $business, $orderNo);
            $order->save();
            DB::commit();
        } catch (Exception $exception) {
            DB::rollBack();
        }
    }
    
    /**返佣
     *
     * @param $order
     * @param $user
     * @param $business
     *
     * @throws \App\Exceptions\LogicException
     */
    private function encourage($order, $user, $business, $orderNo)
    {
        //获取资产类型
        $assets = AssetsType::where("assets_name", AssetsType::DEFAULT_ASSETS_ENCOURAGE)
                            ->first();
        //公益捐赠
        $welfareUid = Setting::getSetting('welfare_uid');
        $welfareAmount = 0;
        if ($welfareUid) {
            $welfare = Setting::getSetting('welfare');
            $welfareAmount = bcmul($order->profit_price, bcdiv($welfare, 100, 6), 2);
            AssetsService::BalancesChange(
                $orderNo,
                $welfareUid,
                $assets,
                $assets->assets_name,
                $welfareAmount,
                AssetsLogs::OPERATE_TYPE_CHARITY_REBATE,
                "公益捐赠"
            );
        }
        //来客平台
        $platformUid = Setting::getSetting('platform_uid');
        $platformAmount = 0;
        if ($platformUid) {
            $platform = Setting::getSetting('platform');
            $platformAmount = bcmul($order->profit_price, bcdiv($platform, 100, 6), 2);
            AssetsService::BalancesChange(
                $orderNo,
                $platformUid,
                $assets,
                $assets->assets_name,
                $platformAmount,
                AssetsLogs::OPERATE_TYPE_PLATFORM_REBATE,
                "来客平台维护费"
            );
        }
        //分享佣金
        /* 计算总佣金 */
        $shareScale = Setting::getSetting('share_scale');
        $shareAmount = bcmul($order->profit_price, bcdiv($shareScale, 100, 6), 2);
        // 分享佣金分成三级给予
        $EncourageService = new EncourageService();
        $EncourageService->inviteEncourage($order, $user, $assets, $orderNo, $platformUid);
//        $invite = User::where('status', User::STATUS_NORMAL)
//                      ->whereId($user->invite_uid)
//                      ->first();
//        if (!$invite) {
//            $uid = $platformUid;
//            $remark = '下级消费返佣（上级账号被封禁或不存在）';
//        } else {
//            $remark = '下级消费返佣';
//            $uid = $invite->id;
//        }
//        $shareScale = Setting::getSetting('share_scale');
//        $shareAmount = bcmul($order->profit_price, bcdiv($shareScale, 100, 6), 2);
//        AssetsService::BalancesChange(
//            $orderNo,
//            $uid,
//            $assets,
//            $assets->assets_name,
//            $shareAmount,
//            AssetsLogs::OPERATE_TYPE_INVITE_REBATE,
//            $remark
//        );
        //市节点返佣
        $cityNodeRebate = Setting::getSetting('city_node_rebate') ?? 0;
        $cityAmount = 0;
        if ($cityNodeRebate > 0) {
            //判断商家是否在市节点
            $cityNode =
                CityNode::where('status', 1)
                        ->where('province', $order->business->province)
                        ->whereNotNull('uid')
                        ->where('city', $order->business->city)
                        ->whereNull('district')
                        ->first();
            if (!$cityNode) {
                $uid = $platformUid;
                $remark = '市级节点暂无，分配到来客平台';
            } else {
                $remark = '市节点运营返佣';
                $uid = $cityNode->uid;
            }
            //市长分配比列0.25%
            $cityAmount = bcmul($order->profit_price, bcdiv($cityNodeRebate, 100, 6), 8);
            AssetsService::BalancesChange(
                $orderNo,
                $uid,
                $assets,
                $assets->assets_name,
                $cityAmount,
                AssetsLogs::OPERATE_TYPE_CITY_REBATE,
                $remark
            );
        }
        //区节点返佣
        $districtNodeRebate = Setting::getSetting('district_node_rebate') ?? 0;
        $districtAmount = 0;
        if ($districtNodeRebate > 0) {
            //判断商家是否在区节点
            $districtNode =
                CityNode::where('status', 1)
                        ->where('province', $order->business->province)
                        ->whereNotNull('uid')
                        ->where('city', $order->business->city)
                        ->where('district', $order->business->district)
                        ->first();
            if (!$districtNode) {
                $uid = $platformUid;
                $remark = '区级节点暂无，分配到来客平台';
            } else {
                $remark = '区级节点运营返佣';
                $uid = $districtNode->uid;
            }
            //区长分配0.45%
            $districtAmount = bcmul($order->profit_price, bcdiv($districtNodeRebate, 100, 6), 8);
            AssetsService::BalancesChange(
                $orderNo,
                $uid,
                $assets,
                $assets->assets_name,
                $districtAmount,
                AssetsLogs::OPERATE_TYPE_DISTRICT_REBATE,
                $remark
            );
        }
        //同级返佣
        $sameLeader = Setting::getSetting('same_leader') ?? 0;
        $sameAmount = 0;
        //同级别分配比列0.1%
        if ($sameLeader > 0) {
            $sameAmount = bcmul($order->profit_price, bcdiv($sameLeader, 100, 6), 8);
        }
        //盟主返佣
        $leaderShare = Setting::getSetting('leader_share') ?? 0;
        $headAmount = 0;
        //盟主分配0.7%
        if ($leaderShare > 0) {
            $headAmount = bcmul($order->profit_price, bcdiv($leaderShare, 100, 6), 8);
        }
        $memberHead = User::whereId($business->invite_uid)
                          ->first();
        //普通用户邀请商家返佣
        $userBRebate = Setting::getSetting('user_b_rebate') ?? 0;
        $ordinaryAmount = 0;
        if ($userBRebate > 0) {
            $ordinaryAmount = bcmul($order->profit_price, bcdiv($userBRebate, 100, 6), 8);
        }
        //同级奖励是否给平台
        $isSamePlat = false;
        if ($memberHead->status != User::STATUS_NORMAL) {
            $uid = $platformUid;
            $remark = '直推人账户被封禁，分配到平台账户';
            $inviteAmount = bcadd($headAmount, $ordinaryAmount, 8);
        } else {
            $inviteAmount = $ordinaryAmount;
            $remark = '邀请商家，获得盈利返佣';
            $uid = $memberHead->id;
            //如果直推上级是盟主用户
            if ($memberHead->member_head == 2) {
                //直接拿0.7%奖励
                $inviteAmount = bcadd($headAmount, $ordinaryAmount, 8);
                //同级盟主奖励
                $tes =
                    $this->leaderRebate(
                        $orderNo,
                        $memberHead->invite_uid,
                        $sameAmount,
                        $assets,
                        '同级别盟主奖励',
                        AssetsLogs::OPERATE_TYPE_SHARE_B_REBATE,
                        1
                    );
                if ($tes == false) {
                    $isSamePlat = true;
                }
            } else {
                //往上找2级 是否盟主
                $res =
                    $this->leaderRebate(
                        $orderNo,
                        $memberHead->invite_uid,
                        $headAmount,
                        $assets,
                        '邀请商家盟主分红',
                        AssetsLogs::OPERATE_TYPE_SHARE_B_REBATE,
                        2
                    );
                if ($res == false) {
                    if ($headAmount > 0) {
                        AssetsService::BalancesChange(
                            $orderNo,
                            $platformUid,
                            $assets,
                            $assets->assets_name,
                            $headAmount,
                            AssetsLogs::OPERATE_TYPE_SHARE_B_REBATE,
                            '没有盟主，分配到平台账户'
                        );
                    }
                    $isSamePlat = true;
                } else {
                    //同级盟主奖励
                    $res =
                        $this->leaderRebate(
                            $orderNo,
                            $res->invite_uid,
                            $sameAmount,
                            $assets,
                            '同级别盟主奖励',
                            AssetsLogs::OPERATE_TYPE_SHARE_B_REBATE,
                            1
                        );
                    if ($res == false) {
                        $isSamePlat = true;
                    }
                }
            }
        }
        if ($sameAmount > 0 && $isSamePlat == true) {
            AssetsService::BalancesChange(
                $orderNo,
                $platformUid,
                $assets,
                $assets->assets_name,
                $sameAmount,
                AssetsLogs::OPERATE_TYPE_SHARE_B_REBATE,
                '没有同级盟主，分配到平台账户'
            );
        }
        if ($inviteAmount > 0) {
            AssetsService::BalancesChange(
                $orderNo,
                $uid,
                $assets,
                $assets->assets_name,
                $inviteAmount,
                AssetsLogs::OPERATE_TYPE_SHARE_B_REBATE,
                $remark
            );
        }
        $market =
            bcadd(
                $districtAmount,
                bcadd($cityAmount, bcadd(bcadd($sameAmount, $headAmount, 8), $ordinaryAmount, 8), 8),
                8
            );
        $this->updateRebateData($welfareAmount, $shareAmount, $market, $platformAmount, $order->price, $user);
    }
    
    /**找盟主
     *
     * @param       $invite_uid
     * @param       $amount
     * @param       $assets
     * @param       $msg
     * @param       $type
     * @param int   $level
     *
     * @return false
     * @throws \App\Exceptions\LogicException
     */
    public function leaderRebate($orderNo, $invite_uid, $amount, $assets, $msg, $type, $level = 2)
    {
        if ($level <= 0) {
            return false;
        }
        $user = User::whereId($invite_uid)
                    ->first();
        //如果是盟主,奖励0.3直接给与他
        if ($user && $user->member_head == 2 && $user->status == User::STATUS_NORMAL) {
            if ($amount > 0) {
                AssetsService::BalancesChange($orderNo, $user->id, $assets, $assets->assets_name, $amount, $type, $msg);
            }
            return $user;
        } elseif ($user) {
            $level--;
            return $this->leaderRebate($orderNo, $user->invite_uid, $amount, $assets, $msg, $type, $level);
        } else {
            return false;
        }
    }
    
    /**更新返佣统计
     *
     * @param $welfare
     * @param $share
     * @param $market
     * @param $platform
     * @param $price
     * @param $user
     */
    public function updateRebateData($welfare, $share, $market, $platform, $price, $user)
    {
        $rebateData = RebateData::firstOrCreate(['day' => now()->toDateString()]);
        $rebateData->welfare = bcadd($rebateData->welfare, $welfare, 2);
        $rebateData->share = bcadd($rebateData->share, $share, 2);
        $rebateData->market = bcadd($rebateData->market, $market, 2);
        $rebateData->platform = bcadd($rebateData->platform, $platform, 2);
        $rebateData->people = Order::where("status", Order::STATUS_SUCCEED)
                                   ->distinct("uid")
                                   ->whereBetween('created_at', [now()->startOfDay(), now()->endOfDay()])
                                   ->count() + 1;
        $rebateData->total_consumption = bcadd($price, $rebateData->total_consumption, 8);
        $rebateData->save();
    }
    
    //邀请补贴和邀请人积分添加
    //商户uid,实际让利比例，订单分类 HF YK MT,消费者uid
    public function addInvitePoints($order_business_uid, $order_profit_price, $description, $uid, $orderNo)
    {
//判断邀请补贴活动是否开启，如果开启就将邀请积分添加到该用户的邀请人里
        $InvitePointsArr = [
            'HF'  => 'Invite_points_hf',
            'YK'  => 'Invite_points_yk',
            'MT'  => 'Invite_points_mt',
            'ZL'  => 'Invite_points_zl',
            'MZL' => 'Invite_points_mzl',
            'VC'  => 'Invite_points_vc',
        ];
        $activityState = 0;
        if ($description != 'LR' && isset($InvitePointsArr[ $description ])) {
            $key = $InvitePointsArr[ $description ];
            //判断活动是否开启
            $setValue = Setting::where('key', $key)
                               ->value('value');
            if ($setValue != 0 && strstr($setValue, '|') != false) {
                $dateArr = explode('|', $setValue);
                if (strtotime($dateArr[ 0 ]) < time() && time() < strtotime($dateArr[ 1 ])) {
                    $invite_uid = User::where('id', $uid)
                                      ->value('invite_uid');//邀请人uid
                    $activityState = 1;
                } else {
                    $invite_uid = $order_business_uid;
                    $activityState = 0;
                }
            } else {
                $invite_uid = $order_business_uid;
                $activityState = 0;
            }
        } else {
            $invite_uid = $order_business_uid;
            $activityState = 0;
        }
        //给商家加积分，更新LK
        $business = User::lockForUpdate()
                        ->find($invite_uid);
        $amountBeforeChange = $business->business_integral;
        $business->business_integral = bcadd($business->business_integral, $order_profit_price, 2);
        $businessLkPer = Setting::getSetting('business_Lk_per') ?? 60;
        //更新LK
        $business->business_lk = bcdiv($business->business_integral, $businessLkPer, 0);
        $business->save();
        IntegralLogs::addLog(
            $business->id,
            $order_profit_price,
            IntegralLogs::TYPE_SPEND,
            $amountBeforeChange,
            2,
            '商家完成订单',
            $orderNo,
            $activityState,
            $uid,
            $description
        );
    }
    
    /**
     * Description:
     *
     * @param int    $id           order表ID
     * @param int    $consumer_uid 用户ID
     * @param string $description  订单类型
     * @param string $orderNo      订单号
     *
     * @return bool
     * @throws \Throwable
     * @author lidong<947714443@qq.com>
     * @date   2021/6/11 0011
     */
    public function completeOrderTable(int $id, int $consumer_uid, string $description, string $orderNo)
    {
        DB::beginTransaction();
        try {
            $order = Order::lockForUpdate()
                          ->find($id);
            if ($order->status != Order::STATUS_DEFAULT) {
                return false;
            }
            $order->status = Order::STATUS_SUCCEED;
            $order->pay_status = 'succeeded';//测试自动审核不要改支付状态
            $order->updated_at = date("Y-m-d H:i:s");
            //用户应返还几分比例
            $userRebateScale = Setting::getManySetting('user_rebate_scale');
            $businessRebateScale = Setting::getManySetting('business_rebate_scale');
            $rebateScale = array_combine($businessRebateScale, $userRebateScale);
            //判断控单是否开启
            $setValue = Setting::where('key', 'consumer_integral')
                               ->value('value');
            if ($setValue == 1) {
                $order->line_up = 1;
                $customer = User::find($order->uid);
                //按比例计算实际获得积分
                $profit_ratio_offset = ($order->profit_ratio < 1) ? $order->profit_ratio * 100 : $order->profit_ratio;
                $profit_ratio = bcdiv($rebateScale[ intval($profit_ratio_offset) ], 100, 4);
                $order->to_be_added_integral = bcmul($order->price, $profit_ratio, 2);
            } else {
                //通过，给用户加积分、更新LK
                $customer = User::lockForUpdate()
                                ->find($order->uid);
                //按比例计算实际获得积分
                $profit_ratio_offset = ($order->profit_ratio < 1) ? $order->profit_ratio * 100 : $order->profit_ratio;
                $profit_ratio = bcdiv($rebateScale[ intval($profit_ratio_offset) ], 100, 4);
                $customerIntegral = bcmul($order->price, $profit_ratio, 2);
                $amountBeforeChange = $customer->integral;
                $customer->integral = bcadd($customer->integral, $customerIntegral, 2);
                $lkPer = Setting::getSetting('lk_per') ?? 300;
                //更新LK
                $customer->lk = bcdiv($customer->integral, $lkPer, 0);
                $customer->save();
                IntegralLogs::addLog(
                    $customer->id,
                    $customerIntegral,
                    IntegralLogs::TYPE_SPEND,
                    $amountBeforeChange,
                    1,
                    '消费者完成订单',
                    $orderNo,
                    0,
                    $consumer_uid,
                    $description
                );
                //开启邀请补贴活动，添加邀请人积分，否则添加uid2用的商户积分
                $this->addInvitePoints(
                    $order->business_uid,
                    $order->profit_price,
                    $description,
                    $consumer_uid,
                    $orderNo
                );
            }
            $business = User::find($order->business_uid);
            //返佣
            $this->encourage($order, $customer, $business, $orderNo);
            $order->save();
            DB::commit();
        } catch (Exception $exception) {
            DB::rollBack();
        }
    }
    
    /**
     * Description:
     * TODO:判断订单类型
     *
     * @param                          $order_id
     *
     * @param \App\Models\Order|null   $Order
     *
     * @return mixed|string
     * @throws \Exception
     * @author lidong<947714443@qq.com>
     * @date   2021/6/11 0011
     */
    public function getDescription($order_id, Order $Order = null)
    {
        if (empty($Order)) {
            $Order = Order::find($order_id);
        }
        try {
            if (empty($Order)) {
                throw new Exception('订单数据为空');
            }
            if (!empty($Order->trade)) { /* 兼容trade_order */
                $description = $Order->trade->description;
            }
            if (!empty($Order->mobile)) {
                switch ($Order->mobile->create_type) {
                    case OrderMobileRecharge::CREATE_TYPE_ZL:
                        $description = 'ZL';
                        break;
                    case OrderMobileRecharge::CREATE_TYPE_MZL:
                        $description = 'MZL';
                        break;
                    default:
                        ;
//                        $description = 'HF';
                }
            }
            if (!empty($Order->video)) { /* 视频会员订单 */
                $description = 'VC';
            }
            if (!empty($Order->air)) { /* 机票订单 */
                $description = 'AT';
            }
            if (!empty($Order->utility)) { /* 生活缴费 */
                $description = 'UB';
            }
            if (!empty($Order->lkshopOrder)) { /* 生活缴费 */
                $description = 'SHOP';
            }
            /* 判断 是否已经获取到对应类型的订单*/
            if (empty($description)) {
                throw new Exception('没有对应类型的订单');
            }
        } catch (Exception $e) {
            throw $e;
        }
        return $description;
    }
    
    /**
     * Description:更新对应子订单
     *
     *
     * @param int    $order_id
     * @param array  $data
     *
     * @param string $description
     *
     * @throws \Exception
     * @author lidong<947714443@qq.com>
     * @date   2021/6/11 0011
     */
    public function updateSubOrder($order_id, $data, $description)
    {
        $Order = new Order();
        try {
            $orderInfo = $Order->find($order_id);
            if (empty($orderInfo)) {
                throw new Exception('订单不存在');
            }
            switch ($description) {
                case 'VC': /* 视频会员充值订单处理 */
                    $orderInfo->video->money = $data[ 'amount' ];
                    $orderInfo->video->status = 0;
                    $orderInfo->video->updated_at = $data[ 'pay_time' ];
                    $orderInfo->video->save();
                    $VideoOrderService = new VideoOrderService();
                    $VideoOrderService->updateRechargeLogs($data, $description);
                    break;
                case 'AT': /* 机票订单处理 */
                    $orderInfo->air->money = $data[ 'amount' ];
                    $orderInfo->air->status = 0;
                    $orderInfo->air->updated_at = $data[ 'pay_time' ];
                    $orderInfo->save();
                    break;
                case 'UB':
                    $orderInfo->utility->money = $data[ 'amount' ];
                    $orderInfo->utility->status = 0;
                    $orderInfo->utility->updated_at = $data[ 'pay_time' ];
                    $orderInfo->utility->save();
                    break;
                case 'ZL':
                case 'MZL':
                    $orderInfo->mobile->money = $data[ 'amount' ];
                    $orderInfo->mobile->status = 0;
                    $orderInfo->mobile->updated_at = $data[ 'pay_time' ];
                    $orderInfo->mobile->save();
                    break;
                default:
                    throw new Exception('订单类型未知');
            }
        } catch (Exception $e) {
            throw $e;
        }
    }
    
    /**
     * Description:支付前更新子订单
     *
     * @param int                    $order_id
     * @param string                 $order_no
     *
     * @param string                 $description
     * @param \App\Models\Order|null $Order
     *
     * @throws \Exception
     * @author lidong<947714443@qq.com>
     * @date   2021/6/16 0016
     */
    public function updateOrderNoSubOrder($order_id, $order_no, $description, Order $Order = null)
    {
        if (empty($Order)) {
            $Order = Order::find($order_id);
        }
        try {
            switch ($description) {
                case 'VC':
                    $Order->video->order_no = $order_no;
                    $Order->video->save();
                    break;
                case 'UB':
                    $Order->utility->order_no = $order_no;
                    $Order->utility->save();
                    break;
                case 'HF':
                case 'ZL':
                case 'MZL':
                    if ($description == 'HF' || $description == 'ZL') {
                        $Order->trade->order_no = $order_no;
                        $Order->trade->save();
                    }
                    // 批量充值订单更新
                    $Order->mobile->order_no = $order_no;
                    $Order->mobile->save();
                    break;
                default:
                    throw new Exception('子订单类型未知');
            }
        } catch (Exception $e) {
            throw $e;
        }
    }
    
    /**
     * Description:完成订单后的后续操作[充值等]
     *
     * @param int                    $order_id    订单ID
     * @param array                  $data        云通支付信息
     * @param string                 $description 类型
     * @param \App\Models\Order|null $Order       需要操作的数据
     *
     * @author lidong<947714443@qq.com>
     * @date   2021/6/15 0015
     */
    public function afterCompletedOrder(int $order_id, $data, string $description, Order $Order = null)
    {
        if (empty($Order)) {
            $Order = Order::find($order_id);
        }
        try {
            if (empty($Order)) {
                throw new  Exception('订单数据不存在');
            }
            switch ($description) {
                case 'VC': /* 视频会员充值 */
                    if ($Order->video->channel == 'bm') {
                        $VideoService = new VideoCardService();
                        $VideoService->recharge($order_id, $Order);
                    } elseif ($Order->video->channel == 'ww') {
                        /* 获取卡密 */
                        $WanWeiVideoService = new VideoOrderService();
                        $WanWeiVideoService->recharge($order_id, $Order);
                        /* 发送消息 */
                        $UserMsgService = new UserMsgService();
                        $UserMsgService->sendWanWeiVideoMsg($order_id, $data, $Order);
                    }
                    break;
                case 'UB': /* 生活缴费 */
                    $UtilityService = new UtilityBillRechargeService();
                    $UtilityService->recharge($order_id);
                    break;
                case 'AT': /* 机票充值 */
                    (new AirOrderService())->airOrder($order_id);
                    break;
                case 'HF':
                case 'ZL':
                case 'MZL':
                    /* 手机充值订单*/
                    $MobileService = new MobileRechargeService();
                    if ($description == 'HF' || $description == 'ZL') {
                        $MobileService->recharge($order_id, $Order->order_no);
                    } else {
                        /* TODO:多账号代充 */
                        $MobileService->manyRecharge($order_id, $Order);
                    }
                    break;
                default:/* 订单无需处理 */
                    ;
            }
        } catch (Exception $e) {
            \Log::debug('afterCompletedOrder:Error:'.$e->getMessage(), [json_encode($e).''.json_encode($Order)]);
        }
    }
}
