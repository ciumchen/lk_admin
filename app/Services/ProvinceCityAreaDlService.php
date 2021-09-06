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
    //分享佣金
    public function inviteEncourage(Order $order, User $user, AssetsType $assets, $orderNo, $platformUid = 0)
    {
        if (intval($platformUid) == 0) {
            $platformUid = Setting::getSetting('platform_uid');
        }
        try {
            // 直属上级
            $invite_first = $this->inviteEncourageFirst($order, $user, $assets, $orderNo, $platformUid);
            $invite_second = $this->inviteEncourageSecond($order, $invite_first, $assets, $orderNo, $platformUid);
            $this->inviteEncourageThird($order, $invite_second, $assets, $orderNo, $platformUid);
        } catch (\Exception $e) {
            throw $e;
        }
        return true;
    }

    /*
     * 省市区代理返佣
     * $order 订单记录对象
     * $user 消费者user表记录对象
     * $assets 获取资产类型记录对象
     * $orderNo 订单号
     * $platformUid 	来客平台账户UID=2
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

//            dd($provinceAgentUid,$cityAgentUid,$districtAgentUid);


        }

        //省代理返佣
        $provinceNodeRebate = Setting::getSetting('province_node_rebate') ?? 0;
        $provinceAmount = 0;
        if ($provinceNodeRebate > 0) {
            $remark = '省节点运营返佣';
            $provinceAmount = bcmul($order->profit_price, bcdiv($provinceNodeRebate, 100, 6), 8);
            AssetsService::BalancesChange(
                $orderNo,
                $provinceAgentUid,
                $assets,
                $assets->assets_name,
                $provinceAmount,
                AssetsLogs::OPERATE_TYPE_PROVINCE_REBATE,
                $remark
            );
        }

        //市节点返佣
        $cityNodeRebate = Setting::getSetting('city_node_rebate') ?? 0;
        $cityAmount = 0;
        if ($cityNodeRebate > 0) {
            $remark = '市节点运营返佣';
//市长分配比列1.25%
            $cityAmount = bcmul($order->profit_price, bcdiv($cityNodeRebate, 100, 6), 8);
            AssetsService::BalancesChange(
                $orderNo,
                $cityAgentUid,
                $assets,
                $assets->assets_name,
                $cityAmount,
                AssetsLogs::OPERATE_TYPE_CITY_REBATE,
                $remark
            );
        }
//区节点返佣
        $districtNodeRebate = Setting::getSetting('district_node_rebate') ?? 0;
        $districtAmount = 0;
        if ($districtNodeRebate > 0) {
            $remark = '区级节点运营返佣';
            //区长分配1.75%
            $districtAmount = bcmul($order->profit_price, bcdiv($districtNodeRebate, 100, 6), 8);
            AssetsService::BalancesChange(
                $orderNo,
                $districtAgentUid,
                $assets,
                $assets->assets_name,
                $districtAmount,
                AssetsLogs::OPERATE_TYPE_DISTRICT_REBATE,
                $remark
            );
        }
    }

}

