<?php

namespace Database\Seeders;

use App\Models\Energy;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class EnergySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json = Storage::disk('local')->get('public/energies.json');
        $energies = json_decode($json, true);

        foreach ($energies as $energy) {
            Energy::create([
                'name' => $energy,
            ]);
        }
    }
}
