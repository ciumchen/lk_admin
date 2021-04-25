<?php

namespace Database\Seeders;

use App\Models\AdminMenu;
use App\Models\AdminPermission;
use Illuminate\Database\Seeder;

class InitMenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        $data = [
            [
                ['id' => 10],
                ['parent_id' => 0, 'order' => 8, 'title' => '会员管理', 'icon' => 'fa-user-o', 'uri' => '']
            ],
            [
                ['id' => 12],
                ['parent_id' => 10, 'order' => 9, 'title' => '会员列表', 'icon' => '', 'uri' => 'users']
            ],
            [
                ['id' => 13],
                ['parent_id' => 10, 'order' => 10, 'title' => '会员信息', 'icon' => '', 'uri' => 'user-data']
            ],
            [
                ['id' => 14],
                ['parent_id' => 0, 'order' => 9, 'title' => '商家管理', 'icon' => 'fa-users', 'uri' => '']
            ],
            [
                ['id' => 15],
                ['parent_id' => 14, 'order' => 8, 'title' => '商家申请列表', 'icon' => '', 'uri' => 'business-apply']
            ],
            [
                ['id' => 16],
                ['parent_id' => 14, 'order' => 8, 'title' => '商家信息列表', 'icon' => '', 'uri' => 'business-data']
            ],
            [
                ['id' => 17],
                ['parent_id' => 14, 'order' => 1, 'title' => '商家分类', 'icon' => '', 'uri' => 'business-category']
            ],
            [
                ['id' => 18],
                ['parent_id' => 0, 'order' => 10, 'title' => '资产管理', 'icon' => 'fa-life-buoy', 'uri' => '']
            ],
            [
                ['id' => 19],
                ['parent_id' => 18, 'order' => 15, 'title' => '资产类型', 'icon' => '', 'uri' => 'assets-type']
            ],
            [
                ['id' => 20],
                ['parent_id' => 18, 'order' => 16, 'title' => '用户资产', 'icon' => '', 'uri' => 'user-assets']
            ],
            [
                ['id' => 21],
                ['parent_id' => 18, 'order' => 17, 'title' => '资产记录', 'icon' => '', 'uri' => 'assets-logs']
            ],
            [
                ['id' => 22],
                ['parent_id' => 18, 'order' => 17, 'title' => '资产冻结记录', 'icon' => '', 'uri' => 'freeze-logs']
            ],
            [
                ['id' => 23],
                ['parent_id' => 0, 'order' => 11, 'title' => '系统配置', 'icon' => 'fa-link', 'uri' => '']
            ],
            [
                ['id' => 24],
                ['parent_id' => 23, 'order' => 17, 'title' => '地区', 'icon' => '', 'uri' => 'city-data']
            ],
            [
                ['id' => 27],
                ['parent_id' => 23, 'order' => 17, 'title' => '广告位', 'icon' => '', 'uri' => 'ad']
            ],
            [
                ['id' => 28],
                ['parent_id' => 23, 'order' => 17, 'title' => '参数设置', 'icon' => '', 'uri' => 'settings']
            ],
            [
                ['id' => 29],
                ['parent_id' => 0, 'order' => 12, 'title' => '提现管理', 'icon' => 'fa-file-text', 'uri' => '']
            ],
            [
                ['id' => 30],
                ['parent_id' => 29, 'order' => 12, 'title' => '用户地址', 'icon' => '', 'uri' => 'address']
            ],
            [
                ['id' => 31],
                ['parent_id' => 29, 'order' => 13, 'title' => '提现记录', 'icon' => '', 'uri' => 'withdraw-logs']
            ],
            [
                ['id' => 32],
                ['parent_id' => 10, 'order' => 13, 'title' => '积分记录', 'icon' => '', 'uri' => 'integral-logs']
            ],
            [
                ['id' => 33],
                ['parent_id' => 14, 'order' => 13, 'title' => '订单列表', 'icon' => '', 'uri' => 'orders']
            ],
            [
                ['id' => 34],
                ['parent_id' => 0, 'order' => 13, 'title' => '返佣管理', 'icon' => 'fa-share', 'uri' => '']
            ],
            [
                ['id' => 35],
                ['parent_id' => 34, 'order' => 13, 'title' => '返佣记录', 'icon' => '', 'uri' => 'rebate-data']
            ],
            [
                ['id' => 36],
                ['parent_id' => 0, 'order' => 13, 'title' => '站点管理', 'icon' => '', 'uri' => '']
            ],[
                ['id' => 37],
                ['parent_id' => 36, 'order' => 13, 'title' => '站点列表', 'icon' => '', 'uri' => 'city-node']
            ],
        ];

        $slugs = [
            'list' => ['GET', '', '列表'],
            'view' => ['GET', '/*', '查看'],
            'create' => ['POST', '', '创建'],
            'edit' => ['PUT,PATCH', '/*', '编辑'],
            'delete' => ['DELETE', '/*', '删除'],
            'export' => ['GET', '', '导出'],
            'filter' => ['', '', '筛选'],
        ];

        AdminMenu::where('id', '>=', 8)->delete();

        foreach ($data as $key => $val) {
            //菜单
            AdminMenu::updateOrCreate($val[0], $val[1]);

            //权限
            $menu = $val[1];
            if (!empty($menu['uri'])) {
                foreach ($slugs as $slugKey => $slugVal) {
                    AdminPermission::updateOrCreate([
                        'slug' => $menu['uri'].'.'.$slugKey
                    ], [
                        'name'          => $menu['title'].'-'.$slugVal[2],
                        'http_method'   => $slugVal[0],
                        'http_path'     => '/'.$menu['uri'].$slugVal[1]
                    ]);
                }
            }
        }
    }
}
