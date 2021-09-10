<?php

namespace App\Services;

use App\Models\UserLevel;
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
     * @date   2021/8/25 0025
     */
    public function updateUserRelations()
    {
        try {
            /*插入新曾用户数据*/
            $this->insertUserRelation();
            /* 更新用户邀请人关系 */
            $this->updateInviteId();
            /* 更新所有用户关系 */
            $this->updateRelation();
            /* 更新已有用户关系数据中的认证状态 */
            $this->updateIsVerified();
            /* 更新用户是否已经购买会员 */
            $this->updateIsVip();
            /* 更新用户积分数信息 */
            $this->updateAllIntegral();
            /* 更新用户直推数据 */
            $this->countDirectChild();
            /* 更新团队数据 */
            $this->countTeamChild();
            /* 更新所有无状态用户为消费者 */
            $this->updateToConsumer();
            /* 更新达到会员条件的消费者为会员 */
            $this->updateToVip();
            /* 更新所有达到银卡的用户*/
            $this->updateToSliver();
            /* 统计下级银卡数量 */
            $this->countChildSliverNum();
            /* 统计团队银卡数量 */
            $this->countTeamSliverNum();
            /* 更新所有达到金卡的用户*/
            $this->updateToGold();
            /* 标记银卡团队 */
            $this->markSilverId();
            /* 标记金卡团队 */
            $this->markGoldId();
            /* 标记钻石卡团队 */
            $this->markDiamondId();
        } catch (Exception $e) {
            dump($e->getMessage());
        }
    }
    
    /**
     * Description:将未更新到用户关系表的数据更新到用户关系表
     *
     * @param  null  $UserList
     *
     * @author lidong<947714443@qq.com>
     * @date   2021/8/23 0023
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
            $UserList->each(function (&$item) use (&$insert_batch, &$i) {
                $insert_batch[ $i ][ 'user_id' ] = $item->id;
                $insert_batch[ $i ][ 'integral' ] = $item->integral ?? 0;
                $insert_batch[ $i ][ 'invite_id' ] = $item->invite_uid ?? 0;
                $insert_batch[ $i ][ 'is_verified' ] = $item->is_auth == 2 ? 1 : 0;
                $insert_batch[ $i ][ 'is_vip' ] = $item->member_status ?? 0;
                $i++;
                return $insert_batch;
            });
            dump($i.'数据');
            dump('user_id:'.$insert_batch[ 0 ][ 'user_id' ].'-'.$insert_batch[ $i - 1 ][ 'user_id' ]);
            $res = UserLevelRelation::insert($insert_batch);
            $j++;
            dump($res.'用户新增关系');
            dump($j.'轮');
            sleep(3);
            unset($i);
        } while (!empty($UserList));
        unset($j);
    }
    
    /**
     * Description:更新用户邀请人关系
     *
     * @author lidong<947714443@qq.com>
     * @date   2021/9/4 0004
     */
    public function updateInviteId()
    {
        try {
            $sql = "UPDATE user_level_relation a, users b SET a.invite_id=IF(ISNULL(b.invite_uid),0,b.invite_uid) WHERE a.user_id=b.id;";
            $res = DB::update($sql);
            dump('更新'.$res.'位用户邀请人关系');
        } catch (Exception $e) {
            dump('更新邀请人关系出错:updateInviteId'.$e->getMessage());
        }
    }
    
    /**
     * Description:更新用户积分信息
     *
     * @author lidong<947714443@qq.com>
     * @date   2021/8/27 0027
     */
    public function updateAllIntegral()
    {
        try {
            $sql = "UPDATE user_level_relation ul,users u SET ul.integral=u.integral WHERE ul.user_id=u.id;";
            $res = DB::update($sql);
            dump('更新'.$res.'位用户积分');
        } catch (Exception $e) {
            dump('更新用户积分出错:updateAllIntegral'.$e->getMessage());
        }
    }
    
    /**
     * Description:更新实名状态
     *
     * @throws \Exception
     * @author lidong<947714443@qq.com>
     * @date   2021/8/25 0025
     */
    public function updateIsVerified()
    {
        try {
            $sql = "UPDATE `user_level_relation` a,`users` b SET a.is_verified =IF	( (b.is_auth=2), 1, 0 ) WHERE	a.user_id = b.id AND a.is_verified = 0;";
            $res = DB::update($sql);
            dump($res.'用户更新实名状态');
        } catch (Exception $e) {
            dump($e->getMessage());
        }
    }
    
    /**
     * Description:更新所有用户会员购买状态
     *
     * @author lidong<947714443@qq.com>
     * @date   2021/8/27 0027
     */
    public function updateIsVip()
    {
        try {
            //member_status
            $sql = "UPDATE `user_level_relation` a,`users` b SET a.is_vip =b.member_status WHERE a.user_id = b.id AND a.is_vip = 0;";
            $res = DB::update($sql);
            dump($res.'用户更新活跃状态');
        } catch (Exception $e) {
            dump($e->getMessage());
        }
    }
    
    /**、
     * Description:更新用户关系数据
     *
     * @author lidong<947714443@qq.com>
     * @date   2021/8/25 0025
     */
    public function updateRelation()
    {
        try {
            // 初始化
            $sql1 = "UPDATE `user_level_relation` SET pid_route = '', `rating` = -1;";
            // 根节点
            $sql2 = "UPDATE `user_level_relation` SET pid_route = '', `rating` = 0 WHERE `rating` = -1 AND invite_id = 0; ";
            // 无限下级
            $sql3 = "UPDATE `user_level_relation` a,user_level_relation b SET a.pid_route = IF( b.rating, concat( b.pid_route, ',', a.invite_id ), a.invite_id ), a.`rating` = b.`rating` + 1 WHERE	a.`rating` = - 1 	AND a.invite_id = b.user_id 	AND b.`rating` > - 1;";
            // 增加pid_route前后的分隔符
//            $sql4 = "UPDATE `user_level_relation` a SET  pid_route=IF(a.rating,concat(',',a.pid_route,','),a.invite_id) where a.rating > -1";
            $res1 = DB::update($sql1);
            $res2 = DB::update($sql2);
            dump($res1.'数据初始化');
            dump($res2.'数据更新根节点');
            $i = 0;
            do {
                $res3 = DB::update($sql3);
                $i++;
                dump('第'.$i.'层级'.$res3.'用户更新pid_route');
            } while ($res3 > 0);
//            $res4 = DB::update($sql4);
//            dump($res4.'数据pid_route增加前后分隔符');
        } catch (Exception $e) {
            dump('用户关系更新出错:updateRelation '.$e->getMessage());
        }
    }
    
    /**
     * Description:统计直接下级数据
     *
     * @author lidong<947714443@qq.com>
     * @date   2021/8/25 0025
     */
    public function countDirectChild()
    {
        try {
            $sql = "
UPDATE user_level_relation a,(
	SELECT
		invite_id,
		count( user_id ) child_num,
		sum( integral ) total_integral,
		count(
		IF
		( is_vip, 0, 1 )) AS activity
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
            dump($res.'用户统计下级数据');
        } catch (Exception $e) {
            dump('统计下级数据出错: countDirectChild'.$e->getMessage());
        }
    }
    
    /**
     * Description:统计团队数据
     *
     * @author lidong<947714443@qq.com>
     * @date   2021/8/26 0026
     */
    public function countTeamChild()
    {
        try {
            $sql = "
        UPDATE user_level_relation t1,
        (
            SELECT
                sum( b.integral ) total_integral,
                count( b.user_id ) total_num,
                count(
                IF
                ( a.is_vip, 0, 1 )) AS activity,
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
            t1.team_integral = t2.total_integral,
            t1.team_activity = t2.activity
        WHERE
            t1.user_id = t2.user_id
	";
            $res = DB::update($sql);
            dump('更新团队数据'.$res);
        } catch (Exception $e) {
            dump('团队数据更新出错:countTeamChild '.$e->getMessage());
        }
    }
    
    /**
     * Description:更新所有用户为消费者
     *
     * @author lidong<947714443@qq.com>
     * @date   2021/8/27 0027
     */
    public function updateToConsumer()
    {
        try {
            $sql = "UPDATE user_level_relation SET level_id=1 WHERE level_id<1;";
            $res = DB::update($sql);
            dump('更新'.$res.'为消费者');
        } catch (Exception $e) {
            dump('更新用户为消费者出错:updateToConsumer '.$e->getMessage());
        }
    }
    
    /**
     * Description:更新消费者为会员
     *
     * @author lidong<947714443@qq.com>
     * @date   2021/8/27 0027
     */
    public function updateToVip()
    {
        try {
            $sql = "UPDATE user_level_relation SET level_id=2 WHERE level_id<2 AND is_vip = 1;";
            $res = DB::update($sql);
            dump('更新'.$res.'为会员');
        } catch (Exception $e) {
            dump('更新用户为会员出错:updateToVip'.$e->getMessage());
        }
    }
    
    /**
     * Description:自动升级银卡会员
     *
     * @param $sliver_id
     *
     * @author lidong<947714443@qq.com>
     * @date   2021/8/27 0027
     */
    public function updateToSliver($sliver_id = 3)
    {
        try {
            $UserLevel = UserLevel::findOrFail($sliver_id);
            $sql = "
UPDATE user_level_relation
SET level_id = {$UserLevel->id}
WHERE
	direct_activity >= {$UserLevel->direct_activity}
	AND team_activity >= {$UserLevel->team_activity}
	AND integral >= {$UserLevel->self_integral}
	AND team_integral >= {$UserLevel->team_integral}
    AND level_id<{$UserLevel->id};
	";
            $res = DB::update($sql);
            dump($res.'用户升级到银卡');
        } catch (Exception $e) {
            dump("银卡会员更新错误:updateSliver ".$e->getMessage());
        }
    }
    
    /**
     * Description:升级到金卡
     *
     * @param $gold_id
     *
     * @author lidong<947714443@qq.com>
     * @date   2021/8/27 0027
     */
    public function updateToGold($gold_id = 4)
    {
        try {
            $UserLevel = UserLevel::findOrFail($gold_id);
            $sql = "
UPDATE user_level_relation
SET level_id ={$UserLevel->id}
WHERE
direct_silver_num >= {$UserLevel->direct_num}
AND team_silver_num >= {$UserLevel->team_num}
AND level_id < {$UserLevel->id};
        ";
            $res = DB::update($sql);
            dump($res.'用户升级到金卡');
        } catch (Exception $e) {
            dump('金卡升级出错:updateToGold '.$e->getMessage());
        }
    }
    
    /**
     * Description:统计下级银卡数量
     *
     * @author lidong<947714443@qq.com>
     * @date   2021/8/27 0027
     */
    public function countChildSliverNum()
    {
        try {
            $sql = "
UPDATE user_level_relation a,
( SELECT invite_id, count( id ) silver_num FROM user_level_relation WHERE level_id >= 3 GROUP BY invite_id ) b
SET a.direct_silver_num = b.silver_num
WHERE
	a.user_id = b.invite_id;";
            $res = DB::update($sql);
            dump($res.'统计下级银卡数量完成');
        } catch (Exception $e) {
            dump('统计下级银卡数量出错:countChildSliverNum '.$e->getMessage());
        }
    }
    
    /**
     * Description:统计团队银卡数量
     *
     * @author lidong<947714443@qq.com>
     * @date   2021/8/27 0027
     */
    public function countTeamSliverNum()
    {
        try {
            $sql = "
UPDATE user_level_relation t1,
(
	SELECT
		count(
		IF
		( a.level_id, 1, 0 )) AS silver_num,
		a.user_id,
		a.pid_route
	FROM
		user_level_relation a,
		( SELECT * FROM user_level_relation WHERE level_id >= 3 ) b
	WHERE
		FIND_IN_SET( a.user_id, b.pid_route )
	GROUP BY
		user_id
	) t2
	SET t1.team_silver_num = t2.silver_num
WHERE
	t1.user_id = t2.user_id";
            $res = DB::update($sql);
            dump($res.'统计团队银卡数量完成');
        } catch (Exception $e) {
            dump('统计团队银卡数量出错:countSliverNum '.$e->getMessage());
        }
    }
    
    /**
     * Description:标记银卡团队
     *
     * @author lidong<947714443@qq.com>
     * @date   2021/8/28 0028
     */
    public function markSilverId($silver_id = 3)
    {
        try {
            $sql1 = 'UPDATE user_level_relation SET silver_id = 0';
            $res1 = DB::update($sql1);
            dump($res1.'数据重置银卡ID');
            $sql = "
UPDATE user_level_relation t1,
(
	SELECT
		MAX( a.user_id ) p_pid,
		a.level_id,
		b.pid_route,
		b.silver_id,
		b.level_id b_level,
		b.user_id
	FROM
		user_level_relation a
		RIGHT JOIN user_level_relation b ON FIND_IN_SET( a.user_id, b.pid_route )
	WHERE
		a.level_id = {$silver_id}
	GROUP BY
		user_id
	) t2
	SET t1.silver_id =
IF
	( t2.p_pid > t1.silver_id, t2.p_pid, t1.silver_id )
WHERE
	t1.user_id = t2.user_id;
            ";
            $res = DB::update($sql);
            dump($res.'标记银卡团队完成');
        } catch (Exception $e) {
            dump('标记银卡团队出错:markSilverId '.$e->getMessage());
        }
    }
    
    /**
     * Description:标记金卡团队
     *
     * @param  int  $gold_id
     *
     * @author lidong<947714443@qq.com>
     * @date   2021/8/28 0028
     */
    public function markGoldId($gold_id = 4)
    {
        try {
            $sql1 = 'UPDATE user_level_relation SET gold_id = 0';
            $res1 = DB::update($sql1);
            dump($res1.'数据重置金卡团队ID');
            $sql = "
UPDATE user_level_relation t1,
(
	SELECT
		MAX( a.user_id ) p_pid,
		a.level_id,
		b.pid_route,
		b.gold_id,
		b.level_id b_level,
		b.user_id
	FROM
		user_level_relation a
		RIGHT JOIN user_level_relation b ON FIND_IN_SET( a.user_id, b.pid_route )
	WHERE
		a.level_id = {$gold_id}
	GROUP BY
		user_id
	) t2
	SET t1.gold_id = IF	( t2.p_pid > t1.gold_id, t2.p_pid, t1.silver_id )
WHERE
	t1.user_id = t2.user_id;
            ";
            $res = DB::update($sql);
            dump($res.'标记金卡团队完成');
        } catch (Exception $e) {
            dump('标记金卡团队出错:markGoldId '.$e->getMessage());
        }
    }
    
    /**
     * Description:标记钻石卡团队
     *
     * @param  int  $diamond_id
     *
     * @author lidong<947714443@qq.com>
     * @date   2021/8/28 0028
     */
    public function markDiamondId($diamond_id = 5)
    {
        try {
            $sql1 = 'UPDATE user_level_relation SET diamond_id = 0';
            $res1 = DB::update($sql1);
            dump($res1.'数据重置钻石卡团队ID');
            $sql = "
UPDATE user_level_relation t1,
(
	SELECT
		MAX( a.user_id ) p_pid,
		a.level_id,
		b.pid_route,
		b.diamond_id,
		b.level_id b_level,
		b.user_id
	FROM
		user_level_relation a
		RIGHT JOIN user_level_relation b ON FIND_IN_SET( a.user_id, b.pid_route )
	WHERE
		a.level_id = {$diamond_id}
	GROUP BY
		user_id
	) t2
	SET t1.diamond_id = IF	( t2.p_pid > t1.diamond_id, t2.p_pid, t1.silver_id )
WHERE
	t1.user_id = t2.user_id;
            ";
            $res = DB::update($sql);
            dump($res.'标记钻石卡团队完成');
        } catch (Exception $e) {
            dump('标记钻石团队出错:markDiamondId '.$e->getMessage());
        }
    }



//    /*******************************************************************************/
//    /**
//     * Description:更新实名状态
//     *
//     * @throws \Exception
//     * @author lidong<947714443@qq.com>
//     * @date 2021/8/25 0025
//     */
//    public function updateIsVerified2()
//    {
//        set_time_limit(0);
//        try {
//            $UserRelation = UserLevelRelation::noVerifiedUsers();
//            $user_ids = $UserRelation->pluck('user_id')->toArray();
//            $i = 0;
//            $j = 0;
//            do {
//                $UserList = Users::getUserList($user_ids, 100);
//                $UserRelation->each(function (&$relation_item) use ($UserList, &$j)
//                {
//                    $UserList->each(function (&$item) use (&$relation_item, &$j)
//                    {
//                        if ($relation_item->user_id == $item->id) {
//                            $relation_item->is_verified = $item->is_auth == 2 ? 1 : 0;
//                            $relation_item->save();
//                            $j++;
//                        }
//                    });
//                });
//                $i++;
//            } while (!empty($UserList));
//            dump($i);
//            dump($j);
//        } catch (Exception $e) {
//            throw $e;
//        }
//    }
}
