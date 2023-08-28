@extends('layouts.master')
@section('content')
    <!-- first section -->
    <section class="page_heading_floor ayushman_section">
        <div class="container">
            <h1 class="ayushman_title">
                Goverment Schemes
            </h1>
            <nav style="--bs-breadcrumb-divider: '>>';" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{url('/home')}}" class="text-dark">Home</a></li>
                    <li class="breadcrumb-item" aria-current="page">Patients & Visitors</li>
                    <li class="breadcrumb-item" aria-current="page">Goverment Schemes</li>
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
    <section class="goverment_content position-relative padding_tb_100">
        <div class="container">
            <div class="goverment_heading text-center">
                <h1>Goverment Schemes</h1>
                <svg class="line" width="90" height="9" viewBox="0 0 90 9" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path d="M2.02431 7.09212C30.0244 6.09216 52.5242 0.592169 87.8787 2.46593" stroke="#02BB9A"
                        stroke-width="3" stroke-linecap="round"></path>
                </svg>
            </div>
            <div class="row pt-5 justify-content-center">
                @foreach ($goverment_schemes as $scheme)
                    @php
                        $image = str_replace('/public', '', url('/')) . '/storage/' . $scheme->storage_path . $scheme->scheme_image;
                    @endphp
                    <div class="col-lg-5">
                        <div class="gov_click">
                            <img src="{{ $image }}" alt="" class="w-100" data-bs-toggle="modal"
                                data-bs-target="#model_{{ $scheme->id }}">
                            {{-- </div> --}}
                            <!-- Modal -->
                            <div class="modal fade" id="model_{{ $scheme->id }}" tabindex="-1"
                                aria-labelledby="exampleModalLabel1" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body p-5">
                                            <div class="position-relative text-center">
                                                <h2 class="blue_sub_title">{{ $scheme->scheme_name }}</h2>
                                                <svg class="line" width="90" height="9" viewBox="0 0 90 9"
                                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M2.02431 7.09212C30.0244 6.09216 52.5242 0.592169 87.8787 2.46593"
                                                        stroke="#02BB9A" stroke-width="3" stroke-linecap="round"></path>
                                                </svg>
                                                <div class="care_list mb-lg-5">
                                                    <p> {{ $scheme->scheme_note }}
                                                    </p>
                                                </div>
                                                <div class="pb-5 model_image d-flex justify-content-center">
                                                    <img src="{{ $image }}" alt="">
                                                </div>
                                            </div>
                                            @php $test = explode(",", trim($scheme->details_1));  @endphp
                                            @if ($scheme->details_2)
                                                <div class="row py-md-5 py-3 px-md-4 px-2 justify-content-center">
                                                    <div class="col-lg-6">
                                                        <div class="amenities_data ul_li_image">
                                                            <div class="respons_heading mb-4">
                                                                <h6> {{$scheme->title_2}} of {{$scheme->scheme_name}}</h6>
                                                                <svg class="line" width="90" height="9"
                                                                    viewBox="0 0 90 9" fill="none"
                                                                    xmlns="http://www.w3.org/2000/svg">
                                                                    <path
                                                                        d="M2.02431 7.09212C30.0244 6.09216 52.5242 0.592169 87.8787 2.46593"
                                                                        stroke="#02BB9A" stroke-width="3"
                                                                        stroke-linecap="round">
                                                                    </path>
                                                                </svg>
                                                            </div>
                                                            {{-- <span class="d-flex">
                                                                <div>
                                                                    <svg width="18" height="18" viewBox="18 18"
                                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                        <g clip-path="url(#clip0_2162_19642)">
                                                                            <path
                                                                                d="M14.797 3.19088C12.8195 4.90229 11.1466 6.53143 9.61494 8.65698C8.93947 9.59448 8.1883 10.6979 7.69728 11.7397C7.41697 12.2921 6.91166 13.1553 6.73939 13.9853C5.7972 13.1087 4.78517 12.1138 3.74971 11.3345C3.01166 10.7792 0.885877 11.9113 1.75119 12.5624C3.30205 13.7289 4.59181 15.1817 6.10025 16.4003C6.73119 16.9093 8.12947 15.8038 8.45806 15.3399C9.53666 13.8118 9.68408 11.9439 10.4702 10.277C11.6704 7.72768 13.799 5.63354 15.9006 3.81503C17.2931 2.51635 15.8549 2.27682 14.7991 3.19088"
                                                                                fill="#ED1C24"></path>
                                                                        </g>
                                                                        <defs>
                                                                            <clipPath id="clip0_2162_19642">
                                                                                <rect width="15" height="15"
                                                                                    fill="white"
                                                                                    transform="translate(1.5 2)">
                                                                                </rect>
                                                                            </clipPath>
                                                                        </defs>
                                                                    </svg>
                                                                </div>
                                                                <div class="inter_plan_details ms-2">
                                                                    <p class="inter_info_text">Provides hospitalization
                                                                        cover of up to
                                                                        Rs. 5,00,000 per entitled family per year.</p>
                                                                </div>
                                                            </span> --}}
                                                            {!! $scheme->details_2 !!}
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="amenities_data">
                                                            <div class="respons_heading mb-4">
                                                                <h6>{{ $scheme->title_1 }}</h6>
                                                                <svg class="line" width="90" height="9"
                                                                    viewBox="0 0 90 9" fill="none"
                                                                    xmlns="http://www.w3.org/2000/svg">
                                                                    <path
                                                                        d="M2.02431 7.09212C30.0244 6.09216 52.5242 0.592169 87.8787 2.46593"
                                                                        stroke="#02BB9A" stroke-width="3"
                                                                        stroke-linecap="round">
                                                                    </path>
                                                                </svg>
                                                                <p style="color: #3E6FCC;">{{ $scheme->note_1 }}</p>
                                                            </div>
                                                            @for($i=0; $i<(count($test));$i++)
                                                            <span class="d-flex">
                                                                <div>
                                                                    <svg width="18" height="18" viewBox="18 18"
                                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                        <g clip-path="url(#clip0_2162_19642)">
                                                                            <path
                                                                                d="M14.797 3.19088C12.8195 4.90229 11.1466 6.53143 9.61494 8.65698C8.93947 9.59448 8.1883 10.6979 7.69728 11.7397C7.41697 12.2921 6.91166 13.1553 6.73939 13.9853C5.7972 13.1087 4.78517 12.1138 3.74971 11.3345C3.01166 10.7792 0.885877 11.9113 1.75119 12.5624C3.30205 13.7289 4.59181 15.1817 6.10025 16.4003C6.73119 16.9093 8.12947 15.8038 8.45806 15.3399C9.53666 13.8118 9.68408 11.9439 10.4702 10.277C11.6704 7.72768 13.799 5.63354 15.9006 3.81503C17.2931 2.51635 15.8549 2.27682 14.7991 3.19088"
                                                                                fill="#ED1C24"></path>
                                                                        </g>
                                                                        <defs>
                                                                            <clipPath id="clip0_2162_19642">
                                                                                <rect width="15" height="15"
                                                                                    fill="white"
                                                                                    transform="translate(1.5 2)">
                                                                                </rect>
                                                                            </clipPath>
                                                                        </defs>
                                                                    </svg>
                                                                </div>
                                                                <div class="inter_plan_details ms-2">
                                                                    <p class="inter_info_text">{{$test[$i]}}</p>
                                                                </div>
                                                            </span>
                                                            @endfor
                                                            {{-- <span class="d-flex">
                                                                <div>
                                                                    <svg width="18" height="18" viewBox="18 18"
                                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                        <g clip-path="url(#clip0_2162_19642)">
                                                                            <path
                                                                                d="M14.797 3.19088C12.8195 4.90229 11.1466 6.53143 9.61494 8.65698C8.93947 9.59448 8.1883 10.6979 7.69728 11.7397C7.41697 12.2921 6.91166 13.1553 6.73939 13.9853C5.7972 13.1087 4.78517 12.1138 3.74971 11.3345C3.01166 10.7792 0.885877 11.9113 1.75119 12.5624C3.30205 13.7289 4.59181 15.1817 6.10025 16.4003C6.73119 16.9093 8.12947 15.8038 8.45806 15.3399C9.53666 13.8118 9.68408 11.9439 10.4702 10.277C11.6704 7.72768 13.799 5.63354 15.9006 3.81503C17.2931 2.51635 15.8549 2.27682 14.7991 3.19088"
                                                                                fill="#ED1C24"></path>
                                                                        </g>
                                                                        <defs>
                                                                            <clipPath id="clip0_2162_19642">
                                                                                <rect width="15" height="15"
                                                                                    fill="white"
                                                                                    transform="translate(1.5 2)">
                                                                                </rect>
                                                                            </clipPath>
                                                                        </defs>
                                                                    </svg>
                                                                </div>
                                                                <div class="inter_plan_details ms-2">
                                                                    <p class="inter_info_text">Paediatric medical management
                                                                    </p>
                                                                </div>
                                                            </span> --}}
                                                        </div>
                                                    </div>
                                                </div>
                                            @else
                                            @if($scheme->title_1 != '')
                                                <div class="respons_heading mb-4 text-center">
                                                    <h6>{{ $scheme->title_1 }}</h6>
                                                    <svg class="line" width="90" height="9" viewBox="0 0 90 9" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M2.02431 7.09212C30.0244 6.09216 52.5242 0.592169 87.8787 2.46593" stroke="#02BB9A" stroke-width="3" stroke-linecap="round"></path>
                                                    </svg>
                                                </div>
                                           @endif
                                            @if($scheme->details_1 != '')
                                                <div class="row py-md-5 px-md-4 px-2 justify-content-center">
                                                    <div class="col-lg-3">
                                                        <div class="amenities_data">
                                                            @for($i=0; $i<(ceil(count($test) /2));$i++)
                                                                <span class="d-flex">
                                                                    <div>
                                                                        <svg width="18" height="18" viewBox="18 18"
                                                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                            <g clip-path="url(#clip0_2162_19642)">
                                                                                <path
                                                                                    d="M14.797 3.19088C12.8195 4.90229 11.1466 6.53143 9.61494 8.65698C8.93947 9.59448 8.1883 10.6979 7.69728 11.7397C7.41697 12.2921 6.91166 13.1553 6.73939 13.9853C5.7972 13.1087 4.78517 12.1138 3.74971 11.3345C3.01166 10.7792 0.885877 11.9113 1.75119 12.5624C3.30205 13.7289 4.59181 15.1817 6.10025 16.4003C6.73119 16.9093 8.12947 15.8038 8.45806 15.3399C9.53666 13.8118 9.68408 11.9439 10.4702 10.277C11.6704 7.72768 13.799 5.63354 15.9006 3.81503C17.2931 2.51635 15.8549 2.27682 14.7991 3.19088"
                                                                                    fill="#ED1C24"></path>
                                                                            </g>
                                                                            <defs>
                                                                                <clipPath id="clip0_2162_19642">
                                                                                    <rect width="15" height="15"
                                                                                        fill="white"
                                                                                        transform="translate(1.5 2)">
                                                                                    </rect>
                                                                                </clipPath>
                                                                            </defs>
                                                                        </svg>
                                                                    </div>
                                                                    <div class="inter_plan_details ms-2">
                                                                        <p class="inter_info_text">{{$test[$i]}}</p>
                                                                    </div>
                                                                </span>
                                                            @endfor
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3 offset-lg-1">
                                                        <div class="amenities_data">
                                                            @for($i=(ceil(count($test) /2)); $i<(count($test));$i++)
                                                                <span class="d-flex">
                                                                    <div>
                                                                        <svg width="18" height="18" viewBox="18 18"
                                                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                            <g clip-path="url(#clip0_2162_19642)">
                                                                                <path
                                                                                    d="M14.797 3.19088C12.8195 4.90229 11.1466 6.53143 9.61494 8.65698C8.93947 9.59448 8.1883 10.6979 7.69728 11.7397C7.41697 12.2921 6.91166 13.1553 6.73939 13.9853C5.7972 13.1087 4.78517 12.1138 3.74971 11.3345C3.01166 10.7792 0.885877 11.9113 1.75119 12.5624C3.30205 13.7289 4.59181 15.1817 6.10025 16.4003C6.73119 16.9093 8.12947 15.8038 8.45806 15.3399C9.53666 13.8118 9.68408 11.9439 10.4702 10.277C11.6704 7.72768 13.799 5.63354 15.9006 3.81503C17.2931 2.51635 15.8549 2.27682 14.7991 3.19088"
                                                                                    fill="#ED1C24"></path>
                                                                            </g>
                                                                            <defs>
                                                                                <clipPath id="clip0_2162_19642">
                                                                                    <rect width="15" height="15"
                                                                                        fill="white"
                                                                                        transform="translate(1.5 2)">
                                                                                    </rect>
                                                                                </clipPath>
                                                                            </defs>
                                                                        </svg>
                                                                    </div>
                                                                    <div class="inter_plan_details ms-2">
                                                                        <p class="inter_info_text">{{$test[$i]}}</p>
                                                                    </div>
                                                                </span>
                                                            @endfor
                                                        </div>
                                                    </div>
                                                </div>
                                                @endif
                                            @endif

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach


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
