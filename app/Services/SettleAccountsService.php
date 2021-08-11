<?php

namespace App\Services;

use App\Models\AssetsType;
use Illuminate\Support\Facades\DB;

class SettleAccountsService
{
    /**
     * Description:encourage转换为 可提现额度[补贴]
     *
     * @author lidong<947714443@qq.com>
     * @date   2021/8/11 0011
     */
    public function encourageToAllowance()
    {
        try {
            // TODO:积分结算到新账户
            $encourage = AssetsType::where("assets_name", AssetsType::DEFAULT_ASSETS_ENCOURAGE)->first();
            dd($encourage);
            DB::transaction(function () use ($encourage)
            {
            });
        } catch (\Exception $e) {
        }
    }
    
    // 扣除encourage
    public function encourageDeduct($uid, $assets_name, $amount)
    {
    }
}