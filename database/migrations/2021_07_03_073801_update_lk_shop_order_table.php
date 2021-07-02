<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateLkShopOrderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('lkshop_order',function (Blueprint $table){
            $table->unsignedInteger('is_confirm')->nullable()->default(1)->comment('确认收货状态：0=未确认，1=已确认收货');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('lkshop_order', function (Blueprint $table) {
            $table->dropColumn(['is_confirm']);
        });
    }
}
