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

        $combats = [];

        for($i = 0; $i < count($player->combat_wins); $i++) {
            $combat = $player->combat_wins[$i];
            $combat["is_winner"] = true;
            $combat["opponent"] = $combat->loser;
            $combats[] = $combat;
        }

        $player["victories"] = count($player->combat_wins);
        $player["level"] = intval($player->victories/10) + 1;

        for($i = 0; $i < count($player->combat_loses); $i++) {
            $combat = $player->combat_loses[$i];
            $combat["is_winner"] = false;
            $combat["opponent"] = $combat->winner;
            $combats[] = $combat;
        }

        usort($combats, function($a, $b) {
            return strtotime($b->created_at) - strtotime($a->created_at);
        });
        $player["combats"] = $combats;
        return response()->json($player);
    }
}
