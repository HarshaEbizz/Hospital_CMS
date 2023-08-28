@section('style')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.6.2/chosen.css" />
@endsection

@extends('admin.layouts.login_after')
@section('content')
    <div class="page-body">
        <div class="container-fluid">
            <div class="page-title">
                <div class="row">
                    <div class="col-6">
                        <h3>Doctor's Profile</h3>
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
                                <table class="display doctor_profile_list" id="basic-1">
                                    <a class="btn right_pop_btn" type="button" href="{{ route('admin.doctor.create') }}">
                                        Add Dotor Profile
                                    </a>

                                    <thead>
                                        <tr>
                                            <th>Sr No.</th>
                                            <th>Profile Image</th>
                                            <th>Doctor Name</th>
                                            <th>Department</th>
                                            {{-- <th>Specialities</th>
                                            <th>Mobile No</th>
                                            <th>OPD Timing</th>
                                            <th>Qualifcation</th>--}}
                                            <th>OPD No</th>
                                            <th>designation</th>
                                            <th>Status</th>
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
    </div>
@endsection


@section('script')
    <script src="{{ asset('admin_assets/custom/doctor_profile.js') }}"></script>
@endsection
