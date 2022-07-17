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
        Schema::create('associates', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            //未完成
            // $table->foreignId('user_id')->constrained();
            $table->foreignId('family_hierarchy_id')->constrained();

            // ボツ
            // $table->foreign('parent_user_id')->references('id')->on('users')->onDelete('cascade');
            // $table->foreign('child_user_id')->references('id')->on('users')->onDelete('cascade');
            // $table->foreign('family_hierarchy_id')->references('id')->on('family_hierarchies')->onDelete('cascade');
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
        Schema::dropIfExists('associates');
    }
};
