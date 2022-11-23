<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CombatType extends Model
{
    use HasFactory;
    protected $table = 'combat_type';
    public $timestamps = false;
}
