<?php

namespace App\Http\Controllers\Admin\Patients_Guide;

use App\Http\Controllers\Controller;
use App\Models\PatientResponsibilities;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;

class PatientResponsibilitiesController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
        $this->data = [];
    }
    public function index()
    {
        $rights_responsibilities = PatientResponsibilities::first();
        $this->data['rights_responsibilities'] = $rights_responsibilities;
        return view('admin.pages.patient_guide.patients_responsibilities')->with($this->data);
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'heading' => 'required',
            'title' => 'required',
            'rights' => 'required',
            'responsibilities' => 'required',
            'image' => 'mimes:jpeg,jpg,png,gif,jfif',
            'cover_image' => 'mimes:jpeg,jpg,png,gif,jfif',
        ]);
        if ($validator->fails()) {
            return response()->json(['success' => false, 'code' => 202, 'message' => implode("<br>", $validator->errors()->all())], 202);
        }
        $rights_responsibilities = PatientResponsibilities::first();
        if (empty($rights_responsibilities)) {
            $rights_responsibilities = new PatientResponsibilities();
            $rights_responsibilities->heading = $request->heading;
            $rights_responsibilities->title = $request->title;
            $rights_responsibilities->rights = $request->rights;
            $rights_responsibilities->responsibilities = $request->responsibilities;
            $rights_responsibilities->image_path = 'app/public/uploads/patient_guide/patients_responsibilities/';
            if ($request->hasfile('image')) {
                $rights_responsibilities->image_name = $this->crop_image_url($request->image_url, 'public/uploads/patient_guide/patients_responsibilities/');
            }
            if ($request->hasfile('cover_image')) {
                $rights_responsibilities->cover_image = $this->crop_image_url($request->cover_image_url, 'public/uploads/patient_guide/patients_responsibilities/');
            }
            $rights_responsibilities->save();
        } else {
            $fileName = '';
            $fileName1 ='';
            $rights_responsibilities->heading = $request->heading;
            $rights_responsibilities->title = $request->title;
            $rights_responsibilities->rights = $request->rights;
            $rights_responsibilities->responsibilities = $request->responsibilities;
            if ($request->hasfile('image')) {
                $path = storage_path('app/public/uploads/patient_guide/patients_responsibilities/' . $rights_responsibilities->image_name);
                if (File::exists($path)) {
                    File::delete($path);
                }
                $rights_responsibilities->image_name = $this->crop_image_url($request->image_url, 'public/uploads/patient_guide/patients_responsibilities/');
            }
            if ($request->hasfile('cover_image')) {
                $path = storage_path('app/public/uploads/patient_guide/patients_responsibilities/' . $rights_responsibilities->cover_image);
                if (File::exists($path)) {
                    File::delete($path);
                }
                $rights_responsibilities->cover_image = $this->crop_image_url($request->cover_image_url, 'public/uploads/patient_guide/patients_responsibilities/');
            }
            $rights_responsibilities->save();
        }
         return response()->json(['success' => true, 'message' => 'Patient’s Rights & Responsibilities has been updated.', 'data' => $rights_responsibilities], 200);
    }
}
