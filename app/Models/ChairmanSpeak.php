<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChairmanSpeak extends Model
{
    use HasFactory;
    protected $table ="chairman_speaks";
    protected $fillable = [
        "id",
        "heading",
        "sub_heading",
        "paragraph_1",
        "paragraph_2",
        "paragraph_3",
        "image_path",
        "person_photo",
        "signature_photo",
    ];
}
