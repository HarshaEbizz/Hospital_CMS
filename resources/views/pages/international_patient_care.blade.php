@extends('layouts.master')
@section('content')
<!-- first section -->
@php
if($patient_cares){
$image = str_replace("/public","",url('/')).'/storage/'.$patient_cares->image_path.$patient_cares->cover_image;
if($patient_cares->cover_image==null)
{
$image = asset('assets/images/inter_banner.png');
}
}@endphp

<section class="page_heading_floor inter_patient_head" style='background:url("{{ $image }}")'>
    <div class="container">
        <h1 class="inter_patient_title">
            {{$patient_cares->heading}}
        </h1>
        <nav style="--bs-breadcrumb-divider: '>>';" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{url('/home')}}" class="text-dark">Home</a></li>
                <li class="breadcrumb-item" aria-current="page">{{$patient_cares->heading}}</li>
            </ol>
            <p>
            </p>
            {{-- <a href="{{url('/contact_us')}}" style="    display: inline-block;" class="green_btn">Contact us
                <svg width="22" height="21" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M8.2459 19.7589C7.94784 19.4667 7.92074 19.0095 8.16461 18.6873L8.2459 18.595L14.9734 12L8.2459 5.40503C7.94784 5.11283 7.92074 4.65558 8.16461 4.33338L8.2459 4.24106C8.54396 3.94887 9.01037 3.9223 9.33904 4.16137L9.43321 4.24106L16.7541 11.418C17.0522 11.7102 17.0793 12.1675 16.8354 12.4897L16.7541 12.582L9.43321 19.7589C9.10534 20.0804 8.57376 20.0804 8.2459 19.7589Z" fill="white" />
                </svg>
            </a> --}}
        </nav>
    </div>
</section>
<!-- first section end-->
<!-- second section -->
<section class="inter_patient_content padding_tb_100">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 mb-lg-0 mb-4">
                <div class="inter_content_img">
                    <img src="{{ asset('assets/images/inter_content.png') }}" alt="" class="w-100">
                </div>
            </div>
            <div class="col-lg-6">
                <div class="inter_patient_info ul_li_image">
                    <!-- <div class="jus_texts"> -->
                    <h2 class="blue_sub_title">{{$patient_cares->title}}</h2>
                    <svg class="line" width="90" height="9" viewBox="0 0 90 9" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M2.02431 7.09212C30.0244 6.09216 52.5242 0.592169 87.8787 2.46593" stroke="#02BB9A" stroke-width="3" stroke-linecap="round"></path>
                    </svg>
                    {!! $patient_cares->description !!}
                </div>
            </div>
        </div>
    </div>
</section>
<!-- second section end-->
<!-- Third section -->
@if ($topics && $topics->count() > 0)
<section class="inter_plan_content padding_tb_100">
    <div class="container">
        <div class="accordion" id="accordionExample">
            @foreach ($topics as $key=>$topic)
            <div class="accordion-item inter_plan_item">
                <h2 class="accordion-header" id="heading_{{$key}}">
                    <button class="accordion-button inter_plan_button px-lg-5 px-3" type="button" data-bs-toggle="collapse" data-bs-target="#collapse_{{$key}}" aria-expanded="true" aria-controls="collapse_{{$key}}">
                        {{$topic->topic}}
                    </button>
                </h2>
                <div id="collapse_{{$key}}" class="accordion-collapse collapse @if($key==0) show @endif" aria-labelledby="heading_{{$key}}" data-bs-parent="#accordionExample">
                    <div class="accordion-body px-lg-5 px-3">
                        <div class="inter_plan_ul ul_li_image">
                            {!! $topic->details !!}
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif
<!--third section end -->
<!-- forth section-->
<!-- <section class="booking_section padding_tb_100">
    <div class="container">
        <div class="booking_box">
            <div class="booking_heading text-center">
                <div>
                    <h2 class="blue_sub_title">Book Appointment</h2>
                    <svg class="line" width="90" height="9" viewBox="0 0 90 9" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M2.02431 7.09212C30.0244 6.09216 52.5242 0.592169 87.8787 2.46593" stroke="#02BB9A" stroke-width="3" stroke-linecap="round"></path>
                    </svg>
                    <p></p>
                </div>
            </div>
            <form action="#" method="POST" id="booking_form" name="booking_form">
                @csrf
                <div class="booking_form">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="first_name" class="form-label">First name*</label>
                                <input type="text" class="form-control" id="first_name" name="first_name" >
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="last_name" class="form-label">Last name*</label>
                                <input type="text" class="form-control" id="last_name" name="last_name" >
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="email" class="form-label">Email* </label>
                                <input type="email" class="form-control left_icon_input" id="email" name="email"  placeholder="Ebizzinfotech@mail.com">
                                <span toggle="#password-field" class=" field-icon toggle-password">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M17.9028 8.85107L13.4596 12.4641C12.6201 13.1301 11.4389 13.1301 10.5994 12.4641L6.11865 8.85107" stroke="#02BB9A" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M16.9089 21C19.9502 21.0084 22 18.5095 22 15.4384V8.57001C22 5.49883 19.9502 3 16.9089 3H7.09114C4.04979 3 2 5.49883 2 8.57001V15.4384C2 18.5095 4.04979 21.0084 7.09114 21H16.9089Z" stroke="#02BB9A" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                    </svg>
                                </span>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="country" class="form-label">Country*</label>
                                <select class="form-control" id="country" name="country">
                                    <option value="">Select Country</option>
                                    @foreach($country as $countries)
                                    <option value="{{$countries->id}}" @if($countries->id=="101") selected @endif>{{$countries->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="contact" class="form-label">Mobile Number* </label>
                                <div class="input-group inline_drop">
                                    <div class="form-group inline_drop">
                                        <svg class="right-aro" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M4.24106 7.7459C4.53326 7.44784 4.99051 7.42074 5.31272 7.66461L5.40503 7.7459L12 14.4734L18.595 7.7459C18.8872 7.44784 19.3444 7.42074 19.6666 7.66461L19.7589 7.7459C20.0511 8.04396 20.0777 8.51037 19.8386 8.83904L19.7589 8.93321L12.582 16.2541C12.2898 16.5522 11.8325 16.5793 11.5103 16.3354L11.418 16.2541L4.24106 8.93321C3.91965 8.60534 3.91965 8.07376 4.24106 7.7459Z" fill="#130F26" />
                                        </svg>
                                        <select class="form-control" id="country_code" name="country_code">
                                            @foreach($country as $countries)
                                            <option value="{{$countries->phonecode}}" @if($countries->phonecode=="+91") selected @endif>{{$countries->phonecode}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <input type="text" class="form-control left_icon_input" id="contact" name="contact" aria-label="Text input with segmented dropdown button" placeholder="123 456 7890">
                                    <span><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M11.5317 12.4724C15.5208 16.4604 16.4258 11.8467 18.9656 14.3848C21.4143 16.8328 22.8216 17.3232 19.7192 20.4247C19.3306 20.737 16.8616 24.4943 8.1846 15.8197C-0.493478 7.144 3.26158 4.67244 3.57397 4.28395C6.68387 1.17385 7.16586 2.58938 9.61449 5.03733C12.1544 7.5765 7.54266 8.48441 11.5317 12.4724Z" stroke="#02BB9A" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    </span>
                                </div>
                                <label id="contact-error" class="error" for="contact"></label>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="dropdown_max">
                                <label for="specialities" class="form-label">Select specialities*</label>
                                <div class="form-group inline_drop">
                                    <svg class="right-aro" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M4.24106 7.7459C4.53326 7.44784 4.99051 7.42074 5.31272 7.66461L5.40503 7.7459L12 14.4734L18.595 7.7459C18.8872 7.44784 19.3444 7.42074 19.6666 7.66461L19.7589 7.7459C20.0511 8.04396 20.0777 8.51037 19.8386 8.83904L19.7589 8.93321L12.582 16.2541C12.2898 16.5522 11.8325 16.5793 11.5103 16.3354L11.418 16.2541L4.24106 8.93321C3.91965 8.60534 3.91965 8.07376 4.24106 7.7459Z" fill="#130F26" />
                                    </svg>
                                    <select class="form-control" id="specialities" name="specialities">
                                        <option value="">Select specialities</option>
                                        <option>1</option>
                                        <option>2</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="date" class="form-label">Select date*</label>
                                <div class="input-group inline_drop">
                                    <input type="date" class="form-control left_icon_input" id="date" name="date" aria-label="Text input with segmented dropdown button" placeholder="12/02/1999">
                                    <span>
                                        <svg class="right-aro" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M19.0889 4.15234H5.08887C3.9843 4.15234 3.08887 5.04777 3.08887 6.15234V20.1523C3.08887 21.2569 3.9843 22.1523 5.08887 22.1523H19.0889C20.1934 22.1523 21.0889 21.2569 21.0889 20.1523V6.15234C21.0889 5.04777 20.1934 4.15234 19.0889 4.15234Z" stroke="#02BB9A" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                            <path d="M16.0889 2.15234V6.15234" stroke="#02BB9A" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                            <path d="M8.08887 2.15234V6.15234" stroke="#02BB9A" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                            <path d="M3.08887 10.1523H21.0889" stroke="#02BB9A" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    </span>
                                </div>
                                <label id="date-error" class="error" for="date"></label>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="time" class="form-label">Select Time*</label>
                                <div class="input-group inline_drop">
                                    <input type="time" class="form-control left_icon_input" id="time" name="time" aria-label="Text input with segmented dropdown button" placeholder="02:00am">
                                    <span>
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <g clip-path="url(#clip0_3470_4120)">
                                                <path d="M15.5385 15.185L15.5386 15.1851C15.6362 15.2827 15.6362 15.4409 15.5386 15.5385L15.5385 15.5386C15.4896 15.5875 15.4265 15.6118 15.3618 15.6118C15.297 15.6118 15.234 15.5875 15.1851 15.5386L15.185 15.5385L11.8233 12.1767L11.8232 12.1767C11.7763 12.1298 11.75 12.0663 11.75 12V5.20744C11.75 5.06937 11.8619 4.95744 12 4.95744C12.1381 4.95744 12.25 5.06937 12.25 5.20744V11.6894V11.8965L12.3964 12.0429L15.5385 15.185ZM0.5 12C0.5 5.65931 5.65931 0.5 12 0.5C18.3407 0.5 23.5 5.65931 23.5 12C23.5 18.3407 18.3407 23.5 12 23.5C5.65931 23.5 0.5 18.3407 0.5 12ZM1 12C1 18.0659 5.93414 23 12 23C18.0659 23 23 18.0659 23 12C23 5.93414 18.0659 1 12 1C5.93414 1 1 5.93414 1 12Z" fill="black" stroke="#02BB9A" />
                                            </g>
                                            <defs>
                                                <clipPath id="clip0_3470_4120">
                                                    <rect width="24" height="24" fill="white" />
                                                </clipPath>
                                            </defs>
                                        </svg>
                                    </span>
                                </div>
                                <label id="time-error" class="error" for="time"></label>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="booking_type" class="form-label">Book appointment For*</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="booking_type" id="booking_type1" value="option1">
                                <label class="form-check-label" for="inlineRadio1">Tele consultation</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="booking_type" id="booking_type2" value="option2">
                                <label class="form-check-label" for="inlineRadio2">Video consultation to
                                    Doctor's</label>
                            </div>
                            <label id="booking_type-error" class="error" for="booking_type"></label>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="file" class="form-label">Choose file</label>
                                <div class="input-group">
                                    <input type="file" id="file" name="file" class="form-control" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" aria-label="Upload">
                                </div>
                                <label id="file-error" class="error" for="file"></label>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-center">
                        <button type="submit" class="btn btn-green_block mt-sm-5 mt-3 w-lg-50">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section> -->
<!-- forth section end -->
<!-- six section -->
@include('layouts.include.map')
<!-- six section end -->
@endsection
@section('script')
@endsection
