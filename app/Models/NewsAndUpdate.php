<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewsAndUpdate extends Model
{
    use HasFactory;
    protected $table ="news_and_updates";
    protected $fillable = [
        'title',
        'image_name',
        'image_path',
        'description',
        'year',
        'posted_date',
    ];
}
