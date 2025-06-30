<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Aboutus extends Model
{
    protected $table = 'about_us';

    protected $fillable = [
        'start_day',
        'end_day',
        'start_time',
        'end_time',
    ];
}

