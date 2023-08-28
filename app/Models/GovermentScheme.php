<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GovermentScheme extends Model
{
    use HasFactory;

    protected $table ="goverment_schemes";

    protected $fillable = [
        'scheme_name',
        'scheme_note',
        'scheme_image',
        'storage_path',
        'title_1',
        'details_1',
        'title_2',
        'details_2',
        'active'
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
