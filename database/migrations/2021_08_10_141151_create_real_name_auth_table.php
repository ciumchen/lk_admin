<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRealNameAuthTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('real_name_auth', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('uid')->nullable()->comment('users表 -- id');
            $table->string('name', 100)->default('')->comment('姓名');
            $table->string('num_id', 100)->default('')->comment('身份证号');
            $table->tinyInteger('status')->default('0')->comment('审核状态：0未审核，1审核通过，2审核不通过');
            $table->string('img_just',255)->nullable()->comment('身份证正面');
            $table->string('img_back',255)->nullable()->comment('身份证反面');
            $table->string('remark',100)->nullable()->comment('备注');
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
        Schema::dropIfExists('real_name_auth');
    }
}
