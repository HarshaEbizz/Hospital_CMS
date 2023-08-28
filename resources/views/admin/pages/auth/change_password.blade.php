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
<!-- login page start-->
<div class="container-fluid p-0">
    <div class="row m-0">
        <div class="col-12 p-0">
            <div class="login-card">
                <div>
                    <div class="login-main">
                        <form action="{{route('admin.change_password_form')}}" method="POST" id="change_password_form" name="change_password_form" class="theme-form">
                            @csrf
                            <div>
                                <a class="logo" href="#">
                                    <img src="{{ $image }}" alt="looginpage">
                                    <img class="img-fluid for-dark" src="{{ asset('admin_assets/images/logo/logo_dark.png') }}" alt="looginpage">
                                </a>
                            </div>
                            <h4>Change Your Password</h4>
                            <div class="form-group">
                                <label class="col-form-label">Email Address</label>
                                <input class="form-control" type="email" id="email" name="email" placeholder="Test@gmail.com">
                            </div>
                            <div class="form-group mb-0">
                                <a href="{{url('/admin')}}" class="btn modelbtn mt-3 btn-block" type="button" style="margin-right: 10px;">Back</a>
                                <button class="btn sign_green mt-3 btn-block" type="submit">Next</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection