<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enquiry extends Model
{
    use HasFactory;
    protected $table ="enquiries";

    protected $fillable = [
        'help_name',
        'help_email',
        'country_code',
        'help_contact',
        'help_treatment_name',
        'help_comment',
    ];

}
