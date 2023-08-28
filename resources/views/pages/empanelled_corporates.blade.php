@extends('layouts.master')
@section('content')
<!-- first section -->
<section class="page_heading_floor empanel_section">
    <div class="container">
        <h1 class="empanel_title">
            Empanelled Corporates
        </h1>
        <nav style="--bs-breadcrumb-divider: '>>';" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{url('/home')}}" class="text-dark">Home</a></li>
                <li class="breadcrumb-item" aria-current="page">Patients & Visitors</li>
                <li class="breadcrumb-item" aria-current="page">Empanelled Corporates</li>
            </ol>
            <p>
            </p>
            <a href="{{ url('/about_us') }}" style="    display: inline-block;" class="green_btn">About Us
                <svg width="22" height="21" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M8.2459 19.7589C7.94784 19.4667 7.92074 19.0095 8.16461 18.6873L8.2459 18.595L14.9734 12L8.2459 5.40503C7.94784 5.11283 7.92074 4.65558 8.16461 4.33338L8.2459 4.24106C8.54396 3.94887 9.01037 3.9223 9.33904 4.16137L9.43321 4.24106L16.7541 11.418C17.0522 11.7102 17.0793 12.1675 16.8354 12.4897L16.7541 12.582L9.43321 19.7589C9.10534 20.0804 8.57376 20.0804 8.2459 19.7589Z" fill="white" />
                </svg>
            </a>
        </nav>
    </div>
</section>
<!-- first section end-->
<!-- second section -->

<!-- second section -->
<section class="inter_patient_content padding_tb_100">
    <div class="container">
        <div class="text-center pb-4 contact_us_details">
            <h2 class="blue_sub_title">@if($page_contain) {{$page_contain->title}} @endif</h2>
            <svg class="line" width="90" height="9" viewBox="0 0 90 9" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M2.02431 7.09212C30.0244 6.09216 52.5242 0.592169 87.8787 2.46593" stroke="#02BB9A" stroke-width="3" stroke-linecap="round"></path>
            </svg>
            <p>
                @if($page_contain) {{$page_contain->note}} @endif
            </p>
        </div>
        <div class="row pt-5">
            @foreach ($corporate_tieups as $corporate_tieup)
            @php
            $image = str_replace('/public', '', url('/')) . '/storage/' . $corporate_tieup->image_path . $corporate_tieup->company_logo;
            @endphp
            <div class="col-lg-3">
                <div class="text-center empanel_info mb-4">
                    <img src="{{ $image }}" alt="" class="w-100">
                    <div class="overlay">
                        <span>{{$corporate_tieup->company_name}}</span>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
<!-- second section end -->

<!-- third section end -->
<!-- Patients Speak start -->
@include('layouts.include.reviews')
<!-- Patients Speak end -->

<!-- forth section -->
@include('layouts.include.map')
@endsection
@section('script')
@endsection
