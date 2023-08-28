<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HealthInformation extends Model
{
    use HasFactory;

    protected $table ="health_information";

    protected $fillable = [
        'title_1',
        'info_type',
        'description_1',
        'storage_path',
        'cover_image',
        'document',
        'title_2',
        'details_2',
        'title_3',
        'details_3'
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
}
