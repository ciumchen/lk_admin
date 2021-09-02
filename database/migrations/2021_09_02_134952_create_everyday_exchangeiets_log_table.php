<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEverydayExchangeietsLogTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('everyday_exchangeiets_log', function (Blueprint $table)
        {
            $table->id();
            $table->string('day',20)->default('')->comment('日期')->index();
            $table->string('type',20)->default('')->comment('类型');
            $table->tinyInteger('status')->default(0)->comment('状态');
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
        Schema::dropIfExists('bm_recharge_orders');
    }
}
