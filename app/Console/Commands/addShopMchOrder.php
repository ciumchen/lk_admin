<?php

namespace App\Console\Commands;

use App\Models\LkshopOrder;
use App\Models\LkshopOrderLog;
use App\Models\Order;
use App\Models\ShopMch;
use App\Models\ShopOrder;
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

class addShopMchOrder extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:addShopMchOrder';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '添加商户订单';

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
        $LogData = $OrderLogModel::where('type', 'mch_order')->first();
        if ($LogData == '') {
            $OrderLogModel->type = 'mch_order';
            $OrderLogModel->save();
            $LogData = $OrderLogModel::where('type', 'mch_order')->first();
        }

//        dd($LogData);
        $shopOrderData = ShopOrder::where('id', '>', $LogData->order_id)->where('is_confirm', 1)->where('mch_id', '!=', 0)->orderBy('id', "asc")->first();
//        dd($shopOrderData);
        if ($shopOrderData != '') {
            $orderArr = $shopOrderData->toArray();
            $ShopOrderData = LkshopOrder::where('shop_order_id', $orderArr['id'])->first();
            if ($ShopOrderData != '') {
                //更新记录
                $LogData->order_id = $orderArr['id'];
                $LogData->save();
            } else {
                DB::beginTransaction();
                try {
                    $ShopMchModel = new ShopMch();
                    $business_uid = $ShopMchModel->getMchUserId($orderArr['mch_id']);
                    $profit_ratio = Setting::where('key', 'lkshop_profit_ratio')->value('value');

                    $LkshopOrderModel = new LkshopOrder();
                    $orderModel = new Order();

                    $orderModel->uid = $orderArr['user_id'];
                    $orderModel->business_uid = $business_uid;
                    $orderModel->profit_ratio = $profit_ratio;
                    $orderModel->price = $orderArr['total_price'];
                    $orderModel->profit_price = $orderArr['total_price'] * $profit_ratio / 100;
                    $orderModel->status = 1;
                    $orderModel->name = '商户订单';
                    $orderModel->order_no = $orderArr['order_no'];
                    $orderModel->created_at = date('Y-m-d H:i:s', $orderArr['addtime']);
                    $orderModel->updated_at = date('Y-m-d H:i:s', $orderArr['confirm_time']);
                    $orderModel->save();

                    $LkshopOrderModel->uid = $orderArr['user_id'];
                    $LkshopOrderModel->business_uid = $business_uid;
                    $LkshopOrderModel->profit_ratio = $profit_ratio;
                    $LkshopOrderModel->price = $orderArr['total_price'];
                    $LkshopOrderModel->profit_price = $orderArr['total_price'] * $profit_ratio / 100;
                    $LkshopOrderModel->status = 2;
                    $LkshopOrderModel->name = '商户订单';
                    $LkshopOrderModel->order_no = $orderArr['order_no'];
                    $LkshopOrderModel->description = 'lkshop_sh';
                    $LkshopOrderModel->shop_order_id = $orderArr['id'];
                    $LkshopOrderModel->oid = $orderModel->id;
                    $LkshopOrderModel->created_at = date('Y-m-d H:i:s', $orderArr['addtime']);
                    $LkshopOrderModel->updated_at = date('Y-m-d H:i:s', $orderArr['confirm_time']);
                    $LkshopOrderModel->save();

//            $orderModel->id = 339;
                    //添加积分
//            completeOrderTable(int $id, int $consumer_uid, string $description, string $orderNo)
                    (new ShopOrderService())->completeShopOrder($orderModel->id, $orderArr['user_id'], $orderArr['order_no'], 'lkshop_sh');

                    //更新记录
                    $LogData->order_id = $orderArr['id'];
                    $LogData->save();

                    DB::commit();
                } catch (Exception $exception) {
                    DB::rollBack();
                    var_dump($exception->getMessage());
                }
            }
        } else {
//            dd("所有订单导入完成");
//            log::info('=================所有订单导入完成===================================');
            return "所有订单导入完成";
        }


    }
}
