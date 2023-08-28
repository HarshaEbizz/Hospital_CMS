<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobApplyList extends Model
{
    use HasFactory;
    protected $table ="job_apply_lists";
    protected $fillable = [
        "id",
        "job_id",
        'application_type',
        'full_name',
        'date',
        'gender',
        'marital_status',
        'email',
        "address",
        "country_code",
        "contact",
        "file_path",
        "resume_file",
        "job_position",
        "qualification",
        "experience_year",
        "last_organization",
        "last_ctc",
        "last_designation",
        "information",
        "status",
    ];
    public function Jobpost()
    {
        return $this->belongsTo('App\Models\JobOpening', 'job_id', 'id');
    }
}
