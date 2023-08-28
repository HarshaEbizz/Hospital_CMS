<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserVerify;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class AuthController extends Controller
{
    public function do_signup(Request $request)
    {
        $signup = new user();

        $signup->name = $request->input('signup_name');
        $signup->email = $request->input('signup_email');
        $signup->password = Hash::make($request->password);
        $signup->country_code = $request->input('country_code');
        $signup->mobile_no = $request->input('signup_contact');
        $signup->state = $request->input('state');
        $signup->city = $request->input('city');
        $signup->save();

        /* Email Verification */
        $token = Str::random(64);
        UserVerify::create([
            'user_id' => $signup->id,
            'token' => $token
        ]);
        Mail::send('pages.emailVerificationEmail', ['token' => $token], function($message) use($request){
            $message->to($request->input('signup_email'));
            $message->subject('Email Verification Mail');
        });

        Auth::login($signup);

        return response()->json(['success' => true, 'message' => 'Registration completed sucessfully.', 'data' => $signup], 200);
    }

    public function uniqueemail(Request $request)
    {
        $user = User::whereEmail($request->input('signup_email'))->first();

        if ($user) {
            echo "false";
        } else {
            echo "true";
        }
    }

    public function uniquemobile(Request $request)
    {
        $country_code = $request->input('country_code');
        $signup_contact = $request->input('signup_contact');

        $user = User::where('country_code', '=', $country_code)->where('mobile_no', '=', $signup_contact)->first();

        if ($user) {
            echo "false";
        } else {
            echo "true";
        }
    }

    public function verifyAccount($token)
    {
        $verifyUser = UserVerify::where('token', $token)->first();
        // $id = $verifyUser->user_id;
        // $find_user = User::find($id);

        $message = 'Sorry your email cannot be identified.';

        if(!is_null($verifyUser) ){
            $user = $verifyUser->user;

            if(!$user->is_email_verified) {
                $verifyUser->user->is_email_verified = 1;
                $verifyUser->user->save();
                $message = "Your e-mail is verified. You can now login.";
            } else {
                $message = "Your e-mail is already verified. You can now login.";
            }
        }
        return redirect()->route('login')->with('message', $message);
    }
}
