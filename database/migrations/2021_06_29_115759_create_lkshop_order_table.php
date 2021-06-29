<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLkshopOrderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lkshop_order', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('uid')->index()->comment('消费者UID');
            $table->unsignedInteger('business_uid')->index()->comment('商户UID');
            $table->unsignedDecimal('profit_ratio',6,3)->default(0)->comment('让利比列(%)');
            $table->unsignedDecimal('price',8,2)->default(0)->comment('消费金额');
            $table->unsignedDecimal('profit_price',8,2)->default(0)->comment('实际让利金额');
            $table->integer('status')->default(1)->comment('1审核中，2审核通过，3审核失败');
            $table->string('name', 64)->nullable()->comment('消费商品名');
            $table->string('order_no', 30)->nullable()->comment('商户订单号');
            $table->unsignedInteger('oid')->nullable()->comment('order 表 -- id');
            $table->string('description', 20)->nullable()->comment('订单类型：lkshop_sh 商户订单 lkshop_1688 1688订单');
            $table->string('remark', 64)->nullable()->comment('备注');
            $table->unsignedInteger('shop_order_id')->index()->comment('商城订单id');
            $table->index('oid');
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
        Schema::dropIfExists('lkshop_order');
    }
}
