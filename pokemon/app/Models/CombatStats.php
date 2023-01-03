<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CombatStats extends Model
{
    use HasFactory;
    protected $table = 'combat_stats';
    protected $fillable = ['winner_id', 'loser_id'];

    public function rounds() {
        return $this->hasMany(CombatRound::class, 'combat_stats_id');
    }

    public function combat_type() {
        return $this->belongsTo(CombatType::class, 'combat_type_id');
    }

    public function winner() {
        return $this->belongsTo(Player::class, 'winner_id');
    }

    public function loser() {
        return $this->belongsTo(Player::class, 'loser_id');
    }

    public function players() {
        return $this->hasMany(Player::class, 'id', 'winner_id')->union($this->hasMany(Player::class, 'id', 'loser_id'));
    }

}
