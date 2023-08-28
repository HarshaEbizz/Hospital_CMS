<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VisionAndMission extends Model
{
    use HasFactory;
    protected $table ="vision_and_missions";
    protected $fillable = [
        "id",
        "title",
        "description",
        "color_code",
        "image_path",
        "image_name",
        "status",
    ];
}
