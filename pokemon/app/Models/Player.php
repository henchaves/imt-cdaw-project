<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    use HasFactory;
    protected $table = 'player';
    public $timestamps = false;

    protected $attributes = [
        'level' => 0,
        'victories' => 0
    ];


    public function combats() {
        $wins = $this->hasMany(CombatStats::class, 'winner_id');
        $loses = $this->hasMany(CombatStats::class, 'loser_id');
        $combats = $wins->union($loses);
        return $combats;
    }

    public function energies() {
        return $this->hasMany(MasteredEnergy::class, 'player_id');
    }
}
