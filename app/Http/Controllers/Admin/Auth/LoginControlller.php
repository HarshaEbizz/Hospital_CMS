<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Auth;
use Str;
use Cookie;

class LoginControlller extends Controller
{

    public function login()
    {
        if (Auth::guard('admin')->check()) {
            return redirect('admin/home');
        }
        return view('admin.pages.auth.login');
    }
    public function dologin(Request $request)
    {
        // dd($request);
        $validator = Validator::make($request->all(), [
            'login_email' => 'required|email',
            'login_password' => 'required|min:6',
        ]);
        if ($validator->fails()) {
            return response()->json(['success' => false,'code'=>202,'message' => implode("<br>",$validator->errors()->all())], 202);
        }
        if($request->remember_token){
            if($request->remember_token=="on"){
                $token = Str::random(64);
                $admin = Admin::first(); 
                $admin->remember_token = $token;
                $admin->save();
                Cookie::queue('adminuser',$request->login_email,240);
                Cookie::queue('adminpwd',$request->login_password,240);
            }
        }else{
            Cookie::queue('adminuser',$request->login_email,-240);
            Cookie::queue('adminpwd',$request->login_password,-240);
        }
        if (Auth::guard('admin')->attempt(['email' => $request->login_email, 'password' => $request->login_password])) {
            return response()->json(['success' => true, 'code'=>200, 'message' => 'Logged in sucessfully.', 'data' => []], 200);
        } else {
            return response()->json(['success' => false,'code'=>202, 'message' => 'Invalid credentials', 'data' => []], 202);
        }
    }
    public function logout(Request $request)
    {
        if(Auth::guard('admin')->check())
            Auth::guard('admin')->logout();
        return redirect('/admin/login');
    }
}
