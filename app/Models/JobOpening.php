<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobOpening extends Model
{
    use HasFactory;
    protected $table ="job_openings";
    protected $fillable = [
        "id",
        'recuirement_dept',
        'department_name',
        'slug',
        'designation',
        'location',
        'opening',
        'experience',
        "qualification",
        "description",
        "status",
    ];
}
