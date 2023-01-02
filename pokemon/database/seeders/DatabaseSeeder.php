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
        $this->call([
            EnergySeeder::class,
            PokemonSeeder::class,
            UserSeeder::class,
            // PlayerSeeder::class,
            CombatTypeSeeder::class,
            CombatStatsSeeder::class,
            CombatRoundSeeder::class,
            MasteredEnergySeeder::class,
        ]);
    }
}
