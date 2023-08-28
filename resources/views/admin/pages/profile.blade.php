@extends('admin.layouts.login_after')
@section('content')

<div class="page-body">
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-6">
                    <h3>Profile</h3>
                </div>
                <div class="col-6">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="{{ url('/admin') }}"> <i data-feather="home"></i></a>
                        </li>
                        <li class="breadcrumb-item">App Data Management </li>
                        <li class="breadcrumb-item active">Profile</li>
                    </ol>
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
                        <div class="profile-management-wra">
                            <form action="{{ url('/admin/profile/update') }}" method="POST" id="profile_form" name="profile_form" enctype="multipart/form-data">
                                <div class="row">
                                    <h3 class="change-pass-title mt-0 mb-2">✧ Profile Settings</h3>
                                    <div class="col-lg-3 col-md-6 col-sm-12">
                                        <div class="position-relative">
                                            <img class="col-12 profilr_pic" src="{{ (Auth::guard('admin')->user()->image == '' || Auth::guard('admin')->user()->image == NULL)?asset('admin_assets/images/logo_avtar.png'):str_replace("/public","",url('/')).'/storage/app/public/uploads/admin_profile/'. Auth::guard('admin')->user()->image; }}" style="height:250px;width:250px;" />
                                            <div class="profile_edit_del">
                                                <!-- <button class="btn btn-danger btn-icon-text edit_photo"> <i class="fa fa-solid fa-pencil"></i></button> -->
                                                <a class="btn btn-icon-text  delete_photo "> <i class="fa fa-solid fa-trash"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-9 col-md-6 col-sm-12">
                                        <div class="row">
                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                <div class="form-group mb-2">
                                                    <label for="first_name">First name</label>
                                                    <input type="text" class="form-control" placeholder="John" id="first_name" name="first_name"  value="{{ Auth::guard('admin')->user()->first_name }}">
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                <div class="form-group mb-2">
                                                    <label for="last_name">Last name</label>
                                                    <input type="tett" class="form-control" placeholder="poole" id="last_name" name="last_name"  value="{{ Auth::guard('admin')->user()->last_name }}">
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                <div class="form-group">
                                                    <label for="file">Upload profile photo</label>
                                                    <div class="file-upload">
                                                        <div class="file-select">
                                                            <input type="file" accept="image/*" name="image" class="chooseFile form-control" id="file" >
                                                            <input type="text" id="file_url" value="file_url" name="file_url" hidden >
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                <div class="form-group">
                                                    <label for="email">Email address</label>
                                                    <input type="email" class="form-control" placeholder="email@gmail.com" id="email" name="email"  value="{{ Auth::guard('admin')->user()->email }}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="profile-management-btn">
                                    <button class="btn btn-secondary mt-4 modelbtn" style="margin-right: 10px;" data-bs-original-title="" title="">Cancel</button>
                                    <button class="btn btn-primary mt-4 btn-block" type="submit">Save</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <div class="profile-management-wra">
                            <form action="{{ url('/admin/password/update') }}" method="POST" id="update_password_form" name="update_password_form">
                                <div class="row">
                                    <h3 class="change-pass-title mt-0 mb-2">✧ Password Setting</h3>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group mb-2">
                                            <label for="current_pass">Current password</label>
                                            <input type="password" class="form-control" placeholder="********" id="current_password" name="current_password" >
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group mb-2">
                                            <label for="new_pass">New password</label>
                                            <input type="password" class="form-control" placeholder="********" id="new_password" name="new_password" >
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group mb-2">
                                            <label for="confirm_pass">Confirm password</label>
                                            <input type="password" class="form-control" placeholder="********" id="new_password_confirmation" name="new_password_confirmation" >
                                        </div>
                                    </div>
                                </div>
                                <div class="profile-management-btn">
                                    <button class="btn btn-secondary mt-4 modelbtn" style="margin-right: 10px;">Cancel</button>
                                    <button class="btn btn-primary mt-4 btn-block" type="submit">Save</button>
                                </div>
                            </form>
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
<script type="text/javascript" src="{{ asset('admin_assets/custom/admin_profile.js') }}"></script>
@endsection