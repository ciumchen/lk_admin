<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserLevel extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_level', function (Blueprint $table)
        {
            $table->id();
            $table->string('title', 20)->default('')->comment('等级头衔');
            $table->mediumInteger('level')->default(0)->comment('会员等级');
            $table->integer('sort')->nullable()->default(0)->comment('排序');
            $table->decimal('promotion_rewards_ratio', 6)->default(0.00)->comment('直推奖励比例');
            $table->decimal('same_level_rewards_ratio', 6)->default(0.00)->comment('平级奖励比例');
            $table->decimal('weighted_equally_rewards_ratio', 6)->default(0.00)->comment('加权平分奖励比例');
            $table->decimal('self_integral', 15)->default(0.00)->comment('自身积分数量');
            $table->mediumInteger('direct_num')->default(0)->comment('直推数量');
            $table->bigInteger('direct_type')->nullable()->default(0)->comment('直推类型');
            $table->bigInteger('direct_activity')->default(0)->comment('直推活跃度');
            $table->decimal('direct_integral', 15)->default(0)->comment('直接下级累计积分');
            $table->mediumInteger('team_num')->default(0)->comment('团队数量');
            $table->bigInteger('team_type')->nullable()->default(0)->comment('团队类型');
            $table->bigInteger('team_activity')->default(0)->comment('团队活跃度');
            $table->decimal('team_integral', 15)->default(0)->comment('团队累计积分');
            $table->tinyInteger('is_auto_update')->default(1)->comment('是否自动升级');
            $table->tinyInteger('is_verified')->default(0)->comment('是否实名认证');
            $table->timestamps();
        });
        DB::statement('ALTER TABLE `user_level` comment "等级信息表";');
    }
    
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_level');
    }
}
