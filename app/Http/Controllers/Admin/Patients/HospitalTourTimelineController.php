<?php

namespace App\Http\Controllers\Admin\Patients;

use App\Http\Controllers\Controller;
use App\Models\HospitalTourTimeline;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Yajra\DataTables\DataTables;

class HospitalTourTimelineController extends Controller
{
    private $data;
    public function __construct()
    {
        $this->middleware('admin');
        $this->data = [];
    }
    public function index()
    {
        $years_array = $this->getDatesFromRange("2017-01-01", date('Y-m-d'));
        $this->data['years_range'] = $years_array;
        return view('admin.pages.patients.hospital_history')->with($this->data);
    }
    public function getDatesFromRange($start, $end, $format = 'Y')
    {
        $year_array = [];
        $startDate = Carbon::createFromFormat('Y-m-d', $start)->format('Y');
        $endDate = Carbon::createFromFormat('Y-m-d', $end)->format('Y');
        if ($startDate != $endDate) {
            for ($i = 0; $i <= ($endDate - $startDate); $i++) {
                $year_array[] = $startDate + $i;
            }
        }
        return $year_array;
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'year' => 'required',
            'color_code' => 'required',
            "image" => 'required|mimes:jpeg,png,jpg|max:2048',
        ]);
        if ($validator->fails()) {
            return response()->json(['success' => false, 'code' => 202, 'message' => implode("<br>", $validator->errors()->all())], 202);
        }
        $check_exist = HospitalTourTimeline::where('year', $request->year)->first();
        if ($check_exist) {
            return response()->json(['success' => false, 'code' => 202, 'message' => "Timeline details already exist for selected year"], 202);
        }
        $timeline = new HospitalTourTimeline;
        $timeline->title = $request->title;
        $timeline->color_code = $request->color_code;
        $timeline->year = $request->year;
        $timeline->direction = $request->direction;
        $timeline->image_path = 'app/public/uploads/hospital_history/';
        if ($request->hasfile('image')) {
            $timeline->image_name = $this->crop_image_url($request->image_url, 'public/uploads/hospital_history/');
        }
        if ($timeline->save()) {
            return response()->json(['success' => true, 'message' => 'Hospital timeline added sucessfully.'], 200);
        } else {
            return response()->json(['success' => false, 'message' => "Somthing went wrong."], 202);
        }
    }
    public function update_timeline(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'year' => 'required',
            'color_code' => 'required',
            "image" => 'mimes:jpeg,png,jpg|max:2048',
        ]);
        if ($validator->fails()) {
            return response()->json(['success' => false, 'code' => 202, 'message' => implode("<br>", $validator->errors()->all())], 202);
        }
        $check_exist = HospitalTourTimeline::where('year', $request->year)->where('id', "!=", $request->id)->first();
        if ($check_exist) {
            return response()->json(['success' => false, 'code' => 202, 'message' => "Timeline details already exist for selected year"], 202);
        }
        $timeline = HospitalTourTimeline::find($request->id);
        if ($timeline) {
            $timeline->title = $request->title;
            $timeline->color_code = $request->color_code;
            $timeline->year = $request->year;
            $timeline->direction = $request->direction;
            if ($request->hasfile('image')) {
                $path = storage_path($timeline->image_path . $timeline->image_name);
                if (File::exists($path)) {
                    File::delete($path);
                }
                $timeline->image_name = $this->crop_image_url($request->edit_image_url, 'public/uploads/hospital_history/');
            }
            if ($timeline->save()) {
                return response()->json(['success' => true, 'message' => 'Hospital timeline added sucessfully.'], 200);
            } else {
                return response()->json(['success' => false, 'message' => "Somthing went wrong."], 202);
            }
        } else {
            return response()->json(['success' => false, 'message' => "Somthing went wrong."], 202);
        }
    }

    public function list()
    {
        $data = HospitalTourTimeline::get();
        return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('color_code', function (HospitalTourTimeline $record) {
                return "<input type='color' value='".$record->color_code."' disabled />";
            })
            ->addColumn('image', function (HospitalTourTimeline $record) {
                $image_name = str_replace("/public", "", url('/')) . '/storage/' . $record->image_path . $record->image_name;
                return '<img src="' . $image_name . '" style="height:75px;">';
            })
            ->addColumn('actions', function (HospitalTourTimeline $record) {

                $action_link = '<a href="' . route('admin.hospital_timelines.show', [$record->id]) . '"  type="button" class="btn btn-primary btn-icon-text edit_timeline" value="' . $record->id . '"> <i class="fa fa-solid fa-pencil"></i></a> <a class="btn btn-danger btn-icon-text delete_timeline"  href="' . route('admin.hospital_timelines.destroy', [$record->id]) . '"> <i class="fa fa-solid fa-trash"></i></a>';                
                return $action_link;
            })
            ->rawColumns(['color_code','image', 'actions'])
            ->make(true);
    }

    public function show($id)
    {
        $data = HospitalTourTimeline::findOrFail($id);
        if ($data) {
            return response()->json(['success' => true, 'message' => 'Timeline details.', 'data' => $data], 200);
        } else {
            return response()->json(['success' => false, 'message' => "Something went wrong.", 'data' => []], 200);
        }
    }

    public function destroy($id)
    {
        $timeline = HospitalTourTimeline::findOrFail($id);
        $path = storage_path($timeline->image_path . $timeline->image_name);
        if (File::exists($path)) {
            File::delete($path);
        }
        if ($timeline->delete()) {
            return response()->json(['success' => true, 'message' => 'Timeline details has been deleted.', 'data' => []], 200);
        } else {
            return response()->json(['success' => false, 'message' => "Somthing went wrong.", 'data' => []], 200);
        }
    }
}
