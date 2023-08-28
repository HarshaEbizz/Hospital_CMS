<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SpecialitiesTabTopics extends Model
{
    use HasFactory;
    protected $table ="specialities_tab_topics";
    protected $fillable = [
        'specialities_id','topic_name','status',
    ];
    public function Specialities()
    {
       return $this->belongsTo('App\Models\Specialities','specialities_id','id');
    }
}
