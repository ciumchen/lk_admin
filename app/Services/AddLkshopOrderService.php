<?php

namespace App\Services;

use App\Exceptions\LogicException;
use App\Models\Address;
use Illuminate\Support\Facades\DB;
use App\Models\LkshopOrder;
use App\Models\LkshopOrderLog;
use App\Models\Order;
use App\Models\ShopMch;
use App\Models\ShopOrder;
use App\Models\Users;
use App\Services\ShopOrderService;
use Illuminate\Console\Command;

use App\Models\LkshopAddUserLog;
use App\Models\ShopUser;
use App\Models\User;
use App\Models\UserData;
use App\Models\Setting;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;

class AddLkshopOrderService
{

    //获取lk用户的uid
    public function getLkUserId($shopUserId){
        $shopUserPhome = ShopUser::where('id',$shopUserId)->value('binding');
        $lkUserId = Users::where('phone',$shopUserPhome)->value('id');//lk用户uid
        return $lkUserId;
    }

    //获取lk商户的uid
    public function getLkBusinessUid($mch_id){
        $ShopMchModel = new ShopMch();
        $mchUid = $ShopMchModel->getMchUserId($mch_id);
        $mchUserPhone = ShopUser::where('id',$mchUid)->value('binding');
        $lkBusinessUid = Users::where('phone',$mchUserPhone)->value('id');//lk商户uid
        return $lkBusinessUid;
    }



}
