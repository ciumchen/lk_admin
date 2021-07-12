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
    function (Router $router) {
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
        $router->resource('hfdc', 'LkPhoneDcController');
        $router->resource('lkscsh', 'LkShopMerchantOrderController');
        $router->resource('lksczy', 'LkShopSelfSupportOrderController');
        $router->resource('sphy', 'VideoOrderController'); //视频会员订单
        $router->resource('addjf', 'ToBeAddedIntegralController');
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
    }
);
Route::group(
    [
        'prefix'    => config('admin.route.prefix'),
        'namespace' => config('admin.route.namespace'),
    ],
    function (Router $router) {
        //获取城市
        $router->get('get-city', 'CityNodeController@getCity');
    }
);
