<?php

namespace App\Models;

use Dcat\Admin\Traits\HasDateTimeFormatter;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\UserLevel
 *
 * @property int $id
 * @property string $title                          等级头衔
 * @property int $level                          会员等级
 * @property int $sort                           排序
 * @property string $promotion_rewards_ratio        直推奖励比例
 * @property string $same_level_rewards_ratio       平级奖励比例
 * @property string $weighted_equally_rewards_ratio 加权平分奖励比例
 * @property string $self_integral                  自身积分数量
 * @property int $direct_num                     直推数量
 * @property int $direct_type                    直推类型
 * @property int $direct_activity                直推活跃度
 * @property string $direct_integral                直接下级累计积分
 * @property int $team_num                       团队数量
 * @property int $team_type                      团队类型
 * @property int $team_activity                  团队活跃度
 * @property string $team_integral                  团队累计积分
 * @property int $is_auto_update                 是否自动升级
 * @property int $is_verified                    是否实名认证
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static Builder|UserLevel newModelQuery()
 * @method static Builder|UserLevel newQuery()
 * @method static Builder|UserLevel query()
 * @method static Builder|UserLevel whereCreatedAt($value)
 * @method static Builder|UserLevel whereDirectActivity($value)
 * @method static Builder|UserLevel whereDirectIntegral($value)
 * @method static Builder|UserLevel whereDirectNum($value)
 * @method static Builder|UserLevel whereDirectType($value)
 * @method static Builder|UserLevel whereId($value)
 * @method static Builder|UserLevel whereIsAutoUpdate($value)
 * @method static Builder|UserLevel whereIsVerified($value)
 * @method static Builder|UserLevel whereLevel($value)
 * @method static Builder|UserLevel wherePromotionRewardsRatio($value)
 * @method static Builder|UserLevel whereSameLevelRewardsRatio($value)
 * @method static Builder|UserLevel whereSelfIntegral($value)
 * @method static Builder|UserLevel whereSort($value)
 * @method static Builder|UserLevel whereTeamActivity($value)
 * @method static Builder|UserLevel whereTeamIntegral($value)
 * @method static Builder|UserLevel whereTeamNum($value)
 * @method static Builder|UserLevel whereTeamType($value)
 * @method static Builder|UserLevel whereTitle($value)
 * @method static Builder|UserLevel whereUpdatedAt($value)
 * @method static Builder|UserLevel whereWeightedEquallyRewardsRatio($value)
 * @mixin \Eloquent
 */
class UserLevel extends Model
{
    use HasDateTimeFormatter;
    
    protected $table = 'user_level';
    
    /**
     * Description:
     *
     * @return array
     * @author lidong<947714443@qq.com>
     * @date   2021/8/19 0019
     */
    public static function getLevelsArray()
    : array
    {
        $total = UserLevel::count('id');
        $levels = ['0' => '0'];
        for ($i = 1; $i <= $total; $i++) {
            $levels[ $i ] = $i;
        }
        return $levels;
    }
    
    public static function getTypesArray()
    {
        $types_arr = [];
        UserLevel::all()->each(function (&$item) use (&$types_arr)
        {
            $types_arr[ $item->id ] = $item->name;
        });
        return $types_arr;
    }
}
