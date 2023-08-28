<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InternationalPatientCare extends Model
{
    use HasFactory;
    protected $table ="international_patient_cares";
    protected $fillable = [
        "id",
        'heading',
        "title",
        "image_path",
        "cover_image",
        "image_name",
        "description",
    ];
}
