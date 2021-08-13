<?php

namespace App\Console\Commands;

use App\Services\SettleAccountsService;
use Illuminate\Support\Carbon;
use Illuminate\Console\Command;

class settleAccounts extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'settleAccounts';
    
    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '补贴以及再消费金额结算';
    
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
        $this->info(Carbon::now()->toDateTimeString()." \n开始执行\n补贴以及再消费金额结算命令");
        (new SettleAccountsService())->encourageToAllowance();
        $this->info(Carbon::now()->toDateTimeString()." \n补贴以及再消费金额结算命令\n执行完毕");
        return 0;
    }
}
