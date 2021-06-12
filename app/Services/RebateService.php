<?php
/**
 * Created by PhpStorm.
 * User: woshi
 * Date: 2018/12/26
 * Time: 17:31
 */

namespace App\Services;

use App\Admin\Repositories\AssetsLog;
use App\Admin\Repositories\FreezeLog;
use App\Models\Asset;
use App\Models\AssetsType;
use App\Models\BusinessData;
use App\Models\IntegralLog;
use App\Models\Order;
use App\Models\OrderIntegralLkDistribution;
use App\Models\RebateData;
use App\Models\Setting;
use App\Models\User;
use App\Models\Users;
use Carbon\Carbon;
use Exception;
use Illuminate\Support\Facades\DB;

class RebateService
{
    public $totalAmount = 0;//总分红数量
    public $totalUser = 0;//总用户/商家数量
    public $perMoney = 0;//单个LK分红数量

    /**
     * 分红
     * @return false
     */
    public function rebate()
    {
        //判断是否已执行
        $isRebate = RebateData::where("day", Carbon::yesterday()->toDateString())->where('status', 2)->count();
        if($isRebate)
        {
            echo "昨日数据已分红 \n";
            return false;
        }
        //判断控单是否开启
        $setValue = Setting::where('key','consumer_integral')->value('value');
        if($setValue==1) {
            //获取昨日总让利金额
            $totalProfit = Order::where("status", \App\Admin\Repositories\Order::STATUS_SUCCESS)
                    ->whereBetween("updated_at", [now()->yesterday()->startOfDay(), now()->yesterday()->endOfDay()])
                    ->where('line_up', 0)
                    ->sum("profit_price") ?? 0;
        }else{
            //获取昨日总让利金额
            $totalProfit = Order::where("status", \App\Admin\Repositories\Order::STATUS_SUCCESS)
                    ->whereBetween("updated_at", [now()->yesterday()->startOfDay(), now()->yesterday()->endOfDay()])
                    ->sum("profit_price") ?? 0;
        }

        if(bccomp($totalProfit,0 , 2) > 0)
        {

            try {
                DB::transaction(function () use ($totalProfit) {
                    $assets = AssetsType::where("assets_name", AssetsType::DEFAULT_ASSETS_NAME)->first();
                    if(!$assets)
                    {
                        echo "资产类型不存在 \n";
                        return false;
                    }

                    $rebateData = RebateData::where("day", Carbon::yesterday()->toDateString())->where('status', 1)->lockForUpdate()->first();
                    if(!$rebateData){
                        $rebateData = new RebateData();
                        $rebateData->day = Carbon::yesterday()->toDateString();//返佣日期
                    }
                    //记录分红数据
                    $rebateData->join_consumer = 0;//参与分红的消费者人数
                    $rebateData->join_business = 0;//参与分红的商家人数
                    $rebateData->consumer_lk_iets = 0;//消费者单个LK分配IETS数量
                    $rebateData->business_lk_iets = 0;//商家单个LK分配IETS数量
                    $rebateData->business = 0;//商家返佣
                    $rebateData->consumer = 0;//消费者返佣
                    $rebateData->status = 2;//改为已分配

                    //判断控单是否开启
                    $setValue = Setting::where('key','consumer_integral')->value('value');
                    if($setValue==1) {
                        //消费人数
                        $rebateData->people = Order::where("status", \App\Admin\Repositories\Order::STATUS_SUCCESS)
                                ->whereBetween("updated_at", [now()->yesterday()->startOfDay(), now()->yesterday()->endOfDay()])
                                ->groupBy("uid")
                                ->where('line_up',0)
                                ->count() ?? 0;
                        //总消费金额
                        $rebateData->total_consumption = Order::where("status", \App\Admin\Repositories\Order::STATUS_SUCCESS)
                                ->whereBetween("updated_at", [now()->yesterday()->startOfDay(), now()->yesterday()->endOfDay()])
                                ->where('line_up',0)
                                ->sum("price") ?? 0;
                    }else{
                        //消费人数
                        $rebateData->people = Order::where("status", \App\Admin\Repositories\Order::STATUS_SUCCESS)
                                ->whereBetween("updated_at", [now()->yesterday()->startOfDay(), now()->yesterday()->endOfDay()])
                                ->groupBy("uid")
                                ->count() ?? 0;
                        //总消费金额
                        $rebateData->total_consumption = Order::where("status", \App\Admin\Repositories\Order::STATUS_SUCCESS)
                                ->whereBetween("updated_at", [now()->yesterday()->startOfDay(), now()->yesterday()->endOfDay()])
                                ->sum("price") ?? 0;
                    }


                    //新增商家
                    $rebateData->new_business = BusinessData::whereBetween("created_at", [now()->yesterday()->startOfDay(), now()->yesterday()->endOfDay()])->count();


                    //来客商家
                    $businessPercent = Setting::getSetting("business_percent") ?? 0;
                    if(bccomp($businessPercent, 0, 2) > 0)
                    {
                        //商家返利总额 = 总让利 * 商家返利比例
                        $businessAmount = bcdiv(bcmul($totalProfit, $businessPercent, 2), 100 ,2);
                        $this->rebateByRole($businessAmount, \App\Admin\Repositories\User::ROLE_BUSINESS);
                        $rebateData->business = $this->totalAmount;
                        $rebateData->join_business = $this->totalUser;
                        $rebateData->business_lk_iets = $this->perMoney;
                    }

                    //消费者
                    $userPercent = Setting::getSetting("user_percent") ?? 0;
                    if(bccomp($userPercent, 0, 2) > 0)
                    {
                        //用户返利总额 = 总让利 * 用户返利比例
                        $userAmount = bcdiv(bcmul($totalProfit, $userPercent, 2), 100 , 2);
                        $this->rebateByRole($userAmount, \App\Admin\Repositories\User::ROLE_NORMAL);
                        $rebateData->consumer = $this->totalAmount;
                        $rebateData->join_consumer = $this->totalUser;
                        $rebateData->consumer_lk_iets = $this->perMoney;
                    }

                    $rebateData->save();

                    $today = strtotime(date('Y-m-d',time()));
                    $todayData = OrderIntegralLkDistribution::where('day',$today)->first();
                    $todayData->count_lk = Users::sum('lk');
                    $todayData->save();

                });
            } catch (\Exception $e) {

                echo "分红失败，失败原因：" . $e->getMessage()." \n";
                return false;
            }
        }
    }

    /**
     * 根据角色分红
     * @param $amount
     * @param $role
     * @return false
     * @throws Exception
     */
    public function rebateByRole($amount, $role)
    {
        $sumColumn = "lk";
        $integral = "integral";
        $returnIntegral = "return_integral";
        $remarkStr = "用户";
        $lkPer = "lk_per";
        $operateType = AssetsLog::OPERATE_TYPE_USER_REBATE;
        if($role == \App\Admin\Repositories\User::ROLE_BUSINESS)
        {
            $sumColumn = "business_lk";
            $integral = "business_integral";
            $returnIntegral = "return_business_integral";
            $remarkStr = "商家";
            $lkPer = "business_Lk_per";
            $operateType = AssetsLog::OPERATE_TYPE_BUSINESS_REBATE;
        }

        $this->totalAmount = 0;
        $this->totalUser = 0;

        //获取总LK数量
        $totalLK = User::where("status", \App\Admin\Repositories\User::STATUS_NORMAL)
            ->sum($sumColumn);

        if($totalLK > 0)
        {
            //计算一个LK分多少钱
            $perMoney = bcdiv($amount, $totalLK, 2);
            $this->perMoney = $perMoney;

            //获取资产类型
            $assets = AssetsType::where("assets_name", AssetsType::DEFAULT_ASSETS_ENCOURAGE)->first();

            //获取有LK的用户
            User::select(['id', $sumColumn, $integral, $returnIntegral, "return_lk", "invite_uid"])
                ->where("status", \App\Admin\Repositories\User::STATUS_NORMAL)
                ->where($sumColumn, ">", 0)
                ->chunkById(500,function($LKUsers) use (
                    $perMoney,
                    $assets,
                    $role,
                    $sumColumn,
                    $integral,
                    $returnIntegral,
                    $remarkStr,
                    $lkPer,
                    $operateType,
                    &$data
                ) {
                    $this->totalUser = bcadd($this->totalUser, count($LKUsers), 0);
                    foreach ($LKUsers as $v)
                    {
                        //给用户加余额
                        $userMoney = bcmul($perMoney, $v->$sumColumn, 2);//该用户应当分得的总分红数

                        AssetsService::BalancesChange(
                            $v->id,
                            $assets->id,
                            $assets->assets_name,
                            $userMoney,
                            $operateType,
                            $remarkStr . "返佣"
                        );


                        //减积分
                        $integralAmount = $v->$integral;
                        if(bccomp($v->$integral, $userMoney, 2) < 0)
                        {
                            //不够扣就直接扣为0
                            $v->$integral = 0;
                        }else{
                            $v->$integral = bcsub($v->$integral, $userMoney, 2);
                        }
                        //写入积分日志
                        IntegralLog::addLog($v->id, -$userMoney, IntegralLog::TYPE_REBATE, $integralAmount, $role, '分红扣除积分');
                        //记录已返积分
                        $v->$returnIntegral = bcadd($v->$returnIntegral, $userMoney, 2);
                        //记录已返LK
                        $nowLk = $v->$sumColumn;
                        //更新LK
                        $v->$sumColumn = bcdiv($v->$integral, Setting::getSetting($lkPer), 0);
                        $v->return_lk = bcadd($v->return_lk, bcsub($nowLk, $v->$sumColumn, 0), 0);
                        $v->save();

                        $this->totalAmount = bcadd($this->totalAmount, $userMoney, 2);
                    }
                });

        }else{

            return false;
        }
    }

    /**
     * 让利兑换为IETS
     * @return false
     */
    public function exchagneIets()
    {
        //获取USDT单价
        $usdtPrice = Setting::getSetting('usdt_price');
        if(!$usdtPrice)
        {
            echo "请设置usdt单价 \n";
            return false;
        }
        try {
            $encourage = AssetsType::where("assets_name", AssetsType::DEFAULT_ASSETS_ENCOURAGE)->first();
            $usdt = AssetsType::where("assets_name", AssetsType::DEFAULT_ASSETS_NAME)->first();
            DB::transaction(function () use ($usdtPrice, $encourage, $usdt) {
                //获取余额大于0的用户
                Asset::where("assets_name", AssetsType::DEFAULT_ASSETS_ENCOURAGE)
                    ->where("amount", ">", 0)
                    ->chunkById(500,function($asset) use ($usdtPrice, $encourage, $usdt) {
                        foreach($asset as $v)
                        {
                            //计算能换多少个iets
                            $exchangeAmount = bcdiv($v->amount, $usdtPrice, 8);
                            //70%到余额，30%到冻结
                            //给用户加iets
                            AssetsService::BalancesChange(
                                $v->uid,
                                $usdt->id,
                                $usdt->assets_name,
                                bcmul($exchangeAmount, 0.7, 8),
                                AssetsLog::OPERATE_TYPE_EXCHANGE_IETS,
                                "兑换IETS"
                            );
                            AssetsService::freezeChange(
                                $v->uid,
                                $usdt->id,
                                $usdt->assets_name,
                                bcmul($exchangeAmount, 0.3, 8),
                                FreezeLog::OPERATE_TYPE_EXCHANGE_IETS,
                                "兑换IETS"
                            );
                            //让利余额为0
                            AssetsService::BalancesChange(
                                $v->uid,
                                $encourage->id,
                                $encourage->assets_name,
                                -$v->amount,
                                AssetsLog::OPERATE_TYPE_EXCHANGE_IETS_SUB_ENCOURATGE,
                                "让利兑换扣除"
                            );
                        }
                    });
            });
        } catch (\Exception $e) {

            echo "命令执行失败，失败原因：" . $e->getMessage()." \n";
            return false;
        }
    }
}
