@extends('layouts.master')
@section('content')
<!-- first section -->
<section class="page_heading_floor news_section">
    <div class="container">
        <h1 class="news_title">
            News & Media
        </h1>
        <nav style="--bs-breadcrumb-divider: '>>';" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{url('/home')}}" class="text-dark">Home</a></li>
                <li class="breadcrumb-item " aria-current="page">News & Media</li>
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
<section class="hosp_tour_tabs padding_tb_100">
    <div class="container">
        <div class="text-center pb-4 contact_us_details">
            <h2 class="blue_sub_title">All News & Media</h2>
            <svg class="line" width="90" height="9" viewBox="0 0 90 9" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M2.02431 7.09212C30.0244 6.09216 52.5242 0.592169 87.8787 2.46593" stroke="#02BB9A" stroke-width="3" stroke-linecap="round"></path>
            </svg>
            <p>
            </p>
        </div>
        <div>
            <ul class="nav nav-tabs tour_nav_tab" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active tour_link" id="all-tab" data-bs-toggle="tab" data-bs-target="#all" type="button" role="tab" aria-controls="all" aria-selected="true">All</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link tour_link" id="economy-tab" data-bs-toggle="tab" data-bs-target="#economy" type="button" role="tab" aria-controls="economy" aria-selected="false">2023</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link tour_link" id="economy-tab" data-bs-toggle="tab" data-bs-target="#economy" type="button" role="tab" aria-controls="economy" aria-selected="false">2022</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link tour_link" id="twin-tab" data-bs-toggle="tab" data-bs-target="#twin" type="button" role="tab" aria-controls="twin" aria-selected="false">2021</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link tour_link" id="delux-tab" data-bs-toggle="tab" data-bs-target="#delux" type="button" role="tab" aria-controls="delux" aria-selected="false">2020</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link tour_link" id="premium-tab" data-bs-toggle="tab" data-bs-target="#premimum" type="button" role="tab" aria-controls="premimum" aria-selected="false">2019</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link tour_link" id="suit-tab" data-bs-toggle="tab" data-bs-target="#suit" type="button" role="tab" aria-controls="suit" aria-selected="false">2018</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link tour_link" id="presidential-tab" data-bs-toggle="tab" data-bs-target="#presidential" type="button" role="tab" aria-controls="presidential" aria-selected="false">2017</button>
                </li>
            </ul>
            <div class="tab-content py-md-5 py-3" id="myTabContent">
                <div class="tab-pane fade show active" id="all" role="tabpanel" aria-labelledby="all-tab">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="accordion row news_updates_section" id="accordionExample">

                            </div>
                            <div class="text-center">
                                {{-- <a type="button" class="load_more_news btn btn-primary" href="javascript:void(0);" id="load_more">Load More</a> --}}
                                <button class="load_more_news btn btn-primary" id="load_more">Load More</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- secound section end -->
    <!-- Third section -->
    @include('layouts.include.map')
    <!-- third section end -->
</section>
@endsection
@section('script')
<script type="text/javascript">
    function get_news(page = 1) {
        var year = $(".tour_link.active").html();
        $.ajax({
            url: base_url + '/get/news_updates?page=' + page,
            type: "POST",
            data: {
                "year": year
            },
            beforeSend: function () {
                $("#load_more").attr("disabled", true);
            },
            complete: function () {
                $("#load_more").attr("disabled", false);
            },
            success: function(res) {
                if (page == 1 && res.html != '') {
                    $(".news_updates_section").html("")
                }
                if (page == 1 && res.html == '') {
                    $(".load_more_news").hide();
                    $(".news_updates_section").html("<h5 class='text-center'>Opps! No news & Media found.</h5>");
                }
                if (res.news.current_page < res.news.last_page) {
                    $(".load_more_news").attr("data-page", parseInt(page) + 1);
                    $(".load_more_news").show();
                } else {
                    $(".load_more_news").attr("data-page", "");
                    $(".load_more_news").hide();
                }
                if (res.html != '') {
                    $(".news_updates_section").append(res.html);
                }

            }
        })
    }
    $(document).on('click', '.load_more_news', function() {
        get_news($(this).attr('data-page'));
    });
    $(document).on('click', '.tour_link', function() {
        get_news(1);
    });

    function getQueryParams(params, url) {
        let href = url;
        //this expression is to get the query strings
        let reg = new RegExp('[?&]' + params + '=([^&#]*)', 'i');
        let queryString = reg.exec(href);
        return queryString ? queryString[1] : null;
    }
    $(document).ready(function() {
        $(".load_more_news").hide();
        get_news();
    });
</script>
@endsection
