<?php

namespace Database\Seeders;

use App\Models\{Pokemon, Energy};
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class PokemonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json = Storage::disk('local')->get('public/pokemons.json');
        $pokemons = json_decode($json, true);

        foreach ($pokemons as $pokemon) {
            Pokemon::create(
                [
                    "name" => $pokemon["name"],
                    "energy_id" => Energy::all()->random()->id,
                    "level" => rand(1, 10),
                    "max_health_points" => rand(50, 100),
                    "normal_damage" => rand(1, 10),
                    "special_damage" => rand(10, 50),
                    "special_defense" => rand(1, 50),
                    "image_url" => $pokemon["url"]
                ]
                );
        }
    }
}
