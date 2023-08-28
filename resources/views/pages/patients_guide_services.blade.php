@extends('layouts.master')
@section('style')
<link href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.css" rel="stylesheet" />

<style>
    #room_image_data img.example-image {
        height: 100%;
        width: 100%;
    }

    #room_image_data img.example-image {
        height: 100%;
        width: 100%;
    }

    .load_more {
        font-weight: 600;
        cursor: pointer;
    }
</style>
@endsection
@section('content')
<!-- first section -->
@php
if($guide_service){
$image = str_replace("/public","",url('/')).'/storage/'.$guide_service->image_path.$guide_service->cover_image;
}@endphp
<section class="page_heading_floor ambulance_head" style='background:url("{{ $image }}")'>
    <div class="container">
        <h1 class="ambulance_title" style="text-transform: capitalize;">
            {{ucfirst($guide_service->heading)}}
        </h1>
        <nav style="--bs-breadcrumb-divider: '>>';" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{url('/home')}}" class="text-dark">Home</a></li>
                <li class="breadcrumb-item" aria-current="page">Patients & Visitors</li>
                <li class="breadcrumb-item" aria-current="page">Patient Guide</li>
                <li class="breadcrumb-item" aria-current="page" style="text-transform: capitalize;">{{ucfirst($guide_service->heading)}}</li>
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
<section class="floor_content">
    <div class="container-fluid">
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
                    <a class="nav-link floor_link12" href="{{ url('/visiting_hours') }}" id="visiting-tab" type="button" role="tab">Visiting Hours</a>
                </li>
            </ul>
    </div>
    <div class="container">
        <div>
            @if($guide_service->slug=="floor_plan")
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
                                    <th scope="row" class="px-3 py-4" style="text-transform: capitalize;">{{ $floor->floor_title }}</th>
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
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        @endif
                    </div>
                </div>
            </div>
            @endif
            @if($guide_service->slug=="opd_guide")
            <div class="tab-content py-md-5 py-3" id="myTabContent">
                <div class="tab-pane fade show active" id="floor" role="tabpanel" aria-labelledby="floor-tab">
                    <div class="table-responsive opd_table">
                        <table class="table">
                            <thead>
                                <tr class="floor_row">
                                    <th scope="col" class="px-3 py-4">S.No</th>
                                    <th scope="col" class="px-3 py-4">Cluster</th>
                                    <th scope="col" class="px-3 py-4">OPD No</th>
                                    <th scope="col" class="px-3 py-4">Speciality</th>
                                    <th scope="col" class="px-3 py-4">Doctor Name</th>
                                    <th scope="col" class="px-3 py-4">Morning</th>
                                    <th scope="col" class="px-3 py-4">Evening</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $i=0; @endphp
                                @foreach($doctors as $doctor)
                                @if($doctor->opd_number!=0)
                                <tr>
                                    <th scope="row" class="px-3 py-4">{{++$i}}</th>
                                    <td class="px-3 py-4">
                                        @if(isset($doctor->cluster->cluster))<p>{{$doctor->cluster->cluster}}</p> @else - @endif
                                    </td>
                                    <td class="px-3 py-4">
                                        <p>{{ $doctor->opd_number }}</p>
                                    </td>
                                    <td class="px-3 py-4">
                                        <p>{{$doctor->department->department_name}}</p>
                                    </td>
                                    <td class="px-3 py-4">
                                        <p>Dr. {{ $doctor->full_name }}</p>
                                    </td>
                                    <td class="px-3 py-4">
                                        {{-- @php $morning_timing = explode('To', $doctor->opd_timings_morning); @endphp
                                        <p>
                                            {{ (new \App\Helpers\CommonHelper())->timing($morning_timing[0]) }}
                                            To
                                            {{ (new \App\Helpers\CommonHelper())->timing($morning_timing[1]) }}
                                        </p> --}}
                                        @php
                                            if($doctor->opd_timings_morning != null){
                                            $morning_timing = explode('To', $doctor->opd_timings_morning);

                                            $morning_timing_0 = (new \App\Helpers\CommonHelper())->timing($morning_timing[0]);

                                            $morning_timing_1 = (new \App\Helpers\CommonHelper())->timing($morning_timing[1]);
                                            }else{
                                                $morning_timing_0 = '-';
                                                $morning_timing_1 = '-';
                                            }
                                        @endphp
                                        <p>
                                            {{ $morning_timing_0 }}
                                            To
                                            {{ $morning_timing_1 }}
                                        </p>
                                    </td>
                                    <td class="px-3 py-4">
                                        {{-- @php $eveining_timimg = explode('To', $doctor->opd_timings_eveining); @endphp
                                        <p> {{ (new \App\Helpers\CommonHelper())->timing($eveining_timimg[0]) }}
                                            To
                                            {{ (new \App\Helpers\CommonHelper())->timing($eveining_timimg[1]) }}
                                        </p> --}}
                                        @php
                                            if($doctor->opd_timings_eveining != null){
                                                $eveining_timimg = explode('To', $doctor->opd_timings_eveining);

                                                $eveining_timimg_0 = (new \App\Helpers\CommonHelper())->timing($eveining_timimg[0]);
                                                $eveining_timimg_1 = (new \App\Helpers\CommonHelper())->timing($eveining_timimg[1]);
                                            }else{
                                                $eveining_timimg_0 = '-';
                                                $eveining_timimg_1 = '-';
                                            }
                                        @endphp

                                        <p>
                                            {{ $eveining_timimg_0 }}
                                            To
                                            {{ $eveining_timimg_1 }}
                                        </p>
                                    </td>
                                </tr>
                                @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            @endif
            <div class="tab-content py-3" id="myTabContent">
                <div class="tab-pane fade show active" id="ambulance" role="tabpanel" aria-labelledby="ambulance-tab">
                    @if($guide_service->contact_no)
                    <div class="ambula_box text-center mb-5">
                        <h2 class="blue_sub_title" style="text-transform: capitalize;">{{$guide_service->title}}</h2>
                        <svg class="line" width="90" height="9" viewBox="0 0 90 9" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M2.02431 7.09212C30.0244 6.09216 52.5242 0.592169 87.8787 2.46593" stroke="#02BB9A" stroke-width="3" stroke-linecap="round"></path>
                        </svg>
                        <div class="ambulance_btn">
                            <div class="ambulance_btn_img">
                                <img src="{{ asset('assets/images/ambulance_btn_bg.png') }}" alt="" class="w-100">
                            </div>
                            <div class="d-lg-flex justify-content-center align-items-center ambula_content">
                                <div class="logo-circle me-md-4">
                                    <svg width="48" height="42" viewBox="0 0 48 42" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M29.5781 3.53545C29.9665 3.53545 30.2812 3.22064 30.2812 2.83233V0.708985C30.2812 0.320672 29.9665 0.00585938 29.5781 0.00585938C29.1897 0.00585938 28.875 0.320672 28.875 0.708985V2.83233C28.875 3.22064 29.1897 3.53545 29.5781 3.53545ZM26.1184 3.66595C26.311 4.00777 26.7431 4.12074 27.0762 3.93286C27.4145 3.74208 27.534 3.31327 27.3432 2.97502L26.4516 1.39439C26.2609 1.05623 25.8319 0.936797 25.4937 1.12748C25.1555 1.31827 25.0359 1.74708 25.2267 2.08533L26.1184 3.66595ZM32.0801 3.93286C32.4125 4.12027 32.8452 4.00777 33.038 3.66595L33.9296 2.08533C34.1204 1.74708 34.001 1.31827 33.6626 1.12748C33.3247 0.936703 32.8956 1.05623 32.7048 1.39439L31.8131 2.97502C31.6223 3.31327 31.7418 3.74208 32.0801 3.93286V3.93286ZM45.5963 23.2468L39.8963 21.3474C39.5733 21.2397 39.3133 20.9966 39.1834 20.6803L36.0072 12.9526C35.4637 11.6291 34.1873 10.7738 32.7552 10.7738H32.7188V9.50799C32.7188 7.77624 31.3099 6.36736 29.5781 6.36736C27.8464 6.36736 26.4375 7.77624 26.4375 9.50799V10.7738H21.6599C21.6587 10.7738 21.6575 10.7736 21.6562 10.7736C21.655 10.7736 21.6538 10.7738 21.6526 10.7738H3.51562C1.57706 10.7738 0 12.3509 0 14.2894V18.9299C0 19.3182 0.314719 19.633 0.703125 19.633C1.09153 19.633 1.40625 19.3182 1.40625 18.9299V14.2894C1.40625 13.1263 2.35256 12.1801 3.51562 12.1801H20.9531V27.3674H1.40625V22.2111C1.40625 21.8228 1.09153 21.508 0.703125 21.508C0.314719 21.508 0 21.8228 0 22.2111V33.2738C0 35.2124 1.57706 36.7894 3.51562 36.7894H5.31675C5.66578 39.7156 8.16103 41.9924 11.1797 41.9924C14.1983 41.9924 16.6936 39.7156 17.0426 36.7894H29.8558C30.2048 39.7156 32.7001 41.9924 35.7188 41.9924C38.7374 41.9924 41.2327 39.7156 41.5817 36.7894H44.4844C46.4229 36.7894 48 35.2124 48 33.2738V26.5819C48 25.0659 47.034 23.7256 45.5963 23.2468V23.2468ZM11.1797 40.5861C8.69831 40.5861 6.67969 38.5674 6.67969 36.0861C6.67969 33.6048 8.69831 31.5861 11.1797 31.5861C13.6611 31.5861 15.6797 33.6048 15.6797 36.0861C15.6797 38.5674 13.6611 40.5861 11.1797 40.5861ZM20.9531 35.3832H17.0426C16.6938 32.4569 14.1983 30.1799 11.1797 30.1799C8.16103 30.1799 5.66559 32.4569 5.31675 35.3832H3.51562C2.35256 35.3832 1.40625 34.437 1.40625 33.2738V28.7736H20.9531V35.3832ZM27.8438 9.50799C27.8438 8.55164 28.6218 7.77361 29.5781 7.77361C30.5345 7.77361 31.3125 8.55164 31.3125 9.50799V10.7738H27.8438V9.50799ZM35.7188 40.5861C33.2374 40.5861 31.2188 38.5674 31.2188 36.0861C31.2188 33.6048 33.2374 31.5861 35.7188 31.5861C38.2001 31.5861 40.2188 33.6048 40.2188 36.0861C40.2188 38.5674 38.2001 40.5861 35.7188 40.5861ZM46.5938 27.3674H35.869C35.4806 27.3674 35.1659 27.6822 35.1659 28.0705C35.1659 28.4588 35.4806 28.7736 35.869 28.7736H46.5938V33.2738C46.5938 34.437 45.6474 35.3832 44.4844 35.3832H41.5817C41.2328 32.4569 38.7374 30.1799 35.7188 30.1799C32.7001 30.1799 30.2047 32.4569 29.8558 35.3832H22.3594V28.7736H32.5878C32.9762 28.7736 33.2909 28.4588 33.2909 28.0705C33.2909 27.6822 32.9762 27.3674 32.5878 27.3674H22.3594V12.1801H32.7553C33.6145 12.1801 34.3805 12.693 34.7065 13.487L37.8827 21.2148C38.1683 21.9098 38.7402 22.4443 39.4518 22.6815L45.1519 24.5808C46.0143 24.8681 46.5938 25.6723 46.5938 26.5818V27.3674ZM33.3955 14.3205C33.216 13.8744 32.7892 13.5861 32.3084 13.5861H24.9375C24.2913 13.5861 23.7656 14.1118 23.7656 14.758V21.2736C23.7656 21.9198 24.2913 22.4455 24.9375 22.4455H34.9311C35.7401 22.4515 36.3269 21.5867 36.0182 20.836L33.3955 14.3205ZM25.1719 21.0392V14.9924H32.1501L34.5841 21.0392H25.1719ZM35.7188 33.9767C34.5557 33.9767 33.6094 34.923 33.6094 36.0861C33.6094 37.2493 34.5557 38.1955 35.7188 38.1955C36.8818 38.1955 37.8281 37.2493 37.8281 36.0861C37.8281 34.923 36.8818 33.9767 35.7188 33.9767ZM35.7188 36.7892C35.331 36.7892 35.0156 36.4739 35.0156 36.0861C35.0156 35.6984 35.331 35.383 35.7188 35.383C36.1065 35.383 36.4219 35.6984 36.4219 36.0861C36.4219 36.4739 36.1065 36.7892 35.7188 36.7892ZM12.0234 13.5861H10.3359C9.63806 13.5861 9.07031 14.1539 9.07031 14.8517V17.6642H6.25781C5.55994 17.6642 4.99219 18.232 4.99219 18.9299V20.6174C4.99219 21.3152 5.55994 21.883 6.25781 21.883H9.07031V24.6955C9.07031 25.3934 9.63806 25.9611 10.3359 25.9611H12.0234C12.7213 25.9611 13.2891 25.3934 13.2891 24.6955V21.883H16.1016C16.7994 21.883 17.3672 21.3152 17.3672 20.6174V18.9299C17.3672 18.232 16.7994 17.6642 16.1016 17.6642H13.2891V14.8517C13.2891 14.1539 12.7213 13.5861 12.0234 13.5861ZM15.9609 19.0705V20.4767H12.8672C12.3244 20.4767 11.8828 20.9183 11.8828 21.4611V24.5549H10.4766V21.4611C10.4766 20.9183 10.035 20.4767 9.49219 20.4767H6.39844V19.0705H9.49219C10.035 19.0705 10.4766 18.6289 10.4766 18.0861V14.9924H11.8828V18.0861C11.8828 18.6289 12.3244 19.0705 12.8672 19.0705H15.9609ZM11.1797 33.9767C10.0166 33.9767 9.07031 34.923 9.07031 36.0861C9.07031 37.2493 10.0166 38.1955 11.1797 38.1955C12.3428 38.1955 13.2891 37.2493 13.2891 36.0861C13.2891 34.923 12.3428 33.9767 11.1797 33.9767ZM11.1797 36.7892C10.7919 36.7892 10.4766 36.4739 10.4766 36.0861C10.4766 35.6984 10.7919 35.383 11.1797 35.383C11.5674 35.383 11.8828 35.6984 11.8828 36.0861C11.8828 36.4739 11.5674 36.7892 11.1797 36.7892Z" fill="#ED1C24" />
                                    </svg>
                                </div>
                                <div class="ambula_numbar">
                                    <p class="mb-0">Please Contact Us On</p>
                                    <h1><a class="call" href="tel:+{{$guide_service->contact_no}}">+{{$guide_service->contact_no}}</a></h1>
                                </div>
                            </div>
                        </div>
                        {!! $guide_service->description !!}
                    </div>
                    @endif
                    @if($guide_service->image_name && (!$guide_service->contact_no) && $guide_service->description)
                    <div class="care_box mb-5 ul_li_image">
                        <div class="row p-md-5 p-3">
                            <div class="col-lg-8">
                                <div class="position-relative">
                                    <h2 class="blue_sub_title" style="text-transform: capitalize;">{{$guide_service->title}}</h2>
                                    <svg class="line" width="90" height="9" viewBox="0 0 90 9" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M2.02431 7.09212C30.0244 6.09216 52.5242 0.592169 87.8787 2.46593" stroke="#02BB9A" stroke-width="3" stroke-linecap="round"></path>
                                    </svg>
                                    <div class="care_list">
                                        {!! $guide_service->description !!}
                                    </div>
                                    <div class="care_bg_logo">
                                        <img src="{{ asset('assets/images/kiran_logo.png') }}" alt="">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                @php $image = str_replace("/public","",url('/')).'/storage/'.$guide_service->image_path.$guide_service->image_name; @endphp
                                <img src="{{$image}}" alt="" class="w-100">
                            </div>
                        </div>
                        @if($guide_service->sub_title && $guide_service->details)
                        <div class="row px-md-5 px-3">
                            <div class="amenities_heading mb-4">
                                <h6 style="text-transform: capitalize;">{{$guide_service->sub_title }}</h6>
                            </div>
                            {!! $guide_service->details !!}
                        </div>
                        @endif
                    </div>
                    @endif
                    @if(!$guide_service->image_name && (!$guide_service->contact_no) && $guide_service->description)
                    <div class="guide_box mb-5">
                        <div class="position-relative">
                            <div class="ipd_heading text-center">
                                <h2 class="blue_sub_title" style="text-transform: capitalize;">{{$guide_service->title}}</h2>
                                <svg class="line" width="90" height="9" viewBox="0 0 90 9" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M2.02431 7.09212C30.0244 6.09216 52.5242 0.592169 87.8787 2.46593" stroke="#02BB9A" stroke-width="3" stroke-linecap="round"></path>
                                </svg>
                                {!! $guide_service->description !!}
                            </div>
                            <div class="hosp_tour_tabs">
                                <ul class="nav nav-tabs tour_nav_tab" id="tour_nav_tab" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link active tour_link" data_id="all" id="all-tab" data-bs-toggle="tab" data-bs-target="#all" type="button" role="tab" aria-controls="all" aria-selected="true">All</button>
                                    </li>
                                    @foreach($rooms_category as $category)
                                    @php
                                    $name = (explode(' ',trim($category->name)));
                                    $name = Illuminate\Support\Str::lower($name[0]);
                                    @endphp
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link  tour_link" id="{{$name}}-tab" data_id="{{$category->id}}" data-bs-toggle="tab" data-bs-target="#{{$name}}" type="button" role="tab" aria-controls="{{$name}}" aria-selected="true">{{$category->name}}</button>
                                    </li>
                                    @endforeach
                                </ul>
                                <div class="tab-content pt-md-5 pt-3" id="myTabContent">
                                    <div class="tab-pane fade show active" id="all" role="tabpanel" aria-labelledby="all-tab">
                                        <div class="row room_data room_image_data">
                                        </div>
                                    </div>
                                    <!-- <div class="auto-load text-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-loader">
                                            <line x1="12" y1="2" x2="12" y2="6"></line>
                                            <line x1="12" y1="18" x2="12" y2="22"></line>
                                            <line x1="4.93" y1="4.93" x2="7.76" y2="7.76"></line>
                                            <line x1="16.24" y1="16.24" x2="19.07" y2="19.07"></line>
                                            <line x1="2" y1="12" x2="6" y2="12"></line>
                                            <line x1="18" y1="12" x2="22" y2="12"></line>
                                            <line x1="4.93" y1="19.07" x2="7.76" y2="16.24"></line>
                                            <line x1="16.24" y1="7.76" x2="19.07" y2="4.93"></line>
                                        </svg>
                                    </div> -->
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Patients Speak start -->
@include('layouts.include.reviews')
<!-- Patients Speak end -->

<!-- third sections -->
@include('layouts.include.map')

@endsection
@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js"></script>
<script>
    $('[data-fancybox="gallery"]').fancybox({
        image: {
            preload: false
        },
        afterLoad: function(instance, current) {
            var pixelRatio = window.devicePixelRatio
            current.width = current.width / pixelRatio;
            current.width = current.width / pixelRatio;
        }
        // afterLoad: function(instance, current) {
        //     var pixelRatio = window.devicePixelRatio || 1;
        // }
    });
    var page = 1,
        last_page = 2;
    var prev_page = 1;
    var filter = $('ul#tour_nav_tab').find('button.active').attr('data_id');
    LoadRoomData(page, filter);

    $(document).ajaxStop(function() {
        $(window).scroll(function() { //detect page scroll
            if ($(window).scrollTop() + $(window).height() >= $(document).height() - 1600) {
                prev_page = prev_page + 1; //page number increment
                if (prev_page > 1 && prev_page <= last_page) {
                    // $('.auto-load').show();
                    LoadRoomData(prev_page, filter); //load content
                } else {
                    //$('.auto-load').html("");
                }
            }
        });
    });
    $(document).on('click', '.tour_link', function(e) {
        e.preventDefault();
        filter = $(this).attr('data_id');
        var page = 1;
        LoadRoomData(page, filter)
    });

    function LoadRoomData(page, filter) {
        $('.auto-load').show();
        $.ajax({
            url: base_url + "/room_data?page=" + page,
            datatype: "html",
            type: "post",
            data: {
                "filter": filter,
            },
            success: function(response) {
                if (page == 1 && response.html == '') {
                    prev_page = 1;
                    // $('.auto-load').html("");
                    $(".room_data").html('');
                }
                if (page == 1 && response.html != '') {
                    prev_page = 1;
                    // $('.auto-load').html("");
                    $(".room_data").html('');
                }
                if(response.data.last_page==response.data.current_page){
                    $('.load_more').html("");
                }
                $(".room_data").append(response.html);
                last_page = response.data.last_page;
            }
        });
    }
</script>
@endsection
