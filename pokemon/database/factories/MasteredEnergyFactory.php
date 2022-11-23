<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\{Energy, Player};
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\MasteredEnergy>
 */
class MasteredEnergyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'energy_id' => Energy::all()->random()->id,
            'player_id' => Player::all()->random()->id
        ];
    }
}
