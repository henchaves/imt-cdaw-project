<?php

namespace Tests\Feature;

use App\Models\Player;
use Database\Seeders\EnergySeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PlayerTest extends TestCase
{   
    use RefreshDatabase;

    /**
     * A basic feature test example.
     *
     * @return void
     */

    public function test_the_players_table_is_empty_before_create_any_player() {
        $this->assertDatabaseCount('player', 0);
    }

    public function test_create_and_delete_a_player_successfully()
    {
        $this->seed(EnergySeeder::class);

        $user = Player::factory()->create();

        $this->assertModelExists($user);
        $this->assertDatabaseCount('player', 1);

        $user->delete();

        $this->assertModelMissing($user);
    }

    public function test_create_multiple_players() {
        $this->seed(EnergySeeder::class);
        $user1 = Player::factory()->create();
        $user2 = Player::factory()->create();
        $user3 = Player::factory()->create();

        $this->assertModelExists($user1);
        $this->assertModelExists($user2);
        $this->assertModelExists($user3);

        $this->assertDatabaseCount('player', 3);
    }
}
