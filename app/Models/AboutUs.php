<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AboutUs extends Model
{
    use HasFactory;
    protected $table ="about_us";
    protected $fillable = [
        'top_heading','bottom_heading','bottom_sub_heading','bottom_banner_status','image_path','top_cover_image','bottom_cover_image',
    ];
}
