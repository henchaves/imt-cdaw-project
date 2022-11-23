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

}
