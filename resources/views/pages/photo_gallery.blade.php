@extends('layouts.master')
@section('content')
<!-- first section -->
<section class="page_heading_floor news_section">
    <div class="container">
        <h1 class="news_title">
            Photo Gallery
        </h1>
        <nav style="--bs-breadcrumb-divider: '>>';" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{url('/home')}}" class="text-dark">Home</a></li>
                <li class="breadcrumb-item " aria-current="page">Photo Gallery</li>
            </ol>
            <p>
            </p>
            <a href="{{url('/about_us')}}" style="    display: inline-block;" class="green_btn">About Us
                <svg width="22" height="21" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M8.2459 19.7589C7.94784 19.4667 7.92074 19.0095 8.16461 18.6873L8.2459 18.595L14.9734 12L8.2459 5.40503C7.94784 5.11283 7.92074 4.65558 8.16461 4.33338L8.2459 4.24106C8.54396 3.94887 9.01037 3.9223 9.33904 4.16137L9.43321 4.24106L16.7541 11.418C17.0522 11.7102 17.0793 12.1675 16.8354 12.4897L16.7541 12.582L9.43321 19.7589C9.10534 20.0804 8.57376 20.0804 8.2459 19.7589Z" fill="white" />
                </svg>
            </a>
        </nav>
    </div>
</section>
<!-- first section end-->
<!-- second section -->
<section class="hosp_tour_tabs padding_tb_100">
    <div class="container">
        <div>
            <ul class="nav nav-tabs tour_nav_tab" id="tour_nav_tab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active tour_link" data_id="all" id="all-tab" data-bs-toggle="tab" data-bs-target="#all" type="button" role="tab" aria-controls="all" aria-selected="true">All</button>
                </li>
                @for($i=2017; $i<=(date("Y"));$i++) <li class="nav-item" role="presentation">
                    <button class="nav-link tour_link" id="twin-tab" data-bs-toggle="tab"  data_id="{{$i}}" data-bs-target="#twin" type="button" role="tab" aria-controls="twin" aria-selected="false">{{$i}}</button>
                    </li>
                    @endfor
            </ul>
            <div class="tab-content gallery-container" id="myTabContent">
                <div class="tab-pane fade show active tz-gallery" id="all" role="tabpanel" aria-labelledby="all-tab">
                    <div class="row gallery_data">
                        <!-- @php $i=0; @endphp
                        @foreach($galleries as $key=>$gallery)
                        @php $i++; @endphp
                        <div class="col-lg-4 mb-5 px-lg-3 @if($i==2) mt-lg-5 @endif">
                            <div class="card tour_card gallary_hover">
                                <div class="card-body">
                                    <div>
                                        <a href="{{route('get_gallery_image',$gallery->slug)}}" data-fancybox="gallery" data-caption="{{$gallery->name}}" class="example-image">
                                            @php $img = str_replace("/public", "", url('/')) . '/storage/' . $gallery->image_path . $gallery->main_image; @endphp
                                            <img class="example-image" src="{{$img}}" alt="" class="w-100">
                                        </a>
                                    </div>
                                    <div class="pt-3">
                                        <h5 class="mb-0 tour_title">{{$gallery->name}}</h5>
                                        <p class="mb-0 tour_text">{{$gallery->date}}</p>
                                    </div>
                                </div>

                            </div>
                        </div>
                        @php if($i == 3){ $i=0; } @endphp
                        @endforeach -->
                    </div>
                    <div class="load_more text-center text-primary bold">
                        Load more...
                    </div>
                    <div class="auto-load text-center">
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
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- secound section end -->
</section>
<!-- Third section -->
@include('layouts.include.map')
<!-- third section end -->
@endsection
@section('script')
<script>
    var page = 1,
        last_page = 2;
    var prev_page = 1;
    var filter = $('ul#tour_nav_tab').find('button.active').attr('data_id');
    LoadGalleryData(page, filter);

    $(document).on('click', '.load_more', function(e) {
        prev_page = prev_page + 1; //page number increment
        if (prev_page > 1 && prev_page <= last_page) {
            $('.auto-load').show();
            LoadGalleryData(prev_page, filter); //load content
        } else {
            $('.auto-load').html("");
            $('.load_more').html("");
        }
    });
    $(document).on('click', '.tour_link', function(e) {
        e.preventDefault();
        filter = $(this).attr('data_id');
        var page = 1;
        LoadGalleryData(page, filter)
    });

    function LoadGalleryData(page, filter) {
        $('.auto-load').show();
        $(".gallery_data").html("");
        $.ajax({
            url: base_url + "/load_gallery_data?page=" + page,
            datatype: "html",
            type: "post",
            data: {
                "filter": filter,
            },
            success: function(response) {
                if (page == 1 && response.html == '') {
                    prev_page = 1;
                    $('.auto-load').html("");
                    $(".gallery_data").html("<h5 class='text-center'>Opps! No Record found.</h5>");
                }
                if (page == 1 && response.html != '') {
                    prev_page = 1;
                    $('.auto-load').html("");
                    // $(".gallery_data").html("<h5 class='text-center'>Opps! No Record found.</h5>");
                }
                if(response.data.last_page==response.data.current_page){
                    $('.load_more').html("");
                }
                $(".gallery_data").append(response.html);
                last_page = response.data.last_page;
            }
        });
    }
</script>
@endsection
