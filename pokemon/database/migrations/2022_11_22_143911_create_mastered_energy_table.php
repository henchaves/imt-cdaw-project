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
        Schema::create('mastered_energy', function (Blueprint $table) {
            $table->id();
            $table->foreignId('player_id')->constrained('player')->onDelete('cascade');
            $table->foreignId('energy_id')->constrained('energy')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mastered_energy');
    }
};
