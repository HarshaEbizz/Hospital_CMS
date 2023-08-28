<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventForm extends Model
{
    use HasFactory;

    protected $table ="event_forms";

    protected $fillable = [
        'event_id',
        'form_data'
    ];

    public function event()
    {
        return $this->belongsTo(Event::class);
    }
}
