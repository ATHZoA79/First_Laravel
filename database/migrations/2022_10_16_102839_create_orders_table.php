<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->integer('subtotal');  // 小計
            $table->integer('shipping_fee');  // 運費
            $table->integer('total');  // 總計
            $table->integer('product_qty');  // 單品數量
            $table->string('phone');    // 數字開頭不能為0，所以要存成字串
            $table->string('name'); // 
            $table->string('email');    // 
            $table->string('address');  // 
            $table->integer('payment'); // 付款方式以數字代替，避免因編碼不同無法顯示
            $table->integer('shipping_method'); // 同上
            $table->string('store_address');    // 取貨地址
            $table->integer('order_status');    // 訂單狀態
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
        Schema::dropIfExists('orders');
    }
};
