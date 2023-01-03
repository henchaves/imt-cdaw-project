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
        Schema::create('pokemon', function (Blueprint $table) {
            $table->id();
            $table->string('name', 64);
            $table->foreignId('energy_id')->constrained('energy')->onDelete('cascade');
            $table->integer('level');
            $table->integer('max_health_points');
            $table->integer('normal_damage');
            $table->integer('special_damage');
            $table->integer('special_defense');
            $table->string('image_url');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pokemon');
    }
};
