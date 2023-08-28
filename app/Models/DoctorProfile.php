<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DoctorProfile extends Model
{
    use HasFactory;

    protected $table ="doctor_profiles";

    protected $fillable = [
        'prefix',
        'full_name',
        'qualification',
        'speciality_id',
        'cluster_id',
        'language_known',
        'department_id',
        'designation',
        'mobile_no',
        'gender',
        'opd_number',
        'opd_timings_morning',
        'opd_timings_eveining',
        'image_path',
        'profile_photo',
        'experience',
        'professional_highlight',
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

    public function speciality()
    {
        return $this->belongsTo(Specialities::class);
    }

    public function department()
    {
        return $this->belongsTo(Department::class);
    }
    public function cluster()
    {
        return $this->belongsTo(Cluster::class);
    }
}
