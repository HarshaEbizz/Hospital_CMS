@extends('layouts.master')
@section('content')
<!-- first section -->
<section class="page_heading social_section">
    <div class="container">
        <h1 class="social_title">
            Social media
        </h1>
        <nav style="--bs-breadcrumb-divider: '>>';" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{url('/home')}}" class="text-dark">Home</a></li>
                <li class="breadcrumb-item " aria-current="page">Social media </li>
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
        <div class="text-center pb-4 contact_us_details">
            <h2 class="blue_sub_title">All Social media </h2>
            <svg class="line" width="90" height="9" viewBox="0 0 90 9" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M2.02431 7.09212C30.0244 6.09216 52.5242 0.592169 87.8787 2.46593" stroke="#02BB9A" stroke-width="3" stroke-linecap="round"></path>
            </svg>
            <p></p>
        </div>
        <div class="row py-sm-5">
            <div class="col-lg-4 mb-4">
                <div class="social_img_hover">
                    <img src="{{ asset('assets/images/media1.png') }}" alt="" class="w-100">
                    <div class="overlay">
                        <div class="social_media_btn">
                            <a href="https://www.facebook.com/Kiran.Hospital2017/">
                                <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M16.7463 26.2465V16.0015H20.2025L20.7163 11.9902H16.7463V9.43521C16.7463 8.27771 17.0688 7.48521 18.73 7.48521H20.835V3.90896C19.8108 3.7992 18.7813 3.7462 17.7513 3.75021C14.6963 3.75021 12.5988 5.61521 12.5988 9.03896V11.9827H9.16504V15.994H12.6063V26.2465H16.7463Z" fill="white" />
                                </svg>
                                <div id="child-1">Facebook</div>
                            </a>
                        </div>
                        <div class="social_information">
                            <p>Clinical Trials Day Observes every year on May
                                20, 2022, by raising clinical trial awareness and
                                honoring clinical research professionals across
                                the globe.
                            </p>
                            <div class="d-sm-flex align-items-center justify-content-between pb-2">
                                <div>
                                    <a href="" class="social_green_btn" data-bs-toggle="modal" data-bs-target="#social_mod">Read More
                                        <svg width="22" height="21" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M8.2459 19.7589C7.94784 19.4667 7.92074 19.0095 8.16461 18.6873L8.2459 18.595L14.9734 12L8.2459 5.40503C7.94784 5.11283 7.92074 4.65558 8.16461 4.33338L8.2459 4.24106C8.54396 3.94887 9.01037 3.9223 9.33904 4.16137L9.43321 4.24106L16.7541 11.418C17.0522 11.7102 17.0793 12.1675 16.8354 12.4897L16.7541 12.582L9.43321 19.7589C9.10534 20.0804 8.57376 20.0804 8.2459 19.7589Z" fill="white" />
                                        </svg>
                                    </a>
                                </div>
                                <div class="d-flex align-items-center mt-sm-0 mt-3 justify-content-end">
                                    <div class="d-flex social_footer_text align-items-center">
                                        <svg width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <g clip-path="url(#clip0_1384_14323)">
                                                <path d="M11.1351 2.42188H2.96842C2.32409 2.42188 1.80176 2.94421 1.80176 3.58854V11.7552C1.80176 12.3995 2.32409 12.9219 2.96842 12.9219H11.1351C11.7794 12.9219 12.3018 12.3995 12.3018 11.7552V3.58854C12.3018 2.94421 11.7794 2.42188 11.1351 2.42188Z" stroke="#02BB9A" stroke-linecap="round" stroke-linejoin="round" />
                                                <path d="M9.38477 1.25781V3.59115" stroke="#02BB9A" stroke-linecap="round" stroke-linejoin="round" />
                                                <path d="M4.71875 1.25781V3.59115" stroke="#02BB9A" stroke-linecap="round" stroke-linejoin="round" />
                                                <path d="M1.80176 5.92188H12.3018" stroke="#02BB9A" stroke-linecap="round" stroke-linejoin="round" />
                                            </g>
                                            <defs>
                                                <clipPath id="clip0_1384_14323">
                                                    <rect width="14" height="14" fill="white" transform="translate(0.0517578 0.0898438)" />
                                                </clipPath>
                                            </defs>
                                        </svg>
                                        <p class="mb-0 mx-2">20th May 2022</p>
                                    </div>
                                    <div class="d-flex social_footer_text align-items-center">
                                        <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M12.1566 2.69023C11.8586 2.39215 11.5049 2.15569 11.1155 1.99436C10.7262 1.83304 10.3089 1.75 9.88741 1.75C9.46596 1.75 9.04863 1.83304 8.65928 1.99436C8.26993 2.15569 7.91618 2.39215 7.61824 2.69023L6.99991 3.30857L6.38157 2.69023C5.77975 2.08841 4.96351 1.75031 4.11241 1.75031C3.2613 1.75031 2.44506 2.08841 1.84324 2.69023C1.24142 3.29205 0.90332 4.1083 0.90332 4.9594C0.90332 5.8105 1.24142 6.62674 1.84324 7.22857L2.46157 7.8469L6.99991 12.3852L11.5382 7.8469L12.1566 7.22857C12.4547 6.93062 12.6911 6.57687 12.8524 6.18752C13.0138 5.79817 13.0968 5.38085 13.0968 4.9594C13.0968 4.53795 13.0138 4.12063 12.8524 3.73127C12.6911 3.34192 12.4547 2.98817 12.1566 2.69023V2.69023Z" stroke="#02BB9A" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                        <p class="mb-0 mx-2">11</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 mb-4">
                <div class="social_img_hover">
                    <img src="{{ asset('assets/images/media2.png') }}" alt="" class="w-100">
                    <div class="overlay">
                        <div class="social_media_btn">
                            <a href="https://www.facebook.com/Kiran.Hospital2017/">
                                <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M16.7463 26.2465V16.0015H20.2025L20.7163 11.9902H16.7463V9.43521C16.7463 8.27771 17.0688 7.48521 18.73 7.48521H20.835V3.90896C19.8108 3.7992 18.7813 3.7462 17.7513 3.75021C14.6963 3.75021 12.5988 5.61521 12.5988 9.03896V11.9827H9.16504V15.994H12.6063V26.2465H16.7463Z" fill="white" />
                                </svg>
                                <div id="child-1">Facebook</div>
                            </a>
                        </div>
                        <div class="social_information">
                            <p>Clinical Trials Day Observes every year on May
                                20, 2022, by raising clinical trial awareness and
                                honoring clinical research professionals across
                                the globe.
                            </p>
                            <div class="d-sm-flex align-items-center justify-content-between pb-2">
                                <div>
                                    <a href="" class="social_green_btn" data-bs-toggle="modal" data-bs-target="#social_mod">Read More
                                        <svg width="22" height="21" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M8.2459 19.7589C7.94784 19.4667 7.92074 19.0095 8.16461 18.6873L8.2459 18.595L14.9734 12L8.2459 5.40503C7.94784 5.11283 7.92074 4.65558 8.16461 4.33338L8.2459 4.24106C8.54396 3.94887 9.01037 3.9223 9.33904 4.16137L9.43321 4.24106L16.7541 11.418C17.0522 11.7102 17.0793 12.1675 16.8354 12.4897L16.7541 12.582L9.43321 19.7589C9.10534 20.0804 8.57376 20.0804 8.2459 19.7589Z" fill="white" />
                                        </svg>
                                    </a>
                                </div>
                                <div class="d-flex align-items-center mt-sm-0 mt-3 justify-content-end">
                                    <div class="d-flex social_footer_text align-items-center">
                                        <svg width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <g clip-path="url(#clip0_1384_14323)">
                                                <path d="M11.1351 2.42188H2.96842C2.32409 2.42188 1.80176 2.94421 1.80176 3.58854V11.7552C1.80176 12.3995 2.32409 12.9219 2.96842 12.9219H11.1351C11.7794 12.9219 12.3018 12.3995 12.3018 11.7552V3.58854C12.3018 2.94421 11.7794 2.42188 11.1351 2.42188Z" stroke="#02BB9A" stroke-linecap="round" stroke-linejoin="round" />
                                                <path d="M9.38477 1.25781V3.59115" stroke="#02BB9A" stroke-linecap="round" stroke-linejoin="round" />
                                                <path d="M4.71875 1.25781V3.59115" stroke="#02BB9A" stroke-linecap="round" stroke-linejoin="round" />
                                                <path d="M1.80176 5.92188H12.3018" stroke="#02BB9A" stroke-linecap="round" stroke-linejoin="round" />
                                            </g>
                                            <defs>
                                                <clipPath id="clip0_1384_14323">
                                                    <rect width="14" height="14" fill="white" transform="translate(0.0517578 0.0898438)" />
                                                </clipPath>
                                            </defs>
                                        </svg>
                                        <p class="mb-0 mx-2">20th May 2022</p>
                                    </div>
                                    <div class="d-flex social_footer_text align-items-center">
                                        <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M12.1566 2.69023C11.8586 2.39215 11.5049 2.15569 11.1155 1.99436C10.7262 1.83304 10.3089 1.75 9.88741 1.75C9.46596 1.75 9.04863 1.83304 8.65928 1.99436C8.26993 2.15569 7.91618 2.39215 7.61824 2.69023L6.99991 3.30857L6.38157 2.69023C5.77975 2.08841 4.96351 1.75031 4.11241 1.75031C3.2613 1.75031 2.44506 2.08841 1.84324 2.69023C1.24142 3.29205 0.90332 4.1083 0.90332 4.9594C0.90332 5.8105 1.24142 6.62674 1.84324 7.22857L2.46157 7.8469L6.99991 12.3852L11.5382 7.8469L12.1566 7.22857C12.4547 6.93062 12.6911 6.57687 12.8524 6.18752C13.0138 5.79817 13.0968 5.38085 13.0968 4.9594C13.0968 4.53795 13.0138 4.12063 12.8524 3.73127C12.6911 3.34192 12.4547 2.98817 12.1566 2.69023V2.69023Z" stroke="#02BB9A" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                        <p class="mb-0 mx-2">11</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 mb-4">
                <div class="social_img_hover">
                    <img src="{{ asset('assets/images/media3.png') }}" alt="" class="w-100">
                    <div class="overlay">
                        <div class="social_media_btn">
                            <a href="https://www.facebook.com/Kiran.Hospital2017/">
                                <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M16.7463 26.2465V16.0015H20.2025L20.7163 11.9902H16.7463V9.43521C16.7463 8.27771 17.0688 7.48521 18.73 7.48521H20.835V3.90896C19.8108 3.7992 18.7813 3.7462 17.7513 3.75021C14.6963 3.75021 12.5988 5.61521 12.5988 9.03896V11.9827H9.16504V15.994H12.6063V26.2465H16.7463Z" fill="white" />
                                </svg>
                                <div id="child-1">Facebook</div>
                            </a>
                        </div>
                        <div class="social_information">
                            <p>Clinical Trials Day Observes every year on May
                                20, 2022, by raising clinical trial awareness and
                                honoring clinical research professionals across
                                the globe.
                            </p>
                            <div class="d-sm-flex align-items-center justify-content-between pb-2">
                                <div>
                                    <a href="" class="social_green_btn" data-bs-toggle="modal" data-bs-target="#social_mod">Read More
                                        <svg width="22" height="21" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M8.2459 19.7589C7.94784 19.4667 7.92074 19.0095 8.16461 18.6873L8.2459 18.595L14.9734 12L8.2459 5.40503C7.94784 5.11283 7.92074 4.65558 8.16461 4.33338L8.2459 4.24106C8.54396 3.94887 9.01037 3.9223 9.33904 4.16137L9.43321 4.24106L16.7541 11.418C17.0522 11.7102 17.0793 12.1675 16.8354 12.4897L16.7541 12.582L9.43321 19.7589C9.10534 20.0804 8.57376 20.0804 8.2459 19.7589Z" fill="white" />
                                        </svg>
                                    </a>
                                </div>
                                <div class="d-flex align-items-center mt-sm-0 mt-3 justify-content-end">
                                    <div class="d-flex social_footer_text align-items-center">
                                        <svg width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <g clip-path="url(#clip0_1384_14323)">
                                                <path d="M11.1351 2.42188H2.96842C2.32409 2.42188 1.80176 2.94421 1.80176 3.58854V11.7552C1.80176 12.3995 2.32409 12.9219 2.96842 12.9219H11.1351C11.7794 12.9219 12.3018 12.3995 12.3018 11.7552V3.58854C12.3018 2.94421 11.7794 2.42188 11.1351 2.42188Z" stroke="#02BB9A" stroke-linecap="round" stroke-linejoin="round" />
                                                <path d="M9.38477 1.25781V3.59115" stroke="#02BB9A" stroke-linecap="round" stroke-linejoin="round" />
                                                <path d="M4.71875 1.25781V3.59115" stroke="#02BB9A" stroke-linecap="round" stroke-linejoin="round" />
                                                <path d="M1.80176 5.92188H12.3018" stroke="#02BB9A" stroke-linecap="round" stroke-linejoin="round" />
                                            </g>
                                            <defs>
                                                <clipPath id="clip0_1384_14323">
                                                    <rect width="14" height="14" fill="white" transform="translate(0.0517578 0.0898438)" />
                                                </clipPath>
                                            </defs>
                                        </svg>
                                        <p class="mb-0 mx-2">20th May 2022</p>
                                    </div>
                                    <div class="d-flex social_footer_text align-items-center">
                                        <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M12.1566 2.69023C11.8586 2.39215 11.5049 2.15569 11.1155 1.99436C10.7262 1.83304 10.3089 1.75 9.88741 1.75C9.46596 1.75 9.04863 1.83304 8.65928 1.99436C8.26993 2.15569 7.91618 2.39215 7.61824 2.69023L6.99991 3.30857L6.38157 2.69023C5.77975 2.08841 4.96351 1.75031 4.11241 1.75031C3.2613 1.75031 2.44506 2.08841 1.84324 2.69023C1.24142 3.29205 0.90332 4.1083 0.90332 4.9594C0.90332 5.8105 1.24142 6.62674 1.84324 7.22857L2.46157 7.8469L6.99991 12.3852L11.5382 7.8469L12.1566 7.22857C12.4547 6.93062 12.6911 6.57687 12.8524 6.18752C13.0138 5.79817 13.0968 5.38085 13.0968 4.9594C13.0968 4.53795 13.0138 4.12063 12.8524 3.73127C12.6911 3.34192 12.4547 2.98817 12.1566 2.69023V2.69023Z" stroke="#02BB9A" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                        <p class="mb-0 mx-2">11</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 mb-4">
                <div class="social_img_hover">
                    <img src="{{ asset('assets/images/media4.png') }}" alt="" class="w-100">
                    <div class="overlay">
                        <div class="social_media_btn">
                            <a href="https://www.facebook.com/Kiran.Hospital2017/">
                                <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M16.7463 26.2465V16.0015H20.2025L20.7163 11.9902H16.7463V9.43521C16.7463 8.27771 17.0688 7.48521 18.73 7.48521H20.835V3.90896C19.8108 3.7992 18.7813 3.7462 17.7513 3.75021C14.6963 3.75021 12.5988 5.61521 12.5988 9.03896V11.9827H9.16504V15.994H12.6063V26.2465H16.7463Z" fill="white" />
                                </svg>
                                <div id="child-1">Facebook</div>
                            </a>
                        </div>
                        <div class="social_information">
                            <p>Clinical Trials Day Observes every year on May
                                20, 2022, by raising clinical trial awareness and
                                honoring clinical research professionals across
                                the globe.
                            </p>
                            <div class="d-sm-flex align-items-center justify-content-between pb-2">
                                <div>
                                    <a href="" class="social_green_btn" data-bs-toggle="modal" data-bs-target="#social_mod">Read More
                                        <svg width="22" height="21" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M8.2459 19.7589C7.94784 19.4667 7.92074 19.0095 8.16461 18.6873L8.2459 18.595L14.9734 12L8.2459 5.40503C7.94784 5.11283 7.92074 4.65558 8.16461 4.33338L8.2459 4.24106C8.54396 3.94887 9.01037 3.9223 9.33904 4.16137L9.43321 4.24106L16.7541 11.418C17.0522 11.7102 17.0793 12.1675 16.8354 12.4897L16.7541 12.582L9.43321 19.7589C9.10534 20.0804 8.57376 20.0804 8.2459 19.7589Z" fill="white" />
                                        </svg>
                                    </a>
                                </div>
                                <div class="d-flex align-items-center mt-sm-0 mt-3 justify-content-end">
                                    <div class="d-flex social_footer_text align-items-center">
                                        <svg width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <g clip-path="url(#clip0_1384_14323)">
                                                <path d="M11.1351 2.42188H2.96842C2.32409 2.42188 1.80176 2.94421 1.80176 3.58854V11.7552C1.80176 12.3995 2.32409 12.9219 2.96842 12.9219H11.1351C11.7794 12.9219 12.3018 12.3995 12.3018 11.7552V3.58854C12.3018 2.94421 11.7794 2.42188 11.1351 2.42188Z" stroke="#02BB9A" stroke-linecap="round" stroke-linejoin="round" />
                                                <path d="M9.38477 1.25781V3.59115" stroke="#02BB9A" stroke-linecap="round" stroke-linejoin="round" />
                                                <path d="M4.71875 1.25781V3.59115" stroke="#02BB9A" stroke-linecap="round" stroke-linejoin="round" />
                                                <path d="M1.80176 5.92188H12.3018" stroke="#02BB9A" stroke-linecap="round" stroke-linejoin="round" />
                                            </g>
                                            <defs>
                                                <clipPath id="clip0_1384_14323">
                                                    <rect width="14" height="14" fill="white" transform="translate(0.0517578 0.0898438)" />
                                                </clipPath>
                                            </defs>
                                        </svg>
                                        <p class="mb-0 mx-2">20th May 2022</p>
                                    </div>
                                    <div class="d-flex social_footer_text align-items-center">
                                        <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M12.1566 2.69023C11.8586 2.39215 11.5049 2.15569 11.1155 1.99436C10.7262 1.83304 10.3089 1.75 9.88741 1.75C9.46596 1.75 9.04863 1.83304 8.65928 1.99436C8.26993 2.15569 7.91618 2.39215 7.61824 2.69023L6.99991 3.30857L6.38157 2.69023C5.77975 2.08841 4.96351 1.75031 4.11241 1.75031C3.2613 1.75031 2.44506 2.08841 1.84324 2.69023C1.24142 3.29205 0.90332 4.1083 0.90332 4.9594C0.90332 5.8105 1.24142 6.62674 1.84324 7.22857L2.46157 7.8469L6.99991 12.3852L11.5382 7.8469L12.1566 7.22857C12.4547 6.93062 12.6911 6.57687 12.8524 6.18752C13.0138 5.79817 13.0968 5.38085 13.0968 4.9594C13.0968 4.53795 13.0138 4.12063 12.8524 3.73127C12.6911 3.34192 12.4547 2.98817 12.1566 2.69023V2.69023Z" stroke="#02BB9A" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                        <p class="mb-0 mx-2">11</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 mb-4">
                <div class="social_img_hover">
                    <img src="{{ asset('assets/images/media5.png') }}" alt="" class="w-100">
                    <div class="overlay">
                        <div class="social_media_btn">
                            <a href="https://www.facebook.com/Kiran.Hospital2017/">
                                <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M16.7463 26.2465V16.0015H20.2025L20.7163 11.9902H16.7463V9.43521C16.7463 8.27771 17.0688 7.48521 18.73 7.48521H20.835V3.90896C19.8108 3.7992 18.7813 3.7462 17.7513 3.75021C14.6963 3.75021 12.5988 5.61521 12.5988 9.03896V11.9827H9.16504V15.994H12.6063V26.2465H16.7463Z" fill="white" />
                                </svg>
                                <div id="child-1">Facebook</div>
                            </a>
                        </div>
                        <div class="social_information">
                            <p>Clinical Trials Day Observes every year on May
                                20, 2022, by raising clinical trial awareness and
                                honoring clinical research professionals across
                                the globe.
                            </p>
                            <div class="d-sm-flex align-items-center justify-content-between pb-2">
                                <div>
                                    <a href="" class="social_green_btn" data-bs-toggle="modal" data-bs-target="#social_mod">Read More
                                        <svg width="22" height="21" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M8.2459 19.7589C7.94784 19.4667 7.92074 19.0095 8.16461 18.6873L8.2459 18.595L14.9734 12L8.2459 5.40503C7.94784 5.11283 7.92074 4.65558 8.16461 4.33338L8.2459 4.24106C8.54396 3.94887 9.01037 3.9223 9.33904 4.16137L9.43321 4.24106L16.7541 11.418C17.0522 11.7102 17.0793 12.1675 16.8354 12.4897L16.7541 12.582L9.43321 19.7589C9.10534 20.0804 8.57376 20.0804 8.2459 19.7589Z" fill="white" />
                                        </svg>
                                    </a>
                                </div>
                                <div class="d-flex align-items-center mt-sm-0 mt-3 justify-content-end">
                                    <div class="d-flex social_footer_text align-items-center">
                                        <svg width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <g clip-path="url(#clip0_1384_14323)">
                                                <path d="M11.1351 2.42188H2.96842C2.32409 2.42188 1.80176 2.94421 1.80176 3.58854V11.7552C1.80176 12.3995 2.32409 12.9219 2.96842 12.9219H11.1351C11.7794 12.9219 12.3018 12.3995 12.3018 11.7552V3.58854C12.3018 2.94421 11.7794 2.42188 11.1351 2.42188Z" stroke="#02BB9A" stroke-linecap="round" stroke-linejoin="round" />
                                                <path d="M9.38477 1.25781V3.59115" stroke="#02BB9A" stroke-linecap="round" stroke-linejoin="round" />
                                                <path d="M4.71875 1.25781V3.59115" stroke="#02BB9A" stroke-linecap="round" stroke-linejoin="round" />
                                                <path d="M1.80176 5.92188H12.3018" stroke="#02BB9A" stroke-linecap="round" stroke-linejoin="round" />
                                            </g>
                                            <defs>
                                                <clipPath id="clip0_1384_14323">
                                                    <rect width="14" height="14" fill="white" transform="translate(0.0517578 0.0898438)" />
                                                </clipPath>
                                            </defs>
                                        </svg>
                                        <p class="mb-0 mx-2">20th May 2022</p>
                                    </div>
                                    <div class="d-flex social_footer_text align-items-center">
                                        <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M12.1566 2.69023C11.8586 2.39215 11.5049 2.15569 11.1155 1.99436C10.7262 1.83304 10.3089 1.75 9.88741 1.75C9.46596 1.75 9.04863 1.83304 8.65928 1.99436C8.26993 2.15569 7.91618 2.39215 7.61824 2.69023L6.99991 3.30857L6.38157 2.69023C5.77975 2.08841 4.96351 1.75031 4.11241 1.75031C3.2613 1.75031 2.44506 2.08841 1.84324 2.69023C1.24142 3.29205 0.90332 4.1083 0.90332 4.9594C0.90332 5.8105 1.24142 6.62674 1.84324 7.22857L2.46157 7.8469L6.99991 12.3852L11.5382 7.8469L12.1566 7.22857C12.4547 6.93062 12.6911 6.57687 12.8524 6.18752C13.0138 5.79817 13.0968 5.38085 13.0968 4.9594C13.0968 4.53795 13.0138 4.12063 12.8524 3.73127C12.6911 3.34192 12.4547 2.98817 12.1566 2.69023V2.69023Z" stroke="#02BB9A" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                        <p class="mb-0 mx-2">11</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 mb-4">
                <div class="social_img_hover">
                    <img src="{{ asset('assets/images/media6.png') }}" alt="" class="w-100">
                    <div class="overlay">
                        <div class="social_media_btn">
                            <a href="https://www.facebook.com/Kiran.Hospital2017/">
                                <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M16.7463 26.2465V16.0015H20.2025L20.7163 11.9902H16.7463V9.43521C16.7463 8.27771 17.0688 7.48521 18.73 7.48521H20.835V3.90896C19.8108 3.7992 18.7813 3.7462 17.7513 3.75021C14.6963 3.75021 12.5988 5.61521 12.5988 9.03896V11.9827H9.16504V15.994H12.6063V26.2465H16.7463Z" fill="white" />
                                </svg>
                                <div id="child-1">Facebook</div>
                            </a>
                        </div>
                        <div class="social_information">
                            <p>Clinical Trials Day Observes every year on May
                                20, 2022, by raising clinical trial awareness and
                                honoring clinical research professionals across
                                the globe.
                            </p>
                            <div class="d-sm-flex align-items-center justify-content-between pb-2">
                                <div>
                                    <a href="" class="social_green_btn" data-bs-toggle="modal" data-bs-target="#social_mod">Read More
                                        <svg width="22" height="21" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M8.2459 19.7589C7.94784 19.4667 7.92074 19.0095 8.16461 18.6873L8.2459 18.595L14.9734 12L8.2459 5.40503C7.94784 5.11283 7.92074 4.65558 8.16461 4.33338L8.2459 4.24106C8.54396 3.94887 9.01037 3.9223 9.33904 4.16137L9.43321 4.24106L16.7541 11.418C17.0522 11.7102 17.0793 12.1675 16.8354 12.4897L16.7541 12.582L9.43321 19.7589C9.10534 20.0804 8.57376 20.0804 8.2459 19.7589Z" fill="white" />
                                        </svg>
                                    </a>
                                </div>
                                <div class="d-flex align-items-center mt-sm-0 mt-3 justify-content-end">
                                    <div class="d-flex social_footer_text align-items-center">
                                        <svg width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <g clip-path="url(#clip0_1384_14323)">
                                                <path d="M11.1351 2.42188H2.96842C2.32409 2.42188 1.80176 2.94421 1.80176 3.58854V11.7552C1.80176 12.3995 2.32409 12.9219 2.96842 12.9219H11.1351C11.7794 12.9219 12.3018 12.3995 12.3018 11.7552V3.58854C12.3018 2.94421 11.7794 2.42188 11.1351 2.42188Z" stroke="#02BB9A" stroke-linecap="round" stroke-linejoin="round" />
                                                <path d="M9.38477 1.25781V3.59115" stroke="#02BB9A" stroke-linecap="round" stroke-linejoin="round" />
                                                <path d="M4.71875 1.25781V3.59115" stroke="#02BB9A" stroke-linecap="round" stroke-linejoin="round" />
                                                <path d="M1.80176 5.92188H12.3018" stroke="#02BB9A" stroke-linecap="round" stroke-linejoin="round" />
                                            </g>
                                            <defs>
                                                <clipPath id="clip0_1384_14323">
                                                    <rect width="14" height="14" fill="white" transform="translate(0.0517578 0.0898438)" />
                                                </clipPath>
                                            </defs>
                                        </svg>
                                        <p class="mb-0 mx-2">20th May 2022</p>
                                    </div>
                                    <div class="d-flex social_footer_text align-items-center">
                                        <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M12.1566 2.69023C11.8586 2.39215 11.5049 2.15569 11.1155 1.99436C10.7262 1.83304 10.3089 1.75 9.88741 1.75C9.46596 1.75 9.04863 1.83304 8.65928 1.99436C8.26993 2.15569 7.91618 2.39215 7.61824 2.69023L6.99991 3.30857L6.38157 2.69023C5.77975 2.08841 4.96351 1.75031 4.11241 1.75031C3.2613 1.75031 2.44506 2.08841 1.84324 2.69023C1.24142 3.29205 0.90332 4.1083 0.90332 4.9594C0.90332 5.8105 1.24142 6.62674 1.84324 7.22857L2.46157 7.8469L6.99991 12.3852L11.5382 7.8469L12.1566 7.22857C12.4547 6.93062 12.6911 6.57687 12.8524 6.18752C13.0138 5.79817 13.0968 5.38085 13.0968 4.9594C13.0968 4.53795 13.0138 4.12063 12.8524 3.73127C12.6911 3.34192 12.4547 2.98817 12.1566 2.69023V2.69023Z" stroke="#02BB9A" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                        <p class="mb-0 mx-2">11</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 mb-4">
                <div class="social_img_hover">
                    <img src="{{ asset('assets/images/media7.png') }}" alt="" class="w-100">
                    <div class="overlay">
                        <div class="social_media_btn">
                            <a href="https://www.facebook.com/Kiran.Hospital2017/">
                                <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M16.7463 26.2465V16.0015H20.2025L20.7163 11.9902H16.7463V9.43521C16.7463 8.27771 17.0688 7.48521 18.73 7.48521H20.835V3.90896C19.8108 3.7992 18.7813 3.7462 17.7513 3.75021C14.6963 3.75021 12.5988 5.61521 12.5988 9.03896V11.9827H9.16504V15.994H12.6063V26.2465H16.7463Z" fill="white" />
                                </svg>
                                <div id="child-1">Facebook</div>
                            </a>
                        </div>
                        <div class="social_information">
                            <p>Clinical Trials Day Observes every year on May
                                20, 2022, by raising clinical trial awareness and
                                honoring clinical research professionals across
                                the globe.
                            </p>
                            <div class="d-sm-flex align-items-center justify-content-between pb-2">
                                <div>
                                    <a href="" class="social_green_btn" data-bs-toggle="modal" data-bs-target="#social_mod">Read More
                                        <svg width="22" height="21" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M8.2459 19.7589C7.94784 19.4667 7.92074 19.0095 8.16461 18.6873L8.2459 18.595L14.9734 12L8.2459 5.40503C7.94784 5.11283 7.92074 4.65558 8.16461 4.33338L8.2459 4.24106C8.54396 3.94887 9.01037 3.9223 9.33904 4.16137L9.43321 4.24106L16.7541 11.418C17.0522 11.7102 17.0793 12.1675 16.8354 12.4897L16.7541 12.582L9.43321 19.7589C9.10534 20.0804 8.57376 20.0804 8.2459 19.7589Z" fill="white" />
                                        </svg>
                                    </a>
                                </div>
                                <div class="d-flex align-items-center mt-sm-0 mt-3 justify-content-end">
                                    <div class="d-flex social_footer_text align-items-center">
                                        <svg width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <g clip-path="url(#clip0_1384_14323)">
                                                <path d="M11.1351 2.42188H2.96842C2.32409 2.42188 1.80176 2.94421 1.80176 3.58854V11.7552C1.80176 12.3995 2.32409 12.9219 2.96842 12.9219H11.1351C11.7794 12.9219 12.3018 12.3995 12.3018 11.7552V3.58854C12.3018 2.94421 11.7794 2.42188 11.1351 2.42188Z" stroke="#02BB9A" stroke-linecap="round" stroke-linejoin="round" />
                                                <path d="M9.38477 1.25781V3.59115" stroke="#02BB9A" stroke-linecap="round" stroke-linejoin="round" />
                                                <path d="M4.71875 1.25781V3.59115" stroke="#02BB9A" stroke-linecap="round" stroke-linejoin="round" />
                                                <path d="M1.80176 5.92188H12.3018" stroke="#02BB9A" stroke-linecap="round" stroke-linejoin="round" />
                                            </g>
                                            <defs>
                                                <clipPath id="clip0_1384_14323">
                                                    <rect width="14" height="14" fill="white" transform="translate(0.0517578 0.0898438)" />
                                                </clipPath>
                                            </defs>
                                        </svg>
                                        <p class="mb-0 mx-2">20th May 2022</p>
                                    </div>
                                    <div class="d-flex social_footer_text align-items-center">
                                        <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M12.1566 2.69023C11.8586 2.39215 11.5049 2.15569 11.1155 1.99436C10.7262 1.83304 10.3089 1.75 9.88741 1.75C9.46596 1.75 9.04863 1.83304 8.65928 1.99436C8.26993 2.15569 7.91618 2.39215 7.61824 2.69023L6.99991 3.30857L6.38157 2.69023C5.77975 2.08841 4.96351 1.75031 4.11241 1.75031C3.2613 1.75031 2.44506 2.08841 1.84324 2.69023C1.24142 3.29205 0.90332 4.1083 0.90332 4.9594C0.90332 5.8105 1.24142 6.62674 1.84324 7.22857L2.46157 7.8469L6.99991 12.3852L11.5382 7.8469L12.1566 7.22857C12.4547 6.93062 12.6911 6.57687 12.8524 6.18752C13.0138 5.79817 13.0968 5.38085 13.0968 4.9594C13.0968 4.53795 13.0138 4.12063 12.8524 3.73127C12.6911 3.34192 12.4547 2.98817 12.1566 2.69023V2.69023Z" stroke="#02BB9A" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                        <p class="mb-0 mx-2">11</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 mb-4">
                <div class="social_img_hover">
                    <img src="{{ asset('assets/images/media8.png') }}" alt="" class="w-100">
                    <div class="overlay">
                        <div class="social_media_btn">
                            <a href="https://www.facebook.com/Kiran.Hospital2017/">
                                <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M16.7463 26.2465V16.0015H20.2025L20.7163 11.9902H16.7463V9.43521C16.7463 8.27771 17.0688 7.48521 18.73 7.48521H20.835V3.90896C19.8108 3.7992 18.7813 3.7462 17.7513 3.75021C14.6963 3.75021 12.5988 5.61521 12.5988 9.03896V11.9827H9.16504V15.994H12.6063V26.2465H16.7463Z" fill="white" />
                                </svg>
                                <div id="child-1">Facebook</div>
                            </a>
                        </div>
                        <div class="social_information">
                            <p>Clinical Trials Day Observes every year on May
                                20, 2022, by raising clinical trial awareness and
                                honoring clinical research professionals across
                                the globe.
                            </p>
                            <div class="d-sm-flex align-items-center justify-content-between pb-2">
                                <div>
                                    <a href="" class="social_green_btn" data-bs-toggle="modal" data-bs-target="#social_mod">Read More
                                        <svg width="22" height="21" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M8.2459 19.7589C7.94784 19.4667 7.92074 19.0095 8.16461 18.6873L8.2459 18.595L14.9734 12L8.2459 5.40503C7.94784 5.11283 7.92074 4.65558 8.16461 4.33338L8.2459 4.24106C8.54396 3.94887 9.01037 3.9223 9.33904 4.16137L9.43321 4.24106L16.7541 11.418C17.0522 11.7102 17.0793 12.1675 16.8354 12.4897L16.7541 12.582L9.43321 19.7589C9.10534 20.0804 8.57376 20.0804 8.2459 19.7589Z" fill="white" />
                                        </svg>
                                    </a>
                                </div>
                                <div class="d-flex align-items-center mt-sm-0 mt-3 justify-content-end">
                                    <div class="d-flex social_footer_text align-items-center">
                                        <svg width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <g clip-path="url(#clip0_1384_14323)">
                                                <path d="M11.1351 2.42188H2.96842C2.32409 2.42188 1.80176 2.94421 1.80176 3.58854V11.7552C1.80176 12.3995 2.32409 12.9219 2.96842 12.9219H11.1351C11.7794 12.9219 12.3018 12.3995 12.3018 11.7552V3.58854C12.3018 2.94421 11.7794 2.42188 11.1351 2.42188Z" stroke="#02BB9A" stroke-linecap="round" stroke-linejoin="round" />
                                                <path d="M9.38477 1.25781V3.59115" stroke="#02BB9A" stroke-linecap="round" stroke-linejoin="round" />
                                                <path d="M4.71875 1.25781V3.59115" stroke="#02BB9A" stroke-linecap="round" stroke-linejoin="round" />
                                                <path d="M1.80176 5.92188H12.3018" stroke="#02BB9A" stroke-linecap="round" stroke-linejoin="round" />
                                            </g>
                                            <defs>
                                                <clipPath id="clip0_1384_14323">
                                                    <rect width="14" height="14" fill="white" transform="translate(0.0517578 0.0898438)" />
                                                </clipPath>
                                            </defs>
                                        </svg>
                                        <p class="mb-0 mx-2">20th May 2022</p>
                                    </div>
                                    <div class="d-flex social_footer_text align-items-center">
                                        <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M12.1566 2.69023C11.8586 2.39215 11.5049 2.15569 11.1155 1.99436C10.7262 1.83304 10.3089 1.75 9.88741 1.75C9.46596 1.75 9.04863 1.83304 8.65928 1.99436C8.26993 2.15569 7.91618 2.39215 7.61824 2.69023L6.99991 3.30857L6.38157 2.69023C5.77975 2.08841 4.96351 1.75031 4.11241 1.75031C3.2613 1.75031 2.44506 2.08841 1.84324 2.69023C1.24142 3.29205 0.90332 4.1083 0.90332 4.9594C0.90332 5.8105 1.24142 6.62674 1.84324 7.22857L2.46157 7.8469L6.99991 12.3852L11.5382 7.8469L12.1566 7.22857C12.4547 6.93062 12.6911 6.57687 12.8524 6.18752C13.0138 5.79817 13.0968 5.38085 13.0968 4.9594C13.0968 4.53795 13.0138 4.12063 12.8524 3.73127C12.6911 3.34192 12.4547 2.98817 12.1566 2.69023V2.69023Z" stroke="#02BB9A" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                        <p class="mb-0 mx-2">11</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 mb-4">
                <div class="social_img_hover">
                    <img src="{{ asset('assets/images/media9.png') }}" alt="" class="w-100">
                    <div class="overlay">
                        <div class="social_media_btn">
                            <a href="https://www.facebook.com/Kiran.Hospital2017/">
                                <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M16.7463 26.2465V16.0015H20.2025L20.7163 11.9902H16.7463V9.43521C16.7463 8.27771 17.0688 7.48521 18.73 7.48521H20.835V3.90896C19.8108 3.7992 18.7813 3.7462 17.7513 3.75021C14.6963 3.75021 12.5988 5.61521 12.5988 9.03896V11.9827H9.16504V15.994H12.6063V26.2465H16.7463Z" fill="white" />
                                </svg>
                                <div id="child-1">Facebook</div>
                            </a>
                        </div>
                        <div class="social_information">
                            <p>Clinical Trials Day Observes every year on May
                                20, 2022, by raising clinical trial awareness and
                                honoring clinical research professionals across
                                the globe.
                            </p>
                            <div class="d-sm-flex align-items-center justify-content-between pb-2">
                                <div>
                                    <a href="" class="social_green_btn" data-bs-toggle="modal" data-bs-target="#social_mod">Read More
                                        <svg width="22" height="21" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M8.2459 19.7589C7.94784 19.4667 7.92074 19.0095 8.16461 18.6873L8.2459 18.595L14.9734 12L8.2459 5.40503C7.94784 5.11283 7.92074 4.65558 8.16461 4.33338L8.2459 4.24106C8.54396 3.94887 9.01037 3.9223 9.33904 4.16137L9.43321 4.24106L16.7541 11.418C17.0522 11.7102 17.0793 12.1675 16.8354 12.4897L16.7541 12.582L9.43321 19.7589C9.10534 20.0804 8.57376 20.0804 8.2459 19.7589Z" fill="white" />
                                        </svg>
                                    </a>
                                </div>
                                <div class="d-flex align-items-center mt-sm-0 mt-3 justify-content-end">
                                    <div class="d-flex social_footer_text align-items-center">
                                        <svg width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <g clip-path="url(#clip0_1384_14323)">
                                                <path d="M11.1351 2.42188H2.96842C2.32409 2.42188 1.80176 2.94421 1.80176 3.58854V11.7552C1.80176 12.3995 2.32409 12.9219 2.96842 12.9219H11.1351C11.7794 12.9219 12.3018 12.3995 12.3018 11.7552V3.58854C12.3018 2.94421 11.7794 2.42188 11.1351 2.42188Z" stroke="#02BB9A" stroke-linecap="round" stroke-linejoin="round" />
                                                <path d="M9.38477 1.25781V3.59115" stroke="#02BB9A" stroke-linecap="round" stroke-linejoin="round" />
                                                <path d="M4.71875 1.25781V3.59115" stroke="#02BB9A" stroke-linecap="round" stroke-linejoin="round" />
                                                <path d="M1.80176 5.92188H12.3018" stroke="#02BB9A" stroke-linecap="round" stroke-linejoin="round" />
                                            </g>
                                            <defs>
                                                <clipPath id="clip0_1384_14323">
                                                    <rect width="14" height="14" fill="white" transform="translate(0.0517578 0.0898438)" />
                                                </clipPath>
                                            </defs>
                                        </svg>
                                        <p class="mb-0 mx-2">20th May 2022</p>
                                    </div>
                                    <div class="d-flex social_footer_text align-items-center">
                                        <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M12.1566 2.69023C11.8586 2.39215 11.5049 2.15569 11.1155 1.99436C10.7262 1.83304 10.3089 1.75 9.88741 1.75C9.46596 1.75 9.04863 1.83304 8.65928 1.99436C8.26993 2.15569 7.91618 2.39215 7.61824 2.69023L6.99991 3.30857L6.38157 2.69023C5.77975 2.08841 4.96351 1.75031 4.11241 1.75031C3.2613 1.75031 2.44506 2.08841 1.84324 2.69023C1.24142 3.29205 0.90332 4.1083 0.90332 4.9594C0.90332 5.8105 1.24142 6.62674 1.84324 7.22857L2.46157 7.8469L6.99991 12.3852L11.5382 7.8469L12.1566 7.22857C12.4547 6.93062 12.6911 6.57687 12.8524 6.18752C13.0138 5.79817 13.0968 5.38085 13.0968 4.9594C13.0968 4.53795 13.0138 4.12063 12.8524 3.73127C12.6911 3.34192 12.4547 2.98817 12.1566 2.69023V2.69023Z" stroke="#02BB9A" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                        <p class="mb-0 mx-2">11</p>
                                    </div>
                                </div>
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
@endsection