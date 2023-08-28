<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;

    protected $table ="countries";
    protected $fillable = [
        'name','phonecode','capital','currency','currency_symbol','timezones','latitude','longitude',
    ];

    public function contact_us()
    {
        return $this->hasMany(ContactUs:: class, 'country_id');
    }
}
