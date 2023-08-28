@extends('admin.layouts.login_after')
@section('content')

<div class="page-body">
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-6">
                    <h3>Doctor's List</h3>
                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid starts-->
    <div class="container-fluid doctors_profile">
        <div class="row">
            <!-- Zero Configuration  Starts-->
            <div class="col-sm-3 mb-3">
                <div class="card">
                    <div class="card-body doctor_body">
                        <div class="img_width text-center">
                            <img src="{{ asset('admin_assets/images/kiranimage/Dr_alok.png') }}" alt="" />
                        </div>
                        <div class="mt-3 text-center doctor_content">
                            <h5>Dr. Alok Ranjan</h5>
                            <p>Sr. Consultant – Interventional Cardiology</p>
                        </div>
                        <div class="my-3 text-center doctor_deprt">
                            <h5 class="blue_text">Department</h5>
                            <p>CARDIOLOGY</p>
                        </div>

                        <div>
                            <a href="" class="btn book_btn mb-3" data-bs-toggle="modal" data-bs-target="#exampleModal">Book an Appointment</a>
                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="head_title text-center">
                                                <h3>To Book An Appointment</h3>
                                            </div>
                                            <div class="appointment_text text-center">
                                                <p>Please Call On</p>
                                            </div>
                                        </div>
                                        <div class="call_footer">
                                            <h5>0261-7161111</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Modal end-->

                            <!-- view Button -->
                            <a href="" class="btn view_btn" data-bs-toggle="modal" data-bs-target="#exampleModal1">View Profile</a>
                            <!-- Button trigger modal -->
                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div>
                                                <div class="text-center">
                                                    <img src="{{ asset('admin_assets/images/kiranimage/Dr_alok.png') }}" alt="" class="modal_profile" />
                                                </div>
                                                <div>
                                                    <div class="my-3 text-center">
                                                        <h4 class="blue_text">Dr. Alok Ranjan</h4>
                                                        <p class="mb-0">
                                                            Sr. Consultant – Interventional Cardiology
                                                        </p>
                                                        <p class="mb-0">
                                                            MBBS, MD (Medicine), DNB (Medicine), DM
                                                            (Cardiology), MRCP (UK)
                                                        </p>
                                                    </div>

                                                    <div class="d-flex justify-content-between mb-3">
                                                        <div>
                                                            <h5 class="blue_text">Expertise</h5>
                                                            <p class="mb-0">Cardiology</p>
                                                        </div>
                                                        <div>
                                                            <h5 class="blue_text">Cluster</h5>
                                                            <p class="mb-0">1st Floor E</p>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex justify-content-between mb-3">
                                                        <div>
                                                            <h5 class="blue_text">Language Known</h5>
                                                            <p class="mb-0">
                                                                Gujarati, Hindi, English, Marathi
                                                            </p>
                                                        </div>
                                                        <div>
                                                            <h5 class="blue_text">OPD Number</h5>
                                                            <p class="mb-0">9</p>
                                                        </div>
                                                    </div>

                                                    <div>
                                                        <div>
                                                            <h5 class="blue_text">OPD Timing</h5>
                                                            <div class="d-flex">
                                                                <div class="me-3">
                                                                    <p class="mb-0">Morning Timing</p>
                                                                    <p>9:00am to 1:00pm</p>
                                                                </div>
                                                                <div>
                                                                    <p class="mb-0">Evening Timing</p>
                                                                    <p>3:00pm to 6:00pm</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>



            <div class="col-sm-3 mb-3">
                <div class="card">
                    <div class="card-body doctor_body">
                        <div class="img_width text-center">
                            <img src="{{ asset('admin_assets/images/kiranimage/Dr. Rakesh Z. Tomar.jpg') }}" alt="" />
                        </div>
                        <div class="mt-3 text-center doctor_content">
                            <h5>Dr. Rakesh Z. Tomar</h5>
                            <p>Consultant - Non-Invasive Cardiologist</p>
                        </div>
                        <div class="my-3 text-center doctor_deprt">
                            <h5 class="blue_text">Department</h5>
                            <p>CARDIOLOGY</p>
                        </div>

                        <div>
                            <a href="" class="btn book_btn mb-3" data-bs-toggle="modal" data-bs-target="#exampleModal">Book an Appointment</a>
                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="head_title text-center">
                                                <h3>To Book An Appointment</h3>
                                            </div>
                                            <div class="appointment_text text-center">
                                                <p>Please Call On</p>
                                            </div>
                                        </div>
                                        <div class="call_footer">
                                            <h5>0261-7161111</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Modal end-->

                            <!-- view Button -->
                            <a href="" class="btn view_btn" data-bs-toggle="modal" data-bs-target="#exampleModal2">View Profile</a>
                            <!-- Button trigger modal -->
                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div>
                                                <div class="text-center">
                                                    <img src="{{ asset('admin_assets/images/kiranimage/Dr. Rakesh Z. Tomar.jpg') }}" alt="" class="modal_profile" />
                                                </div>
                                                <div>
                                                    <div class="my-3 text-center">
                                                        <h4 class="blue_text">Dr. Rakesh Z. Tomar</h4>
                                                        <p class="mb-0">
                                                            Consultant - Non-Invasive Cardiologist
                                                        </p>
                                                        <p class="mb-0">
                                                            MB, PGDCC, D. Card, ECFMG-USA
                                                        </p>
                                                    </div>

                                                    <div class="d-flex justify-content-between mb-3">
                                                        <div>
                                                            <h5 class="blue_text">Expertise</h5>
                                                            <p class="mb-0">Cardiology</p>
                                                        </div>
                                                        <div>
                                                            <h5 class="blue_text">Cluster</h5>
                                                            <p class="mb-0">1st Floor E</p>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex justify-content-between mb-3">
                                                        <div>
                                                            <h5 class="blue_text">Language Known</h5>
                                                            <p class="mb-0">
                                                                Gujarati, Hindi, English, Swahili, Russian
                                                            </p>
                                                        </div>
                                                        <div>
                                                            <h5 class="blue_text">OPD Number</h5>
                                                            <p class="mb-0">8</p>
                                                        </div>
                                                    </div>

                                                    <div>
                                                        <div>
                                                            <h5 class="blue_text">OPD Timing</h5>
                                                            <div class="d-flex">
                                                                <div class="me-3">
                                                                    <p class="mb-0">Morning Timing</p>
                                                                    <p>10:00 AM - 01:00 PM</p>
                                                                </div>
                                                                <div>
                                                                    <p class="mb-0">Evening Timing</p>
                                                                    <p>04:00 PM - 07:00 PM</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="col-sm-3 mb-3">
                <div class="card">
                    <div class="card-body doctor_body">
                        <div class="img_width text-center">
                            <img src="{{ asset('admin_assets/images/kiranimage/2_Dr. Vishal Vanani.png') }}" alt="" />
                        </div>
                        <div class="mt-3 text-center doctor_content">
                            <h5>Dr. Vishal G. Vanani</h5>
                            <p>Consultant - Interventional cardiology</p>
                        </div>
                        <div class="my-3 text-center doctor_deprt">
                            <h5 class="blue_text">Department</h5>
                            <p>CARDIOLOGY</p>
                        </div>

                        <div>
                            <a href="" class="btn book_btn mb-3" data-bs-toggle="modal" data-bs-target="#exampleModal">Book an Appointment</a>
                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="head_title text-center">
                                                <h3>To Book An Appointment</h3>
                                            </div>
                                            <div class="appointment_text text-center">
                                                <p>Please Call On</p>
                                            </div>
                                        </div>
                                        <div class="call_footer">
                                            <h5>0261-7161111</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Modal end-->

                            <!-- view Button -->
                            <a href="" class="btn view_btn" data-bs-toggle="modal" data-bs-target="#exampleModal2">View Profile</a>
                            <!-- Button trigger modal -->
                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div>
                                                <div class="text-center">
                                                    <img src="{{ asset('admin_assets/images/kiranimage/2_Dr. Vishal Vanani.png') }}" alt="" class="modal_profile" />
                                                </div>
                                                <div>
                                                    <div class="my-3 text-center">
                                                        <h4 class="blue_text">Dr. Vishal G. Vanani</h4>
                                                        <p class="mb-0">
                                                            Consultant - Interventional cardiology
                                                        </p>
                                                        <p class="mb-0">
                                                            MBBS, MD Medicine, DNB Cardiology
                                                        </p>
                                                    </div>

                                                    <div class="d-flex justify-content-between mb-3">
                                                        <div>
                                                            <h5 class="blue_text">Expertise</h5>
                                                            <p class="mb-0">Coronary intervention, Cardiac Imaging, Cardiac critical care</p>
                                                        </div>
                                                        <div>
                                                            <h5 class="blue_text">Cluster</h5>
                                                            <p class="mb-0">1st Floor E</p>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex justify-content-between mb-3">
                                                        <div>
                                                            <h5 class="blue_text">Language Known</h5>
                                                            <p class="mb-0">
                                                                Gujarati, Hindi, English, Marathi
                                                            </p>
                                                        </div>
                                                        <div>
                                                            <h5 class="blue_text">OPD Number</h5>
                                                            <p class="mb-0">11</p>
                                                        </div>
                                                    </div>

                                                    <div>
                                                        <div>
                                                            <h5 class="blue_text">OPD Timing</h5>
                                                            <div class="d-flex">
                                                                <div class="me-3">
                                                                    <p class="mb-0">Morning Timing</p>
                                                                    <p>10:00 AM - 01:00 PM</p>
                                                                </div>
                                                                <div>
                                                                    <p class="mb-0">Evening Timing</p>
                                                                    <p>04:00 PM - 07:00 PM</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>



            <div class="col-sm-3 mb-3">
                <div class="card">
                    <div class="card-body doctor_body">
                        <div class="img_width text-center">
                            <img src="{{ asset('admin_assets/images/kiranimage/Dr. Hina Faldu.jpg') }}" alt="" />
                        </div>
                        <div class="mt-3 text-center doctor_content">
                            <h5>Dr. Hina Faldu</h5>
                            <p>Consultant Neurologist</p>
                        </div>
                        <div class="my-3 text-center doctor_deprt">
                            <h5 class="blue_text">Department</h5>
                            <p>CARDIOLOGY</p>
                        </div>

                        <div>
                            <a href="" class="btn book_btn mb-3" data-bs-toggle="modal" data-bs-target="#exampleModal">Book an Appointment</a>
                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="head_title text-center">
                                                <h3>To Book An Appointment</h3>
                                            </div>
                                            <div class="appointment_text text-center">
                                                <p>Please Call On</p>
                                            </div>
                                        </div>
                                        <div class="call_footer">
                                            <h5>0261-7161111</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Modal end-->

                            <!-- view Button -->
                            <a href="" class="btn view_btn" data-bs-toggle="modal" data-bs-target="#exampleModal2">View Profile</a>
                            <!-- Button trigger modal -->
                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div>
                                                <div class="text-center">
                                                    <img src="{{ asset('admin_assets/images/kiranimage/Dr. Hina Faldu.jpg') }}" alt="" class="modal_profile" />
                                                </div>
                                                <div>
                                                    <div class="my-3 text-center">
                                                        <h4 class="blue_text">Consultant Neurologist</h4>
                                                        <p class="mb-0">
                                                            Consultant Neurologist
                                                        </p>
                                                        <p class="mb-0">
                                                            MBBS, MD, DNB(Neurology), DM(Neurology)
                                                        </p>
                                                    </div>

                                                    <div class="d-flex justify-content-between mb-3">
                                                        <div>
                                                            <h5 class="blue_text">Expertise</h5>
                                                            <p class="mb-0"></p>
                                                        </div>
                                                        <div>
                                                            <h5 class="blue_text">Cluster</h5>
                                                            <p class="mb-0">1st Floor F</p>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex justify-content-between mb-3">
                                                        <div>
                                                            <h5 class="blue_text">Language Known</h5>
                                                            <p class="mb-0">
                                                                Gujarati, Hindi, English
                                                            </p>
                                                        </div>
                                                        <div>
                                                            <h5 class="blue_text">OPD Number</h5>
                                                            <p class="mb-0">1</p>
                                                        </div>
                                                    </div>

                                                    <div>
                                                        <div>
                                                            <h5 class="blue_text">OPD Timing</h5>
                                                            <div class="d-flex">
                                                                <div class="me-3">
                                                                    <p class="mb-0">Morning Timing</p>
                                                                    <p>10:00 AM - 01:00 PM</p>
                                                                </div>
                                                                <div>
                                                                    <p class="mb-0">Evening Timing</p>
                                                                    <p>04:00 PM - 07:00 PM</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>



            <div class="col-sm-3 mb-3">
                <div class="card">
                    <div class="card-body doctor_body">
                        <div class="img_width text-center">
                            <img src="{{ asset('admin_assets/images/kiranimage/3_Dr. Rozy Ahya.png') }}" alt="" />
                        </div>
                        <div class="mt-3 text-center doctor_content">
                            <h5>Dr. Rozy P. Ahya</h5>
                            <p>Consultant - Obstetrician & Gynaecologist</p>
                        </div>
                        <div class="my-3 text-center doctor_deprt">
                            <h5 class="blue_text">Department</h5>
                            <p>OBSTETRICS & GYNECOLOGY</p>
                        </div>

                        <div>
                            <a href="" class="btn book_btn mb-3" data-bs-toggle="modal" data-bs-target="#exampleModal">Book an Appointment</a>
                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="head_title text-center">
                                                <h3>To Book An Appointment</h3>
                                            </div>
                                            <div class="appointment_text text-center">
                                                <p>Please Call On</p>
                                            </div>
                                        </div>
                                        <div class="call_footer">
                                            <h5>0261-7161111</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Modal end-->

                            <!-- view Button -->
                            <a href="" class="btn view_btn" data-bs-toggle="modal" data-bs-target="#exampleModal2">View Profile</a>
                            <!-- Button trigger modal -->
                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div>
                                                <div class="text-center">
                                                    <img src="{{ asset('admin_assets/images/kiranimage/3_Dr. Rozy Ahya.png') }}" alt="" class="modal_profile" />
                                                </div>
                                                <div>
                                                    <div class="my-3 text-center">
                                                        <h4 class="blue_text">Dr. Rozy P. Ahya</h4>
                                                        <p class="mb-0">
                                                            Consultant - Obstetrician & Gynaecologist
                                                        </p>
                                                        <p class="mb-0">
                                                            MS. DGO. FMAS
                                                        </p>
                                                    </div>

                                                    <div class="d-flex justify-content-between mb-3">
                                                        <div>
                                                            <h5 class="blue_text">Expertise</h5>
                                                            <p class="mb-0">Obstetrics & Gynecology</p>
                                                        </div>
                                                        <div>
                                                            <h5 class="blue_text">Cluster</h5>
                                                            <p class="mb-0">1st Floor D</p>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex justify-content-between mb-3">
                                                        <div>
                                                            <h5 class="blue_text">Language Known</h5>
                                                            <p class="mb-0">
                                                                Gujarati, Hindi, English
                                                            </p>
                                                        </div>
                                                        <div>
                                                            <h5 class="blue_text">OPD Number</h5>
                                                            <p class="mb-0">4</p>
                                                        </div>
                                                    </div>

                                                    <div>
                                                        <div>
                                                            <h5 class="blue_text">OPD Timing</h5>
                                                            <div class="d-flex">
                                                                <div class="me-3">
                                                                    <p class="mb-0">Morning Timing</p>
                                                                    <p>10:00 AM - 01:00 PM</p>
                                                                </div>
                                                                <div>
                                                                    <p class="mb-0">Evening Timing</p>
                                                                    <p>04:00 PM - 07:00 PM</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-3 mb-3">
                <div class="card">
                    <div class="card-body doctor_body">
                        <div class="img_width text-center">
                            <img src="{{ asset('admin_assets/images/kiranimage/4_Dr.Swati Agrawal.png') }}" alt="" />
                        </div>
                        <div class="mt-3 text-center doctor_content">
                            <h5>Dr. Swati Agrawal</h5>
                            <p>Consultant - Obstetrician & Gynaecologist</p>
                        </div>
                        <div class="my-3 text-center doctor_deprt">
                            <h5 class="blue_text">Department</h5>
                            <p>OBSTETRICS & GYNECOLOGY</p>
                        </div>

                        <div>
                            <a href="" class="btn book_btn mb-3" data-bs-toggle="modal" data-bs-target="#exampleModal">Book an Appointment</a>
                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="head_title text-center">
                                                <h3>To Book An Appointment</h3>
                                            </div>
                                            <div class="appointment_text text-center">
                                                <p>Please Call On</p>
                                            </div>
                                        </div>
                                        <div class="call_footer">
                                            <h5>0261-7161111</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Modal end-->

                            <!-- view Button -->
                            <a href="" class="btn view_btn" data-bs-toggle="modal" data-bs-target="#exampleModal2">View Profile</a>
                            <!-- Button trigger modal -->
                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div>
                                                <div class="text-center">
                                                    <img src="{{ asset('admin_assets/images/kiranimage/4_Dr.Swati Agrawal.png') }}" alt="" class="modal_profile" />
                                                </div>
                                                <div>
                                                    <div class="my-3 text-center">
                                                        <h4 class="blue_text">Dr. Swati Agrawal</h4>
                                                        <p class="mb-0">
                                                            Consultant - Obstetrician & Gynaecologist
                                                        </p>
                                                        <p class="mb-0">
                                                            MBBS, MS - OBS. & GYN., DNB - OBS. & GYN.
                                                        </p>
                                                    </div>

                                                    <div class="d-flex justify-content-between mb-3">
                                                        <div>
                                                            <h5 class="blue_text">Expertise</h5>
                                                            <p class="mb-0">Gynaec Laparoscopic and Hysteroscopic Surgeries, Infertility treatment, High Risk Pregnancies</p>
                                                        </div>
                                                        <div>
                                                            <h5 class="blue_text">Cluster</h5>
                                                            <p class="mb-0">1st Floor D</p>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex justify-content-between mb-3">
                                                        <div>
                                                            <h5 class="blue_text">Language Known</h5>
                                                            <p class="mb-0">
                                                                Gujarati, Hindi, English
                                                            </p>
                                                        </div>
                                                        <div>
                                                            <h5 class="blue_text">OPD Number</h5>
                                                            <p class="mb-0">6</p>
                                                        </div>
                                                    </div>

                                                    <div>
                                                        <div>
                                                            <h5 class="blue_text">OPD Timing</h5>
                                                            <div class="d-flex">
                                                                <div class="me-3">
                                                                    <p class="mb-0">Morning Timing</p>
                                                                    <p>10:00 AM - 01:00 PM</p>
                                                                </div>
                                                                <div>
                                                                    <p class="mb-0">Evening Timing</p>
                                                                    <p>04:00 PM - 07:00 PM</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="col-sm-3 mb-3">
                <div class="card">
                    <div class="card-body doctor_body">
                        <div class="img_width text-center">
                            <img src="{{ asset('admin_assets/images/kiranimage/Dr. Richa Pal.jpg') }}" alt="" />
                        </div>
                        <div class="mt-3 text-center doctor_content">
                            <h5>Dr. Richa Pal</h5>
                            <p>Consultant - Obs. & Gyn.</p>
                        </div>
                        <div class="my-3 text-center doctor_deprt">
                            <h5 class="blue_text">Department</h5>
                            <p>OBSTETRICS & GYNECOLOGY</p>
                        </div>

                        <div>
                            <a href="" class="btn book_btn mb-3" data-bs-toggle="modal" data-bs-target="#exampleModal">Book an Appointment</a>
                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="head_title text-center">
                                                <h3>To Book An Appointment</h3>
                                            </div>
                                            <div class="appointment_text text-center">
                                                <p>Please Call On</p>
                                            </div>
                                        </div>
                                        <div class="call_footer">
                                            <h5>0261-7161111</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Modal end-->

                            <!-- view Button -->
                            <a href="" class="btn view_btn" data-bs-toggle="modal" data-bs-target="#exampleModal2">View Profile</a>
                            <!-- Button trigger modal -->
                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div>
                                                <div class="text-center">
                                                    <img src="{{ asset('admin_assets/images/kiranimage/Dr. Richa Pal.jpg') }}" alt="" class="modal_profile" />
                                                </div>
                                                <div>
                                                    <div class="my-3 text-center">
                                                        <h4 class="blue_text">Dr. Richa Pal</h4>
                                                        <p class="mb-0">
                                                            Consultant - Obs. & Gyn.
                                                        </p>
                                                        <p class="mb-0">
                                                            MBBS,DGO,DNB,FMAS,FRM
                                                        </p>
                                                    </div>

                                                    <div class="d-flex justify-content-between mb-3">
                                                        <div>
                                                            <h5 class="blue_text">Expertise</h5>
                                                            <p class="mb-0">Infertility Specialist & Gyn. Laparoscopic Surgeon</p>
                                                        </div>
                                                        <div>
                                                            <h5 class="blue_text">Cluster</h5>
                                                            <p class="mb-0">2nd Floor IVF Department</p>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex justify-content-between mb-3">
                                                        <div>
                                                            <h5 class="blue_text">Language Known</h5>
                                                            <p class="mb-0">
                                                                Gujarati, Hindi, English
                                                            </p>
                                                        </div>
                                                        <div>
                                                            <h5 class="blue_text">OPD Number</h5>
                                                            <p class="mb-0">1</p>
                                                        </div>
                                                    </div>

                                                    <div>
                                                        <div>
                                                            <h5 class="blue_text">OPD Timing</h5>
                                                            <div class="d-flex">
                                                                <div class="me-3">
                                                                    <p class="mb-0">Morning Timing</p>
                                                                    <p>10:00 AM - 01:00 PM</p>
                                                                </div>
                                                                <div>
                                                                    <p class="mb-0">Evening Timing</p>
                                                                    <p>04:00 PM - 07:00 PM</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>



            <div class="col-sm-3 mb-3">
                <div class="card">
                    <div class="card-body doctor_body">
                        <div class="img_width text-center">
                            <img src="{{ asset('admin_assets/images/kiranimage/Dr. Pratik Shah.png') }}" alt="" />
                        </div>
                        <div class="mt-3 text-center doctor_content">
                            <h5>Dr. Pratik Shah</h5>
                            <p>Consultant - Vitreoretina, Uvea, Eye trauma and Comprehensive Ophthalmology</p>
                        </div>
                        <div class="my-3 text-center doctor_deprt">
                            <h5 class="blue_text">Department</h5>
                            <p>OPHTHALMOLOGY</p>
                        </div>

                        <div>
                            <a href="" class="btn book_btn mb-3" data-bs-toggle="modal" data-bs-target="#exampleModal">Book an Appointment</a>
                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="head_title text-center">
                                                <h3>To Book An Appointment</h3>
                                            </div>
                                            <div class="appointment_text text-center">
                                                <p>Please Call On</p>
                                            </div>
                                        </div>
                                        <div class="call_footer">
                                            <h5>0261-7161111</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Modal end-->

                            <!-- view Button -->
                            <a href="" class="btn view_btn" data-bs-toggle="modal" data-bs-target="#exampleModal2">View Profile</a>
                            <!-- Button trigger modal -->
                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div>
                                                <div class="text-center">
                                                    <img src="{{ asset('admin_assets/images/kiranimage/Dr. Pratik Shah.png') }}" alt="" class="modal_profile" />
                                                </div>
                                                <div>
                                                    <div class="my-3 text-center">
                                                        <h4 class="blue_text">Dr. Pratik Shah</h4>
                                                        <p class="mb-0">
                                                            Consultant - Vitreoretina, Uvea, Eye trauma and Comprehensive Ophthalmology
                                                        </p>
                                                        <p class="mb-0">
                                                            MS – Ophthalmology: SMIMER, Surat Fellowship in Advanced Cataract Surgery: Sankara Nethralaya, Chennai. Fellowship in Vitreoretina Surgery: Sankara Nethralaya, Chennai. Fellow of Internation Council of Ophthalmology(ICO), United kingdom
                                                        </p>
                                                    </div>

                                                    <div class="d-flex justify-content-between mb-3">
                                                        <div>
                                                            <h5 class="blue_text">Expertise</h5>
                                                            <p class="mb-0">Vitreoretina, Uvea, Eye trauma and Comprehensive Ophthalmology MS(Ophthalmology) FMRF - Vitreoretina(Sankara Netralaya), FICO(UK)</p>
                                                        </div>
                                                        <div>
                                                            <h5 class="blue_text">Cluster</h5>
                                                            <p class="mb-0">2nd Floor</p>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex justify-content-between mb-3">
                                                        <div>
                                                            <h5 class="blue_text">Language Known</h5>
                                                            <p class="mb-0">
                                                                Gujarati, Hindi, English
                                                            </p>
                                                        </div>
                                                        <div>
                                                            <h5 class="blue_text">OPD Number</h5>
                                                            <p class="mb-0">2</p>
                                                        </div>
                                                    </div>

                                                    <div>
                                                        <div>
                                                            <h5 class="blue_text">OPD Timing</h5>
                                                            <div class="d-flex">
                                                                <div class="me-3">
                                                                    <p class="mb-0">Morning Timing</p>
                                                                    <p>10:00 AM - 01:00 PM</p>
                                                                </div>
                                                                <div>
                                                                    <p class="mb-0">Evening Timing</p>
                                                                    <p>04:00 PM - 07:00 PM</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- Container-fluid Ends-->
</div>

@endsection
