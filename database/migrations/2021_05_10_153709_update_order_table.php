<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateOrderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('order',function (Blueprint $table){
            $table->string('pay_status',20)->nullable()->default('ddyc')->comment('支付状态：await 待支付；pending 支付处理中； succeeded 支付成功；failed 支付失败,ddyc订单异常')->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('order', function (Blueprint $table) {
            $table->dropColumn(['pay_status']);
        });
    }
}
