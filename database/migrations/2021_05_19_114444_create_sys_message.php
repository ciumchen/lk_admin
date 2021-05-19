<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSysMessage extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sys_message', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->id();
            $table->unsignedInteger('type')->nullable()->comment('消息类型：1 单个用户, 2 所有用户, 3 所有商家, 4 所有盟主, 5 所有站长');
            $table->string('user_id', 30)->nullable()->comment('users表 -- id');
            $table->unsignedInteger('status')->comment('消息状态：1 成功；0 失败');
            $table->string('title')->comment('消息标题');
            $table->longText('content')->comment('消息内容');
            $table->timestamp('created_at')->nullable()->comment('创建时间');
            $table->timestamp('updated_at')->nullable()->comment('更新时间');
            $table->timestamp('deleted_at')->nullable()->comment('删除时间');

            $table->index(['user_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sys_message');
    }
}
