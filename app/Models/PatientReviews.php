<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PatientReviews extends Model
{
    use HasFactory;
    protected $table ="patient_reviews";
    protected $fillable = [
        'feedback_type','first_name','last_name','speciality_id','rating','video_id','thumb_image','video_url','image_path','image_name','message','status'
    ];
    
    public function Specialities()
    {
       return $this->belongsTo('App\Models\Specialities','speciality_id','id');
    }
}
