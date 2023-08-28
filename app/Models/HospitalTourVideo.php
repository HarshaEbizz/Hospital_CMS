<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HospitalTourVideo extends Model
{
    use HasFactory;
    protected $table ="hospital_tour_videos";
    protected $fillable = [
        "id",
        "heading",
        "image_name",
        "image_path",
        "object"
    ];
}
