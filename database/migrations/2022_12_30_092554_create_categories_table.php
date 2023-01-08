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
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('type', 5)->comment('main, sub1, sub2, sub3');
            $table->string('code', 5)->comment('카테고리 코드');
            $table->string('parent', 5)->nullable()->comment('부모 카테고리 코드');
            $table->integer('order')->nullable()->comment('표시 순서');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categories');
    }
};
