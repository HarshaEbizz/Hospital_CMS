{{-- <style>
    #certifi_mod .modal-dialog {
        max-width: 525px !important;
    }
</style> --}}
<!-- Modal -->
<div class="modal fade certi_model" id="certifi_mod" tabindex="-1" aria-labelledby="certifi_modLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header text-right">
                <!-- <h5 class="modal-title" id="certifi_modLabel">Modal title</h5> -->
                <button type="button" data-bs-dismiss="modal" aria-label="Close" class="btn_close">
                    <svg width="36" height="36" viewBox="0 0 36 36" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <rect width="36" height="36" rx="18" fill="#02BB9A" />
                        <path d="M21.6009 14.3998L14.4009 21.5998" stroke="white" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M14.4009 14.3998L21.6009 21.5998" stroke="white" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </button>
            </div>
            <div class="modal-body">
                <!-- <div class="row">
                    <div class="col-lg-6">
                        <img src="{{ asset('assets/images/certi_modelimg.png') }}" class="img-fluid cert_img" alt="">
                    </div>
                    <div class="col-lg-6">
                        <div class="mod_content">
                            <h4 class="cert_title">
                                Certicate of Achievment
                            </h4>
                            <p class="mod_details">
                            </p>
                        </div>
                    </div>
                </div> -->
            </div>
        </div>
    </div>
</div>



<!-- helth Checkup modal -->

<div class="modal fade helth_mod" id="helth_mod" tabindex="-1" aria-labelledby="health_modLabel" aria-hidden="true">
    <div class="modal-dialog ">
        <div class="modal-content">
            <div class="modal-header text-right custom-modal-header">
                <h5 class="modal-title" id="plan_name"></h5>
                <button type="button" data-bs-dismiss="modal" aria-label="Close" class="btn_close">
                    <svg width="36" height="36" viewBox="0 0 36 36" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <rect width="36" height="36" rx="18" fill="#02BB9A" />
                        <path d="M21.6009 14.3998L14.4009 21.5998" stroke="white" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M14.4009 14.3998L21.6009 21.5998" stroke="white" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </button>
            </div>
            <div class="modal-body">
            </div>
        </div>
        <!-- <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div> -->
    </div>
</div>

<div class="modal fade" id="appointment_form_model" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-sm-5 p-2">
                <div class="pb-4 text-center">
                    <h2 class="blue_sub_title">Book an appointment</h2>
                    <svg class="line" width="90" height="9" viewBox="0 0 90 9" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path d="M2.02431 7.09212C30.0244 6.09216 52.5242 0.592169 87.8787 2.46593" stroke="#02BB9A"
                            stroke-width="3" stroke-linecap="round">
                        </path>
                    </svg>
                    <p class="modal-text">
                    </p>
                </div>
                <form action="#" method="POST" id="appointment_form" name="appointment_form">
                    @csrf
                    <div class="container px-lg-5 booking_form">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="first_name" class="form-label">First Name
                                        <span style="color:#ED1C24;">*</span></label>
                                    <input type="text" class="form-control" id="first_name" name="first_name">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="last_name" class="form-label">Last
                                        name
                                        <span style="color:#ED1C24;">*</span></label>
                                    <input type="text" class="form-control" id="last_name" name="last_name">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="dropdown_max">
                                    <label for="hospital" class="form-label">Hospital<span
                                            style="color:#ED1C24;">*</span></label>
                                    <div class="form-group inline_drop">
                                        <svg class="right-aro" width="24" height="24" viewBox="0 0 24 24" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M4.24106 7.7459C4.53326 7.44784 4.99051 7.42074 5.31272 7.66461L5.40503 7.7459L12 14.4734L18.595 7.7459C18.8872 7.44784 19.3444 7.42074 19.6666 7.66461L19.7589 7.7459C20.0511 8.04396 20.0777 8.51037 19.8386 8.83904L19.7589 8.93321L12.582 16.2541C12.2898 16.5522 11.8325 16.5793 11.5103 16.3354L11.418 16.2541L4.24106 8.93321C3.91965 8.60534 3.91965 8.07376 4.24106 7.7459Z"
                                                fill="#130F26" />
                                        </svg>
                                        <select class="form-control" id="hospital" name="hospital">
                                            <option value="">Select hospital</option>
                                            <option>1</option>
                                            <option>2</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="dropdown_max">
                                    <label for="doctor" class="form-label">Doctor<span
                                            style="color:#ED1C24;">*</span></label>
                                    <div class="form-group inline_drop">
                                        <svg class="right-aro" width="24" height="24" viewBox="0 0 24 24" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M4.24106 7.7459C4.53326 7.44784 4.99051 7.42074 5.31272 7.66461L5.40503 7.7459L12 14.4734L18.595 7.7459C18.8872 7.44784 19.3444 7.42074 19.6666 7.66461L19.7589 7.7459C20.0511 8.04396 20.0777 8.51037 19.8386 8.83904L19.7589 8.93321L12.582 16.2541C12.2898 16.5522 11.8325 16.5793 11.5103 16.3354L11.418 16.2541L4.24106 8.93321C3.91965 8.60534 3.91965 8.07376 4.24106 7.7459Z"
                                                fill="#130F26" />
                                        </svg>
                                        <select class="form-control" id="doctor" name="doctor">
                                            <option value="">Select Doctor</option>
                                            <option>1</option>
                                            <option>2</option>
                                            <option>3</option>
                                            <option>4</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="dropdown_max">
                                    <label for="date" class="form-label">Select date<span
                                            style="color:#ED1C24;">*</span></label>
                                    <div class="form-group inline_drop">
                                        <!-- <svg width="25" height="25" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <path d="M19.0889 4.15234H5.08887C3.9843 4.15234 3.08887 5.04777 3.08887 6.15234V20.1523C3.08887 21.2569 3.9843 22.1523 5.08887 22.1523H19.0889C20.1934 22.1523 21.0889 21.2569 21.0889 20.1523V6.15234C21.0889 5.04777 20.1934 4.15234 19.0889 4.15234Z" stroke="#2DBF78" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                                                    <path d="M16.0889 2.15234V6.15234" stroke="#2DBF78" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                                                    <path d="M8.08887 2.15234V6.15234" stroke="#2DBF78" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                                                    <path d="M3.08887 10.1523H21.0889" stroke="#2DBF78" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                                                </svg> -->
                                        <input type="date" class="form-control" id="date" name="date">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="dropdown_max">
                                    <label for="time" class="form-label">Select Time<span
                                            style="color:#ED1C24;">*</span></label>
                                    <div class="form-group inline_drop">
                                        <!-- <svg class="right-aro" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <path d="M4.24106 7.7459C4.53326 7.44784 4.99051 7.42074 5.31272 7.66461L5.40503 7.7459L12 14.4734L18.595 7.7459C18.8872 7.44784 19.3444 7.42074 19.6666 7.66461L19.7589 7.7459C20.0511 8.04396 20.0777 8.51037 19.8386 8.83904L19.7589 8.93321L12.582 16.2541C12.2898 16.5522 11.8325 16.5793 11.5103 16.3354L11.418 16.2541L4.24106 8.93321C3.91965 8.60534 3.91965 8.07376 4.24106 7.7459Z" fill="#130F26" />
                                                                </svg> -->
                                        <input type="time" class="form-control" id="time" name="time">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div>
                                    <label for="email" class="form-label">Email<span style="color:#ED1C24;">*</span>
                                    </label>
                                    <input type="email" class="form-control left_icon_input" id="email" name="email"
                                        placeholder="Ebizzinfotech@mail.com">
                                    <span toggle="#password-field" class=" field-icon toggle-password">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M17.9028 8.85107L13.4596 12.4641C12.6201 13.1301 11.4389 13.1301 10.5994 12.4641L6.11865 8.85107"
                                                stroke="#02BB9A" stroke-width="1.5" stroke-linecap="round"
                                                stroke-linejoin="round"></path>
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M16.9089 21C19.9502 21.0084 22 18.5095 22 15.4384V8.57001C22 5.49883 19.9502 3 16.9089 3H7.09114C4.04979 3 2 5.49883 2 8.57001V15.4384C2 18.5095 4.04979 21.0084 7.09114 21H16.9089Z"
                                                stroke="#02BB9A" stroke-width="1.5" stroke-linecap="round"
                                                stroke-linejoin="round"></path>
                                        </svg>
                                    </span>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div>
                                    <label for="contact" class="form-label">Mobile Number <span
                                            style="color:#ED1C24;">*</span></label>
                                    <div class="d-sm-flex d-block">
                                        <div class="form-group inline_drop">
                                            <svg class="right-aro" width="24" height="24" viewBox="0 0 24 24"
                                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M4.24106 7.7459C4.53326 7.44784 4.99051 7.42074 5.31272 7.66461L5.40503 7.7459L12 14.4734L18.595 7.7459C18.8872 7.44784 19.3444 7.42074 19.6666 7.66461L19.7589 7.7459C20.0511 8.04396 20.0777 8.51037 19.8386 8.83904L19.7589 8.93321L12.582 16.2541C12.2898 16.5522 11.8325 16.5793 11.5103 16.3354L11.418 16.2541L4.24106 8.93321C3.91965 8.60534 3.91965 8.07376 4.24106 7.7459Z"
                                                    fill="#130F26" />
                                            </svg>
                                            <select class="form-control me-sm-2 me-" id="country_code"
                                                name="country_code">
                                                @foreach ($country as $countries)
                                                <option value="{{ $countries->phonecode }}" @if ($countries->phonecode
                                                    == '+91') selected @endif>
                                                    {{ $countries->phonecode }}
                                                </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="position-relative">
                                            <input type="number" class="form-control left_icon_input" id="appointment_contact"
                                                name="appointment_contact" aria-label="Text input with segmented dropdown button"
                                                placeholder="123 456 7890">
                                            <div class="contact_svg">
                                                <span>
                                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                            d="M11.5317 12.4724C15.5208 16.4604 16.4258 11.8467 18.9656 14.3848C21.4143 16.8328 22.8216 17.3232 19.7192 20.4247C19.3306 20.737 16.8616 24.4943 8.1846 15.8197C-0.493478 7.144 3.26158 4.67244 3.57397 4.28395C6.68387 1.17385 7.16586 2.58938 9.61449 5.03733C12.1544 7.5765 7.54266 8.48441 11.5317 12.4724Z"
                                                            stroke="#02BB9A" stroke-width="1.5" stroke-linecap="round"
                                                            stroke-linejoin="round" />
                                                    </svg>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <label id="appointment_contact-error" class="error" for="appointment_contact" style="display:none"></label>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <label for="floatingTextarea2" class="form-label">Description</label>
                                    <textarea class="form-control" id="description" name="description"
                                        style="height: 100px"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-center">
                            <p class="text-center mb-0"><span style="color:#ED1C24;">Note:</span> Mandatory field
                                must required</p>
                        </div>
                        <div class="d-flex justify-content-center">
                            <button type="submit" class="btn btn donat_btn mt-3" disabled>
                                Submit
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Socialmedia modal -->

<div class="modal fade certi_model" id="social_mod" tabindex="-1" aria-labelledby="certifi_modLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header text-right">
                <!-- <h5 class="modal-title" id="certifi_modLabel">Modal title</h5> -->
                <button type="button" data-bs-dismiss="modal" aria-label="Close" class="btn_close">
                    <svg width="36" height="36" viewBox="0 0 36 36" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <rect width="36" height="36" rx="18" fill="#02BB9A" />
                        <path d="M21.6009 14.3998L14.4009 21.5998" stroke="white" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M14.4009 14.3998L21.6009 21.5998" stroke="white" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-6">
                        <img src="{{ asset('assets/images/social_1.png') }}" class="img-fluid" alt="">
                    </div>
                    <div class="col-lg-6">
                        <div class="mod_content">
                            <h6>
                                Clinical Trials Day Observes every year on May 20, 2022, by raising clinical trial
                                awareness and honoring clinical research
                                professionals across the globe.
                            </h6>
                            <p>

                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div> -->
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="call_request_model" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-lg-5">
                <div class="pb-4 text-center">
                    <h2 class="blue_sub_title">Send Call Request</h2>
                    <svg class="line" width="90" height="9" viewBox="0 0 90 9" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path d="M2.02431 7.09212C30.0244 6.09216 52.5242 0.592169 87.8787 2.46593" stroke="#02BB9A"
                            stroke-width="3" stroke-linecap="round">
                        </path>
                    </svg>
                    <p class="modal-text">
                    </p>
                </div>
                <form action="#" method="POST" id="call_request_form" name="call_request_form">
                    @csrf
                    <div class="container px-lg-5 booking_form">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="first_name" class="form-label">First Name
                                        <span style="color:#ED1C24;">*</span></label>
                                    <input type="text" class="form-control" id="first_name" name="first_name">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="last_name" class="form-label">Last
                                        name
                                        <span style="color:#ED1C24;">*</span></label>
                                    <input type="text" class="form-control" id="last_name" name="last_name">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="dropdown_max">
                                    <label for="hospital" class="form-label">Hospital<span
                                            style="color:#ED1C24;">*</span></label>
                                    <div class="form-group inline_drop">
                                        <svg class="right-aro" width="24" height="24" viewBox="0 0 24 24" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M4.24106 7.7459C4.53326 7.44784 4.99051 7.42074 5.31272 7.66461L5.40503 7.7459L12 14.4734L18.595 7.7459C18.8872 7.44784 19.3444 7.42074 19.6666 7.66461L19.7589 7.7459C20.0511 8.04396 20.0777 8.51037 19.8386 8.83904L19.7589 8.93321L12.582 16.2541C12.2898 16.5522 11.8325 16.5793 11.5103 16.3354L11.418 16.2541L4.24106 8.93321C3.91965 8.60534 3.91965 8.07376 4.24106 7.7459Z"
                                                fill="#130F26" />
                                        </svg>
                                        <select class="form-control" id="hospital" name="hospital">
                                            <option value="">Select hospital</option>
                                            <option>1</option>
                                            <option>2</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="dropdown_max">
                                    <label for="doctor" class="form-label">Doctor<span
                                            style="color:#ED1C24;">*</span></label>
                                    <div class="form-group inline_drop">
                                        <svg class="right-aro" width="24" height="24" viewBox="0 0 24 24" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M4.24106 7.7459C4.53326 7.44784 4.99051 7.42074 5.31272 7.66461L5.40503 7.7459L12 14.4734L18.595 7.7459C18.8872 7.44784 19.3444 7.42074 19.6666 7.66461L19.7589 7.7459C20.0511 8.04396 20.0777 8.51037 19.8386 8.83904L19.7589 8.93321L12.582 16.2541C12.2898 16.5522 11.8325 16.5793 11.5103 16.3354L11.418 16.2541L4.24106 8.93321C3.91965 8.60534 3.91965 8.07376 4.24106 7.7459Z"
                                                fill="#130F26" />
                                        </svg>
                                        <select class="form-control" id="doctor" name="doctor">
                                            <option value="">Select Doctor</option>
                                            <option>1</option>
                                            <option>2</option>
                                            <option>3</option>
                                            <option>4</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="dropdown_max">
                                    <label for="date" class="form-label">Select date<span
                                            style="color:#ED1C24;">*</span></label>
                                    <div class="form-group inline_drop">
                                        <!-- <svg width="25" height="25" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <path d="M19.0889 4.15234H5.08887C3.9843 4.15234 3.08887 5.04777 3.08887 6.15234V20.1523C3.08887 21.2569 3.9843 22.1523 5.08887 22.1523H19.0889C20.1934 22.1523 21.0889 21.2569 21.0889 20.1523V6.15234C21.0889 5.04777 20.1934 4.15234 19.0889 4.15234Z" stroke="#2DBF78" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                                                    <path d="M16.0889 2.15234V6.15234" stroke="#2DBF78" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                                                    <path d="M8.08887 2.15234V6.15234" stroke="#2DBF78" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                                                    <path d="M3.08887 10.1523H21.0889" stroke="#2DBF78" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                                                </svg> -->
                                        <input type="date" class="form-control" id="date" name="date">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="dropdown_max">
                                    <label for="time" class="form-label">Select Time<span
                                            style="color:#ED1C24;">*</span></label>
                                    <div class="form-group inline_drop">
                                        <!-- <svg class="right-aro" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <path d="M4.24106 7.7459C4.53326 7.44784 4.99051 7.42074 5.31272 7.66461L5.40503 7.7459L12 14.4734L18.595 7.7459C18.8872 7.44784 19.3444 7.42074 19.6666 7.66461L19.7589 7.7459C20.0511 8.04396 20.0777 8.51037 19.8386 8.83904L19.7589 8.93321L12.582 16.2541C12.2898 16.5522 11.8325 16.5793 11.5103 16.3354L11.418 16.2541L4.24106 8.93321C3.91965 8.60534 3.91965 8.07376 4.24106 7.7459Z" fill="#130F26" />
                                                                </svg> -->
                                        <input type="time" class="form-control" id="time" name="time">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email<span style="color:#ED1C24;">*</span>
                                    </label>
                                    <input type="email" class="form-control left_icon_input" id="email" name="email"
                                        placeholder="Ebizzinfotech@mail.com">
                                    <span toggle="#password-field" class=" field-icon toggle-password">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M17.9028 8.85107L13.4596 12.4641C12.6201 13.1301 11.4389 13.1301 10.5994 12.4641L6.11865 8.85107"
                                                stroke="#02BB9A" stroke-width="1.5" stroke-linecap="round"
                                                stroke-linejoin="round"></path>
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M16.9089 21C19.9502 21.0084 22 18.5095 22 15.4384V8.57001C22 5.49883 19.9502 3 16.9089 3H7.09114C4.04979 3 2 5.49883 2 8.57001V15.4384C2 18.5095 4.04979 21.0084 7.09114 21H16.9089Z"
                                                stroke="#02BB9A" stroke-width="1.5" stroke-linecap="round"
                                                stroke-linejoin="round"></path>
                                        </svg>
                                    </span>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="contact" class="form-label">Mobile Number <span
                                            style="color:#ED1C24;">*</span></label>
                                    <div class="d-sm-flex d-block">
                                        <div class="form-group inline_drop">
                                            <svg class="right-aro" width="24" height="24" viewBox="0 0 24 24"
                                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M4.24106 7.7459C4.53326 7.44784 4.99051 7.42074 5.31272 7.66461L5.40503 7.7459L12 14.4734L18.595 7.7459C18.8872 7.44784 19.3444 7.42074 19.6666 7.66461L19.7589 7.7459C20.0511 8.04396 20.0777 8.51037 19.8386 8.83904L19.7589 8.93321L12.582 16.2541C12.2898 16.5522 11.8325 16.5793 11.5103 16.3354L11.418 16.2541L4.24106 8.93321C3.91965 8.60534 3.91965 8.07376 4.24106 7.7459Z"
                                                    fill="#130F26" />
                                            </svg>
                                            <select class="form-control" id="country_code" name="country_code">
                                                @foreach ($country as $countries)
                                                <option value="{{ $countries->phonecode }}" @if ($countries->phonecode
                                                    == '+91') selected @endif>
                                                    {{ $countries->phonecode }}
                                                </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="position-relative">
                                            <input type="number" class="form-control left_icon_input" id="call_request_contact"
                                                name="call_request_contact" aria-label="Text input with segmented dropdown button"
                                                placeholder="123 456 7890">

                                            <div class="contact_svg">
                                                <span>
                                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                            d="M11.5317 12.4724C15.5208 16.4604 16.4258 11.8467 18.9656 14.3848C21.4143 16.8328 22.8216 17.3232 19.7192 20.4247C19.3306 20.737 16.8616 24.4943 8.1846 15.8197C-0.493478 7.144 3.26158 4.67244 3.57397 4.28395C6.68387 1.17385 7.16586 2.58938 9.61449 5.03733C12.1544 7.5765 7.54266 8.48441 11.5317 12.4724Z"
                                                            stroke="#02BB9A" stroke-width="1.5" stroke-linecap="round"
                                                            stroke-linejoin="round" />
                                                    </svg>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <label id="call_request_contact-error" class="error" for="call_request_contact"></label>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <label for="floatingTextarea2" class="form-label">Description</label>
                                    <textarea class="form-control" id="description" name="description"
                                        style="height: 100px"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-center">
                            <p class="text-center mb-0"><span style="color:#ED1C24;">Note:</span> Mandatory field
                                must required</p>
                        </div>
                        <div class="d-flex justify-content-center">
                            <button type="submit" class="btn btn donat_btn mt-3" disabled>
                                Submit
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="DoctorContactNoModal" tabindex="-1" aria-labelledby="exampleModalLabel1"
    style="display: none" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-sm" role="document" style="max-width: 525px !important;">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-4">
                <div class="card border-0">
                    <div class="card-body px-4 py-3">
                        <div class="d-sm-flex justify-content-between cereer_card_details mb-2">
                            <h6 id="department_name">To Book An Appointment</h6>
                        </div>
                        <hr>
                        <div class="text-center">
                            <p class="text-center">Please Call On</p>
                            <a class="call text-center" href="tel: +91-261-7161111">0261-7161111</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->

{{-- Doctor data model --}}
<div class="modal fade" id="DoctorDataModel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-sm-5 p-2">
                <div class="d-lg-flex align-items-center mb-sm-5 mb-2">
                    <div class="doc_visuals_modal me-4">
                        <img src=""class="img-fluid" title="">
                        {{-- <div class="doc_personl">
                            <h6> </h6>
                        </div> --}}
                    </div>
                    <div>
                        <div class="each_docdetails1">
                                <h6 class="our_dr_name"></h6>
                            <h4>Qualification</h4>
                            <p><svg width="18" height="18" viewBox="0 0 18 18" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <g clip-path="url(#clip0_3355_26718)">
                                        <path
                                            d="M14.7968 2.69082C12.8194 4.40223 11.1465 6.03137 9.61482 8.15692C8.93935 9.09442 8.18818 10.1979 7.69716 11.2397C7.41685 11.7921 6.91154 12.6553 6.73927 13.4852C5.79708 12.6086 4.78505 11.6137 3.74958 10.8344C3.01154 10.2792 0.885755 11.4112 1.75107 12.0623C3.30193 13.2288 4.59169 14.6817 6.10013 15.9002C6.73107 16.4093 8.12935 15.3037 8.45794 14.8399C9.53654 13.3118 9.68396 11.4438 10.4701 9.77692C11.6703 7.22762 13.7989 5.13348 15.9005 3.31496C17.2929 2.01629 15.8548 1.77676 14.799 2.69082"
                                            fill="#ED1C24" />
                                    </g>
                                    <defs>
                                        <clipPath id="clip0_3355_26718">
                                            <rect width="15" height="15" fill="white"
                                                transform="translate(1.5 1.5)" />
                                        </clipPath>
                                    </defs>
                                </svg>
                                <span class="qualification"></span>
                            </p>
                        </div>

                        <div class="each_docdetails1">
                            <h4>OPD Timing</h4>
                            <div class="d-flex">
                                <svg width="18" height="18" viewBox="0 0 18 18" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <g clip-path="url(#clip0_3355_26738)">
                                        <path
                                            d="M8.99992 3.66816C6.05955 3.66816 3.66768 6.06004 3.66768 9.00041C3.66768 11.9408 6.05955 14.3327 8.99992 14.3327C11.9403 14.3327 14.3322 11.9408 14.3322 9.00041C14.3322 6.06004 11.9403 3.66816 8.99992 3.66816ZM8.99992 13.2881C6.63583 13.2881 4.71221 11.3645 4.71221 9.00041C4.71221 6.63631 6.63583 4.7127 8.99992 4.7127C11.364 4.7127 13.2876 6.63631 13.2876 9.00041C13.2876 11.3645 11.364 13.2881 8.99992 13.2881Z"
                                            fill="#F3B21F" stroke="#F3B21F" stroke-width="0.4" />
                                        <path
                                            d="M9 3.11862C9.13851 3.11862 9.27135 3.0636 9.3693 2.96565C9.46724 2.86771 9.52227 2.73487 9.52227 2.59636V1.07227C9.52227 0.933753 9.46724 0.800912 9.3693 0.702968C9.27135 0.605024 9.13851 0.55 9 0.55C8.86149 0.55 8.72865 0.605024 8.6307 0.702968C8.53276 0.800912 8.47773 0.933753 8.47773 1.07227V2.59636C8.47773 2.73487 8.53276 2.86771 8.6307 2.96565C8.72865 3.0636 8.86149 3.11862 9 3.11862Z"
                                            fill="#F3B21F" stroke="#F3B21F" stroke-width="0.4" />
                                        <path
                                            d="M9 14.8815C8.86149 14.8815 8.72865 14.9366 8.6307 15.0345C8.53276 15.1325 8.47773 15.2653 8.47773 15.4038V16.9279C8.47773 17.0664 8.53276 17.1993 8.6307 17.2972C8.72865 17.3951 8.86149 17.4502 9 17.4502C9.13851 17.4502 9.27135 17.3951 9.3693 17.2972C9.46724 17.1993 9.52227 17.0664 9.52227 16.9279V15.4038C9.52227 15.2653 9.46724 15.1325 9.3693 15.0345C9.27135 14.9366 9.13851 14.8815 9 14.8815Z"
                                            fill="#F3B21F" stroke="#F3B21F" stroke-width="0.4" />
                                        <path
                                            d="M6.25058 3.19295L6.25057 3.19295L5.4888 1.87355C5.4548 1.81394 5.40938 1.76161 5.35514 1.71957C5.30071 1.67737 5.23847 1.64635 5.17199 1.6283C5.10552 1.61026 5.03614 1.60554 4.96784 1.61442C4.89954 1.62329 4.83367 1.64559 4.77402 1.68003C4.71437 1.71447 4.66212 1.76037 4.62028 1.81508C4.57845 1.8698 4.54784 1.93224 4.53024 1.99883C4.51263 2.06542 4.50837 2.13483 4.51771 2.20308C4.527 2.27107 4.54961 2.33656 4.58423 2.39581L5.34597 3.71521C5.41522 3.83517 5.5293 3.9227 5.66309 3.95856C5.79689 3.99441 5.93944 3.97564 6.0594 3.90639C6.17936 3.83713 6.26689 3.72306 6.30275 3.58926C6.3386 3.45547 6.31983 3.31291 6.25058 3.19295Z"
                                            fill="#F3B21F" stroke="#F3B21F" stroke-width="0.4" />
                                        <path
                                            d="M11.7494 14.807L11.7494 14.807L12.5111 16.1264C12.5451 16.186 12.5906 16.2384 12.6448 16.2804C12.6992 16.3226 12.7615 16.3536 12.8279 16.3717C12.8944 16.3897 12.9638 16.3944 13.0321 16.3856C13.1004 16.3767 13.1663 16.3544 13.2259 16.32C13.2856 16.2855 13.3378 16.2396 13.3797 16.1849C13.4215 16.1302 13.4521 16.0677 13.4697 16.0012C13.4873 15.9346 13.4916 15.8652 13.4822 15.7969C13.4729 15.7289 13.4503 15.6634 13.4157 15.6042L12.654 14.2848L12.4814 14.3844L12.654 14.2848C12.5847 14.1648 12.4706 14.0773 12.3368 14.0414C12.2031 14.0056 12.0605 14.0243 11.9405 14.0936C11.8206 14.1629 11.733 14.2769 11.6972 14.4107C11.6613 14.5445 11.6801 14.6871 11.7494 14.807Z"
                                            fill="#F3B21F" stroke="#F3B21F" stroke-width="0.4" />
                                        <path
                                            d="M3.19295 6.25057L3.19295 6.25058C3.31291 6.31983 3.45547 6.3386 3.58926 6.30275C3.72306 6.26689 3.83713 6.17936 3.90639 6.0594C3.97564 5.93944 3.99441 5.79689 3.95856 5.66309C3.9227 5.5293 3.83517 5.41522 3.71521 5.34597L2.39582 4.58423C2.33657 4.54961 2.27107 4.527 2.20308 4.51771C2.13483 4.50837 2.06542 4.51263 1.99883 4.53024C1.93224 4.54784 1.8698 4.57845 1.81508 4.62028C1.76037 4.66212 1.71447 4.71437 1.68003 4.77402C1.64559 4.83367 1.62329 4.89954 1.61442 4.96784C1.60554 5.03614 1.61026 5.10552 1.6283 5.17199C1.64635 5.23847 1.67737 5.30071 1.71957 5.35514C1.76161 5.40938 1.81394 5.4548 1.87355 5.4888L3.19295 6.25057Z"
                                            fill="#F3B21F" stroke="#F3B21F" stroke-width="0.4" />
                                        <path
                                            d="M14.807 11.7494L14.807 11.7494L14.3844 12.4814L14.2848 12.654L15.6042 13.4157C15.6634 13.4503 15.7289 13.4729 15.7969 13.4822C15.8652 13.4916 15.9346 13.4873 16.0012 13.4697C16.0677 13.4521 16.1302 13.4215 16.1849 13.3797C16.2396 13.3378 16.2855 13.2856 16.32 13.2259C16.3544 13.1663 16.3767 13.1004 16.3856 13.0321C16.3944 12.9638 16.3897 12.8944 16.3717 12.8279C16.3536 12.7615 16.3226 12.6992 16.2804 12.6448C16.2384 12.5906 16.186 12.5451 16.1264 12.5111L14.807 11.7494Z"
                                            fill="#F3B21F" stroke="#F3B21F" stroke-width="0.4" />
                                        <path
                                            d="M3.11862 9C3.11862 8.86149 3.0636 8.72865 2.96565 8.6307C2.86771 8.53276 2.73487 8.47773 2.59636 8.47773H1.07227C0.933753 8.47773 0.800912 8.53276 0.702968 8.6307C0.605024 8.72865 0.55 8.86149 0.55 9C0.55 9.13851 0.605024 9.27135 0.702968 9.3693C0.800912 9.46724 0.933753 9.52227 1.07227 9.52227H2.59636C2.73487 9.52227 2.86771 9.46724 2.96565 9.3693C3.0636 9.27135 3.11862 9.13851 3.11862 9Z"
                                            fill="#F3B21F" stroke="#F3B21F" stroke-width="0.4" />
                                        <path
                                            d="M16.9279 8.47773H15.4038C15.2653 8.47773 15.1325 8.53276 15.0345 8.6307C14.9366 8.72865 14.8815 8.86149 14.8815 9C14.8815 9.13851 14.9366 9.27135 15.0345 9.3693C15.1325 9.46724 15.2653 9.52227 15.4038 9.52227H16.9279C17.0664 9.52227 17.1993 9.46724 17.2972 9.3693C17.3951 9.27135 17.4502 9.13851 17.4502 9C17.4502 8.86149 17.3951 8.72865 17.2972 8.6307C17.1993 8.53276 17.0664 8.47773 16.9279 8.47773Z"
                                            fill="#F3B21F" stroke="#F3B21F" stroke-width="0.4" />
                                        <path
                                            d="M3.19295 11.7494L1.87355 12.5111C1.81394 12.5451 1.76162 12.5906 1.71957 12.6448C1.67737 12.6992 1.64635 12.7615 1.6283 12.8279C1.61026 12.8944 1.60554 12.9638 1.61442 13.0321C1.62329 13.1004 1.64559 13.1663 1.68003 13.2259C1.71447 13.2856 1.76037 13.3378 1.81508 13.3797C1.8698 13.4215 1.93224 13.4521 1.99883 13.4697C2.06542 13.4873 2.13483 13.4916 2.20308 13.4822C2.27107 13.4729 2.33656 13.4503 2.3958 13.4157L3.71521 12.654C3.83517 12.5847 3.9227 12.4706 3.95856 12.3368C3.99441 12.2031 3.97564 12.0605 3.90639 11.9405C3.83713 11.8206 3.72306 11.733 3.58926 11.6972C3.45547 11.6613 3.31291 11.6801 3.19295 11.7494L3.29163 11.9203L3.19295 11.7494Z"
                                            fill="#F3B21F" stroke="#F3B21F" stroke-width="0.4" />
                                        <path
                                            d="M14.5464 6.32058C14.638 6.32056 14.728 6.2964 14.8072 6.25053C14.8073 6.25049 14.8073 6.25045 14.8074 6.25042L16.1265 5.4888C16.1861 5.4548 16.2385 5.40938 16.2805 5.35514C16.3227 5.30071 16.3537 5.23847 16.3718 5.17199C16.3898 5.10552 16.3945 5.03614 16.3857 4.96784C16.3768 4.89954 16.3545 4.83367 16.32 4.77402C16.2856 4.71437 16.2397 4.66212 16.185 4.62028C16.1303 4.57845 16.0678 4.54784 16.0012 4.53024C15.9347 4.51263 15.8652 4.50837 15.797 4.51771C15.729 4.527 15.6635 4.54961 15.6043 4.58423L14.2849 5.34593C14.2849 5.34594 14.2849 5.34595 14.2849 5.34596C14.1852 5.40344 14.1074 5.49221 14.0634 5.59848C14.0194 5.70477 14.0117 5.82262 14.0415 5.93373C14.0713 6.04484 14.137 6.14299 14.2283 6.21294C14.3196 6.28286 14.4315 6.3207 14.5464 6.32058ZM14.5464 6.32058C14.5464 6.32058 14.5464 6.32058 14.5463 6.32058L14.5463 6.12058L14.5464 6.32058Z"
                                            fill="#F3B21F" stroke="#F3B21F" stroke-width="0.4" />
                                        <path
                                            d="M5.34597 14.2848L5.34597 14.2847C5.41523 14.1648 5.5293 14.0773 5.66309 14.0414C5.79688 14.0056 5.93943 14.0243 6.05938 14.0936L5.34597 14.2848ZM5.34597 14.2848L4.58423 15.6041M5.34597 14.2848L4.58423 15.6041M4.58423 15.6041C4.54961 15.6634 4.527 15.7289 4.51771 15.7969C4.50837 15.8651 4.51263 15.9345 4.53024 16.0011C4.54784 16.0677 4.57845 16.1302 4.62028 16.1849C4.66212 16.2396 4.71437 16.2855 4.77402 16.3199C4.83367 16.3544 4.89954 16.3767 4.96784 16.3855C5.03614 16.3944 5.10552 16.3897 5.172 16.3717C5.23846 16.3536 5.30071 16.3226 5.35514 16.2804C5.40939 16.2383 5.45481 16.186 5.48881 16.1264L6.25057 14.807L6.25058 14.807C6.31983 14.6871 6.33859 14.5445 6.30273 14.4107C6.26688 14.2769 6.17934 14.1629 6.05939 14.0936L4.58423 15.6041Z"
                                            fill="#F3B21F" stroke="#F3B21F" stroke-width="0.4" />
                                        <path
                                            d="M12.654 3.71521L12.654 3.71522C12.5847 3.83517 12.4706 3.92269 12.3368 3.95854C12.203 3.99439 12.0605 3.97562 11.9406 3.90637L12.654 3.71521ZM12.654 3.71521L13.4157 2.39582C13.4503 2.33657 13.4729 2.27107 13.4822 2.20308C13.4916 2.13483 13.4873 2.06542 13.4697 1.99883C13.4521 1.93224 13.4215 1.8698 13.3796 1.81508C13.3378 1.76037 13.2856 1.71447 13.2259 1.68003C13.1663 1.64559 13.1004 1.62329 13.0321 1.61442C12.9638 1.60554 12.8944 1.61026 12.8279 1.6283C12.7615 1.64635 12.6992 1.67737 12.6448 1.71957C12.5905 1.76161 12.5451 1.81394 12.5111 1.87355L11.7494 3.19294L11.7493 3.19296M12.654 3.71521L11.7493 3.19296M11.7493 3.19296C11.6801 3.31292 11.6613 3.45547 11.6972 3.58926M11.7493 3.19296L11.6972 3.58926M11.6972 3.58926C11.7331 3.72305 11.8206 3.83712 11.9405 3.90637L11.6972 3.58926Z"
                                            fill="#F3B21F" stroke="#F3B21F" stroke-width="0.4" />
                                    </g>
                                    <defs>
                                        <clipPath id="clip0_3355_26738">
                                            <rect width="18" height="18" fill="white" />
                                        </clipPath>
                                    </defs>
                                </svg>
                                <div class="ms-2 morning_timeing">

                                </div>
                            </div>
                            <div class="d-flex">
                                <svg width="18" height="18" viewBox="0 0 18 18" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M16.199 8.75993L16.1991 8.7599C16.3316 8.68333 16.5012 8.72875 16.5779 8.86143C16.6544 8.99405 16.609 9.16365 16.4763 9.24028C16.4763 9.24028 16.4763 9.24029 16.4763 9.24029L15.0089 10.0876L15.0088 10.0876C14.9648 10.113 14.9174 10.1249 14.8707 10.1249C14.7741 10.1249 14.6812 10.0748 14.63 9.98608L14.63 9.98607C14.5534 9.85346 14.5989 9.68385 14.7315 9.60723C14.7315 9.60722 14.7315 9.60722 14.7315 9.60722L16.199 8.75993Z"
                                        fill="#02BB9A" stroke="#02BB9A" stroke-width="0.5" />
                                    <path
                                        d="M13.3751 5.65835L13.3751 5.6584C13.5078 5.73494 13.5532 5.90454 13.4766 6.03724L12.6294 7.50476L12.6294 7.50476C12.5782 7.59345 12.4853 7.64353 12.3887 7.64353C12.342 7.64353 12.2947 7.63172 12.2506 7.60627L12.2506 7.60625C12.118 7.52972 12.0725 7.36012 12.149 7.22741C12.149 7.2274 12.149 7.22739 12.1491 7.22738L12.9963 5.75988L12.9963 5.75986C13.0729 5.6272 13.2425 5.58175 13.3751 5.65835Z"
                                        fill="#02BB9A" stroke="#02BB9A" stroke-width="0.5" />
                                    <path
                                        d="M8.72266 4.76367C8.72266 4.61051 8.84684 4.48633 9 4.48633C9.15316 4.48633 9.27734 4.61051 9.27734 4.76367V6.4582C9.27734 6.61137 9.15316 6.73555 9 6.73555C8.84684 6.73555 8.72266 6.61137 8.72266 6.4582V4.76367Z"
                                        fill="#02BB9A" stroke="#02BB9A" stroke-width="0.5" />
                                    <path
                                        d="M5.00391 5.76037L5.00392 5.76038L5.85118 7.22786C5.85118 7.22787 5.85118 7.22787 5.85118 7.22787C5.92777 7.36056 5.88231 7.53014 5.74968 7.60672L5.74959 7.60677C5.70564 7.63217 5.65826 7.64399 5.6115 7.64399C5.51489 7.64399 5.42205 7.59394 5.37085 7.50524L5.37084 7.50522L4.52357 6.03772L4.52357 6.03772C4.44699 5.90508 4.49244 5.73546 4.62507 5.65888L4.62514 5.65884C4.7577 5.58225 4.9273 5.62766 5.00391 5.76037Z"
                                        fill="#02BB9A" stroke="#02BB9A" stroke-width="0.5" />
                                    <path
                                        d="M3.26885 9.60724L3.26886 9.60724C3.40149 9.68382 3.44694 9.85344 3.37036 9.98608L3.37034 9.98611C3.31915 10.0748 3.2263 10.1249 3.12969 10.1249C3.08297 10.1249 3.03559 10.113 2.99153 10.0876L2.99152 10.0876L1.52403 9.24029L1.52401 9.24028C1.39135 9.1637 1.34592 8.99409 1.42251 8.86146L1.42254 8.86141C1.49909 8.72877 1.66865 8.6833 1.80134 8.75993L1.80136 8.75994L3.26885 9.60724Z"
                                        fill="#02BB9A" stroke="#02BB9A" stroke-width="0.5" />
                                    <path
                                        d="M12.633 12.7423L12.6623 12.9588H12.8808H17.4727C17.6258 12.9588 17.75 13.083 17.75 13.2362C17.75 13.3894 17.6258 13.5135 17.4727 13.5135H0.527344C0.37418 13.5135 0.25 13.3894 0.25 13.2362C0.25 13.083 0.37418 12.9588 0.527344 12.9588H5.11921H5.33768L5.36695 12.7423C5.6088 10.9535 7.14627 9.56982 9 9.56982C10.8537 9.56982 12.3912 10.9535 12.633 12.7423ZM5.94205 12.6629L5.88665 12.9588H6.18778H11.8122H12.1133L12.0579 12.6629C11.7879 11.2203 10.5206 10.1245 9 10.1245C7.47939 10.1245 6.21203 11.2203 5.94205 12.6629Z"
                                        fill="#02BB9A" stroke="#02BB9A" stroke-width="0.5" />
                                </svg>

                                <div class="ms-2 evening_timeing">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab_section_career pt-4">
                    <ul class="nav nav-tabs justify-content-start mb-4 carrer_tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active career_btns experience_tab" id="experience-tab" data-bs-toggle="tab" data-bs-target="#" type="button" role="tab" aria-controls="experience" aria-selected="true">Experience</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link career_btns highlight_tab" id="highlight-tab" data-bs-toggle="tab" data-bs-target="" type="button" role="tab" aria-controls="highlight" aria-selected="false">Professional
                                Highlights</button>
                        </li>
                    </ul>
                    <div class="tab-content ul_li_image" id="myTabContent">
                        <div class="tab-pane fade show active experience" id="" role="tabpanel" aria-labelledby="experience-tab">
                        </div>
                        <div class="tab-pane fade highlight" id="" role="tabpanel" aria-labelledby="highlight-tab">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- Doctor data model --}}

{{-- crop image model start --}}
<div class="modal fade" id="ImageCropmodal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Crop Image Before Upload</h5>
                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <input type="hidden" name="img_tag" id="img_tag" value="">
            <div class="modal-body">
                <div class="img-container">
                    <div class="row">
                        <div class="col-md-8">
                            <img src="" id="sample_image" />
                        </div>
                        <div class="col-md-4">
                            <div class="preview"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" id="crop" class="btn btn-primary">Crop</button>
                <button class="btn btn-primary" type="button" data-bs-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>
{{-- crop image model end --}}
<!-- Modal -->
<!-- @if (Request::is('/'))
    <div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-modal="true" role="dialog" style="display: block; padding-left: 0px;">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body p-lg-5">
                    <div class="text-center">
                        <h4 class="mb-3">
                            મિશન હેલ્થ કેર 2023
                        </h4>
                        <h3>હેલ્થ ચેક-અપ પેકેજ પર મેળવો 50% ડિસ્કાઉન્ટ કુપન.</h3>
                    </div>
                    <div>
                        <img src="{{ asset('assets/images/helth_checkup_bg.jpg') }}" alt=""
                            class="w-100">
                    </div>

                    <div class="text-center mt-4">
                        <p>ખાસ નોંધ:</p>
                        <p>
                            1.આ ડિસ્કાઉન્ટ કુપન દ્વારા ફક્ત વર્ષ 2023માં જ રૂા. 1000/- થી રૂા. 25,000/- સુધીનાં કોઇપણ એક
                            હેલ્થ ચેક-અપ પેકેજ પર 50% ડિસ્કાઉન્ટ મળવાપાત્ર છે.</p>
                        <p>
                            2.ડિસ્કાઉન્ટ કુપન તારીખઃ 25-12-2022 ના રોજ કિરણ હોસ્પિટલ (સુમુલ ડેરી પાસે) સુરત ખાતેથી
                            સવારે 9:00 થી સાંજે 5:00 વાગ્યા સુધીમાં મેળવી લેવાની રહેશે. </p>
                        <p>
                            3. આ તારીખ અને સમય સિવાય ડિસ્કાઉન્ટ કુપન મળવા પાત્ર નથી.</p>
                    </div>

                    <div class="d-flex justify-content-center pt-lg-4">
                        {{-- <button type="submit" class="btn btn-green_block w-75">રજીસ્ટ્રેશન કરવા માટે અહિયાં ક્લિક
                            કરો</button> --}}

                        <a class="btn btn-green_block w-75" href="" tabindex="-1"
                            aria-disabled="true">રજીસ્ટ્રેશન કરવા માટે અહિયાં ક્લિક
                            કરો</a>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="modal fade" id="registerModal" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body p-lg-5">
                    <div>
                        <img src="assets/images/helth_checkup_bg.jpg" alt="" class="w-100">
                    </div>

                    <div class="row mt-5">
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Your Name*: (તમારું નામ):</label>
                                <input type="email" class="form-control" id="exampleInputEmail1"
                                    >
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Mobile No*: (મોબાઈલ ન.):</label>
                                <input type="email" class="form-control" id="exampleInputEmail1"
                                    >
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Area*: (વિસ્તાર):</label>
                                <input type="email" class="form-control" id="exampleInputEmail1"
                                    >
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="dropdown_max">
                                <label for="exampleInputEmail1" class="form-label">City*: (શહેર):</label>
                                <div class="form-group inline_drop">

                                    <svg class="right-aro" width="24" height="24" viewBox="0 0 24 24"
                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M4.24106 7.7459C4.53326 7.44784 4.99051 7.42074 5.31272 7.66461L5.40503 7.7459L12 14.4734L18.595 7.7459C18.8872 7.44784 19.3444 7.42074 19.6666 7.66461L19.7589 7.7459C20.0511 8.04396 20.0777 8.51037 19.8386 8.83904L19.7589 8.93321L12.582 16.2541C12.2898 16.5522 11.8325 16.5793 11.5103 16.3354L11.418 16.2541L4.24106 8.93321C3.91965 8.60534 3.91965 8.07376 4.24106 7.7459Z"
                                            fill="#130F26"></path>
                                    </svg>
                                    <select class="form-control" id="exampleFormControlSelect1">
                                        <option selected="">
                                        </option>
                                        <option></option>
                                        <option></option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div>
                        <p>ડિસ્કાઉન્ટ કૂપન તારીખ: 25/12/2022 ને રવિવાર ના રોજ કિરણ હોસ્પિટલ, (સુમુલ ડેરી પાસે), સુરત
                            પરથી
                            સવારે 9:00 થી સાંજે 5:00 વાગ્યા સુધી માં મેળવી લેવું.</p>
                        <p style="color:red;">ખાસ નોંધ: આ તારીખ અને સમય સિવાય ડિસ્કાઉન્ટ કૂપન ઉપલબ્ધ થનાર નથી.</p>
                        <p>Kindly Collect your Discount Coupons between 9:00 AM to 5:00 PM on Sunday 25/12/2022 from
                            Kiran
                            Hospital (Near Sumul Dairy) Surat.</p>
                        <p style="color:red;">Note: Except this Date and Time. Discount Coupons will not be available.
                        </p>
                    </div>

                    <div class="d-flex justify-content-center pt-lg-4">
                        <button type="submit" class="btn btn-green_block w-25">Submit</button>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endif -->

<div class="modal fade" id="registerModal" tabindex="-1" data-modal-index="1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-lg-5" id="reg_form_content">

            </div>

        </div>
    </div>
</div>

{{--otp model--}}
<div class="modal fade" id="otp_model" tabindex="-1" data-modal-index="1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div style="pointer-events: auto;">
            <main class="VerificationCode">
                <div class="col-12 col-md-9 col-lg-7 col-xl-6 login_center_max VerificationCodeContant">

                    <div class="container bg-white rounded mt-2 mb-2 px-0">
                        <div class="btn-wrapper">
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="VerificationCodeBtn"></button>
                        </div>

                        <div class="login_container">
                            <div class="login_title mb-4">
                                <h1>Verification Code </h1>
                                <h6>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Diam porttitor non sem nullam consectetur elit. Id eu donec nulla.</h6>
                            </div>
                            <div class="login_inputs">
                                <form id="otp_form_submit" class="otp_form_submit" method="post" action="#">
                                    <div class="otp_inpurs_wraps">
                                        <input class="otp form-label" type="text" oninput='digitValidate(this)' onkeyup='otptabChange(1)' maxlength=1 >
                                        <input class="otp form-label" type="text" oninput='digitValidate(this)' onkeyup='otptabChange(2)' maxlength=1 >
                                        <input class="otp form-label" type="text" oninput='digitValidate(this)' onkeyup='otptabChange(3)' maxlength=1 >
                                        <input class="otp form-label" type="text" oninput='digitValidate(this)'onkeyup='otptabChange(4)' maxlength=1 >
                                        <input class="otp form-label" type="text" oninput='digitValidate(this)'onkeyup='otptabChange(5)' maxlength=1 >
                                        <input class="otp form-label" type="text" oninput='digitValidate(this)'onkeyup='otptabChange(6)' maxlength=1 >
                                    </div>
                                    {{--<p class="sign_up_tagline">Didn't receive it,  <a href="javascript:void(0)">Resend code</a></p>--}}
                                    <p id="show_error_otp" style="-webkit-text-stroke-width:0px;background-color:rgb(255, 255, 255);box-sizing:border-box;color:red;font-family:Poppins, sans-serif;font-size:16px;font-style:normal;font-variant-caps:normal;font-variant-ligatures:normal;font-weight:400;letter-spacing:normal;margin-bottom:1rem;margin-top:0px;orphans:2;text-align:start;text-decoration-color:initial;text-decoration-style:initial;text-decoration-thickness:initial;text-indent:0px;text-transform:none;white-space:normal;widows:2;word-spacing:0px;display: none">Invalid OTP.</p>
                                    <button type="submit" class="btn btn-green_block">Verify Code</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
</div>

