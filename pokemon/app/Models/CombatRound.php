<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CombatRound extends Model
{
    use HasFactory;
    protected $table = 'combat_round';

    public function pokemon() {
        return $this->belongsTo(Pokemon::class, 'pokemon_id');
    }
}
