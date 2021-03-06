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
        Schema::create('d_m_s', function (Blueprint $table) {
            $table->id();
            $table->string("title");
            $table->foreignId('user_id')->constrained();

            // ぼつ
            // $table->foreign('to_user_id')->references('id')->on('users')->onDelete('cascade');
            // $table->foreign('from_user_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('d_m_s');
    }
};
