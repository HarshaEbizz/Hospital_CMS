<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Wing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Response;
use Auth;

class WingController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index()
    {
        return view('admin.pages.wings.index');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'wing_title' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json(['success' => false, 'code' => 202, 'message' => implode("<br>", $validator->errors()->all())], 202);
        }

        $wing = new Wing;
        $wing->wing_title = $request->wing_title;
        if($wing->save())
        {
            return response()->json(['success' => true, 'message' => 'Wing Added sucessfully.'], 200);
        }
        else {
            return response()->json(['success' => false, 'message' => "Somthing went wrong."], 202);
        }
    }

    public function list()
    {
        $data = Wing::get();
        return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('actions', function (Wing $wing) {
                // $action_link = '<button type="button" class="btn btn-primary btn-icon-text edit_wing" value="' . $wing->id . '"><i class="fa fa-solid fa-pencil"></i></button>  <button type="button" class="btn btn-danger btn-icon-text delete_wing" value="' . $wing->id . '"> <i class="fa fa-solid fa-trash"></i></button>';

                $action_link = ' <a class="btn btn-primary btn-icon-text edit_wing" href="' . route('admin.wings.show', [$wing->id]) . '" data-id="' . $wing->id . '"> <i class="fa fa-solid fa-pencil"></i></a> <a  class="btn btn-danger btn-icon-text delete_wing"  href="' . route('admin.wings.destroy', [$wing->id]) . '"> <i class="fa fa-solid fa-trash"></i></a>';

                return $action_link;
            })
            ->rawColumns(['actions'])
            ->make(true);
    }

    public function show($id)
    {
        $wing = Wing::findOrFail($id);
        if ($wing) {
            return response()->json(['success' => true, 'message' => 'Floor details.', 'data' => $wing], 200);
        } else {
            return response()->json(['success' => false, 'message' => "Something went wrong.", 'data' => []], 200);
        }
    }

    public function update_wing(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'wing_title' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json(['success' => false, 'code' => 202, 'message' => implode("<br>", $validator->errors()->all())], 202);
        }
        $wing = Wing::findOrFail($request->id);
        if($wing)
        {
            $wing->wing_title = $request->wing_title;
            if($wing->save())
            {
                return response()->json(['success' => true, 'message' => 'Wing updated sucessfully.'], 200);
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
        $wing = Wing::findOrFail($id);
        if ($wing->delete()) {
            return response()->json(['success' => true, 'message' => 'Wing has been deleted.', 'data' => []], 200);
        } else {
            return response()->json(['success' => false, 'message' => "Somthing went wrong.", 'data' => []], 200);
        }
    }
}
