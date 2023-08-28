@extends('layouts.master')
@section('style')
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/16.0.8/css/intlTelInput.css" /> --}}
    <style>
        .iti {
            width: 100%;

        }

        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        /* Firefox */
        input[type=number] {
            -moz-appearance: textfield;
        }
    </style>
@endsection
@section('content')
    <!-- first section -->
    <section class="page_heading_floor contact_us_section">
        <div class="container">
            <h1 class="contact_us_title">
                Contact Us
            </h1>
            <nav style="--bs-breadcrumb-divider: '>>';" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('/home') }}" class="text-dark">Home</a></li>
                    <li class="breadcrumb-item" aria-current="page" href="{{ url('/contact_us') }}">Contact us</li>
                </ol>
                <p>
                </p>
                <a href="{{ url('/about_us') }}" style="    display: inline-block;" class="green_btn">About Us
                    <svg width="22" height="21" viewBox="0 0 25 24" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M8.2459 19.7589C7.94784 19.4667 7.92074 19.0095 8.16461 18.6873L8.2459 18.595L14.9734 12L8.2459 5.40503C7.94784 5.11283 7.92074 4.65558 8.16461 4.33338L8.2459 4.24106C8.54396 3.94887 9.01037 3.9223 9.33904 4.16137L9.43321 4.24106L16.7541 11.418C17.0522 11.7102 17.0793 12.1675 16.8354 12.4897L16.7541 12.582L9.43321 19.7589C9.10534 20.0804 8.57376 20.0804 8.2459 19.7589Z"
                            fill="white" />
                    </svg>
                </a>
            </nav>
        </div>
    </section>
    <!-- first section end-->
    <!-- second section -->
    <section class="inter_patient_content padding_tb_100">
        <div class="container">
            <div class="text-center pb-4 contact_us_details">
                <h2 class="blue_sub_title">Get in touch!</h2>
                <svg class="line" width="90" height="9" viewBox="0 0 90 9" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path d="M2.02431 7.09212C30.0244 6.09216 52.5242 0.592169 87.8787 2.46593" stroke="#02BB9A"
                        stroke-width="3" stroke-linecap="round"></path>
                </svg>
                <p>
                </p>
            </div>
            <div class="row pt-5">
                <div class="col-lg-4 h-100 mb-sm-0 mb-3">
                    <div class="contact_us_info text-center">
                        <div class="d-flex align-items-center justify-content-center">
                            <img src="{{ asset('assets/images/address_logo.png') }}" alt="">
                        </div>
                        <div class="mt-3">
                            <h6 class="mb-0">Address</h6>
                            <p class="mb-0"><a class="call"
                                    href="https://www.google.com/maps/place/Kiran+Multi+Super+speciality+Hospital/@21.2184767,72.8368004,17z/data=!3m1!4b1!4m6!3m5!1s0x3be04ee8c2c34845:0x17961f91f6edb62c!8m2!3d21.2184767!4d72.8368004!16s%2Fg%2F11gjq1ngwn"
                                    target="blank" style="color:black">{{ $page_contain->address }}</a></p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 h-100 mb-sm-0 mb-3">
                    <div class="contact_us_info text-center">
                        <div class="d-flex align-items-center justify-content-center ">
                            <img src="{{ asset('assets/images/phone_logo.png') }}" alt="">
                        </div>
                        <div class="mt-3">
                            <h6 class="mb-0">Phone</h6>
                            <p class="mb-0"><a class="call" href="tel: {{ $page_contain->phone_number }}"
                                    style="color:black">{{ $page_contain->phone_number }}</a></p>
                        </div>

                    </div>
                </div>
                <div class="col-lg-4 h-100 mb-sm-0 mb-3">
                    <div class="contact_us_info text-center">
                        <div class="d-flex align-items-center justify-content-center">
                            <img src="{{ asset('assets/images/time_logo.png') }}" alt="">
                        </div>
                        <div class="mt-3">
                            <h6 class="mb-0">Opening Time</h6>
                            <p class="mb-0">{{ $page_contain->opening_timing }} Hrs</p>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </section>
    <!-- second section end-->
    <!-- third section-->
    <section class="contact_form_section pb-5">
        <div class="container">
            <div>
                <div class="booking_heading text-center">
                    <div>
                        <h2 class="blue_sub_title">Ask A Doctor</h2>
                        <svg class="line" width="90" height="9" viewBox="0 0 90 9" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path d="M2.02431 7.09212C30.0244 6.09216 52.5242 0.592169 87.8787 2.46593" stroke="#02BB9A"
                                stroke-width="3" stroke-linecap="round"></path>
                        </svg>
                    </div>
                </div>
                <form action="{{ route('inquiries_store') }}" method="POST" id="inquiry_form" name="inquiry_form"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="booking_form">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="exampleInputName1" class="form-label">First name*</label>
                                    <input type="text" class="form-control" id="first_name" name="first_name">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="exampleInputName1" class="form-label">Last name*</label>
                                    <input type="text" class="form-control" id="last_name" name="last_name">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email* </label>
                                    <input type="email" class="form-control left_icon_input" id="email"
                                        name="email" placeholder="Email">
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
                                    <label for="exampleInputName1" class="form-label">Mobile Number*</label>
                                    <input type="hidden" name="country_code_mobile" id="country_code_mobile" />
                                    <div class="form-group inline_drop">
                                        <input class="form-control left_icon_input" type="number" name="contact"
                                            id="contact" />
                                        <span>
                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M11.5317 12.4724C15.5208 16.4604 16.4258 11.8467 18.9656 14.3848C21.4143 16.8328 22.8216 17.3232 19.7192 20.4247C19.3306 20.737 16.8616 24.4943 8.1846 15.8197C-0.493478 7.144 3.26158 4.67244 3.57397 4.28395C6.68387 1.17385 7.16586 2.58938 9.61449 5.03733C12.1544 7.5765 7.54266 8.48441 11.5317 12.4724Z"
                                                    stroke="#02BB9A" stroke-width="1.5" stroke-linecap="round"
                                                    stroke-linejoin="round" />
                                            </svg>
                                        </span>
                                    </div>
                                </div>
                                <label id="contact-error" class="error" for="contact"></label>
                            </div>

                            {{-- <div class="col-lg-12">
                            <div class="mb-3">
                                <label for="exampleInputAddress" class="form-label">Address</label>
                                <input type="text" class="form-control" id="address" name="address">
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="dropdown_max">
                                <label for="exampleInputCountry" class="form-label">Country</label>
                                <div class="form-group inline_drop">
                                    <svg class="right-aro" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M4.24106 7.7459C4.53326 7.44784 4.99051 7.42074 5.31272 7.66461L5.40503 7.7459L12 14.4734L18.595 7.7459C18.8872 7.44784 19.3444 7.42074 19.6666 7.66461L19.7589 7.7459C20.0511 8.04396 20.0777 8.51037 19.8386 8.83904L19.7589 8.93321L12.582 16.2541C12.2898 16.5522 11.8325 16.5793 11.5103 16.3354L11.418 16.2541L4.24106 8.93321C3.91965 8.60534 3.91965 8.07376 4.24106 7.7459Z" fill="#130F26" />
                                    </svg>
                                    </span>
                                </div>
                            </div>
                            <label id="contact-error" class="error" for="contact"></label>
                        </div> --}}

                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <label for="exampleInputAddress" class="form-label">Address*</label>
                                    <input type="text" class="form-control" id="address" name="address">
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="dropdown_max">
                                    <label for="exampleInputCountry" class="form-label">Country*</label>
                                    <div class="form-group inline_drop">
                                        {{-- <svg class="right-aro" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M4.24106 7.7459C4.53326 7.44784 4.99051 7.42074 5.31272 7.66461L5.40503 7.7459L12 14.4734L18.595 7.7459C18.8872 7.44784 19.3444 7.42074 19.6666 7.66461L19.7589 7.7459C20.0511 8.04396 20.0777 8.51037 19.8386 8.83904L19.7589 8.93321L12.582 16.2541C12.2898 16.5522 11.8325 16.5793 11.5103 16.3354L11.418 16.2541L4.24106 8.93321C3.91965 8.60534 3.91965 8.07376 4.24106 7.7459Z" fill="#130F26" />
                                    </svg> --}}
                                        <select class="form-select" id="country" name="country">
                                            <option value="" disabled selected>Select Country</option>
                                            @foreach ($country as $countries)
                                                @php
                                                    $count = App\Models\State::where('country_id', $countries->id)
                                                        ->orderby('name')
                                                        ->count();
                                                @endphp
                                                @if ($count > 0)
                                                    <option value="{{ $countries->id }}">{{ $countries->name }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="dropdown_max">
                                    <label for="state" class="form-label">State*</label>
                                    <div class="form-group inline_drop">
                                        {{-- <svg class="right-aro" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M4.24106 7.7459C4.53326 7.44784 4.99051 7.42074 5.31272 7.66461L5.40503 7.7459L12 14.4734L18.595 7.7459C18.8872 7.44784 19.3444 7.42074 19.6666 7.66461L19.7589 7.7459C20.0511 8.04396 20.0777 8.51037 19.8386 8.83904L19.7589 8.93321L12.582 16.2541C12.2898 16.5522 11.8325 16.5793 11.5103 16.3354L11.418 16.2541L4.24106 8.93321C3.91965 8.60534 3.91965 8.07376 4.24106 7.7459Z" fill="#130F26" />
                                    </svg> --}}
                                        <select class="form-select" id="state" name="state">
                                            <option value="" disabled selected>Select State</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <label for="exampleInputQuestions" class="form-label">Your Questions*</label>
                                    <input type="text" class="form-control" id="questions" name="questions">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="dropdown_max">
                                    <label for="exampleInputSpeciality" class="form-label">Specialities*</label>
                                    <div class="form-group inline_drop">
                                        {{-- <svg class="right-aro" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M4.24106 7.7459C4.53326 7.44784 4.99051 7.42074 5.31272 7.66461L5.40503 7.7459L12 14.4734L18.595 7.7459C18.8872 7.44784 19.3444 7.42074 19.6666 7.66461L19.7589 7.7459C20.0511 8.04396 20.0777 8.51037 19.8386 8.83904L19.7589 8.93321L12.582 16.2541C12.2898 16.5522 11.8325 16.5793 11.5103 16.3354L11.418 16.2541L4.24106 8.93321C3.91965 8.60534 3.91965 8.07376 4.24106 7.7459Z" fill="#130F26" />
                                    </svg> --}}
                                        <select class="form-select" id="speciality" name="speciality">
                                            <option value="" disabled selected>Select Specialities</option>
                                            @foreach ($specialities as $specialitie)
                                                <option value="{{ $specialitie->id }}">{{ $specialitie->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="formFile" class="form-label">Choose file / Reports*</label>
                                    <input class="form-control" type="file" id="report_file" name="report_file">
                                </div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-center">
                            <button type="submit" class="btn btn-green_block mt-sm-5 mt-3 w-50">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <!-- third section end -->
    <!-- forth section -->
    @include('layouts.include.map')
    <!-- forth section end -->
@endsection
@section('script')
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/16.0.8/js/intlTelInput-jquery.min.js"></script> --}}
    <script>
        // var phone_number = window.intlTelInput(document.querySelector("#contact"), {
        // // $('#contact').intlTelInput({
        //     autoHideDialCode: true,
        //     separateDialCode: true,
        //     preferredCountries: ["in"],
        //     hiddenInput: "full",
        //     utilsScript: "//cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.3/js/utils.js"
        // });



        $(document).on('change', '#report_file', function(event) {
            event.preventDefault();
            var file = event.target.files[0];
            var fileName = event.target.files[0].name;
            var Extension = fileName.substring(
                fileName.lastIndexOf('.') + 1).toLowerCase();
            if (Extension == "gif" || Extension == "png" || Extension == "bmp" || Extension == "jpeg" ||
                Extension == "jpg" || Extension == "pdf") {
                if (file) {
                    if (Extension == "jpg" || Extension == "jpeg" || Extension == "png") {
                        var image_element_name = '#' + $(this).attr('id');
                        // image_crop(image_element_name);
                    }
                }
            } else {
                this.value = "";
                $.notify('Photo only allows file types of GIF, PNG, JPG, JPEG, PDF and BMP. ', {
                    type: 'danger'
                });
            }
        });

        $("document").ready(function() {
            $(".iti--allow-dropdown").css("width", "100%");
            $('select[name="country"]').on('change', function() {
                var country_id = $(this).val();
                if (country_id) {
                    $.ajax({
                        url: 'get_state/' + country_id,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            $('select[name="state"]').empty();
                            $('select[name="state"]').append('<option value="" disabled selected>Select State</option>');
                            $.each(data, function(key, value) {
                                $('select[name="state"]').append('<option value=" ' +
                                    value.id + '">' + value.name + '</option>');
                            })
                        }
                    })
                } else {
                    $('select[name="state"]').empty();
                }
            });
        });

        $(function() {
            $('#contact').intlTelInput({
                preferredCountries: ['in'],
                separateDialCode: true,
                utilsScript: "//cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.3/js/utils.js"
            });

            $("form[name='inquiry_form']").on('submit', function(e) {
                e.preventDefault();
            }).validate({
                rules: {
                    first_name: {
                        required: true,
                        maxlength: 30,
                        validname: true,
                        normalizer: function(value) {
                            return $.trim(value);
                        },
                    },
                    last_name: {
                        required: true,
                        maxlength: 30,
                        validname: true,
                        normalizer: function(value) {
                            return $.trim(value);
                        },
                    },
                    email: {
                        required: true,
                        customemail: true,
                    },
                    contact: {
                        required: true,
                        number: true,
                        minlength: 10,
                        maxlength: 10,
                    },
                    address: {
                        required: true,
                        normalizer: function(value) {
                            return $.trim(value);
                        },
                    },
                    state: {
                        required: true,
                    },
                    country: {
                        required: true,
                    },
                    questions: {
                        required: true,
                        normalizer: function(value) {
                            return $.trim(value);
                        },
                    },
                    speciality: {
                        required: true,
                    },
                    report_file: {
                        required: true,
                        extension: "docx|doc|pdf|png|jpg|jpeg"
                    },
                },
                messages: {
                    first_name: {
                        required: "First Name is required",
                        maxlength: "First Name is too big",
                        validname: "Please enter valid name.",
                    },
                    last_name: {
                        required: "Last Name is required",
                        maxlength: "Last Name is too big",
                        validname: "Please enter valid name.",
                    },
                    email: {
                        required: "Email is required",
                        customemail: "Please enter a valid email address."
                    },
                    contact: {
                        required: "Moblie number is required",
                        number: "Please enter Moblie number in digits",
                    },
                    address: {
                        required: "Address is required",
                    },
                    state: {
                        required: "Please select state",
                    },
                    country: {
                        required: "Please select country",
                    },
                    questions: {
                        required: "Questions is required",
                    },
                    speciality: {
                        required: "Please select Specialities",
                    },
                    report_file: {
                        required: "File is required",
                        extension: "Select valied input file.. <br> Valid format - docx, doc, pdf, png, jpg, jpeg"
                    },
                },
                submitHandler: function(form) {
                    // var full_number = phone_number.getNumber(intlTelInputUtils.numberFormat.E164);
                    var country_code_mobile = $("#contact").intlTelInput("getSelectedCountryData")
                        .dialCode;
                    $("#country_code_mobile").val(country_code_mobile);
                    var form_data = new FormData(form)
                    $("#inquiry_form button[type='submit']").attr('disabled', true);
                    $.ajax({
                        url: $(form).attr("action"),
                        type: 'POST',
                        data: new FormData(form),
                        processData: false,
                        dataType: 'json',
                        contentType: false,
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function(response) {
                            if (response.success) {
                                // $.notify(response.message, {
                                //     type: 'success'
                                // });
                                toastr.success('Your request submited sucessfully.');
                                document.getElementById("inquiry_form").reset();
                                $('select[name="state"]').empty();
                                $('select[name="state"]').append('<option value="" disabled selected>Select State</option>');
                                $("#state option[value='']").prop("selected", true);
                            } else if (!response.success) {
                                $.notify(response.message, {
                                    type: 'danger'
                                });
                            } else {
                                $.notify('Something went wrong', {
                                    type: 'danger'
                                });
                            }
                        }
                    });
                    $("#inquiry_form button[type='submit']").attr('disabled', false);
                }
            });
        });
        $("#report_file").change(function() {
            if ($(this).val() != '') {
                $('#report_file-error').hide();
            } else {
                $('#report_file-error').show();
                $('#report_file-error').html('File is required');
            }
        })
    </script>
@endsection
