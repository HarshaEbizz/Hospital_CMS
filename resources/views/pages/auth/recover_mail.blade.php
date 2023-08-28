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
                            <h1>Forgot password </h1>
                            <p>Enter the email address you see on domain. We'll send you a link to reset your password</p>
                        </div>
                        <div class="login_inputs">
                            <form action="#" method="POST" id="recover_mail_form" name="recover_mail_form">
                                @csrf
                                <div class="mb-3">
                                    <label for="recover_email" class="form-label">Email address</label>
                                    <input type="email" class="form-control left_icon_input" id="recover_email" name="recover_email" >
                                    <span toggle="#password-field" class=" field-icon toggle-password">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M17.9028 8.85107L13.4596 12.4641C12.6201 13.1301 11.4389 13.1301 10.5994 12.4641L6.11865 8.85107" stroke="#02BB9A" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M16.9089 21C19.9502 21.0084 22 18.5095 22 15.4384V8.57001C22 5.49883 19.9502 3 16.9089 3H7.09114C4.04979 3 2 5.49883 2 8.57001V15.4384C2 18.5095 4.04979 21.0084 7.09114 21H16.9089Z" stroke="#02BB9A" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    </span>
                                </div>
                                <button type="submit" class="btn btn-green_block">Reset Password</button>
                                <p class="sign_up_tagline">
                                    Go back to <a href="{{url('/login')}}"> Login </a>
                                </p>
                            </form>
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