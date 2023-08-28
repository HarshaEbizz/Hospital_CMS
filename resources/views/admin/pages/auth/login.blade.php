@extends('admin.layouts.login_before')
@section('content')
@php
$setting = App\Models\Setting::get();
$LOGO = collect($setting)->where('setting_key', 'HOSPITAL_LOGO')->first();
if($LOGO && $LOGO->status){
$image = str_replace("/public","",url('/')).'/storage/'.$LOGO->setting_value;
}else{
$image = asset('admin_assets/images/kiranimage/kiran_logo.png');
}
@endphp
<div class="container-fluid p-0">
    <div class="row m-0">
        <div class="col-12 p-0">
            <div class="login-card">
                <div>
                    <div class="login-main">
                        <form action="{{route('admin.dologin')}}" method="POST" id="login_form" name="login_form" class="theme-form">
                            @csrf
                            <div>
                                <a class="logo" href="#">
                                    <img src="{{ $image }}" alt="looginpage">
                                    <img class="img-fluid for-dark" src="{{ asset('admin_assets/images/logo/logo_dark.png') }}" alt="looginpage"></a>
                            </div>
                            <h4>Login to account</h4>
                            <svg class="line" width="90" height="9" viewBox="0 0 90 9" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M2.02431 7.09212C30.0244 6.09216 52.5242 0.592169 87.8787 2.46593" stroke="#02BB9A" stroke-width="3" stroke-linecap="round"></path>
                            </svg>
                            <p>Enter your email & password to login</p>
                            <div class="form-group">
                                <label class="col-form-label">Email Address</label>
                                <input class="form-control" type="text" id="login_email" name="login_email" @if(Cookie::has('adminuser')) value="{{Cookie::get('adminuser')}}" @endif placeholder="Test@gmail.com" required>
                                @if ($errors->has('login_email'))
                                <span class="text-danger invalid">{{ $errors->first('login_email') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label class="col-form-label">Password</label>
                                <input class="form-control" type="password" id="login_password" name="login_password" @if(Cookie::has('adminpwd')) value="{{Cookie::get('adminpwd')}}" @endif   placeholder="*********" required>
                                <div class="show-hide"><span class="show"> </span></div>
                                @if ($errors->has('login_password'))
                                <span class="text-danger invalid">{{ $errors->first('login_password') }}</span>
                                @endif
                            </div>
                            <div class="form-group mb-0">
                                <div class="row" style="align-items: flex-start;">
                                    <div class="col-7">
                                        <div class="checkbox p-0">
                                            <input id="checkbox1" type="checkbox" name="remember_token" @if(Cookie::has('adminuser')) checked @endif>
                                            <label class="text-muted" for="checkbox1">Remember password</label>
                                        </div>
                                    </div>
                                    <div class="col-5">
                                        <a class="link for-pass" href="{{url('/admin/change_password')}}">Forgot password?</a>
                                    </div>
                                </div>

                                <button class="btn mt-3 btn-block sign_green" type="submit">Login</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
<script>
    $('#login_password').keyup(function(){
        if (jQuery.trim($("#login_password").val()).length == 0) {
            this.value = $.trim(this.value);
        }
    })
    $('#login_email').keyup(function(){
        if (jQuery.trim($("#login_password").val()).length == 0) {
            this.value = $.trim(this.value);
        }
    })
    </script>
@endsection