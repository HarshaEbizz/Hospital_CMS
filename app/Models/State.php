<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    use HasFactory;
    protected $table ="states";
    protected $fillable = [
        'name','country_id','country_code','latitude','longitude',
    ];

    public function contact_us()
    {
        return $this->hasMany(ContactUs:: class, 'state_id');
    }
}
