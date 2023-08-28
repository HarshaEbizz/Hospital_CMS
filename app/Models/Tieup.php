<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tieup extends Model
{
    use HasFactory;

    protected $table ="tieups";

    protected $fillable = [
        'company_name',
        'tieup_type',
        'company_logo',
        'image_path'
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
