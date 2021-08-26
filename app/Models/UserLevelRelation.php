<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\UserLevelRelation
 *
 * @mixin \Eloquent
 * @property int $id
 * @property int $user_id 用户id
 * @property int $level_id 用户等级ID
 * @property int $diamond_id 所属钻石会员id
 * @property int $gold_id 所属金卡会员id
 * @property int $silver_id 所属银卡会员id
 * @property int $invite_id 邀请人id
 * @property string $integral 个人账户积分
 * @property int $direct_num 直推数量
 * @property int|null $direct_type 直推类型
 * @property int $direct_activity 直推活跃度
 * @property string $direct_integral 直接下级累计积分
 * @property int $team_num 团队数量
 * @property int|null $team_type 团队类型
 * @property int $team_activity 团队活跃度
 * @property string $team_integral 团队累计积分
 * @property int $is_verified 是否实名认证
 * @property string $pid_route 邀请人id系列拼接
 * @property int $is_ban 是否禁用权益
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static Builder|UserLevelRelation whereCreatedAt($value)
 * @method static Builder|UserLevelRelation whereDiamondId($value)
 * @method static Builder|UserLevelRelation whereDirectActivity($value)
 * @method static Builder|UserLevelRelation whereDirectIntegral($value)
 * @method static Builder|UserLevelRelation whereDirectNum($value)
 * @method static Builder|UserLevelRelation whereDirectType($value)
 * @method static Builder|UserLevelRelation whereGoldId($value)
 * @method static Builder|UserLevelRelation whereId($value)
 * @method static Builder|UserLevelRelation whereIntegral($value)
 * @method static Builder|UserLevelRelation whereInviteId($value)
 * @method static Builder|UserLevelRelation whereIsBan($value)
 * @method static Builder|UserLevelRelation whereIsVerified($value)
 * @method static Builder|UserLevelRelation whereLevelId($value)
 * @method static Builder|UserLevelRelation wherePidRoute($value)
 * @method static Builder|UserLevelRelation whereSilverId($value)
 * @method static Builder|UserLevelRelation whereTeamActivity($value)
 * @method static Builder|UserLevelRelation whereTeamIntegral($value)
 * @method static Builder|UserLevelRelation whereTeamNum($value)
 * @method static Builder|UserLevelRelation whereTeamType($value)
 * @method static Builder|UserLevelRelation whereUpdatedAt($value)
 * @method static Builder|UserLevelRelation whereUserId($value)
 * @method static Builder|UserLevelRelation newModelQuery()
 * @method static Builder|UserLevelRelation newQuery()
 * @method static Builder|UserLevelRelation query()
 */
class UserLevelRelation extends Model
{
    use HasFactory;
    
    protected $table = 'user_level_relation';
    
    /**
     * Description:获取所有已有关系的用户ID
     *
     * @return array
     * @author lidong<947714443@qq.com>
     * @date 2021/8/23 0023
     */
    public static function relationUsersIds()
    : array
    {
        return UserLevelRelation::all()->pluck('user_id')->toArray();
    }
    
    /**
     * Description:
     *
     * @return \App\Models\UserLevelRelation[]|\Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection
     * @author lidong<947714443@qq.com>
     * @date 2021/8/25 0025
     */
    public static function noVerifiedUsers()
    {
        return UserLevelRelation::whereIsVerified(0)->get();
    }
}
