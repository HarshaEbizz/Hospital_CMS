<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HospitalTourTimeline extends Model
{
    use HasFactory;
    protected $table ="hospital_tour_timelines";
    protected $fillable = [
        "id",
        "title",
        "description",
        "image_name",
        "image_path",
        "year",
        "color_code",
        "direction"
    ];
}
