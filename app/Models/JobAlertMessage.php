<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobAlertMessage extends Model
{
    use HasFactory;
    use HasFactory;
    protected $table ="job_alert_messages";
    protected $fillable = [
        "id",
        'title',
        "message",
        "status",
    ];
}
