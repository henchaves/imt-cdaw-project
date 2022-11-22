<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\{Pokemon, Player, CombatStats};
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CombatStats>
 */
class CombatRoundFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'pokemon_id' => Pokemon::all()->random()->id,
            'player_id' => Player::all()->random()->id,
            'combat_stats_id' => CombatStats::all()->random()->id,
            'order' => $this->faker->numberBetween(1, 3)
        ];
    }
}
