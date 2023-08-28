<?php

namespace App\Http\Controllers\Admin\Medic;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Medic;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\File;

class MedicController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }
    public function index()
    {
        $medic_details = Medic::first();
        return view('admin.pages.medic.index', compact('medic_details'));
    }

    public function create()
    {
        return view('admin.pages.medic.create');
    }

    public function store(Request $request)
    {
        $add_medic = Medic::first();

        if (empty($add_medic)) {
            $validator = Validator::make($request->all(), [
                'heading' => 'required|max:30',
                'cover_image' => 'required|max:10000|mimes:jpg,jpeg,png,ico,bmp,gif,svg',
                'title_1' => 'required|max:30',
                'image_1' => 'required|max:10000|mimes:jpg,jpeg,png,ico,bmp,gif,svg',
                'description_1' => 'required',
                'title_2' => 'required|max:30',
                'image_2' => 'required|max:10000|mimes:jpg,jpeg,png,ico,bmp,gif,svg',
                'description_2' => 'required',
            ]);


            if ($validator->fails()) {
                return response()->json(['success' => false, 'code' => 202, 'message' => implode("<br>", $validator->errors()->all())], 202);
            }

            $message = "Content added sucessfully";
            $add_medic = new Medic();
            $add_medic->heading = $request->input('heading');
            $add_medic->image_path = 'app/public/uploads/kiran_medic/';
            $add_medic->title_1 = $request->input('title_1');
            $add_medic->description_1 = $request->input('description_1');
            $add_medic->title_2 = $request->input('title_2');
            $add_medic->description_2 = $request->input('description_2');

            if ($request->hasFile('cover_image')) {
                $add_medic->cover_image  = $this->crop_image_url($request->cover_image_url, 'public/uploads/kiran_medic/');
            }
            if ($request->hasFile('image_1')) {
                $add_medic->image_1  = $this->crop_image_url($request->image_1_url, 'public/uploads/kiran_medic/');
            }
            if ($request->hasFile('image_2')) {
                $add_medic->image_2  = $this->crop_image_url($request->image_2_url, 'public/uploads/kiran_medic/');
            }
        } else {
            $validator = Validator::make($request->all(), [
                'heading' => 'required|max:30',
                'cover_image' => 'max:10000|mimes:jpg,jpeg,png,ico,bmp,gif,svg',
                'title_1' => 'required|max:30',
                'image_1' => 'max:10000|mimes:jpg,jpeg,png,ico,bmp,gif,svg',
                'description_1' => 'required',
                'title_2' => 'required|max:30',
                'image_2' => 'max:10000|mimes:jpg,jpeg,png,ico,bmp,gif,svg',
                'description_2' => 'required',
            ]);


            if ($validator->fails()) {
                return response()->json(['success' => false, 'code' => 202, 'message' => implode("<br>", $validator->errors()->all())], 202);
            }

            $message = "Content updated sucessfully";
            $add_medic->heading = $request->input('heading');
            $add_medic->image_path = 'app/public/uploads/kiran_medic/';
            $add_medic->title_1 = $request->input('title_1');
            $add_medic->description_1 = $request->input('description_1');
            $add_medic->title_2 = $request->input('title_2');
            $add_medic->description_2 = $request->input('description_2');

            if ($request->hasFile('cover_image')) {
                $path = storage_path('app/public/uploads/kiran_medic/' . $add_medic->cover_image);

                if (File::exists($path)) {
                    File::delete($path);
                }
                $add_medic->cover_image  = $this->crop_image_url($request->cover_image_url, 'public/uploads/kiran_medic/');
            } else {
                $add_medic->cover_image = $add_medic->cover_image;
            }

            if ($request->hasFile('image_1')) {
                $path = storage_path('app/public/uploads/kiran_medic/' . $add_medic->image_1);

                if (File::exists($path)) {
                    File::delete($path);
                }
                $add_medic->image_1  = $this->crop_image_url($request->image_1_url, 'public/uploads/kiran_medic/');
            } else {
                $add_medic->image_1 = $add_medic->image_1;
            }

            if ($request->hasFile('image_2')) {
                $path = storage_path('app/public/uploads/kiran_medic/' . $add_medic->image_2);

                if (File::exists($path)) {
                    File::delete($path);
                }
                $add_medic->image_2  = $this->crop_image_url($request->image_2_url, 'public/uploads/kiran_medic/');
            } else {
                $add_medic->image_2 = $add_medic->image_2;
            }
        }
        $add_medic->save();


        if ($add_medic) {
            return response()->json(['success' => true, 'message' => $message, 'data' => $add_medic], 200);
        }
    }
}
