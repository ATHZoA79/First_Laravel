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
        Schema::table('orders', function (Blueprint $table) {
            $table->integer('subtotal')->nullable()->change();  // 小計
            $table->integer('shipping_fee')->nullable()->change();  // 運費
            $table->integer('total')->nullable()->change();  // 總計
            $table->integer('product_qty')->nullable()->change();  // 單品數量
            $table->string('phone')->nullable()->change();    // 數字開頭不能為0，所以要存成字串
            $table->string('name')->nullable()->change(); // 
            $table->string('email')->nullable()->change();    // 
            $table->string('address')->nullable()->change();  // 
            $table->integer('payment')->nullable()->change(); // 付款方式以數字代替，避免因編碼不同無法顯示
            $table->integer('shipping_method')->nullable()->change(); // 同上
            $table->string('store_address')->nullable()->change();    // 取貨地址
            $table->integer('order_status')->nullable()->change();    // 訂單狀態
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('orders', function (Blueprint $table) {
            //
        });
    }
};
