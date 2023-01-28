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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('order_id');
            $table->integer('pay_type')->comment('1:무통장입금, 2:신용,체크카드, 3:기타');
            $table->integer('status')->comment('0:결제취소, 1:입금완료, 2:결제완료, 3:환불요청');
            $table->string('detail', 300)->comment('결제 정보');
            $table->string('receipt', 300)->comment('영수증 정보');
            $table->unsignedBigInteger('total_amount')->comment('총 결제금액');
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
        Schema::dropIfExists('payments');
    }
};
