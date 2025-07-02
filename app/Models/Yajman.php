<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Yajman extends Model
{
    protected $table = 'yajman';
    protected $fillable = [
        'name',
        'image_path',
        'event_date'
    ];
}
