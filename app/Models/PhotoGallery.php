<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PhotoGallery extends Model
{
    protected $fillable = [
        "title",
        "image"
    ];

    public function subPhotos(){
        return $this->hasMany(SubPhotoGallery::class,'photo_id');
    }
}
