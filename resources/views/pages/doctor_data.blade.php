@foreach ($doctor_data as $doctors_list)
    <div class="col-lg-4 col-sm-6 mb-sm-5 mb-3">
        <div class="each_doc">
            <div class="row g-0 align-items-center">
                <div class="col-lg-6 mb-lg-0 mb-sm-5">
                    <div class="doc_visuals">
                        <img src="{{ url('../') }}/storage/app/public/uploads/doctor_profile/{{ $doctors_list->profile_photo }}"
                            class="img-fluid" title="{{ $doctors_list->prefix }} {{ $doctors_list->full_name }}">
                    </div>
                </div>

                <div class="col-lg-6 mt-lg-0 mt-3">
                    <div class="doc_details">
                        <div class="each_docdetails">
                            <h5 class="dr_name">{{ $doctors_list->prefix }} {{ $doctors_list->full_name }}</h5>
                            <h4>Department</h4>
                            <p>{{ $doctors_list->department->department_name }}</p>
                        </div>
                        <div class="each_docdetails">
                            <h4>Designation</h4>
                            <p>{{ $doctors_list->designation }}</p>
                        </div>
                        <div class="btn-group call_icon" >
                            <a data-bs-toggle="modal" data-bs-target="#DoctorContactNoModal" style="cursor: pointer;">
                                <svg width="45" height="43" viewBox="0 0 45 43"
                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <rect width="45" height="43" rx="7"
                                        fill="#F3B21F" />
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M22.5707 22.4329C26.2274 26.0885 27.0569 21.8593 29.3851 24.1859C31.6297 26.4299 32.9198 26.8794 30.0759 29.7225C29.7197 30.0088 27.4564 33.4529 19.5025 25.5012C11.5476 17.5485 14.9897 15.2829 15.2761 14.9268C18.1268 12.0759 18.5687 13.3734 20.8132 15.6174C23.1415 17.945 18.9141 18.7772 22.5707 22.4329Z"
                                        stroke="white" stroke-width="1.5" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                </svg>
                            </a>
                            <a class="btn custom_read_btn green_btn" onclick="OpenDoctorModel({{ $doctors_list->id }})">
                                Read More
                            </a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endforeach
