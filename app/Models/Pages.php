<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pages extends Model
{
    protected $fillable = [
        'cookie_policy',
        'privacy_policy',
        'terms_and_conditions'
    ];
}
