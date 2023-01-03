<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{CombatStats, CombatType, Player};

class CombatController extends Controller
{
    public function showAll() {
        return view('combats', [
            "combats" => CombatStats::all()
        ]);
    }

    public function showOneById($id) {
        return view('combat_stats', [
            "combat" => CombatStats::findOrFail($id)
        ]);
    }

    public function create($combatMode, $player1Id, $player2Id) {
        $player1_model = Player::where('id', $player1Id)->first();
        $player1_model["energies"] = $player1_model->energies()->get();
        $player2_model = Player::where('id', $player2Id)->first();

        $combat = new CombatStats();
        $combat_type_id = CombatType::where('name', $combatMode)->first()->id;
        $combat->combat_type_id = $combat_type_id;
        $combat->winner_id = $player1Id;
        $combat->loser_id = $player2Id;
        $combat->save();

        

        $view_name = 'combat_' . $combatMode;

        return view($view_name, [
            "player1" => $player1_model,
            "player2" => $player2_model,
            "combat" => $combat
        ]);
    }

    public static function update($combatId, $winnerId, $loserId) {
        $combat = CombatStats::where('id', $combatId)->first()->update([
            'winner_id' => $winnerId,
            'loser_id' => $loserId
        ]);
    }
}
