<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InternationalPatientCareTopic extends Model
{
    use HasFactory;
    protected $table ="international_patient_care_topics";
    protected $fillable = [
        "id",
        'topic',
        "details",
        "status",
    ];
}
