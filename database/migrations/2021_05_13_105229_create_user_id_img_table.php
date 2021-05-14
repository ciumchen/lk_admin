<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserIdImgTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_id_img', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('uid')->index()->comment('商户uid');
            $table->unsignedInteger('business_apply_id')->index()->comment('business_apply表的id');
            $table->string('img_just',255)->nullable()->comment('身份证正面照');
            $table->string('img_back',255)->nullable()->comment('身份证反面照');
            $table->string('img_hold',255)->nullable()->comment('身份证手持照');
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
        Schema::dropIfExists('user_id_img');
    }
}
