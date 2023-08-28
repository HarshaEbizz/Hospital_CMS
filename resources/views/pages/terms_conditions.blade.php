@extends('layouts.master')
@section('content')
    <!-- first section -->

    <section class="page_heading privacy_section">

        <div class="container">
            <h1 class="privacy_title">
                Terms And Conditions
            </h1>
            <nav style="--bs-breadcrumb-divider: '>>';" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{url('/home')}}" class="text-dark">Home</a></li>
                    <li class="breadcrumb-item " aria-current="page">Terms And Conditions</li>
                </ol>
                <p>

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

    </section>

    <!-- first section end-->

    <!-- second section -->
    <section class="hosp_tour_tabs padding_tb_100">
        <div class="container">
            @foreach($conditions as $key=>$conditions_list)
            <div class="pb-4">
                <h2 class="blue_sub_title">@if($key>0){{$key++}}.@endif {{$conditions_list->sub_title}}</h2>
                <svg class="line" width="90" height="9" viewBox="0 0 90 9" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path d="M2.02431 7.09212C30.0244 6.09216 52.5242 0.592169 87.8787 2.46593" stroke="#02BB9A"
                        stroke-width="3" stroke-linecap="round"></path>
                </svg>
                {!! $conditions_list->description !!}
            </div>
            @endforeach
        </div>
    </section>
    <!-- second section end -->
@endsection
@section('script')

@endsection
