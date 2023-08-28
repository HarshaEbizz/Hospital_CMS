<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wing extends Model
{
    use HasFactory;
    protected $table ="wings";
    protected $fillable = [
        "id",
        "wing_title",
        "status"
    ];
}
