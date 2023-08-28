<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\RoomCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Response;
use Auth;

class RoomCategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }
    public function index()
    {
        return view('admin.pages.rooms.categories');
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'name' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json(['success' => false, 'code' => 202, 'message' => implode("<br>", $validator->errors()->all())], 202);
        }

        $room_category = new RoomCategory;
        $room_category->name = $request->name;
        if($room_category->save())
        {
            return response()->json(['success' => true, 'message' => 'Room category Added sucessfully.'], 200);
        }
        else {
            return response()->json(['success' => false, 'message' => "Somthing went wrong."], 202);
        }
    }
    public function list()
    {
        $data = RoomCategory::get();
        return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('actions', function (RoomCategory $cat) {
                // $action_link = '<button type="button" class="btn btn-primary btn-icon-text edit_room_category" value="' . $cat->id . '"><i class="fa fa-solid fa-pencil"></i></button>  <button type="button" class="btn btn-danger btn-icon-text delete_room_category" value="' . $cat->id . '"> <i class="fa fa-solid fa-trash"></i></button>';

                $action_link = ' <a class="btn btn-primary btn-icon-text edit_room_category" href="' . route('admin.room_categories.show', [$cat->id]) . '"> <i class="fa fa-solid fa-pencil"></i></a> <a  class="btn btn-danger btn-icon-text delete_room_category"  href="' . route('admin.room_categories.destroy', [$cat->id]) . '"> <i class="fa fa-solid fa-trash"></i></a>';

                return $action_link;
            })
            ->rawColumns(['actions'])
            ->make(true);
    }
    public function show($id)
    {
        $data = RoomCategory::findOrFail($id);
        if ($data) {
            return response()->json(['success' => true, 'message' => 'Room category details.', 'data' => $data], 200);
        } else {
            return response()->json(['success' => false, 'message' => "Something went wrong.", 'data' => []], 200);
        }
    }
    public function update_room_category(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'name' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json(['success' => false, 'code' => 202, 'message' => implode("<br>", $validator->errors()->all())], 202);
        }
        $room_category = RoomCategory::findOrFail($request->id);
        if($room_category)
        {
            $room_category->name = $request->name;
            if($room_category->save())
            {
                return response()->json(['success' => true, 'message' => 'Room category updated sucessfully.'], 200);
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
        $room_category = RoomCategory::findOrFail($id);
        if ($room_category->delete()) {
            return response()->json(['success' => true, 'message' => 'Room category has been deleted.', 'data' => []], 200);
        } else {
            return response()->json(['success' => false, 'message' => "Somthing went wrong.", 'data' => []], 200);
        }
    }
}
?>
