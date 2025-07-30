<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SeoDetails extends Model
{

    public $table = "seo_fields";

    protected $fillable = [
        'title',
        'description',
        'schema',
        'keywords'
    ];

    public function setKeywordsAttribute($value)
    {
        if (is_array($value)) {
            $this->attributes['keywords'] = json_encode($value);
        } elseif (is_string($value)) {
            $this->attributes['keywords'] = json_encode(explode(',', $value));
        } else {
            $this->attributes['keywords'] = json_encode([]);
        }
    }

    public function getKeywordsAttribute($value)
{
    $decoded = json_decode($value, true);

    if (is_array($decoded)) {
        return array_filter(array_map(function ($keyword) {
            // Remove ALL wrapping quotes and whitespace
            return trim($keyword, " \t\n\r\0\x0B\"");
        }, $decoded));
    }

    return [];
}

}



