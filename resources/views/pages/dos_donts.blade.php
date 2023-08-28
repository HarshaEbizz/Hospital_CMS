@extends('layouts.master')
@section('content')
    <!-- first section -->
    @php
        if ($do_and_donts) {
            $image = str_replace('/public', '', url('/')) . '/storage/' . $do_and_donts->image_path . $do_and_donts->cover_image;
            if ($do_and_donts->cover_image == null) {
                $image = asset('assets/images/patient_respons.png');
            }
    } @endphp
    <section class="page_heading do_section" style='background:url("{{ $image }}")'>
        <div class="container">
            <h1 class="do_title" style="text-transform: capitalize;">
                {{ ucfirst($do_and_donts->heading) }}
            </h1>
            <nav style="--bs-breadcrumb-divider: '>>';" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('/home') }}" class="text-dark">Home</a></li>
                    <li class="breadcrumb-item" aria-current="page">Patients & Visitors</li>
                    <li class="breadcrumb-item" aria-current="page">Patient Guide</li>
                    <li class="breadcrumb-item" aria-current="page" style="text-transform: capitalize;">
                        {{ ucfirst($do_and_donts->heading) }}</li>
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
        <div class="container-fluid">
            <div>
                <ul class="nav nav-tabs floor_nav_tab" id="myTab" role="tablist">
                    @foreach ($patients_guide_services as $key => $guide_services_list)
                        @php
                            $name = explode(' ', trim($guide_services_list->heading));
                            $name = Illuminate\Support\Str::lower($name[0]);
                        @endphp
                        @php $slug_url = trim('/patients_guide_service/'.$guide_services_list->slug); @endphp
                        <li class="nav-item {{ route('get_patients_guide_services', $guide_services_list->slug) == url()->current() ? 'active' : '' }}"
                            role="presentation">
                            <a class="nav-link  floor_link{{ ++$key }}"
                                href="{{ route('get_patients_guide_services', $guide_services_list->slug) }}"
                                id="{{ $name }}-tab" type="button" role="tab"
                                style="text-transform: capitalize;">{{ ucfirst($guide_services_list->heading) }}</a>
                        </li>
                    @endforeach
                    @php $i= count($patients_guide_services) @endphp
                    <li class="nav-item {{ request()->is('dos_donts') ? 'active' : '' }}" role="presentation">
                        <a class="nav-link floor_link{{ ++$i }} " href="{{ url('/dos_donts') }}" id="do-tab"
                            type="button" role="tab">Do’s & Don’ts</a>
                    </li>
                    <li class="nav-item {{ request()->is('patients_responsibilities') ? 'active' : '' }}"
                        role="presentation">
                        <a class="nav-link floor_link{{ ++$i }}  " href="{{ url('/patients_responsibilities') }}"
                            id="responsibilities-tab" role="tab">Patient’s Rights &
                            Responsibilities</a>
                    </li>
                    <li class="nav-item {{ request()->is('visiting_hours') ? 'active' : '' }}" role="presentation">
                        <a class="nav-link floor_link{{ ++$i }}" href="{{ url('/visiting_hours') }}"
                            id="visiting-tab" type="button" role="tab">Visiting Hours</a>
                    </li>
                </ul>

            </div>
        </div>

        <div class="container">
            <div class="tab-content py-3" id="myTabContent">
                <div class="tab-pane fade show active" id="ambulance" role="tabpanel" aria-labelledby="ambulance-tab">
                    <div class="amenities_box mb-5">
                        <div class="position-relative text-center">
                            <h2 class="blue_sub_title">{{ $do_and_donts->title }}</h2>
                            <svg class="line" width="90" height="9" viewBox="0 0 90 9" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path d="M2.02431 7.09212C30.0244 6.09216 52.5242 0.592169 87.8787 2.46593" stroke="#02BB9A"
                                    stroke-width="3" stroke-linecap="round"></path>
                            </svg>
                            <div class="care_list">
                            </div>
                            <div class="do_bg_logo">
                                <img src="{{ asset('assets/images/kiran_logo.png') }}" alt="">
                            </div>
                        </div>
                        <div class="row py-md-5 py-3 px-md-4 px-2">
                            <div class="col-lg-6 ul_li_image">
                                <div class="respons_heading mb-4">
                                    <h6>Do’s</h6>
                                    <svg class="line" width="90" height="9" viewBox="0 0 90 9" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path d="M2.02431 7.09212C30.0244 6.09216 52.5242 0.592169 87.8787 2.46593"
                                            stroke="#02BB9A" stroke-width="3" stroke-linecap="round"></path>
                                    </svg>
                                </div>
                                {!! $do_and_donts->do !!}
                            </div>
                            <div class="col-lg-6 ul_li_image">
                                <div class="respons_heading mb-4">
                                    <h6>Don’ts</h6>
                                    <svg class="line" width="90" height="9" viewBox="0 0 90 9" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path d="M2.02431 7.09212C30.0244 6.09216 52.5242 0.592169 87.8787 2.46593"
                                            stroke="#02BB9A" stroke-width="3" stroke-linecap="round"></path>
                                    </svg>
                                </div>
                                {!! $do_and_donts->donts !!}
                            </div>
                        </div>
                        <div class="row py-md-5 py-3 px-md-4 px-2">
                            @if (count($do_and_donts->Content) > 0)
                                @foreach ($do_and_donts->Content as $content)
                                    <div class="col-lg-6 ul_li_image">
                                        <div class="respons_heading mb-4">
                                            <h6>{{ $content->subtitle }}</h6>
                                            <svg class="line" width="90" height="9" viewBox="0 0 90 9"
                                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M2.02431 7.09212C30.0244 6.09216 52.5242 0.592169 87.8787 2.46593"
                                                    stroke="#02BB9A" stroke-width="3" stroke-linecap="round"></path>
                                            </svg>
                                            <p>Following are the general guidelines for visiting patients in
                                                hospital:</p>
                                        </div>
                                        {!! $content->description !!}
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="respons_circle_bg1"></div>
        <div class="respons_circle_bg2"></div>
    </section>
    <!-- Patients Speak start -->
    @include('layouts.include.reviews')
    <!-- Patients Speak end -->

    <!-- third sections -->
    @include('layouts.include.map')
@endsection
@section('script')
@endsection
