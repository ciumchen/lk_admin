<?php

namespace App\Console\Commands;

use App\Services\RebateService;
use Carbon\Carbon;
use Illuminate\Console\Command;

class exchangeIets extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'exchangeIets';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '将用户的分红转换为IETS';

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
        $this->info(Carbon::now()->toDateTimeString() . " 执行分红命令");
        (new RebateService())->exchagneIets();
        $this->info(Carbon::now()->toDateTimeString(). " 分红命令执行完成");
    }
}
