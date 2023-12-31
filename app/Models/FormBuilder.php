<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormBuilder extends Model
{
    use HasFactory;

    protected $table ="form_builders";

    protected $fillable = [
        'form_name',
        'form_details'
    ];
}
