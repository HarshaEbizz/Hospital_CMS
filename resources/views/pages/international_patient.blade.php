@extends('layouts.master')
@section('content')
<!-- first section -->
<section class="page_heading international_section">
    <div class="container">
        <h1 class="international_title">
            International Patient
        </h1>
        <nav style="--bs-breadcrumb-divider: '>>';" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{url('/home')}}" class="text-dark">Home</a></li>
                <li class="breadcrumb-item" aria-current="page">Patients & Visitors</li>
                <li class="breadcrumb-item" aria-current="page">Patient Guide</li>
                <li class="breadcrumb-item" aria-current="page">International Patient</li>
            </ol>
            <p>
            </p>
            <a href="{{url('/contact_us')}}" style="    display: inline-block;" class="green_btn">Contact us
                <svg width="22" height="21" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M8.2459 19.7589C7.94784 19.4667 7.92074 19.0095 8.16461 18.6873L8.2459 18.595L14.9734 12L8.2459 5.40503C7.94784 5.11283 7.92074 4.65558 8.16461 4.33338L8.2459 4.24106C8.54396 3.94887 9.01037 3.9223 9.33904 4.16137L9.43321 4.24106L16.7541 11.418C17.0522 11.7102 17.0793 12.1675 16.8354 12.4897L16.7541 12.582L9.43321 19.7589C9.10534 20.0804 8.57376 20.0804 8.2459 19.7589Z" fill="white" />
                </svg>
            </a>
        </nav>
    </div>
</section>
<!-- first section end-->
<!-- second section -->
<section class="floor_content position-relative">
    <div class="container">
        <div>
            <ul class="nav nav-tabs floor_nav_tab" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active floor_link1" id="floor-tab" data-bs-toggle="tab" data-bs-target="#floor" type="button" role="tab" aria-controls="floor" aria-selected="true">Floor Plan</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link floor_link2" id="ambulance-tab" data-bs-toggle="tab" data-bs-target="#ambulance" type="button" role="tab" aria-controls="ambulance" aria-selected="false">Ambulance
                        Services</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link floor_link3" id="day_care-tab" data-bs-toggle="tab" data-bs-target="#day_care" type="button" role="tab" aria-controls="day_care" aria-selected="false">Day Care
                        Service</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link floor_link4" id="general-tab" data-bs-toggle="tab" data-bs-target="#general" type="button" role="tab" aria-controls="general" aria-selected="false">General
                        Guide</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link floor_link5" id="opd-tab" data-bs-toggle="tab" data-bs-target="#opd" type="button" role="tab" aria-controls="opd" aria-selected="false">OPD
                        Guide</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link floor_link6" id="ipd-tab" data-bs-toggle="tab" data-bs-target="#ipd" type="button" role="tab" aria-controls="ipd" aria-selected="false">IPD Guide</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link floor_link7" id="amenities-tab" data-bs-toggle="tab" data-bs-target="#amenities" type="button" role="tab" aria-controls="amenities" aria-selected="false">Amenities</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link floor_link8" id="patient-tab" data-bs-toggle="tab" data-bs-target="#patient" type="button" role="tab" aria-controls="patient" aria-selected="false">Patient
                        Rooms</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link floor_link9" id="responsibilities-tab" data-bs-toggle="tab" data-bs-target="#responsibilities" type="button" role="tab" aria-controls="responsibilities" aria-selected="false">Patient’s Rights &
                        Responsibilities</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link floor_link10" id="do-tab" data-bs-toggle="tab" data-bs-target="#do" type="button" role="tab" aria-controls="do" aria-selected="false">Do’s & Don’ts</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link floor_link11" id="international-tab" data-bs-toggle="tab" data-bs-target="#international" type="button" role="tab" aria-controls="international" aria-selected="false">International
                        Patient</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link floor_link12" id="visiting-tab" data-bs-toggle="tab" data-bs-target="#visiting" type="button" role="tab" aria-controls="visiting" aria-selected="false">Visiting Hours</button>
                </li>
            </ul>
            <div class="tab-content py-3" id="myTabContent">
                <div class="tab-pane fade show active" id="ambulance" role="tabpanel" aria-labelledby="ambulance-tab">
                    <div class="amenities_box mb-5">
                        <div class="position-relative text-center">
                            <h2 class="blue_sub_title">International Patient</h2>
                            <svg class="line" width="90" height="9" viewBox="0 0 90 9" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M2.02431 7.09212C30.0244 6.09216 52.5242 0.592169 87.8787 2.46593" stroke="#02BB9A" stroke-width="3" stroke-linecap="round"></path>
                            </svg>
                            <div class="care_list">
                                <p> Kiran Hospital has been marked as prestigious healthcare center of India as
                                    well
                                    as globally. Quality of healthcare is comparable to the best of institutes
                                    all
                                    over world. The combination of world class infrastructure and amenities,
                                    High
                                    end technology & full time consultants from across the nation have
                                    accentuated
                                    our position not only in Gujarat but also all over India and globally.</p>
                                <p> Being in the diamond capital of India - Surat, Kiran Hospital is in close
                                    proximity to Railway Station (1.5 km) & Surat Airport (19 km) and is well
                                    connected to metro cities like Mumbai and Ahmedabad making travel hassle
                                    free
                                    and convenient. The hospital is fast becoming the preferred healthcare
                                    centerfor
                                    international patients from across the world. It is in close vicinity to
                                    Multiplex Malls, Beach, Garden, and Restaurants making it desirable for
                                    international visitors. Kiran hospital is determined to provide exclusive
                                    hospitality services to international patients and visitors to ensure a feel
                                    at
                                    home feeling and leisure during patient stay.</p>
                            </div>
                            <div class="care_bg_logo">
                                <img src="{{ asset('assets/images/small_logo.png') }}" alt="">
                            </div>
                        </div>
                        <div class="box_bottom_content mt-lg-5">
                            <p><span style="color: #ED1C24;">*</span>To follow the rules and regulations of the
                                Kiran Hospital.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="respons_circle_bg1"></div>
</section>
<!-- third section -->
@include('layouts.include.map')
<!-- third section end -->
@endsection
@section('script')
@endsection