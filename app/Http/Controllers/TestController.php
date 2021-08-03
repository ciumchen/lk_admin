<?php

namespace App\Http\Controllers;

use App\Models\ShopUser;
use Illuminate\Http\Request;
use DB;
class TestController extends Controller
{
    public function test(){
        echo 'test111';
    }

    //获取商城用户信息
    public function getShopUserInfo(){
        dd('getShopUserInfo');
        $userData = ShopUser::limit(3)->get()->toArray();
        dd($userData);

    }




}
