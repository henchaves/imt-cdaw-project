<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Http\Controllers\UserController;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        UserController::create([
            'name' => 'ash',
            'email' => 'ash@email.com',
            'password' => 'password',
        ]);

        UserController::create([
            'name' => 'misty',
            'email' => 'misty@email.com',
            'password' => 'password'
        ]);
    }
}
