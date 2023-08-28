@extends('layouts.master')
@section('content')
<!-- first section -->
<section class="page_heading_floor form_section">
    <div class="container">
        <h1 class="form_title">
            Form
        </h1>
        <nav style="--bs-breadcrumb-divider: '>>';" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{url('/home')}}" class="text-dark">Home</a></li>
                <li class="breadcrumb-item" aria-current="page">Form</li>
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
<section class="floor_content py-lg-5 py-3">
    <div class="container">
        <div>
            <div class="form_box mb-4">
                <div class="text-center">
                    <h2 class="blue_sub_title">All Form</h2>
                    <svg class="line" width="90" height="9" viewBox="0 0 90 9" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M2.02431 7.09212C30.0244 6.09216 52.5242 0.592169 87.8787 2.46593" stroke="#02BB9A" stroke-width="3" stroke-linecap="round"></path>
                    </svg>
                    <p class="form_text">
                    </p>
                </div>
                @if($events && $events->count() > 0)
                    <div class="row p-md-5 py-3 justify-content-center">
                        @foreach($events as $event)
                            <div class="col-lg-6 mb-3">
                                <div class="card form_card  h-100">
                                    <div class="card-body p-lg-4 form_content align-items-center ">
                                        <a target="_blank" href="{{str_replace('/public', '', url('/')) . '/storage/' . $event->storage_path . $event->document}}" download class="d-flex justify-content-between align-items-center">
                                            <h5 class="form_card-title">{{ $event->event_title }}</h5>
                                            <div>
                                                <svg width="46" height="46" viewBox="0 0 46 46" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <rect width="46" height="46" rx="23" fill="#02BB9A" />
                                                    <path d="M32.8578 26.2858V30.6667C32.8578 31.2477 32.6271 31.8048 32.2163 32.2156C31.8055 32.6264 31.2483 32.8572 30.6674 32.8572H15.334C14.7531 32.8572 14.1959 32.6264 13.7851 32.2156C13.3743 31.8048 13.1436 31.2477 13.1436 30.6667V26.2858" stroke="white" stroke-linecap="round" stroke-linejoin="round" />
                                                    <path d="M17.5244 20.8096L23.0006 26.2858L28.4768 20.8096" stroke="white" stroke-linecap="round" stroke-linejoin="round" />
                                                    <path d="M23 26.2858V13.1429" stroke="white" stroke-linecap="round" stroke-linejoin="round" />
                                                </svg>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="card-body p-lg-4 form_content align-items-center text-center">
                        <p> Form Not Available </p>
                    </div>
                @endif
            </div>
        </div>
    </div>
</section>
<!-- third section -->
@include('layouts.include.map')
<!-- third section end -->
@endsection
@section('script')
@endsection
