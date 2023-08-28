<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PatientResponsibilities extends Model
{
    use HasFactory;
    protected $table ="patient_responsibilities";
    protected $fillable = [
        "id",
        "heading",
        "title",
        "image_path",
        "cover_image",
        "image_name",
        "rights",
        "responsibilities",
    ];
}
