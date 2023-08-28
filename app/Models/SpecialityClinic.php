<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SpecialityClinic extends Model
{
    use HasFactory;
    protected $table ="speciality_clinics";
    protected $fillable = [
        "id",
        'heading',
        "title",
        "cover_image",
        "image_path",
        "description",
    ];
}
