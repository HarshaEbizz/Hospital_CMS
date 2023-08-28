<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $table ="events";

    protected $fillable = [
        'event_title',
        'event_type',
        'event_type',
        'event_banner',
        'form_field',
        'language_known',
        'description',
        'document',
        'mobile_no'
    ];

    public function isActivate(): bool
    {
        return (bool)$this->getAttribute('active');
    }

    public function ActivateToggle()
    {
        $this->active = !$this->active;

        return $this;
    }

    public function form_datas() {
        return $this->hasMany(EventForm::class);
    }

}
