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

    public function getAll() {
        // return as JSON
        $players = Player::all();
        return response()->json($players);
    }

    public function getOneByName($name) {
        // return as JSON
        $player = Player::where('name', $name)->first();
        return response()->json($player);
    }

    public function getOneById($id) {
        $player = Player::find($id);
        $energies = [];
        foreach ($player->energies as $energy) {
            $energies[] = $energy->energy;
        }
        
        $player["energies"] = $energies;
        return response()->json($player);
    }
}
