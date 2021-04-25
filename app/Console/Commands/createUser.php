<?php

namespace App\Console\Commands;


use App\Models\User;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Str;

class createUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'createUser';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '创建测试商家用户';

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
        $data = [];

        for($i = 0;$i<50;$i++){
            $data[$i]['invite_uid'] = 11;
            $data[$i]['role'] = 2;
            $data[$i]['phone'] = Str::random(6);
            $data[$i]['username'] = Str::random(6);
            $data[$i]['salt'] = Str::random(6);
            $data[$i]['code_invite'] = Str::random(6);
            $data[$i]['avatar'] = Str::random(6);

        }
        User::insert($data);
    }
}
