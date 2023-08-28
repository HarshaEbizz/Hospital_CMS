@extends('layouts.master')
@section('style')
<link href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.css" rel="stylesheet" />
@endsection
@section('content')
<!-- first section -->
<section class="page_heading news_section">
    <div class="container">
        <h1 class="news_title">
            Photo Gallery
        </h1>
        <nav style="--bs-breadcrumb-divider: '>>';" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{url('/home')}}"class="text-dark">Home</a></li>
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
        <div class="tz-gallery">
            <div class="py-0 gallery-container" id="myTabContent">
                <div class="py-sm-4 text-center blue_sub_title">
                    <h1 class="gallery_head">{{$gallery_image->name}}</h1>
                    <svg class="line" width="90" height="9" viewBox="0 0 90 9" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M2.02431 7.09212C30.0244 6.09216 52.5242 0.592169 87.8787 2.46593" stroke="#02BB9A" stroke-width="3" stroke-linecap="round"></path>
                    </svg>
                    <p class="gray_txt">{{$gallery_image->description}}</p>

                </div>

                <div class="row">
                    @foreach($gallery_image->Images as $image)
                    @php $image = str_replace("/public", "", url('/')) . '/storage/' . $image['path'] . $image['name']; @endphp
                    <div class="col-lg-4 mb-sm-5 mb-3 px-lg-3">
                        <div class="card tour_card gallary_hover h-100">
                            <div class="card-body d-flex align-items-center justify-content-center">
                                <div class="d-flex justify-content-center">
                                    <a href="{{ $image }}" data-fancybox="gallery" data-caption="{{$gallery_image->name}}" class="example-image">
                                        <img class="example-image" src="{{ $image }}" alt="{{$gallery_image->name}}" />
                                    </a>
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

<!-- Third section -->
@include('layouts.include.map')
<!-- third section end -->
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
</script>
@endsection
