@extends('layouts.master')
@section('content')
    <!-- first section -->
    <section class="page_heading_floor statutory_section">
        <div class="container">
            <h1 class="statutory_title">
                Statutory Compliance
            </h1>
            <nav style="--bs-breadcrumb-divider: '>>';" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{url('/home')}}" class="text-dark">Home</a></li>
                    <li class="breadcrumb-item" aria-current="page">Health Information</li>
                    <li class="breadcrumb-item" aria-current="page">Statutory Compliance</li>
                </ol>
                <p>
                </p>
                <a href="{{ url('/contact_us') }}" style="    display: inline-block;" class="green_btn">Contact us
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
    <section class="floor_content position-relative">
        <div class="container">
            <div>
                <ul class="nav nav-tabs do_nav_tab" id="myTab" role="tablist">
                    <li class="nav-item {{ request()->is('health_tips') ? 'active' : '' }}" role="presentation">
                        <a href="{{route('health_tips')}}" style="color: {{ (\Request::route()->getName() == 'health_tips') ? 'red' : 'black' }}">Health Tips</a>
                    </li>
                    <li class="nav-item {{ request()->is('statutory_compliance') ? 'active' : '' }}" role="presentation">
                        <a href="{{route('statutory_compliance')}}" style="color: {{ (\Request::route()->getName() == 'statutory_compliance') ? 'red' : 'black' }}">Statutory Compliance</a>
                    </li>
                </ul>
                <div class="tab-content py-3" id="myTabContent">
                    <div class="tab-pane fade show active" id="ambulance" role="tabpanel" aria-labelledby="ambulance-tab">
                        <div class="amenities_box mb-5">
                            <div class="position-relative text-center">
                                <h2 class="blue_sub_title">Statutory Compliance</h2>
                                <svg class="line" width="90" height="9" viewBox="0 0 90 9" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path d="M2.02431 7.09212C30.0244 6.09216 52.5242 0.592169 87.8787 2.46593"
                                        stroke="#02BB9A" stroke-width="3" stroke-linecap="round"></path>
                                </svg>
                                <div class="care_list">
                                    {{-- <p style="font-weight:500; font-size:16px; color: #3E6FCC;">Bio-Medical Waste
                                        Management Rules 2016-17</p> --}}
                                </div>
                            </div>

                            <div class="statutory_info pt-lg-4">
                                <div class="row justify-content-center">
                                    @foreach ($statutory_compliances as $statutory_compliance)
                                        @php
                                            $image = str_replace('/public', '', url('/')) . '/storage/' . $statutory_compliance->storage_path . $statutory_compliance->document;
                                        @endphp
                                        <div class="col-lg-5">
                                            <a href="{{$image}}" target="_blank">
                                            <div class="statutory_bg">
                                                <div class="statutory_content" style="width: 100%">
                                                    {{-- <a href="{{$image}}" target="_blank"
                                                        class="d-flex align-items-center text-white"> --}}
                                                        <p class="mb-0">{{$statutory_compliance->title_1}}</p>
                                                    {{-- </a> --}}
                                                </div>
                                                <div>
                                                    <img src="assets/images/pdf_logo.png" alt="">
                                                </div>
                                            </div>
                                            </a>
                                        </div>
                                    @endforeach
                                    {{-- <div class="col-lg-5">
                                        <div class="statutory_bg">
                                            <div class="statutory_content">
                                                <a href="https://www.kiranhospital.com/BMW-annueal-report.pdf"
                                                    class=" d-flex align-items-center text-white">
                                                    <p class="mb-0">Anual Report of Waste Generated </p>
                                                    <div>
                                                        <img src="assets/images/pdf_logo.png" alt="">
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    </div> --}}
                                </div>
                            </div>

                            <div class="box_bottom_content mt-lg-5 text-center d-flex justify-content-center">
                                <p style="width:800px"><span style="color: #ED1C24;">Note:</span>Children are not
                                    allowed as visitors in
                                    the hospital. Visitors will be allowed access to Indoor
                                    Patient only with valid visitor passes. Please Co-operate.</p>
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
