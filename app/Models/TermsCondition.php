<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TermsCondition extends Model
{
    use HasFactory;
    protected $table ="terms_conditions";
    protected $fillable = [
        "id",
        "title",
        "sub_title",
        "description",
        "is_show"
    ];

}