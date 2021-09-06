<?php

namespace App\Services;

use App\Models\AssetsLogs;
use App\Models\AssetsType;
use App\Models\CityData;
use App\Models\CityNode;
use App\Models\Order;
use App\Models\Setting;
use App\Models\User;
use App\Models\UserCityData;

/**
 * Description:省市区代理
 */
class ProvinceCityAreaDlService
{
    /*
     * 省市区代理返佣
     */
    public function inviteProvinceCityAreaD(Order $order, User $user, AssetsType $assets, $orderNo, $platformUid = 0)
    {
        //查询用户的省市区信息
        $userCityInfo = UserCityData::where('uid', $user->id)->first();
//        dd($userCityInfo);
        if (empty($userCityInfo)) {
            $provinceAgentUid = $platformUid;
            $cityAgentUid = $platformUid;
            $districtAgentUid = $platformUid;

        } else {
            //查询省代uid
            $provinceData = CityData::find($userCityInfo->province_id);
            $cityData = CityData::find($userCityInfo->city_id);
            $districtData = CityData::find($userCityInfo->district_id);

            //查找省代
            $provinceInfo = CityNode::where(['province' => $provinceData->code, 'city' => null, 'district' => null])->first();
//            dd($provinceData->code,$provinceInfo);
            if (empty($provinceInfo)) {
                $provinceAgentUid = $platformUid;
            } else {
                $provinceAgentUid = $provinceInfo->uid;
            }

            //查找市代
            $cityInfo = CityNode::where(['province' => $provinceData->code, 'city' => $cityData->code, 'district' => null])->first();
            if (empty($cityInfo)) {
                $cityAgentUid = $platformUid;
            } else {
                $cityAgentUid = $cityInfo->uid;
            }

            //查找区代
            $districtInfo = CityNode::where(['province' => $provinceData->code, 'city' => $cityData->code, 'district' => $districtData->code])->first();
            if (empty($districtInfo)) {
                $districtAgentUid = $platformUid;
            } else {
                $districtAgentUid = $districtInfo->uid;
            }

        }

        //省代理返佣
        $provinceNodeRebate = Setting::getSetting('province_node_rebate') ?? 0;
        $provinceAmount = 0;
        if ($provinceNodeRebate > 0) {
            $remark = '省节点运营返佣';
            $provinceAmount = bcmul($order->profit_price, bcdiv($provinceNodeRebate, 100, 6), 8);
            AssetsService::BalancesChange2(
                $provinceAgentUid,
                $assets->id,
                $assets->assets_name,
                $provinceAmount,
                AssetsLogs::OPERATE_TYPE_PROVINCE_REBATE,
                $remark,
                $orderNo,
            );
        }

        //市节点返佣
        $cityNodeRebate = Setting::getSetting('city_node_rebate') ?? 0;
        $cityAmount = 0;
        if ($cityNodeRebate > 0) {
            $remark = '市节点运营返佣';
//市长分配比列1.25%
            $cityAmount = bcmul($order->profit_price, bcdiv($cityNodeRebate, 100, 6), 8);
            AssetsService::BalancesChange2(
                $cityAgentUid,
                $assets->id,
                $assets->assets_name,
                $cityAmount,
                AssetsLogs::OPERATE_TYPE_CITY_REBATE,
                $remark,
                $orderNo,
            );
        }
//区节点返佣
        $districtNodeRebate = Setting::getSetting('district_node_rebate') ?? 0;
        $districtAmount = 0;
        if ($districtNodeRebate > 0) {
            $remark = '区级节点运营返佣';
            //区长分配1.75%
            $districtAmount = bcmul($order->profit_price, bcdiv($districtNodeRebate, 100, 6), 8);
            AssetsService::BalancesChange2(
                $districtAgentUid,
                $assets->id,
                $assets->assets_name,
                $districtAmount,
                AssetsLogs::OPERATE_TYPE_DISTRICT_REBATE,
                $remark,
                $orderNo,
            );
        }
    }

}

