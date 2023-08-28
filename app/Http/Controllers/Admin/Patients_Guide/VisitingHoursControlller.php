<?php

namespace App\Http\Controllers\Admin\Patients_Guide;

use App\Http\Controllers\Controller;
use App\Models\VisitingHours;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;

class VisitingHoursControlller extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
        $this->data = [];
    }
    public function index()
    {
        $hours = VisitingHours::first();
        $this->data['hours'] = $hours;
        return view('admin.pages.patient_guide.visiting_hours')->with($this->data);
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'heading' => 'required|unique:patients_guide_services',
            'cover_image' => 'mimes:jpeg,jpg,png,gif,jfif',
            'title' => 'required',
            'morning_open_time' => 'required',
            'morning_close_time' => 'required',
            'evening_open_time' => 'required',
            'evening_close_time' => 'required',
            // 'note' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json(['success' => false, 'code' => 202, 'message' => implode("<br>", $validator->errors()->all())], 202);
        }
        // dd($request);
        $hours = VisitingHours::first();
        if (empty($hours)) {
            $hours = new VisitingHours();
            $hours->heading = $request->heading;
            $hours->title = $request->title;
            $hours->note = $request->note;
            $hours->morning_timing =  $request->morning_open_time . " To " . $request->morning_close_time;
            $hours->eveining_timimg = $request->evening_open_time . " To " . $request->evening_close_time;
            $hours->image_path = 'app/public/uploads/patient_guide/visiting_hours/';
            if ($request->hasfile('cover_image')) {
                $hours->cover_image = $this->crop_image_url($request->cover_image_url, 'public/uploads/patient_guide/visiting_hours/');
            }
            $hours->save();
        }else{
            $hours->heading = $request->heading;
            $hours->title = $request->title;
            $hours->note = $request->note;
            $hours->morning_timing =  $request->morning_open_time . " To " . $request->morning_close_time;
            $hours->eveining_timimg = $request->evening_open_time . " To " . $request->evening_close_time;
            $hours->image_path = 'app/public/uploads/patient_guide/visiting_hours/';
            if ($request->hasfile('cover_image')) {
                $path = storage_path('app/public/uploads/patient_guide/visiting_hours/' . $hours->cover_image);
                if (File::exists($path)) {
                    File::delete($path);
                }
                $hours->cover_image = $this->crop_image_url($request->cover_image_url, 'public/uploads/patient_guide/visiting_hours/');
            }
            $hours->save();
        }
        return response()->json(['success' => true, 'message' => 'Visiting Hours has been updated.', 'data' => $hours], 200);
    }

}
?>
