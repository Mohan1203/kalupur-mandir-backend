<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EventGallery extends Model
{
    protected $table = 'event_gallery';

    protected $fillable = [
        'description',
        'image_path'
    ];

    public function subImages(){
        return $this->hasMany(SubPhotoGallery::class,'image_id');
    }
}
