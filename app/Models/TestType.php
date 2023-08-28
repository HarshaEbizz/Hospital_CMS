<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TestType extends Model
{
    use HasFactory;
    protected $table ="test_types";
    protected $fillable = [
        'test_name','is_show',
    ];
    public function SubType()
    {
       return $this->hasMany('App\Models\sub_test_types','test_id','id');
    }
    public function CheckUpPlan()
    {
        return $this->hasMany(CheckUpPlan::class);
    }
}
