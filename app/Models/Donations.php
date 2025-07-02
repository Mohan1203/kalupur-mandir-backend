<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Donations extends Model
{
    //
    protected $table = 'donations';

    protected $fillable = [
        'name',
        'email',
        'phone',
        'address',
        'country',
        'state',
        'city',
        'pincode',
        'amount',
        'mandir',
        'donation_type',
        'pan_number',
        'note'
    ];
}

