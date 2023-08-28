<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\Admin;
use Str;
class ChangePasswordController extends Controller
{
    public function change_password()
    {
        if (Auth::guard('admin')->check()) {
            return redirect('admin/home');
        }
        return view('admin.pages.auth.change_password');
    }
    public function change_password_form(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
        ]);
        if ($validator->fails()) {
            return response()->json(['success' => false,'code'=>202,'message' => implode("<br>",$validator->errors()->all())], 202);
        }
        $admin = Admin::where('email',$request->email)->first();
        if(!$admin)
        {
            return response()->json(['success' => false,'code'=>202,'message' => "Email does not exist in database."], 202);
        }
        $token = Str::random(64);
        DB::table('password_resets')->insert([
            'email' => $request->email,
            'token' => $token,
            'created_at' => Carbon::now()
        ]);
        Mail::send('admin.pages.mail.reset_password_mail', ['token' => $token,'email' => $request->email], function($message) use($request){
            $message->to($request->input('email'));
            $message->subject('Reset password link');
        });
        return response()->json(['success' => true, 'message' => 'We have e-mailed your password reset link!', 'data' =>[] ], 200);
    }
}
