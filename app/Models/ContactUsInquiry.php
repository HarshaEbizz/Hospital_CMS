<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactUsInquiry extends Model
{
    use HasFactory;

    protected $table ="contact_us_inquiries";

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'country_code',
        'mobile_no',
        'address',
        'country_id',
        'state_id',
        'your_question',
        'speciality_id',
        'reports_file'
    ];

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function state()
    {
        return $this->belongsTo(State::class);
    }

    public function speciality()
    {
        return $this->belongsTo(Specialities::class);
    }
}
