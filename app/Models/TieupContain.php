<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TieupContain extends Model
{
    use HasFactory;

    protected $table ="tieup_contains";

    protected $fillable = [
        'contain_for',
        'title',
        'note'
    ];
}
