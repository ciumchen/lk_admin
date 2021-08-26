<?php

namespace App\Services;

use App\Models\UserLevelRelation;
use App\Models\Users;
use Exception;
use Illuminate\Support\Facades\DB;

class UserRelationService
{
    /**
     * Description:统一调用更新用户关系数据
     *
     * @author lidong<947714443@qq.com>
     * @date 2021/8/25 0025
     */
    public function updateUserRelations()
    {
        try {
            /*插入新曾用户数据*/
            $this->insertUserRelation();
            /* 更新所有用户关系 */
            $this->updateRelation();
            /* 更新已有用户关系数据中的认证状态 */
            $this->updateIsVerified();
            /* 更新用户直推数据 */
            $this->countDirectChild();
            /* 更新团队数据 */
            $this->countTeamChild();
            /* TODO:更新所有达到银卡的用户*/
            /* TODO:更新所有达到金卡的用户*/
            /**/
        } catch (Exception $e) {
            dump($e);
        }
    }
    
    
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
                $insert_batch[ $i ][ 'is_verified' ] = $item->is_auth == 2 ? 1 : 0;
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
    
    /**
     * Description:更新实名状态
     *
     * @throws \Exception
     * @author lidong<947714443@qq.com>
     * @date 2021/8/25 0025
     */
    public function updateIsVerified()
    {
        try {
            $sql = "UPDATE `user_level_relation` a,`users` b SET a.is_verified =IF	( (b.is_auth=2), 1, 0 ) WHERE	a.user_id = b.id AND a.is_verified = 0;";
            $res = DB::update($sql);
        } catch (Exception$e) {
            throw $e;
        }
        dump($res);
    }
    
    /**、
     * Description:更新用户关系数据
     *
     * @author lidong<947714443@qq.com>
     * @date 2021/8/25 0025
     */
    public function updateRelation()
    {
        // 初始化
        $sql1 = "UPDATE `user_level_relation` SET pid_route = '', `rating` = -1;";
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
        dump($res3);
    }
    
    /**
     * Description:统计直接下级数据
     *
     * @author lidong<947714443@qq.com>
     * @date 2021/8/25 0025
     */
    public function countDirectChild()
    {
        $sql = "
UPDATE user_level_relation a,(
	SELECT
		invite_id,
		count( user_id ) child_num,
		sum( integral ) total_integral,
		count(
		IF
		( is_verified, 0, 1 )) AS activity
	FROM
		user_level_relation
	GROUP BY
		invite_id
	) b
	SET a.direct_num = b.child_num,
	a.direct_integral = b.total_integral,
	a.direct_activity = b.activity
WHERE
	a.user_id = b.invite_id;
";
        $res = DB::update($sql);
        dump($res);
    }
    
    /**
     * Description:统计团队数据
     *
     * @author lidong<947714443@qq.com>
     * @date 2021/8/26 0026
     */
    public function countTeamChild()
    {
        $sql = "
        UPDATE user_level_relation t1,
        (
            SELECT
                sum( b.integral ) total_integral,
                count( b.user_id ) total_num,
                count(
                IF
                ( a.is_verified, 0, 1 )) AS activity,
                a.user_id,
                a.pid_route,
                sum( b.integral )
            FROM
                user_level_relation a,
                user_level_relation b
            WHERE
                FIND_IN_SET( a.user_id, b.pid_route )
            GROUP BY
                user_id
            ) t2
            SET t1.team_num = t2.total_num,
            t1.team_integral = t2.total_integral
        WHERE
            t1.user_id = t2.user_id
	";
        $res = DB::update($sql);
        dump('更新团队数据'.$res);
    }
    
    public function updateSliver()
    {
    }
    
    
    /*******************************************************************************/
    /**
     * Description:更新实名状态
     *
     * @throws \Exception
     * @author lidong<947714443@qq.com>
     * @date 2021/8/25 0025
     */
    public function updateIsVerified2()
    {
        set_time_limit(0);
        try {
            $UserRelation = UserLevelRelation::noVerifiedUsers();
            $user_ids = $UserRelation->pluck('user_id')->toArray();
            $i = 0;
            $j = 0;
            do {
                $UserList = Users::getUserList($user_ids, 100);
                $UserRelation->each(function (&$relation_item) use ($UserList, &$j)
                {
                    $UserList->each(function (&$item) use (&$relation_item, &$j)
                    {
                        if ($relation_item->user_id == $item->id) {
                            $relation_item->is_verified = $item->is_auth == 2 ? 1 : 0;
                            $relation_item->save();
                            $j++;
                        }
                    });
                });
                $i++;
            } while (!empty($UserList));
            dump($i);
            dump($j);
        } catch (Exception $e) {
            throw $e;
        }
    }
}
