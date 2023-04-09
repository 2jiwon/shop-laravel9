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
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('user_address_id');
            $table->unsignedBigInteger('payments_id');
            $table->integer('status')->default(1)->comment('0:취소, 1:주문완료, 2:상품준비중, 3:배송시작, 4:배송중, 5:배송완료, 6:구매확정');
            $table->string('products', 30)->comment('구매한 상품: json형식');
            $table->string('quantities', 30)->comment('구매한 상품 갯수: json형식');
            $table->unsignedBigInteger('total_price')->comment('총 상품금액');
            $table->unsignedBigInteger('delivery_fee')->comment('배송비');
            $table->unsignedBigInteger('total_amount')->comment('총 주문금액');
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
