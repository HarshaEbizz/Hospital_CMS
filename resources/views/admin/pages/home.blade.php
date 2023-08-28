@extends('admin.layouts.login_after')

@section('style')
    {{-- <link rel="stylesheet" type="text/css" href="https://pixinvent.com/stack-responsive-bootstrap-4-admin-template/app-assets/css/bootstrap-extended.min.css">
    <link rel="stylesheet" type="text/css" href="https://pixinvent.com/stack-responsive-bootstrap-4-admin-template/app-assets/fonts/simple-line-icons/style.min.css">
    <link rel="stylesheet" type="text/css" href="https://pixinvent.com/stack-responsive-bootstrap-4-admin-template/app-assets/css/colors.min.css">
    <link rel="stylesheet" type="text/css" href="https://pixinvent.com/stack-responsive-bootstrap-4-admin-template/app-assets/css/bootstrap.min.css"> --}}
    {{-- https://pixinvent.com/modern-admin-clean-bootstrap-4-dashboard-html-template/html/ltr/vertical-menu-template/icons-simple-line-icons.html --}}
@endsection

@section('content')


<div class="page-body">
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-6">
                    <h3>Dashboard</h3>
                </div>
            </div>
        </div>
    </div>

    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="grey-bg container-fluid">
            <section id="minimal-statistics">

                <div class="row">
                    <div class="col-xl-3 col-sm-6 col-12">
                        <div class="card">
                            <div class="card-content">
                                <div class="card-body text-success">
                                    <div class="media d-flex">
                                        <div class="align-self-center">
                                            <i class="fa fa-user-md fa-5x" aria-hidden="true"></i>
                                        </div>
                                        <div class="media-body text-center">
                                            <h3>{{ App\Models\DoctorProfile::count() }}</h3>
                                            <span>Doctors</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-6 col-12">
                        <div class="card">
                            <div class="card-content">
                                <div class="card-body text-primary">
                                    <div class="media d-flex">
                                        <div class="align-self-center">
                                            <i class="fa fa-comment-o fa-5x"></i>
                                        </div>

                                        <div class="media-body text-center">
                                            <h3>{{ App\Models\PatientReviews::count() }}</h3>
                                            <span>Patient Reviews</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </section>

        </div>
    </div>
    <!-- Container-fluid Ends-->

</div>

@endsection

@section('script')

@endsection
