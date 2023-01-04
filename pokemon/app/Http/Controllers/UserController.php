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

        $masteredEnergy1 = new MasteredEnergy();
        $masteredEnergy1->player_id = $user->id;
        $masteredEnergy1->energy_id = Energy::inRandomOrder()->first()->id;
        $masteredEnergy1->save();

        $masteredEnergy2 = new MasteredEnergy();
        $masteredEnergy2->player_id = $user->id;
        $masteredEnergy2->energy_id = Energy::inRandomOrder()->first()->id;
        $masteredEnergy2->save();

        $masteredEnergy3 = new MasteredEnergy();
        $masteredEnergy3->player_id = $user->id;
        $masteredEnergy3->energy_id = Energy::inRandomOrder()->first()->id;
        $masteredEnergy3->save();

        return $user;
    }
}
