<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DoAndDonts extends Model
{
    use HasFactory;
    protected $table ="do_and_donts";
    protected $fillable = [
        "id",
        "heading",
        "title",
        "image_path",
        "cover_image",
        "do",
        "donts",
        "status",
    ];
    public function Content()
    {
       return $this->hasMany('App\Models\DoAndDontsContent','do_and_donts_id','id');
    }
}
