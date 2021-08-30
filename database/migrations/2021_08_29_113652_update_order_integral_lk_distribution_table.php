<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateOrderIntegralLkDistributionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('order_integral_lk_distribution',function (Blueprint $table){
            $table->unsignedDecimal('count_lk',12,2)->nullable()->default(0)->comment('lk统计')->change();
            $table->unsignedDecimal('count_profit_price',12,2)->nullable()->default(0)->comment('录单累计实际让利金额')->change();
            $table->unsignedDecimal('price_5',12,2)->nullable()->default(0)->comment('订单消费金额5%让利比例的累计')->change();
            $table->unsignedDecimal('price_10',12,2)->nullable()->default(0)->comment('订单消费金额10%让利比例的累计')->change();
            $table->unsignedDecimal('price_20',12,2)->nullable()->default(0)->comment('订单消费金额20%让利比例的累计')->change();
            $table->unsignedDecimal('other_price',12,2)->nullable()->default(0)->comment('订单消费金额其他让利比例的累计')->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
