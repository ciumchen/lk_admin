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
use App\Services\AddLkshopOrderService;

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

        //查询订单
        $orderId = $OrderLogModel::where('type', 'mch_order')->value('order_id');
        $shopOrderData = ShopOrder::where('confirm_time', '>', $orderId)->where('is_confirm', 1)->orderBy('confirm_time', "asc")->first();

//        log::info('=================导入商户订单开始==================================='.$orderId);
        if ($shopOrderData != '') {
            $orderArr = $shopOrderData->toArray();

            $inShopOrderData = LkshopOrder::where('shop_order_id', $orderArr['id'])->first();

            if ($shopOrderData->ali_order_no!='' && ($shopOrderData->confirm_time <= 1625027460)){
                //更新记录
                $LogDataMch->order_id = $orderArr['confirm_time'];
                $LogDataMch->save();
                $LogData1688->order_id = $orderArr['confirm_time'];
                $LogData1688->save();
                var_dump('该订单已导入1');
                return false;
            }

            if ($inShopOrderData != '') {
                //更新记录
                $LogDataMch->order_id = $orderArr['confirm_time'];
                $LogDataMch->save();
                $LogData1688->order_id = $orderArr['confirm_time'];
                $LogData1688->save();
                var_dump('该订单已导入2');
                return false;
            } else {
                //查询订单数量
//                $shopOrderDataCount = ShopOrder::where('confirm_time',$orderId)->where('is_confirm', 1)->orderBy('confirm_time', "asc")->count();
//                if ($shopOrderDataCount>1){
                    $shopOrderDataArr = ShopOrder::where('confirm_time',$orderArr['confirm_time'])->where('is_confirm', 1)->orderBy('confirm_time', "asc")->get()->toArray();
//                    dd($shopOrderDataArr);
                    foreach($shopOrderDataArr as $k=>$v){

                        $lkUserId = (new AddLkshopOrderService())->getLkUserId($v['user_id']);//lk用户uid
//                        dd($v);
                        if ($v['mch_id'] != 0){
                            $orderType = 'mch_order';
                            $orderName = '商户订单';

                            $lkBusinessUid = (new AddLkshopOrderService())->getLkBusinessUid($v['mch_id']);//lk商户uid
                        }elseif ($v['ali_order_no'] != ''){
                            $orderType = '1688_order';
                            $lkBusinessUid = 2;//lk商户uid
                            $orderName = '自营订单';
                        }else{
                            //更新记录
                            $LogDataMch->order_id = $v['confirm_time'];
                            $LogDataMch->save();
                            $LogData1688->order_id = $v['confirm_time'];
                            $LogData1688->save();
                            var_dump('非商户订单和自营订单');
                            return false;
                        }

//dd($lkBusinessUid,$lkBusinessUid);
dump($lkBusinessUid,$lkBusinessUid);
                        DB::beginTransaction();
                        try {
//                    $profit_ratio = Setting::where('key', 'lkshop_profit_ratio')->value('value');
                            $profit_ratio = 20;
                            //实际付款
                            $sjPay = $v['pay_price'] - $v['express_price'];
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
                            $orderModel->order_no = $v['order_no'];
                            $orderModel->created_at = date('Y-m-d H:i:s', $v['addtime']);
                            $orderModel->updated_at = date('Y-m-d H:i:s', $v['confirm_time']);
                            $orderModel->save();

                            $LkshopOrderModel->uid = $lkUserId;
                            $LkshopOrderModel->business_uid = $lkBusinessUid;
                            $LkshopOrderModel->profit_ratio = $profit_ratio;
                            $LkshopOrderModel->price = $sjPay;
                            $LkshopOrderModel->profit_price = $sjPay * $profit_ratio / 100;
                            $LkshopOrderModel->status = 2;
                            $LkshopOrderModel->name = $orderName;
                            $LkshopOrderModel->order_no = $v['order_no'];
                            $LkshopOrderModel->description = $orderType;
                            $LkshopOrderModel->shop_order_id = $v['id'];
                            $LkshopOrderModel->oid = $orderModel->id;
                            $LkshopOrderModel->created_at = date('Y-m-d H:i:s', $v['addtime']);
                            $LkshopOrderModel->updated_at = date('Y-m-d H:i:s', $v['confirm_time']);
                            $LkshopOrderModel->save();

                            //添加积分
//            completeOrderTable(int $id, int $consumer_uid, string $description, string $orderNo)
                            (new ShopOrderService())->completeShopOrder($orderModel->id, $lkUserId, $v['order_no'], $orderType);

                            //更新记录
                            $LogDataMch->order_id = $v['confirm_time'];
                            $LogDataMch->save();
                            $LogData1688->order_id = $v['confirm_time'];
                            $LogData1688->save();
                            var_dump('导入订单成功1');

                            DB::commit();
                        } catch (Exception $exception) {
                            DB::rollBack();
                            var_dump($exception->getMessage());
                        }
                    }

            }
        } else {
//            log::info('=================所有订单导入完成===================================');
            var_dump( "所有订单导入完成");
            return false;
        }


    }
}
