<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClinicList extends Model
{
    use HasFactory;
    protected $table ="clinic_lists";
    protected $fillable = [
        "id",
        'name',
        "image_path",
        "image_name",
        "description",
        "location",
        "latitude",
        "longitude",
        "status",
    ];
}
