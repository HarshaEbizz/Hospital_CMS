@extends('admin.layouts.login_after')
@section('content')
@php
$setting = App\Models\Setting::get();
$LOGO = collect($setting)->where('setting_key', 'HOSPITAL_LOGO')->first();
@endphp
<div class="page-body">
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-6">
                    <h3>Settings</h3>
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
                            <table class="display setting_list" id="basic-1">
                                <button class="btn left_pop_btn hospital_logo" type="button" style="background-color: burlywood;" id="@if(isset($LOGO)) {{$LOGO->id}} @endif">
                                    Hospital logo
                                </button>
                                <button class="btn right_pop_btn" type="button" data-bs-toggle="modal" data-bs-target="#add_setting" data-whatever="@mdo" data-bs-original-title="" title="">
                                    Add
                                </button>
                                <thead>
                                    <tr>
                                        <th>Sr No.</th>
                                        <th>Key</th>
                                        <th>Value</th>
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

<div class="modal fade" id="add_setting" tabindex="-1" aria-labelledby="exampleModalLabel" style="display: none" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel2">
                    Add Setting
                </h5>
                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close" data-bs-original-title="" title=""></button>
            </div>

            <div class="modal-body">
                <form action="{{route('admin.setting.store')}}" method="POST" id="add_setting_from" name="add_setting_from">
                    @csrf
                    <div class="col-lg-12">
                        <div class="mb-3">
                            <label for="setting_key" class="form-label">Setting Key</label>
                            <input type="text" class="form-control" id="setting_key" name="setting_key" />
                        </div>
                        <div class="mb-3">
                            <label for="setting_value" class="form-label">Setting Value</label>
                            <input type="text" class="form-control" id="setting_value" name="setting_value" />
                        </div>
                    </div>
                    <div>
                        <button class="btn btn_green" type="submit" title="">
                            ADD
                        </button>
                        <button class="btn btn-primary" type="button" data-bs-dismiss="modal">
                            Cancel
                        </button>
                    </div>
            </div>
            </form>
        </div>
    </div>
</div>
</div>

<div class="modal fade" id="edit_setting_model" tabindex="-1" aria-labelledby="exampleModalLabel" style="display: none" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel2">
                    Edit Setting
                </h5>
                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close" data-bs-original-title="" title=""></button>
            </div>

            <div class="modal-body">
                <form action="#" method="POST" id="edit_setting_form" name="edit_setting_form">
                    @method('put')
                    @csrf
                    <div class="row mb-3">
                        <div class="col-lg-12">
                            <div class="mb-3">
                                <label for="setting_key_edit" class="form-label">Setting Key</label>
                                <input type="text" class="form-control" id="setting_key_edit" name="setting_key" readonly />
                                @if ($errors->has('setting_key'))
                                <span class="text-danger invalid">{{ $errors->first('setting_key') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="mb-3">
                                <label for="setting_value_edit" class="form-label">Setting Value</label>
                                <input class="form-control" id="setting_value_edit" name="setting_value">
                                @if ($errors->has('setting_value'))
                                <span class="text-danger invalid">{{ $errors->first('setting_value') }}</span>
                                @endif
                            </div>
                        </div>
                        <div>
                            <button class="btn btn_green" type="submit" title="">
                                UPDATE
                            </button>
                            <button class="btn btn-primary" type="button" data-bs-dismiss="modal">
                                Cancel
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="hospital_logo_modal" tabindex="-1" aria-labelledby="exampleModalLabel" style="display: none" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel2">
                    Hospital Logo
                </h5>
                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close" data-bs-original-title="" title=""></button>
            </div>

            <div class="modal-body">
                <div class="row mb-3">
                    <form action="#" method="POST" id="update_logo_from" name="update_logo_from" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <input type="text" class="form-control" id="setting_key" name="setting_key" hidden value="HOSPITAL_LOGO" />
                        <div class="row mb-3">
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <div class="crop-image-preview-container ">
                                        <img id="crop-image" class="img_preview" />
                                    </div>
                                    <label for="logo" class="form-label">Logo</label>
                                    <input type="file" accept="image/*" class="form-control" id="logo" name="logo" />
                                    <!-- <input type="text" class="form-control" id="logo_url" name="logo_url" hidden /> -->
                                    @if ($errors->has('logo'))
                                    <span class="text-danger invalid">{{ $errors->first('logo') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <label for="status" class="form-label">Status</label>
                                    <div class="form-floating">
                                        <input type="checkbox" checked data-toggle="toggle" data-width="100" id="status" name="status" data-on="Show" data-off="Hide" data-onstyle="success" data-offstyle="danger">
                                    </div>
                                </div>
                            </div>
                            <div>
                                <button class="btn btn_green" type="submit" title="">
                                    Update
                                </button>
                                <button class="btn btn-primary" type="button" data-bs-dismiss="modal">
                                    Cancel
                                </button>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
<script type="text/javascript" src="{{ asset('admin_assets/custom/setting.js') }}"></script>
@endsection