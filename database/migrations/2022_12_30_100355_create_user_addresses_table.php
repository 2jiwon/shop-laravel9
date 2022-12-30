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
        Schema::create('user_addresses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('type', 5)->default('main')->comment('main:대표배송지, sub:보조배송지');
            $table->string('name', 10)->comment('배송지명');
            $table->string('zipcode', 10)->comment('우편번호');
            $table->string('address1', 100)->comment('기본주소');
            $table->string('address2', 50)->comment('상세주소');
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
        Schema::dropIfExists('user_addresses');
    }
};
