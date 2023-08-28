@extends('layouts.master')
@section('style')
<link href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.css" rel="stylesheet" />

<style>
/* .fancybox-content img{
    width  : 800px;
    height : 600px;
    max-width  : 80%;
    max-height : 80%;
    margin: 0;
} */
#room_image_data img.example-image {
    height: 100%;
    width: 100%;
}

#room_image_data img.example-image {
    height: 100%;
    width: 100%;
}

.history-circle2::before,
.history-circle::before {
    background: none;
}

.load_more {
    font-weight: 600;
    cursor: pointer;
}

/* .fancybox-image{
        height: 500px  !important;
        width: 500px  !important;
    } */
</style>
<link rel="stylesheet" href="{{ asset('assets/lightGallery/dist/css/lightgallery-bundle.min.css') }}" />
<link rel="stylesheet" href="{{ asset('assets/lightGallery/dist/css/lg-video.css') }}" />
@endsection
@section('content')
@php
$image='';$bottom_image='';
if($tour_video){
$image = str_replace("/public","",url('/')).'/storage/'.$tour_video->image_path.$tour_video->cover_image;
if($tour_video->cover_image==null)
{
$image = asset('assets/images/specialities_head.png');
}
$bottom_image = str_replace("/public","",url('/')).'/storage/'.$tour_video->image_path.$tour_video->bottom_cover_image;
if($tour_video->bottom_cover_image==null)
{
$bottom_image = asset('assets/images/banner_img.png');
}
}
@endphp
<!-- first section -->
<section class="page_heading hosp_tour_head" style='background:url("{{ $image }}")'>
    <!-- <video src="{{ asset('assets/images/kiran-video/kiran_video.mp4') }}" muted loop autoplay></video> -->
    @php $videos = $tour_video?unserialize($tour_video->object):'';@endphp


    <div id="gallery-videos-demo" style="display:none;">

        @if(!empty($videos))
        @foreach ($videos as $key => $video)

        <a data-lg-size="1280-720" data-src="@if($tour_video){{$video['url']}} @endif"
            data-poster="{{$video['thumb_image']}}"
            data-sub-html="<h3>@if($tour_video){{$video['caption']}} @endif</h3>">
            <img width="300" height="100" class="img-responsive" src="{{$video['thumb_image']}}" />
        </a>
        @endforeach
        @endif
    </div>



    <div class="container">
        <!-- <div class="overlay"></div> -->
        <div class="hosp_tour_contents position-relative">
            <div>
                <h1>
                    {{$tour_video?$tour_video->heading:'Hospital Tour' }}
                </h1>
                <nav style="--bs-breadcrumb-divider: '>>';" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{url('/home')}}" class="text-dark">Home </a></li>
                        <li class="breadcrumb-item " aria-current="page">Patients & Visitors</li>
                        <li class="breadcrumb-item " aria-current="page">
                            {{$tour_video?$tour_video->heading:'Hospital Tour' }}</li>
                    </ol>
                    <p class="">
                    </p>
                    <a href="{{url('/contact_us')}}" style="    display: inline-block;" class="green_btn">Contact us
                        <svg width="22" height="21" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M8.2459 19.7589C7.94784 19.4667 7.92074 19.0095 8.16461 18.6873L8.2459 18.595L14.9734 12L8.2459 5.40503C7.94784 5.11283 7.92074 4.65558 8.16461 4.33338L8.2459 4.24106C8.54396 3.94887 9.01037 3.9223 9.33904 4.16137L9.43321 4.24106L16.7541 11.418C17.0522 11.7102 17.0793 12.1675 16.8354 12.4897L16.7541 12.582L9.43321 19.7589C9.10534 20.0804 8.57376 20.0804 8.2459 19.7589Z"
                                fill="white" />
                        </svg>
                    </a>
                </nav>
            </div>
            @if(!empty($videos))
            <div>
                <button class="head_button"><i class="fa fa-play" aria-hidden="true"></i></button>
            </div>
            @endif
        </div>
    </div>
</section>
<!-- first section end-->
<!-- second section -->
<section class="hosp_tour_tabs padding_tb_100">
    <div class="container">
        <div>
            <ul class="nav nav-tabs tour_nav_tab" id="tour_nav_tab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active tour_link" data_id="all" id="all-tab" data-bs-toggle="tab"
                        data-bs-target="#all" type="button" role="tab" aria-controls="all"
                        aria-selected="true">All</button>
                </li>
                @foreach($rooms_category as $category)
                @php
                $name = (explode(' ',trim($category->name)));
                $name = Illuminate\Support\Str::lower($name[0]);
                @endphp
                <li class="nav-item" role="presentation">
                    <button class="nav-link  tour_link" id="{{$name}}-tab" data_id="{{$category->id}}"
                        data-bs-toggle="tab" data-bs-target="#{{$name}}" type="button" role="tab"
                        aria-controls="{{$name}}" aria-selected="true">{{$category->name}}</button>
                </li>
                @endforeach
            </ul>
            <div class="tab-content pt-md-5 pt-3" id="myTabContent">
                <div class="tab-pane fade show active" id="all" role="tabpanel" aria-labelledby="all-tab">
                    <div class="row room_data room_image_data">
                    </div>
                    <div class="load_more text-center text-primary bold">
                        Load more...
                    </div>
                </div>
                <div class="auto-load text-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="feather feather-loader">
                        <line x1="12" y1="2" x2="12" y2="6"></line>
                        <line x1="12" y1="18" x2="12" y2="22"></line>
                        <line x1="4.93" y1="4.93" x2="7.76" y2="7.76"></line>
                        <line x1="16.24" y1="16.24" x2="19.07" y2="19.07"></line>
                        <line x1="2" y1="12" x2="6" y2="12"></line>
                        <line x1="18" y1="12" x2="22" y2="12"></line>
                        <line x1="4.93" y1="19.07" x2="7.76" y2="16.24"></line>
                        <line x1="16.24" y1="7.76" x2="19.07" y2="4.93"></line>
                    </svg>
                </div>
            </div>
        </div>
        <!-- secound section end -->
        <!-- Third section start -->
        {{-- @if($tour_timeline && $tour_timeline->count() > 0)
        <div class="jus_texts text-center my-5">
            <p class="red_title">History</p>
            <h2 class="blue_sub_title">TimeLine</h2>
            <svg class="line" width="90" height="9" viewBox="0 0 90 9" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M2.02431 7.09212C30.0244 6.09216 52.5242 0.592169 87.8787 2.46593" stroke="#02BB9A"
                    stroke-width="3" stroke-linecap="round"></path>
            </svg>
            <p class="small_gray_text px-lg-5">
            </p>
        </div>
        <div class="history_section pt-2">
            <div class="row align-items-center">
                @foreach($tour_timeline as $timeline)
                @if($timeline->direction == 'left')
                <div class="col-lg-6 pt-5">
                    <div class="history_img_left">
                        <img src="{{ str_replace("/public","",url('/')).'/storage/'.$timeline->image_path.$timeline->image_name }}"
                            alt="">
                        <div class="history-circle d-xxl-flex d-none" style="background:{{ $timeline->color_code }}">
                            {{ $timeline->year }}</div>
                    </div>
                </div>
                <div class="col-lg-6 pt-5">
                    <div class="history_content">
                        <div>
                            <div class="history_title">
                                <h5>{{ $timeline->title }}</h5>
                            </div>
                            <div class="history_border_green my-4"
                                style="border-bottom-color:{{ $timeline->color_code }}"></div>
                            <div class="history_text">
                                <p></p>
                            </div>
                        </div>
                    </div>
                </div>
                @else
                <div class="col-lg-6 pt-5">
                    <div class="history_content_left">
                        <div>
                            <div class="history_title">
                                <h5>{{ $timeline->title }}</h5>
                            </div>
                            <div class="history_border_blue my-4"
                                style="border-bottom-color:{{ $timeline->color_code }}"></div>
                            <div class="history_text">
                            </div>
                        </div>
                        <div class="history-circle2 d-xxl-flex d-none" style="background:{{ $timeline->color_code }}">
                            {{ $timeline->year }}</div>
                    </div>
                </div>
                <div class="col-lg-6 pt-5">
                    <div class="history_img_right">
                        <img src="{{ str_replace("/public","",url('/')).'/storage/'.$timeline->image_path.$timeline->image_name }}"
                            alt="">
                    </div>
                </div>
                @endif
                @endforeach

            </div>
        </div>
        @endif --}}
    </div>
    <!-- Third section end -->
    <!-- Forth section start -->
    @php $bottom_videos = $tour_video?unserialize($tour_video->bottom_videos_object):'';@endphp
    <div id="bottom-videos-demo" style="display:none;">
        @if(!empty($bottom_videos))
        @foreach ($bottom_videos as $key => $b_video)

        <a data-lg-size="1280-720" data-src="@if($tour_video){{$b_video['url']}} @endif"
            data-poster="{{$b_video['thumb_image']}}"
            data-sub-html="<h3>@if($tour_video){{$b_video['caption']}} @endif</h3>">
            <img width="300" height="100" class="img-responsive" src="{{$b_video['thumb_image']}}" />
        </a>
        @endforeach
        @endif
    </div>
    @if($tour_video && $tour_video->bottom_heading!='' && $tour_video->bottom_heading!=null &&
    $tour_video->bottom_cover_image!='' && $tour_video->bottom_cover_image!=null)
    <section class="page_heading text-white hosp_tour_banner hosp_tour_banner1 mt-5"
        style='background:url("{{ $bottom_image }}")'>
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="tour_banner_content">
                        <h1>{{$tour_video->bottom_heading?$tour_video->bottom_heading:""}}</h1>
                        <p class="tour_banner_text w-100 mt-4"></p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endif
    <!-- Forth section end -->
</section>
<!-- Patients Speak start -->
@include('layouts.include.reviews')
<!-- Patients Speak end -->

@endsection
@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js"></script>
<script>
var page = 1,
    last_page = 2;
var prev_page = 1;
var filter = $('ul#tour_nav_tab').find('button.active').attr('data_id');
LoadRoomData(page, filter);

$(document).on('click', '.load_more', function(e) {
    prev_page = prev_page + 1; //page number increment
    if (prev_page > 1 && prev_page <= last_page) {
        $('.auto-load').show();
        LoadRoomData(prev_page, filter); //load content
    } else {
        $('.auto-load').html("");
        $('.load_more').html("");
    }
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
                $('.auto-load').html("");
                $(".room_data").html('');
            }
            if (page == 1 && response.html != '') {
                prev_page = 1;
                $('.auto-load').html("");
                $(".room_data").html('');
            }
            if (response.data.last_page == response.data.current_page) {
                $('.load_more').html("");
            }
            $(".room_data").append(response.html);
            last_page = response.data.last_page;
        }
    });
}
$('[data-fancybox="gallery"]').fancybox({
    image: {
        preload: false
    },
    afterLoad: function(instance, current) {
        // var pixelRatio = window.devicePixelRatio
        // current.width = current.width / pixelRatio;
        // current.width = current.width / pixelRatio;
    }
    // afterLoad: function(instance, current) {
    //     var pixelRatio = window.devicePixelRatio || 1;
    // }
});
</script>
<script src="{{ asset('assets/lightGallery/dist/lightgallery.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/lightGallery/dist/plugins/video/lg-video.min.js') }}" type="text/javascript"></script>
<script type="text/javascript">
lightGallery(document.getElementById('gallery-videos-demo'), {
    plugins: [lgVideo],
    autoplayVideoOnSlide: true,
    download: false
});
lightGallery(document.getElementById('bottom-videos-demo'), {
    plugins: [lgVideo],
    autoplayVideoOnSlide: true,
    download: false
});

$(".head_button").on("click", function() {

    $("#gallery-videos-demo a:first-child > img").trigger("click");

})
$(".hosp_tour_banner1").on('click', function() {
    $("#bottom-videos-demo a:first-child > img").trigger("click");
})
</script>
@endsection