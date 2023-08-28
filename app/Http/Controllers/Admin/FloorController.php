<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Floor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Response;
use Auth;

class FloorController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }
    public function index()
    {
        return view('admin.pages.floors.index');
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'floor_title' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json(['success' => false, 'code' => 202, 'message' => implode("<br>", $validator->errors()->all())], 202);
        }

        $floor = new Floor;
        $floor->floor_title = $request->floor_title;
        if($floor->save())
        {
            return response()->json(['success' => true, 'message' => 'Floor Added sucessfully.'], 200);
        }
        else {
            return response()->json(['success' => false, 'message' => "Somthing went wrong."], 202);
        }
    }
    public function list()
    {
        $data = Floor::get();
        return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('actions', function (Floor $floor) {
                // $action_link = '<button type="button" class="btn btn-primary btn-icon-text edit_floor" value="' . $floor->id . '"><i class="fa fa-solid fa-pencil"></i></button>  <button type="button" class="btn btn-danger btn-icon-text delete_floor" value="' . $floor->id . '"> <i class="fa fa-solid fa-trash"></i></button>';

                $action_link = ' <a class="btn btn-primary btn-icon-text edit_floor" href="' . route('admin.floors.show', [$floor->id]) . '" data-id="' . $floor->id . '"> <i class="fa fa-solid fa-pencil"></i></a> <a  class="btn btn-danger btn-icon-text delete_floor"  href="' . route('admin.floors.destroy', [$floor->id]) . '"> <i class="fa fa-solid fa-trash"></i></a>';

                return $action_link;
            })
            ->rawColumns(['actions'])
            ->make(true);
    }
    public function show($id)
    {
        $floor = Floor::findOrFail($id);
        if ($floor) {
            return response()->json(['success' => true, 'message' => 'Floor details.', 'data' => $floor], 200);
        } else {
            return response()->json(['success' => false, 'message' => "Something went wrong.", 'data' => []], 200);
        }
    }
    public function update_floor(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'floor_title' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json(['success' => false, 'code' => 202, 'message' => implode("<br>", $validator->errors()->all())], 202);
        }
        $floor = Floor::findOrFail($request->id);
        if($floor)
        {
            $floor->floor_title = $request->floor_title;
            if($floor->save())
            {
                return response()->json(['success' => true, 'message' => 'Floor updated sucessfully.'], 200);
            }
            else{
                return response()->json(['success' => false, 'message' => 'Something went wrong.'], 202);
            }
        }
        else{
            return response()->json(['success' => false, 'message' => 'Something went wrong.'], 202);
        }
    }
    public function destroy($id)
    {
        $floor = Floor::findOrFail($id);
        if ($floor->delete()) {
            return response()->json(['success' => true, 'message' => 'Floor has been deleted.', 'data' => []], 200);
        } else {
            return response()->json(['success' => false, 'message' => "Somthing went wrong.", 'data' => []], 200);
        }
    }
}

