<?php

use App\Admin\Repositories\LkOilCardOrder;
use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Route;
use Dcat\Admin\Admin;

Admin::routes();
Route::group(
    [
        'prefix'     => config('admin.route.prefix'),
        'namespace'  => config('admin.route.namespace'),
        'middleware' => config('admin.route.middleware'),
    ],
    function (Router $router)
    {
        //test测试
        $router->resource('test', 'TestController');
        $router->any('getShopUserInfo', 'TestController@getShopUserInfo');
        $router->any('mytest', 'TestController@mytest');
        $router->any('update_sjtt', 'TestController@update_sjtt');
        $router->any('update_order_ddyc', 'TestController@update_order_ddyc');
        $router->any('uploadImg', 'TestController@uploadImg');
        $router->any('updateImg', 'TestController@updateImg');
        $router->any('delApply', 'TestController@delApply');
        $router->any('updateUser', 'TestController@updateUser');
        ///////////////////////////////////////////////////////////////////////////////////////////////////////
        //话费订单、油卡订单、美团订单
        $router->resource('hfdd', 'LkPhoneBillOrderController');
        $router->resource('ykdd', 'LkOilCardOrderController');
        $router->resource('mtdd', 'LkMeiTuanOrderController');
        $router->resource('hfdc', 'MobileAgentController');
//        $router->resource('hfdc', 'LkPhoneDcController');
        // 话费代充[新]
//        $router->resource('mobile-agent', 'MobileAgentController');
        $router->resource('lkscsh', 'LkShopMerchantOrderController');
        $router->resource('lksczy', 'LkShopSelfSupportOrderController');
        $router->resource('lkscdd', 'LkShopMallOrderController');
        $router->resource('sphy', 'VideoOrderController'); //视频会员订单
        $router->resource('addjf', 'ToBeAddedIntegralController');
        $router->resource('kthydd', 'LkKthyOrderController');              //开通会员订单列表
        $router->resource('sfzsmrz', 'RealNameAuthenTicationController');  //身份证实名认证
        $router->resource('drddtj', 'DailyImportOrderStatisticController');//导入订单统计
        $router->get('/', 'HomeController@index');
        $router->resource('users', 'UserController');
        $router->resource('user-data', 'UserDataController');
        $router->resource('integral-logs', 'IntegralLogController');
        $router->resource('business-category', 'BusinessCategoryController');
        $router->resource('business-apply', 'BusinessApplyController');
        $router->resource('business-data', 'BusinessDataController');
        $router->resource('orders', 'OrderController');
        $router->resource('assets-type', 'AssetsTypeController');
        $router->resource('user-assets', 'AssetController');
        $router->resource('assets-logs', 'AssetsLogController');
        $router->resource('freeze-logs', 'FreezeLogController');
        $router->resource('settings', 'SettingController');
        $router->resource('ad', 'AdController');
        $router->resource('city-data', 'CityDataController');
        $router->resource('address', 'AddressController');
        $router->resource('withdraw-logs', 'WithdrawLogController');
        $router->resource('rebate-data', 'RebateDataController');
        $router->resource('city-node', 'CityNodeController');
        //10点分红记录列表
        $router->resource('exchangeiets_log', 'EverydayExchangeietsLogController');
        $router->any('sdEveryDayIetsFh', 'EverydayExchangeietsLogController@sdEveryDayIetsFh');

        //上传图标
        $router->any('file/upload-img', 'FileController@handle');
        //系统消息
        $router->resource('add-msg', 'MessageController');
        $router->resource('save', 'MessageController');
        //自营消息
        $router->resource('self-msg', 'SelfMessageController');
        $router->resource('self-save', 'SelfMessageController');
        //机票退订
        $router->resource('air-refund', 'AirRefundController');
        $router->resource('air-send', 'AirRefundController');
        //价格设置
        $router->resource('sys-price', 'SysPriceController');
        /* 系统公告 */
        $router->resource('aff-list', 'AfficheController');
        /* 批量代充手机订单 */
        $router->resource('many-mobile', 'ManyMobileController');
        //兑换充值
        $router->resource('convert', 'ConvertController');
        //现金提现
        $router->resource('withdraw-cash', 'WithdrawCashLogController');
        //来拼金记录
        $router->resource('user_lpj_log', 'UserLpjLogController');
        //购物卡兑换记录列表
        $router->resource('user_gwk_log', 'UserShoppingCardDhLogController');
        /*********************** 拼团管理 ***********************/
        //新增拼团
        $router->resource('add-gather', 'GatherController');
        //拼团录单列表
        $router->resource('gather-trade', 'GatherTradeController');
        // 斑马订单列表
        $router->resource('bm-order-lists', 'BmRechargeOrderController');
        //用户拼团列表
        $router->resource('gather-winning', 'GatherWinningController');

        // 用户等级管理
        $router->resource('user-level', 'UserLevelController');
        // 用户等级关系管理
        $router->resource('user-relation', 'UserLevelRelationController');

        // 用户所绑定的省市区信息
        $router->resource('user_city_data', 'UserCityDataController');

        /*********************** 广告管理 ***********************/
        //新增广告奖励
        $router->resource('advert-users', 'AdvertUsersController');
        //广告录单列表
        $router->resource('advert-trade', 'AdvertTradeController');

        //购物卡兑换录单列表
        $router->resource('gwk-log', 'GwkLogController');
        /* 加权平分每日累计 */
        $router->resource('weight-reward', 'WeightRewardController');
        /* 加权评分记录 */
        $router->resource('weight-reward-log', 'WeightRewardsLogController');
    }
);
Route::group(
    [
        'prefix'    => config('admin.route.prefix'),
        'namespace' => config('admin.route.namespace'),
    ],
    function (Router $router)
    {
        //获取城市
        $router->get('get-city', 'CityNodeController@getCity');
        $router->get('get-user-city', 'UserCityDataController@getCity');
        $router->any('mytest1', 'TestController@mytest');
        $router->any('getTtShopDdInfo', 'TestController@getTtShopDdInfo');

        $router->any('updateREBfh', 'TestController@updateREBfh');
    }
);




