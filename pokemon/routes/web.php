<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\{
  CombatController, 
  HomeController, 
  PlayerController, 
  PokemonController,
  LoginController,
  PlayController
};

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// HomeController
Route::get('/', [HomeController::class, 'show']);

// PlayerController
Route::get('/players', [PlayerController::class, 'showAll']);
Route::get('/players/{id}', [PlayerController::class, 'showOneById'])->where('id', '[0-9]+');
Route::get('/players/{name}', [PlayerController::class, 'showOneByName']);

// PokemonController
Route::get('/pokemons', [PokemonController::class, 'showAll']);

//CombatController
Route::get('/combats', [CombatController::class, 'showAll']);
Route::get('/combats/{id}', [CombatController::class, 'showOneById'])->where('id', '[0-9]+');

Route::get('/combat/{combatMode}/{player1Id}/{player2Id}', [CombatController::class, 'create']);

//Login
Route::get('/login', function() {
  return view('login');
})->name('login');

//How To Play
Route::get('/howtoplay', function() {
  return view('how_to_play');
});

// Play (Authenticated)
Route::get('/play', [PlayController::class, 'index']);

