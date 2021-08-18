<?php

namespace App\Console\Commands;

use App\Services\BmApi\BmOrderService;
use Carbon\Carbon;
use Illuminate\Console\Command;

class addBmOrders extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'addBmOrders {--date= : 需要获取订单的日期 格式为：yyyy-mm-dd 默认为昨天}';
    
    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '获取斑马订单';
    
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
        $date = $this->option('date');
        $date = $date ? date('Y-m-d', strtotime($date)) : date('Y-m-d', strtotime('-1 days'));
        $this->info(Carbon::now()->toDateTimeString()."\n 开始获取斑马订单");
        (new BmOrderService())->addOrders($date);
        $this->info("\n ".Carbon::now()->toDateTimeString()."\n 获取斑马订单完成");
    }
}
