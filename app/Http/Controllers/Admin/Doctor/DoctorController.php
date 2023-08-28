<?php

namespace App\Http\Controllers\Admin\Doctor;

use Auth;
use App\Models\Cluster;
use App\Models\Department;
use Illuminate\Support\Str;
use App\Models\Specialities;
use Illuminate\Http\Request;
use App\Helpers\CommonHelper;
use App\Models\DoctorProfile;
use Illuminate\Validation\Rule;
use Yajra\DataTables\DataTables;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class DoctorController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
        \View::share('specialities', Specialities::orderby('name')->get());
        \View::share('departments', Department::orderby('department_name')->get());
        \View::share('clusters', Cluster::orderby('id')->get());
    }

    public function index()
    {
        return view('admin.pages.doctor.index');
    }

    public function create()
    {
        return view('admin.pages.doctor.create');
    }

    public function store(Request $request)
    {
        // dd($request->input('opd_morning_from_time'));
        $validator = Validator::make($request->all(), [
            'full_name' => 'required|max:30',
            'qualification' => 'required',
            'speciality_id' => 'required',
            'language_known' => 'required',
            'department_id' => 'required',
            'designation' => 'required',
            'mobile_no' => 'required|numeric',
            'gender' => 'required',

            'opd_morning_yes'=> Rule::requiredIf( function () use ($request){
                return $request->input('opd_morning_yes') == null && $request->input('opd_evening_yes') == null;
            }),
            'opd_morning_from_time'=> Rule::requiredIf( function () use ($request){
                return $request->input('opd_morning_yes') == '1';
            }),
            'opd_morning_to_time'=> Rule::requiredIf( function () use ($request){
                return $request->input('opd_morning_yes') == '1';
            }),
            'opd_evening_from_time'=> Rule::requiredIf( function () use ($request){
                return $request->input('opd_evening_yes') == '1';
            }),
            'opd_evening_to_time'=> Rule::requiredIf( function () use ($request){
                return $request->input('opd_evening_yes') == '1';
            }),

            'upload_image' => 'required|max:10000|mimes:jpg,jpeg,png,ico,bmp,gif,svg',
        ], [
            'opd_morning_yes.required' => 'Please Select atlest morning or eveining time'
        ]);


        if ($validator->fails()) {
            return response()->json(['success' => false, 'code' => 202, 'message' => implode("<br>", $validator->errors()->all())], 202);
        }

        if($request->input('opd_morning_yes') == '1'){
            $opd_timings_morning = $request->input('opd_morning_from_time') . " To " . $request->input('opd_morning_to_time');
        }else{
            $opd_timings_morning = null;
        }

        if($request->input('opd_evening_yes') == '1'){
            $opd_timings_eveining = $request->input('opd_evening_from_time') . " To " . $request->input('opd_evening_to_time');
        }else{
            $opd_timings_eveining = null;
        }


        $add_profile = new DoctorProfile();

        if ($request->hasfile('upload_image')) {
            $add_profile->profile_photo = $this->crop_image_url($request->upload_image_url, 'public/uploads/doctor_profile/');
        }

        $add_profile->prefix = $request->input('prefix');
        $add_profile->full_name = $request->input('full_name');
        $add_profile->qualification = $request->input('qualification');
        $add_profile->speciality_id = implode(",", $request->input('speciality_id'));
        $add_profile->cluster_id = $request->input('cluster_id');
        $add_profile->language_known = $request->input('language_known');
        $add_profile->department_id = $request->input('department_id');
        $add_profile->designation = $request->input('designation');
        $add_profile->mobile_no = $request->input('mobile_no');
        $add_profile->gender = $request->input('gender');
        $add_profile->opd_number = $request->input('opd_number');
        $add_profile->opd_timings_morning = $opd_timings_morning;
        $add_profile->opd_timings_eveining = $opd_timings_eveining;
        $add_profile->image_path = 'app/public/uploads/doctor_profile/';
        $add_profile->experience = $request->input('experience');
        $add_profile->professional_highlight = $request->input('professional_highlight');

        if ($add_profile->save()) {
            return response()->json(['success' => true, 'message' => 'Profile added sucessfully.', 'data' => $add_profile], 200);
        }
    }

    public function show($id)
    {
    }

    public function edit($id)
    {
        $profile_details = DoctorProfile::find($id);

        return view('admin.pages.doctor.edit', compact('profile_details'));
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'full_name' => 'required|max:30',
            'qualification' => 'required',
            'speciality_id' => 'required',
            'language_known' => 'required',
            'department_id' => 'required',
            'designation' => 'required',
            'mobile_no' => 'required|numeric',
            'gender' => 'required',
            'opd_morning_yes'=> Rule::requiredIf( function () use ($request){
                return $request->input('opd_morning_yes') == null && $request->input('opd_evening_yes') == null;
            }),
            'opd_morning_from_time'=> Rule::requiredIf( function () use ($request){
                return $request->input('opd_morning_yes') == '1';
            }),
            'opd_morning_to_time'=> Rule::requiredIf( function () use ($request){
                return $request->input('opd_morning_yes') == '1';
            }),
            'opd_evening_from_time'=> Rule::requiredIf( function () use ($request){
                return $request->input('opd_evening_yes') == '1';
            }),
            'opd_evening_to_time'=> Rule::requiredIf( function () use ($request){
                return $request->input('opd_evening_yes') == '1';
            }),

            'edit_upload_image' => 'max:10000|mimes:jpg,jpeg,png,ico,bmp,gif,svg',
        ]);

        if ($validator->fails()) {
            return response()->json(['success' => false, 'code' => 202, 'message' => implode("<br>", $validator->errors()->all())], 202);
        }


        if($request->input('opd_morning_yes') == '1'){
            $opd_timings_morning = $request->input('opd_morning_from_time') . " To " . $request->input('opd_morning_to_time');
        }else{
            $opd_timings_morning = null;
        }

        if($request->input('opd_evening_yes') == '1'){
            $opd_timings_eveining = $request->input('opd_evening_from_time') . " To " . $request->input('opd_evening_to_time');
        }else{
            $opd_timings_eveining = null;
        }

        $find_profile = DoctorProfile::findOrFail($id);

        if ($request->hasfile('edit_upload_image')) {
            $path = storage_path($find_profile->image_path . $find_profile->profile_photo);
            if (File::exists($path)) {
                File::delete($path);
            }
            $find_profile->profile_photo = $this->crop_image_url($request->edit_upload_image_url, 'public/uploads/doctor_profile/');
            // dd($fileName);
        }

        $find_profile->prefix = $request->input('prefix');
        $find_profile->full_name = $request->input('full_name');
        $find_profile->qualification = $request->input('qualification');
        $find_profile->speciality_id = implode(",", $request->input('speciality_id'));
        $find_profile->cluster_id = $request->input('cluster_id');
        $find_profile->language_known = $request->input('language_known');
        $find_profile->department_id = $request->input('department_id');
        $find_profile->designation = $request->input('designation');
        $find_profile->mobile_no = $request->input('mobile_no');
        $find_profile->gender = $request->input('gender');
        $find_profile->opd_number = $request->input('opd_number');
        $find_profile->opd_timings_morning = $opd_timings_morning;
        $find_profile->opd_timings_eveining = $opd_timings_eveining;
        $find_profile->experience = $request->input('experience');
        $find_profile->professional_highlight = $request->input('professional_highlight');
        $find_profile->save();
        return response()->json(['success' => true, 'message' => 'Profile updated sucessfully.', 'data' => $find_profile], 200);
    }

    public function destroy(DoctorProfile $doctor)
    {
        /* delete old file */
        $path = storage_path('app/public/uploads/doctor_profile/' . $doctor->profile_photo);

        if (File::exists($path)) {
            File::delete($path);
        }

        if ($doctor->forceDelete()) {
            return response()->json(['success' => true, 'message' => 'doctor profile has been deleted.', 'data' => []], 200);
        } else {
            return response()->json(['success' => false, 'message' => 'Something went wrong.', 'data' => []], 200);
        }
    }

    public function doctor_list()
    {
        return view('admin.pages.doctor.doctors_list');
    }

    public function profile_list()
    {
        $data = DoctorProfile::with(['speciality','department'])->latest()->get();

        return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('photo', function (DoctorProfile $data) {
                if ($data->profile_photo !='') {
                    $url= asset('../storage/app/public/uploads/doctor_profile/'. $data->profile_photo);
                }
                return '<img src="'.$url.'" class="wi-50" align="center" />';
            })
            ->addColumn('full_name', function (DoctorProfile $data) {
                return $data->prefix.' '.$data->full_name;
            })
            // ->addColumn('opd_timimg', function (DoctorProfile $data) {
            //     if($data->opd_timings_morning != null){
            //         $morning_timing = explode('To', $data->opd_timings_morning);
            //         $morning_form = CommonHelper::timing($morning_timing[0]);
            //         $morning_to = CommonHelper::timing($morning_timing[1]);
            //     }else{
            //         $morning_form = "-";
            //         $morning_to = "-";
            //     }

            //     if($data->opd_timings_morning != null){
            //         $eveining_timing = explode('To', $data->opd_timings_eveining);
            //         $eveining_form = CommonHelper::timing($eveining_timing[0]);
            //         $eveining_to = CommonHelper::timing($eveining_timing[1]);
            //     }else{
            //         $eveining_form = "-";
            //         $eveining_to = "-";
            //     }



            //     return "Morning ". $morning_form ." To " . $morning_to . " Evening ". $eveining_form ." To " . $eveining_to;
            // })
            // ->addColumn('speciality', function (DoctorProfile $data) {
            //     return $data->speciality->name;
            // })
            ->addColumn('department', function (DoctorProfile $data) {
                return $data->department->department_name;
            })
            ->addColumn('status', function (DoctorProfile $data) {
                if ($data->active == 1) {
                    $status_link = '<input class="tgl status_btn" type="checkbox" data-toggle="toggle" data-width="100" id="is_show" name="is_show" data-on="Show" data-off="Hide" data-onstyle="success"
                    data-offstyle="danger" value="' . $data->id . '" checked>';
                } else {
                    $status_link = '<input class="tgl status_btn" type="checkbox" data-toggle="toggle" data-width="100" id="is_show" name="is_show" data-on="Show" data-off="Hide" data-onstyle="success"
                    data-offstyle="danger" value="' . $data->id . '">';
                }
                return $status_link;
            })
            ->addColumn('actions', function (DoctorProfile $data) {
                if ($data->isActivate()) {
                    $button = 'success';
                    $text = 'Deactivate';
                    $title = 'You want to deactivate this doctor?';
                    $icon = '<i class="fa fa-unlock"></i>';
                } else {
                    $button = 'danger';
                    $text = 'Activate';
                    $title = 'You want to activate this doctor?';
                    $icon = '<i class="fa fa-lock"></i>';
                }

                // $as_Activate = "<a title='{$text} doctor' href='" . route('admin.doctor.activate.toggle', [$data->id]) . "' data-title='{$title}' class='activate-link btn btn-icon btn-outline-{$button} mr-1 mb-1 waves-effect waves-light'>" .
                // "{$icon}" .
                // "</a>";

                $edit_link = '<a title="View Details" href="' . route('admin.doctor.edit', [$data->id]) . '" class="btn btn-primary btn-icon-text" style="padding: 0.375rem 0.75rem;font-size: 1rem;">' .
                '<i class="fa fa-pencil"></i>' .
                '</a>';

                $delete_link = '<a title="Delete Doctor" href="' . route('admin.doctor.destroy', [$data->id]) . '" class="delete-link btn btn-danger btn-icon-text" style="padding: 0.375rem 0.75rem;font-size: 1rem;">' .
                '<i class="fa fa-trash"></i>' .
                '</a>';

                // $delete_link = '<a title="Delete Doctor" href="' . route('admin.doctor.destroy', [$data->id]) . '" class="delete-link btn btn-icon btn-outline-danger mr-1 mb-1 waves-effect waves-light">' .
                // '<i class="fa fa-trash"></i>' .
                // '</a>';

                // return $as_Activate . ' ' . $edit_link . ' ' . $delete_link;
                return $edit_link . ' ' . $delete_link;
            })
            ->rawColumns(['actions','photo', 'status'])
            ->make(true);
    }

    public function activateToggle(DoctorProfile $doctor)
    {
        if ($doctor->activateToggle()->save()) {
            return response()->json(['success' => true, 'message' => 'doctor activate status changed.', 'data' => []], 200);
        } else {
            return response()->json(['success' => false, 'message' => 'Something went wrong.', 'data' => []], 200);
        }
    }
}
