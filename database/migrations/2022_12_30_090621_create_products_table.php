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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100)->comment('상품명');
            $table->text('detail')->nullable()->comment('상세설명');
            $table->integer('stock_amount')->default(0)->comment('재고 수량');
            $table->integer('supply_price')->default(0)->comment('공급가');
            $table->integer('selling_price')->default(0)->comment('판매가');
            $table->integer('delivery_fee')->default(0)->comment('배송비');
            //$table->integer('discount_rate')->default(0)->comment('할인률');
            $table->string('category', 50)->nullable()->comment('카테고리 정보: json형식');
            $table->char('is_selling', 1)->default('Y')->comment('판매여부');
            $table->char('is_displaying', 1)->default('Y')->comment('진열여부');
            $table->unsignedBigInteger('discount_id')->nullable()->comment('할인테이블 id');
            $table->unsignedTinyInteger('order_cnt')->nullable()->comment('주문카운트');
            $table->unsignedBigInteger('view_cnt')->nullable()->comment('조회수');
            $table->timestamp('latest_order')->nullable()->comment('최근 주문일시');
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
        Schema::dropIfExists('products');
    }
};
