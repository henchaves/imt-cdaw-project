<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        EnergySeeder::run();
        PokemonSeeder::run();
        PlayerSeeder::run();
        CombatTypeSeeder::run();
        CombatStatsSeeder::run();
        CombatRoundSeeder::run();
        MasteredEnergySeeder::run();
    }
}
