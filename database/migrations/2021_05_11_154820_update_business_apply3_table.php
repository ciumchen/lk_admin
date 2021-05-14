<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateBusinessApply3Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('business_apply',function (Blueprint $table){
            $table->dropColumn('img_details');
            $table->string('img_details1',255)->nullable()->comment('商户详情照1');
            $table->string('img_details2',255)->nullable()->comment('商户详情照2');
            $table->string('img_details3',255)->nullable()->comment('商户详情照3');

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
            $table->dropColumn(['img_details1']);
            $table->dropColumn(['img_details2']);
            $table->dropColumn(['img_details3']);
        });
    }
}
