@extends('layouts.master')
@section('content')

    <!-- top banner section  start-->
    <?php
    if ($speciality->top_cover_image) {
        $top_cover_image = str_replace('/public', '', url('/')) . '/storage/' . $speciality->image_path . $speciality->top_cover_image;
        if ($speciality->top_cover_image == null) {
            $top_cover_image = asset('assets/images/specialities_head.png');
        }
    } else {
        $top_cover_image = asset('assets/images/specialities_head.png');
    } ?>
    <section class="page_heading specialities_head @if($speciality->slug  == 'gastroenterology_gastrointestinal_surgery') gastro_sec gas_heading @endif" style='background:url("{{ $top_cover_image }}")'>
        <div class="container">
            <h1 class="specialities_title">
                {{ $speciality->name }}
            </h1>
            <nav style="--bs-breadcrumb-divider: '>>';" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('/home') }}" class="text-dark">Home</a></li>
                    <li class="breadcrumb-item " aria-current="page">Specialities</li>
                    <li class="breadcrumb-item active" aria-current="page">{{ $speciality->name }}</li>
                </ol>
                <p>
                    {{ $speciality->banner_text }}
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
    <!-- top banner section  end-->

    <!-- health checkup  slug information section start -->
    @if ($speciality->slug == 'health_checkup_plans')
        <section class="checkup_plans padding_tb_100 ">
            <div class="container">
                <div class="jus_texts text-center">
                    <p class="red_title">Specialities</p>
                    <h2 class="blue_sub_title">Health Checkup plans</h2>
                    <svg class="line" width="90" height="9" viewBox="0 0 90 9" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path d="M2.02431 7.09212C30.0244 6.09216 52.5242 0.592169 87.8787 2.46593" stroke="#02BB9A"
                            stroke-width="3" stroke-linecap="round"></path>
                    </svg>

                </div>

                <div class="row justify-content-center">
                    <div class="col-lg-12">
                        <p class="small_gray_text text-center mb-0">The general Health Check-up examination is a common
                            form
                            of preventive medicine involving
                            visits to a general practitioner by well feeling adults or a child on a regular basis. This
                            is generally yearly or less frequently. It is known under several other names, such as the
                            periodic health evaluation, annual physical examination, comprehensive medical exam, general
                            health check, or preventive health examination</p>
                        <p class="small_gray_text text-center mb-0">Today’s sedentary lifestyle, Lack Of exercise,
                            Unhealthy
                            Diet, pollution has resulted in
                            various types of diseases
                            PREVENTION IS BETTER THAN CURE! Our customized health check-up packages are designed
                            according to Age, Gender, Family History, Life Style, and current status of one’s health. It
                            promotes good health and early detection of health problems.</p>
                        <p class="small_gray_text text-center mb-0">Our highly qualified team of doctors &amp; Paramedical
                            staff
                            with latest high-end technology provides proper diagnosis of all medical conditions.
                            Regular health exams and tests is one of the best way for early detection of illnesses and
                            to get right health service and treatments.</p>
                        <p class="text-center mb-0" style="font-weight: 700;font-size: 14px;color: #487FFD;">The Health
                            Check-up department is located on Ground floor that is in close vicinity of
                            OPDs &amp; Diagnostic Area and is open from 8 AM to 8 PM</p>
                        <p class="small_gray_text text-center">All health check-ups are conducted only by prior
                            appointment. You can book an appointment by:</p>
                    </div>


                    <div class="col-lg-4 mt-4">
                        <div class="call_img">
                            <img src="{{ asset('assets/images/red_bg.png') }}" alt="" class="w-100">
                            <div class="content_bg">
                                <div class="call_icon">
                                    <div class="me-4">
                                        <img src="{{ asset('assets/images/call_icon.png') }}" alt="">
                                    </div>

                                    <div class="bg_txt">
                                        <p>Call</p>
                                        <h1><a class="call" href="tel: +91-261-7161111" style="color:white">+91-261-7161111</a></h1>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 mt-4">
                        <div class="call_img">
                            <img src="{{ asset('assets/images/green_bg.png') }}" alt="" class="w-100">
                            <div class="content_bg">
                                <div class="call_icon">
                                    <div class="me-4">
                                        <img src="{{ asset('assets/images/call_icon.png') }}" alt="">
                                    </div>

                                    <div class="bg_txt">
                                        <p>Online at</p>
                                        <h1><a class="call" href="https://www.kiranhospital.com/" target="blank" style="color: white;">kiranhospital.com</a></h1>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <p class="small_gray_text text-center mt-4">Kindly Note that health check-ups department work for all
                        days except Sunday &amp; Public Holidays. Kindly inform us in case of cancellations of your
                        appointment before 24 hours.</p>
                </div>
            </div>
        </section>
    @endif
    <!-- health checkup  slug information section end -->

    <!-- image and image content section start --> <?php $image_visible = false;
    if (count($speciality->content) > 0) {
        foreach ($speciality->content as $content) {
            if ($content->content_type == 'image_content') {
                $image_visible = true;
            } elseif ($content->content_type == 'image') {
                $image_visible = true;
            }
        }
    }
    ?>
    @if ($image_visible == true)
        <section class="emergency_sec padding_tb_100">
            @if ($speciality->description)
                <div class="jus_texts text-center">
                    <p class="red_title">Specialities</p>
                    <h2 class="blue_sub_title">{{ $speciality->name }}</h2>
                    <svg class="line" width="90" height="9" viewBox="0 0 90 9" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path d="M2.02431 7.09212C30.0244 6.09216 52.5242 0.592169 87.8787 2.46593" stroke="#02BB9A"
                            stroke-width="3" stroke-linecap="round"></path>
                    </svg>
                    <p class="w-sm-75 text-center m-auto mb-sm-5 @if($speciality->slug  == 'ophthalmology') mb-3 @endif" style="font-weight: 400;font-size: 14px;color: #67788E;">
                        {{ $speciality->description }}</p>
                </div>
            @endif
            <div class="container">
                <div class="row align-items-center">
                    @if (count($speciality->content) > 0)
                        @php
                            $count1 = App\Models\SpecialitiesContent::where('content_type', 'image_content')
                                ->where('specialities_id', $speciality->id)
                                ->count();
                        @endphp
                        @if ($count1 > 1)
                            @php $content = App\Models\SpecialitiesContent::where('specialities_id', $speciality->id)->first(); @endphp
                            @php $image = str_replace("/public","",url('/')).'/storage/'.$content->image_path.$content->image_name; @endphp
                            @if ($content->content_type == 'image_content')
                                @if ($content->direction == 'center')
                                    <div class="col-lg-12">
                                        <img src="{{ $image }}" class="img-fluid" alt="">
                                    </div>
                                    <div class="col-lg-12">
                                        <p class="w-75 text-center m-auto ul_li_image"
                                            style="font-weight: 400;font-size: 14px;color: #67788E;">{!! $content->details !!}
                                        </p>
                                    </div>
                                @elseif($content->direction == 'right')
                                    <div class="col-lg-6 ul_li_image">
                                        {!! $content->details !!}
                                    </div>
                                    <div class="col-lg-6">
                                        <img src="{{ $image }}" class="img-fluid" alt="">
                                    </div>
                                @else
                                    <div class="col-lg-6">
                                        <img src="{{ $image }}" class="img-fluid" alt="">
                                    </div>
                                    <div class="col-lg-6 ul_li_image">
                                        {!! $content->details !!}
                                    </div>
                                @endif
                            @elseif($content->content_type == 'image')
                                @if ($content->video_url != '')
                                    <div class="col-lg-6">
                                        <div class="readius_frame">
                                            <iframe width="100%" height="368px" src="{{ $content->video_url }}"
                                                title="Best Ophthalmnology Department of Kiran Hospital Surat"
                                                frameborder="0"
                                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                                allowfullscreen=""></iframe>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <img src="{{ $image }}" class="img-fluid video_image" alt="">
                                    </div>
                                @else
                                    <div class="col-lg-12">
                                        <img src="{{ $image }}" class="img-fluid " alt="">
                                    </div>
                                @endif
                            @endif
                        @else
                            @foreach ($speciality->content as $content)
                                @php $image = str_replace("/public","",url('/')).'/storage/'.$content->image_path.$content->image_name; @endphp
                                @if ($content->content_type == 'image_content')
                                    @if ($content->direction == 'center')
                                        <div class="col-lg-12">
                                            <img src="{{ $image }}" class="img-fluid" alt="">
                                        </div>
                                        <div class="col-lg-12">
                                            <p class="w-75 text-center m-auto ul_li_image"
                                                style="font-weight: 400;font-size: 14px;color: #67788E;">
                                                {!! $content->details !!}</p>
                                        </div>
                                    @elseif($content->direction == 'right')
                                        <div class="col-lg-7 ul_li_image">
                                            {!! $content->details !!}
                                        </div>
                                        <div class="col-lg-5">
                                            <img src="{{ $image }}" class="img-fluid @if($speciality->slug  == 'gastroenterology_gastrointestinal_surgery') w-100 @endif" alt="">
                                        </div>
                                    @else
                                        <div class="col-lg-6">
                                            <img src="{{ $image }}" class="img-fluid" alt="">
                                        </div>
                                        <div class="col-lg-6 ul_li_image">
                                            {!! $content->details !!}
                                        </div>
                                    @endif
                                @elseif($content->content_type == 'image')
                                    @if ($content->video_url != '')
                                        <div class="col-lg-6">
                                            <div class="readius_frame">
                                                <iframe width="100%" height="368px" src="{{ $content->video_url }}"
                                                    title="Best Ophthalmnology Department of Kiran Hospital Surat"
                                                    frameborder="0"
                                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                                    allowfullscreen=""></iframe>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <img src="{{ $image }}" class="img-fluid video_image" alt="">
                                        </div>
                                    @else
                                        <div class="col-lg-12">
                                            <img src="{{ $image }}" class="img-fluid " alt="">
                                        </div>
                                    @endif
                                @endif
                            @endforeach
                        @endif
                    @endif
                </div>
            </div>
        </section>
    @endif
    <!-- image and image content section end -->

    <!-- content section start -->

    <?php $content_visible = false;
    if (count($speciality->content) > 0) {
        foreach ($speciality->content as $content) {
            if ($content->content_type == 'content') {
                $content_visible = true;
            } elseif ($content->content_type == 'multipal_image') {
                $content_visible = true;
            }
        }
    }
    ?>
    @if ($speciality->description || $content_visible == true)
        <section
            class="@if ($speciality->slug == 'clinical_nutrition_dietetics') clinical_offers  @else infrastucture_offers @endif padding_tb_100">
            @if ($speciality->description && $speciality->slug  != 'critical_care' && $speciality->slug  != 'ophthalmology' && $speciality->slug !='obstetrics_gynaecology')
                <div class="jus_texts text-center py-sm-5 py-2">
                    <h2 class="blue_sub_title">{{ $speciality->name }}</h2>
                    <svg class="line" width="90" height="9" viewBox="0 0 90 9" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path d="M2.02431 7.09212C30.0244 6.09216 52.5242 0.592169 87.8787 2.46593" stroke="#02BB9A"
                            stroke-width="3" stroke-linecap="round"></path>
                    </svg>
                    <p class="w-75 text-center m-auto" style="font-weight: 400;font-size: 14px;color: #67788E;">
                        {{ $speciality->description }}</p>
                </div>
            @endif
            <div class="container">
                <div class="row">
                    @if (count($speciality->content) > 0)
                        @if ($speciality->slug == 'pathology_blood_bank')
                            @php
                                $content = App\Models\SpecialitiesContent::where('specialities_id', $speciality->id)
                                    ->skip(1)
                                    ->first();
                                $title = App\Models\SpecialitiesContent::where('specialities_id', $speciality->id)
                                    ->where('content_type', 'content')
                                    ->first();
                            @endphp
                            @if ($title)
                                <div class="col-lg-12">
                                    <div class="jus_texts text-center mb-4">
                                        <!-- <p class="red_title">Specialities</p> -->
                                        <h2 class="blue_sub_title">{{ $title->title }}</h2>
                                        <svg class="line" width="90" height="9" viewBox="0 0 90 9"
                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M2.02431 7.09212C30.0244 6.09216 52.5242 0.592169 87.8787 2.46593"
                                                stroke="#02BB9A" stroke-width="3" stroke-linecap="round"></path>
                                        </svg>
                                    </div>
                                </div>
                            @endif
                            @php $image = str_replace("/public","",url('/')).'/storage/'.$content->image_path.$content->image_name; @endphp
                            @if ($content->content_type == 'image_content')
                                @if ($content->direction == 'center')
                                    <div class="col-lg-12 mb-4">
                                        <img src="{{ $image }}" class="img-fluid" alt="">
                                    </div>
                                    <div class="col-lg-12 mb-4">
                                        <p class="w-75 text-center m-auto ul_li_image"
                                            style="font-weight: 400;font-size: 14px;color: #67788E;">
                                            {!! $content->details !!}
                                        </p>
                                    </div>
                                @elseif($content->direction == 'right')
                                    <div class="col-lg-6 mb-4 ul_li_image">
                                        {!! $content->details !!}
                                    </div>
                                    <div class="col-lg-6 mb-4">
                                        <img src="{{ $image }}" class="img-fluid" alt="" style="border-radius: 18px;">
                                    </div>
                                @else
                                    <div class="col-lg-6 mb-4">
                                        <img src="{{ $image }}" class="img-fluid" alt="" style="border-radius: 18px;">
                                    </div>
                                    <div class="col-lg-6 mb-4 ul_li_image">
                                        {!! $content->details !!}
                                    </div>
                                @endif
                            @endif
                            @php
                                $content1 = App\Models\SpecialitiesContent::where('specialities_id', $speciality->id)
                                    ->where('content_type', 'content')
                                    ->first();
                            @endphp
                            @if ($content1->content_type == 'content')
                                <div class="col-lg-12">
                                    <div class="jus_texts">
                                        <!-- <p class="red_title">Specialities</p> -->
                                        {{-- <h2 class="blue_sub_title">{{ $content1->title }}</h2> --}}
                                        {{-- <svg class="line" width="90" height="9" viewBox="0 0 90 9" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path d="M2.02431 7.09212C30.0244 6.09216 52.5242 0.592169 87.8787 2.46593"
                                            stroke="#02BB9A" stroke-width="3" stroke-linecap="round"></path>
                                    </svg> --}}
                                    </div>
                                    <div class="red_check_ul ul_li_image">
                                        {!! $content1->details !!}
                                    </div>
                                </div>
                            @endif
                            @php
                                $content2 = App\Models\SpecialitiesContent::where('specialities_id', $speciality->id)
                                    ->where('content_type', 'image_content')
                                    ->get();
                            @endphp
                            @foreach ($content2 as $key => $content)
                                @if ($key > 1)
                                    @php $image = str_replace("/public","",url('/')).'/storage/'.$content->image_path.$content->image_name; @endphp
                                    <div class="row align-items-center py-lg-5 py-4">
                                        @if ($content->content_type == 'image_content')
                                            @if ($content->direction == 'center')
                                                <div class="col-lg-12">
                                                    <img src="{{ $image }}" class="img-fluid" alt="">
                                                </div>
                                                <div class="col-lg-12">
                                                    <p class="w-75 text-center m-auto ul_li_image"
                                                        style="font-weight: 400;font-size: 14px;color: #67788E;">
                                                        {!! $content->details !!}
                                                    </p>
                                                </div>
                                            @elseif($content->direction == 'right')
                                                <div class="col-lg-7 ul_li_image">
                                                    {!! $content->details !!}
                                                </div>
                                                <div class="col-lg-5">
                                                    <img src="{{ $image }}" class="img-fluid" alt="" style="border-radius: 18px;">
                                                </div>
                                            @else
                                                <div class="col-lg-6">
                                                    <img src="{{ $image }}" class="img-fluid" alt="" style="border-radius: 18px;">
                                                </div>
                                                <div class="col-lg-6 ul_li_image">
                                                    {!! $content->details !!}
                                                </div>
                                            @endif
                                        @endif
                                    </div>
                                @endif
                            @endforeach
                        @elseif ($speciality->slug == 'radiology')
                            @foreach ($speciality->content as $content)
                                @php
                                    $count = App\Models\SpecialitiesContent::where('content_type', 'content')
                                        ->where('specialities_id', $speciality->id)
                                        ->count();
                                @endphp
                                @if ($content->content_type == 'content')
                                    <div
                                        class=" @if ($count == 1) col-lg-12 @else col-lg-6 @if ($speciality->slug == 'clinical_nutrition_dietetics') mb-3 @endif @endif">
                                        <div class="jus_texts">
                                            <!-- <p class="red_title">Specialities</p> -->
                                            <h2 class="blue_sub_title">{{ $content->title }}</h2>
                                            <svg class="line" width="90" height="9" viewBox="0 0 90 9"
                                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M2.02431 7.09212C30.0244 6.09216 52.5242 0.592169 87.8787 2.46593"
                                                    stroke="#02BB9A" stroke-width="3" stroke-linecap="round"></path>
                                            </svg>
                                        </div>
                                        <div class="red_check_ul ul_li_image">
                                            {!! $content->details !!}
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                            @php
                                $content2 = App\Models\SpecialitiesContent::where('specialities_id', $speciality->id)
                                    ->where('content_type', 'image_content')
                                    ->get();
                            @endphp
                            @foreach ($content2 as $key => $content)
                                @if ($key > 0)
                                    @php $image = str_replace("/public","",url('/')).'/storage/'.$content->image_path.$content->image_name; @endphp
                                    <div class="row align-items-center py-lg-5 py-3">
                                        @if ($content->content_type == 'image_content')
                                            @if ($content->direction == 'center')
                                                <div class="col-lg-12">
                                                    <img src="{{ $image }}" class="img-fluid" alt="">
                                                </div>
                                                <div class="col-lg-12">
                                                    <p class="w-75 text-center m-auto ul_li_image"
                                                        style="font-weight: 400;font-size: 14px;color: #67788E;">
                                                        {!! $content->details !!}
                                                    </p>
                                                </div>
                                            @elseif($content->direction == 'right')
                                                <div class="col-lg-7 ul_li_image">
                                                    {!! $content->details !!}
                                                </div>
                                                <div class="col-lg-5">
                                                    <img src="{{ $image }}" class="img-fluid" alt="" style="border-radius: 18px;">
                                                </div>
                                            @else
                                                <div class="col-lg-6">
                                                    <img src="{{ $image }}" class="img-fluid" alt="" style="border-radius: 18px;">
                                                </div>
                                                <div class="col-lg-6 ul_li_image">
                                                    {!! $content->details !!}
                                                </div>
                                            @endif
                                        @endif
                                    </div>
                                @endif
                            @endforeach
                        @else
                            @foreach ($speciality->content as $content)
                                @php
                                    $count = App\Models\SpecialitiesContent::where('content_type', 'content')
                                        ->where('specialities_id', $speciality->id)
                                        ->count();
                                @endphp
                                @if ($content->content_type == 'content')
                                    <div
                                        class=" @if ($count == 1) col-lg-12 @else col-lg-6 @if ($speciality->slug == 'clinical_nutrition_dietetics') mb-3 @endif @endif">
                                        <div class="jus_texts">
                                            <!-- <p class="red_title">Specialities</p> -->
                                            <h2 class="blue_sub_title">{{ $content->title }}</h2>
                                            <svg class="line" width="90" height="9" viewBox="0 0 90 9"
                                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M2.02431 7.09212C30.0244 6.09216 52.5242 0.592169 87.8787 2.46593"
                                                    stroke="#02BB9A" stroke-width="3" stroke-linecap="round"></path>
                                            </svg>
                                        </div>
                                        <div class="red_check_ul ul_li_image">
                                            {!! $content->details !!}
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                            @foreach ($speciality->content as $content)
                                @php
                                    $count2 = App\Models\SpecialitiesContent::where('content_type', 'multipal_image')
                                        ->where('specialities_id', $speciality->id)
                                        ->count();
                                    $container_image = str_replace('/public', '', url('/')) . '/storage/' . $content->image_path . $content->image_name;
                                @endphp

                                @if ($content->content_type == 'multipal_image')
                                    @if ($speciality->slug == 'oncology')
                                        <div class="col-lg-12  mb-3">
                                            <img src="{{ $container_image }}" alt="" class="w-100">
                                        </div>
                                    @else
                                        <div
                                            class=" @if ($count2 == 1) col-lg-12 @else col-lg-6 mb-3 @endif">
                                            <img src="{{ $container_image }}" alt="" class="w-100">
                                        </div>
                                    @endif
                                @endif
                            @endforeach
                        @endif
                    @endif
                </div>
            </div>
        </section>
    @endif
    <!-- content section end -->

    <!-- tab content section start -->
    @php
        $topics = App\Models\SpecialitiesTabTopics::where('status', 1)
            ->where('specialities_id', $speciality->id)
            ->get();
    @endphp
    @if (count($topics) > 0)
        @if ($speciality->slug == 'plastic_reconstructive_surgery')
            <div class="padding_tb_100 position-relative">
                <div class="container">
                    <div class="plastic_tabs">
                        <div class="plastic_tabs_bx">
                            <ul class="nav nav-tabs align-items-center d-flex flex-nowrap" id="myTab"
                                role="tablist">
                                @foreach ($topics as $key => $topic)
                                    @php
                                        $name = \Illuminate\Support\Str::slug($topic->topic_name, '_');
                                        $check_name = explode(' ', trim($topic->topic_name));
                                    @endphp
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link  @if ($key == 0) active @endif"
                                            id="{{ $name }}-tab" data-bs-toggle="tab"
                                            data-bs-target="#{{ $name }}" type="button" role="tab"
                                            aria-controls="{{ $name }}"
                                            aria-selected="true">{{ $check_name[0] }} @if (isset($check_name[1]))
                                                <br> {{ $check_name[1] }} @if (isset($check_name[2]))
                                                    {{ $check_name[2] }} @if (isset($check_name[3]))
                                                        {{ $check_name[3] }}
                                                    @endif
                                                @endif
                                            @endif
                                        </button>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="tab-content" id="myTabContent">
                            @foreach ($topics as $key => $topic)
                                @php
                                    $name = \Illuminate\Support\Str::slug($topic->topic_name, '_');
                                @endphp
                                @php
                                    $image_tab_contents = '';
                                    $image_tab_contents = App\Models\SpecialitiesTabContent::where('tab_content_type', 'image_content')
                                        ->where('topic_id', $topic->id)
                                        ->orderby('order')
                                        ->get();
                                @endphp
                                @php
                                    $content_tab_contents = '';
                                    $content_tab_contents = App\Models\SpecialitiesTabContent::where('tab_content_type', 'content')
                                        ->where('topic_id', $topic->id)
                                        ->orderby('order')
                                        ->get();
                                @endphp
                                @if (count($image_tab_contents) > 0 || count($content_tab_contents) > 0)
                                    <div class="tab-pane fade @if ($key == 0) active show @endif  " id="{{ $name }}" role="tabpanel"
                                        aria-labelledby="{{ $name }}-tab">
                                        <div class="jus_texts text-center mb-sm-5 mb-3">
                                            <h2 class="blue_sub_title">{{ $topic->topic_name }}</h2>
                                            <svg class="line" width="90" height="9" viewBox="0 0 90 9"
                                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M2.02431 7.09212C30.0244 6.09216 52.5242 0.592169 87.8787 2.46593"
                                                    stroke="#02BB9A" stroke-width="3" stroke-linecap="round"></path>
                                            </svg>
                                        </div>

                                        <div class="row">
                                            @foreach ($content_tab_contents as $key => $content_tab_content)
                                                <div
                                                    class="@if ($content_tab_content->split_content == 'divide') col-lg-6 @else col-lg-12 @endif mb-3">
                                                    <div class="red_check_ul">
                                                        <div class="price_data_each ul_li_image">
                                                            <h6
                                                                style="font-weight: 500;font-size: 16px;color: #3E6FCC;margin-bottom:15px;">
                                                                {{ $content_tab_content->tab_title }}
                                                            </h6>
                                                            {!! $content_tab_content->tab_details !!}
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        @elseif($speciality->slug == 'cancer_oncology_oncosurgery')
            <section class="cancer_tabs">
                <div class="container py-5">
                    <ul class="nav nav-tabs cancer_nav_tab" id="myTab" role="tablist">
                        @foreach ($topics as $key => $topic)
                            @php
                                $name = explode(' ', trim($topic->topic_name));
                                $name = Illuminate\Support\Str::lower($name[0]);
                            @endphp
                            <li class="nav-item" role="presentation">
                                <button
                                    class="nav-link cancer_link{{ ++$key }} @if ($key == 0) active @endif"
                                    id="{{ $name }}-tab" data-bs-toggle="tab"
                                    data-bs-target="#{{ $name }}" type="button" role="tab"
                                    aria-controls="{{ $name }}"
                                    aria-selected="false">{{ $topic->topic_name }}</button>
                            </li>
                        @endforeach
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        @foreach ($topics as $key => $topic)
                            @php
                                $name = explode(' ', trim($topic->topic_name));
                                $name = Illuminate\Support\Str::lower($name[0]);
                            @endphp
                            @php
                                $image_tab_contents = '';
                                $image_tab_contents = App\Models\SpecialitiesTabContent::where('tab_content_type', 'image_content')
                                    ->where('topic_id', $topic->id)
                                    ->orderby('order')
                                    ->get();
                            @endphp
                            @php
                                $content_tab_contents = '';
                                $content_tab_contents = App\Models\SpecialitiesTabContent::where('tab_content_type', 'content')
                                    ->where('topic_id', $topic->id)
                                    ->orderby('order')
                                    ->get();
                            @endphp
                            @if (count($image_tab_contents) > 0 || count($content_tab_contents) > 0)
                                <div class="tab-pane fade @if ($key == 0) active show @endif"
                                    id="{{ $name }}" role="tabpanel" aria-labelledby="{{ $name }}-tab">
                                    <div class="jus_texts text-center mb-sm-5 mb-3">
                                        <h2 class="blue_sub_title">{{ $topic->topic_name }}</h2>
                                        <svg class="line" width="90" height="9" viewBox="0 0 90 9"
                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M2.02431 7.09212C30.0244 6.09216 52.5242 0.592169 87.8787 2.46593"
                                                stroke="#02BB9A" stroke-width="3" stroke-linecap="round"></path>
                                        </svg>

                                    </div>
                                    @foreach ($image_tab_contents as $key => $image_tab_content)
                                        <div class="row align-items-center">
                                            <div class="col-lg-6 mb-4">
                                                @php $content_image = str_replace("/public","",url('/')).'/storage/'.$image_tab_content->image_path.$image_tab_content->image_name; @endphp
                                                <img src="{{ $content_image }}" class="img-fluid" alt="">
                                            </div>
                                            <div class="col-lg-6 mb-4">
                                                <div class="red_check_ul ul_li_image">
                                                    {!! $image_tab_content->tab_details !!}
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                    <div class="row">
                                        @foreach ($content_tab_contents as $key => $content_tab_content)
                                            <div
                                                class="@if ($content_tab_content->split_content == 'divide') col-lg-6 @else col-lg-12 @endif mb-4">
                                                <div class="jus_texts">
                                                    <!-- <p class="red_title">Specialities</p> -->
                                                    <h2 class="blue_sub_title">{{ $content_tab_content->tab_title }}</h2>
                                                    <svg class="line" width="90" height="9" viewBox="0 0 90 9"
                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M2.02431 7.09212C30.0244 6.09216 52.5242 0.592169 87.8787 2.46593"
                                                            stroke="#02BB9A" stroke-width="3" stroke-linecap="round">
                                                        </path>
                                                    </svg>
                                                </div>
                                                <div class="red_check_ul ul_li_image">
                                                    {!! $content_tab_content->tab_details !!}
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>

                                </div>
                                <!-- </div> -->
                            @endif
                        @endforeach
                    </div>
                    <div class="surgery_form py-sm-5 py-3">
                        <div class="row justify-content-center">
                            <div class="surgery_btn">
                                <button class="btn surgery_blue me-sm-2 mb-sm-0 mb-3">Know Your Cancer Risk</button>
                                <button class="btn surgery_outline mb-sm-0 mb-3">Share Your Cancer Story</button>
                            </div>

                            <div class="jus_texts text-center">
                                <h2 class="blue_sub_title">Know Your Cancer Risk</h2>
                                <svg class="line" width="90" height="9" viewBox="0 0 90 9" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path d="M2.02431 7.09212C30.0244 6.09216 52.5242 0.592169 87.8787 2.46593"
                                        stroke="#02BB9A" stroke-width="3" stroke-linecap="round"></path>
                                </svg>
                                <p class="small_gray_text">
                                </p>
                            </div>

                            <div class="col-lg-8">
                                <div class="mb-3">
                                    <label for="formGroupExampleInput" class="form-label">Your Age</label>
                                    <select id="inputState" class="form-select surgery_select">
                                        <option value="20" selected>Below 20 year</option>
                                        <option value="29">21-29 Year</option>
                                        <option value="39">30-39 Year</option>
                                        <option value="49">40-49 Year</option>
                                        <option value="65">50-65 Year</option>
                                        <option value="75">66-75 Year</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="formGroupExampleInput2" class="form-label">Gender</label>
                                    <select id="inputState" class="form-select surgery_select">
                                        <option selected="">Male</option>
                                        <option>Female</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="formGroupExampleInput2" class="form-label mb-3">Family Cancer
                                        History</label>

                                    <div class="d-flex">
                                        <div class="form-check me-4">
                                            <input class="form-check-input" type="radio" name="inlineRadioOptions"
                                                id="inlineRadio1" value="option1">
                                            <label class="form-check-label" for="inlineRadio1">Yes</label>
                                        </div>
                                        <div class="form-check me-4">
                                            <input class="form-check-input" type="radio" name="inlineRadioOptions"
                                                id="inlineRadio2" value="option2">
                                            <label class="form-check-label" for="inlineRadio2">No</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="formGroupExampleInput2" class="form-label mb-3">Habits</label>
                                    <div class="d-sm-flex">
                                        <div class="form-check me-4">
                                            <input class="form-check-input" type="checkbox" id="inlineCheckbox1"
                                                value="option1">
                                            <label class="form-check-label" for="inlineCheckbox1">Smoking</label>
                                        </div>
                                        <div class="form-check me-4">
                                            <input class="form-check-input" type="checkbox" id="inlineCheckbox2"
                                                value="option2">
                                            <label class="form-check-label" for="inlineCheckbox2">Tobacco</label>
                                        </div>
                                        <div class="form-check me-4">
                                            <input class="form-check-input" type="checkbox" id="inlineCheckbox3"
                                                value="option3">
                                            <label class="form-check-label" for="inlineCheckbox3">Betel nut</label>
                                        </div>
                                        <div class="form-check me-4">
                                            <input class="form-check-input" type="checkbox" id="inlineCheckbox4"
                                                value="option4">
                                            <label class="form-check-label" for="inlineCheckbox4">Gutkha</label>
                                        </div>
                                    </div>
                                </div>


                                <div class="text-center mt-sm-5 mt-3">
                                    <button class="btn surgery_success w-50">Submit</button>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </section>
        @elseif($speciality->slug == 'oncology')
            <div class="infrastucture_offers padding_tb_100 position-relative">
                <div class="container">
                    <div class="oncology_tabs">
                        <div class="onco_tabs_bx">
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                @foreach ($topics as $key => $topic)
                                    @php
                                        $name = explode(' ', trim($topic->topic_name));
                                        $name = Illuminate\Support\Str::lower($name[0]);
                                    @endphp
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link @if ($key == 0) active @endif"
                                            id="{{ $name }}-tab" data-bs-toggle="tab"
                                            data-bs-target="#{{ $name }}" type="button" role="tab"
                                            aria-controls="{{ $name }}"
                                            aria-selected="true">{{ $topic->topic_name }}</button>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="tab-content" id="myTabContent">
                            @foreach ($topics as $key => $topic)
                                @php
                                    $name = explode(' ', trim($topic->topic_name));
                                    $name = Illuminate\Support\Str::lower($name[0]);
                                @endphp
                                @php
                                    $image_tab_contents = '';
                                    $image_tab_contents = App\Models\SpecialitiesTabContent::where('tab_content_type', 'image_content')
                                        ->where('topic_id', $topic->id)
                                        ->orderby('order')
                                        ->get();
                                @endphp
                                @php
                                    $content_tab_contents = '';
                                    $content_tab_contents = App\Models\SpecialitiesTabContent::where('tab_content_type', 'content')
                                        ->where('topic_id', $topic->id)
                                        ->orderby('order')
                                        ->get();
                                @endphp
                                @if (count($image_tab_contents) > 0 || count($content_tab_contents) > 0)
                                    <div class="tab-pane fade show @if ($key == 0) active @endif"
                                        id="{{ $name }}" role="tabpanel"
                                        aria-labelledby="{{ $name }}-tab">
                                        <div class="jus_texts text-center">
                                            <h2 class="blue_sub_title">{{ $topic->topic_name }}</h2>
                                            <svg class="line" width="90" height="9" viewBox="0 0 90 9"
                                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M2.02431 7.09212C30.0244 6.09216 52.5242 0.592169 87.8787 2.46593"
                                                    stroke="#02BB9A" stroke-width="3" stroke-linecap="round"></path>
                                            </svg>
                                        </div>
                                        @foreach ($image_tab_contents as $key => $image_tab_content)
                                            <div class="row align-items-center">
                                                <div class="col-lg-5">
                                                    @php $content_image = str_replace("/public","",url('/')).'/storage/'.$image_tab_content->image_path.$image_tab_content->image_name; @endphp
                                                    <img src="{{ $content_image }}" class="img-fluid" alt="">
                                                </div>
                                                <div class="col-lg-7 mb-3">
                                                    <div class="red_check_ul ul_li_image">
                                                        {!! $image_tab_content->tab_details !!}
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach

                                        <div class="row">
                                            @foreach ($content_tab_contents as $key => $content_tab_content)
                                                <div
                                                    class="@if ($content_tab_content->split_content == 'divide') col-lg-6 @else col-lg-12 @endif mb-4">
                                                    <div class="jus_texts">
                                                        <!-- <p class="red_title">Specialities</p> -->
                                                        <h2 class="blue_sub_title">{{ $content_tab_content->tab_title }}
                                                        </h2>
                                                        <svg class="line" width="90" height="9"
                                                            viewBox="0 0 90 9" fill="none"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M2.02431 7.09212C30.0244 6.09216 52.5242 0.592169 87.8787 2.46593"
                                                                stroke="#02BB9A" stroke-width="3" stroke-linecap="round">
                                                            </path>
                                                        </svg>
                                                    </div>
                                                    <div class="red_check_ul ul_li_image">
                                                        {!! $content_tab_content->tab_details !!}
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        @elseif($speciality->slug == 'bariatric_surgery_weight_loss_surgery')
            <section class="infrastucture_offers">
                <div class="container">
                    <div>
                        <ul class="nav nav-tabs cancer_nav_tab" id="myTab" role="tablist">
                            @foreach ($topics as $key => $topic)
                                @php
                                    $name = \Illuminate\Support\Str::slug($topic->topic_name, '_');
                                    $check_name = explode(' ', trim($topic->topic_name));
                                @endphp
                                <li class="nav-item" role="presentation">
                                    <button
                                        class="nav-link @if ($key == 0) active @endif bariatric_link{{ ++$key }}"
                                        id="{{ $name }}-tab" data-bs-toggle="tab"
                                        data-bs-target="#{{ $name }}" type="button" role="tab"
                                        aria-controls="{{ $name }}" aria-selected="false">{{ $check_name[0] }}
                                        @if (isset($check_name[1]))
                                            {{ $check_name[1] }} @if (isset($check_name[2]))
                                                {{ $check_name[2] }} <br>
                                                @if (isset($check_name[3]))
                                                    {{ $check_name[3] }}
                                                    @endif @if (isset($check_name[4]))
                                                        {{ $check_name[4] }}
                                                    @endif
                                                @endif
                                            @endif
                                    </button>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="tab-content" id="myTabContent">
                    @foreach ($topics as $key => $topic)
                        @php
                            $name = \Illuminate\Support\Str::slug($topic->topic_name, '_');
                        @endphp
                        @php
                            $tab_contents = '';
                            $tab_contents = App\Models\SpecialitiesTabContent::where('topic_id', $topic->id)
                                ->orderby('order')
                                ->get();
                        @endphp
                        @php
                            $qa_tab_contents = '';
                            $qa_tab_contents = App\Models\SpecialitiesTabContent::where('tab_content_type', 'question_answer')
                                ->where('topic_id', $topic->id)
                                ->orderby('order')
                                ->get();
                        @endphp
                        @php
                            $multi_image_contents = '';
                            $multi_image_contents = App\Models\SpecialitiesTabContent::where('tab_content_type', 'image')
                                ->where('topic_id', $topic->id)
                                ->orderby('order')
                                ->get();
                        @endphp
                        @php
                            $direction_contents = '';
                            $direction_contents = App\Models\SpecialitiesTabContent::where('tab_content_type', 'content_direction')
                                ->where('topic_id', $topic->id)
                                ->orderby('order')
                                ->get();
                        @endphp
                        @php
                            $direction_content_limits = '';
                            $direction_content_limits = App\Models\SpecialitiesTabContent::where('tab_content_type', 'content_direction')
                                ->where('topic_id', $topic->id)
                                ->orderby('order')
                                ->limit(2)
                                ->get();
                        @endphp
                        @php
                            $direction_content_limits2 = '';
                            $direction_content_limits2 = App\Models\SpecialitiesTabContent::where('tab_content_type', 'content_direction')
                                ->where('topic_id', $topic->id)
                                ->orderby('order')
                                ->skip(2)
                                ->limit(2)
                                ->get();
                        @endphp
                        @if (count($tab_contents) > 0)
                            <div class="tab-pane fade show @if ($key == 0) active @endif"
                                id="{{ $name }}" role="tabpanel" aria-labelledby="{{ $name }}-tab">
                                @if ($name == 'faqs')
                                    <div class="jus_texts mb-3 text-center">
                                        <!-- <p class="red_title">Specialities</p> -->
                                        <h2 class="blue_sub_title">Frequently Asked Questions (FAQs)</h2>
                                        <svg class="line" width="90" height="9" viewBox="0 0 90 9"
                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M2.02431 7.09212C30.0244 6.09216 52.5242 0.592169 87.8787 2.46593"
                                                stroke="#02BB9A" stroke-width="3" stroke-linecap="round"></path>
                                        </svg>
                                    </div>
                                @elseif($name == 'bariatric_weight_loss_success_stories')
                                    <div class="jus_texts mb-3 text-center">
                                        <!-- <p class="red_title">Specialities</p> -->
                                        <h2 class="blue_sub_title">Why Bariatric Surgery For Weight Loss At Kiran Hospital
                                        </h2>
                                        <svg class="line" width="90" height="9" viewBox="0 0 90 9"
                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M2.02431 7.09212C30.0244 6.09216 52.5242 0.592169 87.8787 2.46593"
                                                stroke="#02BB9A" stroke-width="3" stroke-linecap="round"></path>
                                        </svg>
                                    </div>
                                @elseif($name == 'body_mass_index_bmi_calculator')
                                    <div class="jus_texts mb-3 text-center">
                                        <!-- <p class="red_title">Specialities</p> -->
                                        <h2 class="blue_sub_title">Body Mass Index (BMI)Calculator
                                        </h2>
                                        <svg class="line" width="90" height="9" viewBox="0 0 90 9"
                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M2.02431 7.09212C30.0244 6.09216 52.5242 0.592169 87.8787 2.46593"
                                                stroke="#02BB9A" stroke-width="3" stroke-linecap="round"></path>
                                        </svg>
                                    </div>
                                @elseif($name == 'life_after_bariatric_surgery')
                                    <div class="jus_texts mb-3 text-center">
                                        <!-- <p class="red_title">Specialities</p> -->
                                        <h2 class="blue_sub_title">Life After Bariatric Surgery
                                        </h2>
                                        <svg class="line" width="90" height="9" viewBox="0 0 90 9"
                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M2.02431 7.09212C30.0244 6.09216 52.5242 0.592169 87.8787 2.46593"
                                                stroke="#02BB9A" stroke-width="3" stroke-linecap="round"></path>
                                        </svg>
                                    </div>
                                @endif
                                @if ($name == 'body_mass_index_bmi_calculator')
                                    <div class="container py-5">
                                        <div class="cal_section">
                                            <div class="row justify-content-center">
                                                <div class="col-lg-5">
                                                    <div class="mb-3">
                                                        <label for="formGroupExampleInput"
                                                            class="form-label cal_label">Height(cm)</label>
                                                        <input type="number" class="form-control"
                                                            id="formGroupExampleInput">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="formGroupExampleInput2"
                                                            class="form-label cal_label">Weight (Kgs)</label>
                                                        <input type="number" class="form-control"
                                                            id="formGroupExampleInput2">
                                                    </div>

                                                    <div class="mb-4">
                                                        <button class="btn cal_success w-100">Submit</button>
                                                    </div>
                                                    <div class="mb-4">
                                                        <button class="btn cal_warning w-100">Normal Weight</button>
                                                    </div>
                                                    <div class="mb-4">
                                                        <p class="text-center cal_blue_txt">Body Mass Index (BMI)</p>
                                                        <button class="btn cal_primary w-100">20.83</button>
                                                        <p class="text-center cal_blue_txt mt-3">The calculations are based
                                                            on
                                                            WHO
                                                            recommendations.</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @if (count($multi_image_contents) > 0)
                                            @foreach ($multi_image_contents as $multi_image_content)
                                                <div class="mb-sm-5 mb-3">
                                                    <img src="{{ str_replace('/public', '', url('/')) . '/storage/' . $multi_image_content->image_path . $multi_image_content->image_name }}"
                                                        alt="" class="w-100" style="border-radius: 18px;">
                                                </div>
                                            @endforeach
                                        @endif
                                    </div>
                                @endif
                                @foreach ($tab_contents as $key => $tab_content)
                                    @if ($tab_content->tab_content_type == 'content' && $name != 'types_of_bariatric_surgery')
                                        <div class="container py-5">
                                            <div class="row">
                                                <div class="col-lg-12 mb-3">
                                                    <div class="jus_texts mb-3">
                                                        <!-- <p class="red_title">Specialities</p> -->
                                                        <h2 class="blue_sub_title"> {{ $tab_content->tab_title }}</h2>
                                                        <svg class="line" width="90" height="9"
                                                            viewBox="0 0 90 9" fill="none"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M2.02431 7.09212C30.0244 6.09216 52.5242 0.592169 87.8787 2.46593"
                                                                stroke="#02BB9A" stroke-width="3" stroke-linecap="round">
                                                            </path>
                                                        </svg>

                                                    </div>

                                                    <div class="red_check_ul ul_li_image">
                                                        {!! $tab_content->tab_details !!}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @elseif($tab_content->tab_content_type == 'banner_image')
                                        @php $content_image = str_replace("/public","",url('/')).'/storage/'.$tab_content->image_path.$tab_content->image_name; @endphp
                                        <section class="multidisciplinary_sec Treatment_bg"
                                            style='background:url("{{ $content_image }}")'>
                                            <div class="container">
                                                <div class="row">
                                                    <div class="col-lg-10">
                                                        <div class="large_text">
                                                            <h2>{{ $tab_content->tab_title }}</h2>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </section>
                                    @elseif($tab_content->tab_content_type == 'content_direction')
                                        @if ($name == 'overview')
                                            <div class="container py-5">
                                                <iframe width="100%" height="421" src="{{ $tab_content->video_url }}" title="How I lost more than 50 KG weight  - True Inspiring Story I  Super Hero I Obesity Avengers" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen=""></iframe>
                                            </div>
                                        @endif
                                    @endif
                                @endforeach
                                @if (count($qa_tab_contents) > 0 &&
                                        $name != 'overview' &&
                                        $name != 'life_after_bariatric_surgery' &&
                                        $name != 'types_of_bariatric_surgery')
                                    <div class="container">
                                        <div class="details_tabs">
                                            <div class="row justify-content-center">
                                                <div class="col-lg-10">
                                                    <div class="accordion" id="accordionExample">
                                                        @foreach ($qa_tab_contents as $key => $qa_tab_content)
                                                            @php $content_image = str_replace("/public","",url('/')).'/storage/'.$qa_tab_content->image_path.$qa_tab_content->image_name; @endphp
                                                            <div class="accordion-item mb-4 accordion_border">
                                                                <h2 class="accordion-header" id="headingTwo">
                                                                    <button class="accordion-button faqs_btn_txt collapsed"
                                                                        type="button" data-bs-toggle="collapse"
                                                                        data-bs-target="#collapse_{{ $key }}"
                                                                        aria-expanded="false"
                                                                        aria-controls="collapse_{{ $key }}">
                                                                        {{ $qa_tab_content->question }}
                                                                    </button>
                                                                </h2>
                                                                <div id="collapse_{{ $key }}"
                                                                    class="accordion-collapse collapse"
                                                                    aria-labelledby="headingTwo"
                                                                    data-bs-parent="#accordionExample">
                                                                    <div class="accordion-body ul_li_image">
                                                                        @if ($qa_tab_content->image_name)
                                                                            <div>
                                                                                <img src="{{ $content_image }}"
                                                                                    alt="" class="w-100">
                                                                            </div>
                                                                        @endif
                                                                        @if ($qa_tab_content->video_url)
                                                                            <iframe width="100%" height="421"
                                                                                src="{{ $qa_tab_content->video_url }}"
                                                                                title="How I lost more than 50 KG weight  - True Inspiring Story I  Super Hero I Obesity Avengers"
                                                                                frameborder="0"
                                                                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                                                                allowfullscreen=""></iframe>
                                                                        @endif
                                                                        @if ($qa_tab_content->sub_title)
                                                                            <div class="faqs_info ul_li_image">
                                                                                <h6>{{ $qa_tab_content->sub_title }}</h6>
                                                                                {!! $qa_tab_content->tab_details !!}
                                                                            </div>
                                                                        @else
                                                                            {!! $qa_tab_content->tab_details !!}
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @else
                                    @if ($name != 'life_after_bariatric_surgery' && $name != 'types_of_bariatric_surgery')
                                        @foreach ($qa_tab_contents as $key => $qa_tab_content)
                                            <div class="container py-5">
                                                <div class="row">
                                                    <div class="col-lg-12 mb-3">
                                                        <div class="jus_texts mb-3">
                                                            <!-- <p class="red_title">Specialities</p> -->
                                                            <h2 class="blue_sub_title">{{ $qa_tab_content->tab_title }}
                                                            </h2>
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
                                                        <div class="red_check_ul">
                                                            <div class="price_data_each ul_li_image">
                                                                <div>
                                                                    <svg width="18" height="19" viewBox="0 0 18 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                        <g clip-path="url(#clip0_2162_19642)"><path d="M14.797 3.19088C12.8195 4.90229 11.1466 6.53143 9.61494 8.65698C8.93947 9.59448 8.1883 10.6979 7.69728 11.7397C7.41697 12.2921 6.91166 13.1553 6.73939 13.9853C5.7972 13.1087 4.78517 12.1138 3.74971 11.3345C3.01166 10.7792 0.885877 11.9113 1.75119 12.5624C3.30205 13.7289 4.59181 15.1817 6.10025 16.4003C6.73119 16.9093 8.12947 15.8038 8.45806 15.3399C9.53666 13.8118 9.68408 11.9439 10.4702 10.277C11.6704 7.72768 13.799 5.63354 15.9006 3.81503C17.2931 2.51635 15.8549 2.27682 14.7991 3.19088" fill="#ED1C24"></path></g><defs><clipPath id="clip0_2162_19642"><rect width="15" height="15" fill="white" transform="translate(1.5 2)"></rect></clipPath></defs>
                                                                    </svg>
                                                                    <p>
                                                                        Kiran Hospital is now one of the first hospitals from India to get appreciated for World Class Healthcare services in field of Bariatric Surgery for Weight Loss by being featured in Bariatric times , USA
                                                                    </p>
                                                                </div>
                                                                <section class="details_hosp my-sm-5 my-3">
                                                                    <div class="container">
                                                                        <div class="row">
                                                                            <div class="col-lg-12">
                                                                                @php $content_image = str_replace("/public","",url('/')).'/storage/'.$qa_tab_content->image_path.$qa_tab_content->image_name; @endphp
                                                                                <a href="https://bt.mydigitalpublication.com/unavailable.php" target="_blank"><img src="{{ $content_image }}"
                                                                                    alt="" class="w-100 mb-3"> </a>
                                                                            </div>
                                                                            <a target="_blank" href="{{  $qa_tab_content->video_url }}">{{ $qa_tab_content->video_url }}</a>
                                                                        </div>
                                                                    </div>
                                                                </section>
                                                                {!! $qa_tab_content->tab_details !!}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                @if (count($multi_image_contents) > 0 && $name == 'overview')
                                                    <div class="row py-5">
                                                        @if (isset($multi_image_contents[0]))
                                                            <div class="col-lg-3 mb-lg-0 mb-4">
                                                                <div>
                                                                    <img src="{{ str_replace('/public', '', url('/')) . '/storage/' . $multi_image_contents[0]->image_path . $multi_image_contents[0]->image_name }}"
                                                                        alt="" class="w-100">
                                                                </div>
                                                            </div>
                                                        @endif
                                                        @if (isset($multi_image_contents[1]))
                                                            <div class="col-lg-3  mb-lg-0 mb-4">
                                                                <div>
                                                                    <img src="{{ str_replace('/public', '', url('/')) . '/storage/' . $multi_image_contents[1]->image_path . $multi_image_contents[1]->image_name }}"
                                                                        alt="" class="w-100">
                                                                </div>
                                                            </div>
                                                        @endif
                                                        @if (isset($multi_image_contents[2]))
                                                            <div class="col-lg-6">
                                                                <div>
                                                                    <img src="{{ str_replace('/public', '', url('/')) . '/storage/' . $multi_image_contents[2]->image_path . $multi_image_contents[2]->image_name }}"
                                                                        alt="" class="w-100">
                                                                </div>
                                                            </div>
                                                        @endif
                                                    </div>
                                                @endif

                                            </div>
                                        @endforeach
                                    @endif
                                @endif
                                @if ($name == 'types_of_bariatric_surgery')
                                    <div class="container py-5">
                                        @foreach ($direction_content_limits as $key => $direction_content_limit)
                                            @if($key == 1)
                                                <div id="vertical">
                                            @endif
                                            <div class="row align-items-center mb-sm-5 mb-3">
                                                @if (isset($direction_content_limit->tab_title))
                                                    <div class="jus_texts mb-3 text-center">
                                                        <h2 class="blue_sub_title">
                                                            {{ $direction_content_limit->tab_title }}
                                                        </h2>
                                                        <svg class="line" width="90" height="9"
                                                            viewBox="0 0 90 9" fill="none"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M2.02431 7.09212C30.0244 6.09216 52.5242 0.592169 87.8787 2.46593"
                                                                stroke="#02BB9A" stroke-width="3" stroke-linecap="round">
                                                            </path>
                                                        </svg>
                                                    </div>
                                                @endif
                                                @if ($direction_content_limit->video_url)
                                                    <div class="mb-sm-5 mb-3 types_frame">
                                                        <iframe width="100%" height="495"
                                                            src="{{ $direction_content_limit->video_url }}"
                                                            title="BEST BARIATRIC SURGEON - Celebrating Weight Loss at Kiran Hospital, Surat I Mumbai I Ahmedabad"
                                                            frameborder="0"
                                                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                                            allowfullscreen=""></iframe>
                                                    </div>
                                                    @if ($direction_content_limit->tab_details)
                                                        <div class="tyep_box2 mb-sm-5 mb-3">
                                                            <div class="types_info ul_li_image">
                                                                {!! $direction_content_limit->tab_details !!}
                                                            </div>
                                                        </div>
                                                    @endif
                                                @else
                                                    <div class="col-lg-6">
                                                        @if ($direction_content_limit->direction == 'left')
                                                            <img src="{{ str_replace('/public', '', url('/')) . '/storage/' . $direction_content_limit->image_path . $direction_content_limit->image_name }}"
                                                                alt="" class="w-100" style="border-radius: 18px;">
                                                        @else
                                                            <div class="types_box ul_li_image">
                                                                {!! $direction_content_limit->tab_details !!}
                                                            </div>
                                                        @endif
                                                    </div>

                                                    <div class="col-lg-6">
                                                        @if ($direction_content_limit->direction == 'right')
                                                            <img src="{{ str_replace('/public', '', url('/')) . '/storage/' . $direction_content_limit->image_path . $direction_content_limit->image_name }}"
                                                                alt="" class="w-100" style="border-radius: 18px;">
                                                        @else
                                                            <div class="types_box ul_li_image">
                                                                {!! $direction_content_limit->tab_details !!}
                                                            </div>
                                                        @endif
                                                    </div>
                                                @endif
                                            </div>
                                            @if($key == 1)
                                                </div>
                                            @endif
                                        @endforeach
                                        <div class="jus_texts mb-3 text-center">
                                            <h2 class="blue_sub_title">Bariatric Surgery (Surgery For Obesity) Includes
                                                Several Different Types
                                                Of Surgeries Or Operations.</h2>
                                        </div>
                                        <div class="container">
                                            <div class="details_tabs">
                                                <div class="row justify-content-center">
                                                    <div class="col-lg-10">
                                                        <div class="accordion" id="accordionExample">
                                                            @foreach ($qa_tab_contents as $key => $qa_tab_content)
                                                                @php $content_image = str_replace("/public","",url('/')).'/storage/'.$qa_tab_content->image_path.$qa_tab_content->image_name; @endphp
                                                                <div class="accordion-item mb-4 accordion_border">
                                                                    <h2 class="accordion-header" id="headingTwo">
                                                                        <button
                                                                            class="accordion-button faqs_btn_txt collapsed"
                                                                            type="button" data-bs-toggle="collapse"
                                                                            data-bs-target="#collapse_{{ $key }}"
                                                                            aria-expanded="false"
                                                                            aria-controls="collapse_{{ $key }}">
                                                                            {{ $qa_tab_content->question }}
                                                                        </button>
                                                                    </h2>
                                                                    <div id="collapse_{{ $key }}"
                                                                        class="accordion-collapse collapse ul_li_image"
                                                                        aria-labelledby="headingTwo"
                                                                        data-bs-parent="#accordionExample">
                                                                        <div class="accordion-body ul_li_image">
                                                                            @if ($qa_tab_content->image_name)
                                                                                <div>
                                                                                    <img src="{{ $content_image }}"
                                                                                        alt="" class="w-100" style="border-radius: 18px;">
                                                                                </div>
                                                                            @endif
                                                                            @if ($qa_tab_content->video_url)
                                                                                <iframe width="100%" height="421"
                                                                                    src="{{ $qa_tab_content->video_url }}"
                                                                                    title="How I lost more than 50 KG weight  - True Inspiring Story I  Super Hero I Obesity Avengers"
                                                                                    frameborder="0"
                                                                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                                                                    allowfullscreen=""></iframe>
                                                                            @endif
                                                                            @if ($qa_tab_content->sub_title)
                                                                                <div class="faqs_info">
                                                                                    <h6>{{ $qa_tab_content->sub_title }}
                                                                                    </h6>
                                                                                    {!! $qa_tab_content->tab_details !!}
                                                                                </div>
                                                                            @else
                                                                                {!! $qa_tab_content->tab_details !!}
                                                                            @endif
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        @foreach ($direction_content_limits2 as $direction_content_limit2)
                                            <div class="row align-items-center mb-sm-5 mb-3">
                                                @if (isset($direction_content_limit2->tab_title))
                                                    <div class="jus_texts mb-3 text-center">
                                                        <h2 class="blue_sub_title">
                                                            {{ $direction_content_limit2->tab_title }}
                                                        </h2>
                                                        <svg class="line" width="90" height="9"
                                                            viewBox="0 0 90 9" fill="none"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M2.02431 7.09212C30.0244 6.09216 52.5242 0.592169 87.8787 2.46593"
                                                                stroke="#02BB9A" stroke-width="3" stroke-linecap="round">
                                                            </path>
                                                        </svg>
                                                    </div>
                                                @endif
                                                @if ($direction_content_limit2->video_url)
                                                    <div class="mb-sm-5 mb-3 types_frame">
                                                        <iframe width="100%" height="495"
                                                            src="{{ $direction_content_limit2->video_url }}"
                                                            title="BEST BARIATRIC SURGEON - Celebrating Weight Loss at Kiran Hospital, Surat I Mumbai I Ahmedabad"
                                                            frameborder="0"
                                                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                                            allowfullscreen=""></iframe>
                                                    </div>
                                                    @if ($direction_content_limit2->tab_details)
                                                        <div class="tyep_box2 mb-sm-5 mb-3">
                                                            <div class="types_info ul_li_image">
                                                                {!! $direction_content_limit2->tab_details !!}
                                                            </div>
                                                        </div>
                                                    @endif
                                                @else
                                                    <div class="col-lg-6">
                                                        @if ($direction_content_limit2->direction == 'left')
                                                            <img src="{{ str_replace('/public', '', url('/')) . '/storage/' . $direction_content_limit2->image_path . $direction_content_limit2->image_name }}"
                                                                alt="" class="w-100" style="border-radius: 18px;">
                                                        @else
                                                            <div class="types_box ul_li_image">
                                                                {!! $direction_content_limit2->tab_details !!}
                                                            </div>
                                                        @endif
                                                    </div>

                                                    <div class="col-lg-6">
                                                        @if ($direction_content_limit2->direction == 'right')
                                                            <img src="{{ str_replace('/public', '', url('/')) . '/storage/' . $direction_content_limit2->image_path . $direction_content_limit2->image_name }}"
                                                                alt="" class="w-100" style="border-radius: 18px;">
                                                        @else
                                                            <div class="types_box ul_li_image">
                                                                {!! $direction_content_limit2->tab_details !!}
                                                            </div>
                                                        @endif
                                                    </div>
                                                @endif
                                            </div>
                                        @endforeach

                                        <div class="row mb-sm-5 mb-3">
                                            @foreach ($tab_contents as $key => $tab_content)
                                                @if ($tab_content->tab_content_type == 'content')
                                                    <div class="col-lg-6">
                                                        <div class="jus_texts">
                                                            <!-- <p class="red_title">Specialities</p> -->
                                                            <h2 class="blue_sub_title">{{ $tab_content->tab_title }}</h2>
                                                            <svg class="line" width="90" height="9"
                                                                viewBox="0 0 90 9" fill="none"
                                                                xmlns="http://www.w3.org/2000/svg">
                                                                <path
                                                                    d="M2.02431 7.09212C30.0244 6.09216 52.5242 0.592169 87.8787 2.46593"
                                                                    stroke="#ED1C24" stroke-width="3"
                                                                    stroke-linecap="round">
                                                                </path>
                                                            </svg>

                                                        </div>

                                                        <div class="red_check_ul ul_li_image">
                                                            {!! $tab_content->tab_details !!}
                                                        </div>
                                                    </div>
                                                @endif
                                            @endforeach
                                        </div>

                                        @foreach ($direction_contents->skip(4) as $key => $direction_content)
                                            <div class="row align-items-center mb-sm-5 mb-3">
                                                @if (isset($direction_content->tab_title))
                                                    <div class="jus_texts mb-3 text-center">
                                                        @if($key == 4)
                                                            <div id="minigastric">
                                                        @endif
                                                            <h2 class="blue_sub_title">{{ $direction_content->tab_title }}
                                                            </h2>
                                                            <svg class="line" width="90" height="9"
                                                                viewBox="0 0 90 9" fill="none"
                                                                xmlns="http://www.w3.org/2000/svg">
                                                                <path
                                                                    d="M2.02431 7.09212C30.0244 6.09216 52.5242 0.592169 87.8787 2.46593"
                                                                    stroke="#02BB9A" stroke-width="3" stroke-linecap="round">
                                                                </path>
                                                            </svg>
                                                            @if($key == 4)
                                                        </div>
                                                        @endif
                                                        <p>Everything You Wanted To Know About Mini Gastric Bypass - OAGB
                                                        </p>
                                                        <p>Patient guide &amp; Information For Mini gastric Bypass - OAGB
                                                        </p>
                                                    </div>
                                                @endif
                                                @if ($direction_content->video_url)
                                                    <div class="mb-sm-5 mb-3 types_frame">
                                                        <iframe width="100%" height="495"
                                                            src="{{ $direction_content->video_url }}"
                                                            title="BEST BARIATRIC SURGEON - Celebrating Weight Loss at Kiran Hospital, Surat I Mumbai I Ahmedabad"
                                                            frameborder="0"
                                                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                                            allowfullscreen=""></iframe>
                                                    </div>
                                                    @if ($direction_content->tab_details)
                                                        <div class="tyep_box2 mb-sm-5 mb-3">
                                                            <div class="types_info ul_li_image">
                                                                {!! $direction_content->tab_details !!}
                                                            </div>
                                                        </div>
                                                    @endif
                                                @else
                                                    <div class="col-lg-6">
                                                        @if ($direction_content->direction == 'left')
                                                            <img src="{{ str_replace('/public', '', url('/')) . '/storage/' . $direction_content->image_path . $direction_content->image_name }}"
                                                                alt="" class="w-100" style="border-radius: 18px;">
                                                        @else
                                                            <div class="types_box ul_li_image">
                                                                {!! $direction_content->tab_details !!}
                                                            </div>
                                                        @endif
                                                    </div>

                                                    <div class="col-lg-6">
                                                        @if ($direction_content->direction == 'right')
                                                            <img src="{{ str_replace('/public', '', url('/')) . '/storage/' . $direction_content->image_path . $direction_content->image_name }}"
                                                                alt="" class="w-100" style="border-radius: 18px;">
                                                        @else
                                                            <div class="types_box ul_li_image">
                                                                {!! $direction_content->tab_details !!}
                                                            </div>
                                                        @endif
                                                    </div>
                                                @endif
                                            </div>
                                        @endforeach
                                    </div>
                                @endif
                                @if ($name == 'life_after_bariatric_surgery')
                                    @php $tab_title_array[]=''@endphp
                                    <div class="container py-5">
                                        @foreach ($direction_contents as $direction_content)
                                            <div class="row align-items-center mb-sm-5 mb-3">
                                                @if (isset($direction_content->tab_title))
                                                    <div class="jus_texts mb-3">
                                                        <h2 class="blue_sub_title">{{ $direction_content->tab_title }}
                                                        </h2>
                                                        <svg class="line" width="90" height="9"
                                                            viewBox="0 0 90 9" fill="none"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M2.02431 7.09212C30.0244 6.09216 52.5242 0.592169 87.8787 2.46593"
                                                                stroke="#02BB9A" stroke-width="3" stroke-linecap="round">
                                                            </path>
                                                        </svg>
                                                    </div>
                                                @endif
                                                @if ($direction_content->video_url)
                                                    <div class="mb-sm-5 mb-3 types_frame">
                                                        <iframe width="100%" height="495"
                                                            src="{{ $direction_content->video_url }}"
                                                            title="BEST BARIATRIC SURGEON - Celebrating Weight Loss at Kiran Hospital, Surat I Mumbai I Ahmedabad"
                                                            frameborder="0"
                                                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                                            allowfullscreen=""></iframe>
                                                    </div>
                                                    @if ($direction_content->tab_details)
                                                        <div class="tyep_box2 mb-sm-5 mb-3">
                                                            <div class="types_info ul_li_image">
                                                                {!! $direction_content->tab_details !!}
                                                            </div>
                                                        </div>
                                                    @endif
                                                @else
                                                    <div class="col-lg-6">
                                                        @if ($direction_content->direction == 'left')
                                                            <img src="{{ str_replace('/public', '', url('/')) . '/storage/' . $direction_content->image_path . $direction_content->image_name }}"
                                                                alt="" class="w-100" style="border-radius: 18px;">
                                                        @else
                                                            <div class="types_box ul_li_image">
                                                                {!! $direction_content->tab_details !!}
                                                            </div>
                                                        @endif
                                                    </div>

                                                    <div class="col-lg-6">
                                                        @if ($direction_content->direction == 'right')
                                                            <img src="{{ str_replace('/public', '', url('/')) . '/storage/' . $direction_content->image_path . $direction_content->image_name }}"
                                                                alt="" class="w-100" style="border-radius: 18px;">
                                                        @else
                                                            <div class="types_box ul_li_image">
                                                                {!! $direction_content->tab_details !!}
                                                            </div>
                                                        @endif
                                                    </div>
                                                @endif
                                            </div>
                                        @endforeach
                                        @if (count($qa_tab_contents) > 0)
                                            @foreach ($qa_tab_contents->unique('tab_title') as $qa_tab_content)
                                                @php $qa_tab_contents_title = App\Models\SpecialitiesTabContent::where('tab_content_type', 'question_answer')
                                                        ->where('tab_title', $qa_tab_content->tab_title)
                                                        ->where('topic_id', $topic->id)
                                                        ->orderby('order')
                                                        ->get();
                                                @endphp
                                                <div class="jus_texts mb-3">
                                                    <h2 class="blue_sub_title">
                                                        {{ $qa_tab_content->tab_title }}</h2>
                                                    <svg class="line" width="90" height="9" viewBox="0 0 90 9"
                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M2.02431 7.09212C30.0244 6.09216 52.5242 0.592169 87.8787 2.46593"
                                                            stroke="#02BB9A" stroke-width="3" stroke-linecap="round">
                                                        </path>
                                                    </svg>
                                                </div>
                                                <div class="container">
                                                    <div class="details_tabs">
                                                        <div class="row justify-content-center">
                                                            <div class="col-lg-10">
                                                                <div class="accordion" id="accordionExample">
                                                                    @foreach ($qa_tab_contents_title as $key => $qa_tab_content)
                                                                        @php $content_image = str_replace("/public","",url('/')).'/storage/'.$qa_tab_content->image_path.$qa_tab_content->image_name; @endphp
                                                                        <div class="accordion-item mb-4 accordion_border">
                                                                            <h2 class="accordion-header" id="headingTwo">
                                                                                <button
                                                                                    class="accordion-button faqs_btn_txt @if ($key != 0) collapsed @endif"
                                                                                    type="button"
                                                                                    data-bs-toggle="collapse"
                                                                                    data-bs-target="#collapse_{{ $qa_tab_content->id }}"
                                                                                    aria-expanded="false"
                                                                                    aria-controls="collapse_{{ $qa_tab_content->id }}">
                                                                                    @if ($qa_tab_content->sub_title)
                                                                                        {{ $qa_tab_content->sub_title }}
                                                                                    @else
                                                                                        {{ $qa_tab_content->question }}
                                                                                    @endif
                                                                                </button>
                                                                                @if ($qa_tab_content->sub_title)
                                                                                    <p
                                                                                        style="font-size:16px; font-weight: 500; color: #10357C; padding: 0px 20px;">
                                                                                        {{ $qa_tab_content->question }}
                                                                                    </p>
                                                                                @endif
                                                                            </h2>
                                                                            <div id="collapse_{{ $qa_tab_content->id }}"
                                                                                class="accordion-collapse collapse  @if ($key == 0) show @endif ul_li_image"
                                                                                aria-labelledby="headingTwo"
                                                                                data-bs-parent="#accordionExample">
                                                                                <div class="accordion-body ul_li_image">
                                                                                    @if ($qa_tab_content->image_name)
                                                                                        <div>
                                                                                            <img src="{{ $content_image }}"
                                                                                                alt=""
                                                                                                class="w-100">
                                                                                        </div>
                                                                                    @endif
                                                                                    @if ($qa_tab_content->video_url)
                                                                                        <iframe width="100%"
                                                                                            height="421"
                                                                                            src="{{ $qa_tab_content->video_url }}"
                                                                                            title="How I lost more than 50 KG weight  - True Inspiring Story I  Super Hero I Obesity Avengers"
                                                                                            frameborder="0"
                                                                                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                                                                            allowfullscreen=""></iframe>
                                                                                    @endif
                                                                                    @if ($qa_tab_content->sub_title)
                                                                                        <div class="faqs_info">
                                                                                            <h6>{{ $qa_tab_content->sub_title }}
                                                                                            </h6>
                                                                                            {!! $qa_tab_content->tab_details !!}
                                                                                        </div>
                                                                                    @else
                                                                                        {!! $qa_tab_content->tab_details !!}
                                                                                    @endif
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    @endforeach
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @endif
                                    </div>
                                @endif
                            </div>
                        @endif
                    @endforeach
                </div>
                </div>
                {{-- @endif
                            @endforeach
                            </div>
                            </div> --}}
            </section>
        @endif
    @endif

    <!-- tab content section end -->

    <!-- Health checkup plan section start -->

    @if ($speciality->slug == 'health_checkup_plans')
        @if ($plan && $plan->count() > 0)
            <section class="ck_plans padding_tb_100">
                <div class="container">
                    <div class="jus_texts text-center">
                        <p class="red_title">Our Affordable</p>
                        <h2 class="blue_sub_title"> Health checkup plans</h2>
                        <svg class="line" width="90" height="9" viewBox="0 0 90 9" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path d="M2.02431 7.09212C30.0244 6.09216 52.5242 0.592169 87.8787 2.46593" stroke="#02BB9A"
                                stroke-width="3" stroke-linecap="round"></path>
                        </svg>
                        <p class="small_gray_text">
                        </p>
                    </div>
                    <div class="row mt-5">
                        @foreach ($plan as $key => $check_up_plans)
                            <div class="col-lg-4">
                                <div onclick="OpenPlanImg({{ $check_up_plans->id }})">
                                    <div class="each_pricing">
                                        <svg width="108" height="108" viewBox="0 0 108 108" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M25.5842 27.9629C10.0309 44.9472 18.5539 59.1325 23.3445 61.3722C21.9148 54.0925 20.4825 43.2667 31.9305 35.0548C47.5522 24.6542 51.5126 14.3408 50.1943 1.92847C45.1301 2.25168 40.2269 3.17305 35.561 4.62954C36.7506 13.7775 33.2717 21.2933 25.5842 27.9629Z"
                                                fill="#00904C"></path>
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M82.9357 27.9629C98.489 44.9472 89.966 59.1325 85.1754 61.3722C86.6064 54.0925 88.0374 43.2667 76.5907 35.0548C60.9676 24.6542 57.0072 14.3408 58.3256 1.92847C63.3898 2.25168 68.293 3.17305 72.9589 4.62954C71.7693 13.7775 75.2482 21.2933 82.9357 27.9629Z"
                                                fill="#00904C"></path>
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M25.7963 68.2309C13.5033 57.5527 8.47799 50.1053 13.1438 28.1225C-5.42973 42.2998 5.60658 66.9756 12.3365 74.6926C20.7938 84.4816 29.0995 90.5651 30.6579 100.862C36.0628 103.617 42.0134 105.452 48.3021 106.168C49.4568 88.43 39.2171 76.6399 25.7963 68.2309Z"
                                                fill="#ED1C24"></path>
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M82.7242 68.2307C95.0172 57.5525 100.043 50.1051 95.3766 28.1223C113.95 42.2996 102.914 66.9754 96.184 74.6924C87.7267 84.4814 79.421 90.5649 77.8612 100.862C72.4578 103.617 66.5071 105.452 60.2171 106.168C59.0637 88.4298 69.3034 76.6397 82.7242 68.2307Z"
                                                fill="#ED1C24"></path>
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M54.2595 72.7975C63.6623 72.7975 71.331 65.1288 71.331 55.726C71.331 46.3219 63.6623 38.6545 54.2595 38.6545C44.8567 38.6545 37.188 46.3232 37.188 55.726C37.188 65.1302 44.8567 72.7975 54.2595 72.7975Z"
                                                fill="#ED1C24"></path>
                                        </svg>

                                        <h4>
                                            <span>
                                                <svg width="11" height="18" viewBox="0 0 11 18" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M6.99853 4.48594C6.49297 3.42067 5.40964 2.68039 4.14575 2.68039H0.083252V0.874832H10.9166V2.68039H7.97353C8.40686 3.204 8.73186 3.81789 8.92144 4.48594H10.9166V6.2915H9.09297C8.86728 8.81928 6.73672 10.8054 4.14575 10.8054H3.48672L9.56242 17.1248H7.06172L0.98603 10.8054V8.99983H4.14575C5.73464 8.99983 7.0527 7.82622 7.26936 6.2915H0.083252V4.48594H6.99853Z"
                                                        fill="#10357C"></path>
                                                </svg>
                                            </span>
                                            {{ $check_up_plans->price }}
                                        </h4>
                                        <p>{{ $check_up_plans->name }} </p>

                                        @php $test = explode(",", $check_up_plans->test_type); @endphp
                                        <div class="pp_learnmorebtn">
                                            <button type="button" class="btn btn-theme_blue">
                                                Know More
                                                <svg width="24" height="25" viewBox="0 0 24 25" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M4 5.5L11 12.5L4 19.5" stroke="white" stroke-width="1.5"
                                                        stroke-linecap="round" stroke-linejoin="round"></path>
                                                    <path d="M12.5 5.5L19.5 12.5L12.5 19.5" stroke="white"
                                                        stroke-width="1.5" stroke-linecap="round"
                                                        stroke-linejoin="round"></path>
                                                </svg>
                                            </button>
                                        </div>

                                    </div>
                                </div>
                            </div>

                            <!-- </div> -->
                        @endforeach
                    </div>
                </div>
            </section>
        @endif
    @endif

    <!-- Health checkup plan section end -->

    <!-- bottom banner section  start-->
    @if ($speciality->bottom_cover_image && $speciality->bottom_banner_status == 1)
        @php $bottom_cover_image = str_replace("/public", "", url('/')) . '/storage/' . $speciality->image_path . $speciality->bottom_cover_image; @endphp
        <section class="multidisciplinary_sec Treatment_bg" style='background:url("{{ $bottom_cover_image }}")'>
            <div class="container">
                <div class="row">
                    <div class="col-lg-7">
                        <div class="">
                            <h2>Best Treatment of
                                Accident & Emergency Care at
                                Kiran Hospital Surat</h2>
                            <p> </p>
                            <div class="d-md-flex">
                                {{-- <a href="javascript:void(0)" class="mr-4" style=" margin-right: 35px;cursor: default;"> --}}
                                <a class="mr-4 contact_Dermatology" style=" margin-right: 35px;cursor: default;">
                                    <svg width="267" height="81" viewBox="0 0 267 81" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M18.2586 59.7481C24.5746 66.0624 26.0075 58.7575 30.0289 62.7761C33.9059 66.652 36.1342 67.4286 31.2221 72.3393C30.6068 72.8338 26.6975 78.7827 12.9589 65.048C-0.781361 51.3115 5.16416 47.3982 5.65877 46.7831C10.5828 41.8588 11.3459 44.1 15.2229 47.9759C19.2444 51.9963 11.9425 53.4338 18.2586 59.7481Z"
                                            stroke="#02BB9A" stroke-width="3" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                        <path
                                            d="M7.48 8.62C5.338 8.62 4.036 9.88 4.036 11.364C4.036 12.778 4.932 13.534 7.424 13.968C9.37 14.304 9.972 14.766 9.972 15.564C9.972 16.558 9.02 17.09 7.592 17.09C6.08 17.09 5.128 16.418 4.638 15.354L3.672 16.138C4.316 17.286 5.604 18.14 7.564 18.14C9.72 18.14 11.134 17.09 11.134 15.508C11.134 14.08 10.252 13.296 7.774 12.876C5.828 12.54 5.212 12.106 5.212 11.238C5.212 10.356 6.024 9.67 7.494 9.67C8.852 9.67 9.524 10.146 10.084 11.364L11.05 10.58C10.336 9.292 9.174 8.62 7.48 8.62ZM18.1444 11V14.808C18.1444 16.46 17.0944 17.16 15.9044 17.16C14.8964 17.16 14.2524 16.726 14.2524 15.284V11H13.1324V15.578C13.1324 17.426 14.3224 18.14 15.7084 18.14C16.8284 18.14 17.7244 17.776 18.2144 16.936L18.2844 18H19.2644V11H18.1444ZM25.3144 10.86C24.2084 10.86 23.3264 11.42 22.9204 12.218L22.8504 11H21.8704V20.94H22.9904V16.908C23.4244 17.636 24.2644 18.14 25.3144 18.14C27.2604 18.14 28.5064 16.782 28.5064 14.5C28.5064 12.218 27.2604 10.86 25.3144 10.86ZM25.1884 17.16C23.8584 17.16 22.9904 16.166 22.9904 14.584V14.416C22.9904 12.834 23.8584 11.84 25.1884 11.84C26.5604 11.84 27.3864 12.876 27.3864 14.5C27.3864 16.124 26.5604 17.16 25.1884 17.16ZM34.1327 10.86C33.0267 10.86 32.1447 11.42 31.7387 12.218L31.6687 11H30.6887V20.94H31.8087V16.908C32.2427 17.636 33.0827 18.14 34.1327 18.14C36.0787 18.14 37.3247 16.782 37.3247 14.5C37.3247 12.218 36.0787 10.86 34.1327 10.86ZM34.0067 17.16C32.6767 17.16 31.8087 16.166 31.8087 14.584V14.416C31.8087 12.834 32.6767 11.84 34.0067 11.84C35.3787 11.84 36.2047 12.876 36.2047 14.5C36.2047 16.124 35.3787 17.16 34.0067 17.16ZM42.4611 10.86C40.3471 10.86 39.0731 12.232 39.0731 14.5C39.0731 16.768 40.3471 18.14 42.4611 18.14C44.5751 18.14 45.8491 16.768 45.8491 14.5C45.8491 12.232 44.5751 10.86 42.4611 10.86ZM42.4611 11.826C43.8751 11.826 44.7291 12.834 44.7291 14.5C44.7291 16.166 43.8751 17.174 42.4611 17.174C41.0471 17.174 40.1931 16.166 40.1931 14.5C40.1931 12.834 41.0471 11.826 42.4611 11.826ZM51.3287 10.86C50.2367 10.86 49.4807 11.294 49.0887 12.148L48.9347 11H48.0247V18H49.1447V14.22C49.1447 12.652 50.1527 11.91 50.9927 11.91C51.3567 11.91 51.6647 11.98 51.8747 12.092L52.0987 11C51.8887 10.888 51.5667 10.86 51.3287 10.86ZM57.2077 16.572C56.8857 16.894 56.5217 17.09 56.0177 17.09C55.4017 17.09 54.9677 16.754 54.9677 16.068V11.966H57.5577V11H54.9677V9.012L53.8477 9.32V11H52.4477V11.966H53.8477V16.264C53.8617 17.622 54.7577 18.14 55.7937 18.14C56.5637 18.14 57.1657 17.902 57.5997 17.51L57.2077 16.572ZM65.2824 16.95V8.76H64.1624V18H70.5744V16.95H65.2824ZM72.8796 9.656C73.3836 9.656 73.7196 9.32 73.7196 8.816C73.7196 8.312 73.3836 7.976 72.8796 7.976C72.3756 7.976 72.0396 8.312 72.0396 8.816C72.0396 9.32 72.3756 9.656 72.8796 9.656ZM73.4396 11H72.3196V18H73.4396V11ZM79.4403 10.86C78.4743 10.86 77.5783 11.21 77.0883 12.092L77.0183 11H76.0383V18H77.1583V14.276C77.1583 12.484 78.3063 11.84 79.3283 11.84C80.2943 11.84 81.0503 12.358 81.0503 13.912V18H82.1703V13.52C82.1703 11.714 80.9383 10.86 79.4403 10.86ZM90.7123 14.136C90.7123 12.33 89.6063 10.86 87.5763 10.86C85.4623 10.86 84.2723 12.232 84.2723 14.5C84.2723 16.768 85.5463 18.14 87.6603 18.14C89.1723 18.14 90.0403 17.566 90.5723 16.614L89.6343 16.124C89.3823 16.796 88.6823 17.16 87.6603 17.16C86.3723 17.16 85.5183 16.334 85.3783 14.92H90.6563C90.6843 14.724 90.7123 14.458 90.7123 14.136ZM87.5763 11.84C88.7663 11.84 89.4803 12.638 89.6343 13.926H85.3923C85.5603 12.61 86.3303 11.84 87.5763 11.84ZM97.3465 18H103.563V16.95H100.329C100.049 16.95 99.2505 16.978 98.9425 16.992V16.978C102.247 14.78 103.367 13.254 103.367 11.518C103.367 9.81 102.163 8.62 100.273 8.62C98.3965 8.62 97.2905 9.754 97.0525 11.364L98.0325 11.952C98.1585 10.566 98.9565 9.67 100.231 9.67C101.435 9.67 102.191 10.426 102.191 11.518C102.191 13.156 101.043 14.374 97.3465 17.09V18ZM111.931 14.612H110.293V8.76H108.879L104.665 14.752V15.578H109.173V18H110.293V15.578H111.931V14.612ZM108.277 11.21C108.571 10.79 108.977 10.132 109.201 9.67H109.229L109.173 11.154V14.612H105.855L108.277 11.21ZM118.333 7.78H117.283L112.999 18.98H114.049L118.333 7.78ZM119.306 8.76V9.81H124.892C122.736 12.148 121.658 15.018 121.658 18H122.806C122.806 14.878 123.772 12.26 126.11 9.81V8.76H119.306Z"
                                            fill="white" />
                                        <path
                                            d="M61.76 60.15H56.09V65.97H52.13V60.15H46.46V56.49H52.13V50.67H56.09V56.49H61.76V60.15ZM70.6648 62.85C70.8248 63.73 71.1848 64.41 71.7448 64.89C72.3248 65.35 73.0948 65.58 74.0548 65.58C75.2948 65.58 76.1948 65.07 76.7548 64.05C77.3148 63.01 77.5948 61.27 77.5948 58.83C77.1348 59.47 76.4848 59.97 75.6448 60.33C74.8248 60.69 73.9348 60.87 72.9748 60.87C71.6948 60.87 70.5348 60.61 69.4948 60.09C68.4748 59.55 67.6648 58.76 67.0648 57.72C66.4648 56.66 66.1648 55.38 66.1648 53.88C66.1648 51.66 66.8248 49.9 68.1448 48.6C69.4648 47.28 71.2648 46.62 73.5448 46.62C76.3848 46.62 78.3848 47.53 79.5448 49.35C80.7248 51.17 81.3148 53.91 81.3148 57.57C81.3148 60.17 81.0848 62.3 80.6248 63.96C80.1848 65.62 79.4148 66.88 78.3148 67.74C77.2348 68.6 75.7548 69.03 73.8748 69.03C72.3948 69.03 71.1348 68.75 70.0948 68.19C69.0548 67.61 68.2548 66.86 67.6948 65.94C67.1548 65 66.8448 63.97 66.7648 62.85H70.6648ZM73.8448 57.45C74.8848 57.45 75.7048 57.13 76.3048 56.49C76.9048 55.85 77.2048 54.99 77.2048 53.91C77.2048 52.73 76.8848 51.82 76.2448 51.18C75.6248 50.52 74.7748 50.19 73.6948 50.19C72.6148 50.19 71.7548 50.53 71.1148 51.21C70.4948 51.87 70.1848 52.75 70.1848 53.85C70.1848 54.91 70.4848 55.78 71.0848 56.46C71.7048 57.12 72.6248 57.45 73.8448 57.45ZM84.0741 51V47.13H91.3041V69H86.9841V51H84.0741ZM108.713 56.52V60.06H95.9933V56.52H108.713ZM114.264 64.26C116.184 62.66 117.714 61.33 118.854 60.27C119.994 59.19 120.944 58.07 121.704 56.91C122.464 55.75 122.844 54.61 122.844 53.49C122.844 52.47 122.604 51.67 122.124 51.09C121.644 50.51 120.904 50.22 119.904 50.22C118.904 50.22 118.134 50.56 117.594 51.24C117.054 51.9 116.774 52.81 116.754 53.97H112.674C112.754 51.57 113.464 49.75 114.804 48.51C116.164 47.27 117.884 46.65 119.964 46.65C122.244 46.65 123.994 47.26 125.214 48.48C126.434 49.68 127.044 51.27 127.044 53.25C127.044 54.81 126.624 56.3 125.784 57.72C124.944 59.14 123.984 60.38 122.904 61.44C121.824 62.48 120.414 63.74 118.674 65.22H127.524V68.7H112.704V65.58L114.264 64.26ZM141.51 52.59C141.31 51.75 140.96 51.12 140.46 50.7C139.98 50.28 139.28 50.07 138.36 50.07C136.98 50.07 135.96 50.63 135.3 51.75C134.66 52.85 134.33 54.65 134.31 57.15C134.79 56.35 135.49 55.73 136.41 55.29C137.33 54.83 138.33 54.6 139.41 54.6C140.71 54.6 141.86 54.88 142.86 55.44C143.86 56 144.64 56.82 145.2 57.9C145.76 58.96 146.04 60.24 146.04 61.74C146.04 63.16 145.75 64.43 145.17 65.55C144.61 66.65 143.78 67.51 142.68 68.13C141.58 68.75 140.27 69.06 138.75 69.06C136.67 69.06 135.03 68.6 133.83 67.68C132.65 66.76 131.82 65.48 131.34 63.84C130.88 62.18 130.65 60.14 130.65 57.72C130.65 54.06 131.28 51.3 132.54 49.44C133.8 47.56 135.79 46.62 138.51 46.62C140.61 46.62 142.24 47.19 143.4 48.33C144.56 49.47 145.23 50.89 145.41 52.59H141.51ZM138.45 58.05C137.39 58.05 136.5 58.36 135.78 58.98C135.06 59.6 134.7 60.5 134.7 61.68C134.7 62.86 135.03 63.79 135.69 64.47C136.37 65.15 137.32 65.49 138.54 65.49C139.62 65.49 140.47 65.16 141.09 64.5C141.73 63.84 142.05 62.95 142.05 61.83C142.05 60.67 141.74 59.75 141.12 59.07C140.52 58.39 139.63 58.05 138.45 58.05ZM148.85 51V47.13H156.08V69H151.76V51H148.85ZM173.489 56.52V60.06H160.769V56.52H173.489ZM191.639 50.31L183.659 69H179.399L187.439 50.79H177.179V47.19H191.639V50.31ZM193.644 51V47.13H200.874V69H196.554V51H193.644ZM216.364 52.59C216.164 51.75 215.814 51.12 215.314 50.7C214.834 50.28 214.134 50.07 213.214 50.07C211.834 50.07 210.814 50.63 210.154 51.75C209.514 52.85 209.184 54.65 209.164 57.15C209.644 56.35 210.344 55.73 211.264 55.29C212.184 54.83 213.184 54.6 214.264 54.6C215.564 54.6 216.714 54.88 217.714 55.44C218.714 56 219.494 56.82 220.054 57.9C220.614 58.96 220.894 60.24 220.894 61.74C220.894 63.16 220.604 64.43 220.024 65.55C219.464 66.65 218.634 67.51 217.534 68.13C216.434 68.75 215.124 69.06 213.604 69.06C211.524 69.06 209.884 68.6 208.684 67.68C207.504 66.76 206.674 65.48 206.194 63.84C205.734 62.18 205.504 60.14 205.504 57.72C205.504 54.06 206.134 51.3 207.394 49.44C208.654 47.56 210.644 46.62 213.364 46.62C215.464 46.62 217.094 47.19 218.254 48.33C219.414 49.47 220.084 50.89 220.264 52.59H216.364ZM213.304 58.05C212.244 58.05 211.354 58.36 210.634 58.98C209.914 59.6 209.554 60.5 209.554 61.68C209.554 62.86 209.884 63.79 210.544 64.47C211.224 65.15 212.174 65.49 213.394 65.49C214.474 65.49 215.324 65.16 215.944 64.5C216.584 63.84 216.904 62.95 216.904 61.83C216.904 60.67 216.594 59.75 215.974 59.07C215.374 58.39 214.484 58.05 213.304 58.05ZM223.703 51V47.13H230.933V69H226.613V51H223.703ZM234.572 51V47.13H241.802V69H237.482V51H234.572ZM245.441 51V47.13H252.671V69H248.351V51H245.441ZM256.31 51V47.13H263.54V69H259.22V51H256.31Z"
                                            fill="white" />
                                    </svg>

                                </a>
                                {{-- <a href="javascript:void(0)" style="cursor: default;"> --}}
                                <a style="cursor: default;">
                                    <svg width="247" height="81" viewBox="0 0 247 81" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <line x1="1" y1="4.37114e-08" x2="0.999997" y2="79"
                                            stroke="white" stroke-width="2" />
                                        <g clip-path="url(#clip0_3345_25730)">
                                            <path
                                                d="M73.9286 44.0714H69.8571V41.3572C69.8571 40.6076 69.2495 40 68.5 40C67.7504 40 67.1428 40.6076 67.1428 41.3572V44.0714H50.8571V41.3572C50.8571 40.6076 50.2495 40 49.5 40C48.7505 40 48.1429 40.6076 48.1429 41.3572V44.0714H44.0714C41.8228 44.0714 40 45.8943 40 48.1429V73.9286C40 76.1772 41.8228 78 44.0714 78H73.9286C76.1772 78 78 76.1772 78 73.9286V48.1429C78 45.8943 76.1772 44.0714 73.9286 44.0714ZM75.2857 73.9286C75.2857 74.6781 74.678 75.2857 73.9285 75.2857H44.0714C43.3219 75.2857 42.7143 74.6781 42.7143 73.9286V56.2857H75.2857V73.9286ZM75.2857 53.5714H42.7143V48.1429C42.7143 47.3933 43.3219 46.7857 44.0714 46.7857H48.1429V49.4999C48.1429 50.2495 48.7505 50.8571 49.5 50.8571C50.2496 50.8571 50.8572 50.2495 50.8572 49.4999V46.7857H67.1429V49.4999C67.1429 50.2495 67.7505 50.8571 68.5001 50.8571C69.2496 50.8571 69.8572 50.2495 69.8572 49.4999V46.7857H73.9287C74.6782 46.7857 75.2858 47.3933 75.2858 48.1429V53.5714H75.2857Z"
                                                fill="#02BB9A" />
                                            <path
                                                d="M68.069 59.3976C67.5431 58.8896 66.7093 58.8896 66.1834 59.3976L56.2857 69.2952L51.8166 64.8261C51.2774 64.3054 50.4183 64.3203 49.8976 64.8594C49.3896 65.3853 49.3896 66.2191 49.8976 66.745L55.3262 72.1736C55.8562 72.7034 56.7153 72.7034 57.2452 72.1736L68.1023 61.3166C68.623 60.7774 68.6081 59.9183 68.069 59.3976Z"
                                                fill="#02BB9A" />
                                        </g>
                                        <path
                                            d="M48.236 8.62C45.604 8.62 43.952 10.454 43.952 13.38C43.952 16.306 45.604 18.14 48.236 18.14C50.868 18.14 52.52 16.306 52.52 13.38C52.52 10.454 50.868 8.62 48.236 8.62ZM48.236 9.67C50.154 9.67 51.344 11.056 51.344 13.38C51.344 15.704 50.154 17.09 48.236 17.09C46.318 17.09 45.128 15.704 45.128 13.38C45.128 11.056 46.318 9.67 48.236 9.67ZM58.1083 10.86C57.1423 10.86 56.2463 11.21 55.7563 12.092L55.6863 11H54.7063V18H55.8263V14.276C55.8263 12.484 56.9743 11.84 57.9963 11.84C58.9623 11.84 59.7183 12.358 59.7183 13.912V18H60.8383V13.52C60.8383 11.714 59.6063 10.86 58.1083 10.86ZM64.4383 7.78H63.3183V16.264C63.3183 17.538 63.8643 18.14 64.9983 18.14C65.3623 18.14 65.7403 18.07 66.0343 17.944L66.2163 16.866C65.8103 17.02 65.5723 17.062 65.1943 17.062C64.6203 17.062 64.4383 16.838 64.4383 16.124V7.78ZM68.2136 9.656C68.7176 9.656 69.0536 9.32 69.0536 8.816C69.0536 8.312 68.7176 7.976 68.2136 7.976C67.7096 7.976 67.3736 8.312 67.3736 8.816C67.3736 9.32 67.7096 9.656 68.2136 9.656ZM68.7736 11H67.6536V18H68.7736V11ZM74.7743 10.86C73.8083 10.86 72.9123 11.21 72.4223 12.092L72.3523 11H71.3723V18H72.4923V14.276C72.4923 12.484 73.6403 11.84 74.6623 11.84C75.6283 11.84 76.3843 12.358 76.3843 13.912V18H77.5043V13.52C77.5043 11.714 76.2723 10.86 74.7743 10.86ZM86.0463 14.136C86.0463 12.33 84.9403 10.86 82.9103 10.86C80.7963 10.86 79.6063 12.232 79.6063 14.5C79.6063 16.768 80.8803 18.14 82.9943 18.14C84.5063 18.14 85.3743 17.566 85.9063 16.614L84.9683 16.124C84.7163 16.796 84.0163 17.16 82.9943 17.16C81.7063 17.16 80.8523 16.334 80.7123 14.92H85.9903C86.0183 14.724 86.0463 14.458 86.0463 14.136ZM82.9103 11.84C84.1003 11.84 84.8143 12.638 84.9683 13.926H80.7263C80.8943 12.61 81.6643 11.84 82.9103 11.84ZM96.1245 8.62C93.9825 8.62 92.6805 9.88 92.6805 11.364C92.6805 12.778 93.5765 13.534 96.0685 13.968C98.0145 14.304 98.6165 14.766 98.6165 15.564C98.6165 16.558 97.6645 17.09 96.2365 17.09C94.7245 17.09 93.7725 16.418 93.2825 15.354L92.3165 16.138C92.9605 17.286 94.2485 18.14 96.2085 18.14C98.3645 18.14 99.7785 17.09 99.7785 15.508C99.7785 14.08 98.8965 13.296 96.4185 12.876C94.4725 12.54 93.8565 12.106 93.8565 11.238C93.8565 10.356 94.6685 9.67 96.1385 9.67C97.4965 9.67 98.1685 10.146 98.7285 11.364L99.6945 10.58C98.9805 9.292 97.8185 8.62 96.1245 8.62ZM104.869 10.86C102.755 10.86 101.481 12.232 101.481 14.5C101.481 16.768 102.755 18.14 104.869 18.14C106.353 18.14 107.361 17.37 107.837 16.082L106.801 15.718C106.591 16.642 105.933 17.16 104.841 17.16C103.441 17.16 102.601 16.166 102.601 14.5C102.601 12.834 103.441 11.84 104.841 11.84C105.807 11.84 106.409 12.33 106.703 13.226L107.767 12.722C107.249 11.574 106.311 10.86 104.869 10.86ZM113.22 10.86C112.268 10.86 111.428 11.21 110.938 12.05V7.78H109.818V18H110.938V14.29C110.938 12.498 112.086 11.84 113.108 11.84C114.074 11.84 114.83 12.358 114.83 13.912V18H115.95V13.52C115.95 11.714 114.718 10.86 113.22 10.86ZM124.492 14.136C124.492 12.33 123.386 10.86 121.356 10.86C119.242 10.86 118.052 12.232 118.052 14.5C118.052 16.768 119.326 18.14 121.44 18.14C122.952 18.14 123.82 17.566 124.352 16.614L123.414 16.124C123.162 16.796 122.462 17.16 121.44 17.16C120.152 17.16 119.298 16.334 119.158 14.92H124.436C124.464 14.724 124.492 14.458 124.492 14.136ZM121.356 11.84C122.546 11.84 123.26 12.638 123.414 13.926H119.172C119.34 12.61 120.11 11.84 121.356 11.84ZM131.716 7.78V12.092C131.282 11.364 130.442 10.86 129.392 10.86C127.446 10.86 126.2 12.218 126.2 14.5C126.2 16.782 127.446 18.14 129.392 18.14C130.498 18.14 131.38 17.58 131.786 16.782L131.856 18H132.836V7.78H131.716ZM129.518 17.16C128.146 17.16 127.32 16.124 127.32 14.5C127.32 12.876 128.146 11.84 129.518 11.84C130.848 11.84 131.716 12.834 131.716 14.416V14.584C131.716 16.166 130.848 17.16 129.518 17.16ZM140.381 11V14.808C140.381 16.46 139.331 17.16 138.141 17.16C137.133 17.16 136.489 16.726 136.489 15.284V11H135.369V15.578C135.369 17.426 136.559 18.14 137.945 18.14C139.065 18.14 139.961 17.776 140.451 16.936L140.521 18H141.501V11H140.381ZM145.171 7.78H144.051V16.264C144.051 17.538 144.597 18.14 145.731 18.14C146.095 18.14 146.473 18.07 146.767 17.944L146.949 16.866C146.543 17.02 146.305 17.062 145.927 17.062C145.353 17.062 145.171 16.838 145.171 16.124V7.78ZM154.392 14.136C154.392 12.33 153.286 10.86 151.256 10.86C149.142 10.86 147.952 12.232 147.952 14.5C147.952 16.768 149.226 18.14 151.34 18.14C152.852 18.14 153.72 17.566 154.252 16.614L153.314 16.124C153.062 16.796 152.362 17.16 151.34 17.16C150.052 17.16 149.198 16.334 149.058 14.92H154.336C154.364 14.724 154.392 14.458 154.392 14.136ZM151.256 11.84C152.446 11.84 153.16 12.638 153.314 13.926H149.072C149.24 12.61 150.01 11.84 151.256 11.84Z"
                                            fill="white" />
                                        <path
                                            d="M107.95 58.26C109.13 58.48 110.1 59.07 110.86 60.03C111.62 60.99 112 62.09 112 63.33C112 64.45 111.72 65.44 111.16 66.3C110.62 67.14 109.83 67.8 108.79 68.28C107.75 68.76 106.52 69 105.1 69H96.07V48.06H104.71C106.13 48.06 107.35 48.29 108.37 48.75C109.41 49.21 110.19 49.85 110.71 50.67C111.25 51.49 111.52 52.42 111.52 53.46C111.52 54.68 111.19 55.7 110.53 56.52C109.89 57.34 109.03 57.92 107.95 58.26ZM100.27 56.7H104.11C105.11 56.7 105.88 56.48 106.42 56.04C106.96 55.58 107.23 54.93 107.23 54.09C107.23 53.25 106.96 52.6 106.42 52.14C105.88 51.68 105.11 51.45 104.11 51.45H100.27V56.7ZM104.5 65.58C105.52 65.58 106.31 65.34 106.87 64.86C107.45 64.38 107.74 63.7 107.74 62.82C107.74 61.92 107.44 61.22 106.84 60.72C106.24 60.2 105.43 59.94 104.41 59.94H100.27V65.58H104.5ZM122.727 69.27C121.127 69.27 119.687 68.92 118.407 68.22C117.127 67.5 116.117 66.49 115.377 65.19C114.657 63.89 114.297 62.39 114.297 60.69C114.297 58.99 114.667 57.49 115.407 56.19C116.167 54.89 117.197 53.89 118.497 53.19C119.797 52.47 121.247 52.11 122.847 52.11C124.447 52.11 125.897 52.47 127.197 53.19C128.497 53.89 129.517 54.89 130.257 56.19C131.017 57.49 131.397 58.99 131.397 60.69C131.397 62.39 131.007 63.89 130.227 65.19C129.467 66.49 128.427 67.5 127.107 68.22C125.807 68.92 124.347 69.27 122.727 69.27ZM122.727 65.61C123.487 65.61 124.197 65.43 124.857 65.07C125.537 64.69 126.077 64.13 126.477 63.39C126.877 62.65 127.077 61.75 127.077 60.69C127.077 59.11 126.657 57.9 125.817 57.06C124.997 56.2 123.987 55.77 122.787 55.77C121.587 55.77 120.577 56.2 119.757 57.06C118.957 57.9 118.557 59.11 118.557 60.69C118.557 62.27 118.947 63.49 119.727 64.35C120.527 65.19 121.527 65.61 122.727 65.61ZM141.858 69.27C140.258 69.27 138.818 68.92 137.538 68.22C136.258 67.5 135.248 66.49 134.508 65.19C133.788 63.89 133.428 62.39 133.428 60.69C133.428 58.99 133.798 57.49 134.538 56.19C135.298 54.89 136.328 53.89 137.628 53.19C138.928 52.47 140.378 52.11 141.978 52.11C143.578 52.11 145.028 52.47 146.328 53.19C147.628 53.89 148.648 54.89 149.388 56.19C150.148 57.49 150.528 58.99 150.528 60.69C150.528 62.39 150.138 63.89 149.358 65.19C148.598 66.49 147.558 67.5 146.238 68.22C144.938 68.92 143.478 69.27 141.858 69.27ZM141.858 65.61C142.618 65.61 143.328 65.43 143.988 65.07C144.668 64.69 145.208 64.13 145.608 63.39C146.008 62.65 146.208 61.75 146.208 60.69C146.208 59.11 145.788 57.9 144.948 57.06C144.128 56.2 143.118 55.77 141.918 55.77C140.718 55.77 139.708 56.2 138.888 57.06C138.088 57.9 137.688 59.11 137.688 60.69C137.688 62.27 138.078 63.49 138.858 64.35C139.658 65.19 140.658 65.61 141.858 65.61ZM163.449 69L157.809 61.92V69H153.609V46.8H157.809V59.43L163.389 52.38H168.849L161.529 60.72L168.909 69H163.449ZM195.647 48.06V69H191.447V60.09H182.477V69H178.277V48.06H182.477V56.67H191.447V48.06H195.647ZM215.231 60.33C215.231 60.93 215.191 61.47 215.111 61.95H202.961C203.061 63.15 203.481 64.09 204.221 64.77C204.961 65.45 205.871 65.79 206.951 65.79C208.511 65.79 209.621 65.12 210.281 63.78H214.811C214.331 65.38 213.411 66.7 212.051 67.74C210.691 68.76 209.021 69.27 207.041 69.27C205.441 69.27 204.001 68.92 202.721 68.22C201.461 67.5 200.471 66.49 199.751 65.19C199.051 63.89 198.701 62.39 198.701 60.69C198.701 58.97 199.051 57.46 199.751 56.16C200.451 54.86 201.431 53.86 202.691 53.16C203.951 52.46 205.401 52.11 207.041 52.11C208.621 52.11 210.031 52.45 211.271 53.13C212.531 53.81 213.501 54.78 214.181 56.04C214.881 57.28 215.231 58.71 215.231 60.33ZM210.881 59.13C210.861 58.05 210.471 57.19 209.711 56.55C208.951 55.89 208.021 55.56 206.921 55.56C205.881 55.56 205.001 55.88 204.281 56.52C203.581 57.14 203.151 58.01 202.991 59.13H210.881ZM222.497 54.96C223.037 54.08 223.737 53.39 224.597 52.89C225.477 52.39 226.477 52.14 227.597 52.14V56.55H226.487C225.167 56.55 224.167 56.86 223.487 57.48C222.827 58.1 222.497 59.18 222.497 60.72V69H218.297V52.38H222.497V54.96ZM245.875 60.33C245.875 60.93 245.835 61.47 245.755 61.95H233.605C233.705 63.15 234.125 64.09 234.865 64.77C235.605 65.45 236.515 65.79 237.595 65.79C239.155 65.79 240.265 65.12 240.925 63.78H245.455C244.975 65.38 244.055 66.7 242.695 67.74C241.335 68.76 239.665 69.27 237.685 69.27C236.085 69.27 234.645 68.92 233.365 68.22C232.105 67.5 231.115 66.49 230.395 65.19C229.695 63.89 229.345 62.39 229.345 60.69C229.345 58.97 229.695 57.46 230.395 56.16C231.095 54.86 232.075 53.86 233.335 53.16C234.595 52.46 236.045 52.11 237.685 52.11C239.265 52.11 240.675 52.45 241.915 53.13C243.175 53.81 244.145 54.78 244.825 56.04C245.525 57.28 245.875 58.71 245.875 60.33ZM241.525 59.13C241.505 58.05 241.115 57.19 240.355 56.55C239.595 55.89 238.665 55.56 237.565 55.56C236.525 55.56 235.645 55.88 234.925 56.52C234.225 57.14 233.795 58.01 233.635 59.13H241.525Z"
                                            fill="white" />
                                        <defs>
                                            <clipPath id="clip0_3345_25730">
                                                <rect width="38" height="38" fill="white"
                                                    transform="translate(40 40)" />
                                            </clipPath>
                                        </defs>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
        </section>
    @endif
    <!-- bottom banner section  end-->

    <!-- Doctor profile section start -->
    @if ($doctor_profiles && $doctor_profiles->count() > 0)
        <section class="doctors_slider">

            <div class="container">
                <div class="jus_texts text-center">
                    <p class="red_title">Our Visionary Leaders</p>
                    <h2 class="blue_sub_title">Our Doctors</h2>
                    <svg class="line" width="90" height="9" viewBox="0 0 90 9" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path d="M2.02431 7.09212C30.0244 6.09216 52.5242 0.592169 87.8787 2.46593" stroke="#02BB9A"
                            stroke-width="3" stroke-linecap="round"></path>
                    </svg>

                </div>
                <div class="slick-slider_testis our_docs ">
                    @foreach ($doctor_profiles as $doctors_list)
                    <div class="col-lg-4 col-sm-6">
                        <div class="our_each_doc" style="margin-right: 35px;margin-bottom:0px">
                            <div class="row g-0 align-items-center">
                                <div class="col-lg-6 mb-lg-0 mb-5">
                                    <div class="doc_visuals">
                                        <img src="{{ url('../') }}/storage/app/public/uploads/doctor_profile/{{ $doctors_list->profile_photo }}"
                                            class="img-fluid" title="{{ $doctors_list->prefix }} {{ $doctors_list->full_name }}" style="cursor: default;">
                                    </div>
                                </div>

                                <div class="col-lg-6 mt-lg-0 mt-3">
                                    <div class="doc_details">
                                        <div class="each_docdetails">
                                            <h5 class="dr_name">{{ $doctors_list->prefix }} {{ $doctors_list->full_name }}</h5>
                                            <h4>Department</h4>
                                            <p>{{ $doctors_list->department->department_name }}</p>
                                        </div>
                                        <div class="each_docdetails">
                                            <h4>Designation</h4>
                                            <p>{{ $doctors_list->designation }}</p>
                                        </div>
                                        <div class="btn-group" >
                                            <a data-bs-toggle="modal" data-bs-target="#DoctorContactNoModal" style="cursor: pointer;">
                                                <svg width="45" height="43" viewBox="0 0 45 43"
                                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <rect width="45" height="43" rx="7"
                                                        fill="#F3B21F" />
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                        d="M22.5707 22.4329C26.2274 26.0885 27.0569 21.8593 29.3851 24.1859C31.6297 26.4299 32.9198 26.8794 30.0759 29.7225C29.7197 30.0088 27.4564 33.4529 19.5025 25.5012C11.5476 17.5485 14.9897 15.2829 15.2761 14.9268C18.1268 12.0759 18.5687 13.3734 20.8132 15.6174C23.1415 17.945 18.9141 18.7772 22.5707 22.4329Z"
                                                        stroke="white" stroke-width="1.5" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                </svg>
                                            </a>
                                            <a class="btn custom_read_btn green_btn mb-0" onclick="OpenDoctorModel({{ $doctors_list->id }})">
                                                Read More
                                            </a>

                                        </div>
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
        </section>
    @endif
    <!-- Doctor profile section end -->

    <!-- Review section start -->
    @if ($review && $review->count() > 0)
        <section class="testis padding_tb_100">
            <div class="container">
                <div class="title_max">
                    <div class="title">
                        <p class="red_title">Here Some Of</p>
                        <h2 class="blue_sub_title">Patients Speak </h2>
                        <svg class="line" width="90" height="9" viewBox="0 0 90 9" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path d="M2.02431 7.09212C30.0244 6.09216 52.5242 0.592169 87.8787 2.46593" stroke="#02BB9A"
                                stroke-width="3" stroke-linecap="round"></path>
                        </svg>
                        <p class="small_gray_text text-center">And Share Their Experiences
                        </p>
                    </div>
                </div>
                <div class="review_tabs">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="photo_tab" data-bs-toggle="tab"
                                data-bs-target="#Photos_tabs" type="button" role="tab"
                                aria-controls="Photos_tabs" aria-selected="true">Photos</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="videos_tab" data-bs-toggle="tab"
                                data-bs-target="#videos_tabs" type="button" role="tab"
                                aria-controls="videos_tabs" aria-selected="false">videos</button>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="Photos_tabs" role="tabpanel"
                            aria-labelledby="photo_tab">
                            <div class="slick-slider_testis">
                                @php $is_message = false; @endphp
                                @foreach ($review as $key => $reviews)
                                    @if ($reviews->video_url == null)
                                        @php $is_message = true; @endphp
                                        <div class="element element-1">
                                            <div class="each_testimo">
                                                @php
                                                    if ($reviews->image_name) {
                                                        $photo = str_replace('/public', '', url('/')) . '/storage/' . $reviews->image_path . $reviews->image_name;
                                                    } else {
                                                        $photo = asset('assets/images/logo_avtar.png');
                                                    }
                                                @endphp
                                                <img src="{{ $photo }}" alt="" style="cursor: default;">
                                                <div class="ms-lg-3 testi_content">
                                                    <svg width="60" height="60" viewBox="0 0 60 60"
                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <rect width="60" height="60" rx="30"
                                                            fill="#ED1C24" />
                                                        <path
                                                            d="M44.9938 25.5799C44.9938 25.5769 44.9941 25.5738 44.9941 25.5708C44.9941 21.8896 42.01 18.9055 38.3288 18.9055C34.6476 18.9055 31.6636 21.8896 31.6636 25.5708C31.6636 29.2521 34.648 32.2361 38.3289 32.2361C39.0854 32.2361 39.8096 32.1042 40.4872 31.8719C38.9876 40.4745 32.2792 46.0223 38.4978 41.4563C45.3935 36.3932 45.0015 25.7742 44.9938 25.5799Z"
                                                            fill="white" />
                                                        <path
                                                            d="M23.6653 32.2361C24.4218 32.2361 25.146 32.1042 25.824 31.8718C24.324 40.4745 17.6156 46.0223 23.8343 41.4563C30.7299 36.3932 30.338 25.7742 30.3302 25.5799C30.3302 25.5769 30.3305 25.5738 30.3305 25.5708C30.3305 21.8896 27.3465 18.9055 23.6653 18.9055C19.9841 18.9055 17 21.8896 17 25.5708C17 29.2521 19.9844 32.2361 23.6653 32.2361Z"
                                                            fill="white" />
                                                    </svg>
                                                    <div class="testi_content_text">
                                                        <div class="rate" style="width: 100%; display:flex">
                                                            <input type="radio" id="star5_{{ $key }}"
                                                                name="rating_{{ $key }}" value="5"
                                                                @if ($reviews->rating == 5) checked @endif
                                                                disabled />
                                                            <label for="star5_{{ $key }}" title="text">5
                                                                stars</label>
                                                            <input type="radio" id="star4_{{ $key }}"
                                                                name="rating_{{ $key }}" value="4"
                                                                @if ($reviews->rating == 4) checked @endif
                                                                disabled />
                                                            <label for="star4_{{ $key }}" title="text">4
                                                                stars</label>
                                                            <input type="radio" id="star3_{{ $key }}"
                                                                name="rating_{{ $key }}" value="3"
                                                                @if ($reviews->rating == 3) checked @endif
                                                                disabled />
                                                            <label for="star3_{{ $key }}" title="text">3
                                                                stars</label>
                                                            <input type="radio" id="star2_{{ $key }}"
                                                                name="rating_{{ $key }}" value="2"
                                                                @if ($reviews->rating == 2) checked @endif
                                                                disabled />
                                                            <label for="star2_{{ $key }}" title="text">2
                                                                stars</label>
                                                            <input type="radio" id="star1_{{ $key }}"
                                                                name="rating_{{ $key }}" value="1"
                                                                @if ($reviews->rating == 1) checked @endif
                                                                disabled />
                                                            <label for="star1_{{ $key }}" title="text">1
                                                                star</label>
                                                        </div>
                                                        <div>
                                                            <p class="addReadMore showlesscontent">
                                                                {{ $reviews->message }}</p>
                                                        </div>
                                                        <h5>{{ $reviews->first_name }} {{ $reviews->last_name }}</h5>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                                @if ($is_message == false)
                                    <div class="container">
                                        <div class="text-center">
                                            No Message Review Found.
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="tab-pane fade" id="videos_tabs" role="tabpanel" aria-labelledby="videos_tab">
                            <div class="row py-lg-5 py-3 justify-content-center" id="form_video_card">
                                @php $is_video = false; @endphp
                                @foreach ($review as $key => $reviews)
                                    @if ($reviews->video_url != null)
                                        @php $is_video = true; @endphp
                                        <div class="col-lg-3" style="margin-bottom: 20px;">
                                            <div class="card form_video_card"
                                                id="form_video_card_{{ $reviews->id }}">
                                                <div class="card-body p-0 video_review">
                                                    <img src="{{ $reviews->thumb_image }}" alt=""
                                                        class="w-100">
                                                </div>
                                                <button id="button" class="video_load"
                                                    data-id="{{ $reviews->id }}"><i class="fa fa-play"
                                                        aria-hidden="true"></i></button>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                                @if ($is_video == false)
                                    <div class="container">
                                        <div class="text-center">
                                            No Video Found.
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif
    <!-- Review section end -->

@endsection

@section('script')
@endsection
