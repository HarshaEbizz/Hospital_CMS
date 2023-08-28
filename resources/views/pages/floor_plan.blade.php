@extends('layouts.master')
@section('content')
<style>
    .inter_plan_details .inter_info_text {
        text-align: left;
    }
</style>
<!-- first section -->
<section class="page_heading floor_head">
    <div class="container">
        <h1 class="floor_title">
            Floor Plan
        </h1>
        <nav style="--bs-breadcrumb-divider: '>>';" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{url('/home')}}" class="text-dark">Home</a></li>
                <li class="breadcrumb-item" aria-current="page">Patients & Visitors</li>
                <li class="breadcrumb-item" aria-current="page">Patient Guide</li>
                <li class="breadcrumb-item" aria-current="page">Floor Plan</li>
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
<section class="floor_content">
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

            <div class="tab-content py-md-5 py-3" id="myTabContent">
                <div class="tab-pane fade show active" id="floor" role="tabpanel" aria-labelledby="floor-tab">
                    <div class="table-responsive">
                        @if(count($floor_plans) > 0)
                        <table class="table">
                            <thead>
                                <tr class="floor_row">
                                    <th scope="col" class="px-3 py-4">Floor</th>
                                    @foreach($wings as $wing)
                                    <th scope="col" class="px-3 py-4">{{ $wing->wing_title }}</th>
                                    @endforeach
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($floors as $floor)
                                <tr>
                                    <th scope="row" class="px-3 py-4">{{ $floor->floor_title }}</th>
                                    @foreach($wings as $wing)
                                    <td class="px-3 py-4">
                                        @php
                                        $sections = explode(",",$floor_plans[$wing->id][$floor->id]);
                                        @endphp
                                        @if(count($sections) > 0)
                                        @foreach ($sections as $section)
                                        @if($section!='')
                                        <span class="d-flex">
                                            <div>
                                                <svg width="18" height="18" viewBox="18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <g clip-path="url(#clip0_2162_19642)">
                                                        <path d="M14.797 3.19088C12.8195 4.90229 11.1466 6.53143 9.61494 8.65698C8.93947 9.59448 8.1883 10.6979 7.69728 11.7397C7.41697 12.2921 6.91166 13.1553 6.73939 13.9853C5.7972 13.1087 4.78517 12.1138 3.74971 11.3345C3.01166 10.7792 0.885877 11.9113 1.75119 12.5624C3.30205 13.7289 4.59181 15.1817 6.10025 16.4003C6.73119 16.9093 8.12947 15.8038 8.45806 15.3399C9.53666 13.8118 9.68408 11.9439 10.4702 10.277C11.6704 7.72768 13.799 5.63354 15.9006 3.81503C17.2931 2.51635 15.8549 2.27682 14.7991 3.19088" fill="#ED1C24"></path>
                                                    </g>
                                                    <defs>
                                                        <clipPath id="clip0_2162_19642">
                                                            <rect width="15" height="15" fill="white" transform="translate(1.5 2)">
                                                            </rect>
                                                        </clipPath>
                                                    </defs>
                                                </svg>
                                            </div>

                                            <div class="inter_plan_details ms-2">
                                                <p class="inter_info_text">{{ $section }}</p>
                                            </div>

                                        </span>
                                        @endif
                                        @endforeach
                                        @endif
                                    </td>
                                    @endforeach
                                    {{-- <td class="px-3 py-4">
                                        <div class="floor_data">
                                            <span class="d-flex">
                                                <div>
                                                    <svg width="18" height="18" viewBox="18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <g clip-path="url(#clip0_2162_19642)">
                                                            <path d="M14.797 3.19088C12.8195 4.90229 11.1466 6.53143 9.61494 8.65698C8.93947 9.59448 8.1883 10.6979 7.69728 11.7397C7.41697 12.2921 6.91166 13.1553 6.73939 13.9853C5.7972 13.1087 4.78517 12.1138 3.74971 11.3345C3.01166 10.7792 0.885877 11.9113 1.75119 12.5624C3.30205 13.7289 4.59181 15.1817 6.10025 16.4003C6.73119 16.9093 8.12947 15.8038 8.45806 15.3399C9.53666 13.8118 9.68408 11.9439 10.4702 10.277C11.6704 7.72768 13.799 5.63354 15.9006 3.81503C17.2931 2.51635 15.8549 2.27682 14.7991 3.19088" fill="#ED1C24"></path>
                                                        </g>
                                                        <defs>
                                                            <clipPath id="clip0_2162_19642">
                                                                <rect width="15" height="15" fill="white" transform="translate(1.5 2)">
                                                                </rect>
                                                            </clipPath>
                                                        </defs>
                                                    </svg>
                                                </div>
                                                <div class="inter_plan_details ms-2">
                                                    <p class="inter_info_text">Reception</p>
                                                </div>
                                            </span>
                                            <span class="d-flex">
                                                <div>
                                                    <svg width="18" height="18" viewBox="18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <g clip-path="url(#clip0_2162_19642)">
                                                            <path d="M14.797 3.19088C12.8195 4.90229 11.1466 6.53143 9.61494 8.65698C8.93947 9.59448 8.1883 10.6979 7.69728 11.7397C7.41697 12.2921 6.91166 13.1553 6.73939 13.9853C5.7972 13.1087 4.78517 12.1138 3.74971 11.3345C3.01166 10.7792 0.885877 11.9113 1.75119 12.5624C3.30205 13.7289 4.59181 15.1817 6.10025 16.4003C6.73119 16.9093 8.12947 15.8038 8.45806 15.3399C9.53666 13.8118 9.68408 11.9439 10.4702 10.277C11.6704 7.72768 13.799 5.63354 15.9006 3.81503C17.2931 2.51635 15.8549 2.27682 14.7991 3.19088" fill="#ED1C24"></path>
                                                        </g>
                                                        <defs>
                                                            <clipPath id="clip0_2162_19642">
                                                                <rect width="15" height="15" fill="white" transform="translate(1.5 2)">
                                                                </rect>
                                                            </clipPath>
                                                        </defs>
                                                    </svg>
                                                </div>
                                                <div class="inter_plan_details ms-2">
                                                    <p class="inter_info_text">Opd Billing</p>
                                                </div>
                                            </span>
                                            <span class="d-flex">
                                                <div>
                                                    <svg width="18" height="18" viewBox="18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <g clip-path="url(#clip0_2162_19642)">
                                                            <path d="M14.797 3.19088C12.8195 4.90229 11.1466 6.53143 9.61494 8.65698C8.93947 9.59448 8.1883 10.6979 7.69728 11.7397C7.41697 12.2921 6.91166 13.1553 6.73939 13.9853C5.7972 13.1087 4.78517 12.1138 3.74971 11.3345C3.01166 10.7792 0.885877 11.9113 1.75119 12.5624C3.30205 13.7289 4.59181 15.1817 6.10025 16.4003C6.73119 16.9093 8.12947 15.8038 8.45806 15.3399C9.53666 13.8118 9.68408 11.9439 10.4702 10.277C11.6704 7.72768 13.799 5.63354 15.9006 3.81503C17.2931 2.51635 15.8549 2.27682 14.7991 3.19088" fill="#ED1C24"></path>
                                                        </g>
                                                        <defs>
                                                            <clipPath id="clip0_2162_19642">
                                                                <rect width="15" height="15" fill="white" transform="translate(1.5 2)">
                                                                </rect>
                                                            </clipPath>
                                                        </defs>
                                                    </svg>
                                                </div>
                                                <div class="inter_plan_details ms-2">
                                                    <p class="inter_info_text">Ipd Billing</p>
                                                </div>
                                            </span>
                                            <span class="d-flex">
                                                <div>
                                                    <svg width="18" height="18" viewBox="18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <g clip-path="url(#clip0_2162_19642)">
                                                            <path d="M14.797 3.19088C12.8195 4.90229 11.1466 6.53143 9.61494 8.65698C8.93947 9.59448 8.1883 10.6979 7.69728 11.7397C7.41697 12.2921 6.91166 13.1553 6.73939 13.9853C5.7972 13.1087 4.78517 12.1138 3.74971 11.3345C3.01166 10.7792 0.885877 11.9113 1.75119 12.5624C3.30205 13.7289 4.59181 15.1817 6.10025 16.4003C6.73119 16.9093 8.12947 15.8038 8.45806 15.3399C9.53666 13.8118 9.68408 11.9439 10.4702 10.277C11.6704 7.72768 13.799 5.63354 15.9006 3.81503C17.2931 2.51635 15.8549 2.27682 14.7991 3.19088" fill="#ED1C24"></path>
                                                        </g>
                                                        <defs>
                                                            <clipPath id="clip0_2162_19642">
                                                                <rect width="15" height="15" fill="white" transform="translate(1.5 2)">
                                                                </rect>
                                                            </clipPath>
                                                        </defs>
                                                    </svg>
                                                </div>
                                                <div class="inter_plan_details ms-2">
                                                    <p class="inter_info_text">Tpa -Cashless</p>
                                                </div>
                                            </span>
                                            <span class="d-flex">
                                                <div>
                                                    <svg width="18" height="18" viewBox="18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <g clip-path="url(#clip0_2162_19642)">
                                                            <path d="M14.797 3.19088C12.8195 4.90229 11.1466 6.53143 9.61494 8.65698C8.93947 9.59448 8.1883 10.6979 7.69728 11.7397C7.41697 12.2921 6.91166 13.1553 6.73939 13.9853C5.7972 13.1087 4.78517 12.1138 3.74971 11.3345C3.01166 10.7792 0.885877 11.9113 1.75119 12.5624C3.30205 13.7289 4.59181 15.1817 6.10025 16.4003C6.73119 16.9093 8.12947 15.8038 8.45806 15.3399C9.53666 13.8118 9.68408 11.9439 10.4702 10.277C11.6704 7.72768 13.799 5.63354 15.9006 3.81503C17.2931 2.51635 15.8549 2.27682 14.7991 3.19088" fill="#ED1C24"></path>
                                                        </g>
                                                        <defs>
                                                            <clipPath id="clip0_2162_19642">
                                                                <rect width="15" height="15" fill="white" transform="translate(1.5 2)">
                                                                </rect>
                                                            </clipPath>
                                                        </defs>
                                                    </svg>
                                                </div>
                                                <div class="inter_plan_details ms-2">
                                                    <p class="inter_info_text">Desk</p>
                                                </div>
                                            </span>
                                            <span class="d-flex">
                                                <div>
                                                    <svg width="18" height="18" viewBox="18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <g clip-path="url(#clip0_2162_19642)">
                                                            <path d="M14.797 3.19088C12.8195 4.90229 11.1466 6.53143 9.61494 8.65698C8.93947 9.59448 8.1883 10.6979 7.69728 11.7397C7.41697 12.2921 6.91166 13.1553 6.73939 13.9853C5.7972 13.1087 4.78517 12.1138 3.74971 11.3345C3.01166 10.7792 0.885877 11.9113 1.75119 12.5624C3.30205 13.7289 4.59181 15.1817 6.10025 16.4003C6.73119 16.9093 8.12947 15.8038 8.45806 15.3399C9.53666 13.8118 9.68408 11.9439 10.4702 10.277C11.6704 7.72768 13.799 5.63354 15.9006 3.81503C17.2931 2.51635 15.8549 2.27682 14.7991 3.19088" fill="#ED1C24"></path>
                                                        </g>
                                                        <defs>
                                                            <clipPath id="clip0_2162_19642">
                                                                <rect width="15" height="15" fill="white" transform="translate(1.5 2)">
                                                                </rect>
                                                            </clipPath>
                                                        </defs>
                                                    </svg>
                                                </div>
                                                <div class="inter_plan_details ms-2">
                                                    <p class="inter_info_text">Government</p>
                                                </div>
                                            </span>
                                            <span class="d-flex">
                                                <div>
                                                    <svg width="18" height="18" viewBox="18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <g clip-path="url(#clip0_2162_19642)">
                                                            <path d="M14.797 3.19088C12.8195 4.90229 11.1466 6.53143 9.61494 8.65698C8.93947 9.59448 8.1883 10.6979 7.69728 11.7397C7.41697 12.2921 6.91166 13.1553 6.73939 13.9853C5.7972 13.1087 4.78517 12.1138 3.74971 11.3345C3.01166 10.7792 0.885877 11.9113 1.75119 12.5624C3.30205 13.7289 4.59181 15.1817 6.10025 16.4003C6.73119 16.9093 8.12947 15.8038 8.45806 15.3399C9.53666 13.8118 9.68408 11.9439 10.4702 10.277C11.6704 7.72768 13.799 5.63354 15.9006 3.81503C17.2931 2.51635 15.8549 2.27682 14.7991 3.19088" fill="#ED1C24"></path>
                                                        </g>
                                                        <defs>
                                                            <clipPath id="clip0_2162_19642">
                                                                <rect width="15" height="15" fill="white" transform="translate(1.5 2)">
                                                                </rect>
                                                            </clipPath>
                                                        </defs>
                                                    </svg>
                                                </div>
                                                <div class="inter_plan_details ms-2">
                                                    <p class="inter_info_text">Scheme Desk</p>
                                                </div>
                                            </span>
                                        </div>
                                    </td>
                                    <td class="px-3 py-4">
                                        <div class="floor_data">
                                            <span class="d-flex">
                                                <div>
                                                    <svg width="18" height="18" viewBox="18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <g clip-path="url(#clip0_2162_19642)">
                                                            <path d="M14.797 3.19088C12.8195 4.90229 11.1466 6.53143 9.61494 8.65698C8.93947 9.59448 8.1883 10.6979 7.69728 11.7397C7.41697 12.2921 6.91166 13.1553 6.73939 13.9853C5.7972 13.1087 4.78517 12.1138 3.74971 11.3345C3.01166 10.7792 0.885877 11.9113 1.75119 12.5624C3.30205 13.7289 4.59181 15.1817 6.10025 16.4003C6.73119 16.9093 8.12947 15.8038 8.45806 15.3399C9.53666 13.8118 9.68408 11.9439 10.4702 10.277C11.6704 7.72768 13.799 5.63354 15.9006 3.81503C17.2931 2.51635 15.8549 2.27682 14.7991 3.19088" fill="#ED1C24"></path>
                                                        </g>
                                                        <defs>
                                                            <clipPath id="clip0_2162_19642">
                                                                <rect width="15" height="15" fill="white" transform="translate(1.5 2)">
                                                                </rect>
                                                            </clipPath>
                                                        </defs>
                                                    </svg>
                                                </div>
                                                <div class="inter_plan_details ms-2">
                                                    <p class="inter_info_text">Pharmacy</p>
                                                </div>
                                            </span>
                                            <span class="d-flex">
                                                <div>
                                                    <svg width="18" height="18" viewBox="18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <g clip-path="url(#clip0_2162_19642)">
                                                            <path d="M14.797 3.19088C12.8195 4.90229 11.1466 6.53143 9.61494 8.65698C8.93947 9.59448 8.1883 10.6979 7.69728 11.7397C7.41697 12.2921 6.91166 13.1553 6.73939 13.9853C5.7972 13.1087 4.78517 12.1138 3.74971 11.3345C3.01166 10.7792 0.885877 11.9113 1.75119 12.5624C3.30205 13.7289 4.59181 15.1817 6.10025 16.4003C6.73119 16.9093 8.12947 15.8038 8.45806 15.3399C9.53666 13.8118 9.68408 11.9439 10.4702 10.277C11.6704 7.72768 13.799 5.63354 15.9006 3.81503C17.2931 2.51635 15.8549 2.27682 14.7991 3.19088" fill="#ED1C24"></path>
                                                        </g>
                                                        <defs>
                                                            <clipPath id="clip0_2162_19642">
                                                                <rect width="15" height="15" fill="white" transform="translate(1.5 2)">
                                                                </rect>
                                                            </clipPath>
                                                        </defs>
                                                    </svg>
                                                </div>
                                                <div class="inter_plan_details ms-2">
                                                    <p class="inter_info_text">Prayer Room</p>
                                                </div>
                                            </span>
                                            <span class="d-flex">
                                                <div>
                                                    <svg width="18" height="18" viewBox="18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <g clip-path="url(#clip0_2162_19642)">
                                                            <path d="M14.797 3.19088C12.8195 4.90229 11.1466 6.53143 9.61494 8.65698C8.93947 9.59448 8.1883 10.6979 7.69728 11.7397C7.41697 12.2921 6.91166 13.1553 6.73939 13.9853C5.7972 13.1087 4.78517 12.1138 3.74971 11.3345C3.01166 10.7792 0.885877 11.9113 1.75119 12.5624C3.30205 13.7289 4.59181 15.1817 6.10025 16.4003C6.73119 16.9093 8.12947 15.8038 8.45806 15.3399C9.53666 13.8118 9.68408 11.9439 10.4702 10.277C11.6704 7.72768 13.799 5.63354 15.9006 3.81503C17.2931 2.51635 15.8549 2.27682 14.7991 3.19088" fill="#ED1C24"></path>
                                                        </g>
                                                        <defs>
                                                            <clipPath id="clip0_2162_19642">
                                                                <rect width="15" height="15" fill="white" transform="translate(1.5 2)">
                                                                </rect>
                                                            </clipPath>
                                                        </defs>
                                                    </svg>
                                                </div>
                                                <div class="inter_plan_details ms-2">
                                                    <p class="inter_info_text">Trustee Office</p>
                                                </div>
                                            </span>
                                            <span class="d-flex">
                                                <div>
                                                    <svg width="18" height="18" viewBox="18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <g clip-path="url(#clip0_2162_19642)">
                                                            <path d="M14.797 3.19088C12.8195 4.90229 11.1466 6.53143 9.61494 8.65698C8.93947 9.59448 8.1883 10.6979 7.69728 11.7397C7.41697 12.2921 6.91166 13.1553 6.73939 13.9853C5.7972 13.1087 4.78517 12.1138 3.74971 11.3345C3.01166 10.7792 0.885877 11.9113 1.75119 12.5624C3.30205 13.7289 4.59181 15.1817 6.10025 16.4003C6.73119 16.9093 8.12947 15.8038 8.45806 15.3399C9.53666 13.8118 9.68408 11.9439 10.4702 10.277C11.6704 7.72768 13.799 5.63354 15.9006 3.81503C17.2931 2.51635 15.8549 2.27682 14.7991 3.19088" fill="#ED1C24"></path>
                                                        </g>
                                                        <defs>
                                                            <clipPath id="clip0_2162_19642">
                                                                <rect width="15" height="15" fill="white" transform="translate(1.5 2)">
                                                                </rect>
                                                            </clipPath>
                                                        </defs>
                                                    </svg>
                                                </div>
                                                <div class="inter_plan_details ms-2">
                                                    <p class="inter_info_text">Emergency</p>
                                                </div>
                                            </span>
                                            <span class="d-flex">
                                                <div>
                                                    <svg width="18" height="18" viewBox="18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <g clip-path="url(#clip0_2162_19642)">
                                                            <path d="M14.797 3.19088C12.8195 4.90229 11.1466 6.53143 9.61494 8.65698C8.93947 9.59448 8.1883 10.6979 7.69728 11.7397C7.41697 12.2921 6.91166 13.1553 6.73939 13.9853C5.7972 13.1087 4.78517 12.1138 3.74971 11.3345C3.01166 10.7792 0.885877 11.9113 1.75119 12.5624C3.30205 13.7289 4.59181 15.1817 6.10025 16.4003C6.73119 16.9093 8.12947 15.8038 8.45806 15.3399C9.53666 13.8118 9.68408 11.9439 10.4702 10.277C11.6704 7.72768 13.799 5.63354 15.9006 3.81503C17.2931 2.51635 15.8549 2.27682 14.7991 3.19088" fill="#ED1C24"></path>
                                                        </g>
                                                        <defs>
                                                            <clipPath id="clip0_2162_19642">
                                                                <rect width="15" height="15" fill="white" transform="translate(1.5 2)">
                                                                </rect>
                                                            </clipPath>
                                                        </defs>
                                                    </svg>
                                                </div>
                                                <div class="inter_plan_details ms-2">
                                                    <p class="inter_info_text">Department</p>
                                                </div>
                                            </span>
                                        </div>
                                    </td>
                                    <td class="px-3 py-4">
                                        <div class="floor_data">
                                            <span class="d-flex">
                                                <div>
                                                    <svg width="18" height="18" viewBox="18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <g clip-path="url(#clip0_2162_19642)">
                                                            <path d="M14.797 3.19088C12.8195 4.90229 11.1466 6.53143 9.61494 8.65698C8.93947 9.59448 8.1883 10.6979 7.69728 11.7397C7.41697 12.2921 6.91166 13.1553 6.73939 13.9853C5.7972 13.1087 4.78517 12.1138 3.74971 11.3345C3.01166 10.7792 0.885877 11.9113 1.75119 12.5624C3.30205 13.7289 4.59181 15.1817 6.10025 16.4003C6.73119 16.9093 8.12947 15.8038 8.45806 15.3399C9.53666 13.8118 9.68408 11.9439 10.4702 10.277C11.6704 7.72768 13.799 5.63354 15.9006 3.81503C17.2931 2.51635 15.8549 2.27682 14.7991 3.19088" fill="#ED1C24"></path>
                                                        </g>
                                                        <defs>
                                                            <clipPath id="clip0_2162_19642">
                                                                <rect width="15" height="15" fill="white" transform="translate(1.5 2)">
                                                                </rect>
                                                            </clipPath>
                                                        </defs>
                                                    </svg>
                                                </div>
                                                <div class="inter_plan_details ms-2">
                                                    <p class="inter_info_text">Radiology</p>
                                                </div>
                                            </span>
                                            <span class="d-flex">
                                                <div>
                                                    <svg width="18" height="18" viewBox="18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <g clip-path="url(#clip0_2162_19642)">
                                                            <path d="M14.797 3.19088C12.8195 4.90229 11.1466 6.53143 9.61494 8.65698C8.93947 9.59448 8.1883 10.6979 7.69728 11.7397C7.41697 12.2921 6.91166 13.1553 6.73939 13.9853C5.7972 13.1087 4.78517 12.1138 3.74971 11.3345C3.01166 10.7792 0.885877 11.9113 1.75119 12.5624C3.30205 13.7289 4.59181 15.1817 6.10025 16.4003C6.73119 16.9093 8.12947 15.8038 8.45806 15.3399C9.53666 13.8118 9.68408 11.9439 10.4702 10.277C11.6704 7.72768 13.799 5.63354 15.9006 3.81503C17.2931 2.51635 15.8549 2.27682 14.7991 3.19088" fill="#ED1C24"></path>
                                                        </g>
                                                        <defs>
                                                            <clipPath id="clip0_2162_19642">
                                                                <rect width="15" height="15" fill="white" transform="translate(1.5 2)">
                                                                </rect>
                                                            </clipPath>
                                                        </defs>
                                                    </svg>
                                                </div>
                                                <div class="inter_plan_details ms-2">
                                                    <p class="inter_info_text">Department</p>
                                                </div>
                                            </span>
                                            <span class="d-flex">
                                                <div>
                                                    <svg width="18" height="18" viewBox="18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <g clip-path="url(#clip0_2162_19642)">
                                                            <path d="M14.797 3.19088C12.8195 4.90229 11.1466 6.53143 9.61494 8.65698C8.93947 9.59448 8.1883 10.6979 7.69728 11.7397C7.41697 12.2921 6.91166 13.1553 6.73939 13.9853C5.7972 13.1087 4.78517 12.1138 3.74971 11.3345C3.01166 10.7792 0.885877 11.9113 1.75119 12.5624C3.30205 13.7289 4.59181 15.1817 6.10025 16.4003C6.73119 16.9093 8.12947 15.8038 8.45806 15.3399C9.53666 13.8118 9.68408 11.9439 10.4702 10.277C11.6704 7.72768 13.799 5.63354 15.9006 3.81503C17.2931 2.51635 15.8549 2.27682 14.7991 3.19088" fill="#ED1C24"></path>
                                                        </g>
                                                        <defs>
                                                            <clipPath id="clip0_2162_19642">
                                                                <rect width="15" height="15" fill="white" transform="translate(1.5 2)">
                                                                </rect>
                                                            </clipPath>
                                                        </defs>
                                                    </svg>
                                                </div>
                                                <div class="inter_plan_details ms-2">
                                                    <p class="inter_info_text">Health Checkup</p>
                                                </div>
                                            </span>
                                            <span class="d-flex">
                                                <div>
                                                    <svg width="18" height="18" viewBox="18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <g clip-path="url(#clip0_2162_19642)">
                                                            <path d="M14.797 3.19088C12.8195 4.90229 11.1466 6.53143 9.61494 8.65698C8.93947 9.59448 8.1883 10.6979 7.69728 11.7397C7.41697 12.2921 6.91166 13.1553 6.73939 13.9853C5.7972 13.1087 4.78517 12.1138 3.74971 11.3345C3.01166 10.7792 0.885877 11.9113 1.75119 12.5624C3.30205 13.7289 4.59181 15.1817 6.10025 16.4003C6.73119 16.9093 8.12947 15.8038 8.45806 15.3399C9.53666 13.8118 9.68408 11.9439 10.4702 10.277C11.6704 7.72768 13.799 5.63354 15.9006 3.81503C17.2931 2.51635 15.8549 2.27682 14.7991 3.19088" fill="#ED1C24"></path>
                                                        </g>
                                                        <defs>
                                                            <clipPath id="clip0_2162_19642">
                                                                <rect width="15" height="15" fill="white" transform="translate(1.5 2)">
                                                                </rect>
                                                            </clipPath>
                                                        </defs>
                                                    </svg>
                                                </div>
                                                <div class="inter_plan_details ms-2">
                                                    <p class="inter_info_text">Sample Collection</p>
                                                </div>
                                            </span>
                                            <span class="d-flex">
                                                <div>
                                                    <svg width="18" height="18" viewBox="18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <g clip-path="url(#clip0_2162_19642)">
                                                            <path d="M14.797 3.19088C12.8195 4.90229 11.1466 6.53143 9.61494 8.65698C8.93947 9.59448 8.1883 10.6979 7.69728 11.7397C7.41697 12.2921 6.91166 13.1553 6.73939 13.9853C5.7972 13.1087 4.78517 12.1138 3.74971 11.3345C3.01166 10.7792 0.885877 11.9113 1.75119 12.5624C3.30205 13.7289 4.59181 15.1817 6.10025 16.4003C6.73119 16.9093 8.12947 15.8038 8.45806 15.3399C9.53666 13.8118 9.68408 11.9439 10.4702 10.277C11.6704 7.72768 13.799 5.63354 15.9006 3.81503C17.2931 2.51635 15.8549 2.27682 14.7991 3.19088" fill="#ED1C24"></path>
                                                        </g>
                                                        <defs>
                                                            <clipPath id="clip0_2162_19642">
                                                                <rect width="15" height="15" fill="white" transform="translate(1.5 2)">
                                                                </rect>
                                                            </clipPath>
                                                        </defs>
                                                    </svg>
                                                </div>
                                                <div class="inter_plan_details ms-2">
                                                    <p class="inter_info_text">Room</p>
                                                </div>
                                            </span>
                                        </div>
                                    </td>
                                    <td class="px-3 py-4">
                                        <div class="floor_data">
                                            <span class="d-flex">
                                                <div>
                                                    <svg width="18" height="18" viewBox="18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <g clip-path="url(#clip0_2162_19642)">
                                                            <path d="M14.797 3.19088C12.8195 4.90229 11.1466 6.53143 9.61494 8.65698C8.93947 9.59448 8.1883 10.6979 7.69728 11.7397C7.41697 12.2921 6.91166 13.1553 6.73939 13.9853C5.7972 13.1087 4.78517 12.1138 3.74971 11.3345C3.01166 10.7792 0.885877 11.9113 1.75119 12.5624C3.30205 13.7289 4.59181 15.1817 6.10025 16.4003C6.73119 16.9093 8.12947 15.8038 8.45806 15.3399C9.53666 13.8118 9.68408 11.9439 10.4702 10.277C11.6704 7.72768 13.799 5.63354 15.9006 3.81503C17.2931 2.51635 15.8549 2.27682 14.7991 3.19088" fill="#ED1C24"></path>
                                                        </g>
                                                        <defs>
                                                            <clipPath id="clip0_2162_19642">
                                                                <rect width="15" height="15" fill="white" transform="translate(1.5 2)">
                                                                </rect>
                                                            </clipPath>
                                                        </defs>
                                                    </svg>
                                                </div>
                                                <div class="inter_plan_details ms-2">
                                                    <p class="inter_info_text">Shops</p>
                                                </div>
                                            </span>
                                            <span class="d-flex">
                                                <div>
                                                    <svg width="18" height="18" viewBox="18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <g clip-path="url(#clip0_2162_19642)">
                                                            <path d="M14.797 3.19088C12.8195 4.90229 11.1466 6.53143 9.61494 8.65698C8.93947 9.59448 8.1883 10.6979 7.69728 11.7397C7.41697 12.2921 6.91166 13.1553 6.73939 13.9853C5.7972 13.1087 4.78517 12.1138 3.74971 11.3345C3.01166 10.7792 0.885877 11.9113 1.75119 12.5624C3.30205 13.7289 4.59181 15.1817 6.10025 16.4003C6.73119 16.9093 8.12947 15.8038 8.45806 15.3399C9.53666 13.8118 9.68408 11.9439 10.4702 10.277C11.6704 7.72768 13.799 5.63354 15.9006 3.81503C17.2931 2.51635 15.8549 2.27682 14.7991 3.19088" fill="#ED1C24"></path>
                                                        </g>
                                                        <defs>
                                                            <clipPath id="clip0_2162_19642">
                                                                <rect width="15" height="15" fill="white" transform="translate(1.5 2)">
                                                                </rect>
                                                            </clipPath>
                                                        </defs>
                                                    </svg>
                                                </div>
                                                <div class="inter_plan_details ms-2">
                                                    <p class="inter_info_text">Video</p>
                                                </div>
                                            </span>
                                            <span class="d-flex">
                                                <div>
                                                    <svg width="18" height="18" viewBox="18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <g clip-path="url(#clip0_2162_19642)">
                                                            <path d="M14.797 3.19088C12.8195 4.90229 11.1466 6.53143 9.61494 8.65698C8.93947 9.59448 8.1883 10.6979 7.69728 11.7397C7.41697 12.2921 6.91166 13.1553 6.73939 13.9853C5.7972 13.1087 4.78517 12.1138 3.74971 11.3345C3.01166 10.7792 0.885877 11.9113 1.75119 12.5624C3.30205 13.7289 4.59181 15.1817 6.10025 16.4003C6.73119 16.9093 8.12947 15.8038 8.45806 15.3399C9.53666 13.8118 9.68408 11.9439 10.4702 10.277C11.6704 7.72768 13.799 5.63354 15.9006 3.81503C17.2931 2.51635 15.8549 2.27682 14.7991 3.19088" fill="#ED1C24"></path>
                                                        </g>
                                                        <defs>
                                                            <clipPath id="clip0_2162_19642">
                                                                <rect width="15" height="15" fill="white" transform="translate(1.5 2)">
                                                                </rect>
                                                            </clipPath>
                                                        </defs>
                                                    </svg>
                                                </div>
                                                <div class="inter_plan_details ms-2">
                                                    <p class="inter_info_text">Conferencing Area</p>
                                                </div>
                                            </span>
                                        </div>
                                    </td> --}}
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Patients Speak start -->
@include('layouts.include.reviews')
<!-- Patients Speak end -->

<!-- third section -->
@include('layouts.include.map')
<!-- third section end -->
@endsection
@section('script')
@endsection