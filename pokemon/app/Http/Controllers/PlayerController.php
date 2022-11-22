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
}
