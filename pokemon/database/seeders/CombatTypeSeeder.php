<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CombatTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('combat_type')->insert([
            'name' => 'manual',
        ]);

        DB::table('combat_type')->insert([
            'name' => 'random',
        ]);
    }
}
