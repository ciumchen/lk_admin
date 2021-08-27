<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserLevelRelation extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_level_relation', function (Blueprint $table)
        {
            $table->id();
            $table->bigInteger('user_id')->default(0)->comment('用户id')->unique();
            $table->bigInteger('level_id')->default(0)->comment('用户等级ID')->index();
            $table->bigInteger('diamond_id')->default(0)->comment('所属钻石会员id')->index();
            $table->bigInteger('gold_id')->default(0)->comment('所属金卡会员id')->index();
            $table->bigInteger('silver_id')->default(0)->comment('所属银卡会员id')->index();
            $table->bigInteger('invite_id')->default(0)->comment('邀请人id')->index();
            $table->decimal('integral', 15)->default(0)->comment('个人账户积分');
            $table->integer('direct_num')->default(0)->comment('直推数量');
            $table->integer('direct_diamond_num')->default(0)->comment('直推钻石数量');
            $table->integer('direct_gold_num')->default(0)->comment('直推金卡数量');
            $table->integer('direct_silver_num')->default(0)->comment('直推银卡数量');
//            $table->integer('direct_type')->nullable()->default(0)->comment('直推类型');
            $table->bigInteger('direct_activity')->default(0)->comment('直推活跃度');
            $table->decimal('direct_integral', 15)->default(0)->comment('直接下级累计积分');
            $table->integer('team_num')->default(0)->comment('团队数量');
            $table->integer('team_diamond_num')->default(0)->comment('团队钻石数量');
            $table->integer('team_gold_num')->default(0)->comment('团队金卡数量');
            $table->integer('team_silver_num')->default(0)->comment('团队银卡数量');
//            $table->integer('team_type')->nullable()->default(0)->comment('团队类型');
            $table->bigInteger('team_activity')->default(0)->comment('团队活跃度');
            $table->decimal('team_integral', 15)->default(0)->comment('团队累计积分');
            $table->tinyInteger('is_verified')->default(0)->comment('是否实名认证');
            $table->tinyInteger('is_vip')->default(0)->comment('是否是会员');
            $table->string('pid_route')->default('0')->comment('邀请人id系列拼接');
            $table->tinyInteger('is_ban')->default(0)->comment('是否禁用权益');
            $table->tinyInteger('rating')->default(0)->comment('所属用户级别[和会员等级无关]');
            $table->timestamps();
        });
    }
    
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_level_relation');
    }
}
