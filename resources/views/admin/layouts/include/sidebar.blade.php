@php
$setting = App\Models\Setting::get();
$LOGO = collect($setting)->where('setting_key', 'HOSPITAL_LOGO')->first();
if($LOGO && $LOGO->status){
$image = str_replace("/public","",url('/')).'/storage/'.$LOGO->setting_value;
}else{
$image = asset('admin_assets/images/kiranimage/logo_2.png');
}
@endphp
<!-- Page Sidebar Start-->
<div class="sidebar-wrapper">
    <div>
        <div class="logo-wrapper">
            <a href="{{ route('admin.home') }}">
                <img class="img-fluid for-light" src="{{ $image }}" alt="">
                <img class="img-fluid for-dark" src="{{ $image }}" alt="">
            </a>
            <div class="toggle-sidebar">
                <i class="status_toggle middle sidebar-toggle" data-feather="grid"></i>
            </div>
        </div>
        <div class="logo-icon-wrapper">
            <a href="{{ route('admin.home') }}">
                <img class="img-fluid" src="{{ asset('admin_assets/images/kiranimage/small.png') }}" alt="">
            </a>
        </div>
        <nav class="sidebar-main">
            <div class="left-arrow" id="left-arrow"><i data-feather="arrow-left"></i></div>
            <div id="sidebar-menu">
                <ul class="sidebar-links" id="simple-bar">

                    <li class="sidebar-list">
                        <a class="sidebar-link sidebar-title link-nav {{ Request::routeIs('admin.home') ? 'actives' : '' }}" href="{{ route('admin.home') }}">
                            <i data-feather="grid"> </i>
                            <span>Dashboard</span>
                        </a>
                    </li>

                    <li class="sidebar-list">
                        <a class="sidebar-link sidebar-title link-nav {{ Request::routeIs('admin.about_us.*') ||  (\Request::is('admin/about_us*')) ? 'actives' : '' }}  " href="{{ route('admin.about_us.index') }}">
                            <i data-feather="at-sign"> </i>
                            <span>About Us</span>
                        </a>
                    </li>

                    <li class="sidebar-list">
                        <a class="sidebar-link sidebar-title {{ Request::isCurrentRoute(['admin.home_content.*','admin.slider.*', 'admin.certificates.*','admin.event.*']) ? 'actives' : '' }}" href="javascript:void(0)">
                            <i data-feather="home"></i>
                            <span>Home</span>
                        </a>
                        <ul class="sidebar-submenu {{ Request::isCurrentRoute(['admin.slider.*', 'admin.certificates.*', 'admin.home_content.*','admin.event.*']) ? 'show sidebar-side' : '' }}">
                            <li class="{{ Request::routeIs('admin.home_content.*') ? 'actives' : '' }}">
                                <a href="{{ route('admin.home_content.index') }}">Home content</a>
                            </li>
                            <li class="{{ Request::routeIs('admin.slider.*') ? 'actives' : '' }}">
                                <a href="{{ route('admin.slider.index') }}">Manage Slider Images</a>
                            </li>
                            <li class="{{ Request::routeIs('admin.certificates.*') ? 'actives' : '' }}">
                                <a href="{{ route('admin.certificates.index') }}">Manage Achievment Certifications</a>
                            </li>
                            <li class="{{ Request::routeIs('admin.event.*') ? 'actives' : '' }}">
                                <a href="{{ route('admin.event.index') }}">
                                    <span>Registration Forms</span>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="sidebar-list">
                        <a class="sidebar-link {{ Request::routeIs('admin.specialities.*') ? 'actives' : '' }} sidebar-title link-nav" href="{{ route('admin.specialities.index') }}">
                            <i data-feather="layers"> </i>
                            <span>Specialities</span>
                        </a>
                    </li>

                    <li class="sidebar-list">
                        <a class="sidebar-link sidebar-title {{ Request::isCurrentRoute(['admin.doctor.*', 'admin.doctor_list', 'admin.cluster.*', 'admin.department.*']) ? 'actives' : '' }}" href="javascript:void(0)">
                            <i data-feather="user-plus"></i>
                            <span>Doctors</span>
                        </a>
                        <ul class="sidebar-submenu {{ Request::isCurrentRoute(['admin.doctor.*', 'admin.doctor_list', 'admin.cluster.*', 'admin.department.*']) ? 'show sidebar-side' : '' }}">
                            <li class="{{ Request::routeIs('admin.doctor.*') ? 'actives' : '' }}">
                                <a href="{{ route('admin.doctor.index') }}">Doctor's Profiles</a>
                            </li>
                            <!-- <li class="{{ Request::routeIs('admin.doctor_list') ? 'actives' : '' }}">
                                <a href="{{ route('admin.doctor_list') }}">Doctor's List</a>
                            </li> -->
                            <li class="{{ Request::routeIs('admin.cluster.*') ? 'actives' : '' }}">
                                <a href="{{ route('admin.cluster.index') }}">Manage Cluster</a>
                            </li>
                            <li class="{{ Request::routeIs('admin.department.*') ? 'actives' : '' }}">
                                <a href="{{ route('admin.department.index') }}">Manage Department</a>
                            </li>
                        </ul>
                    </li>

                    <li class="sidebar-list">
                        <a class="sidebar-link sidebar-title  {{ Request::isCurrentRoute(['admin.test_type.*', 'admin.sub_test_type.*', 'admin.health_checkup_plan.*']) ? 'actives' : '' }}" href="javascript:void(0)">
                            <i data-feather="activity"></i>
                            <span>Health CheckUp Plan</span>
                        </a>
                        <ul class="sidebar-submenu {{ Request::isCurrentRoute(['admin.test_type.*', 'admin.sub_test_type.*', 'admin.health_checkup_plan.*']) ? 'show sidebar-side' : '' }}">
                            <li class="{{ Request::routeIs('admin.test_type.*') ? 'actives' : '' }}">
                                <a href="{{ route('admin.test_type.index') }}">Test type</a>
                            </li>
                            <!-- <li class="{{ Request::routeIs('admin.sub_test_type.*') ? 'actives' : '' }}">
                                <a href="{{ route('admin.sub_test_type.index') }}">Sub test type</a>
                            </li> -->
                            <li class="{{ Request::routeIs('admin.health_checkup_plan.*') ? 'actives' : '' }}">
                                <a href="{{ route('admin.health_checkup_plan.index') }}">CheckUp Plan</a>
                            </li>
                        </ul>
                    </li>

                    <li class="sidebar-list">
                        <a class="sidebar-link sidebar-title  {{ Request::isCurrentRoute(['admin.floors.*', 'admin.wings.*', 'admin.sections.*', 'admin.room_categories.*', 'admin.rooms.*', 'admin.floor_plans.*', 'admin.patients_guide_service.*', 'admin.hospital_timelines.*', 'admin.hosp_tour.*', 'admin.international_patient_care.*', 'admin.goverment_scheme.*', 'admin.tieup.*','admin.tpa_tieup_index','admin.visiting_hours.index','admin.dos_donts.index','admin.patients_responsibilities.index']) ? 'actives' : '' }}" href="javascript:void(0)">
                            <i data-feather="users"></i>
                            <span>Patients & Visitors</span>
                        </a>
                        <ul class="sidebar-submenu {{ Request::isCurrentRoute(['admin.floors.*', 'admin.wings.*', 'admin.sections.*', 'admin.room_categories.*', 'admin.rooms.*', 'admin.floor_plans.*', 'admin.patients_guide_service.*', 'admin.hospital_timelines.*', 'admin.hosp_tour.*', 'admin.international_patient_care.*', 'admin.goverment_scheme.*', 'admin.tieup.*','admin.tpa_tieup_index','admin.visiting_hours.index','admin.dos_donts.index','admin.patients_responsibilities.index']) ? 'show sidebar-side' : '' }}">
                            <li class="{{ Request::routeIs('admin.floors.*') ? 'actives' : '' }}">
                                <a href="{{ route('admin.floors.index') }}">Manage Floors</a>
                            </li>
                            <li class="{{ Request::routeIs('admin.wings.*') ? 'actives' : '' }}">
                                <a href="{{ route('admin.wings.index') }}">Manage Wings</a>
                            </li>
                            <li class="{{ Request::routeIs('admin.sections.*') ? 'actives' : '' }}">
                                <a href="{{ route('admin.sections.index') }}">Manage Sections</a>
                            </li>
                            <li class="{{ Request::routeIs('admin.room_categories.*') ? 'actives' : '' }}">
                                <a href="{{ route('admin.room_categories.index') }}">Manage Room Categories</a>
                            </li>
                            <li class="{{ Request::routeIs('admin.rooms.*') ? 'actives' : '' }}">
                                <a href="{{ route('admin.rooms.index') }}"> Manage Rooms</a>
                            </li>
                            <li class="{{ Request::routeIs('admin.floor_plans.*') ? 'actives' : '' }}">
                                <a href="{{ route('admin.floor_plans.index') }}">Manage Floor Plans</a>
                            </li>
                            <li class="{{ Request::routeIs(['admin.patients_guide_service.*','admin.visiting_hours.index','admin.dos_donts.index','admin.patients_responsibilities.index']) ? 'actives' : '' }}">
                                <a href="{{ route('admin.patients_guide_service.index') }}">Patients Guide & Services</a>
                            </li>
                            <li class="{{ Request::routeIs('admin.hospital_timelines.*') ? 'actives' : '' }}">
                                <a href="{{ route('admin.hospital_timelines.index') }}"> Manage Hospital Timeline</a>
                            </li>
                            <li class="{{ Request::routeIs('admin.hosp_tour.*') ? 'actives' : '' }}">
                                <a href="{{ route('admin.hosp_tour.index') }}">Hospital Tour video</a>
                            </li>
                            <li class="{{ Request::routeIs('admin.international_patient_care.*') ? 'actives' : '' }}">
                                <a href="{{ route('admin.international_patient_care.index') }}">International Patient Care</a>
                            </li>
                            <li class="{{ Request::routeIs('admin.tieup.*') ? 'actives' : '' }}">
                                <a href="{{route('admin.tieup.index')}}">Empanelled Corporates</a>
                            </li>
                            <li class="{{ Request::routeIs('admin.tpa_tieup_index') ? 'actives' : '' }}">
                                <a href="{{route('admin.tpa_tieup_index')}}">TPA & Cashless Tie-Ups</a>
                            </li>
                            <li class="{{ Request::routeIs('admin.goverment_scheme.*') ? 'actives' : '' }}">
                                <a href="{{route('admin.goverment_scheme.index')}}">Goverment Schemes</a>
                            </li>
                        </ul>
                    </li>

                    <li class="sidebar-list">
                        <a class="sidebar-link sidebar-title link-nav {{ Request::routeIs('admin.clinic.*') ? 'actives' : '' }}" href="{{ route('admin.clinic.index') }}">
                            <i data-feather="airplay"> </i>
                            <span>Speciality Clinic</span>
                        </a>
                    </li>

                    <li class="sidebar-list">
                        <a class="sidebar-link sidebar-title link-nav {{ Request::routeIs('admin.enquiry.*') ? 'actives' : '' }}" href="{{ route('admin.enquiry.index') }}">
                            <i data-feather="phone-incoming"> </i>
                            <span>Enquiry</span>
                        </a>
                    </li>

                    {{--<li class="sidebar-list">
                        <a class="sidebar-link sidebar-title link-nav {{ Request::routeIs('admin.event.*') ? 'actives' : '' }}" href="{{ route('admin.event.index') }}">
                            <i data-feather="wind"> </i>
                            <span>Event Manage</span>
                        </a>
                    </li>--}}

                    <li class="sidebar-list">
                        <a class="sidebar-link sidebar-title {{ Request::isCurrentRoute(['admin.faq.*', 'admin.terms_and_condition.*']) ? 'actives' : '' }}" href="javascript:void(0)">
                            <i data-feather="file-minus"></i>
                            <span>CMS</span>
                        </a>
                        <ul class="sidebar-submenu {{ Request::isCurrentRoute(['admin.faq.*', 'admin.terms_and_condition.*']) ? 'show sidebar-side' : '' }}">
                            <li class="{{ Request::routeIs('admin.faq.*') ? 'actives ' : '' }}">
                                <a href="{{ route('admin.faq.index') }}">FAQ's</a>
                            </li>
                            <li class="{{ Request::routeIs('admin.terms_and_condition.*') ? 'actives ' : '' }}">
                                <a href="{{ route('admin.terms_and_condition.index') }}">Terms And Conditions</a>
                            </li>
                        </ul>
                    </li>

                    <li class="sidebar-list">
                        <a class="sidebar-link sidebar-title  {{ Request::routeIs('admin.contact_us.*') ? 'actives' : '' }}" href="javascript:void(0)">
                            <i data-feather="phone"></i>
                            <span>Contact us</span>
                        </a>
                        <ul class="sidebar-submenu {{ Request::routeIs('admin.contact_us.*') ? 'show sidebar-side' : '' }}">
                            <li class="{{ Request::routeIs('admin.contact_us.index') ? 'actives' : '' }}">
                                <a href="{{ route('admin.contact_us.index') }}">Manage Page</a>
                            </li>
                            <li class="{{ Request::routeIs('admin.contact_us.create') ? 'actives' : '' }}">
                                <a href="{{ route('admin.contact_us.create') }}">Inquiries</a>
                            </li>
                        </ul>
                    </li>

                    <li class="sidebar-list">
                        <a class="sidebar-link sidebar-title  {{ Request::isCurrentRoute(['admin.careers.*', 'admin.job_apply_index']) ? 'actives' : '' }}" href="javascript:void(0)">
                            <i data-feather="briefcase"></i>
                            <span>Careers</span>
                        </a>
                        <ul class="sidebar-submenu {{ Request::isCurrentRoute(['admin.careers.*', 'admin.job_apply_index', 'admin.job_apply_list','admin.job_apply_view']) ? 'show sidebar-side' : '' }}">
                            <li class="{{ Request::routeIs('admin.careers.*') ? 'actives ' : '' }}">
                                <a href="{{ route('admin.careers.index') }}">Job Post</a>
                            </li>
                            <li class="{{ Request::routeIs('admin.job_apply_index') ? 'actives ' : '' }}">
                                <a href="{{ route('admin.job_apply_index') }}">Job applier list</a>
                            </li>
                        </ul>
                    </li>

                    {{-- <li class="sidebar-list">
                        <a class="sidebar-link sidebar-title {{ Request::isCurrentRoute(['admin.health.*', 'admin.statutory_compliance_index']) ? 'actives' : '' }}" href="javascript:void(0)">
                            <i data-feather="heart"></i>
                            <span>Health Information</span>
                        </a>
                        <ul class="sidebar-submenu {{ Request::isCurrentRoute(['admin.health.*', 'admin.statutory_compliance_index']) ? 'show sidebar-side' : '' }}">
                            <li class="{{ Request::routeIs('admin.health.*') ? 'actives' : '' }}">
                                <a href="{{ route('admin.health.index') }}">Health Tips</a>
                            </li>
                            <li class="{{ Request::routeIs('admin.statutory_compliance_index') ? 'actives' : '' }}">
                                <a href="{{ route('admin.statutory_compliance_index') }}">Statutory Compliance</a>
                            </li>
                        </ul>
                    </li> --}}
                    <li class="sidebar-list">
                        <a class="sidebar-link sidebar-title link-nav {{ Request::routeIs('admin.health.*') ? 'actives' : '' }}" href="{{ route('admin.health.index') }}">
                            <i data-feather="heart"> </i>
                            <span>Health Information</span>
                        </a>
                    </li>


                    <li class="sidebar-list">
                        <a class="sidebar-link sidebar-title link-nav {{ Request::routeIs('admin.patient_reviews.*') ? 'actives' : '' }}" href="{{ route('admin.patient_reviews.index') }}">
                            <i data-feather="edit-3"> </i>
                            <span>Patient reviews </span>
                        </a>
                    </li>

                    {{-- <li class="sidebar-list">
                        <a class="sidebar-link sidebar-title link-nav {{ Request::routeIs('admin.news_and_updates.*') ? 'actives' : '' }}" href="{{ route('admin.news_and_updates.index') }}">
                            <i data-feather="layout"> </i>
                            <span>News And Media</span>
                        </a>
                    </li> --}}

                    {{-- <li class="sidebar-list">
                        <a class="sidebar-link sidebar-title link-nav {{ Request::routeIs('admin.clinic.*') ? 'actives' : '' }}" href="{{ route('admin.clinic.index') }}">
                            <i data-feather="at-sign"> </i>
                            <span>Speciality Clinic</span>
                        </a>
                    </li> --}}

                    {{-- <li class="sidebar-list">
                        <a class="sidebar-link sidebar-title link-nav {{ Request::routeIs('admin.photo_gallery.*') ? 'actives' : '' }}" href="{{ route('admin.photo_gallery.index')}}">
                            <i data-feather="aperture"> </i>
                            <span>Photo Gallery</span>
                        </a>
                    </li> --}}

                    <li class="sidebar-list">
                        <a class="sidebar-link sidebar-title {{ Request::isCurrentRoute(['admin.photo_gallery.*', 'admin.news_and_updates.*','admin.medic.*']) ? 'actives' : '' }}" href="javascript:void(0)">
                            <i data-feather="menu"></i>
                            <span>More</span>
                        </a>
                        <ul class="sidebar-submenu {{ Request::isCurrentRoute(['admin.photo_gallery.*', 'admin.news_and_updates.*','admin.medic.*']) ? 'show sidebar-side' : '' }}">
                            <li class="{{ Request::routeIs('admin.medic.*') ? 'actives' : '' }}">
                                <a href="{{ route('admin.medic.index') }}">Kiran Academics</a>
                            </li>
                            <li class="{{ Request::routeIs('admin.news_and_updates.*') ? 'actives' : '' }}">
                                <a href="{{ route('admin.news_and_updates.index') }}">News And Media</a>
                            </li>
                            <li class="{{ Request::routeIs('admin.photo_gallery.*') ? 'actives' : '' }}">
                                <a href="{{ route('admin.photo_gallery.index') }}">Photo Gallery</a>
                            </li>
                        </ul>
                    </li>
                </ul>

            </div>
            <div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
        </nav>
    </div>
</div>
<!-- Page Sidebar Ends-->
