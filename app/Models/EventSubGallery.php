<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EventSubGallery extends Model
{

    protected $table = 'sub_event_gallery';
    protected $fillable = [
        'description',
        'image_path',
        'image_id'
    ];

    public function eventGallery(){
        return $this->belongsTo(EventGallery::class, 'image_id');
    }
}
