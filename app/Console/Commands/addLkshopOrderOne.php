<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\LkshopOrder;
use App\Models\LkshopOrderLog;
use App\Models\Order;
use App\Models\ShopMch;
use App\Models\ShopOrder;
use App\Models\Users;
use App\Services\ShopOrderService;

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

class addLkshopOrderOne extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:addLkshopOrderOne';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '导入一次';

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

        $order_no = '20210619194322443811';
        $shopOrderData = ShopOrder::where('order_no',$order_no)->first();
        if ($shopOrderData){
            $shopOrderDataArr = $shopOrderData->toArray();
            //查询记录
            $OrderLogModel = new LkshopOrderLog();
            $LogDataMch = $OrderLogModel::where('type', 'mch_order')->first();
            $LogData1688 = $OrderLogModel::where('type', '1688_order')->first();

            $lkUserId = (new AddLkshopOrderService())->getLkUserId($shopOrderDataArr['user_id']);//lk用户uid

            if ($shopOrderDataArr['mch_id'] != 0){
                $orderType = 'mch_order';
                $orderName = '商户订单';

                $lkBusinessUid = (new AddLkshopOrderService())->getLkBusinessUid($shopOrderDataArr['mch_id']);//lk商户uid
            }elseif ($shopOrderDataArr['ali_order_no'] != ''){
                $orderType = '1688_order';
                $lkBusinessUid = 2;//lk商户uid
                $orderName = '自营订单';
            }else{
                //更新记录
                $LogDataMch->order_id = $shopOrderDataArr['confirm_time'];
                $LogDataMch->save();
                $LogData1688->order_id = $shopOrderDataArr['confirm_time'];
                $LogData1688->save();
                var_dump('非商户订单和自营订单');
//                            log::info('=================非商户订单和自营订单===================================');
                return false;
            }

//dd($lkBusinessUid,$lkBusinessUid);
//            dump($lkBusinessUid,$lkBusinessUid);
//            dd($shopOrderDataArr);
            log::info('=================订单的确认收货时间==================================='.$shopOrderDataArr['confirm_time']);
            DB::beginTransaction();
            try {
//                    $profit_ratio = Setting::where('key', 'lkshop_profit_ratio')->value('value');
                $profit_ratio = 20;
                //实际付款
                $sjPay = $shopOrderDataArr['pay_price'] - $shopOrderDataArr['express_price'];
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
                $orderModel->order_no = $shopOrderDataArr['order_no'];
                $orderModel->created_at = date('Y-m-d H:i:s', $shopOrderDataArr['addtime']);
                $orderModel->updated_at = date('Y-m-d H:i:s', $shopOrderDataArr['confirm_time']);
                $orderModel->save();

                $LkshopOrderModel->uid = $lkUserId;
                $LkshopOrderModel->business_uid = $lkBusinessUid;
                $LkshopOrderModel->profit_ratio = $profit_ratio;
                $LkshopOrderModel->price = $sjPay;
                $LkshopOrderModel->profit_price = $sjPay * $profit_ratio / 100;
                $LkshopOrderModel->status = 2;
                $LkshopOrderModel->name = $orderName;
                $LkshopOrderModel->order_no = $shopOrderDataArr['order_no'];
                $LkshopOrderModel->description = $orderType;
                $LkshopOrderModel->shop_order_id = $shopOrderDataArr['id'];
                $LkshopOrderModel->oid = $orderModel->id;
                $LkshopOrderModel->created_at = date('Y-m-d H:i:s', $shopOrderDataArr['addtime']);
                $LkshopOrderModel->updated_at = date('Y-m-d H:i:s', $shopOrderDataArr['confirm_time']);
                $LkshopOrderModel->save();

                //添加积分
//            completeOrderTable(int $id, int $consumer_uid, string $description, string $orderNo)
                (new ShopOrderService())->completeShopOrder($orderModel->id, $lkUserId, $shopOrderDataArr['order_no'], $orderType);

                //更新记录
                $LogDataMch->order_id = $shopOrderDataArr['confirm_time'];
                $LogDataMch->save();
                $LogData1688->order_id = $shopOrderDataArr['confirm_time'];
                $LogData1688->save();
                var_dump('导入订单成功');
//                            log::info('=================导入订单成功===================================');
                DB::commit();
            } catch (Exception $exception) {
                DB::rollBack();
//                            log::info('=================导入订单失败===================================');
                var_dump($exception->getMessage());
            }

        }else{
            echo '订单不存在';
        }


    }
}
