<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pokemon;

class PokemonController extends Controller
{
    public function showAll() {
        return view('pokemons')->with('pokemons', Pokemon::all());
    }

    public static function getPokemonsByEnergyId($energyId) {
        // return as array of Pokemon objects
        $pokemons = Pokemon::where('energy_id', $energyId)->get();
        return Pokemon::where('energy_id', $energyId)->get()->toArray();

    }

    public static function getPokemonsByMasteredEnergies($masteredEnergies) {
        $pokemons = [];
        foreach ($masteredEnergies as $energy) {
            $pokemons = array_merge($pokemons, PokemonController::getPokemonsByEnergyId($energy->energy_id));
        }
        return $pokemons;
    }
}
