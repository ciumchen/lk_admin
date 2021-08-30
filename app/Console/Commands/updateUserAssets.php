<?php

namespace App\Console\Commands;

use App\Services\AssetsRollBackService;
use App\Services\UserRelationService;
use Illuminate\Console\Command;
use Illuminate\Support\Carbon;

class updateUserAssets extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'updateUserAssets';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '扣除用户资产';

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

        $this->info(Carbon::now()->toDateTimeString()." \n开始执行\n扣除用户资产");
        (new AssetsRollBackService())->updateUserAssets();
        $this->info(Carbon::now()->toDateTimeString()." \n扣除用户资产\n执行完毕");

    }
}
