<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VisitingHours extends Model
{
    use HasFactory;
    protected $table ="visiting_hours";
    protected $fillable = [
        "id",
        "heading",
        "title",
        "image_path",
        "cover_image",
        "note",
        "morning_timing",
        "eveining_timimg",
    ];
}

