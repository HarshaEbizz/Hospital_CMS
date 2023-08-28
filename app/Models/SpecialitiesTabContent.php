<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SpecialitiesTabContent extends Model
{
    use HasFactory;
    protected $table ="specialities_tab_contents";
    protected $fillable = [
        'specialities_id','tab_id','tab_content_type','split_content','tab_title','tab_details','direction','image_path','image_name','order'
    ];
    
    public function Specialities()
    {
       return $this->belongsTo('App\Models\Specialities','specialities_id','id');
    }
    public function Topic()
    {
       return $this->hasMany('App\Models\SpecialitiesTabTopics','tab_id','id');
    }
}
