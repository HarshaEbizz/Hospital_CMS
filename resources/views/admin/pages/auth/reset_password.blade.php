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
                        <form action="{{route('admin.reset_password_form')}}" method="POST" id="reset_password_form" name="reset_password_form" class="theme-form">
                            @csrf
                            <div>
                                <a class="logo" href="#">
                                    <img src="{{ $image }}" alt="looginpage">
                                    <img class="img-fluid for-dark" src="{{ asset('admin_assets/images/logo/logo_dark.png') }}" alt="looginpage">
                                </a>
                            </div>
                            <h4>Create New Password</h4>
                            <input type="hidden" id="reset_password_token" name="reset_password_token" value="{{$token}}">
                            <div class="form-group" style="position: relative;">
                                <label class="password">New Password</label>
                                <input class="form-control" type="password" name="password" id="password" placeholder="*********">
                                <div class="show-hide  "><span class="show password"> </span></div>
                            </div>
                            <div class="form-group" style="position: relative;">
                                <label class="col-form-label">Confirm Password</label>
                                <input class="form-control" type="password" name="confirm_pass" id="confirm_pass" placeholder="*********">
                                <div class="show-hide "><span class="show confirm_pass"> </span></div>
                            </div>
                            <div class="form-group mb-0">
                                <a href="{{url('admin/change_password')}}" class="btn modelbtn mt-3 btn-block" type="button" style="margin-right: 10px;">Back</a>
                                <button class="btn sign_green mt-3 btn-block" type="submit">Sign in</button>
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
    $('.show-hide span').click(function() {
        if ($(this).hasClass('password')) {
            if ($(this).hasClass('show')) {
                $('input[name="password"]').attr('type', 'text');
                $(this).removeClass('show');
            } else {
                $('input[name="password"]').attr('type', 'password');
                $(this).addClass('show');
            }
        }else{
            if ($(this).hasClass('show')) {
                $('input[name="confirm_pass"]').attr('type', 'text');
                $(this).removeClass('show');
            } else {
                $('input[name="confirm_pass"]').attr('type', 'password');
                $(this).addClass('show');
            }
        }
    });
</script>
@endsection