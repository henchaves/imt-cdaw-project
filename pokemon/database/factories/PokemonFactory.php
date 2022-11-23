<?php

namespace Database\Factories;

use \App\Models\Energy;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pokemon>
 */
class PokemonFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->unique()->word,
            'energy_id' => Energy::all()->random()->id,
            'level' => $this->faker->numberBetween(1, 10),
            'max_health_points' => $this->faker->numberBetween(50, 100),
            'normal_damage' => $this->faker->numberBetween(1, 10),
            'special_damage' => $this->faker->numberBetween(10, 50),
            'special_defense' => $this->faker->numberBetween(1, 50),
            'image_url' => $this->faker->imageUrl(640,480)
        ];
    }
}
