<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{

    protected $table = "setting";
    protected $fillable = [
        'home_video_link',
        'history_video_link',
        'mahapuja_image',
        'yagna_image',
        'address',
        'contact_number',
        'email',
        'logo',
        'description',
        'iframe_key',
    ];
    protected $hidden = [
        'created_at',
        'updated_at',
    ];
}
