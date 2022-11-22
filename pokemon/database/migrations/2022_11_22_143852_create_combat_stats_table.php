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
        Schema::create('combat_stats', function (Blueprint $table) {
            $table->id();
            $table->foreignId('winner_id')->constrained('player');
            $table->foreignId('loser_id')->constrained('player');
            $table->foreignId('combat_type_id')->constrained('combat_type');
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
        Schema::dropIfExists('combat_stats');
    }
};
