<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PhotoGalleryImages extends Model
{
    use HasFactory;
    protected $table ="photo_gallery_images";
    protected $fillable = [
        "id",
        "gallery_id",
        "name",
        "size",
        "path",
    ];
    public function PhotoGallery()
    {
        return $this->belongsTo('App\Models\PhotoGallery','gallery_id', 'id');
    }
}
