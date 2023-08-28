<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\RoomCategory;
use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Response;
use Auth;
use Yajra\DataTables\DataTables;

class RoomController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }
    public function index()
    {
        return view('admin.pages.rooms.index');
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'room_name' => 'required',
            "room_image" => 'required|mimes:jpeg,png,jpg|max:2048',
            "room_category" => 'required'
        ]);
        if ($validator->fails()) {
            return response()->json(['success' => false, 'code' => 202, 'message' => implode("<br>", $validator->errors()->all())], 202);
        }

        $room = new Room;
        $room->room_name = $request->room_name;
        $room->room_category_id = $request->room_category;
        $room->image_path = 'app/public/uploads/rooms/';
        if($request->has('description')){
            $room->description = $request->description;
        }
        if ($request->hasfile('room_image')) {
            $room->image_name = $this->crop_image_url($request->room_image_url, 'public/uploads/rooms/');
        }
        if($room->save())
        {
            return response()->json(['success' => true, 'message' => 'Room Added sucessfully.'], 200);
        }
        else {
            return response()->json(['success' => false, 'message' => "Somthing went wrong."], 202);
        }
    }

    public function list()
    {
        $data = Room::with('room_category')->get();
        return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('category_name', function (Room $record){
               return  $record->room_category->name;
            })
            ->addColumn('image', function (Room $record) {
                $image_name = str_replace("/public", "", url('/')) . '/storage/' . $record->image_path . $record->image_name;
                return '<img src="' . $image_name . '" style="height:75px;">';
            })
            ->addColumn('actions', function (Room $record) {

                $action_link = ' <a class="btn btn-primary btn-icon-text edit_room" href="' . route('admin.rooms.show',[$record->id]) . '"> <i class="fa fa-solid fa-pencil"></i></a> <a  class="btn btn-danger btn-icon-text delete_room"  href="' . route('admin.rooms.destroy', [$record->id]) . '"> <i class="fa fa-solid fa-trash"></i></a>';
                return $action_link;
            })
            ->rawColumns(['category_name','image', 'actions'])
            ->make(true);
    }
    public function show($id)
    {
        $data = Room::findOrFail($id);
        if ($data) {
            return response()->json(['success' => true, 'message' => 'Room details.', 'data' => $data], 200);
        } else {
            return response()->json(['success' => false, 'message' => "Something went wrong.", 'data' => []], 200);
        }
    }
    public function get_room_categories(Request $request)
    {
        $dropdown_html = "<option value=''>Select</option>";
        $room_categories = RoomCategory::get();
        if($room_categories->count() > 0)
        {
            foreach ($room_categories as $room_category) {
                $dropdown_html .= "<option value='".$room_category->id."'>".$room_category->name."</option>";
            }
        }
        return response()->json(['success' => false, 'code' => 200, 'data' => $dropdown_html], 200);
    }
    public function destroy($id)
    {
        $room = Room::findOrFail($id);
        $path = storage_path($room->image_path.$room->image_name);
        if (File::exists($path)) {
            File::delete($path);
        }
        if ($room->delete()) {
            return response()->json(['success' => true, 'message' => 'Room details has been deleted.', 'data' => []], 200);
        } else {
            return response()->json(['success' => false, 'message' => "Somthing went wrong.", 'data' => []], 200);
        }
    }
    public function update_room(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'room_name' => 'required',
            "room_image" => 'mimes:jpeg,png,jpg|max:2048',
            "room_category" => 'required'
        ]);
        if ($validator->fails()) {
            return response()->json(['success' => false, 'code' => 202, 'message' => implode("<br>", $validator->errors()->all())], 202);
        }
        $room = Room::findOrFail($request->id);
        $room->room_name = $request->room_name;
        $room->room_category_id = $request->room_category;
        if($request->has('description')){
            $room->description = $request->description;
        }
        $room->image_path = 'app/public/uploads/rooms/';
        if ($request->hasfile('room_image')) {
            $path = storage_path($room->image_path.$room->image_name);
            if (File::exists($path)) {
                File::delete($path);
            }
            $room->image_name = $this->crop_image_url($request->edit_room_image_url, 'public/uploads/rooms/');
        }
        if($room->save())
        {
            return response()->json(['success' => true, 'message' => 'Room details updated sucessfully.'], 200);
        }
        else {
            return response()->json(['success' => false, 'message' => "Somthing went wrong."], 202);
        }
    }
}
