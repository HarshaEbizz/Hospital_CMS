<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomeContent extends Model
{
    use HasFactory;
    protected $table ="home_contents";

    protected $fillable = [
        'id',
        'image_path',
        'front_iamge',
        'back_image',
        'message_iamge',
        'content',
    ];
}
