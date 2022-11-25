<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Player;

class PlayerController extends Controller
{
    public function showAll() {
        return view('players', [
            "players" => Player::all()
        ]);
    }

    public function showOneById($id) {
        $player = Player::find($id);
        // return $player->combats;
        return $this->showPlayerProfile($player);
    }

    public function showOneByName($name) {
        $player = Player::where('name', $name)->first();
        return $this->showPlayerProfile($player);
    }

    private function showPlayerProfile($player) {
        if (is_null($player)) {
            return 'Player not found!';
        }

        return view('player_profile', [
            "player" => $player
        ]);
    }
}
