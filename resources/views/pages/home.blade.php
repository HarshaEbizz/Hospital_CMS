@extends('layouts.master')
@section('content')
<!-- First section start  -->
<!-- first sec but in slider form -->
<section class="home_slider banner_details">
    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            @if($sliders)
            @php
            $i = 0;
            @endphp
            @foreach($sliders as $slider)
            @php
            $slider_image = str_replace("/public","",url('/')).'/storage/'.$slider->image_path . $slider->image_name;
            @endphp
            <div class="carousel-item {{ $i==0?'active':'' }} ">
                <div class="Home_page_heading home_head" style='background:url("{{ $slider_image }}")'>
                    @if($slider->is_show_register == 1)
                    <div class="container">
                        <!-- <h1 class="home_title">
                            One more Jewel in <br>
                            the Crown of
                        </h1> -->
                        <div class="py-lg-4 py-2">
                            <a style="display:inline-block;" class="green_btn">Register
                                <svg width="22" height="21" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M8.2459 19.7589C7.94784 19.4667 7.92074 19.0095 8.16461 18.6873L8.2459 18.595L14.9734 12L8.2459 5.40503C7.94784 5.11283 7.92074 4.65558 8.16461 4.33338L8.2459 4.24106C8.54396 3.94887 9.01037 3.9223 9.33904 4.16137L9.43321 4.24106L16.7541 11.418C17.0522 11.7102 17.0793 12.1675 16.8354 12.4897L16.7541 12.582L9.43321 19.7589C9.10534 20.0804 8.57376 20.0804 8.2459 19.7589Z" fill="white" />
                                </svg>
                            </a>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
            @php
            $i++;
            @endphp
            @endforeach
            @endif
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</section>

@if($events && $events->count() > 0)
    <section>
        <div class="download_section my-2">
            <!--SENIOR CITIZEN FORM START-->		
            {{-- <div class="download_box mb-2">
                <div class="container">
                    <div>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="regi_bigtxt">
                                <h6>KIRAN HOSPITAL "SENIOR CITIZEN" HEALTH CARE REGISTRATION</h6>
                            </div>
                            <div class="text-center regi_smalltxt">
                                <a href="https://www.kiranhospital.com/Registration-Form.aspx" class="btn regi_form_card-title p-0" style="white-space: nowrap;" >
                                        REGISTER HERE
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}
            <!--END-->
            
            @foreach($events as $event)
                <div class="download_box mb-2">
                    <div class="container">
                        <div>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="regi_bigtxt">
                                    <h6>{{ $event->event_title }}</h6>
                                </div>
                                <div class="text-center regi_smalltxt">
                                    @if($event->event_type == 'file')
                                        <a href="{{str_replace('/public', '', url('/')) . '/storage/' . $event->storage_path . $event->document}}" download class="btn regi_form_card-title p-0">
                                            DOWNLOAD
                                        </a>
                                    @elseif($event->event_type == 'number')
                                        <a href="tel:{{$event->mobile_no}}" class="btn regi_form_card-title p-0">
                                            {{ $event->mobile_no }}
                                        </a>
                                    @elseif($event->event_type == 'url')
                                        {{-- check url contain kiranhospital.com or not --}}
                                        @if($event->url && strpos($event->url, 'kiranhospital.com') !== false)
                                            <a type="button" href="{{$event->url}}" class="btn regi_form_card-title p-0">
                                                Register Now
                                            </a>
                                        @else
                                            <a type="button" href="{{$event->url}}" target="_blank" class="btn regi_form_card-title p-0">
                                                Register Now
                                            </a>
                                        @endif
                                        
                                    @else
                                        {{--form--}}
                                        <a type="button" onclick="openRegisterModel({{ $event->id }})" class="btn regi_form_card-title p-0" data-bs-toggle="modal"
                                           data-bs-target="#registerModal">
                                            Register Now
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

            <!--નિશુલ્ક જન્મ જાત હૃદય રોગ નિદાન અને સારવાર કેમ્પ-->
            {{-- <div class="download_box mb-2">
                <div class="container">
                    <div>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="regi_bigtxt">
                                <h6>જન્મજાત હૃદય રોગનું નિ:શુલ્ક નિદાન અને સારવાર રજીસ્ટ્રેશન</h6>
                            </div>
                            <div class="text-center regi_smalltxt">
                                <a target="__blank" href="https://forms.office.com/r/09cXs2iD1A" class="btn regi_form_card-title p-0">
                                    REGISTER HERE
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}
            <!-- END-->
        </div>
    </section>
@endif

<!-- First section end  -->
@if($home_content && $home_content->count() > 0)
<section class="home_about">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="left_side_img">
                    <div class="main_bg">
                        @php $front_iamge= $home_content->front_iamge ? str_replace("/public","",url('/')).'/storage/'.$home_content->image_path.$home_content->front_iamge : asset('assets/images/home-page/sec-one.png') @endphp
                        @php $back_image= $home_content->back_image ? str_replace("/public","",url('/')).'/storage/'.$home_content->image_path.$home_content->back_image : asset('assets/images/home-page/sec-two.png') @endphp
                        <img class="one-img" src="{{ $front_iamge }}" alt="">
                        <img class="two-img" src="{{ $back_image }}" alt="">
                        <div class="doat_animation">
                            <span></span>
                        </div>
                        <div class="exx_div">
                            <div class="svg_wep">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M20.84 4.60987C20.3292 4.09888 19.7228 3.69352 19.0554 3.41696C18.3879 3.14039 17.6725 2.99805 16.95 2.99805C16.2275 2.99805 15.5121 3.14039 14.8446 3.41696C14.1772 3.69352 13.5708 4.09888 13.06 4.60987L12 5.66987L10.94 4.60987C9.9083 3.57818 8.50903 2.99858 7.05 2.99858C5.59096 2.99858 4.19169 3.57818 3.16 4.60987C2.1283 5.64156 1.54871 7.04084 1.54871 8.49987C1.54871 9.95891 2.1283 11.3582 3.16 12.3899L4.22 13.4499L12 21.2299L19.78 13.4499L20.84 12.3899C21.351 11.8791 21.7563 11.2727 22.0329 10.6052C22.3095 9.93777 22.4518 9.22236 22.4518 8.49987C22.4518 7.77738 22.3095 7.06198 22.0329 6.39452C21.7563 5.72706 21.351 5.12063 20.84 4.60987Z" fill="white" />
                                </svg>
                            </div>
                            <div class="dite">
                                {!! $home_content->message_iamge !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                {!! $home_content->content !!}
            </div>
        </div>
    </div>
</section>
@endif
@if($certificates && $certificates->count() > 0)
<section class="our_speci_wrp">
    <div class="container">
        <div class="title">
            <p class="red_title">Our Achievement</p>
            <h2 class="blue_sub_title">Certifications </h2>
            <svg class="line" width="90" height="9" viewBox="0 0 90 9" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M2.02431 7.09212C30.0244 6.09216 52.5242 0.592169 87.8787 2.46593" stroke="#02BB9A" stroke-width="3" stroke-linecap="round" />
            </svg>
        </div>
    </div>
    <div class="container">
        <div class="slider_bg">
            <section class="center slider" >
                @foreach($certificates as $cert)
                @php
                $cert_image = str_replace("/public","",url('/')).'/storage/'.$cert->image_path . $cert->image_name;
                @endphp
                <div>
                    <div class="cardd" style="border: 1px solid #cecece;">
                        <a onClick="openCertModal({{ $cert->id }})">
                            <img src="{{ $cert_image }}" alt="" style="height: 279px; object-fit:contain">
                        </a>
                    </div>
                </div>
                @endforeach
            </section>
        </div>
    </div>
</section>
@endif
@if($checkup_plan && $checkup_plan->count() > 0)
<section class="checkup_quotes padding_tb_100">
    <div class="container">
        <div class="title_max">
            <div class="title">
                <p class="red_title">Our Affordable</p>
                <h2 class="blue_sub_title">Health Checkup </h2>
                <svg class="line" width="90" height="9" viewBox="0 0 90 9" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M2.02431 7.09212C30.0244 6.09216 52.5242 0.592169 87.8787 2.46593" stroke="#02BB9A" stroke-width="3" stroke-linecap="round"></path>
                </svg>
                <p class="small_gray_text text-center">Plans For Your Good Health
                </p>
            </div>
        </div>
        <div class="pricing_slider">
            <div class="slick-slider-pricing">
                @foreach($checkup_plan as $key=>$plan)
                <div class="element element-{{$key}}" onclick="OpenPlanImg({{ $plan->id }})">
                    <div class="each_pricing">
                        <svg width="108" height="108" viewBox="0 0 108 108" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M25.5842 27.9629C10.0309 44.9472 18.5539 59.1325 23.3445 61.3722C21.9148 54.0925 20.4825 43.2667 31.9305 35.0548C47.5522 24.6542 51.5126 14.3408 50.1943 1.92847C45.1301 2.25168 40.2269 3.17305 35.561 4.62954C36.7506 13.7775 33.2717 21.2933 25.5842 27.9629Z" fill="#00904C" />
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M82.9357 27.9629C98.489 44.9472 89.966 59.1325 85.1754 61.3722C86.6064 54.0925 88.0374 43.2667 76.5907 35.0548C60.9676 24.6542 57.0072 14.3408 58.3256 1.92847C63.3898 2.25168 68.293 3.17305 72.9589 4.62954C71.7693 13.7775 75.2482 21.2933 82.9357 27.9629Z" fill="#00904C" />
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M25.7963 68.2309C13.5033 57.5527 8.47799 50.1053 13.1438 28.1225C-5.42973 42.2998 5.60658 66.9756 12.3365 74.6926C20.7938 84.4816 29.0995 90.5651 30.6579 100.862C36.0628 103.617 42.0134 105.452 48.3021 106.168C49.4568 88.43 39.2171 76.6399 25.7963 68.2309Z" fill="#ED1C24" />
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M82.7242 68.2307C95.0172 57.5525 100.043 50.1051 95.3766 28.1223C113.95 42.2996 102.914 66.9754 96.184 74.6924C87.7267 84.4814 79.421 90.5649 77.8612 100.862C72.4578 103.617 66.5071 105.452 60.2171 106.168C59.0637 88.4298 69.3034 76.6397 82.7242 68.2307Z" fill="#ED1C24" />
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M54.2595 72.7975C63.6623 72.7975 71.331 65.1288 71.331 55.726C71.331 46.3219 63.6623 38.6545 54.2595 38.6545C44.8567 38.6545 37.188 46.3232 37.188 55.726C37.188 65.1302 44.8567 72.7975 54.2595 72.7975Z" fill="#ED1C24" />
                        </svg>
                        <h4>
                            <span>
                                <svg width="11" height="18" viewBox="0 0 11 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M6.99853 4.48594C6.49297 3.42067 5.40964 2.68039 4.14575 2.68039H0.083252V0.874832H10.9166V2.68039H7.97353C8.40686 3.204 8.73186 3.81789 8.92144 4.48594H10.9166V6.2915H9.09297C8.86728 8.81928 6.73672 10.8054 4.14575 10.8054H3.48672L9.56242 17.1248H7.06172L0.98603 10.8054V8.99983H4.14575C5.73464 8.99983 7.0527 7.82622 7.26936 6.2915H0.083252V4.48594H6.99853Z" fill="#10357C" />
                                </svg>
                            </span>{{$plan->price}}
                        </h4>
                        <p>{{$plan->name}} </p>
                        @php $test = explode(",", $plan->test_type); @endphp
                        <!-- <div class="pricedata">
                            <div class="price_data_each">
                                @for($i=0; $i<(ceil(count($test) /2));$i++) <span>
                                    <svg width="18" height="19" viewBox="0 0 18 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <g clip-path="url(#clip0_2162_19642)">
                                            <path d="M14.797 3.19088C12.8195 4.90229 11.1466 6.53143 9.61494 8.65698C8.93947 9.59448 8.1883 10.6979 7.69728 11.7397C7.41697 12.2921 6.91166 13.1553 6.73939 13.9853C5.7972 13.1087 4.78517 12.1138 3.74971 11.3345C3.01166 10.7792 0.885877 11.9113 1.75119 12.5624C3.30205 13.7289 4.59181 15.1817 6.10025 16.4003C6.73119 16.9093 8.12947 15.8038 8.45806 15.3399C9.53666 13.8118 9.68408 11.9439 10.4702 10.277C11.6704 7.72768 13.799 5.63354 15.9006 3.81503C17.2931 2.51635 15.8549 2.27682 14.7991 3.19088" fill="#ED1C24" />
                                        </g>
                                        <defs>
                                            <clipPath id="clip0_2162_19642">
                                                <rect width="15" height="15" fill="white" transform="translate(1.5 2)" />
                                            </clipPath>
                                        </defs>
                                    </svg>
                                    @foreach($test_type as $type)
                                    @if($test[$i]==$type->id){{$type->test_name}} @endif
                                    @endforeach
                                    </span>
                                    @endfor
                            </div>
                            <div class="price_data_each">
                                @for($i=(ceil(count($test) /2)); $i<(count($test));$i++) <span>
                                    <svg width="18" height="19" viewBox="0 0 18 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <g clip-path="url(#clip0_2162_19642)">
                                            <path d="M14.797 3.19088C12.8195 4.90229 11.1466 6.53143 9.61494 8.65698C8.93947 9.59448 8.1883 10.6979 7.69728 11.7397C7.41697 12.2921 6.91166 13.1553 6.73939 13.9853C5.7972 13.1087 4.78517 12.1138 3.74971 11.3345C3.01166 10.7792 0.885877 11.9113 1.75119 12.5624C3.30205 13.7289 4.59181 15.1817 6.10025 16.4003C6.73119 16.9093 8.12947 15.8038 8.45806 15.3399C9.53666 13.8118 9.68408 11.9439 10.4702 10.277C11.6704 7.72768 13.799 5.63354 15.9006 3.81503C17.2931 2.51635 15.8549 2.27682 14.7991 3.19088" fill="#ED1C24" />
                                        </g>
                                        <defs>
                                            <clipPath id="clip0_2162_19642">
                                                <rect width="15" height="15" fill="white" transform="translate(1.5 2)" />
                                            </clipPath>
                                        </defs>
                                    </svg>
                                    @foreach($test_type as $type)
                                    @if($test[$i]==$type->id){{$type->test_name}} @endif
                                    @endforeach
                                    </span>
                                    @endfor
                            </div>
                        </div> -->
                        <div class="pp_learnmorebtn">
                            <a href="javascript:void(0)" class="btn btn-theme_blue">Know More<svg width="24" height="25" viewBox="0 0 24 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M4 5.5L11 12.5L4 19.5" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                    <path d="M12.5 5.5L19.5 12.5L12.5 19.5" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        <!-- <div class="d-flex justify-content-center mt-lg-5 mt-3">
            <a type="button" class="btn btn-green_block w-25" data-bs-toggle="modal" data-bs-target="#registerModal">
                Register Now
            </a>
        </div> -->
    </div>
</section>
@endif
<!-- Patients Speak start -->
@include('layouts.include.reviews')
<!-- Patients Speak end -->
@endsection
@section('script')
    <script src="https://formbuilder.online/assets/js/form-render.min.js"></script>
<script>
    // $(window).load(function() {
        // setTimeout(function() {
        // $('#myModal').modal('show');
        // }, 1000);
    // });
</script>
@endsection
