<?php

namespace App\Console\Commands;

use App\Exceptions\LogicException;
use App\Models\LkshopAddUserLog;
use App\Models\ShopUser;
use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use App\Models\UserData;
use App\Models\Setting;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;
class addLkshopUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:addLkshopUser';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
        log::info('=================导入商城用户任务===================================');
        //查询记录
        $LkUserModel = new LkshopAddUserLog();
        $addLog = $LkUserModel::where('type','addLkShopuser')->first();
        if($addLog==''){
            $LkUserModel->type = 'addLkShopuser';
            $LkUserModel->save();
            $addLog = $LkUserModel::where('type','addLkShopuser')->first();
        }
//        dd($addLog);

        //查询用户
        $userData = ShopUser::where('id','>',$addLog->user_id)->limit(10)->get();
        if($userData){
            $userArr = $userData->toArray();
            $lkUserDataModel = new User();
            foreach ($userArr as $k=>$v){
                $userInfo = User::where('phone',$v['binding'])->first();
                log::info('=================查询用户===================================');
                if($userInfo==''){//注册用户
                    log::info('=================注册用户===================================');
                    try {
                        DB::transaction(function () use ($v) {
                            $pShareUid = Setting::getSetting('p_share_uid')??0;
                            if($pShareUid <= 0)
                                throw new LogicException('默认邀请人未配置');
                            $inviter = $pShareUid;
                            $user = User::create([
                                'phone' => $v['binding'],
                                'invite_uid' => $inviter,
                                'register_ip' => request_ip(),
                                'salt' => Str::random(6),
                                'code_invite' => Str::random(6),
                                'username' => $v['username'],
                            ]);
                            //创建密码
                            $user->changePassword(md5(time().Str::random(10)));
                            UserData::create([
                                'uid' => $user->id,
                            ]);

                        });
                        log::info('=================注册成功===================================');
                    }catch (PDOException $e) {
                        report($e);
                        throw new LogicException('注册失败，请重试');
                        log::info('=================注册失败1===================================');
                    } catch (Exception $e) {
                        throw $e;
                        log::info('=================注册失败2===================================');
                    }

                }
                $addLog = LkshopAddUserLog::where('type','addLkShopuser')->first();
                $addLog->user_id = $v['id'];
                $addLog->save();
            }
            log::info('=================完成一次导入===================================');
            //dd($userArr);
        }else{
            return '所有用户导入完成';
        }








    }
}
