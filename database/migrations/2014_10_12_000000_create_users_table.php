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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('uid')->unique()->comment('아이디');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('nickname')->nullable()->comment('사용자명');
            $table->string('password');
            $table->rememberToken();
            $table->string('phone', 20)->nullable()->comment('연락처');
            $table->string('cart', 50)->nullable()->comment('장바구니 상품: json형식');
            $table->string('wishlist', 50)->nullable()->comment('찜한 상품: json형식');
            $table->string('blocked_review', 50)->nullable()->comment('차단한 후기');
            $table->char('is_deleted', 1)->default('N')->comment('탈퇴 여부');
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
        Schema::dropIfExists('users');
    }
};
