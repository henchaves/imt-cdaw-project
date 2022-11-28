<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CombatStats;

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
}
