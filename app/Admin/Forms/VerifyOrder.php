<?php

namespace App\Admin\Forms;

use App\Admin\Repositories\AssetsLog;
use App\Admin\Repositories\Order;
use App\Models\AssetsType;
use App\Models\CityNode;
use App\Models\IntegralLog;
use App\Models\RebateData;
use App\Models\Setting;
use App\Models\TradeOrder;
use App\Models\User;
use App\Services\AssetsService;
use Dcat\Admin\Traits\LazyWidget;
use Dcat\Admin\Widgets\Form;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;
use exception;

class VerifyOrder extends Form
{
    use LazyWidget; // 使用异步加载功能
    /**
     * Handle the form request.
     *
     * @param array $input
     *
     * @return Response
     */
    public function handle(array $input)
    {
        $id = $this->payload['id'] ?? null;

        if(!$id){
            return $this->error('ID错误');
        }

        $remark = $input['remark'];
        $status = $input['status'];

        DB::beginTransaction();
        try{
            $order = \App\Models\Order::lockForUpdate()->find($id);
            if ($order->status==2){
                $this->location(null, '这条记录已审核通过，不能重复审核');
                return false;
            }

            $order->status = $status;

            //用户应返还几分比例
            $userRebateScale = Setting::getManySetting('user_rebate_scale');
            $businessRebateScale = Setting::getManySetting('business_rebate_scale');
            $rebateScale = array_combine($businessRebateScale, $userRebateScale);



            if($status == Order::STATUS_SUCCESS)
            {
                //判断控单是否开启
                $setValue = Setting::where('key','consumer_integral')->value('value');
                if($setValue==1){
                    $order->line_up = 1;
                    $customer = User::find($order->uid);
                    //按比例计算实际获得积分
                    $profit_ratio_offset = ($order->profit_ratio < 1) ? $order->profit_ratio * 100 : $order->profit_ratio;
                    $profit_ratio = bcdiv($rebateScale[ intval($profit_ratio_offset) ], 100, 4);
                    $order->to_be_added_integral = bcmul($order->price, $profit_ratio, 2);
                    $business = User::find($order->business_uid);

                }else{
                    //通过，给用户加积分、更新LK
                    $customer = User::lockForUpdate()->find($order->uid);
                    //按比例计算实际获得积分
                    $customerIntegral = bcmul($order->price, bcdiv($rebateScale[(int)$order->profit_ratio],100, 4), 2);
                    $amountBeforeChange =  $customer->integral;
                    $customer->integral = bcadd($customer->integral, $customerIntegral,2);

                    $lkPer = Setting::getSetting('lk_per')??300;
                    //更新LK
                    $customer->lk = bcdiv($customer->integral, $lkPer,0);
                    $customer->save();
                    IntegralLog::addLog($customer->id, $customerIntegral, IntegralLog::TYPE_SPEND, $amountBeforeChange, 1, '消费者完成订单');
                    //给商家加积分，更新LK
                    $business = User::lockForUpdate()->find($order->business_uid);
                    $amountBeforeChange = $business->business_integral;
                    $business->business_integral = bcadd($business->business_integral, $order->profit_price,2);

                    $businessLkPer = Setting::getSetting('business_Lk_per')??60;
                    //更新LK
                    $business->business_lk = bcdiv($business->business_integral, $businessLkPer,0);
                    $business->save();

                    IntegralLog::addLog($business->id, $order->profit_price, IntegralLog::TYPE_SPEND, $amountBeforeChange, 2, '商家完成订单');
                }

                if ($order->order_no)
                {
                    $orderDataInfo['order_no'] = $order->order_no;
                } else
                {
                    $orderDataInfo = TradeOrder::where('oid',$order->id)->first()->toArray();
                }
//                dd($orderDataInfo['order_no']);
                //返佣
                $this->encourage($order, $customer, $business,$orderDataInfo['order_no']);

            }else{
                $order->remark = $remark;
            }

            $order->save();

            DB::commit();
        }catch (\Exception $exception)
        {
            DB::rollBack();
            return $this->error($exception->getMessage());
        }
        return $this->location(null, '操作成功');
    }

    /**
     * Build a form here.
     */
    public function form()
    {
        $this->radio('status','是否通过')->options([
            Order::STATUS_SUCCESS => '审核通过',
            Order::STATUS_REFUSED => '审核不通过',
            ])->default(Order::STATUS_SUCCESS)->when(Order::STATUS_REFUSED,function (){
            $this->text('remark', '拒绝原因')->default('');
        })->required();
    }

    /**
     * The data of the form.
     *
     * @return array
     */
    public function default()
    {
        return [
            'remark'  => '',
        ];
    }

    /**返佣
     * @param $order
     * @param $user
     * @param $business
     * @throws Exception
     */
    private function encourage($order, $user, $business,$orderNo){

        //获取资产类型
        $assets = AssetsType::where("assets_name", AssetsType::DEFAULT_ASSETS_ENCOURAGE)->first();
        //公益捐赠
        $welfareUid = Setting::getSetting('welfare_uid');
        $welfareAmount = 0;
        if($welfareUid){
            $welfare = Setting::getSetting('welfare');
            $welfareAmount = bcmul($order->profit_price, bcdiv($welfare, 100, 6), 2);

            AssetsService::BalancesChange2(
                $welfareUid,
                $assets->id,
                $assets->assets_name,
                $welfareAmount,
                AssetsLog::OPERATE_TYPE_CHARITY_REBATE,
                "公益捐赠",$orderNo
            );
        }
        //来客平台
        $platformUid = Setting::getSetting('platform_uid');
        $platformAmount = 0;
        if($platformUid){
            $platform = Setting::getSetting('platform');
            $platformAmount = bcmul($order->profit_price, bcdiv($platform, 100, 6), 2);

            AssetsService::BalancesChange2(
                $platformUid,
                $assets->id,
                $assets->assets_name,
                $platformAmount,
                AssetsLog::OPERATE_TYPE_PLATFORM_REBATE,
                "来客平台维护费",$orderNo
            );
        }

        //分享佣金
        $invite = User::where('status', \App\Admin\Repositories\User::STATUS_NORMAL)->whereId($user->invite_uid)->first();

        if(!$invite){
            $uid = $platformUid;
            $remark = '下级消费返佣（上级账号被封禁或不存在）';
        }else{
            $remark = '下级消费返佣';
            $uid = $invite->id;
        }

        $shareScale = Setting::getSetting('share_scale');
        $shareAmount = bcmul($order->profit_price, bcdiv($shareScale, 100, 6), 2);

        AssetsService::BalancesChange2(
            $uid,
            $assets->id,
            $assets->assets_name,
            $shareAmount,
            AssetsLog::OPERATE_TYPE_INVITE_REBATE,
            $remark,$orderNo
        );

        //市节点返佣
        $cityNodeRebate = Setting::getSetting('city_node_rebate')??0;
        $cityAmount = 0;
        if($cityNodeRebate > 0) {

            //判断商家是否在市节点
            $cityNode = CityNode::where('status', 1)->where('province', $order->businessData->province)->whereNotNull('uid')->where('city', $order->businessData->city)->whereNull('district')->first();

            if(!$cityNode){
                $uid = $platformUid;
                $remark = '市级节点暂无，分配到来客平台';
            }else{
                $remark = '市节点运营返佣';
                $uid = $cityNode->uid;
            }

            //市长分配比列0.25%
            $cityAmount = bcmul($order->profit_price, bcdiv($cityNodeRebate, 100, 6), 8);

            AssetsService::BalancesChange2(
                $uid,
                $assets->id,
                $assets->assets_name,
                $cityAmount,
                AssetsLog::OPERATE_TYPE_CITY_REBATE,
                $remark,$orderNo
            );
        }
        //区节点返佣
        $districtNodeRebate = Setting::getSetting('district_node_rebate')??0;
        $districtAmount = 0;
        if($districtNodeRebate>0){
            //判断商家是否在区节点
            $districtNode = CityNode::where('status', 1)->where('province', $order->businessData->province)->whereNotNull('uid')->where('city', $order->businessData->city)->where('district', $order->businessData->district)->first();
            if(!$districtNode){
                $uid = $platformUid;
                $remark = '区级节点暂无，分配到来客平台';
            }else{
                $remark = '区级节点运营返佣';
                $uid = $districtNode->uid;
            }


            //区长分配0.45%
            $districtAmount = bcmul($order->profit_price, bcdiv($districtNodeRebate, 100, 6), 8);

            AssetsService::BalancesChange2(
                $uid,
                $assets->id,
                $assets->assets_name,
                $districtAmount,
                AssetsLog::OPERATE_TYPE_DISTRICT_REBATE,
                $remark,$orderNo
            );
        }

        //同级返佣
        $sameLeader = Setting::getSetting('same_leader')??0;
        $sameAmount = 0;
        //同级别分配比列0.1%
        if($sameLeader>0)
            $sameAmount = bcmul($order->profit_price, bcdiv($sameLeader, 100, 6), 8);


        //盟主返佣
        $leaderShare = Setting::getSetting('leader_share')??0;
        $headAmount = 0;
        //盟主分配0.7%
        if($leaderShare>0)
            $headAmount = bcmul($order->profit_price, bcdiv($leaderShare, 100, 6), 8);

        $memberHead = User::whereId($business->invite_uid)->first();

        //普通用户邀请商家返佣
        $userBRebate = Setting::getSetting('user_b_rebate')??0;
        $ordinaryAmount = 0;
        if($userBRebate>0)
            $ordinaryAmount = bcmul($order->profit_price, bcdiv($userBRebate , 100, 6), 8);
        //同级奖励是否给平台
        $isSamePlat = false;
        if($memberHead->status != \App\Admin\Repositories\User::STATUS_NORMAL){
            $uid = $platformUid;
            $remark = '直推人账户被封禁，分配到平台账户';
            $inviteAmount = bcadd($headAmount, $ordinaryAmount, 8);
        }else{
            $inviteAmount = $ordinaryAmount;
            $remark = '邀请商家，获得盈利返佣';
            $uid = $memberHead->id;

            //如果直推上级是盟主用户
            if($memberHead->member_head == 2){
                //直接拿0.7%奖励
                $inviteAmount = bcadd($headAmount, $ordinaryAmount, 8);

                //同级盟主奖励
                $tes = $this->leaderRebate($orderNo,$memberHead->invite_uid, $sameAmount, $assets, '同级别盟主奖励',AssetsLog::OPERATE_TYPE_SHARE_B_REBATE, 1);

                if($tes == false)
                    $isSamePlat = true;

            }else{
                //往上找2级 是否盟主
                $res = $this->leaderRebate($orderNo,$memberHead->invite_uid, $headAmount, $assets, '邀请商家盟主分红',AssetsLog::OPERATE_TYPE_SHARE_B_REBATE, 2);

                if($res == false){
                    if($headAmount>0)
                        AssetsService::BalancesChange2($platformUid, $assets->id, $assets->assets_name, $headAmount, AssetsLog::OPERATE_TYPE_SHARE_B_REBATE, '没有盟主，分配到平台账户',$orderNo);
                    $isSamePlat = true;
                }else{
                    //同级盟主奖励
                    $res = $this->leaderRebate($orderNo,$res->invite_uid, $sameAmount, $assets, '同级别盟主奖励',AssetsLog::OPERATE_TYPE_SHARE_B_REBATE, 1);
                    if($res == false)
                        $isSamePlat = true;
                }
            }
        }
        if($sameAmount>0 && $isSamePlat == true)
            AssetsService::BalancesChange2($platformUid, $assets->id, $assets->assets_name, $sameAmount, AssetsLog::OPERATE_TYPE_SHARE_B_REBATE, '没有同级盟主，分配到平台账户',$orderNo);
        if($inviteAmount > 0)
            AssetsService::BalancesChange2($uid, $assets->id, $assets->assets_name, $inviteAmount, AssetsLog::OPERATE_TYPE_SHARE_B_REBATE, $remark,$orderNo);

        $market = bcadd($districtAmount, bcadd($cityAmount, bcadd(bcadd($sameAmount, $headAmount, 8), $ordinaryAmount, 8), 8), 8);

        $this->updateRebateData($welfareAmount, $shareAmount, $market, $platformAmount, $order->price, $user);
    }

    /**找盟主
     * @param $invite_uid
     * @param $amount
     * @param $assets
     * @param $msg
     * @param $type
     * @param int $level
     * @return bool
     * @throws Exception
     */
    public function leaderRebate($orderNo,$invite_uid, $amount, $assets, $msg, $type, $level = 2){

        if($level <= 0)
            return false;

        $user = User::whereId($invite_uid)->first();

        //如果是盟主,奖励0.3直接给与他
        if($user && $user->member_head == 2 && $user->status == \App\Admin\Repositories\User::STATUS_NORMAL){

            if($amount>0)
                AssetsService::BalancesChange2($user->id, $assets->id, $assets->assets_name, $amount, $type, $msg,$orderNo);

            return $user;
        }elseif($user){

            $level--;
            return $this->leaderRebate($orderNo,$user->invite_uid, $amount, $assets, $msg, $type, $level);

        }else{
            return false;
        }

    }

    /**更新返佣统计
     * @param $welfare
     * @param $share
     * @param $market
     * @param $platform
     * @param $price
     * @param $user
     */
    public function updateRebateData($welfare, $share, $market, $platform, $price, $user){

        $rebateData = RebateData::firstOrCreate(['day' => now()->toDateString()]);

        $rebateData->welfare = bcadd($rebateData->welfare, $welfare, 2);
        $rebateData->share = bcadd($rebateData->share, $share, 2);
        $rebateData->market = bcadd($rebateData->market, $market, 2);
        $rebateData->platform = bcadd($rebateData->platform, $platform, 2);
        $rebateData->people = \App\Models\Order::where("status",Order::STATUS_SUCCESS)
            ->distinct("uid")
            ->whereBetween('created_at', [now()->startOfDay(), now()->endOfDay()])
            ->count()+1;

        $rebateData->total_consumption = bcadd($price, $rebateData->total_consumption, 8);
        $rebateData->save();
    }

}
