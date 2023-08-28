@extends('layouts.master')
@section('content')
<!-- first section -->
@php
if($hours){
$image = str_replace("/public","",url('/')).'/storage/'.$hours->image_path.$hours->cover_image;
if($hours->cover_image==null)
{
$image = asset('assets/images/international_patient.png');
}
}@endphp
<section class="page_heading visit_section" style='background:url("{{ $image }}")'>
    <div class="container">
        <h1 class="visit_title" style="text-transform: capitalize;">
            {{ucfirst($hours->heading)}}
        </h1>
        <nav style="--bs-breadcrumb-divider: '>>';" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{url('/home')}}" class="text-dark">Home</a></li>
                <li class="breadcrumb-item" aria-current="page">Patients & Visitors</li>
                <li class="breadcrumb-item" aria-current="page">Visitor Guide</li>
                <li class="breadcrumb-item" aria-current="page" style="text-transform: capitalize;">{{ucfirst($hours->heading)}}</li>
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
    <div class="container-fluid">
        <div>
            <ul class="nav nav-tabs floor_nav_tab" id="myTab" role="tablist">
                @foreach($patients_guide_services as $key=>$guide_services_list)
                @php
                $name = (explode(' ',trim($guide_services_list->heading)));
                $name = Illuminate\Support\Str::lower($name[0]);
                @endphp
                @php $slug_url = trim('/patients_guide_service/'.$guide_services_list->slug); @endphp
                <li class="nav-item {{ route('get_patients_guide_services', $guide_services_list->slug) == url()->current() ? 'active' : '' }}" role="presentation">
                    <a class="nav-link  floor_link{{++$key}}" href="{{route('get_patients_guide_services',$guide_services_list->slug)}}" id="{{$name}}-tab" type="button" role="tab" style="text-transform: capitalize;">{{ucfirst($guide_services_list->heading)}}</a>
                </li>
                @endforeach
                @php $i= count($patients_guide_services) @endphp
                <li class="nav-item {{ request()->is('dos_donts') ? 'active' : '' }}" role="presentation">
                    <a class="nav-link floor_link{{++$i}} " href="{{ url('/dos_donts') }}" id="do-tab" type="button" role="tab">Do’s & Don’ts</a>
                </li>
                <li class="nav-item {{ request()->is('patients_responsibilities') ? 'active' : '' }}" role="presentation">
                    <a class="nav-link floor_link{{++$i}}  " href="{{ url('/patients_responsibilities') }}" id="responsibilities-tab" role="tab">Patient’s Rights &
                        Responsibilities</a>
                </li>
                <li class="nav-item {{ request()->is('visiting_hours') ? 'active' : '' }}" role="presentation">
                    <a class="nav-link floor_link{{++$i}}" href="{{ url('/visiting_hours') }}" id="visiting-tab" type="button" role="tab">Visiting Hours</a>
                </li>
            </ul>
        </div>
    </div>
    <div class="container">
            <div class="tab-content py-3" id="myTabContent">
                <div class="tab-pane fade show active" id="ambulance" role="tabpanel" aria-labelledby="ambulance-tab">
                    <div class="amenities_box mb-5">
                        <div class="position-relative text-center">
                            <h2 class="blue_sub_title">{{$hours->title}}</h2>
                            <svg class="line" width="90" height="9" viewBox="0 0 90 9" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M2.02431 7.09212C30.0244 6.09216 52.5242 0.592169 87.8787 2.46593" stroke="#02BB9A" stroke-width="3" stroke-linecap="round"></path>
                            </svg>
                            <div class="care_list">
                            </div>
                        </div>
                        <div class="visit_hour_info pt-lg-5">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="visit_day_bg">
                                        <div class="visit_content">
                                            <p>Morning Time</p>
                                            @php $morning_timing = explode('To', $hours->morning_timing); @endphp
                                            <h6 class="mb-0">{{(new \App\Helpers\CommonHelper)->timing($morning_timing[0])}} to {{(new \App\Helpers\CommonHelper)->timing($morning_timing[1])}} </h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="visit_night_bg">
                                        <div class="visit_content">
                                            <p>Evening Time</p>
                                            @php $eveining_timimg = explode('To', $hours->eveining_timimg); @endphp
                                            <h6 class="mb-0">{{(new \App\Helpers\CommonHelper)->timing($eveining_timimg[0])}} to {{(new \App\Helpers\CommonHelper)->timing($eveining_timimg[1])}} </h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="box_bottom_content mt-lg-5 text-center d-flex justify-content-center">
                            {!! $hours->note !!}
                        </div>
                    </div>
                </div>
            </div>
    </div>
    
    <div class="visit_circle_bg1"></div>
    <div class="visit_circle_bg2"></div>
</section>

<!-- Patients Speak start -->
@include('layouts.include.reviews')
<!-- Patients Speak end -->

<!-- third section -->
@include('layouts.include.map')
@endsection
@section('script')
@endsection