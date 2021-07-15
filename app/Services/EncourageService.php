<?php

namespace App\Services;

use App\Models\AssetsLogs;
use App\Models\AssetsType;
use App\Models\Order;
use App\Models\Setting;
use App\Models\User;

/**
 * Description:佣金计算服务层
 *
 * Class EncourageService
 *
 * @package App\Services
 * @author  lidong<947714443@qq.com>
 * @date    2021/7/14 0014
 */
class EncourageService
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
    
    /**
     * Description:直属上级分佣
     *
     * @param \App\Models\Order      $order
     * @param \App\Models\User       $user
     * @param \App\Models\AssetsType $assets
     * @param                        $orderNo
     * @param int                    $platformUid
     *
     * @return \App\Models\User|\Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Model|object|null
     * @throws \Exception
     * @author lidong<947714443@qq.com>
     * @date   2021/7/14 0014
     */
    public function inviteEncourageFirst(Order $order, User $user, AssetsType $assets, $orderNo, $platformUid = 0)
    {
        try {
            if (intval($platformUid) == 0) {
                $platformUid = Setting::getSetting('platform_uid');
            }
            $invite = User::whereId($user->invite_uid ?? 0)
                          ->first();
            if (!$invite || ($invite->status != User::STATUS_NORMAL)) {
                $uid = $platformUid;
                $remark = '一级下级消费返佣（上级账号被封禁或不存在）';
            } else {
                $remark = '一级下级消费返佣';
                $uid = $invite->id;
            }
            $shareScale = Setting::getSetting('share_scale_p1');
            $shareAmount = bcmul($order->profit_price, bcdiv($shareScale, 100, 6), 2);
            AssetsService::BalancesChange2(
                $uid,
                $assets->id,
                $assets->assets_name,
                $shareAmount,
                AssetsLogs::OPERATE_TYPE_INVITE_REBATE,
                $remark,
                $orderNo
            );
        } catch (\Exception $e) {
            throw $e;
        }
        return $invite;
    }
    
    /**
     * Description: 二级上级分佣
     *
     * @param \App\Models\Order      $order
     * @param \App\Models\User|null  $user
     * @param \App\Models\AssetsType $assets
     * @param                        $orderNo
     * @param int                    $platformUid
     *
     * @return \App\Models\User|\Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Model|object|null
     * @throws \Exception
     * @author lidong<947714443@qq.com>
     * @date   2021/7/14 0014
     */
    public function inviteEncourageSecond(Order $order, $user, AssetsType $assets, $orderNo, $platformUid = 0)
    {
        try {
            if (intval($platformUid) == 0) {
                $platformUid = Setting::getSetting('platform_uid');
            }
            $invite = User::whereId($user->invite_uid ?? 0)
                          ->first();
            if (!$invite || ($invite->status != User::STATUS_NORMAL)) {
                $uid = $platformUid;
                $remark = '二级下级消费返佣（上级账号被封禁或不存在）';
            } else {
                $remark = '二级下级消费返佣';
                $uid = $invite->id;
            }
            $shareScale = Setting::getSetting('share_scale_p2');
            $shareAmount = bcmul($order->profit_price, bcdiv($shareScale, 100, 6), 2);
            AssetsService::BalancesChange2(
                $uid,
                $assets->id,
                $assets->assets_name,
                $shareAmount,
                AssetsLogs::OPERATE_TYPE_INVITE_REBATE,
                $remark,
                $orderNo
            );
        } catch (\Exception $e) {
            throw $e;
        }
        return $invite;
    }
    
    /**
     * Description:三级上级分佣
     *
     * @param \App\Models\Order      $order
     * @param \App\Models\User|null  $user
     * @param \App\Models\AssetsType $assets
     * @param                        $orderNo
     * @param int                    $platformUid
     *
     * @return \App\Models\User|\Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Model|object|null
     * @throws \Exception
     * @author lidong<947714443@qq.com>
     * @date   2021/7/14 0014
     */
    public function inviteEncourageThird(Order $order, $user, AssetsType $assets, $orderNo, $platformUid = 0)
    {
        try {
            if (intval($platformUid) == 0) {
                $platformUid = Setting::getSetting('platform_uid');
            }
            $invite = User::whereId($user->invite_uid ?? 0)
                          ->first();
            if (!$invite || ($invite->status != User::STATUS_NORMAL)) {
                $uid = $platformUid;
                $remark = '三级下级消费返佣（上级账号被封禁或不存在）';
            } else {
                $remark = '三级下级消费返佣';
                $uid = $invite->id;
            }
            $shareScale = Setting::getSetting('share_scale_p3');
            $shareAmount = bcmul($order->profit_price, bcdiv($shareScale, 100, 6), 2);
            AssetsService::BalancesChange2(
                $uid,
                $assets->id,
                $assets->assets_name,
                $shareAmount,
                AssetsLogs::OPERATE_TYPE_INVITE_REBATE,
                $remark,
                $orderNo
            );
        } catch (\Exception $e) {
            throw $e;
        }
        return $invite;
    }
}
