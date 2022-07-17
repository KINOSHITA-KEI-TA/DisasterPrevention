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
        Schema::create('family_user_hierarchies', function (Blueprint $table) {
            $table->id();
            $table->foreignId('associate_id')->constrained();
            $table->foreignId('buddy_id')->constrained();
            $table->foreignId('family_hierarchy_id')->constrained();
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
        Schema::dropIfExists('family_user_hierarchies');
    }
};
