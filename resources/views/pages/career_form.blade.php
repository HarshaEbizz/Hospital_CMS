@extends('layouts.master')
@section('style')
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/16.0.8/css/intlTelInput.css" /> --}}
    <style>
        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        input[type=number] {
            -moz-appearance: textfield;
        }
    </style>
@endsection
@section('content')
    <!-- first section -->
    <section class="page_heading career_section">
        <div class="container">
            <h1 class="career_title">
                Careers
            </h1>
            <nav style="--bs-breadcrumb-divider: '>>';" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('/home') }}" class="text-dark">Home</a></li>
                    <li class="breadcrumb-item " aria-current="page">Careers</li>
                </ol>
                <div class="d-sm-flex">
                    <div class="career_info me-sm-4 mb-sm-0 mb-3">
                        <!-- <p class="mb-2">Phone no.</p> -->
                        <div class="d-flex align-items-center">
                            <svg width="20" height="21" viewBox="0 0 20 21" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M9.53174 10.9724C13.5208 14.9604 14.4258 10.3467 16.9656 12.8848C19.4143 15.3328 20.8216 15.8232 17.7192 18.9247C17.3306 19.237 14.8616 22.9943 6.1846 14.3197C-2.49348 5.644 1.26158 3.17244 1.57397 2.78395C4.68387 -0.326154 5.16586 1.08938 7.61449 3.53733C10.1544 6.0765 5.54266 6.98441 9.53174 10.9724Z"
                                    stroke="#10357C" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                            <a class="call" href="tel: +91-261-7161111"><p class="mb-0 career_text ms-1">+91-261-7161111</p></a>
                        </div>
                    </div>
                    <div class="career_info ms-sm-3">
                        <!-- <p class="mb-2">Email</p> -->
                        <div class="d-flex align-items-center">
                            <svg width="22" height="20" viewBox="0 0 22 20" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M16.9033 6.85156L12.46 10.4646C11.6205 11.1306 10.4394 11.1306 9.59992 10.4646L5.11914 6.85156"
                                    stroke="#10357C" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M15.9089 19C18.9502 19.0084 21 16.5095 21 13.4384V6.57001C21 3.49883 18.9502 1 15.9089 1H6.09114C3.04979 1 1 3.49883 1 6.57001V13.4384C1 16.5095 3.04979 19.0084 6.09114 19H15.9089Z"
                                    stroke="#10357C" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                            <a class="call" href="mailto:careers@kiranhospital.com "><p class="mb-0 career_text ms-1"><p class="mb-0 career_text ms-1">careers@kiranhospital.com </p></a>
                        </div>
                    </div>
                </div>
            </nav>
        </div>

    </section>
    <!-- first section end-->
    <!-- second section -->
    <div class="container py-5">
        <div class="row">
            <div class="col-lg-6">
                <div class="pb-4">
                    <h2 class="blue_sub_title">{{ $job_opening->department_name }}</h2>
                    <svg class="line" width="90" height="9" viewBox="0 0 90 9" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path d="M2.02431 7.09212C30.0244 6.09216 52.5242 0.592169 87.8787 2.46593" stroke="#02BB9A"
                            stroke-width="3" stroke-linecap="round">
                        </path>
                    </svg>
                </div>
                <p style="font-size:16px; line-height:19px; font-weight:600 ">
                    {{ $job_opening->designation }}
                </p>

                <div class="career_information">
                    <p><b>Location:</b> {{ $job_opening->location }}</p>
                    <p><b>No. of Positions :</b> {{ $job_opening->opening }}</p>
                    <p><b>Work Experience :</b> {{ $job_opening->experience }}</p>
                    <p><b>Qualification : </b>{{ $job_opening->qualification }}</p>
                    <p><b>Description : </b> {{ $job_opening->description }}</p>
                </div>
            </div>
            <div class="col-lg-6 border p-4">
                <div class="pb-4 text-center">
                    <h2 class="blue_sub_title">Submit Your CV</h2>
                    <svg class="line" width="90" height="9" viewBox="0 0 90 9" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path d="M2.02431 7.09212C30.0244 6.09216 52.5242 0.592169 87.8787 2.46593" stroke="#02BB9A"
                            stroke-width="3" stroke-linecap="round">
                        </path>
                    </svg>
                </div>
                <form action="{{ route('apply_job') }}" method="POST" id="apply_job_form" name="apply_job_form"
                    enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" id="job_openning_id" name="job_openning_id" value="{{ $job_opening->id }}">
                    <div class="booking_form">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="dropdown_max">
                                    <label for="application_type" class="form-label">Application Type*</label>
                                    <div class="form-group inline_drop">

                                        {{-- <svg class="right-aro" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M4.24106 7.7459C4.53326 7.44784 4.99051 7.42074 5.31272 7.66461L5.40503 7.7459L12 14.4734L18.595 7.7459C18.8872 7.44784 19.3444 7.42074 19.6666 7.66461L19.7589 7.7459C20.0511 8.04396 20.0777 8.51037 19.8386 8.83904L19.7589 8.93321L12.582 16.2541C12.2898 16.5522 11.8325 16.5793 11.5103 16.3354L11.418 16.2541L4.24106 8.93321C3.91965 8.60534 3.91965 8.07376 4.24106 7.7459Z" fill="#130F26"></path>
                                    </svg> --}}
                                        <select class="form-select" id="application_type" name="application_type">
                                            <option value="">Select Application Type</option>
                                            <option value="Accounts" @if ($job_opening->department_name == 'Accounts') selected @endif>
                                                Accounts</option>
                                            <option value="Audiology" @if ($job_opening->department_name == 'Audiology') selected @endif>
                                                Audiology</option>
                                            <option value="Billing" @if ($job_opening->department_name == 'Billing') selected @endif>
                                                Billing</option>
                                            <option value="Bio Medical" @if ($job_opening->department_name == 'Bio Medical') selected @endif>
                                                Bio Medical</option>
                                            <option value="Blood Bank" @if ($job_opening->department_name == 'Blood Bank') selected @endif>
                                                Blood Bank</option>
                                            <option value="Call Center" @if ($job_opening->department_name == 'Call Center') selected @endif>
                                                Call Center</option>
                                            <option value="Cardiac" @if ($job_opening->department_name == 'Cardiac') selected @endif>
                                                Cardiac</option>
                                            <option value="Cath Lab" @if ($job_opening->department_name == 'Cath Lab') selected @endif>Cath
                                                Lab</option>
                                            <option value="Clinical" @if ($job_opening->department_name == 'Clinical') selected @endif>
                                                Clinical</option>
                                            <option value="Clinical Research"
                                                @if ($job_opening->department_name == 'Clinical Research') selected @endif>Clinical Research</option>
                                            <option value="CSSD" @if ($job_opening->department_name == 'CSSD') selected @endif>CSSD
                                            </option>
                                            <option value="Consultant Doctor"
                                                @if ($job_opening->department_name == 'Consultant Doctor') selected @endif>Consultant Doctor
                                            </option>
                                            <option value="Dental" @if ($job_opening->department_name == 'Dental') selected @endif>
                                                Dental</option>
                                            <option value="Dialysis" @if ($job_opening->department_name == 'Dialysis') selected @endif>
                                                Dialysis</option>
                                            <option value="ECG" @if ($job_opening->department_name == 'ECG') selected @endif>ECG
                                            </option>
                                            <option value="ECHO/TMT" @if ($job_opening->department_name == 'ECHO/TMT') selected @endif>
                                                ECHO/TMT</option>
                                            <option value="Endoscopy" @if ($job_opening->department_name == 'Endoscopy') selected @endif>
                                                Endoscopy</option>
                                            <option value="F &amp; B" @if ($job_opening->department_name == 'F &amp; B') selected @endif>F
                                                &amp; B</option>
                                            <option value="Facility" @if ($job_opening->department_name == 'Facility') selected @endif>
                                                Facility</option>
                                            <option value="Front Office"
                                                @if ($job_opening->department_name == 'Front Office') selected @endif>Front Office</option>
                                            <option value="HR" @if ($job_opening->department_name == 'HR') selected @endif>HR
                                            </option>
                                            <option value="IT" @if ($job_opening->department_name == 'IT') selected @endif>IT
                                            </option>
                                            <option value="Ma Yojana" @if ($job_opening->department_name == 'Ma Yojana') selected @endif>
                                                Ma Yojana</option>
                                            <option value="Maintenance"
                                                @if ($job_opening->department_name == 'Maintenance') selected @endif>Maintenance</option>
                                            <option value="Marketing" @if ($job_opening->department_name == 'Marketing') selected @endif>
                                                Marketing</option>
                                            <option value="MRD" @if ($job_opening->department_name == 'MRD') selected @endif>MRD
                                            </option>
                                            <option value="Neurology" @if ($job_opening->department_name == 'Neurology') selected @endif>
                                                Neurology</option>
                                            <option value="Nuclear Medicine"
                                                @if ($job_opening->department_name == 'Nuclear Medicine') selected @endif>Nuclear Medicine
                                            </option>
                                            <option value="Nursing" @if ($job_opening->department_name == 'Nursing') selected @endif>
                                                Nursing</option>
                                            <option value="Nutrition &amp; Dietetics"
                                                @if ($job_opening->department_name == 'Nutrition &amp; Dietetics') selected @endif>Nutrition &amp;
                                                Dietetics</option>
                                            <option value="Opthalmology"
                                                @if ($job_opening->department_name == 'Opthalmology') selected @endif>Opthalmology</option>
                                            <option value="OT" @if ($job_opening->department_name == 'OT') selected @endif>OT
                                            </option>
                                            <option value="Pathology" @if ($job_opening->department_name == 'Pathology') selected @endif>
                                                Pathology</option>
                                            <option value="Patient Care"
                                                @if ($job_opening->department_name == 'Patient Care') selected @endif>Patient Care</option>
                                            <option value="PFT" @if ($job_opening->department_name == 'PFT') selected @endif>PFT
                                            </option>
                                            <option value="Pharmacy" @if ($job_opening->department_name == 'Pharmacy') selected @endif>
                                                Pharmacy</option>
                                            <option value="Physiotherapy"
                                                @if ($job_opening->department_name == 'Physiotherapy') selected @endif>Physiotherapy</option>
                                            <option value="Purchase" @if ($job_opening->department_name == 'Purchase') selected @endif>
                                                Purchase</option>
                                            <option value="Quality" @if ($job_opening->department_name == 'Quality') selected @endif>
                                                Quality</option>
                                            <option value="Radiation Oncology"
                                                @if ($job_opening->department_name == 'Radiation Oncology') selected @endif>Radiation Oncology
                                            </option>
                                            <option value="Radiology" @if ($job_opening->department_name == 'Radiology') selected @endif>
                                                Radiology</option>
                                            <option value="Store" @if ($job_opening->department_name == 'Store') selected @endif>
                                                Store</option>
                                            <option value="TPA" @if ($job_opening->department_name == 'TPA') selected @endif>TPA
                                            </option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="full_name" class="form-label">Full Name*</label>
                                    <input type="text" class="form-control" id="full_name" name="full_name">
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="dropdown_max">
                                    <label for="date" class="form-label">Date
                                        of Birth*</label>
                                    <div class="form-group inline_drop">
                                        <input type="date" class="form-control left_icon_input" id="date"
                                            name="date">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <label for="gender" class="form-label mb-4">Gender*</label>
                                <div class="d-flex">
                                    <div class="form-check me-4">
                                        <label class="form-check-label" for="male">
                                            Male
                                        </label>
                                        <input class="form-check-input" type="radio" name="gender" id="male"
                                            value="male">
                                    </div>
                                    <div class="form-check me-4">
                                        <label class="form-check-label" for="female">
                                            Female
                                        </label>
                                        <input class="form-check-input" type="radio" name="gender" id="female"
                                            value="female">
                                    </div>
                                    <div class="form-check me-4">
                                        <label class="form-check-label" for="other">
                                            Other
                                        </label>
                                        <input class="form-check-input" type="radio" name="gender" id="other"
                                            value="other">
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <label id="date-error" class="error" for="date"></label>
                            </div>
                            <div class="col-lg-6">
                                <label id="gender-error" class="error" for="gender"></label>
                            </div>
                            <div class="col-lg-6">
                                <div class="dropdown_max">
                                    <label for="marital_status" class="form-label">Marital Status*</label>
                                    <div class="form-group inline_drop">
                                        {{-- <svg class="right-aro" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M4.24106 7.7459C4.53326 7.44784 4.99051 7.42074 5.31272 7.66461L5.40503 7.7459L12 14.4734L18.595 7.7459C18.8872 7.44784 19.3444 7.42074 19.6666 7.66461L19.7589 7.7459C20.0511 8.04396 20.0777 8.51037 19.8386 8.83904L19.7589 8.93321L12.582 16.2541C12.2898 16.5522 11.8325 16.5793 11.5103 16.3354L11.418 16.2541L4.24106 8.93321C3.91965 8.60534 3.91965 8.07376 4.24106 7.7459Z" fill="#130F26"></path>
                                    </svg> --}}
                                        <select class="form-select" id="marital_status" name="marital_status">
                                            <option value="">Select Marital Status</option>
                                            <option value="married">Married</option>
                                            <option value="unmarried">Unmarried</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email*
                                    </label>
                                    <input type="email" class="form-control left_icon_input" id="email"
                                        name="email">
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
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <label for="address" class="form-label">Address*</label>
                                    <input type="text" class="form-control" id="address" name="address">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="contact" class="form-label">Mobile Number* </label>
                                    <!-- <div class="input-group inline_drop">
                                            <div class="form-group inline_drop" style="width: 40%;">
                                                <svg class="right-aro" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M4.24106 7.7459C4.53326 7.44784 4.99051 7.42074 5.31272 7.66461L5.40503 7.7459L12 14.4734L18.595 7.7459C18.8872 7.44784 19.3444 7.42074 19.6666 7.66461L19.7589 7.7459C20.0511 8.04396 20.0777 8.51037 19.8386 8.83904L19.7589 8.93321L12.582 16.2541C12.2898 16.5522 11.8325 16.5793 11.5103 16.3354L11.418 16.2541L4.24106 8.93321C3.91965 8.60534 3.91965 8.07376 4.24106 7.7459Z" fill="#130F26"></path>
                                                </svg>
                                                <select class="form-control" id="country_code" name="country_code" aria-readonly="true">
                                                    @foreach ($country as $countries)
    <option value="{{ $countries->phonecode }}" @if ($countries->phonecode == '+91') selected @endif>
                                                        {{ $countries->phonecode }}
                                                    </option>
    @endforeach
                                                </select>
                                            </div>
                                            <input type="text" class="form-control left_icon_input" id="contact" name="contact">
                                            <span>
                                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M11.5317 12.4724C15.5208 16.4604 16.4258 11.8467 18.9656 14.3848C21.4143 16.8328 22.8216 17.3232 19.7192 20.4247C19.3306 20.737 16.8616 24.4943 8.1846 15.8197C-0.493478 7.144 3.26158 4.67244 3.57397 4.28395C6.68387 1.17385 7.16586 2.58938 9.61449 5.03733C12.1544 7.5765 7.54266 8.48441 11.5317 12.4724Z" stroke="#02BB9A" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                </svg>
                                            </span>
                                        </div> -->
                                    <div class="form-group inline_drop">
                                        <input type="hidden" name="apply_job_country_code"
                                            id="apply_job_country_code" />
                                        <input class="form-control left_icon_input" type="number"
                                            name="apply_job_contact" id="apply_job_contact" />
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
                                    <label id="apply_job_contact-error" class="error" for="apply_job_contact"></label>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="job_position" class="form-label">Job Position*</label>
                                    <input type="text" class="form-control" id="job_position" name="job_position"
                                        value="{{ $job_opening->designation }}" readonly>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="dropdown_max">
                                    <label for="qualification" class="form-label">Qualification*</label>
                                    <div class="form-group inline_drop">
                                        <input type="text" class="form-control" id="qualification"
                                            name="qualification">
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="experience_year" class="form-label">Total Experience*</label>
                                    <input type="text" class="form-control" id="experience_year"
                                        name="experience_year">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="dropdown_max">
                                    <label for="last_organization" class="form-label">Last Organization*</label>
                                    <div class="form-group inline_drop">
                                        <input type="text" class="form-control" id="last_organization"
                                            name="last_organization">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="last_ctc" class="form-label">Last CTC*</label>
                                    <input type="text" class="form-control" id="last_ctc" name="last_ctc">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <label for="last_designation" class="form-label">Last Designation*</label>
                                    <input type="text" class="form-control" id="last_designation"
                                        name="last_designation">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="information" class="form-label">Optional Information</label>
                                    <input type="text" class="form-control" id="information" name="information">
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="resume_file" class="form-label">Resume Upload*</label>
                                    <input class="form-control" type="file" id="resume_file" name="resume_file">
                                </div>
                            </div>
                        </div>

                        <div class="text-center w-75 m-auto">
                            <button type="submit" class="btn btn-green_block px-5">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- secound section end -->
    @if ($alert_msg)
        <div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-modal="true"
            role="dialog" style="display: block; padding-left: 0px;">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body p-lg-5">
                        <div class="text-center">
                            <h4 class="my-3">
                                {{ $alert_msg->title }}
                            </h4>
                            </hr>
                        </div>

                        <div class="kiran-wrap">
                            {!! $alert_msg->message !!}
                        </div>
                        <div class="d-flex justify-content-center pt-lg-4">
                            <button type="button" class="btn btn-green_block w-75" data-bs-dismiss="modal">I
                                Accept</button>
                            <!-- <a class="btn btn-green_block w-75" href="" tabindex="-1"
                                    aria-disabled="true">રજીસ્ટ્રેશન કરવા માટે અહિયાં ક્લિક
                                    કરો</a> -->
                        </div>
                    </div>

                </div>
            </div>
        </div>
    @endif
    <!-- Third section -->
    @include('layouts.include.map')
    <!-- third section end -->
@endsection
@section('script')
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/16.0.8/js/intlTelInput-jquery.min.js"></script> --}}
    <script>
        // var phone_number = window.intlTelInput(document.querySelector("#contact"), {
        //     // $('#contact').intlTelInput({
        //         autoHideDialCode: true,
        //         separateDialCode: true,
        //         preferredCountries: ["in"],
        //         hiddenInput: "full",
        //         utilsScript: "//cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.3/js/utils.js"
        //     });
        $(window).load(function() {
            // setTimeout(function() {
            $('#myModal').modal('show');
            // }, 1000);
        });
        $(document).on('change', '#date', function(e) {
            var date = new Date($(this).val());
            var day = date.getUTCDate();
            var month = date.getUTCMonth() + 1;
            var year = date.getUTCFullYear();
            var age = 18;
            var mydate = new Date();
            mydate.setFullYear(year, month - 1, day);
            var currdate = new Date();
            currdate.setFullYear(currdate.getFullYear() - age);
            if (currdate < mydate) {
                $.notify('You must be at least 18 years of age.', {

                    type: 'danger'
                });
                $(this).val('')
            }
        });
        $(document).on('change', '#resume_file', function(event) {
            event.preventDefault();
            var file = event.target.files[0];
            var fileName = event.target.files[0].name;
            var Extension = fileName.substring(
                fileName.lastIndexOf('.') + 1).toLowerCase();
            if (Extension == "docx" || Extension == "doc" || Extension == "pdf") {} else {
                this.value = "";
                $.notify('Valid file types of docx,PDF and doc. ', {
                    type: 'danger'
                });
            }
        });

        $(function() {
            $('#apply_job_contact').intlTelInput({
                preferredCountries: ['in'],
                separateDialCode: true,
                utilsScript: "//cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.3/js/utils.js"
            });

            $("form[name='apply_job_form']").on('submit', function(e) {
                e.preventDefault();
            }).validate({
                rules: {
                    application_type: {
                        required: true,
                    },
                    full_name: {
                        required: true,
                        maxlength: 30,
                        validname: true,
                        normalizer: function(value) {
                            return $.trim(value);
                        },
                    },
                    date: {
                        required: true,
                    },
                    gender: {
                        required: true,
                    },
                    marital_status: {
                        required: true,
                    },
                    email: {
                        required: true,
                        customemail: true,
                    },
                    address: {
                        required: true,
                    },
                    apply_job_contact: {
                        required: true,
                        number: true,
                        minlength: 10,
                        maxlength: 10,
                    },
                    job_position: {
                        required: true,
                    },
                    qualification: {
                        required: true,
                        nospecialcharnumber: true
                    },
                    experience_year: {
                        required: true,
                        number: true
                    },
                    last_organization: {
                        required: true,
                    },
                    last_ctc: {
                        required: true,
                        nospecialchar: true
                    },
                    last_designation: {
                        required: true,
                    },
                    resume_file: {
                        required: true,
                        extension: "docx|doc|pdf"
                    },
                },
                messages: {
                    application_type: {
                        required: "Select application type",
                    },
                    full_name: {
                        required: "Full Name is required",
                        maxlength: "Full Name can't be more than 30 characters",
                    },
                    date: {
                        required: "Please select date",
                    },
                    gender: {
                        required: "Select your gender",
                    },
                    marital_status: {
                        required: "Select Marital status",
                    },
                    email: {
                        required: "Email is required",
                        customemail: "Please enter a valid email address."
                    },
                    address: {
                        required: "Address is required",
                    },
                    apply_job_contact: {
                        required: "Mobile Number is required",
                        number: "Please enter Mobile Number in digits",
                        maxlength: "Mobile Number can't be more than 10 Digits",
                        minlength: "Mobile Number can't be less than 10 Digits",
                    },
                    job_position: {
                        required: "Job position is required",
                    },
                    qualification: {
                        required: "Qualification is required",
                    },
                    experience_year: {
                        required: "Experience year is required",
                        number: "Enter Experience year in Digits."
                    },
                    last_organization: {
                        required: "Enter Last Organization name",
                    },
                    last_ctc: {
                        required: "Enter last ctc",
                    },
                    last_designation: {
                        required: "Enter Last Designation ",
                    },
                    resume_file: {
                        required: "upload your resume",
                        extension: "Select valied input file format"
                    },
                },
                submitHandler: function(form) {
                    var apply_job_country_code = $("#apply_job_contact").intlTelInput(
                        "getSelectedCountryData").dialCode;
                    $("#apply_job_country_code").val(apply_job_country_code);

                    var formData = new FormData(form);
                    $("#apply_job_form button[type='submit']").attr('disabled', true);
                    $.ajax({
                        url: $(form).attr("action"),
                        type: 'post',
                        data: formData,
                        processData: false,
                        cache: false,
                        contentType: false,
                        success: function(response) {
                            if (response.success) {
                                // $.notify(response.message, {
                                //     type: 'success'
                                // });
                                toastr.success('Thank you for the job applying. we will contact you soon.');
                                $('#apply_job_form').trigger("reset");
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
                    $("#apply_job_form button[type='submit']").attr('disabled', false);
                }
            });
        });
        $("input").keyup(function() {
            if (jQuery.trim($("this").val()).length == 0) {
                if($(this).attr('id')!="full_name")
                this.value = $.trim(this.value);
            }
        })
        $("#resume_file").change(function() {
            console.log($(this).val());
            if ($(this).val() != '') {
                $('#resume_file-error').hide();
            } else {
                $('#resume_file-error').show();
                $('#resume_file-error').html('upload your resume');
            }
        })
    </script>
@endsection
