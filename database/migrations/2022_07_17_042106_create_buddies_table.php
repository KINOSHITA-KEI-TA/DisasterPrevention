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
        Schema::create('buddies', function (Blueprint $table) {
            $table->id();
            // 未完成
            // $table->foreignId('user_id')->constrained();
            $table->foreignId('user_id')->constrained();

            // ボツ
            // $table->foreign('to_user_id')->references('id')->on('users')->onDelete('cascade');
            // $table->foreign('from_user_id')->references('id')->on('users')->onDelete('cascade');
            $table->boolean("status");
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
        Schema::dropIfExists('buddies');
    }
};
