<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use App\Models\{
    User,
    Player
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
        // $player->id = $user->id;
        $player->name = $data['name'];
        $player->save();

        return $user;
    }
}
