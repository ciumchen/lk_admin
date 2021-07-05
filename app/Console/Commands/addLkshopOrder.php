<?php

namespace App\Console\Commands;

use App\Models\LkshopOrder;
use App\Models\LkshopOrderLog;
use App\Models\Order;
use App\Models\ShopMch;
use App\Models\ShopOrder;
use App\Models\Users;
use App\Services\ShopOrderService;
use Illuminate\Console\Command;

use App\Exceptions\LogicException;
use App\Models\LkshopAddUserLog;
use App\Models\ShopUser;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use App\Models\UserData;
use App\Models\Setting;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;

class addLkshopOrder extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:addLkshopOrder';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '添加商城订单';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
//        log::info('=================导入商户订单开始===================================');
        //查询记录
        $OrderLogModel = new LkshopOrderLog();
        $LogDataMch = $OrderLogModel::where('type', 'mch_order')->first();
        $LogData1688 = $OrderLogModel::where('type', '1688_order')->first();
        $orderType = '';
        $orderName = '商城订单';
        if ($LogDataMch == '') {
            DB::table('lkshop_order_log')->insert(['order_id'=>0,'type'=>'mch_order']);
            $LogDataMch = $OrderLogModel::where('type', 'mch_order')->first();
        }
        if ($LogData1688 == '') {
            DB::table('lkshop_order_log')->insert(['order_id'=>0,'type'=>'1688_order']);
            $LogData1688 = $OrderLogModel::where('type', '1688_order')->first();
        }
        $orderId = $OrderLogModel::where('type', 'mch_order')->value('order_id');

        //查询订单
        $shopOrderData = ShopOrder::where('confirm_time', '>', $orderId)->where('is_confirm', 1)->orderBy('confirm_time', "asc")->first();
//        $shopOrderDatacount = ShopOrder::where('id', '>', $orderId)->where('is_confirm', 1)->orderBy('id', "asc")->count();
//        dump($orderId,$shopOrderDatacount);
//        dd($shopOrderData);
//        log::info('=================导入商户订单开始==================================='.$orderId);
        if ($shopOrderData != '') {
            $orderArr = $shopOrderData->toArray();
            $shopUserPhome = ShopUser::where('id',$orderArr['user_id'])->value('binding');
            $lkUserId = Users::where('phone',$shopUserPhome)->value('id');//lk用户uid
            $lkBusinessUid = '';//lk商户uid
            if ($shopOrderData->mch_id != 0){
                $orderType = 'mch_order';
                $orderName = '商户订单';
                $ShopMchModel = new ShopMch();
                $mchUid = $ShopMchModel->getMchUserId($shopOrderData->mch_id);
                $mchUserPhone = ShopUser::where('id',$mchUid)->value('binding');
                $lkBusinessUid = Users::where('phone',$mchUserPhone)->value('id');//lk商户uid
            }elseif ($shopOrderData->ali_order_no != ''){
                $orderType = '1688_order';
                $lkBusinessUid = 2;//lk商户uid
                $orderName = '自营订单';
            }else{
                //更新记录
                $LogDataMch->order_id = $orderArr['confirm_time'];
                $LogDataMch->save();
                $LogData1688->order_id = $orderArr['confirm_time'];
                $LogData1688->save();
                var_dump('非商户订单和自营订单');
                return false;
            }

            dump($lkUserId,$lkBusinessUid);
//            dd($orderId,$orderType,$business_uid);
            $inShopOrderData = LkshopOrder::where('shop_order_id', $orderArr['id'])->first();

//            $ShopOrderData167 = ShopOrder::where('id', 167)->first();
//            dd($shopOrderData->confirm_time);exit;
//            dd($ShopOrderData167->confirm_time);exit;

            if ($shopOrderData->ali_order_no!='' && ($shopOrderData->confirm_time <= 1625027460)){
                //更新记录
                $LogDataMch->order_id = $orderArr['confirm_time'];
                $LogDataMch->save();
                $LogData1688->order_id = $orderArr['confirm_time'];
                $LogData1688->save();
                var_dump('该订单已导入');
                return false;
            }

            if ($inShopOrderData != '') {
                //更新记录
                $LogDataMch->order_id = $orderArr['confirm_time'];
                $LogDataMch->save();
                $LogData1688->order_id = $orderArr['confirm_time'];
                $LogData1688->save();
                var_dump('该订单已导入');
                return false;
            } else {
                DB::beginTransaction();
                try {
//                    $profit_ratio = Setting::where('key', 'lkshop_profit_ratio')->value('value');
                    $profit_ratio = 20;
                    //实际付款
                    $sjPay = $orderArr['pay_price'] - $orderArr['express_price'];
                    $LkshopOrderModel = new LkshopOrder();
                    $orderModel = new Order();
//dd($orderType,$business_uid);
                    $orderModel->uid = $lkUserId;
                    $orderModel->business_uid = $lkBusinessUid;
                    $orderModel->profit_ratio = $profit_ratio;
                    $orderModel->price = $sjPay;
                    $orderModel->profit_price = $sjPay * $profit_ratio / 100;
                    $orderModel->status = 1;
                    $orderModel->name = $orderName;
                    $orderModel->order_no = $orderArr['order_no'];
                    $orderModel->created_at = date('Y-m-d H:i:s', $orderArr['addtime']);
                    $orderModel->updated_at = date('Y-m-d H:i:s', $orderArr['confirm_time']);
                    $orderModel->save();

                    $LkshopOrderModel->uid = $lkUserId;
                    $LkshopOrderModel->business_uid = $lkBusinessUid;
                    $LkshopOrderModel->profit_ratio = $profit_ratio;
                    $LkshopOrderModel->price = $sjPay;
                    $LkshopOrderModel->profit_price = $sjPay * $profit_ratio / 100;
                    $LkshopOrderModel->status = 2;
                    $LkshopOrderModel->name = $orderName;
                    $LkshopOrderModel->order_no = $orderArr['order_no'];
                    $LkshopOrderModel->description = $orderType;
                    $LkshopOrderModel->shop_order_id = $orderArr['id'];
                    $LkshopOrderModel->oid = $orderModel->id;
                    $LkshopOrderModel->created_at = date('Y-m-d H:i:s', $orderArr['addtime']);
                    $LkshopOrderModel->updated_at = date('Y-m-d H:i:s', $orderArr['confirm_time']);
                    $LkshopOrderModel->save();

                    //添加积分
//            completeOrderTable(int $id, int $consumer_uid, string $description, string $orderNo)
                    (new ShopOrderService())->completeShopOrder($orderModel->id, $lkUserId, $orderArr['order_no'], $orderType);

                    //更新记录
                    $LogDataMch->order_id = $orderArr['confirm_time'];
                    $LogDataMch->save();
                    $LogData1688->order_id = $orderArr['confirm_time'];
                    $LogData1688->save();
                    var_dump('导入订单成功');

                    DB::commit();
                } catch (Exception $exception) {
                    DB::rollBack();
                    var_dump($exception->getMessage());
                }
            }
        } else {
//            dd("所有订单导入完成");
//            log::info('=================所有订单导入完成===================================');
            var_dump( "所有订单导入完成");
            return false;
        }


    }
}
