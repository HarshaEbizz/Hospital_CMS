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
                            <h1>Sign up </h1>
                            <p>Erat maecenas turpis eget sollicitudin eget eu tellus.</p>
                        </div>
                        <div class="login_inputs">
                            <form action="{{ route('do_signup') }}" method="POST" id="signup_form" name="signup_form">
                                @csrf
                                <div class="mb-3">
                                    <label for="exampleInputName" class="form-label">Name</label>
                                    <input type="text" class="form-control" id="signup_name" name="signup_name" >
                                </div>
                                <div class="mb-3">
                                    <label for="signup_email" class="form-label">Email address</label>
                                    <input type="email" class="form-control left_icon_input" id="signup_email" name="signup_email" >
                                    <span toggle="#password-field" class=" field-icon toggle-password">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M17.9028 8.85107L13.4596 12.4641C12.6201 13.1301 11.4389 13.1301 10.5994 12.4641L6.11865 8.85107" stroke="#02BB9A" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M16.9089 21C19.9502 21.0084 22 18.5095 22 15.4384V8.57001C22 5.49883 19.9502 3 16.9089 3H7.09114C4.04979 3 2 5.49883 2 8.57001V15.4384C2 18.5095 4.04979 21.0084 7.09114 21H16.9089Z" stroke="#02BB9A" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    </span>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">Password</label>
                                    <input id="signup_password" name="signup_password" type="password" class="form-control left_icon_input" id="exampleInputPassword1">
                                    <span toggle="#signup_password" class=" field-icon toggle-password">
                                        <img src="{{ asset('assets/images/pass_hide.png') }}" class="eye_close" alt="">
                                        <img src="{{ asset('assets/images/pass_show.png') }}" class="eye_open" alt="">
                                    </span>
                                </div>
                                <div class="input-group inline_drop">
                                    <div class="form-group inline_drop">
                                        <svg class="right-aro" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M4.24106 7.7459C4.53326 7.44784 4.99051 7.42074 5.31272 7.66461L5.40503 7.7459L12 14.4734L18.595 7.7459C18.8872 7.44784 19.3444 7.42074 19.6666 7.66461L19.7589 7.7459C20.0511 8.04396 20.0777 8.51037 19.8386 8.83904L19.7589 8.93321L12.582 16.2541C12.2898 16.5522 11.8325 16.5793 11.5103 16.3354L11.418 16.2541L4.24106 8.93321C3.91965 8.60534 3.91965 8.07376 4.24106 7.7459Z" fill="#130F26" />
                                        </svg>
                                        <select class="form-select custom_select form-control" id="country_code" name="country_code">
                                            @foreach($country as $countries)
                                            <option value="{{$countries->phonecode}}" @if($countries->phonecode=="+91") selected @endif>{{$countries->phonecode}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <input type="number" style="min-width: max-content;" class="form-control left_icon_input" id="signup_contact" name="signup_contact" aria-label="Text input with segmented dropdown button">
                                    <span>
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M11.5317 12.4724C15.5208 16.4604 16.4258 11.8467 18.9656 14.3848C21.4143 16.8328 22.8216 17.3232 19.7192 20.4247C19.3306 20.737 16.8616 24.4943 8.1846 15.8197C-0.493478 7.144 3.26158 4.67244 3.57397 4.28395C6.68387 1.17385 7.16586 2.58938 9.61449 5.03733C12.1544 7.5765 7.54266 8.48441 11.5317 12.4724Z" stroke="#02BB9A" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    </span>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="dropdown_max">
                                            <label for="state" class="form-label">State</label>
                                            <div class="form-group inline_drop">
                                                <svg class="right-aro" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M4.24106 7.7459C4.53326 7.44784 4.99051 7.42074 5.31272 7.66461L5.40503 7.7459L12 14.4734L18.595 7.7459C18.8872 7.44784 19.3444 7.42074 19.6666 7.66461L19.7589 7.7459C20.0511 8.04396 20.0777 8.51037 19.8386 8.83904L19.7589 8.93321L12.582 16.2541C12.2898 16.5522 11.8325 16.5793 11.5103 16.3354L11.418 16.2541L4.24106 8.93321C3.91965 8.60534 3.91965 8.07376 4.24106 7.7459Z" fill="#130F26" />
                                                </svg>
                                                <select class="form-select form-control custom_select" id="state" name="state">
                                                    <option value="">Select State</option>
                                                    @foreach($state as $state_list)
                                                    <option value="{{$state_list->id}}">{{$state_list->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="dropdown_max">
                                            <label for="exampleInputCity" class="form-label">City </label>
                                            <div class="form-group inline_drop">
                                                <select class="form-select form-control custom_select" id="city" name="city">
                                                    <option value="">Select city</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3 form-check">
                                    <input type="checkbox" class="form-check-input" name="signup_agree" id="signup_agree">
                                    <label class="form-check-label" for="signup_agree">I agree to the <a href="javascript:void(0)" class="link"> Terms And Conditions </a></label>
                                    <span class="required" id="errors-list"></span>
                                </div>
                                <button type="submit" class="btn btn-green_block">Signup</button>
                            </form>
                            <p class="sign_up_tagline">
                                Already have an account? <a href="{{url('/login')}}"> Login </a>
                            </p>
                            <button type="button" class="btn career1_blue_btn me-4" data-bs-toggle="modal" data-bs-target="#otp_verification_model">verification_code
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="otp_verification_model" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-lg-5">
                <div class="pb-4 text-center">
                    <h2 class="blue_sub_title">OTP Verification</h2>
                    <svg class="line" width="90" height="9" viewBox="0 0 90 9" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M2.02431 7.09212C30.0244 6.09216 52.5242 0.592169 87.8787 2.46593" stroke="#02BB9A" stroke-width="3" stroke-linecap="round">
                        </path>
                    </svg>
                    <p class="modal-text">
                    </p>
                </div>
                <form action="#" method="POST" id="otp_verification_form" name="otp_verification_form">
                    @csrf
                    <div class="container booking_form">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <label for="contact" class="form-label">Mobile Numbers</label>
                                    <div class="input-group inline_drop">
                                        <div class="form-group inline_drop">
                                            <svg class="right-aro" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M4.24106 7.7459C4.53326 7.44784 4.99051 7.42074 5.31272 7.66461L5.40503 7.7459L12 14.4734L18.595 7.7459C18.8872 7.44784 19.3444 7.42074 19.6666 7.66461L19.7589 7.7459C20.0511 8.04396 20.0777 8.51037 19.8386 8.83904L19.7589 8.93321L12.582 16.2541C12.2898 16.5522 11.8325 16.5793 11.5103 16.3354L11.418 16.2541L4.24106 8.93321C3.91965 8.60534 3.91965 8.07376 4.24106 7.7459Z" fill="#130F26" />
                                            </svg>
                                            <select class="form-control form-select custom_select" id="country_code" name="country_code">
                                                @foreach($country as $countries)
                                                <option value="{{$countries->phonecode}}" @if($countries->phonecode=="+91") selected @endif>{{$countries->phonecode}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <input type="number" class="form-control left_icon_input" id="verification_contact" name="verification_contact" aria-label="Text input with segmented dropdown button" placeholder="123 456 7890">
                                        <span><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M11.5317 12.4724C15.5208 16.4604 16.4258 11.8467 18.9656 14.3848C21.4143 16.8328 22.8216 17.3232 19.7192 20.4247C19.3306 20.737 16.8616 24.4943 8.1846 15.8197C-0.493478 7.144 3.26158 4.67244 3.57397 4.28395C6.68387 1.17385 7.16586 2.58938 9.61449 5.03733C12.1544 7.5765 7.54266 8.48441 11.5317 12.4724Z" stroke="#02BB9A" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                            </svg>
                                        </span>
                                    </div>
                                    <label id="verification_contact-error" class="error" for="verification_contact"></label>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <div class="form-group">
                                        <label for="verification_code" class="form-label">Code</label>
                                        <input type="text" class="form-control" id="verification_code" name="verification_code">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-center">
                            <button type="submit" class="btn btn donat_btn mt-3">
                                Submit
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
<script>
    $("document").ready(function() {
        $('select[name="state"]').on('change', function() {
            var state_id = $(this).val();
            if (state_id) {
                $.ajax({
                    url: 'get_city/' + state_id,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        $('select[name="city"]').empty();
                        $.each(data, function(key, value) {
                            $('select[name="city"]').append('<option value=" ' + value.id + '">' + value.city + '</option>');
                        })
                    }
                })
            } else {
                $('select[name="city"]').empty();
            }
        });
    });
</script>
@endsection
