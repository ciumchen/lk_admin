<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddBusinessApplyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('business_data',function (Blueprint $table){
            $table->unsignedInteger('business_apply_id')->comment('business_apply表的id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('business_data', function (Blueprint $table) {
            $table->dropColumn(['business_apply_id']);
        });
    }
}
