<?php

namespace App\Http\Controllers\Admin\Home;

use App\Http\Controllers\Controller;
use App\Models\HomeContent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Response;
use Auth;

class ContentController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }
    public function index()
    {
        $home_content = HomeContent::first();
        $this->data['home_content'] = $home_content;
        return view('admin.pages.home_content')->with($this->data);
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'message_iamge' => 'required',
            'content' => 'required',
            'front_iamge' => 'mimes:jpeg,jpg,png,gif,jfif',
            'back_image' => 'mimes:jpeg,jpg,png,gif,jfif',
        ]);
        if ($validator->fails()) {
            return response()->json(['success' => false, 'code' => 202, 'message' => implode("<br>", $validator->errors()->all())], 202);
        }
        // dd($request);
        $home_content = HomeContent::first();
        if (empty($home_content)) {
            $home_content = new HomeContent();
            $home_content->message_iamge = $request->message_iamge;
            $home_content->content = $request->content;
            $home_content->image_path = 'app/public/uploads/home_content/';
            if ($request->hasfile('front_iamge')) {
                $home_content->front_iamge = $this->crop_image_url($request->front_iamge_url, 'public/uploads/home_content/');
            }
            if ($request->hasfile('back_image')) {
                $home_content->back_image = $this->crop_image_url($request->back_image_url, 'public/uploads/home_content/');
            }
            $home_content->save();
        } else {
            $fileName = '';
            $fileName1 ='';
            $home_content->message_iamge = $request->message_iamge;
            $home_content->content = $request->content;
            $home_content->image_path = 'app/public/uploads/home_content/';
            if ($request->hasfile('front_iamge')) {
                $path = storage_path('app/public/uploads/home_content/' . $home_content->front_iamge);
                if (File::exists($path)) {
                    File::delete($path);
                }
                $home_content->front_iamge = $this->crop_image_url($request->front_iamge_url, 'public/uploads/home_content/');
            }
            if ($request->hasfile('back_image')) {
                $path = storage_path('app/public/uploads/home_content/' . $home_content->back_image);
                if (File::exists($path)) {
                    File::delete($path);
                }
                $home_content->back_image = $this->crop_image_url($request->back_image_url, 'public/uploads/home_content/');
            }
            $home_content->save();
        }
         return response()->json(['success' => true, 'message' => 'Patient’s Rights & Responsibilities has been updated.', 'data' => $home_content], 200);
    }
}