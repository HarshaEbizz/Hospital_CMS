<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\InternationalPatientCare;
use App\Models\InternationalPatientCareTopic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Response;
use Auth;

class InternationalPatientCareControlller extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }
    public function index()
    {
        $this->data['patient_cares'] = InternationalPatientCare::first();
        return view('admin.pages.international_patient_care.index')->with($this->data);
    }
    public function caredata_store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'heading' => 'required',
            'cover_image' => 'mimes:jpeg,jpg,png,gif,jfif',
            'image' => 'mimes:jpeg,jpg,png,gif,jfif',
            'title' => 'required',
            'description' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json(['success' => false, 'code' => 202, 'message' => implode("<br>", $validator->errors()->all())], 202);
        }
        $patient_cares = InternationalPatientCare::first();
        if (empty($patient_cares)) {
            $patient_cares = new InternationalPatientCare();
            $patient_cares->heading = $request->heading;
            $patient_cares->title = $request->title;
            $patient_cares->description = $request->description;
            $patient_cares->image_path = 'app/public/uploads/patient_cares/';
            if ($request->hasfile('cover_image')) {
                $patient_cares->cover_image = $this->crop_image_url($request->cover_image_url, 'public/uploads/patient_cares/');
            }
            if ($request->hasfile('image')) {
                $patient_cares->image_name = $this->crop_image_url($request->image_url, 'public/uploads/patient_cares/');
            }
        } else {
            $fileName = '';
            $patient_cares->heading = $request->heading;
            $patient_cares->title = $request->title;
            $patient_cares->description = $request->description;
            $patient_cares->image_path = 'app/public/uploads/patient_cares/';
            if ($request->hasfile('cover_image')) {
                $path = storage_path('app/public/uploads/patient_cares/' . $patient_cares->cover_image);
                if (File::exists($path)) {
                    File::delete($path);
                }
                $patient_cares->cover_image = $this->crop_image_url($request->cover_image_url, 'public/uploads/patient_cares/');
            }
            if ($request->hasfile('image')) {
                $path = storage_path('app/public/uploads/patient_cares/' . $patient_cares->image_name);
                if (File::exists($path)) {
                    File::delete($path);
                }
                $patient_cares->image_name = $this->crop_image_url($request->image_url, 'public/uploads/patient_cares/');
            }
        }
        $patient_cares->save();
        if ($patient_cares->save()) {
            return response()->json(['success' => true, 'message' => 'Patient care  Data Added Sucessfully.', 'data' => $patient_cares], 200);
        }
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'topic' => 'required',
            'details' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json(['success' => false, 'code' => 202, 'message' => implode("<br>", $validator->errors()->all())], 202);
        }
        $topic = new InternationalPatientCareTopic();
        $topic->topic = $request->topic;
        $topic->details = $request->details;
        if ($topic->save()) {
            return response()->json(['success' => true, 'message' => 'Topic Added Sucessfully.', 'data' => $topic], 200);
        }
    }
    public function list()
    {
        $data = InternationalPatientCareTopic::get();
        return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('status', function (InternationalPatientCareTopic $topic) {
                if ($topic->status == 1) {
                    $status_link = '<input class="tgl status_btn" type="checkbox" data-toggle="toggle" data-width="100" id="status" name="status" data-on="Show" data-off="Hide" data-onstyle="success"
            data-offstyle="danger" value="' . $topic->id . '" checked>';
                } else {
                    $status_link = '<input class="tgl status_btn" type="checkbox" data-toggle="toggle" data-width="100" id="status" name="status" data-on="Show" data-off="Hide" data-onstyle="success"
            data-offstyle="danger" value="' . $topic->id . '">';
                }
                return $status_link;
            })
            ->addColumn('actions', function (InternationalPatientCareTopic $topic) {
                // $edit_link = ' <button type="button" class="btn btn-primary btn-icon-text edit_topic" value="' . $topic->id . '"> <i class="fa fa-solid fa-pencil"></i></button>';

                // $delete_link = '<button type="button" class="btn btn-danger btn-icon-text delete_topic" value="' . $topic->id . '"> <i class="fa fa-solid fa-trash"></i></button>';

                $edit_link = ' <a type="button" class="btn btn-primary btn-icon-text edit_topic" href="' . route('admin.international_patient_care.edit', [$topic->id]) . '"> <i class="fa fa-solid fa-pencil"></i></a>';

                $delete_link = '<a  class="btn btn-danger btn-icon-text delete_topic"  href="' . route('admin.international_patient_care.destroy', [$topic->id]) . '"> <i class="fa fa-solid fa-trash"></i></a>';

                return $edit_link . ' ' . $delete_link;
            })
            ->rawColumns(['status', 'actions'])
            ->toJson();
    }
    public function edit($id)
    {
        $topic = InternationalPatientCareTopic::findOrFail($id);
        return response()->json($topic);
    }
    public function update(Request $request, $id)
    {
        // dd($request);
        $validator = Validator::make($request->all(), [
            'edit_topic' => 'required',
            'edit_details' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json(['success' => false, 'code' => 202, 'message' => implode("<br>", $validator->errors()->all())], 202);
        }
        $topic = InternationalPatientCareTopic::findOrFail($id);
        $topic->topic = $request->edit_topic;
        $topic->details = $request->edit_details;
        if ($topic->save()) {
            return response()->json(['success' => true, 'message' => 'Topic Added Sucessfully.', 'data' => $topic], 200);
        }
    }
    public function status($id)
    {
        $topic = InternationalPatientCareTopic::findOrFail($id);
        $topic->status = !$topic->status;
        $topic->save();
        return response()->json(['success' => true, 'message' => 'Topic status change sucessfully.', 'data' => []], 200);
    }
    public function destroy($id)
    {
        $topic = InternationalPatientCareTopic::findOrFail($id);
        if ($topic->delete()) {
            return response()->json(['success' => true, 'message' => 'Topic has been deleted.', 'data' => []], 200);
        } else {
            return response()->json(['success' => false, 'message' => "Somthing went wrong.", 'data' => []], 200);
        }
    }
}
