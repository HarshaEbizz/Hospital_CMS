<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medic extends Model
{
    use HasFactory;

    protected $table ="medics";

    protected $fillable = [
        'heading',
        'image_path',
        'cover_image',
        'title_1',
        'image_1',
        'description_1',
        'title_2',
        'image_2',
        'description_2'
    ];
}
