@extends('layouts.master')
@section('content')

<!-- first section -->
<section class="page_heading home_visit_section">

    <div class="container">
        <h1 class="home_visit_title">
            Home Visit for Lab
        </h1>
        <nav style="--bs-breadcrumb-divider: '>>';" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{url('/home')}}" class="text-dark">Home</a></li>
                <li class="breadcrumb-item " aria-current="page">Booking Appointment</li>
                <li class="breadcrumb-item " aria-current="page">Home Visit for Lab</li>
            </ol>
            <p>

            </p>
            <a href="{{url('/contact_us')}}" style="display: inline-block;" class="green_btn">Contact us
                <svg width="22" height="21" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M8.2459 19.7589C7.94784 19.4667 7.92074 19.0095 8.16461 18.6873L8.2459 18.595L14.9734 12L8.2459 5.40503C7.94784 5.11283 7.92074 4.65558 8.16461 4.33338L8.2459 4.24106C8.54396 3.94887 9.01037 3.9223 9.33904 4.16137L9.43321 4.24106L16.7541 11.418C17.0522 11.7102 17.0793 12.1675 16.8354 12.4897L16.7541 12.582L9.43321 19.7589C9.10534 20.0804 8.57376 20.0804 8.2459 19.7589Z" fill="white" />
                </svg>
            </a>
        </nav>
    </div>
</section>
<!-- first section end-->

<!-- second section-->
<section class="page_heading text-white online_tour_banner mt-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="online_banner_content text-center">
                    <h1>Coming Soon</h1>
                    <p class="tour_banner_text w-100 mt-4"></p>
                </div>

                <div class="d-flex justify-content-center mt-4">
                    <button class="btn online_green_btn px-5">Notify Me!</button>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- end second section -->

<!-- Third section-->
<section class="py-lg-5">
    <div class="container">
        <div class="booking_heading text-center py-4">
            <div>
                <h2 class="blue_sub_title">Home visit booking for Laboratory testing </h2>
                <svg class="line" width="90" height="9" viewBox="0 0 90 9" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path d="M2.02431 7.09212C30.0244 6.09216 52.5242 0.592169 87.8787 2.46593" stroke="#02BB9A"
                        stroke-width="3" stroke-linecap="round"></path>
                </svg>
                <p></p>
            </div>
        </div>

        <div class="booking_form">
            <div class="row pt-lg-5">
                <div class="col-lg-4">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Name <span
                                style="color:#ED1C24;">*</span></label>
                        <input type="email" class="form-control" id="exampleInputEmail1"
                            >
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Last name<span
                                style="color:#ED1C24;">*</span></label>
                        <input type="email" class="form-control" id="exampleInputEmail1"
                            >
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Age<span
                                style="color:#ED1C24;">*</span></label>
                        <input type="email" class="form-control" id="exampleInputEmail1"
                            >
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Email <span
                                style="color:#ED1C24;">*</span></label>
                        <input type="email" class="form-control left_icon_input" id="exampleInputEmail1"
                             placeholder="Ebizzinfotech@mail.com">
                        <span toggle="#password-field" class=" field-icon toggle-password">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M17.9028 8.85107L13.4596 12.4641C12.6201 13.1301 11.4389 13.1301 10.5994 12.4641L6.11865 8.85107"
                                    stroke="#02BB9A" stroke-width="1.5" stroke-linecap="round"
                                    stroke-linejoin="round"></path>
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M16.9089 21C19.9502 21.0084 22 18.5095 22 15.4384V8.57001C22 5.49883 19.9502 3 16.9089 3H7.09114C4.04979 3 2 5.49883 2 8.57001V15.4384C2 18.5095 4.04979 21.0084 7.09114 21H16.9089Z"
                                    stroke="#02BB9A" stroke-width="1.5" stroke-linecap="round"
                                    stroke-linejoin="round"></path>
                            </svg>

                        </span>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Mobile Number <span
                                style="color:#ED1C24;">*</span></label>
                        <div class="input-group inline_drop">

                            <div class="form-group inline_drop">
                                {{-- <svg class="right-aro" width="24" height="24" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M4.24106 7.7459C4.53326 7.44784 4.99051 7.42074 5.31272 7.66461L5.40503 7.7459L12 14.4734L18.595 7.7459C18.8872 7.44784 19.3444 7.42074 19.6666 7.66461L19.7589 7.7459C20.0511 8.04396 20.0777 8.51037 19.8386 8.83904L19.7589 8.93321L12.582 16.2541C12.2898 16.5522 11.8325 16.5793 11.5103 16.3354L11.418 16.2541L4.24106 8.93321C3.91965 8.60534 3.91965 8.07376 4.24106 7.7459Z"
                                        fill="#130F26" />
                                </svg> --}}
                                <select class="form-select" id="exampleFormControlSelect1">
                                    <option selected>+91</option>
                                    <option>+91</option>

                                </select>
                            </div>

                            <input type="text" class="form-control left_icon_input"
                                aria-label="Text input with segmented dropdown button"
                                placeholder="123 456 7890">
                            <span><svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M11.5317 12.4724C15.5208 16.4604 16.4258 11.8467 18.9656 14.3848C21.4143 16.8328 22.8216 17.3232 19.7192 20.4247C19.3306 20.737 16.8616 24.4943 8.1846 15.8197C-0.493478 7.144 3.26158 4.67244 3.57397 4.28395C6.68387 1.17385 7.16586 2.58938 9.61449 5.03733C12.1544 7.5765 7.54266 8.48441 11.5317 12.4724Z"
                                        stroke="#02BB9A" stroke-width="1.5" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                </svg>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Address <span
                                style="color:#ED1C24;">*</span></label>
                        <input type="email" class="form-control" id="exampleInputEmail1"
                            >
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="dropdown_max">
                        <label for="exampleInputEmail1" class="form-label">Area<span
                                style="color:#ED1C24;">*</span></label>
                        <div class="form-group inline_drop">

                            {{-- <svg class="right-aro" width="24" height="24" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M4.24106 7.7459C4.53326 7.44784 4.99051 7.42074 5.31272 7.66461L5.40503 7.7459L12 14.4734L18.595 7.7459C18.8872 7.44784 19.3444 7.42074 19.6666 7.66461L19.7589 7.7459C20.0511 8.04396 20.0777 8.51037 19.8386 8.83904L19.7589 8.93321L12.582 16.2541C12.2898 16.5522 11.8325 16.5793 11.5103 16.3354L11.418 16.2541L4.24106 8.93321C3.91965 8.60534 3.91965 8.07376 4.24106 7.7459Z"
                                    fill="#130F26" />
                            </svg> --}}
                            <select class="form-select" id="exampleFormControlSelect1">
                                <option selected></option>
                                <option>surat</option>
                                <option>mumbai</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="dropdown_max">
                        <label for="exampleInputEmail1" class="form-label">City <span
                                style="color:#ED1C24;">*</span></label>
                        <div class="form-group inline_drop">

                            {{-- <svg class="right-aro" width="24" height="24" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M4.24106 7.7459C4.53326 7.44784 4.99051 7.42074 5.31272 7.66461L5.40503 7.7459L12 14.4734L18.595 7.7459C18.8872 7.44784 19.3444 7.42074 19.6666 7.66461L19.7589 7.7459C20.0511 8.04396 20.0777 8.51037 19.8386 8.83904L19.7589 8.93321L12.582 16.2541C12.2898 16.5522 11.8325 16.5793 11.5103 16.3354L11.418 16.2541L4.24106 8.93321C3.91965 8.60534 3.91965 8.07376 4.24106 7.7459Z"
                                    fill="#130F26" />
                            </svg> --}}
                            <select class="form-select" id="exampleFormControlSelect1">
                                <option selected></option>
                                <option>surat</option>
                                <option>mumbai</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="dropdown_max">
                        <label for="exampleInputEmail1" class="form-label">State <span
                                style="color:#ED1C24;">*</span></label>
                        <div class="form-group inline_drop">

                            {{-- <svg class="right-aro" width="24" height="24" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M4.24106 7.7459C4.53326 7.44784 4.99051 7.42074 5.31272 7.66461L5.40503 7.7459L12 14.4734L18.595 7.7459C18.8872 7.44784 19.3444 7.42074 19.6666 7.66461L19.7589 7.7459C20.0511 8.04396 20.0777 8.51037 19.8386 8.83904L19.7589 8.93321L12.582 16.2541C12.2898 16.5522 11.8325 16.5793 11.5103 16.3354L11.418 16.2541L4.24106 8.93321C3.91965 8.60534 3.91965 8.07376 4.24106 7.7459Z"
                                    fill="#130F26" />
                            </svg> --}}
                            <select class="form-select" id="exampleFormControlSelect1">
                                <option selected></option>
                                <option>surat</option>
                                <option>mumbai</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="visit_text">
                    <p>Product Details</p>
                </div>

                <div class="col-lg-6">
                    <div class="dropdown_max">
                        <label for="exampleInputEmail1" class="form-label">Test Type<span
                                style="color:#ED1C24;">*</span></label>
                        <div class="form-group inline_drop">

                            {{-- <svg class="right-aro" width="24" height="24" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M4.24106 7.7459C4.53326 7.44784 4.99051 7.42074 5.31272 7.66461L5.40503 7.7459L12 14.4734L18.595 7.7459C18.8872 7.44784 19.3444 7.42074 19.6666 7.66461L19.7589 7.7459C20.0511 8.04396 20.0777 8.51037 19.8386 8.83904L19.7589 8.93321L12.582 16.2541C12.2898 16.5522 11.8325 16.5793 11.5103 16.3354L11.418 16.2541L4.24106 8.93321C3.91965 8.60534 3.91965 8.07376 4.24106 7.7459Z"
                                    fill="#130F26" />
                            </svg> --}}
                            <select class="form-select" id="exampleFormControlSelect1">
                                <option selected></option>
                                <option>India</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="dropdown_max">
                        <label for="exampleInputEmail1" class="form-label">Select date<span
                                style="color:#ED1C24;">*</span></label>
                        <div class="form-group inline_drop">

                            <svg width="25" height="25" viewBox="0 0 25 25" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M19.0889 4.15234H5.08887C3.9843 4.15234 3.08887 5.04777 3.08887 6.15234V20.1523C3.08887 21.2569 3.9843 22.1523 5.08887 22.1523H19.0889C20.1934 22.1523 21.0889 21.2569 21.0889 20.1523V6.15234C21.0889 5.04777 20.1934 4.15234 19.0889 4.15234Z"
                                    stroke="#2DBF78" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" />
                                <path d="M16.0889 2.15234V6.15234" stroke="#2DBF78" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M8.08887 2.15234V6.15234" stroke="#2DBF78" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M3.08887 10.1523H21.0889" stroke="#2DBF78" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                            <select class="form-control" id="exampleFormControlSelect1">
                                <option selected></option>
                                <option>India</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="col-lg-2">
                    <div class="dropdown_max">
                        <label for="exampleInputEmail1" class="form-label">Select date<span
                                style="color:#ED1C24;">*</span></label>
                        <div class="form-group inline_drop">

                            <svg width="25" height="25" viewBox="0 0 25 25" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M19.0889 4.15234H5.08887C3.9843 4.15234 3.08887 5.04777 3.08887 6.15234V20.1523C3.08887 21.2569 3.9843 22.1523 5.08887 22.1523H19.0889C20.1934 22.1523 21.0889 21.2569 21.0889 20.1523V6.15234C21.0889 5.04777 20.1934 4.15234 19.0889 4.15234Z"
                                    stroke="#2DBF78" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" />
                                <path d="M16.0889 2.15234V6.15234" stroke="#2DBF78" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M8.08887 2.15234V6.15234" stroke="#2DBF78" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M3.08887 10.1523H21.0889" stroke="#2DBF78" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                            <select class="form-control" id="exampleFormControlSelect1">
                                <option selected></option>
                                <option>India</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="col-lg-2">
                    <div class="dropdown_max">
                        <label for="exampleInputEmail1" class="form-label">Select Time*<span
                                style="color:#ED1C24;">*</span></label>
                        <div class="form-group inline_drop">

                            {{-- <svg class="right-aro" width="24" height="24" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M4.24106 7.7459C4.53326 7.44784 4.99051 7.42074 5.31272 7.66461L5.40503 7.7459L12 14.4734L18.595 7.7459C18.8872 7.44784 19.3444 7.42074 19.6666 7.66461L19.7589 7.7459C20.0511 8.04396 20.0777 8.51037 19.8386 8.83904L19.7589 8.93321L12.582 16.2541C12.2898 16.5522 11.8325 16.5793 11.5103 16.3354L11.418 16.2541L4.24106 8.93321C3.91965 8.60534 3.91965 8.07376 4.24106 7.7459Z"
                                    fill="#130F26" />
                            </svg> --}}
                            <select class="form-select" id="exampleFormControlSelect1">
                                <option selected></option>
                                <option>India</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>

            <div class="d-flex justify-content-center">
                <button type="button" class="btn btn donat_btn mt-sm-5 mt-3" data-bs-toggle="modal"
                    data-bs-target="#exampleModal">
                    Submit
                </button>

                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body p-5 pb-0">
                                <div class="mb-4">
                                    <h2 class="modal-title blue_sub_title" id="exampleModalLabel">Select Payment
                                        Methods</h2>
                                    <svg class="line" width="90" height="9" viewBox="0 0 90 9" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M2.02431 7.09212C30.0244 6.09216 52.5242 0.592169 87.8787 2.46593"
                                            stroke="#02BB9A" stroke-width="3" stroke-linecap="round"></path>
                                    </svg>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="flexRadioDefault"
                                        id="flexRadioDefault1">
                                    <label class="form-check-label mb-4 donat_check_label"
                                        for="flexRadioDefault1">
                                        Cards (credit / debit)
                                    </label>
                                </div>

                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="mb-4">
                                            <label for="exampleInputEmail1" class="form-label">Card
                                                Number</label>
                                            <input type="email" class="form-control" id="exampleInputEmail1"
                                                 placeholder="000 0000 000">
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="mb-4">
                                            <label for="exampleInputEmail1" class="form-label">Expiry
                                                Date</label>
                                            <input type="email" class="form-control" id="exampleInputEmail1"
                                                 placeholder="MM/YY">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-4">
                                            <label for="exampleInputEmail1" class="form-label">Expiry
                                                Date</label>
                                            <input type="email" class="form-control" id="exampleInputEmail1"
                                                 placeholder="***">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-check mb-4">
                                    <input class="form-check-input" type="radio" name="flexRadioDefault"
                                        id="flexRadioDefault1">
                                    <label class="form-check-label donat_check_label" for="flexRadioDefault1">
                                        Wallet
                                    </label>
                                </div>
                                <div class="form-check mb-4">
                                    <input class="form-check-input" type="radio" name="flexRadioDefault"
                                        id="flexRadioDefault1">
                                    <label class="form-check-label donat_check_label" for="flexRadioDefault1">
                                        Paytm
                                    </label>
                                </div>
                                <div class="form-check mb-4">
                                    <input class="form-check-input" type="radio" name="flexRadioDefault"
                                        id="flexRadioDefault1">
                                    <label class="form-check-label donat_check_label" for="flexRadioDefault1">
                                        Net banking
                                    </label>
                                </div>
                                <div class="form-check mb-4">
                                    <input class="form-check-input" type="radio" name="flexRadioDefault"
                                        id="flexRadioDefault1">
                                    <label class="form-check-label donat_check_label" for="flexRadioDefault1">
                                        UPI
                                    </label>
                                </div>
                            </div>
                            <div class="modal-footer p-4 border-0">
                                <div class="row w-100">
                                    <div class="col-lg-6 mb-lg-0 mb-3">
                                        <button type="button" class="btn donate_blue_btn w-100"
                                            data-bs-dismiss="modal">Back</button>
                                    </div>
                                    <div class="col-lg-6 mb-lg-0 mb-3">
                                        <button type="button" class="btn donate_green_btn w-100">Confirm Payment
                                            200.00₹</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- third section end -->

<!-- Patients Speak start -->
{{-- @include('layouts.include.reviews') --}}
<!-- Patients Speak end -->

@endsection

@section('script')
<script>
    $("document").ready(function() {
        $('select[name="state"]').on('change', function() {
            var state_id = $(this).val();
            console.log(state_id);
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
