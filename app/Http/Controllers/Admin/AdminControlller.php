<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AdminControlller extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }
    public function remove_profile_photo(Request $request)
    {
        $logged_id = Auth::guard('admin')->user()->id;
        $admin = Admin::find($logged_id);
        $path = storage_path('app/public/uploads/admin_profile/' . $admin->image_name);
        if (File::exists($path)) {
            File::delete($path);
            $admin->image = '';
        }
        if ($admin->save()) {
            return response()->json(['success' => true, 'code' => 200, 'message' => "Profile image remove sucessfully!"], 200);
        }
    }
    public function update_profile(Request $request)
    {
        $logged_id = Auth::guard('admin')->user()->id;

        $validator = Validator::make($request->all(), [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => "unique:admins,email,$logged_id,id",
            'image' => 'mimes:jpeg,png,jpg|max:2048'
        ]);
        if ($validator->fails()) {
            return response()->json(['success' => false, 'code' => 202, 'message' => implode("<br>", $validator->errors()->all())], 202);
        }

        $admin = Admin::find($logged_id);
        // dd($request);
        if ($admin) {
            $admin->first_name = $request->first_name;
            if ($request->last_name)
                $admin->last_name = $request->last_name;
            if ($request->email)
                $admin->email = $request->email;
            if ($request->hasfile('image')) {
                if ($admin->image_name != '' && $admin->image_name != null) {
                    $path = storage_path('app/public/uploads/admin_profile/' . $admin->image_name);
                    if (File::exists($path)) {
                        File::delete($path);
                    }
                }
                $admin->image  = $this->crop_image_url($request->file_url, 'public/uploads/admin_profile/');
            }
            if ($admin->save()) {
                return response()->json(['success' => true, 'code' => 200, 'message' => "Profile updated!"], 200);
            }
        } else {
            return response()->json(['success' => false, 'code' => 202, 'message' => "Something went wrong!"], 202);
        }
    }
    public function update_password(Request $request)
    {
        $logged_id = Auth::guard('admin')->user()->id;
        $validator = Validator::make($request->all(), [
            'current_password' => 'required',
            'new_password' => 'required|confirmed',
        ]);
        if ($validator->fails()) {
            return response()->json(['success' => false, 'code' => 202, 'message' => implode("<br>", $validator->errors()->all())], 202);
        }
        if (!Hash::check($request->current_password, Auth::guard('admin')->user()->password)) {
            return response()->json(['success' => false, 'code' => 202, 'message' => "Current password is incorrect!"], 202);
        }
        $admin = Admin::find($logged_id);
        if ($admin) {
            $admin->password = Hash::make($request->new_password);
            if ($admin->save()) {
                return response()->json(['success' => true, 'code' => 200, 'message' => "Password changed successfully"], 200);
            }
        }
    }
    public function home()
    {
        return view('admin.pages.home');
    }
    public function about_us()
    {
        return view('admin.pages.about_us');
    }
    public function specialities()
    {
        return view('admin.pages.specialities');
    }
    public function appointment()
    {
        return view('admin.pages.appointment');
    }
    public function floor_plan()
    {
        return view('admin.pages.floor_plan');
    }
    public function profile()
    {
        return view('admin.pages.profile');
    }
}
