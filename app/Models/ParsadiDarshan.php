<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ParsadiDarshan extends Model
{
    protected $table = 'prasadi_darshan';
     protected $fillable = [
        'name',
        'image',
        'description',
    ];
}
