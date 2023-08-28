<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Storage;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function crop_image_url($url,$file_path)
    {
        $image_array_1 = explode(";", $url);
        $image_array_2 = explode(",", $image_array_1[1]);
        $data = base64_decode($image_array_2[1]);
        $fileName = random_int(1000000000, 9999999999)  . '.png';
        Storage::put($file_path.$fileName, $data);
        $url='';$file_path='';
        return $fileName;
    }
}
