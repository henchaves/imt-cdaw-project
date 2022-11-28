<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasteredEnergy extends Model
{
    use HasFactory;
    protected $table = 'mastered_energy';
    public $timestamps = false;

    public function energy() {
        return $this->belongsTo(Energy::class, 'energy_id');
    }
}
