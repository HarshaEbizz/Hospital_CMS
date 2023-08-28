@extends('admin.layouts.login_after')
@section('content')
<div class="page-body">
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-6">
                    <h3>Book Appointment</h3>
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
                        <form action="#" method="POST" id="appointment_form" name="appointment_form" enctype="multipart/form-data">
                            <div class="row mb-3">
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="first_name" class="form-label">First Name</label>
                                        <input type="text" class="form-control" id="first_name" name="first_name" >
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="last_name" class="form-label">Last Name</label>
                                        <input type="text" class="form-control" id="last_name" name="last_name" >
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="mb-3">
                                        <label for="birth_date" class="form-label">Date of Birth</label>
                                        <input type="date" class="form-control" id="birth_date" name="birth_date" >
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <label for="gender" class="form-label">Gender</label>
                                    <select class="form-select custom_select" id="gender" name="gender" aria-label="Default select example">
                                        <option value="">Gender</option>
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>
                                    </select>
                                </div>
                                <div class="col-lg-3">
                                    <div class="mb-3">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="text" class="form-control" id="email" name="email" >
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="mb-3">
                                        <label for="contact" class="form-label">Phone No</label>
                                        <input type="text" class="form-control" id="contact" name="contact" >
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <label for="service" class="form-label">Service</label>
                                    <select class="form-select custom_select" id="service" name="service" aria-label="Default select example">
                                        <option value="">Select Service</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                    </select>
                                </div>
                                <div class="col-lg-4">
                                    <label for="doctor" class="form-label">Doctor</label>
                                    <select class="form-select custom_select" id="doctor" name="doctor" aria-label="Default select example">
                                        <option value="">Select doctor</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                    </select>
                                </div>
                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <label for="date" class="form-label">Appointment Date</label>
                                        <input type="date" class="form-control" id="date" name="date" >
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <div class="form-floating">
                                            <textarea class="form-control" placeholder="Please type what you want..." id="description" name="description" style="height: 100px"></textarea>
                                            <label for="floatingTextarea2">Please type what you want...</label>
                                        </div>
                                        <label id="description-error" class="error" for="description"></label>
                                    </div>
                                </div>

                                <div class="mt-3">
                                    <button class="btn btn-success" type="submit" data-bs-dismiss="modal" data-bs-original-title="" title="">Submit</button>
                                    <button class="btn btn-primary">Cancel</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- Zero Configuration  Ends-->
        </div>
    </div>
    <!-- Container-fluid Ends-->
</div>
@endsection