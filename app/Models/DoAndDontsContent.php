<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DoAndDontsContent extends Model
{
    use HasFactory;
    protected $table ="do_and_donts_contents";
    protected $fillable = [
        'do_and_donts_id','subtitle','description',
    ];
    
    public function DoAndDonts()
    {
       return $this->belongsTo('App\Models\DoAndDonts','do_and_donts_id','id');
    }
}
