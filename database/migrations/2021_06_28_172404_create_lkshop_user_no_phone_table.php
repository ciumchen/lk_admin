<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLkshopUserNoPhoneTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lkshop_user_no_phone', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('user_id')->nullable()->default(0)->comment('lk商城用户id');
            $table->string('type',30)->nullable()->default(0)->comment('记录类型，no_phone 没有绑定手机号');
            $table->unsignedInteger('status')->nullable()->default(0)->comment('状态：1 开启；0 关闭');
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
        Schema::dropIfExists('lkshop_user_no_phone');
    }
}
