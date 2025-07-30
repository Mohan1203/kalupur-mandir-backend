<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PoojaBooking extends Model
{
    public $fillable = [
        "first_name",
        "last_name",
        "village",
        "location",
        "phone_number",
        "way_of_contact",
        "booking_date"
    ];
}
