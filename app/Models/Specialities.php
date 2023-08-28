<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use  \Illuminate\Support\Str;

class Specialities extends Model
{
    use HasFactory;
    protected $table ="specialities";
    protected $fillable = [
        'name','slug','banner_text','description','image_path','top_cover_image','bottom_cover_image','bottom_banner_status','is_show'
    ];
    // public function setSlugAttribute($title){
    //     $this->attributes['slug'] = $this->uniqueSlug($title);
    // }

    public function Content()
    {
       return $this->hasMany('App\Models\SpecialitiesContent','specialities_id','id');
    }
    public function Topic()
    {
       return $this->hasMany('App\Models\SpecialitiesTabTopics','specialities_id','id');
    }
    public function Tabcontent()
    {
       return $this->hasMany('App\Models\SpecialitiesTabContent','specialities_id','id');
    }
}
