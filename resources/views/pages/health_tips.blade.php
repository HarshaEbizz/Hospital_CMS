@extends('layouts.master')
@section('content')
    <!-- first section -->
    <section class="page_heading_floor helth_section">
        <div class="container">
            <h1 class="helth_title">
                Health Tips
            </h1>
            <nav style="--bs-breadcrumb-divider: '>>';" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{url('/home')}}" class="text-dark">Home</a></li>
                    <li class="breadcrumb-item" aria-current="page">Health Information</li>
                    <li class="breadcrumb-item" aria-current="page">Health Tips</li>
                </ol>
                <p>
                </p>
                <a href="{{ url('/contact_us') }}" style="    display: inline-block;" class="green_btn">Contact us
                    <svg width="22" height="21" viewBox="0 0 25 24" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
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
    <section class="floor_content position-relative">
        <div class="container">
            <div>
                <ul class="nav nav-tabs do_nav_tab" id="myTab" role="tablist">
                    <li class="nav-item {{ request()->is('health_tips') ? 'active' : '' }}" role="presentation">
                        <a href="{{route('health_tips')}}" style="color: {{ (\Request::route()->getName() == 'health_tips') ? 'red' : 'black' }}">Health Tips</a>
                    </li>
                    <li class="nav-item {{ request()->is('statutory_compliance') ? 'active' : '' }}" role="presentation">
                        <a href="{{route('statutory_compliance')}}" style="color: {{ (\Request::route()->getName() == 'statutory_compliance') ? 'red' : 'black' }}">Statutory Compliance</a>
                    </li>
                </ul>
                @php
                    if ($tip) {
                        $image = str_replace('/public', '', url('/')) . '/storage/' . $tip->storage_path;
                } @endphp
                <div class="tab-content py-3" id="myTabContent">
                    <div class="tab-pane fade show active" id="ambulance" role="tabpanel" aria-labelledby="ambulance-tab">
                        <div class="amenities_box mb-5">
                            <div class="row">
                                <div class="col-lg-8 mt-4 mb-5">
                                    <div class="position-relative">
                                        <h2 class="blue_sub_title">{{ $tip->title_1 }}</h2>
                                        <svg class="line" width="90" height="9" viewBox="0 0 90 9" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path d="M2.02431 7.09212C30.0244 6.09216 52.5242 0.592169 87.8787 2.46593"
                                                stroke="#02BB9A" stroke-width="3" stroke-linecap="round">
                                            </path>
                                        </svg>
                                        {!! $tip->details_1 !!}
                                        {{-- <div class="care_list">
                                            <p>Incorporate fiber rich foods like beans, whole
                                                grains, Fruits, vegetables, nuts and seeds in
                                                your
                                                diet as they prevent over eating and help in
                                                proper
                                                absorption of nutrients, maintain healthy weight
                                                and
                                                also help prevent high cholesterol and blood
                                                sugar
                                                levels.</p>

                                            <p>Taking 1tbsp Flax-seeds everyday helps regulate
                                                Cholesterol and blood sugar levels and also
                                                helps
                                                prevent Arthritis due to its high fiber content
                                                and
                                                presence Omega 3 fatty acids</p>

                                            <p>Brown Rice is high in fiber, selenium and
                                                magnesium.
                                                It helps burn fat and satisfying appetite. It
                                                also
                                                helps maintain a healthy nervous system and
                                                lowers
                                                cholesterol.</p>

                                            <p>Take on teaspoon of cinnamon powder and one
                                                teaspoon
                                                of honey in a glass of lukewarm water and drink
                                                it
                                                empty stomach. It helps in weight loss.</p>

                                            <p>Soak one 5g-10g Fenugreek seeds (methi seeds)
                                                overnight in water and taking the seeds empty
                                                stomach in the morning helps regulate blood
                                                sugar
                                                levels and reducing triglycerides as it contains
                                                a
                                                specialized type of soluble fiber
                                                "Galactomannan"</p>

                                        </div> --}}
                                        <div class="care_bg_logo">
                                            <img src="assets/images/kiran_logo.png" alt="">

                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 mb-5">
                                    <img src="{{ $image }}{{ $tip->cover_image }}" alt="" class="w-100">
                                </div>

                                <div class="col-lg-6 mb-3">
                                    <div class="jus_texts">
                                        <!-- <p class="red_title">Specialities</p> -->
                                        <h2 class="blue_sub_title">{{ $tip->title_2 }}</h2>
                                        <svg class="line" width="90" height="9" viewBox="0 0 90 9" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path d="M2.02431 7.09212C30.0244 6.09216 52.5242 0.592169 87.8787 2.46593"
                                                stroke="#02BB9A" stroke-width="3" stroke-linecap="round"></path>
                                        </svg>
                                    </div>

                                    <div class="red_check_ul ul_li_image">
                                        {{-- <div class="price_data_each">

                                            <span>
                                                <svg width="18" height="19" viewBox="0 0 18 19" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <g clip-path="url(#clip0_2162_19642)">
                                                        <path
                                                            d="M14.797 3.19088C12.8195 4.90229 11.1466 6.53143 9.61494 8.65698C8.93947 9.59448 8.1883 10.6979 7.69728 11.7397C7.41697 12.2921 6.91166 13.1553 6.73939 13.9853C5.7972 13.1087 4.78517 12.1138 3.74971 11.3345C3.01166 10.7792 0.885877 11.9113 1.75119 12.5624C3.30205 13.7289 4.59181 15.1817 6.10025 16.4003C6.73119 16.9093 8.12947 15.8038 8.45806 15.3399C9.53666 13.8118 9.68408 11.9439 10.4702 10.277C11.6704 7.72768 13.799 5.63354 15.9006 3.81503C17.2931 2.51635 15.8549 2.27682 14.7991 3.19088"
                                                            fill="#ED1C24"></path>
                                                    </g>
                                                    <defs>
                                                        <clipPath id="clip0_2162_19642">
                                                            <rect width="15" height="15" fill="white"
                                                                transform="translate(1.5 2)">
                                                            </rect>
                                                        </clipPath>
                                                    </defs>
                                                </svg>
                                                <p>Avoid Table salt</p>
                                            </span>
                                            <span>
                                                <svg width="18" height="19" viewBox="0 0 18 19" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <g clip-path="url(#clip0_2162_19642)">
                                                        <path
                                                            d="M14.797 3.19088C12.8195 4.90229 11.1466 6.53143 9.61494 8.65698C8.93947 9.59448 8.1883 10.6979 7.69728 11.7397C7.41697 12.2921 6.91166 13.1553 6.73939 13.9853C5.7972 13.1087 4.78517 12.1138 3.74971 11.3345C3.01166 10.7792 0.885877 11.9113 1.75119 12.5624C3.30205 13.7289 4.59181 15.1817 6.10025 16.4003C6.73119 16.9093 8.12947 15.8038 8.45806 15.3399C9.53666 13.8118 9.68408 11.9439 10.4702 10.277C11.6704 7.72768 13.799 5.63354 15.9006 3.81503C17.2931 2.51635 15.8549 2.27682 14.7991 3.19088"
                                                            fill="#ED1C24"></path>
                                                    </g>
                                                    <defs>
                                                        <clipPath id="clip0_2162_19642">
                                                            <rect width="15" height="15" fill="white"
                                                                transform="translate(1.5 2)">
                                                            </rect>
                                                        </clipPath>
                                                    </defs>
                                                </svg>
                                                <p>Sugar consumption should not exceed more than 15g-20g/day
                                                    i.e 3tsp-4tsp/day</p>
                                            </span>
                                            <span>
                                                <svg width="18" height="19" viewBox="0 0 18 19" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <g clip-path="url(#clip0_2162_19642)">
                                                        <path
                                                            d="M14.797 3.19088C12.8195 4.90229 11.1466 6.53143 9.61494 8.65698C8.93947 9.59448 8.1883 10.6979 7.69728 11.7397C7.41697 12.2921 6.91166 13.1553 6.73939 13.9853C5.7972 13.1087 4.78517 12.1138 3.74971 11.3345C3.01166 10.7792 0.885877 11.9113 1.75119 12.5624C3.30205 13.7289 4.59181 15.1817 6.10025 16.4003C6.73119 16.9093 8.12947 15.8038 8.45806 15.3399C9.53666 13.8118 9.68408 11.9439 10.4702 10.277C11.6704 7.72768 13.799 5.63354 15.9006 3.81503C17.2931 2.51635 15.8549 2.27682 14.7991 3.19088"
                                                            fill="#ED1C24"></path>
                                                    </g>
                                                    <defs>
                                                        <clipPath id="clip0_2162_19642">
                                                            <rect width="15" height="15" fill="white"
                                                                transform="translate(1.5 2)">
                                                            </rect>
                                                        </clipPath>
                                                    </defs>
                                                </svg>
                                                <p>Fat consumption should not exceed 15g/day I.e 3tsp/day which
                                                    includes oil, butter and ghee</p>
                                            </span>
                                            <span>
                                                <svg width="18" height="19" viewBox="0 0 18 19" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <g clip-path="url(#clip0_2162_19642)">
                                                        <path
                                                            d="M14.797 3.19088C12.8195 4.90229 11.1466 6.53143 9.61494 8.65698C8.93947 9.59448 8.1883 10.6979 7.69728 11.7397C7.41697 12.2921 6.91166 13.1553 6.73939 13.9853C5.7972 13.1087 4.78517 12.1138 3.74971 11.3345C3.01166 10.7792 0.885877 11.9113 1.75119 12.5624C3.30205 13.7289 4.59181 15.1817 6.10025 16.4003C6.73119 16.9093 8.12947 15.8038 8.45806 15.3399C9.53666 13.8118 9.68408 11.9439 10.4702 10.277C11.6704 7.72768 13.799 5.63354 15.9006 3.81503C17.2931 2.51635 15.8549 2.27682 14.7991 3.19088"
                                                            fill="#ED1C24"></path>
                                                    </g>
                                                    <defs>
                                                        <clipPath id="clip0_2162_19642">
                                                            <rect width="15" height="15" fill="white"
                                                                transform="translate(1.5 2)">
                                                            </rect>
                                                        </clipPath>
                                                    </defs>
                                                </svg>
                                                <p>Consume 3-4 servings of vegetables/day and 2-3 servings of
                                                    fruits/day</p>
                                            </span>
                                            <span>
                                                <svg width="18" height="19" viewBox="0 0 18 19" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <g clip-path="url(#clip0_2162_19642)">
                                                        <path
                                                            d="M14.797 3.19088C12.8195 4.90229 11.1466 6.53143 9.61494 8.65698C8.93947 9.59448 8.1883 10.6979 7.69728 11.7397C7.41697 12.2921 6.91166 13.1553 6.73939 13.9853C5.7972 13.1087 4.78517 12.1138 3.74971 11.3345C3.01166 10.7792 0.885877 11.9113 1.75119 12.5624C3.30205 13.7289 4.59181 15.1817 6.10025 16.4003C6.73119 16.9093 8.12947 15.8038 8.45806 15.3399C9.53666 13.8118 9.68408 11.9439 10.4702 10.277C11.6704 7.72768 13.799 5.63354 15.9006 3.81503C17.2931 2.51635 15.8549 2.27682 14.7991 3.19088"
                                                            fill="#ED1C24"></path>
                                                    </g>
                                                    <defs>
                                                        <clipPath id="clip0_2162_19642">
                                                            <rect width="15" height="15" fill="white"
                                                                transform="translate(1.5 2)">
                                                            </rect>
                                                        </clipPath>
                                                    </defs>
                                                </svg>
                                                <p>Avoid smoking and excess consumption of alcohol</p>
                                            </span>
                                            <span>
                                                <svg width="18" height="19" viewBox="0 0 18 19" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <g clip-path="url(#clip0_2162_19642)">
                                                        <path
                                                            d="M14.797 3.19088C12.8195 4.90229 11.1466 6.53143 9.61494 8.65698C8.93947 9.59448 8.1883 10.6979 7.69728 11.7397C7.41697 12.2921 6.91166 13.1553 6.73939 13.9853C5.7972 13.1087 4.78517 12.1138 3.74971 11.3345C3.01166 10.7792 0.885877 11.9113 1.75119 12.5624C3.30205 13.7289 4.59181 15.1817 6.10025 16.4003C6.73119 16.9093 8.12947 15.8038 8.45806 15.3399C9.53666 13.8118 9.68408 11.9439 10.4702 10.277C11.6704 7.72768 13.799 5.63354 15.9006 3.81503C17.2931 2.51635 15.8549 2.27682 14.7991 3.19088"
                                                            fill="#ED1C24"></path>
                                                    </g>
                                                    <defs>
                                                        <clipPath id="clip0_2162_19642">
                                                            <rect width="15" height="15" fill="white"
                                                                transform="translate(1.5 2)">
                                                            </rect>
                                                        </clipPath>
                                                    </defs>
                                                </svg>
                                                <p>Exercise each day for at least half an hour to forty five minutes
                                                    as it helps reduce stress and anxiety.</p>
                                            </span>
                                        </div> --}}
                                        {!! $tip->details_2 !!}
                                    </div>
                                </div>


                                <div class="col-lg-6 mb-3">
                                    <div class="jus_texts">
                                        <!-- <p class="red_title">Specialities</p> -->
                                        <h2 class="blue_sub_title">{{ $tip->title_3 }}</h2>
                                        <svg class="line" width="90" height="9" viewBox="0 0 90 9"
                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M2.02431 7.09212C30.0244 6.09216 52.5242 0.592169 87.8787 2.46593"
                                                stroke="#02BB9A" stroke-width="3" stroke-linecap="round"></path>
                                        </svg>
                                    </div>

                                    <div class="red_check_ul ul_li_image">
                                        {{-- <div class="price_data_each">
                                            <div>
                                                <h6 class="blue_title">Fats</h6>
                                            </div>
                                            <span>
                                                <svg width="18" height="19" viewBox="0 0 18 19" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <g clip-path="url(#clip0_2162_19642)">
                                                        <path
                                                            d="M14.797 3.19088C12.8195 4.90229 11.1466 6.53143 9.61494 8.65698C8.93947 9.59448 8.1883 10.6979 7.69728 11.7397C7.41697 12.2921 6.91166 13.1553 6.73939 13.9853C5.7972 13.1087 4.78517 12.1138 3.74971 11.3345C3.01166 10.7792 0.885877 11.9113 1.75119 12.5624C3.30205 13.7289 4.59181 15.1817 6.10025 16.4003C6.73119 16.9093 8.12947 15.8038 8.45806 15.3399C9.53666 13.8118 9.68408 11.9439 10.4702 10.277C11.6704 7.72768 13.799 5.63354 15.9006 3.81503C17.2931 2.51635 15.8549 2.27682 14.7991 3.19088"
                                                            fill="#ED1C24"></path>
                                                    </g>
                                                    <defs>
                                                        <clipPath id="clip0_2162_19642">
                                                            <rect width="15" height="15" fill="white"
                                                                transform="translate(1.5 2)">
                                                            </rect>
                                                        </clipPath>
                                                    </defs>
                                                </svg>
                                                <p>Fat free: Less than 0.5 grams per serving</p>
                                            </span>
                                            <span>
                                                <svg width="18" height="19" viewBox="0 0 18 19" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <g clip-path="url(#clip0_2162_19642)">
                                                        <path
                                                            d="M14.797 3.19088C12.8195 4.90229 11.1466 6.53143 9.61494 8.65698C8.93947 9.59448 8.1883 10.6979 7.69728 11.7397C7.41697 12.2921 6.91166 13.1553 6.73939 13.9853C5.7972 13.1087 4.78517 12.1138 3.74971 11.3345C3.01166 10.7792 0.885877 11.9113 1.75119 12.5624C3.30205 13.7289 4.59181 15.1817 6.10025 16.4003C6.73119 16.9093 8.12947 15.8038 8.45806 15.3399C9.53666 13.8118 9.68408 11.9439 10.4702 10.277C11.6704 7.72768 13.799 5.63354 15.9006 3.81503C17.2931 2.51635 15.8549 2.27682 14.7991 3.19088"
                                                            fill="#ED1C24"></path>
                                                    </g>
                                                    <defs>
                                                        <clipPath id="clip0_2162_19642">
                                                            <rect width="15" height="15" fill="white"
                                                                transform="translate(1.5 2)">
                                                            </rect>
                                                        </clipPath>
                                                    </defs>
                                                </svg>
                                                <p>Low saturated fat: 1 gram or less per serving</p>
                                            </span>
                                            <span>
                                                <svg width="18" height="19" viewBox="0 0 18 19" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <g clip-path="url(#clip0_2162_19642)">
                                                        <path
                                                            d="M14.797 3.19088C12.8195 4.90229 11.1466 6.53143 9.61494 8.65698C8.93947 9.59448 8.1883 10.6979 7.69728 11.7397C7.41697 12.2921 6.91166 13.1553 6.73939 13.9853C5.7972 13.1087 4.78517 12.1138 3.74971 11.3345C3.01166 10.7792 0.885877 11.9113 1.75119 12.5624C3.30205 13.7289 4.59181 15.1817 6.10025 16.4003C6.73119 16.9093 8.12947 15.8038 8.45806 15.3399C9.53666 13.8118 9.68408 11.9439 10.4702 10.277C11.6704 7.72768 13.799 5.63354 15.9006 3.81503C17.2931 2.51635 15.8549 2.27682 14.7991 3.19088"
                                                            fill="#ED1C24"></path>
                                                    </g>
                                                    <defs>
                                                        <clipPath id="clip0_2162_19642">
                                                            <rect width="15" height="15" fill="white"
                                                                transform="translate(1.5 2)">
                                                            </rect>
                                                        </clipPath>
                                                    </defs>
                                                </svg>
                                                <p>Low fat: 3 grams or less per serving</p>
                                            </span>
                                            <span>
                                                <svg width="18" height="19" viewBox="0 0 18 19" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <g clip-path="url(#clip0_2162_19642)">
                                                        <path
                                                            d="M14.797 3.19088C12.8195 4.90229 11.1466 6.53143 9.61494 8.65698C8.93947 9.59448 8.1883 10.6979 7.69728 11.7397C7.41697 12.2921 6.91166 13.1553 6.73939 13.9853C5.7972 13.1087 4.78517 12.1138 3.74971 11.3345C3.01166 10.7792 0.885877 11.9113 1.75119 12.5624C3.30205 13.7289 4.59181 15.1817 6.10025 16.4003C6.73119 16.9093 8.12947 15.8038 8.45806 15.3399C9.53666 13.8118 9.68408 11.9439 10.4702 10.277C11.6704 7.72768 13.799 5.63354 15.9006 3.81503C17.2931 2.51635 15.8549 2.27682 14.7991 3.19088"
                                                            fill="#ED1C24"></path>
                                                    </g>
                                                    <defs>
                                                        <clipPath id="clip0_2162_19642">
                                                            <rect width="15" height="15" fill="white"
                                                                transform="translate(1.5 2)">
                                                            </rect>
                                                        </clipPath>
                                                    </defs>
                                                </svg>
                                                <p>Reduced Fat: At least 25% less fat than regular version</p>
                                            </span>
                                            <span>
                                                <svg width="18" height="19" viewBox="0 0 18 19" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <g clip-path="url(#clip0_2162_19642)">
                                                        <path
                                                            d="M14.797 3.19088C12.8195 4.90229 11.1466 6.53143 9.61494 8.65698C8.93947 9.59448 8.1883 10.6979 7.69728 11.7397C7.41697 12.2921 6.91166 13.1553 6.73939 13.9853C5.7972 13.1087 4.78517 12.1138 3.74971 11.3345C3.01166 10.7792 0.885877 11.9113 1.75119 12.5624C3.30205 13.7289 4.59181 15.1817 6.10025 16.4003C6.73119 16.9093 8.12947 15.8038 8.45806 15.3399C9.53666 13.8118 9.68408 11.9439 10.4702 10.277C11.6704 7.72768 13.799 5.63354 15.9006 3.81503C17.2931 2.51635 15.8549 2.27682 14.7991 3.19088"
                                                            fill="#ED1C24"></path>
                                                    </g>
                                                    <defs>
                                                        <clipPath id="clip0_2162_19642">
                                                            <rect width="15" height="15" fill="white"
                                                                transform="translate(1.5 2)">
                                                            </rect>
                                                        </clipPath>
                                                    </defs>
                                                </svg>
                                                <p>Light in fat: Half the fat of the regular version</p>
                                            </span>

                                            <div>
                                                <h6 class="blue_title">Calories</h6>
                                            </div>
                                            <span>
                                                <svg width="18" height="19" viewBox="0 0 18 19" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <g clip-path="url(#clip0_2162_19642)">
                                                        <path
                                                            d="M14.797 3.19088C12.8195 4.90229 11.1466 6.53143 9.61494 8.65698C8.93947 9.59448 8.1883 10.6979 7.69728 11.7397C7.41697 12.2921 6.91166 13.1553 6.73939 13.9853C5.7972 13.1087 4.78517 12.1138 3.74971 11.3345C3.01166 10.7792 0.885877 11.9113 1.75119 12.5624C3.30205 13.7289 4.59181 15.1817 6.10025 16.4003C6.73119 16.9093 8.12947 15.8038 8.45806 15.3399C9.53666 13.8118 9.68408 11.9439 10.4702 10.277C11.6704 7.72768 13.799 5.63354 15.9006 3.81503C17.2931 2.51635 15.8549 2.27682 14.7991 3.19088"
                                                            fill="#ED1C24"></path>
                                                    </g>
                                                    <defs>
                                                        <clipPath id="clip0_2162_19642">
                                                            <rect width="15" height="15" fill="white"
                                                                transform="translate(1.5 2)">
                                                            </rect>
                                                        </clipPath>
                                                    </defs>
                                                </svg>
                                                <p>Calorie free: Less than 5 calories per serving</p>
                                            </span>

                                            <span>
                                                <svg width="18" height="19" viewBox="0 0 18 19" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <g clip-path="url(#clip0_2162_19642)">
                                                        <path
                                                            d="M14.797 3.19088C12.8195 4.90229 11.1466 6.53143 9.61494 8.65698C8.93947 9.59448 8.1883 10.6979 7.69728 11.7397C7.41697 12.2921 6.91166 13.1553 6.73939 13.9853C5.7972 13.1087 4.78517 12.1138 3.74971 11.3345C3.01166 10.7792 0.885877 11.9113 1.75119 12.5624C3.30205 13.7289 4.59181 15.1817 6.10025 16.4003C6.73119 16.9093 8.12947 15.8038 8.45806 15.3399C9.53666 13.8118 9.68408 11.9439 10.4702 10.277C11.6704 7.72768 13.799 5.63354 15.9006 3.81503C17.2931 2.51635 15.8549 2.27682 14.7991 3.19088"
                                                            fill="#ED1C24"></path>
                                                    </g>
                                                    <defs>
                                                        <clipPath id="clip0_2162_19642">
                                                            <rect width="15" height="15" fill="white"
                                                                transform="translate(1.5 2)">
                                                            </rect>
                                                        </clipPath>
                                                    </defs>
                                                </svg>
                                                <p>Low calorie: 40 calories or less per serving</p>
                                            </span>

                                            <span>
                                                <svg width="18" height="19" viewBox="0 0 18 19" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <g clip-path="url(#clip0_2162_19642)">
                                                        <path
                                                            d="M14.797 3.19088C12.8195 4.90229 11.1466 6.53143 9.61494 8.65698C8.93947 9.59448 8.1883 10.6979 7.69728 11.7397C7.41697 12.2921 6.91166 13.1553 6.73939 13.9853C5.7972 13.1087 4.78517 12.1138 3.74971 11.3345C3.01166 10.7792 0.885877 11.9113 1.75119 12.5624C3.30205 13.7289 4.59181 15.1817 6.10025 16.4003C6.73119 16.9093 8.12947 15.8038 8.45806 15.3399C9.53666 13.8118 9.68408 11.9439 10.4702 10.277C11.6704 7.72768 13.799 5.63354 15.9006 3.81503C17.2931 2.51635 15.8549 2.27682 14.7991 3.19088"
                                                            fill="#ED1C24"></path>
                                                    </g>
                                                    <defs>
                                                        <clipPath id="clip0_2162_19642">
                                                            <rect width="15" height="15" fill="white"
                                                                transform="translate(1.5 2)">
                                                            </rect>
                                                        </clipPath>
                                                    </defs>
                                                </svg>
                                                <p>Reduced or less: At least 25% fewer calories than regular version</p>
                                            </span>
                                            <span>
                                                <svg width="18" height="19" viewBox="0 0 18 19" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <g clip-path="url(#clip0_2162_19642)">
                                                        <path
                                                            d="M14.797 3.19088C12.8195 4.90229 11.1466 6.53143 9.61494 8.65698C8.93947 9.59448 8.1883 10.6979 7.69728 11.7397C7.41697 12.2921 6.91166 13.1553 6.73939 13.9853C5.7972 13.1087 4.78517 12.1138 3.74971 11.3345C3.01166 10.7792 0.885877 11.9113 1.75119 12.5624C3.30205 13.7289 4.59181 15.1817 6.10025 16.4003C6.73119 16.9093 8.12947 15.8038 8.45806 15.3399C9.53666 13.8118 9.68408 11.9439 10.4702 10.277C11.6704 7.72768 13.799 5.63354 15.9006 3.81503C17.2931 2.51635 15.8549 2.27682 14.7991 3.19088"
                                                            fill="#ED1C24"></path>
                                                    </g>
                                                    <defs>
                                                        <clipPath id="clip0_2162_19642">
                                                            <rect width="15" height="15" fill="white"
                                                                transform="translate(1.5 2)">
                                                            </rect>
                                                        </clipPath>
                                                    </defs>
                                                </svg>
                                                <p>Light or lite: half the fat or a third of the calories of regular version
                                                </p>
                                            </span>


                                            <div>
                                                <h6 class="blue_title">Sodium</h6>
                                            </div>
                                            <span>
                                                <svg width="18" height="19" viewBox="0 0 18 19" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <g clip-path="url(#clip0_2162_19642)">
                                                        <path
                                                            d="M14.797 3.19088C12.8195 4.90229 11.1466 6.53143 9.61494 8.65698C8.93947 9.59448 8.1883 10.6979 7.69728 11.7397C7.41697 12.2921 6.91166 13.1553 6.73939 13.9853C5.7972 13.1087 4.78517 12.1138 3.74971 11.3345C3.01166 10.7792 0.885877 11.9113 1.75119 12.5624C3.30205 13.7289 4.59181 15.1817 6.10025 16.4003C6.73119 16.9093 8.12947 15.8038 8.45806 15.3399C9.53666 13.8118 9.68408 11.9439 10.4702 10.277C11.6704 7.72768 13.799 5.63354 15.9006 3.81503C17.2931 2.51635 15.8549 2.27682 14.7991 3.19088"
                                                            fill="#ED1C24"></path>
                                                    </g>
                                                    <defs>
                                                        <clipPath id="clip0_2162_19642">
                                                            <rect width="15" height="15" fill="white"
                                                                transform="translate(1.5 2)">
                                                            </rect>
                                                        </clipPath>
                                                    </defs>
                                                </svg>
                                                <p>Free or salt free: Less than 5 milligrams per serving</p>
                                            </span>
                                            <span>
                                                <svg width="18" height="19" viewBox="0 0 18 19" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <g clip-path="url(#clip0_2162_19642)">
                                                        <path
                                                            d="M14.797 3.19088C12.8195 4.90229 11.1466 6.53143 9.61494 8.65698C8.93947 9.59448 8.1883 10.6979 7.69728 11.7397C7.41697 12.2921 6.91166 13.1553 6.73939 13.9853C5.7972 13.1087 4.78517 12.1138 3.74971 11.3345C3.01166 10.7792 0.885877 11.9113 1.75119 12.5624C3.30205 13.7289 4.59181 15.1817 6.10025 16.4003C6.73119 16.9093 8.12947 15.8038 8.45806 15.3399C9.53666 13.8118 9.68408 11.9439 10.4702 10.277C11.6704 7.72768 13.799 5.63354 15.9006 3.81503C17.2931 2.51635 15.8549 2.27682 14.7991 3.19088"
                                                            fill="#ED1C24"></path>
                                                    </g>
                                                    <defs>
                                                        <clipPath id="clip0_2162_19642">
                                                            <rect width="15" height="15" fill="white"
                                                                transform="translate(1.5 2)">
                                                            </rect>
                                                        </clipPath>
                                                    </defs>
                                                </svg>
                                                <p>Very low sodium: 35 milligrams or less per serving</p>
                                            </span>

                                            <span>
                                                <svg width="18" height="19" viewBox="0 0 18 19" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <g clip-path="url(#clip0_2162_19642)">
                                                        <path
                                                            d="M14.797 3.19088C12.8195 4.90229 11.1466 6.53143 9.61494 8.65698C8.93947 9.59448 8.1883 10.6979 7.69728 11.7397C7.41697 12.2921 6.91166 13.1553 6.73939 13.9853C5.7972 13.1087 4.78517 12.1138 3.74971 11.3345C3.01166 10.7792 0.885877 11.9113 1.75119 12.5624C3.30205 13.7289 4.59181 15.1817 6.10025 16.4003C6.73119 16.9093 8.12947 15.8038 8.45806 15.3399C9.53666 13.8118 9.68408 11.9439 10.4702 10.277C11.6704 7.72768 13.799 5.63354 15.9006 3.81503C17.2931 2.51635 15.8549 2.27682 14.7991 3.19088"
                                                            fill="#ED1C24"></path>
                                                    </g>
                                                    <defs>
                                                        <clipPath id="clip0_2162_19642">
                                                            <rect width="15" height="15" fill="white"
                                                                transform="translate(1.5 2)">
                                                            </rect>
                                                        </clipPath>
                                                    </defs>
                                                </svg>
                                                <p>Low sodium: 140 milligrams or less per serving</p>
                                            </span>
                                            <span>
                                                <svg width="18" height="19" viewBox="0 0 18 19" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <g clip-path="url(#clip0_2162_19642)">
                                                        <path
                                                            d="M14.797 3.19088C12.8195 4.90229 11.1466 6.53143 9.61494 8.65698C8.93947 9.59448 8.1883 10.6979 7.69728 11.7397C7.41697 12.2921 6.91166 13.1553 6.73939 13.9853C5.7972 13.1087 4.78517 12.1138 3.74971 11.3345C3.01166 10.7792 0.885877 11.9113 1.75119 12.5624C3.30205 13.7289 4.59181 15.1817 6.10025 16.4003C6.73119 16.9093 8.12947 15.8038 8.45806 15.3399C9.53666 13.8118 9.68408 11.9439 10.4702 10.277C11.6704 7.72768 13.799 5.63354 15.9006 3.81503C17.2931 2.51635 15.8549 2.27682 14.7991 3.19088"
                                                            fill="#ED1C24"></path>
                                                    </g>
                                                    <defs>
                                                        <clipPath id="clip0_2162_19642">
                                                            <rect width="15" height="15" fill="white"
                                                                transform="translate(1.5 2)">
                                                            </rect>
                                                        </clipPath>
                                                    </defs>
                                                </svg>
                                                <p>Low sodium meal: 140 milligrams or less per 100 grams</p>
                                            </span>
                                            <span>
                                                <svg width="18" height="19" viewBox="0 0 18 19" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <g clip-path="url(#clip0_2162_19642)">
                                                        <path
                                                            d="M14.797 3.19088C12.8195 4.90229 11.1466 6.53143 9.61494 8.65698C8.93947 9.59448 8.1883 10.6979 7.69728 11.7397C7.41697 12.2921 6.91166 13.1553 6.73939 13.9853C5.7972 13.1087 4.78517 12.1138 3.74971 11.3345C3.01166 10.7792 0.885877 11.9113 1.75119 12.5624C3.30205 13.7289 4.59181 15.1817 6.10025 16.4003C6.73119 16.9093 8.12947 15.8038 8.45806 15.3399C9.53666 13.8118 9.68408 11.9439 10.4702 10.277C11.6704 7.72768 13.799 5.63354 15.9006 3.81503C17.2931 2.51635 15.8549 2.27682 14.7991 3.19088"
                                                            fill="#ED1C24"></path>
                                                    </g>
                                                    <defs>
                                                        <clipPath id="clip0_2162_19642">
                                                            <rect width="15" height="15" fill="white"
                                                                transform="translate(1.5 2)">
                                                            </rect>
                                                        </clipPath>
                                                    </defs>
                                                </svg>
                                                <p>Reduced or less: At least 25% less than regular version</p>
                                            </span>
                                            <span>
                                                <svg width="18" height="19" viewBox="0 0 18 19" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <g clip-path="url(#clip0_2162_19642)">
                                                        <path
                                                            d="M14.797 3.19088C12.8195 4.90229 11.1466 6.53143 9.61494 8.65698C8.93947 9.59448 8.1883 10.6979 7.69728 11.7397C7.41697 12.2921 6.91166 13.1553 6.73939 13.9853C5.7972 13.1087 4.78517 12.1138 3.74971 11.3345C3.01166 10.7792 0.885877 11.9113 1.75119 12.5624C3.30205 13.7289 4.59181 15.1817 6.10025 16.4003C6.73119 16.9093 8.12947 15.8038 8.45806 15.3399C9.53666 13.8118 9.68408 11.9439 10.4702 10.277C11.6704 7.72768 13.799 5.63354 15.9006 3.81503C17.2931 2.51635 15.8549 2.27682 14.7991 3.19088"
                                                            fill="#ED1C24"></path>
                                                    </g>
                                                    <defs>
                                                        <clipPath id="clip0_2162_19642">
                                                            <rect width="15" height="15" fill="white"
                                                                transform="translate(1.5 2)">
                                                            </rect>
                                                        </clipPath>
                                                    </defs>
                                                </svg>
                                                <p>Light in sodium: Half the sodium of the regular version</p>
                                            </span>
                                            <span>
                                                <svg width="18" height="19" viewBox="0 0 18 19" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <g clip-path="url(#clip0_2162_19642)">
                                                        <path
                                                            d="M14.797 3.19088C12.8195 4.90229 11.1466 6.53143 9.61494 8.65698C8.93947 9.59448 8.1883 10.6979 7.69728 11.7397C7.41697 12.2921 6.91166 13.1553 6.73939 13.9853C5.7972 13.1087 4.78517 12.1138 3.74971 11.3345C3.01166 10.7792 0.885877 11.9113 1.75119 12.5624C3.30205 13.7289 4.59181 15.1817 6.10025 16.4003C6.73119 16.9093 8.12947 15.8038 8.45806 15.3399C9.53666 13.8118 9.68408 11.9439 10.4702 10.277C11.6704 7.72768 13.799 5.63354 15.9006 3.81503C17.2931 2.51635 15.8549 2.27682 14.7991 3.19088"
                                                            fill="#ED1C24"></path>
                                                    </g>
                                                    <defs>
                                                        <clipPath id="clip0_2162_19642">
                                                            <rect width="15" height="15" fill="white"
                                                                transform="translate(1.5 2)">
                                                            </rect>
                                                        </clipPath>
                                                    </defs>
                                                </svg>
                                                <p>Unsalted or No salt added to the product: No salt added during processing
                                                </p>
                                            </span>

                                        </div> --}}
                                        {!! $tip->details_3 !!}
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="visit_circle_bg1"></div>
        <div class="visit_circle_bg2"></div>
    </section>
    <!-- second section end-->

    <!-- third section -->
    @include('layouts.include.map')
    <!-- third section end -->
@endsection
@section('script')
@endsection
