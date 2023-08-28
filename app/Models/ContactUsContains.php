<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactUsContains extends Model
{
    use HasFactory;

    protected $fillable = [
        'address',
        'phone_number',
        'opening_timing'
    ];
}
