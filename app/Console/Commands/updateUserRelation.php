<?php

namespace App\Console\Commands;

use App\Services\UserRelationService;
use Illuminate\Console\Command;
use Illuminate\Support\Carbon;

class updateUserRelation extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'updateUserRelation';
    
    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '更新会员关系';
    
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
        $this->info(Carbon::now()->toDateTimeString()." \n开始执行\n更新会员关系");
        (new UserRelationService())->updateUserRelations();
        $this->info(Carbon::now()->toDateTimeString()." \n更新会员关系\n执行完毕");
    }
}
