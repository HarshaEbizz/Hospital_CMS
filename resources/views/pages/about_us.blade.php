@extends('layouts.master')
@section('content')
@php
$image ='';
if($about_us){
$image = str_replace("/public","",url('/')).'/storage/'.$about_us->image_path.$about_us->top_cover_image;
if($about_us->top_cover_image==null)
{
$image = asset('assets/images/about_hero.png');
}
}@endphp
<!-- first section -->
<section class="page_heading about_head" style='background:url("{{ $image }}")'>
    <div class="container">
        <h1 class="about_title">
            {{$about_us->top_heading}}
        </h1>
        <nav style="--bs-breadcrumb-divider: '>>';" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{url('/home')}}" class="text-dark">Home </a></li>
                <li class="breadcrumb-item active" aria-current="page">{{$about_us->top_heading }}</li>
            </ol>
            <p>
            </p>
            <a href="{{url('/contact_us')}}" style="display:inline-block;" class="green_btn">Contact us
                <svg width="22" height="21" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M8.2459 19.7589C7.94784 19.4667 7.92074 19.0095 8.16461 18.6873L8.2459 18.595L14.9734 12L8.2459 5.40503C7.94784 5.11283 7.92074 4.65558 8.16461 4.33338L8.2459 4.24106C8.54396 3.94887 9.01037 3.9223 9.33904 4.16137L9.43321 4.24106L16.7541 11.418C17.0522 11.7102 17.0793 12.1675 16.8354 12.4897L16.7541 12.582L9.43321 19.7589C9.10534 20.0804 8.57376 20.0804 8.2459 19.7589Z" fill="white" />
                </svg>
            </a>
        </nav>
    </div>
</section>
<!-- first section end-->

<!-- Information sec -->
@if($vision_data && $vision_data->count() > 0)
<section class="b_Information_sec pt-sm-5 pt-2">
    <div class="container">
        <div class="jus_texts text-center mb-3">
            <h2 class="blue_sub_title">Vision &amp; Mission</h2>
            <svg class="line" width="90" height="9" viewBox="0 0 90 9" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M2.02431 7.09212C30.0244 6.09216 52.5242 0.592169 87.8787 2.46593" stroke="#02BB9A" stroke-width="3" stroke-linecap="round"></path>
            </svg>
        </div>
        <div class="b_info_wrap">
            <div class="row justify-content-center">
                @foreach($vision_data as $data)
                <div class="col-lg-6 mb-5 px-md-3 px-2">
                    <div class="card about_helth_card_bg1 border-0">
                        <div class="card-body d-flex justify-content-center align-items-center">
                            <div class="helth_info text-center">
                                <div class="mb-3 d-flex justify-content-center">
                                    <div class="about_circle_green" style="background:{{$data->color_code}}">
                                        @php $image = str_replace("/public","",url('/')).'/storage/'.$data->image_path.$data->image_name; @endphp
                                        <img src="{{$image}}" alt="">
                                    </div>
                                </div>
                                <h6 class="pb-2">{{$data->title}}</h6>
                                <p class="mb-0">{{$data->description}}</p>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                <!-- <div class="col-lg-6 mb-5 px-md-3 px-2">
                    <div class="card about_helth_card_bg2 border-0">
                        <div class="card-body d-flex justify-content-center align-items-center">
                            <div class="helth_info text-center">
                                <div class="mb-3 d-flex justify-content-center">
                                    <div class="about_circle_yellow">
                                        <img src="assets/images/a2.png" alt="">
                                    </div>
                                </div>
                                <h6 class="pb-2">Mission</h6>
                                <p class=" mb-0">The Patients Comfort &amp; Care Comes First Above All To
                                    Provide Best Healthcare At Affordable Cost.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 mb-5 px-md-3 px-2">
                    <div class="card about_helth_card_bg3 border-0">
                        <div class="card-body d-flex justify-content-center align-items-center">
                            <div class="helth_info text-center">
                                <div class="mb-3 d-flex justify-content-center">
                                    <div class="about_circle_red">
                                        <img src="assets/images/a3.png" alt="">
                                    </div>
                                </div>
                                <h6 class="pb-2">Quality Statement</h6>
                                <p class="mb-0"> Kiran Hospital, proudly declare our commitment to meet and
                                    exceed the requirements and expectations of the Community by providing
                                    coordinated, compassionate and high quality health care services at
                                    affordable cost.</p>
                            </div>
                        </div>
                    </div>
                </div> -->
            </div>
        </div>

    </div>
</section>
@endif
<!-- Information sec end -->

<!-- Comprehensive sec -->
@if($speak && $speak->count() > 0)
<section class="comprehensive_sec padding_tb_100">
    <div class="container">
        <div class="jus_texts ul_li_image">
            <p class="red_title">{{$speak->heading}}</p>
            <h2 class="blue_sub_title">{{$speak->sub_heading}}</h2>
            <svg class="line" width="90" height="9" viewBox="0 0 90 9" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M2.02431 7.09212C30.0244 6.09216 52.5242 0.592169 87.8787 2.46593" stroke="#02BB9A" stroke-width="3" stroke-linecap="round"></path>
            </svg>
            {!! $speak->paragraph_1 !!}
        </div>
        <div class="row mt-5">
            <div class="col-lg-4">
                @php
                if($speak){
                $person_photo = str_replace("/public","",url('/')).'/storage/'.$speak->image_path.$speak->person_photo;
                if($speak->person_photo==null)
                {
                $person_photo = asset('assets/images/cap_hero.png');
                }
                }@endphp
                <img src="{{ $person_photo }}" alt="" class="img-fluid">
            </div>
            <div class="col-lg-4 jus_texts ul_li_image">
                {!! $speak->paragraph_2 !!}
                @php
                if($speak){
                $signature_photo = str_replace("/public","",url('/')).'/storage/'.$speak->image_path.$speak->signature_photo;
                if($speak->signature_photo==null)
                {
                $signature_photo = asset('assets/images/cap_hero.png');
                }
                }@endphp
                <img src="{{ $signature_photo }}" alt="" class="img-fluid">
            </div>
            <div class="col-lg-4 jus_texts ul_li_image">
                {!! $speak->paragraph_3 !!}
            </div>
        </div>
    </div>
</section>
@endif
<!-- Comprehensive sec end-->

<!-- multidisciplinary sec -->
@if(!empty($about_us))
@if($about_us->bottom_banner_status == 1)
@php
if($about_us){
$image = str_replace("/public","",url('/')).'/storage/'.$about_us->image_path.$about_us->bottom_cover_image;
if($about_us->bottom_cover_image==null)
{
$image = asset('assets/images/team_bg.png');
}
}@endphp
<section class="multidisciplinary_sec" style='background:url("{{ $image }}")'>
    <div class="container">
        <div class="row">
            <div class="col-lg-7">
                <div class="space_content">
                    <h2>{{$about_us->bottom_heading}}</h2>
                    <p>{{$about_us->bottom_sub_heading}}</p>
                </div>
            </div>
        </div>
</section>
@endif
@endif

<!-- multidisciplinary sec end -->

<!-- message_sec  section -->
@if(!empty($message))
<section class="message_sec  padding_tb_100">
    <div class="container">
        <div class="jus_texts text-center ul_li_image">
            <p class="red_title">{{$message->message_heading}}</p>
            <h2 class="blue_sub_title">{{$message->message_sub_heading}}</h2>
            <svg class="line" width="90" height="9" viewBox="0 0 90 9" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M2.02431 7.09212C30.0244 6.09216 52.5242 0.592169 87.8787 2.46593" stroke="#02BB9A" stroke-width="3" stroke-linecap="round"></path>
            </svg>
            {!! $message->message_paragraph_1 !!}
        </div>

        <div class="row mb-3">
            <div class="col-lg-4">
                @php
                if($message){
                $message_person_photo = str_replace("/public","",url('/')).'/storage/'.$message->image_path.$message->message_person_photo;
                if($message->message_person_photo==null)
                {
                $message_person_photo = asset('assets/images/tak_sec.png');
                }
                }@endphp
                <img src="{{ $message_person_photo }}" class="img-fluid" alt="">

                <div class="pt-4">
                    @php
                    if($message){
                    $message_signature_photo = str_replace("/public","",url('/')).'/storage/'.$message->image_path.$message->message_signature_photo;
                    if($message->message_signature_photo==null)
                    {
                    $message_signature_photo = asset('assets/images/tak_sec.png');
                    }
                    }@endphp
                    <img src="{{ $message_signature_photo }}" class="img-fluid" alt="">
                </div>
            </div>
            <div class="col-lg-8 jus_texts ul_li_image">
               {!! $message->message_paragraph_2 !!}
            </div>
        </div>


    </div>
</section>
@endif

<!-- tmessage_sec section end-->

<!-- baki k log -->
@if($management_message)
<section class="baki_log_sec padding_tb_100">
    <div class="container">

        <div class="jus_texts text-center">
            <p class="red_title">Our Visionary Leaders</p>
            <h2 class="blue_sub_title">Management</h2>
            <svg class="line" width="90" height="9" viewBox="0 0 90 9" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M2.02431 7.09212C30.0244 6.09216 52.5242 0.592169 87.8787 2.46593" stroke="#02BB9A" stroke-width="3" stroke-linecap="round"></path>
            </svg>
        </div>

        <div class="row mt-5">
            @foreach($management_message as $key=>$management)
            <div class="col-xxl-6 mb-xxl-0 mb-3">
                <div class="baki_log_each">
                    @php $photo = str_replace("/public","",url('/')).'/storage/'.$management->image_path.$management->image_name; @endphp
                    <img src="{{$photo}}" class="img-fluid" alt="">
                    <div class="baki_kidetails">
                        <h5>{{$management->name}}</h5>
                        <span class="d-block">{{$management->designation}}</span>
                        <p class="small_gray_text">{{$management->message}}</p>
                        <div class="btn-group d-lg-flex d-block">
                            @if($management->expertise)
                            <a class="btn green_btn mb-lg-0 mb-3" style="margin-right:5px;" data-bs-toggle="modal" data-bs-target="#expertiseModal_{{$key}}">Experience
                            </a>
                            <div class="modal fade" id="expertiseModal_{{$key}}" tabindex="-1" aria-labelledby="expertiseModal_{{$key}}" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body p-5 ul_li_image">
                                            <h2 class="blue_sub_title">Expertise</h2>
                                            <svg class="line" width="90" height="9" viewBox="0 0 90 9" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M2.02431 7.09212C30.0244 6.09216 52.5242 0.592169 87.8787 2.46593" stroke="#02BB9A" stroke-width="3" stroke-linecap="round">
                                                </path>
                                            </svg>
                                            {!! $management->expertise !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endif
                            @if($management->professional_highlights)
                            <a class="btn blue-outline-btn" data-bs-toggle="modal" data-bs-target="#professional_highlightsModal_{{$key}}">Professional
                                Highlights </a>
                            <!-- Modal -->
                            <div class="modal fade" id="professional_highlightsModal_{{$key}}" tabindex="-1" aria-labelledby="professional_highlightsModal_{{$key}}" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body p-5 ul_li_image">
                                            <h2 class="blue_sub_title">Professional Highlights</h2>
                                            <svg class="line" width="90" height="9" viewBox="0 0 90 9" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M2.02431 7.09212C30.0244 6.09216 52.5242 0.592169 87.8787 2.46593" stroke="#02BB9A" stroke-width="3" stroke-linecap="round">
                                                </path>
                                            </svg>
                                            {!! $management->professional_highlights !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif
<!-- baki k log end -->
@endsection
@section('script')
@endsection
