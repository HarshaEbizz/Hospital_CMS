@extends('layouts.master')
@section('content')
<!-- first section -->
<section class="page_heading robotic_section">
    <div class="container">
        <h1 class="robotic_title">
            New Radiation machines
        </h1>
        <nav style="--bs-breadcrumb-divider: '>>';" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{url('/home')}}" class="text-dark">Home</a></li>
                <li class="breadcrumb-item" aria-current="page">Patients & Visitors</li>
                <li class="breadcrumb-item" aria-current="page">Latest Technology</li>
                <li class="breadcrumb-item" aria-current="page">New Radiation machines</li>
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
            <ul class="nav nav-tabs robotic_nav_tab" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active do_link" id="floor-tab" data-bs-toggle="tab" data-bs-target="#floor" type="button" role="tab" aria-controls="floor" aria-selected="true">Robotic surgery</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link do_link" id="ambulance-tab" data-bs-toggle="tab" data-bs-target="#ambulance" type="button" role="tab" aria-controls="ambulance" aria-selected="false">Liver transplant</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link do_link" id="ambulance-tab" data-bs-toggle="tab" data-bs-target="#ambulance" type="button" role="tab" aria-controls="ambulance" aria-selected="false">Department-Amenities</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link do_link" id="ambulance-tab" data-bs-toggle="tab" data-bs-target="#ambulance" type="button" role="tab" aria-controls="ambulance" aria-selected="false">New Radiation machines</button>
                </li>
            </ul>
            <div class="tab-content py-3" id="myTabContent">
                <div class="tab-pane fade show active" id="ambulance" role="tabpanel" aria-labelledby="ambulance-tab">
                    <div class="amenities_box mb-5">
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="all" role="tabpanel" aria-labelledby="all-tab">
                                <div class="row">
                                    <div class="col-lg-8 mt-4">
                                        <div class="position-relative">
                                            <h2 class="blue_sub_title">New Radiation machines</h2>
                                            <svg class="line" width="90" height="9" viewBox="0 0 90 9" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M2.02431 7.09212C30.0244 6.09216 52.5242 0.592169 87.8787 2.46593" stroke="#02BB9A" stroke-width="3" stroke-linecap="round">
                                                </path>
                                            </svg>
                                            <div class="care_list">
                                                <p></p>
                                            </div>
                                            <div class="care_bg_logo">
                                                <img src="{{ asset('assets/images/kiran_logo.png') }}" alt="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <img src="{{ asset('assets/images/robotic_bg.png') }}" alt="" class="w-100">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="visit_circle_bg1"></div>
    <div class="visit_circle_bg2"></div>
</section>
<!-- third section -->
@include('layouts.include.map')
<!-- third section end -->
@endsection
@section('script')
@endsection