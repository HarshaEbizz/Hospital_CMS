<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ManagementMessage extends Model
{
    use HasFactory;
    protected $table ="management_messages";
    protected $fillable = [
        "id",
        "name",
        "designation",
        "message",
        "expertise",
        "professional_highlights",
        "image_path",
        "image_name",
        "status",
    ];
}
