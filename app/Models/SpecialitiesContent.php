<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SpecialitiesContent extends Model
{
    use HasFactory;
    protected $table ="specialities_contents";
    protected $fillable = [
        'specialities_id','content_type','title','details','direction','image_path','image_name',
    ];
    
    public function Specialities()
    {
       return $this->belongsTo('App\Models\Specialities','specialities_id','id');
    }
}
