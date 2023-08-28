<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\RoomCategory;

class Room extends Model
{
    use HasFactory;
    protected $table ="rooms";
    protected $fillable = [
        "id",
        "room_name",
        "description",
        "image_name",
        "image_path",
        "room_category_id",
        "status",
    ];
    public function room_category()
    {
        return $this->belongsTo(RoomCategory::class,"room_category_id","id");
    }
}
