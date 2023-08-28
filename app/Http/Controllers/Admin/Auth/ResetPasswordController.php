<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Validator;
use DB;
use Hash;
class ResetPasswordController extends Controller
{
    public function reset_password($token)
    {
        if (Auth::guard('admin')->check()) {
            return redirect('admin/home');
        }
        return view('admin.pages.auth.reset_password',['token' => $token]);
    }
    public function reset_password_form(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'password' => 'required|min:6',
            'confirm_pass' => 'required|min:6',
        ]);
        if ($validator->fails()) {
            return response()->json(['success' => false, 'code' => 202, 'message' => implode("<br>", $validator->errors()->all())], 202);
        }
        $reset_record = DB::table('password_resets')->where(['token' => $request->reset_password_token])->first();

        if (!$reset_record) {
            return response()->json(['success' => false, 'code' => 202, 'message' => "Invalid token"], 202);
        }
        Admin::where('email', $reset_record->email)->update(['password' => Hash::make($request->password)]);
        DB::table('password_resets')->where(['email' => $reset_record->email])->delete();
        return response()->json(['success' => true, 'message' => 'Password change sucessfully.', 'data' => []], 200);
    }
}
