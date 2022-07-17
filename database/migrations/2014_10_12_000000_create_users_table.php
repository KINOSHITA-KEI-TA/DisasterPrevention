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
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
            //追加分
            $table->string("nickname")->nullable(true);
            $table->string("prefecture")->nullable(true);
            $table->string("city")->nullable(true);
            $table->string("ku")->nullable(true);
            $table->string("fig")->nullable(true);
            $table->foreignId('local_government_id')->constrained();
            
            // ボツ
            // $table->foreign('local_government_id')->references('id')->on('localgovernments')->onDelete('cascade');
            
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
