<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CheckUpPlan extends Model
{
    use HasFactory;
    protected $table ="check_up_plans";
    protected $fillable = [
        'name','price','test_type','sub_test_type','file_path','file_name','is_show',
    ];
    public function TestType()
    {
        return $this->belongsToMany(TestType::class);
    }
    public function SubTestType()
    {
        return $this->belongsToMany(SubTestType::class);

    }
}
