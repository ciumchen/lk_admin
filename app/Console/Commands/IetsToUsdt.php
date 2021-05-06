<?php

namespace App\Console\Commands;

use App\Admin\Repositories\AssetsLog;
use App\Admin\Repositories\FreezeLog;
use App\Models\Asset;
use App\Models\AssetsType;
use App\Services\AssetsService;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class IetsToUsdt extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'IetsToUsdt';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'iets转换成usdt';

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
        try {
            DB::transaction(function () {
                $usdt = AssetsType::where("assets_name", AssetsType::DEFAULT_ASSETS_NAME)->first();

                //转换倍数1iets = 2.4 usdt
                $mul = 2.4;

                //获取iets余额大于0的用户
                Asset::where("assets_name", 'iets')
                    ->where("amount", ">", 0)
                    ->chunkById(500,function($asset) use ($usdt, $mul) {
                        foreach($asset as $v)
                        {
                            //转换为usdt
                            $amount = bcmul($v->amount, $mul, 8);
                            $this->info("UID: " . $v->uid . " IETS余额：". $v->amount ." 兑换为 " . $amount . " USDT余额");
                            //增加USDT余额
                            AssetsService::BalancesChange(
                                $v->uid,
                                $usdt->id,
                                $usdt->assets_name,
                                $amount,
                                AssetsLog::OPERATE_TYPE_IETS_TO_USDT,
                                "兑换为USDT增加"
                            );
                            //iets余额改为0
                            AssetsService::BalancesChange(
                                $v->uid,
                                $v->assets_type_id,
                                $v->assets_name,
                                -$v->amount,
                                AssetsLog::OPERATE_TYPE_IETS_TO_USDT,
                                "兑换为USDT扣除"
                            );
                        }
                    });

                //获取iets冻结余额大于0的用户
                Asset::where("assets_name", 'iets')
                    ->where("freeze_amount", ">", 0)
                    ->chunkById(500,function($asset) use ($usdt, $mul) {
                        foreach($asset as $v)
                        {
                            //转换为usdt
                            $amount = bcmul($v->freeze_amount, $mul, 8);
                            $this->info("UID: " . $v->uid . " IETS冻结余额：". $v->freeze_amount ." 兑换为 " . $amount . " USDT冻结余额");
                            //增加USDT余额
                            AssetsService::freezeChange(
                                $v->uid,
                                $usdt->id,
                                $usdt->assets_name,
                                $amount,
                                FreezeLog::OPERATE_TYPE_IETS_TO_USDT,
                                "IETS兑换为USDT"
                            );
                            //iets余额改为0
                            AssetsService::freezeChange(
                                $v->uid,
                                $v->assets_type_id,
                                $v->assets_name,
                                -$v->freeze_amount,
                                FreezeLog::OPERATE_TYPE_IETS_TO_USDT,
                                "IETS兑换为USDT"
                            );
                        }
                    });
            });
            $this->info('命令执行成功');
        } catch (\Exception $e) {

            $this->info("命令执行失败，失败原因：" . $e->getMessage());
        }
    }
}
