<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

            $attributes = [
                    [
                     'key' => 'user_rebate_scale',
                     'value' => '100|50|25',
                     'msg' => '用户消费返还积分比列，对应商家可选让利比例（%）配置，如有修改，请务必按照格式顺序填写(%)'
                    ],
                    [
                    'key' => 'business_rebate_scale',
                    'value' => '20|10|5',
                    'msg' => '商家可选让利比例（%）'
                    ],
                    [
                        'key' => 'business_percent',
                        'value' => '15',
                        'msg' => '	商家返佣比例(%)'
                    ],
                    [
                        'key' => 'user_percent',
                        'value' => '67.5',
                        'msg' => '	普通用户返利（%）'
                    ],
                    [
                        'key' => 'welfare',
                        'value' => '4',
                        'msg' => '公益捐赠（%）'
                    ],
                    [
                        'key' => 'share_scale',
                        'value' => '3',
                        'msg' => '分享激励比例（%）'
                    ],
                    [
                        'key' => 'platform',
                        'value' => '3',
                        'msg' => '平台返佣比例（%）'
                    ],
                    [
                        'key' => 'welfare_uid',
                        'value' => '0',
                        'msg' => '公益账户UID'
                    ],
                    [
                        'key' => 'platform_uid',
                        'value' => '0',
                        'msg' => '来客平台账户UID'
                    ],
                    [
                        'key' => 'leader_share',
                        'value' => '1.5',
                        'msg' => '盟主邀请奖励（%）'
                    ],
                    [
                        'key' => 'user_b_rebate',
                        'value' => '2',
                        'msg' => '普通用户邀请商家返佣(%)'
                    ],
                    [
                        'key' => 'same_leader',
                        'value' => '0.5',
                        'msg' => '同级别盟主返佣（%）'
                    ],
                    [
                        'key' => 'district_node_rebate',
                        'value' => '2.25',
                        'msg' => '区节点返佣比例（%）'
                    ],
                    [
                        'key' => 'city_node_rebate',
                        'value' => '1.25',
                        'msg' => '市节点返佣比例(%)'
                    ],
                    [
                        'key' => 'lk_per',
                        'value' => '300',
                        'msg' => '用户积分计算lk的比例'
                    ],
                    [
                        'key' => 'business_Lk_per',
                        'value' => '60',
                        'msg' => '商家积分计算lk的比例'
                    ],
                    [
                        'key' => 'withdraw_btn',
                        'value' => '1',
                        'msg' => '提现开关 1开启，2关闭'
                    ],
                    [
                        'key' => 'iets_price',
                        'value' => '1',
                        'msg' => 'iet单价'
                    ],
                    [
                        'key'=>'limit_price',
                        'value' => '0',
                        'msg' => '商家单日最高录单金额(0不限制)'
                    ]

                 ];

            Setting::insert($attributes);

    }
}
