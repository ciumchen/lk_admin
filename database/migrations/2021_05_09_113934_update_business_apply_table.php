<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateBusinessApplyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('business_apply',function (Blueprint $table){
            $table->string('img_just',255)->nullable()->comment('身份证正面照')->change();
            $table->string('img_back',255)->nullable()->comment('身份证反面照')->change();
            $table->string('img_hold',255)->nullable()->comment('身份证手持照')->change();
            $table->string('img_details',255)->nullable()->comment('身份证详情照')->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('business_apply', function (Blueprint $table) {
            $table->dropColumn(['img_just']);
            $table->dropColumn(['img_back']);
            $table->dropColumn(['img_hold']);
            $table->dropColumn(['img_details']);
        });
    }
}
