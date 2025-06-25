<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Acharya extends Model
{
    protected $fillable=[
        'name',
        'image',
        'description',
        'is_current_acharya'
    ];
}
