@extends('layouts.master')
@section('content')
@php
if($speciality_clinic){
$image = str_replace("/public","",url('/')).'/storage/'.$speciality_clinic->image_path.$speciality_clinic->cover_image;
if($speciality_clinic->cover_image==null)
{
$image = asset('assets/images/special_banner.png');
}
}@endphp
<!-- first section -->
<section class="page_heading_floor special_section" style='background:url("{{ $image }}")'>
    <div class="container">
        <h1 class="special_title">
            {{$speciality_clinic->heading}}
        </h1>
        <nav style="--bs-breadcrumb-divider: '>>';" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{url('/home')}}" class="text-dark">Home</a></li>
                <li class="breadcrumb-item " aria-current="page">{{$speciality_clinic->heading}}</li>
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
<!-- second section -->
@if(!empty($clinic))
<section class="special_section_bg padding_tb_100">
    <div class="container">
        <div>
            <div class="pb-4 text-center contact_us_details">
                <h2 class="blue_sub_title">{{$speciality_clinic->title}}</h2>
                <svg class="line" width="90" height="9" viewBox="0 0 90 9" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M2.02431 7.09212C30.0244 6.09216 52.5242 0.592169 87.8787 2.46593" stroke="#02BB9A" stroke-width="3" stroke-linecap="round"></path>
                </svg>
                <p>{{$speciality_clinic->description}}</p>
            </div>
            <div class="row py-md-5 py-3">
                @foreach($clinic as $cliniclist)
                <div class="col-lg-4">
                    <div class="card border-0 special_card">
                        <div class="card-body">
                            <div>
                            @php $image = str_replace("/public","",url('/')).'/storage/'.$cliniclist->image_path.$cliniclist->image_name; @endphp
                                <img src="{{ $image }}" alt="" class="w-100">
                            </div>
                            <div class="pt-3">
                                <h5 class="mb-0 special_info_title">{{$cliniclist->name}}</h5>
                                <div class="d-flex align-items-center">
                                    <div>
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M14.5 10.5005C14.5 9.11924 13.3808 8 12.0005 8C10.6192 8 9.5 9.11924 9.5 10.5005C9.5 11.8808 10.6192 13 12.0005 13C13.3808 13 14.5 11.8808 14.5 10.5005Z" stroke="#2DBF78" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M11.9995 21C10.801 21 4.5 15.8984 4.5 10.5633C4.5 6.38664 7.8571 3 11.9995 3C16.1419 3 19.5 6.38664 19.5 10.5633C19.5 15.8984 13.198 21 11.9995 21Z" stroke="#2DBF78" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    </div>
                                    <p class="my-2 special_info_text">{{$cliniclist->location}}
                                </div>
                                <div class="special_info_text">
                                    <p class="mb-0">{{$cliniclist->description}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    </div>
    <!-- secound section end -->
</section>
@endif
<!-- Patients Speak start -->
@include('layouts.include.reviews')
<!-- Patients Speak end -->

<!-- forth section -->
@include('layouts.include.map')
<!-- forth section end -->
@endsection
@section('script')
@endsection
