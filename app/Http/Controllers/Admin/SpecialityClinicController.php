<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ClinicList;
use App\Models\SpecialityClinic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Response;
use Auth;

class SpecialityClinicController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }
    public function index()
    {
        $this->data['speciality_clinic'] = SpecialityClinic::first();
        return view('admin.pages.speciality_clinic.index')->with($this->data);
    }
    public function speciality_clinic_store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'heading' => 'required|unique:patients_guide_services',
            'cover_image' => 'mimes:jpeg,jpg,png,gif,jfif',
            'title' => 'required',
            'description' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json(['success' => false, 'code' => 202, 'message' => implode("<br>", $validator->errors()->all())], 202);
        }

        $speciality_clinic = SpecialityClinic::first();
        if (empty($speciality_clinic)) {
            $speciality_clinic = new SpecialityClinic();
            $speciality_clinic->heading = $request->heading;
            $speciality_clinic->title = $request->title;
            $speciality_clinic->description = $request->description;
            $speciality_clinic->image_path = 'app/public/uploads/speciality_clinic/';
            if ($request->hasfile('cover_image')) {
                $speciality_clinic->cover_image = $this->crop_image_url($request->cover_image_url, 'public/uploads/speciality_clinic/');
            }
        } else {
            $speciality_clinic->heading = $request->heading;
            $speciality_clinic->title = $request->title;
            $speciality_clinic->description = $request->description;
            $speciality_clinic->image_path = 'app/public/uploads/speciality_clinic/';
            if ($request->hasfile('cover_image')) {
                $path = storage_path('app/public/uploads/speciality_clinic/' . $speciality_clinic->cover_image);
                if (File::exists($path)) {
                    File::delete($path);
                }
                $speciality_clinic->cover_image = $this->crop_image_url($request->cover_image_url, 'public/uploads/speciality_clinic/');
            }
        }
        $speciality_clinic->save();
        if ($speciality_clinic->save()) {
            return response()->json(['success' => true, 'message' => 'Speciality Clinic  Data Added Sucessfully.', 'data' => $speciality_clinic], 200);
        }
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'location' => 'required',
            'description' => 'required',
            'image' => 'required|mimes:jpeg,jpg,png,gif,jfif',
        ]);
        if ($validator->fails()) {
            return response()->json(['success' => false, 'code' => 202, 'message' => implode("<br>", $validator->errors()->all())], 202);
        }
        // dd($request);
        $clinic = new ClinicList();
        $clinic->name = $request->name;
        $clinic->location = $request->location;
        $clinic->description = $request->description;
        $clinic->image_path = 'app/public/uploads/speciality_clinic/clinic/';
        if ($request->hasfile('image')) {
            $clinic->image_name  = $this->crop_image_url($request->image_url, 'public/uploads/speciality_clinic/clinic/');
        }
        if ($clinic->save()) {
            return response()->json(['success' => true, 'message' => 'Data Added Sucessfully.', 'data' => $clinic], 200);
        }
    }
    public function list()
    {
        $data = ClinicList::get();
        return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('image', function (ClinicList $clinic) {
                $img = str_replace("/public", "", url('/')) . '/storage/' . $clinic->image_path . "/" . $clinic->image_name;
                return '<img src="' . $img . '" style="width:400px;height:150px;">';
            })
            ->addColumn('status', function (ClinicList $clinic) {
                if ($clinic->status == 1) {
                    $status_link = '<input class="tgl status_btn" type="checkbox" data-toggle="toggle" data-width="100" id="status" name="status" data-on="Show" data-off="Hide" data-onstyle="success"
            data-offstyle="danger" value="' . $clinic->id . '" checked>';
                } else {
                    $status_link = '<input class="tgl status_btn" type="checkbox" data-toggle="toggle" data-width="100" id="status" name="status" data-on="Show" data-off="Hide" data-onstyle="success"
            data-offstyle="danger" value="' . $clinic->id . '">';
                }
                return $status_link;
            })
            ->addColumn('actions', function (ClinicList $clinic) {

                $edit_link = ' <a type="button" class="btn btn-primary btn-icon-text edit_clinic" href="' . route('admin.clinic.edit', [$clinic->id]) . '"> <i class="fa fa-solid fa-pencil"></i></a>';

                $delete_link = '<a  class="btn btn-danger btn-icon-text delete_clinic"  href="' . route('admin.clinic.destroy', [$clinic->id]) . '"> <i class="fa fa-solid fa-trash"></i></a>';

                return $edit_link . ' ' . $delete_link;
            })
            ->rawColumns(['image', 'status', 'actions'])
            ->toJson();
    }
    public function status($id)
    {
        $clinic = ClinicList::findOrFail($id);
        $clinic->status = !$clinic->status;
        $clinic->save();
        return response()->json(['success' => true, 'message' => 'Clinic status change sucessfully.', 'data' => []], 200);
    }
    public function edit($id)
    {
        $clinic = ClinicList::findOrFail($id);
        return response()->json($clinic);
    }

    public function update(Request $request,$id)
    {
        // dd($request);

        $validator = Validator::make($request->all(), [
            'edit_name' => 'required',
            'edit_location' => 'required',
            'edit_description' => 'required',
            'edit_image' => 'mimes:jpeg,jpg,png,gif,jfif',
        ]);
        if ($validator->fails()) {
            return response()->json(['success' => false, 'code' => 202, 'message' => implode("<br>", $validator->errors()->all())], 202);
        }
        $clinic = ClinicList::findOrFail($id);
        $clinic->name = $request->edit_name;
        $clinic->location = $request->edit_location;
        $clinic->description = $request->edit_description;
        $clinic->image_path = 'app/public/uploads/speciality_clinic/clinic/';
        if ($request->hasfile('edit_image')) {
            $path = storage_path('app/public/uploads/speciality_clinic/clinic/' . $clinic->image_name);
            if (File::exists($path)) {
                File::delete($path);
            }
            $clinic->image_name  = $this->crop_image_url($request->edit_image_url, 'public/uploads/speciality_clinic/clinic/');
        }
        $clinic->save();
        return response()->json(['success' => true, 'message' => 'Clinic data updated Sucessfully.', 'data' => []], 200);
    }
    public function destroy($id)
    {
        $clinic = ClinicList::findOrFail($id);
        $path = storage_path($clinic->image_path . $clinic->image_name);
            if (File::exists($path)) {
                File::delete($path);
            }
        if ($clinic->delete()) {
            return response()->json(['success' => true, 'message' => 'Clinic has been deleted.', 'data' => []], 200);
        } else {
            return response()->json(['success' => false, 'message' => "Somthing went wrong.", 'data' => []], 200);
        }
    }
}
