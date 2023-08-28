<?php

namespace App\Http\Controllers\Admin\Patients_Guide;

use App\Http\Controllers\Controller;
use App\Models\HospitalTourVideo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;

class HospitalTourController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
        $this->data = [];
    }

    public function index()
    {
        $tour_video = HospitalTourVideo::first();
        $this->data['tour_video'] = $tour_video;
        return view('admin.pages.patient_guide.hosp_tour')->with($this->data);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'heading' => 'required',
            'cover_image' => 'mimes:jpeg,jpg,png,gif,jfif',
            'bottom_cover_image' => 'mimes:jpeg,jpg,png,gif,jfif',
            'video_caption.*' => 'required',
            'video_url.*' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json(['success' => false, 'code' => 202, 'message' => implode("<br>", $validator->errors()->all())], 202);
        }
        $tour_video = HospitalTourVideo::first();
        if (empty($tour_video)) {
            $tour_video = new HospitalTourVideo();
            $tour_video->heading = trim($request->heading);   
            $tour_video->bottom_heading = trim($request->bottom_heading);
            $tour_video->image_path = 'app/public/uploads/patient_guide/hosp_tour/';
            if ($request->hasfile('cover_image')) {
                $tour_video->cover_image = $this->crop_image_url($request->cover_image_url, 'public/uploads/patient_guide/hosp_tour/');
            }
            if($request->hasfile('bottom_cover_image'))
            {
                $tour_video->bottom_cover_image = $this->crop_image_url($request->bottom_cover_image_url, 'public/uploads/patient_guide/hosp_tour/');
            }
        } else {
            $tour_video->heading = trim($request->heading);
            $tour_video->bottom_heading = trim($request->bottom_heading);
            $tour_video->image_path = 'app/public/uploads/patient_guide/hosp_tour/';
            if ($request->hasfile('cover_image')) {
                $path = storage_path('app/public/uploads/patient_guide/hosp_tour/' . $tour_video->cover_image);
                if (File::exists($path)) {
                    File::delete($path);
                }
                $tour_video->cover_image = $this->crop_image_url($request->cover_image_url, 'public/uploads/patient_guide/hosp_tour/');
            }
            if($request->hasfile('bottom_cover_image'))
            {
                $path = storage_path('app/public/uploads/patient_guide/hosp_tour/' . $tour_video->bottom_cover_image);
                if (File::exists($path)) {
                    File::delete($path);
                }
                $tour_video->bottom_cover_image = $this->crop_image_url($request->bottom_cover_image_url, 'public/uploads/patient_guide/hosp_tour/');
            }
        }
        $object_content = [];
        if (isset($request->video_caption)) {
            for ($i = 0; $i < (count($request->video_caption)); $i++) {
                if ($request->video_caption[$i] != null && $request->video_url[$i] != null) {
                    $content = [];
                    $content['caption'] = trim($request->video_caption[$i]);
                    $content['url'] = trim($request->video_url[$i]);
                    $v_id = $this->get_youtube_video_id(trim($request->video_url[$i]));
                    $content['thumb_image'] = "http://img.youtube.com/vi/".$v_id."/maxresdefault.jpg";
                    $object_content[]= $content;
                    // $content =  ['caption'=>$request->video_caption[$i],'url'=>$request->video_url[$i]];
                    // $object_content->push($content);
                }
            }
        }
        $tour_video->object = serialize($object_content);
        $object_content1 = [];
        if (isset($request->bottom_video_caption) && isset($request->bottom_video_url)) {
            for ($i = 0; $i < (count($request->bottom_video_caption)); $i++) {
                if ($request->bottom_video_caption[$i] != null && $request->bottom_video_url[$i] != null) {
                    $content = [];
                    $content['caption'] = trim($request->bottom_video_caption[$i]);
                    $content['url'] = trim($request->bottom_video_url[$i]);
                    $v_id = $this->get_youtube_video_id(trim($request->bottom_video_url[$i]));
                    $content['thumb_image'] = "http://img.youtube.com/vi/".$v_id."/maxresdefault.jpg";
                    $object_content1[]= $content;
                    // $content =  ['caption'=>$request->video_caption[$i],'url'=>$request->video_url[$i]];
                    // $object_content->push($content);
                }
            }
        }
        $tour_video->bottom_videos_object = serialize($object_content1);
        $tour_video->save();
        return response()->json(['success' => true, 'message' => 'Hospital Tour Videos has been updated.', 'data' => $tour_video], 200);
    }
    public function get_youtube_video_id($url)
    {
        preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $url, $match);
        $video_id = $match[1];
        return $video_id;
    }
}
