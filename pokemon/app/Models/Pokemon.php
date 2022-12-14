<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pokemon extends Model
{
    use HasFactory;
    protected $table = 'pokemon';
    public $timestamps = false;

    public function energy()
    {
        return $this->belongsTo(Energy::class);
    }
}
