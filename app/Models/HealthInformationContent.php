<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HealthInformationContent extends Model
{
    use HasFactory;

    protected $table ="health_information_contents";

    protected $fillable = [
        'health_information_id',
        'title_2',
        'sub_title_2',
        'details_2',
        'title_3',
        'sub_title_3',
        'details_3'
    ];

    public function Health()
    {
       return $this->belongsTo(HealthInformation::class,'health_information_id','id');
    }
}
