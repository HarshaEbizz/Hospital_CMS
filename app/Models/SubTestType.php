<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubTestType extends Model
{
    use HasFactory;
    protected $table = "sub_test_types";
    protected $fillable = [
        'test_id', 'test_name', 'is_show',
    ];
    public function TestType()
    {
        return $this->belongsTo('App\Models\TestType', 'test_id', 'id');
    }
    public function CheckUpPlan()
    {
        return $this->hasMany(CheckUpPlan::class);
    }
}
