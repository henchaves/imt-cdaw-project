<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\{
    LoginController,
    PlayerController
  };

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

// Check if email exists in database
Route::get('/checkemail/{email}', [LoginController::class, 'checkEmail'])->where('email', '[a-zA-Z0-9@.]+');

Route::get('/checktoken/{token}', [LoginController::class, 'checkToken']);

// Authenticate
Route::post('/authenticate', [LoginController::class, 'authenticate']);

// Register
Route::post('/register', [LoginController::class, 'register']);

// Logout
Route::get('/logout/{token}', [LoginController::class, 'logout']);

// Player
Route::get('/players', [PlayerController::class, 'getAll']);
Route::get('/players/{id}', [PlayerController::class, 'getOneById'])->where('id', '[0-9]+');
Route::get('/players/{name}', [PlayerController::class, 'getOneByName']);




