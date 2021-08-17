<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBmOrders extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bm_recharge_orders', function (Blueprint $table)
        {
            $table->id();
            $table->string('rechargeAccount', 50)->default('')->comment('充值账号');
            $table->decimal('saleAmount', 15, 2)->default(0.00)->comment('建议零售价');
            $table->decimal('orderProfit', 15, 2)->default(0.00)->comment('订单利润，单位元，保留2位小数');
            $table->dateTime('orderTime')->nullable()->comment('订单生成时间，格式：yyyy-MM-dd hh:mm:ss');
            $table->dateTime('operateTime')->nullable()->comment('	订单处理时间，格式：yyyy-MM-dd hh:mm:ss');
            $table->tinyInteger('payState')->default(0)->comment('订单付款状态 0 未付款1 已付款');
            $table->tinyInteger('rechargeState')->default(0)->comment('订单充值状态 0充值中 1成功 9撤销');
            $table->tinyInteger('classType')->default(0)->comment('商品类型：1:实物商品 2:直充商品 3:卡密商品 4:话费充值 6:支付和金币充值');
            $table->decimal('itemCost', 15, 2)->default(0.00)->comment('商品单价，单位元，保留2位小数');
            $table->decimal('orderCost', 15, 2)->default(0.00)->comment('订单成本，单位元，保留2位小数');
            $table->decimal('facePrice', 15, 2)->default(0.00)->comment('面值，单位元，保留2位小数');
            $table->text('revokeMessage')->nullable()->comment('撤销原因');
            $table->string('billId')->unique()->nullable()->comment('订单编号');
            $table->mediumInteger('itemNum')->default(0)->comment('商品数量');
            $table->string('itemName', 100)->default('')->comment('商品名称');
            $table->string('supUserId', 50)->default('')->comment('供货商编号');
            $table->string('orderTimeFull')->default('')->comment('供货商编号');
            
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
