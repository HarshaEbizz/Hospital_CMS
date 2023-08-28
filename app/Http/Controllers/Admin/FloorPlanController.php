<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Floor;
use App\Models\Wing;
use App\Models\Section;
use App\Models\FloorPlan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Response;
use Auth;

class FloorPlanController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }
    public function index()
    {
        $data = [];
        $data['sections'] = Section::get();
        $data['wings'] = Wing::get();
        $data['floors'] = Floor::get();
        return view('admin.pages.floor_plan')->with($data);
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'floor_id' => 'required',
            'wing_id' => 'required',
            'section_ids' => 'required'
        ]);
        if ($validator->fails()) {
            return response()->json(['success' => false, 'code' => 202, 'message' => implode("<br>", $validator->errors()->all())], 202);
        }
        $exist = FloorPlan::where(['floor_id' => $request->floor_id, 'wing_id' => $request->wing_id])->first();
        if (!$exist) {
            $floor_plan = new FloorPlan;
            $floor_plan->floor_id = $request->floor_id;
            $floor_plan->wing_id = $request->wing_id;
            $floor_plan->section_ids = implode(",", $request->section_ids);
            if ($floor_plan->save()) {
                return response()->json(['success' => true, 'message' => 'Floor Plan added sucessfully.'], 200);
            } else {
                return response()->json(['success' => false, 'message' => "Somthing went wrong."], 202);
            }
        } else {
            return response()->json(['success' => false, 'message' => "Record already exist."], 202);
        }
    }
    public function update_floor_plan(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'section_ids' => 'required'
        ]);
        if ($validator->fails()) {
            return response()->json(['success' => false, 'code' => 202, 'message' => implode("<br>", $validator->errors()->all())], 202);
        }
        $floor_plan = FloorPlan::findOrFail($request->id);
        if ($floor_plan) {
            //$floor_plan->floor_id = $request->floor_id;
            //$floor_plan->wing_id = $request->wing_id;
            $floor_plan->section_ids = implode(",", $request->section_ids);
            if ($floor_plan->save()) {
                return response()->json(['success' => true, 'message' => 'Floor plan updated sucessfully.'], 200);
            } else {
                return response()->json(['success' => false, 'message' => 'Something went wrong.'], 202);
            }
        } else {
            return response()->json(['success' => false, 'message' => 'Something went wrong.'], 202);
        }
    }
    public function show($id)
    {
        $floor_plan = FloorPlan::findOrFail($id);
        if ($floor_plan) {
            return response()->json(['success' => true, 'message' => 'Floor details.', 'data' => $floor_plan], 200);
        } else {
            return response()->json(['success' => false, 'message' => "Something went wrong.", 'data' => []], 200);
        }
    }
    
    public function list()
    {
        $data = FloorPlan::with(['floor', 'wing'])->get();
        return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('floor_title', function (FloorPlan $record) {
                return $record->floor->floor_title;
            })
            ->addColumn('floor_title', function (FloorPlan $record) {
                return $record->floor->floor_title;
            })
            ->addColumn('wing_title', function (FloorPlan $record) {
                return $record->wing->wing_title;
            })
            ->addColumn('section_ids', function (FloorPlan $record) {
                $section_ids = "";
                if ($record->section_ids != '' && $record->section_ids != null) {
                    $sections = explode(",", $record->section_ids);
                    if (count($sections) > 0) {
                        foreach ($sections as $section_id) {
                            $record1 = Section::findOrFail($section_id);
                            if ($record1) {
                               $section_ids .= $record1->section_name . '<br />';
                            }
                        }
                        return $section_ids;
                    }
                }
            })
            ->addColumn('actions', function (FloorPlan $record) {

                $action_link = ' <a class="btn btn-primary btn-icon-text edit_plan" href="' . route('admin.floor_plans.show', [$record->floor_id]) . '"> <i class="fa fa-solid fa-pencil"></i></a> <a  class="btn btn-danger btn-icon-text delete_plan"  href="' . route('admin.floor_plans.destroy', [$record->floor_id]) . '"> <i class="fa fa-solid fa-trash"></i></a>';

                return $action_link;
            })
            ->rawColumns(['floor_title', 'wing_title','section_ids', 'actions'])
            ->make(true);
    }

    public function destroy($id)
    {
        $floor_plan = FloorPlan::findOrFail($id);
        if ($floor_plan->delete()) {
            return response()->json(['success' => true, 'message' => 'Floor plan has been deleted.', 'data' => []], 200);
        } else {
            return response()->json(['success' => false, 'message' => "Somthing went wrong.", 'data' => []], 200);
        }
    }
}
