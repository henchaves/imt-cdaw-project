<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pokemon;

class PokemonController extends Controller
{
    public function showAll() {
        return view('pokemons')->with('pokemons', Pokemon::all());
    }
}
