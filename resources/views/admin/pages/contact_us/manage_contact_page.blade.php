@extends('admin.layouts.login_after')
@section('content')
    <div class="page-body">
        <div class="container-fluid">
            <div class="page-title">
                <div class="row">
                    <div class="col-6">
                        <h3>Manage Page</h3>
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
                                <table class="display" id="contact_form_contain">
                                    <thead>
                                        <tr>
                                            <th>Sr no</th>
                                            <th>Address</th>
                                            <th>Phone Number</th>
                                            <th>Opening timing</th>
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
        <!-- Container-fluid Ends-->
        <div class="modal fade" id="update_contact_model" tabindex="-1" aria-labelledby="exampleModalLabel"
            style="display: none" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel2">
                            Update Page Details
                        </h5>
                        <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"
                            data-bs-original-title="" title=""></button>
                    </div>
                    <form action="#" method="POST" id="update_contact_form_contain" name="update_contact_form_contain" class="form-inline">
                        @csrf
                        @method('PUT')
                        <div class="modal-body">
                            <div class="row mb-3">
                                <div class="col-lg-12 pe-2">
                                    <div class="mb-3">
                                        <label for="address" class="form-label">Address</label>
                                        <input type="text" class="form-control" id="address" name="address"
                                            placeholder="Full Address"  value=""/>
                                    </div>
                                </div>
                                <div class="col-lg-12 pe-2">
                                    <div class="mb-3">
                                        <label for="phone_number" class="form-label">Phone Number</label>
                                        <input type="text" class="form-control" id="phone_number" name="phone_number"
                                            placeholder="+91-000-0000000"  value=""/>
                                    </div>
                                </div>
                                <div class="col-lg-3 pe-2">
                                    <label for="opening_timing" class="form-label">Opening Time</label>
                                    <div class="mb-3">
                                        <input type="radio" name="opening_timing" id="24" value="24" class="form-check-input"> 24 Hours
                                        <input type="radio" name="opening_timing" id="12" value="12" class="form-check-input"> 12 Hours
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <a class="btn btn-secondary modelbtn" onclick="$('#update_contact_model').modal('hide')">Close</a>
                            <button class="btn btn-primary" type="submit" data-bs-original-title="" title="">
                                Update
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="{{ asset('admin_assets/custom/contact-us.js') }}"></script>
@endsection
