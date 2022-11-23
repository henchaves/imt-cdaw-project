<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\{Player, CombatType};
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CombatStats>
 */
class CombatStatsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'winner_id' => Player::all()->random()->id,
            'loser_id' => Player::all()->random()->id,
            'combat_type_id' => CombatType::all()->random()->id
        ];
    }
}
