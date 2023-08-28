<div class="kiran_subnav">
    <section class="navigation">
        <div class="kiran_container">
            <nav class="navbar navbar-expand-lg navbar-light">
                <div class="container-fluid">
                    <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-content">
                        <div class="hamburger-toggle">
                            <div class="hamburger">
                                <span></span>
                                <span></span>
                                <span></span>
                            </div>
                        </div>
                    </button>
                    <div class="collapse navbar-collapse" id="navbar-content">
                        <ul class="navbar-nav mr-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link {{ (request()->is('/')) ? 'active' : '' }}" aria-current="page" href="{{url('/')}}">Home</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link {{ (request()->is('about_us')) ? 'active' : '' }}" href="{{url('/about_us')}}">About us</a>
                            </li>
                            <li class="nav-item dropdown dropdown-mega position-static">
                                <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" data-bs-auto-close="outside">Specialities</a>
                                <div class="dropdown-menu shadow">
                                    <div class="mega-content px-2">
                                        <div class="container-fluid">
                                            <div class="row">
                                                @php $per_row = count($specialities) @endphp
                                                @for ($i = 0; $i <= 3; $i++) <div class="col-12 col-sm-4 col-md-3 @if($i<2)col-lg-3 @else col-lg-2 @endif  py-2">
                                                    <div class="list-group">
                                                        @for ($j = $i; $j < $per_row; $j +=4) <a class="list-group-item" href="{{route('get_specialities',$specialities[$j]->slug)}}" @if(Request::route('slug') == $specialities[$j]->slug) style="color: #ED1C23;" @endif>{{$specialities[$j]->name}}</a>
                                                            @endfor
                                                    </div>
                                            </div>
                                            @endfor
                                            <div class="col-md-0 col-lg-2 py-2">
                                                <img class="nav-img" src="{{ asset('assets/images/navbr-image.png') }}" alt="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                    </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" data-bs-auto-close="outside">Patients & Visitors</a>
                        <ul class="dropdown-menu shadow">
                            <div class="row">
                                <div class="col-12 col-sm-6">
                                    <li><a class="dropdown-item" href="{{route('doctorprofiles')}}" @if(\Request::route()->getName() == 'doctorprofiles') style="color: #ED1C23;" @endif>Doctor's
                                            Profiles</a></li>
                                    <li><a class="dropdown-item" href="{{route('hosp_tour')}}" @if(\Request::route()->getName() == 'hosp_tour') style="color: #ED1C23;" @endif>Hospital Tour</a>
                                    </li>
                                    <li class="dropend">
                                        <a href="#" class="dropdown-item dropdown-toggle" data-bs-toggle="dropdown" data-bs-auto-close="outside"  @if(\Request::route()->getName() == 'get_patients_guide_services' || \Request::route()->getName() == 'patients_responsibilities' || \Request::route()->getName() == 'dos_donts' || \Request::route()->getName() == 'visiting_hours') style="color: #ED1C23;" @endif>Patient Guide</a>
                                        <ul class="dropdown-menu shadow">
                                            @foreach($patients_guide_services as $guide_services_list)
                                            <li><a class="dropdown-item" href="{{route('get_patients_guide_services',$guide_services_list->slug)}}" style="text-transform: capitalize; @if(Request::route('slug') == $guide_services_list->slug) color: #ED1C23;@endif" >{{$guide_services_list->heading}}</a></li>
                                            @endforeach
                                            {{-- <li><a class="dropdown-item" href="{{url('/patients_responsibilities')}}">Patient’s
                                                    Rights & Responsibilities</a></li>
                                            <li><a class="dropdown-item" href="{{url('/dos_donts')}}" >Do’s & Don’ts</a></li>
                                            <li><a class="dropdown-item" href="{{url('/visiting_hours')}}" >Visiting Hours</a></li> --}}
                                            <li><a class="dropdown-item" href="{{route('patients_responsibilities')}}" @if(\Request::route()->getName() == 'patients_responsibilities') style="color: #ED1C23;" @endif>Patient’s
                                                    Rights & Responsibilities</a></li>
                                            <li><a class="dropdown-item" href="{{route('dos_donts')}}" @if(\Request::route()->getName() == 'dos_donts') style="color: #ED1C23;" @endif>Do’s & Don’ts</a></li>
                                            <li><a class="dropdown-item" href="{{route('visiting_hours')}}" @if(\Request::route()->getName() == 'visiting_hours') style="color: #ED1C23;" @endif>Visiting Hours</a></li>
                                            {{-- {{ Request::route('slug') }} --}}
                                        </ul>
                                    </li>
                                    <!-- <li class="dropend">
                                        <a href="#" class="dropdown-item dropdown-toggle" data-bs-toggle="dropdown" data-bs-auto-close="outside">Latest Technology</a>
                                        <ul class="dropdown-menu shadow">
                                            <li><a class="dropdown-item" href="{{url('/robotic_surgery')}}">Robotic Surgery</a></li>
                                            <li><a class="dropdown-item" href="{{url('/department_amenities')}}">Department -
                                                    Amenities</a></li>
                                            <li><a class="dropdown-item" href="{{url('/new_radiation_machines')}}">New Radiation
                                                    machines</a></li>
                                        </ul>
                                    </li>
                                    <li class="dropend">
                                        <a href="#" class="dropdown-item dropdown-toggle" data-bs-toggle="dropdown" data-bs-auto-close="outside">Organ
                                            Transplants </a>
                                        <ul class="dropdown-menu shadow">
                                            <li><a class="dropdown-item" href="{{url('/liver_transplant')}}">Liver Transplant</a>
                                            </li>
                                            <li><a class="dropdown-item" href="{{url('/kidney')}}">Kidney</a>
                                            </li>
                                            <li><a class="dropdown-item" href="{{url('/heart')}}">Heart</a></li>
                                            <li><a class="dropdown-item" href="{{url('/lung')}}">Lung</a></li>
                                        </ul>
                                    </li> -->
                                    <li><a class="dropdown-item" href="{{route('empanelled_corporates')}}" @if(\Request::route()->getName() == 'empanelled_corporates') style="color: #ED1C23;" @endif>Empanelled Corporates</a>
                                    </li>
                                    <li><a class="dropdown-item" href="{{route('tpa_cashless')}}" @if(\Request::route()->getName() == 'tpa_cashless') style="color: #ED1C23;" @endif>TPA & Cashless
                                            Tie-Ups</a></li>
                                    <li><a class="dropdown-item" href="{{route('goverment_schemes')}}" @if(\Request::route()->getName() == 'goverment_schemes') style="color: #ED1C23;" @endif>Government
                                            Schemes</a></li>
                                </div>
                                <div class="col-12 col-sm-6 py-2">
                                    <img class="nav-img-two" src="{{ asset('assets/images/navbr-image-t.png') }}" alt="">
                                </div>
                            </div>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link dropdown-toggle {{ (request()->is('health_tips')) || (request()->is('statutory_compliance')) ? 'active' : '' }}" href="#" data-bs-toggle="dropdown" data-bs-auto-close="outside">Health Information</a>
                        <ul class="dropdown-menu shadow">
                            <li><a class="dropdown-item " href="{{route('health_tips')}}" @if(\Request::route()->getName() == 'health_tips') style="color: #ED1C23;" @endif >Health Tips</a></li>
                            {{-- <li><a class="dropdown-item" href="{{route('statutory_compliance')}}" @if(\Request::route()->getName() == 'statutory_compliance') style="color: #ED1C23;" @endif>Statutory
                                    Compliance</a></li> --}}
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="http://reports.kiranhospital.com/" tabindex="-1" aria-disabled="true" target="_blank">Patient
                            Portal</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('/international_patient_care')}}" tabindex="-1" aria-disabled="true">International
                            Patient care</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="https://kiranmedicalcollege.org" tabindex="-1" aria-disabled="true" target="_blank">Medical college</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="http://www.kirannursingcollege.com" tabindex="-1" aria-disabled="true" target="_blank">Nursing college</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" data-bs-auto-close="outside">More</a>
                        <ul class="dropdown-menu shadow more_tab">
                            <li><a class="dropdown-item" href="{{route('kiran_medics')}}" @if(\Request::route()->getName() == 'kiran_medics') style="color: #ED1C23;" @endif>Kiran Academics</a></li>
                            <li><a class="dropdown-item" href="{{route('news_media')}}" @if(\Request::route()->getName() == 'news_media') style="color: #ED1C23;" @endif>News and Media</a></li>
                            {{--<li><a class="dropdown-item" href="{{url('/social_media')}}">Social Media</a></li>--}}
                            <li><a class="dropdown-item" href="{{route('speciality_clinic')}}" @if(\Request::route()->getName() == 'speciality_clinic') style="color: #ED1C23;" @endif>Speciality
                                    Clinic</a></li>
                            <li><a class="dropdown-item" href="{{route('careers')}}" @if(\Request::route()->getName() == 'careers') style="color: #ED1C23;" @endif>Careers </a></li>
                            <li><a class="dropdown-item" href="{{route('social_activity')}}" @if(\Request::route()->getName() == 'social_activity') style="color: #ED1C23;" @endif>Social Activity</a>
                            </li>
                            <li><a class="dropdown-item" href="{{route('photo_gallery')}}" @if(\Request::route()->getName() == 'photo_gallery') style="color: #ED1C23;" @endif>Photo Gallery</a></li>
                            <li><a class="dropdown-item" href="{{route('form')}}" @if(\Request::route()->getName() == 'form') style="color: #ED1C23;" @endif>Form</a></li>
                            <li><a class="dropdown-item" href="{{route('contact_us')}}" @if(\Request::route()->getName() == 'contact_us') style="color: #ED1C23;" @endif>Contact Us</a></li>
                            {{-- <li><a class="dropdown-item" href="{{url('/statutory_compliance')}}">Statutory
                                    Compliance</a></li> --}}
                            <li><a class="dropdown-item" href="{{route('events_conference')}}" @if(\Request::route()->getName() == 'events_conference') style="color: #ED1C23;" @endif>Events &
                                    Conference</a></li>
                            <li><a class="dropdown-item pb-sm-0 pb-5" href="{{route('patient_feedbacks')}}" @if(\Request::route()->getName() == 'patient_feedbacks') style="color: #ED1C23;" @endif>Patient
                                    Feedbacks</a></li>
                        </ul>
                    </li>
                    </ul>
                </div>
        </div>
        </nav>
</div>
</section>
</div>
