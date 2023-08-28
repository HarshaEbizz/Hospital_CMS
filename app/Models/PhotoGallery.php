<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PhotoGallery extends Model
{
    use HasFactory;
    protected $table ="photo_galleries";
    protected $fillable = [
        "id",
        "name",
        "slug",
        "description",
        "date",
        "image_path",
        "cover_image",
        "image_object",
        "status",
    ];
    public function Images()
    {
       return $this->hasMany('App\Models\PhotoGalleryImages','gallery_id','id');
    }

}
