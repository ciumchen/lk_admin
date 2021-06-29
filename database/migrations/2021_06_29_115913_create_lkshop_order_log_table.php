<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLkshopOrderLogTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lkshop_order_log', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('order_id')->nullable()->default(0)->comment('商户订单id');
            $table->string('type',30)->nullable()->default(0)->comment('记录类型，mch_order 商户订单');
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
        Schema::dropIfExists('lkshop_order_log');
    }
}
