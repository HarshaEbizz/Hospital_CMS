<?php

namespace App\Http\Controllers\Admin\CMS;

use App\Http\Controllers\Controller;
use App\Models\AboutUs;
use App\Models\ChairmanMessage;
use App\Models\ChairmanSpeak;
use App\Models\ManagementMessage;
use App\Models\VisionAndMission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;
use Auth;
use Illuminate\Support\Facades\File;

class AboutUsController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }
    public function index()
    {
        $speak = ChairmanSpeak::first();
        $about_us = AboutUs::first();
        $message = ChairmanMessage::first();
        $this->data['speak'] = $speak;
        $this->data['about_us'] = $about_us;
        $this->data['message'] = $message;
        return view('admin.pages.about_us.index')->with($this->data);
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'top_heading' => 'required',
            'bottom_heading' => 'required',
            'bottom_sub_heading' => 'required',
            'top_cover_image' => 'mimes:jpeg,jpg,png,gif,jfif',
            'bottom_cover_image' => 'mimes:jpeg,jpg,png,gif,jfif,svg',
        ]);
        if ($validator->fails()) {
            return response()->json(['success' => false, 'code' => 202, 'message' => implode("<br>", $validator->errors()->all())], 202);
        }
        $about_us = AboutUs::first();
        if (empty($about_us)) {
            $about_us = new AboutUs();
            $about_us->top_heading = $request->top_heading;
            $about_us->bottom_heading = $request->bottom_heading;
            $about_us->bottom_sub_heading = $request->bottom_sub_heading;
            $about_us->image_path = 'app/public/uploads/about_us/';
            if ($request->hasfile('top_cover_image')) {
                $about_us->top_cover_image = $this->crop_image_url($request->top_cover_image_url, 'public/uploads/about_us/');
            }
            if ($request->hasfile('bottom_cover_image')) {
                $about_us->bottom_cover_image = $this->crop_image_url($request->bottom_cover_image_url, 'public/uploads/about_us/');
            }
        } else {
            $about_us->top_heading = $request->top_heading;
            $about_us->bottom_heading = $request->bottom_heading;
            $about_us->bottom_sub_heading = $request->bottom_sub_heading;
            $about_us->image_path = 'app/public/uploads/about_us/';
            if ($request->hasfile('top_cover_image')) {
                $path = storage_path('app/public/uploads/about_us/' . $about_us->top_cover_image);
                if (File::exists($path)) {
                    File::delete($path);
                }
                $about_us->top_cover_image = $this->crop_image_url($request->top_cover_image_url, 'public/uploads/about_us/');
            }
            if ($request->hasfile('bottom_cover_image')) {
                $path = storage_path('app/public/uploads/about_us/' . $about_us->bottom_cover_image);
                if (File::exists($path)) {
                    File::delete($path);
                }
                $about_us->bottom_cover_image = $this->crop_image_url($request->bottom_cover_image_url, 'public/uploads/about_us/');
            }
        }
        if ($about_us->save()) {
            return response()->json(['success' => true, 'message' => 'Data Added Sucessfully.', 'data' => $about_us], 200);
        }
    }

    public function bottom_banner_status($id)
    {
        $about_us = AboutUs::findOrFail($id);
        $about_us->bottom_banner_status = !$about_us->bottom_banner_status;
        $about_us->save();
        return response()->json(['success' => true, 'message' => 'Bottom banner status change sucessfully.', 'data' => []], 200);
    }
    public function chairman_message_store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'message_heading' => 'required',
            'message_sub_heading' => 'required',
            'message_paragraph_1' => 'required',
            'message_paragraph_2' => 'required',
            'message_person_photo' => 'mimes:jpeg,jpg,png,gif,jfif',
            'message_signature_photo' => 'mimes:jpeg,jpg,png,gif,jfif,svg',
        ]);
        if ($validator->fails()) {
            return response()->json(['success' => false, 'code' => 202, 'message' => implode("<br>", $validator->errors()->all())], 202);
        }
        $message = ChairmanMessage::first();
        if (empty($message)) {
            $message = new ChairmanMessage();
            $message->message_heading = $request->message_heading;
            $message->message_sub_heading = $request->message_sub_heading;
            $message->message_paragraph_1 = $request->message_paragraph_1;
            $message->message_paragraph_2 = $request->message_paragraph_2;
            $message->image_path = 'app/public/uploads/about_us/chairman_message/';
            if ($request->hasfile('message_person_photo')) {
                $message->message_person_photo = $this->crop_image_url($request->message_person_photo_url, 'public/uploads/about_us/chairman_message/');
            }
            if ($request->hasfile('message_signature_photo')) {
                $message->message_signature_photo = $this->crop_image_url($request->message_signature_photo_url, 'public/uploads/about_us/chairman_message/');
            }
        } else {
            $message->message_heading = $request->message_heading;
            $message->message_sub_heading = $request->message_sub_heading;
            $message->message_paragraph_1 = $request->message_paragraph_1;
            $message->message_paragraph_2 = $request->message_paragraph_2;
            if ($request->hasfile('message_person_photo')) {
                $path = storage_path('app/public/uploads/about_us/chairman_message/' . $message->message_person_photo);
                if (File::exists($path)) {
                    File::delete($path);
                }
                $message->message_person_photo = $this->crop_image_url($request->message_person_photo_url, 'public/uploads/about_us/chairman_message/');
            }
            if ($request->hasfile('message_signature_photo')) {
                $path = storage_path('app/public/uploads/about_us/chairman_message/' . $message->message_signature_photo);
                if (File::exists($path)) {
                    File::delete($path);
                }
                $message->message_signature_photo = $this->crop_image_url($request->message_signature_photo_url, 'public/uploads/about_us/chairman_message/');  
            }
        }
        $message->save();
        if ($message->save()) {
            return response()->json(['success' => true, 'message' => 'Data Added Sucessfully.', 'data' => $message], 200);
        }
    }
    public function chairman_speak_store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'heading' => 'required',
            'sub_heading' => 'required',
            'paragraph_1' => 'required',
            'paragraph_2' => 'required',
            'paragraph_3' => 'required',
            'person_photo' => 'mimes:jpeg,jpg,png,gif,jfif',
            'signature_photo' => 'mimes:jpeg,jpg,png,gif,jfif,svg',
        ]);
        if ($validator->fails()) {
            return response()->json(['success' => false, 'code' => 202, 'message' => implode("<br>", $validator->errors()->all())], 202);
        }
        $speak = ChairmanSpeak::first();
        if (empty($speak)) {
            $speak = new ChairmanSpeak();
            $speak->heading = $request->heading;
            $speak->sub_heading = $request->sub_heading;
            $speak->paragraph_1 = $request->paragraph_1;
            $speak->paragraph_2 = $request->paragraph_2;
            $speak->paragraph_3 = $request->paragraph_3;
            $speak->image_path = 'app/public/uploads/about_us/chairman_speak/';
            if ($request->hasfile('person_photo')) {
                $speak->person_photo = $this->crop_image_url($request->person_photo_url, 'public/uploads/about_us/chairman_speak/');
            }
            if ($request->hasfile('signature_photo')) {
                $speak->signature_photo =  $this->crop_image_url($request->signature_photo_url, 'public/uploads/about_us/chairman_speak/');
            }
        } else {
            $speak->heading = $request->heading;
            $speak->sub_heading = $request->sub_heading;
            $speak->paragraph_1 = $request->paragraph_1;
            $speak->paragraph_2 = $request->paragraph_2;
            $speak->paragraph_3 = $request->paragraph_3;
            $speak->image_path = 'app/public/uploads/about_us/chairman_speak/';
            if ($request->hasfile('person_photo')) {
                $path = storage_path('app/public/uploads/about_us/chairman_speak/' . $speak->person_photo);
                if (File::exists($path)) {
                    File::delete($path);
                }
                $speak->person_photo = $this->crop_image_url($request->person_photo_url, 'public/uploads/about_us/chairman_speak/');
            }
            if ($request->hasfile('signature_photo')) {
                $path = storage_path('app/public/uploads/about_us/chairman_speak/' . $speak->signature_photo);
                if (File::exists($path)) {
                    File::delete($path);
                }
                $speak->signature_photo =  $this->crop_image_url($request->signature_photo_url, 'public/uploads/about_us/chairman_speak/');
            }
        }
        $speak->save();
        if ($speak->save()) {
            return response()->json(['success' => true, 'message' => 'Data Added Sucessfully.', 'data' => $speak], 200);
        }
    }
    public function vision_create()
    {
        return view('admin.pages.about_us.vision_mission.create');
    }
    public function vision_store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'description' => 'required',
            'color_code' => 'required',
            'vision_image' => 'required|mimes:jpeg,jpg,png,gif,jfif',
        ]);
        if ($validator->fails()) {
            return response()->json(['success' => false, 'code' => 202, 'message' => implode("<br>", $validator->errors()->all())], 202);
        }
        // dd($request);
        $data = new VisionAndMission();
        $data->title = $request->title;
        $data->description = $request->description;
        $data->color_code = $request->color_code;
        $data->image_path = 'app/public/uploads/about_us/vision_mission/';
        if ($request->hasfile('vision_image')) {
            $data->image_name = $this->crop_image_url($request->vision_image_url, 'public/uploads/about_us/vision_mission/');
        }
        if ($data->save()) {
            return response()->json(['success' => true, 'message' => 'Data Added Sucessfully.', 'data' => $data], 200);
        }
    }
    public function vision_list()
    {
        $data = VisionAndMission::get();
        return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('status', function (VisionAndMission $visionAndMission) {
                if ($visionAndMission->status == 1) {
                    $status_link = '<input class="tgl mission_status_btn" type="checkbox" data-toggle="toggle" data-width="100" id="status" name="status" data-on="Show" data-off="Hide" data-onstyle="success"
                data-offstyle="danger" value="' . $visionAndMission->id . '" checked>';
                } else {
                    $status_link = '<input class="tgl mission_status_btn" type="checkbox" data-toggle="toggle" data-width="100" id="status" name="status" data-on="Show" data-off="Hide" data-onstyle="success"
                data-offstyle="danger" value="' . $visionAndMission->id . '">';
                }
                return $status_link;
            })
            ->addColumn('actions', function (VisionAndMission $visionAndMission) {
                $edit_link = ' <a class="btn btn-primary btn-icon-text edit_data"  href="' . route('admin.vision_edit', [$visionAndMission->id]) . '"> <i class="fa fa-solid fa-pencil"></i></a>';

                $delete_link = '<a  class="btn btn-danger btn-icon-text delete_data"  href="' . route('admin.vision_delete', [$visionAndMission->id]) . '"> <i class="fa fa-solid fa-trash"></i></a>';

                return $edit_link . ' ' . $delete_link;
            })
            ->rawColumns(['status', 'actions'])
            ->toJson();
    }
    public function vision_edit($id)
    {
        $vision_mission = VisionAndMission::findOrFail($id);
        return view('admin.pages.about_us.vision_mission.edit', compact('vision_mission'));
    }
    public function vision_update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'edit_title' => 'required',
            'edit_description' => 'required',
            'edit_color_code' => 'required',
            'edit_vision_image' => 'mimes:jpeg,jpg,png,gif,jfif',
        ]);
        if ($validator->fails()) {
            return response()->json(['success' => false, 'code' => 202, 'message' => implode("<br>", $validator->errors()->all())], 202);
        }
        // dd($request);
        $data = VisionAndMission::findOrFail($id);
        $data->title = $request->edit_title;
        $data->description = $request->edit_description;
        $data->color_code = $request->edit_color_code;
        $data->image_path = 'app/public/uploads/about_us/vision_mission/';
        if ($request->hasfile('edit_vision_image')) {
            $path = storage_path($data->image_path . $data->image_name);
            if (File::exists($path)) {
                File::delete($path);
            }
            $data->image_name = $this->crop_image_url($request->edit_vision_image_url, 'public/uploads/about_us/vision_mission/');
        }
        if ($data->save()) {
            return response()->json(['success' => true, 'message' => 'Data Updated Sucessfully.', 'data' => $data], 200);
        }
    }
    public function vision_delete($id)
    {
        $data = VisionAndMission::findOrFail($id);
        $path = storage_path($data->image_path . $data->image_name);
        if (File::exists($path)) {
            File::delete($path);
        }
        if ($data->delete()) {
            return response()->json(['success' => true, 'message' => 'Data has been deleted.', 'data' => []], 200);
        } else {
            return response()->json(['success' => false, 'message' => 'Something went wrong.', 'data' => []], 200);
        }
    }
    public function vision_status($id)
    {
        $data = VisionAndMission::findOrFail($id);
        $data->status = !$data->status;
        $data->save();
        return response()->json(['success' => true, 'message' => 'Data status change sucessfully.', 'data' => []], 200);
    }
    public function management_message_create()
    {
        return view('admin.pages.about_us.management_message.create');
    }
    public function management_message_store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'designation' => 'required',
            'message' => 'required',
            'management_photo' => 'required|mimes:jpeg,jpg,png,gif,jfif',
        ]);
        if ($validator->fails()) {
            return response()->json(['success' => false, 'code' => 202, 'message' => implode("<br>", $validator->errors()->all())], 202);
        }
        $management_message = new ManagementMessage();
        $management_message->name = $request->name;
        $management_message->designation = $request->designation;
        $management_message->message = $request->message;
        $management_message->expertise = $request->expertise;
        $management_message->professional_highlights = $request->professional_highlight;
        $management_message->image_path = 'app/public/uploads/about_us/management_message/';
        if ($request->hasfile('management_photo')) {
            $management_message->image_name  = $this->crop_image_url($request->management_photo_url, 'public/uploads/about_us/management_message/');
        }
        // dd($management_message);
        if ($management_message->save()) {
            return response()->json(['success' => true, 'message' => 'Data Added Sucessfully.', 'data' => $management_message], 200);
        }
    }
    public function management_message_list()
    {
        $data = ManagementMessage::get();
        return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('status', function (ManagementMessage $management_message) {
                if ($management_message->status == 1) {
                    $status_link = '<input class="tgl message_status_btn" type="checkbox" data-toggle="toggle" data-width="100" id="status" name="status" data-on="Show" data-off="Hide" data-onstyle="success"
                data-offstyle="danger" value="' . $management_message->id . '" checked>';
                } else {
                    $status_link = '<input class="tgl message_status_btn" type="checkbox" data-toggle="toggle" data-width="100" id="status" name="status" data-on="Show" data-off="Hide" data-onstyle="success"
                data-offstyle="danger" value="' . $management_message->id . '">';
                }
                return $status_link;
            })
            ->addColumn('actions', function (ManagementMessage $management_message) {
                $edit_link = ' <a type="button" class="btn btn-primary btn-icon-text edit_message"  href="' . route('admin.management_message_edit', [$management_message->id]) . '"> <i class="fa fa-solid fa-pencil"></i></a>';

                $delete_link = '<a  class="btn btn-danger btn-icon-text delete_message"  href="' . route('admin.management_message_delete', [$management_message->id]) . '"> <i class="fa fa-solid fa-trash"></i></a>';

                return $edit_link . ' ' . $delete_link;
            })
            ->rawColumns(['status', 'actions'])
            ->toJson();
    }
    public function management_message_status($id)
    {
        $data = ManagementMessage::findOrFail($id);
        $data->status = !$data->status;
        $data->save();
        return response()->json(['success' => true, 'message' => 'Data status change sucessfully.', 'data' => []], 200);
    }
    public function management_message_delete($id)
    {
        $data = ManagementMessage::findOrFail($id);
        $path = storage_path($data->image_path . $data->image_name);
        if (File::exists($path)) {
            File::delete($path);
        }
        if ($data->delete()) {
            return response()->json(['success' => true, 'message' => 'Data has been deleted.', 'data' => []], 200);
        } else {
            return response()->json(['success' => false, 'message' => 'Something went wrong.', 'data' => []], 200);
        }
    }
    public function management_message_edit($id)
    {
        $mangement_msg = ManagementMessage::findOrFail($id);
        return view('admin.pages.about_us.management_message.edit',compact('mangement_msg'));
    }
    public function management_message_update(Request $request, $id)
    {
        // dd($request);
        $validator = Validator::make($request->all(), [
            'edit_name' => 'required',
            'edit_designation' => 'required',
            'edit_message' => 'required',
            'edit_management_photo' => 'mimes:jpeg,jpg,png,gif,jfif',
        ]);
        if ($validator->fails()) {
            return response()->json(['success' => false, 'code' => 202, 'message' => implode("<br>", $validator->errors()->all())], 202);
        }
        // dd($request);
        $management_message = ManagementMessage::findOrFail($id);
        $management_message->name = $request->edit_name;
        $management_message->designation = $request->edit_designation;
        $management_message->message = $request->edit_message;
        $management_message->expertise = $request->edit_expertise;
        $management_message->professional_highlights = $request->edit_professional_highlight;
        $management_message->image_path = 'app/public/uploads/about_us/management_message/';
        if ($request->hasfile('edit_management_photo')) {
            $path = storage_path('app/public/uploads/about_us/management_message/' . $management_message->image_name);
            if (File::exists($path)) {
                File::delete($path);
            }
            $management_message->image_name  = $this->crop_image_url($request->edit_management_photo_url, 'public/uploads/about_us/management_message/');
        }
        if ($management_message->save()) {
            return response()->json(['success' => true, 'message' => 'Data Updated Sucessfully.', 'data' => $management_message], 200);
        }
    }
}
