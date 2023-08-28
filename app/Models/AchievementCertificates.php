<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AchievementCertificates extends Model
{
    use HasFactory;
    protected $table ="achievement_certificates";
    protected $fillable = [
        "id",
        "certificate_title",
        "image_name",
        "image_path",
        "detail",
        'order',
        'status',
    ];
}
