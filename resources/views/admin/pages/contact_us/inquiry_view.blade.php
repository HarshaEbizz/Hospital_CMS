@extends('admin.layouts.login_after')
@section('content')
    <div class="page-body">
        <div class="container-fluid">
            <div class="page-title">
                <div class="row">
                    <div class="col-6">
                        <h3>Inquiries</h3>
                    </div>
                </div>
            </div>
        </div>
        <!-- Container-fluid starts-->
        <div class="container-fluid">
            <div class="row">
                <!-- Zero Configuration  Starts-->
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive big tableinsidetable">
                                <table class="display" id="inquirys_list">
                                    <thead>
                                        <tr>
                                            <th>Sr no</th>
                                            <th>Full Name</th>
                                            <th>Email</th>
                                            <th>Mobile No</th>
                                            <th>Country</th>
                                            <th>State</th>
                                            <th>Speciality</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Zero Configuration  Ends-->
            </div>
        </div>
    </div>

    <!-- show inquiry Popup-->
    <div class="modal fade" id="show_inquiry_popup" tabindex="-1" aria-labelledby="exampleModalLabel" style="display: none"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">

            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel2">
                        View Inquiry Details
                    </h5>
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"
                        data-bs-original-title="" title=""></button>
                </div>

                <div class="modal-body">
                    <div class="row mb-3">
                        <form action="#" method="POST" id="show_inquiry_form" name="show_inquiry_form"
                            class="form-inline" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="col-lg-6 pe-2">
                                <div class="mb-3">
                                    <label for="first_name" class="form-label">First Name</label>
                                    <input type="text" class="form-control" id="edit_first_name" name="edit_first_name"
                                        value="" readonly />
                                </div>
                            </div>
                            <div class="col-lg-6 pe-2">
                                <div class="mb-3">
                                    <label for="last_name" class="form-label">Last Name</label>
                                    <input type="text" class="form-control" id="edit_last_name" name="edit_last_name"
                                        readonly />
                                </div>
                            </div>
                            <div class="col-lg-6 pe-2">
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="text" class="form-control" id="edit_email" name="edit_email" readonly />
                                </div>
                            </div>
                            <div class="col-lg-6 pe-2">
                                <div class="mb-3">
                                    <label for="email" class="form-label">Mobile Number</label>
                                    <input type="text" class="form-control" id="edit_contact" name="edit_contact"
                                        readonly />
                                </div>
                            </div>
                            <div class="col-lg-12 pe-2">
                                <div class="mb-3">
                                    <label for="address" class="form-label">Address</label>
                                    <input type="text" class="form-control" id="edit_address" name="edit_address"
                                        disabled />
                                </div>
                            </div>
                            <div class="col-lg-6 pe-2">
                                <div class="mb-3">
                                    <label for="edit_country" class="form-label">Country</label>
                                    <input type="text" class="form-control" id="edit_country" name="edit_country"
                                        readonly />
                                </div>
                            </div>

                            <div class="col-lg-6 pe-2">
                                <div class="mb-3">
                                    <label for="edit_state" class="form-label">State</label>
                                    <input type="text" class="form-control" id="edit_state" name="edit_state"
                                        readonly />
                                </div>
                            </div>

                            <div class="col-lg-12 pe-2">
                                <div class="mb-3">
                                    <label for="questions" class="form-label">Your Questions</label>
                                    <input type="text" class="form-control" id="edit_questions" name="edit_questions"
                                        readonly />
                                </div>
                            </div>

                            <div class="col-lg-12 pe-2">
                                <div class="mb-3">
                                    <label for="edit_speciality" class="form-label">Speciality</label>
                                    <input type="text" class="form-control" id="edit_speciality"
                                        name="edit_speciality" readonly />
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <a class="btn btn-success  edit_report_view" id="edit_report_view"
                                                target="_blank">Download Report File</a>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- End inquiry Popup-->
@endsection

@section('script')
    <script src="{{ asset('admin_assets/custom/contact-us.js') }}"></script>
@endsection
