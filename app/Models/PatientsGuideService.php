<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PatientsGuideService extends Model
{
    use HasFactory;
    protected $table ="patients_guide_services";
    protected $fillable = [
        "id",
        "heading",
        "slug",
        "title",
        "contact_no",
        "image_name",
        "image_path",
        "cover_image",
        "description",
        "sub_title",
        "details",
        "status"
    ];
}
