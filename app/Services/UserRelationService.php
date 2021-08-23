<?php

namespace App\Services;

use App\Models\User;
use App\Models\UserLevelRelation;
use App\Models\Users;
use Illuminate\Support\Facades\DB;

class UserRelationService
{
    /**
     * Description:将未更新到用户关系表的数据更新到用户关系表
     *
     * @param  null  $UserList
     *
     * @author lidong<947714443@qq.com>
     * @date 2021/8/23 0023
     */
    public function insertUserRelation($UserList = null)
    {
        set_time_limit(0);
        $j = 0;
        do {
            $relation_ids = UserLevelRelation::relationUsersIds();
            $user_ids = Users::getUserAllIds();
            $arr = array_diff($user_ids, $relation_ids);
            if (empty($arr)) {
                break;
            }
            $UserList = Users::getUserList($arr, 100);
            $insert_batch = [];
            $i = 0;
            $UserList->each(function (&$item) use (&$insert_batch, &$i)
            {
                $insert_batch[ $i ][ 'user_id' ] = $item->id;
                $insert_batch[ $i ][ 'integral' ] = $item->integral ?? 0;
                $insert_batch[ $i ][ 'invite_id' ] = $item->invite_uid ?? 0;
                $insert_batch[ $i ][ 'is_verified' ] = $item->is_auth ?? 0;
                $i++;
                return $insert_batch;
            });
            dump($i);
            dump($insert_batch[ 0 ][ 'user_id' ].'-'.$insert_batch[ $i - 1 ][ 'user_id' ]);
            $res = UserLevelRelation::insert($insert_batch);
            $j++;
            dump($res);
            dump($j);
            sleep(3);
            unset($i);
        } while (!empty($UserList));
        unset($j);
    }
    
    public function updateRelation()
    {
        // 初始化
        $sql1 = "UPDATE `user_level_relation` SET pid_route = '', `rating` = -1; ";
        // 根节点
        $sql2 = "UPDATE `user_level_relation` SET pid_route = '', `rating` = 0 WHERE `rating` = -1 AND invite_id = 0; ";
        // 无限下级
        $sql3 = "UPDATE `user_level_relation` a,user_level_relation b SET a.pid_route = IF( b.rating, concat( b.pid_route, ',', a.invite_id ), a.invite_id ), a.`rating` = b.`rating` + 1 WHERE	a.`rating` = - 1 	AND a.invite_id = b.id 	AND b.`rating` > - 1;";
        // 增加pid_route前后的分隔符
        $sql4 = "UPDATE `user_level_relation` a SET  pid_route=IF(a.rating,concat(',',a.pid_route,','),a.invite_id) where a.rating > -1";
        $res1 = DB::update($sql1);
        $res2 = DB::update($sql2);
        dump($res1);
        dump($res2);
        do {
            $res3 = DB::update($sql3);
            dump($res3);
        } while ($res3 > 0);
        $res3 = DB::update($sql4);
    }
}
