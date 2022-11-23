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
        Schema::create('combat_round', function (Blueprint $table) {
            $table->id();
            $table->foreignId('combat_stats_id')->constrained('combat_stats');
            $table->foreignId('pokemon_id')->constrained('pokemon');
            $table->foreignId('player_id')->constrained('player');
            $table->integer('order');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('combat_round');
    }
};
