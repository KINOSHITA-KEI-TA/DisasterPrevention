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
    Schema::create('reply_messages', function (Blueprint $table) {
        $table->id();
        $table->foreignId('topic_id')->constrained('topics')->onDelete('cascade');
        $table->foreignId('message_id')->constrained('topic_messages')->onDelete('cascade');
        $table->foreignId('reply_id')->constrained('topic_messages');
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
        Schema::dropIfExists('reply_messages');
    }
};
