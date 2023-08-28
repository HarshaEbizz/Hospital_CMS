@extends('layouts.master')
@section('content')
<!-- first section -->
<section class="page_heading_floor social_active_section">
    <div class="container">
        <h1 class="social_active_title">
            Patient Feedbacks
        </h1>
        <nav style="--bs-breadcrumb-divider: '>>';" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{url('/home')}}" class="text-dark">Home</a></li>
                <li class="breadcrumb-item " aria-current="page">Patient Feedbacks</li>
            </ol>
            <p>
            </p>
            <a href="{{url('/contact_us')}}" style="display: inline-block;" class="green_btn">Contact us
                <svg width="22" height="21" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M8.2459 19.7589C7.94784 19.4667 7.92074 19.0095 8.16461 18.6873L8.2459 18.595L14.9734 12L8.2459 5.40503C7.94784 5.11283 7.92074 4.65558 8.16461 4.33338L8.2459 4.24106C8.54396 3.94887 9.01037 3.9223 9.33904 4.16137L9.43321 4.24106L16.7541 11.418C17.0522 11.7102 17.0793 12.1675 16.8354 12.4897L16.7541 12.582L9.43321 19.7589C9.10534 20.0804 8.57376 20.0804 8.2459 19.7589Z" fill="white" />
                </svg>
            </a>
        </nav>
    </div>
</section>
<!-- first section end-->
<!-- patient speak -->
<section class="testis padding_tb_100">
    <div class="container-fluid px-5">
        <div class="title_max">
            <div class="title">
                <p class="red_title">Here Some Of</p>
                <h2 class="blue_sub_title">Patients Speak </h2>
                <svg class="line" width="90" height="9" viewBox="0 0 90 9" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M2.02431 7.09212C30.0244 6.09216 52.5242 0.592169 87.8787 2.46593" stroke="#02BB9A" stroke-width="3" stroke-linecap="round"></path>
                </svg>
                <p class="small_gray_text text-center">And Share Their Experiences
                </p>
            </div>
        </div>
        <div class="review_tabs">
            <ul class="nav nav-tabs " id="review_type_tab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link type_link active" data_id="write" id="photo_tab" data-bs-toggle="tab" data-bs-target="#Photos_tabs" type="button" role="tab" aria-controls="Photos_tabs" aria-selected="true">Photos</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link type_link" id="videos_tab" data_id="video" data-bs-toggle="tab" data-bs-target="#videos_tabs" type="button" role="tab" aria-controls="videos_tabs" aria-selected="false">videos</button>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="Photos_tabs" role="tabpanel" aria-labelledby="photo_tab">
                    <div class="feedback_data">
                    </div>
                </div>
                <div class="col-lg-12 text-center " style="margin-top:30px">
                    <button class="load_more btn btn-primary" id="load_more">Load More</button>
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
</section>
<!-- end patient speak -->
<!-- second section -->
@include('layouts.include.map')
<!-- second section end -->
@endsection
@section('script')
<script type="text/javascript">
    var page = 1,
        last_page = 2;
    var prev_page = 1;
    var filter = $('ul#review_type_tab').find('button.active').attr('data_id');
    LoadFeedbackData(page, filter);

    $(document).on('click', '.load_more', function(e) {
        prev_page = prev_page + 1; //page number increment
        if (prev_page > 1 && prev_page <= last_page) {
            $('.auto-load').show();
            LoadFeedbackData(prev_page, filter); //load content
        } else {
            $(".load_more").html('');
            $('.auto-load').html("");

        }
    });
    $(document).on('click', '.type_link', function(e) {
        e.preventDefault();
        filter = $(this).attr('data_id');
        var page = 1;
        $(".feedback_data").html('');
        LoadFeedbackData(page, filter)
        $(".load_more").html('Load more...');
    });

    function LoadFeedbackData(page, filter) {
        $('.auto-load').show();
        $.ajax({
            url: base_url + "/load_feedback_data?page=" + page,
            datatype: "html",
            type: "post",
            data: {
                "filter": filter,
            },
            beforeSend: function () {
                $(".load_more").attr('disabled',true);
            },
            complete: function () {
                $(".load_more").attr('disabled',false);
            },
            success: function(response) {
                // console.log(response);
                if (page == 1 || response.html == '') {
                    prev_page = 1;
                    $('.auto-load').html("");
                    $(".feedback_data").html('');
                    $(".load_more").html('');
                }
                if (page == 1 && response.html != '') {
                    prev_page = 1;
                    $('.auto-load').html("");
                    $(".feedback_data").html('');
                }
                if (response.html != '') {
                    $(".feedback_data").append(response.html);
                    AddReadMore();
                    last_page = response.data.last_page;
                    $(".load_more").html('Load more...');
                }
                if (response.data.last_page == response.data.current_page) {
                    $('.load_more').html("");
                }
            }
        });
    }

    $(function() {
        //Calling function after Page Load
        AddReadMore();
    });
    function AddReadMore() {
        //This limit you can set after how much characters you want to show Read More.
        var carLmt = 80;
        // Text to show when text is collapsed
        var readMoreTxt = " ... Read More";
        // Text to show when text is expanded
        var readLessTxt = " Read Less";


        //Traverse all selectors with this class and manupulate HTML part to show Read More
        $(".addReadMore").each(function() {
            if ($(this).find(".firstSec").length)
                return;

            var allstr = $(this).text();
            if (allstr.length > carLmt) {
                var firstSet = allstr.substring(0, carLmt);
                var secdHalf = allstr.substring(carLmt, allstr.length);
                var strtoadd = firstSet + "<span class='SecSec'>" + secdHalf + "</span><span class='readMore'  title='Click to Show More' data-content='toggle-text'>" + readMoreTxt + "</span><span class='readLess' title='Click to Show Less'>" + readLessTxt + "</span>";
                $(this).html(strtoadd);
            }

        });
        //Read More and Read Less Click Event binding
        $(document).on("click", ".readMore,.readLess", function() {
            if ($(this).attr('class') == 'readMore') {
                $(this).parent().parent().attr('style', 'overflow-y: scroll;max-height: 130px;');
            } else {
                $(this).parent().parent().attr('style', '');
            }
            // console.log($(this).attr('class'));
            $(this).closest(".addReadMore").toggleClass("showlesscontent showmorecontent");
        });
    }
</script>

@endsection
