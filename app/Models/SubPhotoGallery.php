<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class SubPhotoGallery extends Model
{
    protected $fillable = [
        'title',
        'image',
        'photo_id'
    ];

    public function photo(){
        return $this->belongsTo(PhotoGallery::class,'photo_id');
    }
}
