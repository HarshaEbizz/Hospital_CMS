@extends('layouts.from')
@section('content')
<div class="bg-info login_main">
    <!-- Container containing all contents -->
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-9 col-lg-7 col-xl-6 login_center_max">
                <!-- White Container -->
                <div class="container bg-white rounded mt-2 mb-2 px-0">
                    <!-- Main Heading -->
                    <div class="login_container">
                        <div class="login_title">
                            <h1>Welcome Back </h1>
                            <p>Welcome Back ! Please enter your details</p>
                        </div>
                        <div class="login_inputs">
                            <form action="#" method="POST" id="login_form" name="login_form">
                                @csrf
                                <div class="mb-3">
                                    <label for="login_email" class="form-label">Email address</label>
                                    <input type="email" class="form-control" id="login_email" name="login_email" >
                                    <div id="emailHelp" class="form-text">We'll never share your email with
                                        anyone else.</div>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">Password</label>
                                    <input id="login_password" name="login_password" type="password" class="form-control left_icon_input" id="exampleInputPassword1">
                                    <span toggle="#login_password" class=" field-icon toggle-password">
                                        <img src="{{ asset('assets/images/pass_hide.png') }}" class="eye_close" alt="">
                                        <img src="{{ asset('assets/images/pass_show.png') }}" class="eye_open" alt="">
                                    </span>
                                </div>
                                <div class="mb-3 form-check">
                                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                    <label class="form-check-label" for="exampleCheck1">Remember me</label>
                                    <a href="{{url('/recover_mail')}}" class="forgot_link"> Forgot Password?</a>
                                </div>
                                <button type="submit" class="btn btn-green_block">Login</button>
                            </form>
                            <p class="sign_up_tagline">
                                Don’t have an account? <a href="{{url('/signup')}}"> Sign Up </a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
@endsection