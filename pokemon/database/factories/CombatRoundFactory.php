<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\{Pokemon, Player, CombatStats};
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CombatRound>
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
            'combat_stats_id' => CombatStats::all()->random()->id,
            'log' => $this->faker->text(100),
        ];
    }
}
