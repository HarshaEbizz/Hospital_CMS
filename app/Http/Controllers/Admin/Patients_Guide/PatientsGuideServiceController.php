<?php

namespace App\Http\Controllers\Admin\Patients_Guide;

use App\Http\Controllers\Controller;
use App\Models\IPDGuide;
use App\Models\PatientsGuideService;
use Auth;
use Illuminate\Http\Request;
use  Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;
use Yajra\DataTables\DataTables;
use App\Models\Country;
use Illuminate\Support\Facades\Storage;
class PatientsGuideServiceController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
        $this->data = [];
        $this->country = Country::orderby('name')->get();
    }
    public function uniqueSlug($heading)
    {
        $slug = Str::slug($heading, '_');
        $count = PatientsGuideService::where('slug', 'LIKE', "{$slug}%")->count();
        $newCount = $count > 0 ? $count++ : '';
        return $newCount > 0 ? "$slug-$newCount" : $slug;
    }
    public function index()
    {
        $this->data['country'] = $this->country;
        return view('admin.pages.patient_guide.guide_service.index')->with($this->data);
    }
    public function list()
    {
        $data = PatientsGuideService::get();
        return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('image', function (PatientsGuideService $guide_service) {
                $img = str_replace("/public", "", url('/')) . '/storage/' . $guide_service->image_path . $guide_service->cover_image;
                return '<img src="' . $img . '" style="height:150px;">';
            })
            ->addColumn('status', function (PatientsGuideService $guide_service) {
                if ($guide_service->status == 1) {
                    $status_link = '<input class="tgl status_btn" type="checkbox" data-toggle="toggle" data-width="100" id="status" name="status" data-on="Show" data-off="Hide" data-onstyle="success"
                    data-offstyle="danger" value="' . $guide_service->id . '" checked>';
                } else {
                    $status_link = '<input class="tgl status_btn" type="checkbox" data-toggle="toggle" data-width="100" id="status" name="status" data-on="Show" data-off="Hide" data-onstyle="success"
                    data-offstyle="danger" value="' . $guide_service->id . '">';
                }
                return $status_link;
            })
            ->addColumn('actions', function (PatientsGuideService $guide_service) {
                // $action_link = '<a href="' . route('admin.patients_guide_service.edit', [$guide_service->id]) . '"  type="button" class="btn btn-primary btn-icon-text edit_image" value="' . $guide_service->id . '"> <i class="fa fa-solid fa-pencil"></i></a> <button  type="button" class="btn btn-danger btn-icon-text delete_guide_service" value="' . $guide_service->id . '"> <i class="fa fa-solid fa-trash"></i></button>';

                $action_link = '<a href="' . route('admin.patients_guide_service.edit', [$guide_service->id]) . '"  type="button" class="btn btn-primary btn-icon-text edit_image" value="' . $guide_service->id . '">
                <i class="fa fa-solid fa-pencil"></i></a>
                <a class="btn btn-danger btn-icon-text delete_guide_service"  href="' . route('admin.patients_guide_service.destroy', [$guide_service->id]) . '"> <i class="fa fa-solid fa-trash"></i></a>';

                return $action_link;
            })
            ->rawColumns(['status', 'image', 'actions'])
            ->make(true);
    }
    public function create()
    {
        $this->data['country'] = $this->country;
        return view('admin.pages.patient_guide.guide_service.create')->with($this->data);
    }
    public function store(Request $request)
    {
        // dd($request);
        $validator = Validator::make($request->all(), [
            'heading' => 'required|unique:patients_guide_services',
            'cover_image' => 'required|mimes:jpeg,jpg,png,gif,jfif',
            // 'title' => 'required',
            // 'description' => 'required',
            'image' => 'mimes:jpeg,jpg,png,gif,jfif',
        ]);
        if ($request->contact_no) {
            $validator = Validator::make($request->all(), [
                'contact_no' => 'digits:10',
            ]);
        }
        if ($validator->fails()) {
            return response()->json(['success' => false, 'code' => 202, 'message' => implode("<br>", $validator->errors()->all())], 202);
        }
        $guide_service = new PatientsGuideService();
        $guide_service->heading = $request->heading;
        $guide_service->slug = $this->uniqueSlug($request->heading);
        $guide_service->title = $request->title;
        if($request->contact_no){
            $guide_service->contact_no = $request->country_code.'-'.$request->contact_no;
        }
        $guide_service->description = $request->description;
        $guide_service->sub_title = $request->sub_title;
        $guide_service->details = $request->details;
        $guide_service->image_path = 'app/public/uploads/patient_guide/' . $guide_service->slug;
        if ($request->hasfile('image')) {
            $guide_service->image_name= $this->crop_image_url($request->image_url, 'public/uploads/patient_guide/' . $guide_service->slug);
        }
        if ($request->hasfile('cover_image')) {
            $guide_service->cover_image = $this->crop_image_url($request->cover_image_url, 'public/uploads/patient_guide/' . $guide_service->slug);
        }
        $guide_service->save();
        return response()->json(['success' => true, 'message' => 'Patients Guide & Service has been created.', 'data' => $guide_service], 200);
    }
    public function edit($id)
    {
        $guide_service = PatientsGuideService::findOrFail($id);
        $this->data['country'] = $this->country;
        $this->data['guide_service'] = $guide_service;
        return view('admin.pages.patient_guide.guide_service.edit')->with($this->data);
    }
    public function update(Request $request, $id)
    {
        // dd($request);
        $validator = Validator::make($request->all(), [
            'heading' => 'required',
            'cover_image' => 'mimes:jpeg,jpg,png,gif,jfif',
            // 'title' => 'required',
            // 'description' => 'required',
            'image' => 'mimes:jpeg,jpg,png,gif,jfif',
        ]);
        if ($request->contact_no) {
            $validator = Validator::make($request->all(), [
                'contact_no' => 'digits:10',
            ]);
        }
        if ($validator->fails()) {
            return response()->json(['success' => false, 'code' => 202, 'message' => implode("<br>", $validator->errors()->all())], 202);
        }
        $guide_service = PatientsGuideService::findOrFail($id);
        $guide_service->heading = $request->heading;
        $guide_service->title = $request->title;
        if($request->contact_no){
            $guide_service->contact_no = $request->country_code.'-'.$request->contact_no;
        }
        $guide_service->description = $request->description;
        $guide_service->sub_title = $request->sub_title;
        $guide_service->details = $request->details;
        $guide_service->image_path = 'app/public/uploads/patient_guide/' . $guide_service->slug;
        if ($request->hasfile('image')) {
            $path = storage_path($guide_service->image_path . $guide_service->image_name);
            if (File::exists($path)) {
                File::delete($path);
            }
            $guide_service->image_name= $this->crop_image_url($request->image_url, 'public/uploads/patient_guide/' . $guide_service->slug);
        }
        if ($request->hasfile('cover_image')) {
            $path = storage_path($guide_service->image_path . $guide_service->cover_image);
            if (File::exists($path)) {
                File::delete($path);
            }
            $guide_service->cover_image = $this->crop_image_url($request->cover_image_url, 'public/uploads/patient_guide/' . $guide_service->slug);
        }

        if ((trim($guide_service->heading) != trim($request->heading))) {
            $guide_service->heading = $this->uniqueSlug($request->heading);
        }
        $guide_service->save();
        return response()->json(['success' => true, 'message' => 'Patients Guide & Service has been updated.', 'data' => $guide_service], 200);
    }
    public function status($id)
    {
        $guide_service = PatientsGuideService::findOrFail($id);
        $guide_service->status = !$guide_service->status;
        $guide_service->save();
        return response()->json(['success' => true, 'message' => 'Patients Guide & Service status change sucessfully.', 'data' => []], 200);
    }
    public function destroy($id)
    {
        $guide_service = PatientsGuideService::findOrFail($id);
        $path = storage_path($guide_service->image_path . $guide_service->image_name);
        if (File::exists($path)) {
            File::delete($path);
        }
        $path = storage_path($guide_service->image_path . $guide_service->cover_image);
        if (File::exists($path)) {
            File::delete($path);
        }
        if ($guide_service->delete()) {
            return response()->json(['success' => true, 'message' => 'Patients Guide & Service has been deleted.', 'data' => []], 200);
        } else {
            return response()->json(['success' => false, 'message' => 'Something went wrong.', 'data' => []], 200);
        }
    }
}
