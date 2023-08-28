<?php

namespace App\Helpers;

use Carbon\Carbon;

class CommonHelper
{
    public static function timing($time)
    {
        $date = now()->format('Y-m-d')." ".(trim($time));
        return Carbon::parse($date)->format('h:i A');
    }
}
