<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChairmanMessage extends Model
{
    use HasFactory;
    protected $table ="chairman_messages";
    protected $fillable = [
        "id",
        "message_heading",
        "message_sub_heading",
        "message_paragraph_1",
        "message_paragraph_2",
        "image_path",
        "message_person_photo",
        "message_signature_photo",
    ];
}
