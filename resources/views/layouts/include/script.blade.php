<script src="https://code.jquery.com/jquery-2.2.0.min.js" type="text/javascript"></script>
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.js"></script>
<!-- Crop image jquery-->
<script src="https://unpkg.com/dropzone"></script>
<script src="https://unpkg.com/cropperjs"></script>
<!-- end-->

<script src="{{ asset('assets/js/custom.js') }}"></script>
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> -->
{{-- <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script> --}}
{{-- <script src="{{ asset('assets/js/bootstrap.js') }}"></script> --}}

<!-- Validation js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script>
<script src="{{ asset('assets/js/validation_method.js') }}"></script>
<script src="{{ asset('assets/js/form_validate.js') }}"></script>

<!-- slick slider js  -->
<script src="{{ asset('assets/js/slick-slider/slick.js') }}"></script>

<script src="{{ asset('assets/js/notify/bootstrap-notify.min.js') }} "></script>
<script src="{{ asset('assets/js/notify/index.js') }} "></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/16.0.8/js/intlTelInput-jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script>
        $('.career_btns').on('click', function() {
       if($(this).hasClass('experience_tab')){
        $('.experience').addClass('show active');
        $('.highlight').removeClass('show active');
       }else{
        $('.experience').removeClass('show active');
        $('.highlight').addClass('show active');
       }
    });
    // Navbar js
    document.addEventListener('click', function(e) {
        if (e.target.classList.contains('hamburger-toggle')) {
            e.target.children[0].classList.toggle('active');
        }
    })

    $('.hamburger-toggle').on('click', function() {
        if ($(this).children('div').attr("class") == 'hamburger active') {
            // console.log('ssfff');
            setTimeout(function() {
                $("#navbar-content").removeClass('show');
            }, 400);
        }
    });

    // Header link js
    $('.right_drop').on('click', function() {
        $(this).toggleClass('open')
    });

    // side-fix item js
    $(".partient_wrpp").click(function() {
        $(".partient_wrpp_detl").addClass("show");

        $(".find_doctor_wrppp_detl").removeClass('show');
        $(".booking_wrpp_detl").removeClass('show');
        $(".enquire_wrppp_detl").removeClass('show');
    });

    $(".partient_wrpp_detl .close_btnn").click(function() {
        $(".partient_wrpp_detl").removeClass('show');
    });

    $(".find_doctor_wrppp").click(function() {
        $(".find_doctor_wrppp_detl").addClass("show");

        $(".partient_wrpp_detl").removeClass('show');
        $(".booking_wrpp_detl").removeClass('show');
        $(".enquire_wrppp_detl").removeClass('show');
    });

    $(".find_doctor_wrppp_detl .close_btnn").click(function() {
        $(".find_doctor_wrppp_detl").removeClass('show');
        $("#select_one").css("display", "none");
        $("#select_one").text("");
        $('#commom_find_doctor')[0].reset();
        $('#dr_id').trigger('chosen:updated');
        var department_id = $("#department_id").val();
        get_common_dr(department_id);
    });

    $(".booking_wrpp").click(function() {
        $(".booking_wrpp_detl").addClass("show");

        $(".find_doctor_wrppp_detl").removeClass('show');
        $(".partient_wrpp_detl").removeClass('show');
        $(".enquire_wrppp_detl").removeClass('show');
    });

    $(".booking_wrpp_detl .close_btnn").click(function() {
        $(".booking_wrpp_detl").removeClass('show');
    });

    $(".enquire_wrap").click(function() {
        $(".enquire_wrppp_detl").addClass("show");

        $(".find_doctor_wrppp_detl").removeClass('show');
        $(".partient_wrpp_detl").removeClass('show');
        $(".booking_wrpp_detl").removeClass('show');
    });

    $(".enquire_wrppp_detl .close_btnn").click(function() {
        $(".enquire_wrppp_detl").removeClass('show');
        $('#help_form')[0].reset();
        $("label.error").hide();
    });

    // $(".doctor_contact_no").click(function() {
    //     $("#DoctorContactNoModal").modal("show");
    // });
    // slick slider js
    $(document).on('ready', function() {
        $(".center").slick({
            centerMode: true,
            dots: false,
            infinite: true,
            autoplay: true,
            autoplaySpeed: 2000,
            slidesToShow: 4,
            slidesToScroll: 3,
            responsive: [{
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 3,
                        infinite: true,
                        dots: false,
                        arrows: false
                    }
                },
                {
                    breakpoint: 992,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 2,
                        centerMode: false,
                    }
                },
                {
                    breakpoint: 600,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 2,
                        centerMode: false,
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1,
                        centerMode: true,
                        dots: false,
                    }
                },
                {
                    breakpoint: 375,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1,
                        centerMode: false,
                    }
                }
                // You can unslick at a given breakpoint now by adding:
                // settings: "unslick"
                // instead of a settings object
            ]
        });
    });

    $(document).on('ready', function() {
        $(".slick-slider-pricing").slick({
            dots: false,
            infinite: true,
            centerMode: true,
            autoplay: true,
            autoplaySpeed: 2000,
            slidesToShow: 3,
            slidesToScroll: 1,
            responsive: [{
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 3,
                        infinite: true,
                        dots: false,
                        arrows: false
                    }
                },
                {
                    breakpoint: 992,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 2,
                        centerMode: false,
                    }
                },
                {
                    breakpoint: 600,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 2,
                        centerMode: false,
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1,
                        centerMode: true,
                    }
                },
                {
                    breakpoint: 375,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1,
                        centerMode: false,
                    }
                }
                // You can unslick at a given breakpoint now by adding:
                // settings: "unslick"
                // instead of a settings object
            ]
        });
    });

    $(".slick-slider_testis").slick({
        slidesToShow: 2,
        infinite: false,
        slidesToScroll: 1,
        autoplay: true,
        pauseOnHover: true,
        autoplaySpeed: 2000,
        dots: true,
        // dots: false, Boolean
        arrows: false,
        responsive: [{
                breakpoint: 1024,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 3,
                    infinite: true,
                    dots: true
                }
            },
            {
                breakpoint: 992,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            },
            {
                breakpoint: 768,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    dots: true,
                }
            },
            // {
            //     breakpoint: 480,
            //     settings: {
            //         slidesToShow: 1,
            //         slidesToScroll: 1
            //     }
            // }
            // You can unslick at a given breakpoint now by adding:
            // settings: "unslick"
            // instead of a settings object
        ]

    });

    $(".toggle-password").click(function() {

        $(this).toggleClass("pass_shown");
        var input = $($(this).attr("toggle"));
        if (input.attr("type") == "password") {
            input.attr("type", "text");
        } else {
            input.attr("type", "password");
        }
    });

    let digitValidate = function(ele) {
        ele.value = ele.value.replace(/[^0-9]/g, '');
    }

    let tabChange = function(val) {
        let ele = document.querySelectorAll('input');
        if (ele[val - 1].value != '') {
            ele[val].focus()
        } else if (ele[val - 1].value == '') {
            ele[val - 2].focus()
        }
    }

    /*for OTP*/
    let otptabChange = function(val) {
        let ele = document.querySelectorAll('input.otp');
        if (ele[val - 1].value != '') {
            ele[val].focus()
        } else if (ele[val - 1].value == '') {
            ele[val - 2].focus()
        }
    }

    // Image Slider Demo:
    // https://codepen.io/vone8/pen/gOajmOo

    $(document).ready(function() {

        $("#owl-home").owlCarousel({
            navigation: true,
            slideSpeed: 300,
            paginationSpeed: 400,
            singleItem: true,
            pagination: false,
            rewindSpeed: 500
        });

    });

    $(".Nursing_card_slider").slick({
        slidesToShow: 4,
        infinite: false,
        slidesToScroll: 4,
        autoplay: true,
        autoplaySpeed: 2000,
        responsive: [{
                breakpoint: 1024,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 3,
                    infinite: true,
                    dots: true,
                }
            },
            {
                breakpoint: 992,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2,
                    infinite: true,
                    dots: true,
                }
            },
            {
                breakpoint: 768,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    infinite: true,
                    dots: true,
                }
            }
        ]
    });

    // $(document).ready(function() {

    //     // When the button is clicked make the lightbox fade in in the span of 1 second, hide itself and start the video
    //     $("#button").on("click", function() {
    //         $("#lightbox").fadeIn(1000);
    //         $(this).hide();
    //         var videoURL = $('#video').prop('src');
    //         videoURL += "?autoplay=1";
    //         $('#video').prop('src', videoURL);
    //     });

    //     // When the close button is clicked make the lightbox fade out in the span of 0.5 seconds and show the play button
    //     $("#close-btn").on("click", function() {
    //         $("#lightbox").fadeOut(500);
    //         $("#button").show(250);
    //     });
    // });

    $(document).ready(function() {

        @if (session()->has('error'))
            $.notify('{{ session('error') }}', {
                type: 'danger'
            });
        @endif

        @if (session()->has('success'))
            $.notify('{{ session('success') }}', {
                type: 'success'
            });
        @endif

        @if (session()->has('status'))
            $.notify('{{ session('status') }}', {
                type: 'success'
            });
        @endif

        @if (session()->has('message'))
            $.notify('{{ session('message') }}', {
                type: 'warning'
            });
        @endif
    });

    $('#department_id').on('change', function () {
            var department_id = $(this).val();
            get_common_dr(department_id);
        });

        function get_common_dr(department_id) {
            if (department_id) {
                var html = '';
                $.ajax({
                    url: base_url + '/list_common_doctor/' + department_id,
                    type: "GET",
                    dataType: "json",
                    success: function (data) {
                        // console.log(data.length)
                        html += '<option selected="true" value="0">Select Name</option>';
                        if (data.length > 0) {
                            for (var i = 0; i < data.length; i++) {
                                if(data[i].prefix == null){
                                    data[i].prefix = '';
                                }
                                html += '<option value="' + data[i].id + '">' + data[i].prefix+' '+data[i].full_name
                                    '</option>';
                            }
                            // $('#dr_id').html(html);
                        }else{
                                html += '<option value="" disabled> No Record Found  </option>';
                        }

                        $('#dr_id').html(html);
                    }
                });
            }
        }
</script>
<script type="text/javascript">
    $(document).ready(function() {
        $(document).on('click', '.video_load', function(e) {
            e.preventDefault();
            value = $(this).data('id');
            $.ajax({
            url: base_url+'/patient_review/' + value,
            type: "GET",
            dataType: "json",
            success: function(data) {
                if (data) {
                   var html='';
                   $('.lightbox').html('');
                   html='<div id="lightbox_'+value+'" class="lightbox" data-id="'+value+'" style="display: none;"><i id="close-btn" data-id="'+value+'" class="fa fa-times close_btn"></i><div class="d-flex justify-content-center align-items-center" id="video-wrapper_'+value+'" class="video-wrapper"><iframe class="review_video" id="yt_video" src="https://www.youtube.com/embed/'+data.video_id+'/" title="" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe> </div> </div>'
                  $('#form_video_card_'+value).append(html);
                  $("#lightbox_" + value).fadeIn(1000);
                  $(this).hide();
                  var videoURL = $('#video-wrapper_' + value).prop('src');
                  videoURL += "?autoplay=1";
                  $('#video-wrapper_' + value).prop('src', videoURL);
                }
            }
        })
        });

        $(document).on('click', '.close_btn', function(e) {
            value = $(this).data('id');
            $(".video_load").show(250);
            $("#lightbox_" + value).remove();
        });

    });
</script>
<script>
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
        // Read More and Read Less Click Event binding
        $(document).on("click", ".readMore,.readLess", function() {
            if($(this).attr('class')=='readMore'){
            //    $(this).parent().parent().attr('style','overflow: auto;max-height: 45px;');P
                $('.slick-slider_testis').slick('slickPause')
            }else{
                $(this).parent().parent().attr('style','');
                $('.slick-slider_testis').slick('slickPlay')
            }
            // console.log($(this).attr('class'));
            $(this).closest(".addReadMore").toggleClass("showlesscontent showmorecontent");
        });
    }
    $(function() {
        //Calling function after Page Load
        AddReadMore();
    });
    // $(document).on("click", ".ytp-button ytp-large-play-button-red-bg", function() {
    //     $(".enquire_wrppp_detl").hide();
    //     $(".booking_wrpp_detl").hide();
    //     $(".find_doctor_wrppp_detl").hide()
    //     $(".partient_wrpp_detl").hide()
    // })

    $('#help_contact').intlTelInput({
        preferredCountries: ['in'],
        separateDialCode: true,
        utilsScript: "//cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.3/js/utils.js"
    });
</script>
