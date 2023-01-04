<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use App\Models\{
    User,
    Player,
    Energy,
    MasteredEnergy
};

class UserController extends Controller
{
    public static function create($data)
    {
        $user = new User();
        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->password = Hash::make($data['password']);
        $user->save();

        $player = new Player();
        $player->name = $data['name'];
        $player->save();

        for($i = 0; $i < 3; $i++) {
            $masteredEnergy = new MasteredEnergy();
            $masteredEnergy->player_id = $user->id;
            $masteredEnergy->energy_id = Energy::inRandomOrder()->first()->id;
            $masteredEnergy->save();
        }

        return $user;
    }
}
