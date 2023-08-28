@extends('admin.layouts.login_after')
@section('content')
<div class="page-body">
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-6">
                    <h3>Job Post</h3>
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
                            <table class="display" id="careers_table">
                                <button class="btn left_pop_btn alert_message" type="button" style="background-color: burlywood;">
                                    Job alert message
                                </button>
                                <button class="btn right_pop_btn" type="button" data-bs-toggle="modal" data-bs-target="#addOpeningModal" data-bs-original-title="" title="">
                                    Add Job Opening
                                </button>

                                <thead>
                                    <tr>
                                        <th>Sr No.</th>
                                        <th>Department</th>
                                        <th>Designation</th>
                                        <th>Opening</th>
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
    <div class="modal fade" id="addOpeningModal" tabindex="-1" aria-labelledby="exampleModalLabel" style="display: none" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel2">
                        Add Job Opening
                    </h5>
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close" data-bs-original-title="" title=""></button>
                </div>

                <div class="modal-body">

                    <div class="row mb-3">
                        <form action="{{ url('/admin/careers') }}" method="POST" id="add_opening_form" name="add_opening_form" class="form-inline" enctype="multipart/form-data">
                            @csrf
                            <div class="col-lg-6 pe-2">
                                <div class="mb-3">
                                    <label for="recuirement_dept" class="form-label">Recuirement department</label>
                                    <select class="form-select custom_select" id="recuirement_dept" name="recuirement_dept">
                                        <option value="" disabled>Select Recuirement department</option>
                                        <option value="clinical">Clinical department</option>
                                        <option value="non_clinical">Non-Clinical department</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6 pe-2">
                                <div class="mb-3">
                                    <label for="department_name" class="form-label">Department Name</label>
                                    <input type="text" class="form-control" id="department_name" name="department_name" />
                                </div>
                            </div>
                            <div class="col-lg-6 pe-2">
                            </div>
                            <div class="col-lg-6 pe-2">
                                <label id="department_name-error" class="error" for="department_name" style="display:none"></label>
                            </div>
                            <div class="col-lg-6 pe-2">
                                <div class="mb-3">
                                    <label for="designation" class="form-label">Designation</label>
                                    <input type="text" class="form-control" id="designation" name="designation" />
                                </div>
                            </div>
                            <div class="col-lg-6 pe-2">
                                <div class="mb-3">
                                    <label for="location" class="form-label">Location</label>
                                    <input type="text" class="form-control" id="location" name="location" />
                                </div>
                            </div>
                            <div class="col-lg-6 pe-2">
                                <label id="designation-error" class="error" for="designation" style="display:none"></label>
                            </div>
                            <div class="col-lg-6 pe-2">
                                <label id="location-error" class="error" for="location" style="display:none"></label>
                            </div>
                            <div class="col-lg-6 pe-2">
                                <div class="mb-3">
                                    <label for="opening" class="form-label">No. of Opening</label>
                                    <input type="number" class="form-control" id="opening" name="opening" min=1 max=100 />
                                </div>
                            </div>
                            <div class="col-lg-6 pe-2">
                                <div class="mb-3">
                                    <label for="experience" class="form-label">Experience</label>
                                    <input type="text" class="form-control" id="experience" name="experience" />
                                </div>
                            </div>
                            <div class="col-lg-6 pe-2">
                                <label id="opening-error" class="error" for="opening" style="display:none"></label>
                            </div>
                            <div class="col-lg-6 pe-2">
                                <label id="experience-error" class="error" for="experience" style="display:none"></label>
                            </div>
                            <div class="col-lg-12 pe-2">
                                <div class="mb-3">
                                    <label for="qualification" class="form-label">Qualification</label>
                                    <input type="text" class="form-control" id="qualification" name="qualification" />
                                </div>
                            </div>
                            <div class="col-lg-12 ">
                                <div class="mb-3">
                                    <label for="description" class="form-label">Job Description</label>
                                    <div class="form-floating">
                                        <textarea class="form-control" placeholder="Description" id="description" name="description" style="height: 100px"></textarea>
                                        <label for="floatingTextarea2"></label>
                                    </div>
                                    <label id="description-error" class="error" for="description"></label>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <button class="btn btn-primary" type="submit" data-bs-original-title="" title="">
                                        Add
                                    </button>
                                    <button class="btn btn-secondary modelbtn" type="button" data-bs-dismiss="modal">
                                        Close
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="editOpeningModal" tabindex="-1" aria-labelledby="exampleModalLabel" style="display: none" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel2">
                        Edit Job Opening
                    </h5>
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close" data-bs-original-title="" title=""></button>
                </div>

                <div class="modal-body">

                    <div class="row mb-3">
                        <form action="" method="POST" id="edit_opening_form" name="edit_opening_form" class="form-inline" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="col-lg-6 ">
                                <div class="mb-3">
                                    <label for="edit_recuirement_dept" class="form-label">Recuirement department</label>
                                    <select class="form-select custom_select" id="edit_recuirement_dept" name="edit_recuirement_dept">
                                        <option value="" disabled>Select Recuirement department</option>
                                        <option value="clinical">Clinical department</option>
                                        <option value="non_clinical">Non-Clinical department</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6 ">
                                <div class="mb-3">
                                    <label for="edit_department_name" class="form-label">Department Name</label>
                                    <input type="text" class="form-control" id="edit_department_name" name="edit_department_name" />
                                </div>
                            </div>
                            <div class="col-lg-6 ">
                                <div class="mb-3">
                                    <label for="edit_designation" class="form-label">Designation</label>
                                    <input type="text" class="form-control" id="edit_designation" name="edit_designation" />
                                </div>
                            </div>
                            <div class="col-lg-6 ">
                                <div class="mb-3">
                                    <label for="edit_location" class="form-label">Location</label>
                                    <input type="text" class="form-control" id="edit_location" name="edit_location" />
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="edit_opening" class="form-label">No. of Opening</label>
                                    <input type="number" class="form-control" id="edit_opening" name="edit_opening" min=1 max=100  />
                                </div>
                            </div>
                            <div class="col-lg-6 ">
                                <div class="mb-3">
                                    <label for="edit_experience" class="form-label">Experience</label>
                                    <input type="text" class="form-control" id="edit_experience" name="edit_experience" />
                                </div>
                            </div>
                            <div class="col-lg-12 ">
                                <div class="mb-3">
                                    <label for="edit_qualification" class="form-label">Qualification</label>
                                    <input type="text" class="form-control" id="edit_qualification" name="edit_qualification" />
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <label for="edit_description" class="form-label">JOb Description</label>
                                    <div class="form-floating">
                                        <textarea class="form-control" placeholder="Description" id="edit_description" name="edit_description" style="height: 100px"></textarea>
                                        <label for="floatingTextarea2"></label>
                                    </div>
                                    <label id="description-error" class="error" for="description"></label>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <button class="btn btn-primary" type="submit" data-bs-original-title="" title="">
                                        Update
                                    </button>
                                    <button class="btn btn-secondary modelbtn" type="button" data-bs-dismiss="modal">
                                        Close
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="addAlertMsgModal" tabindex="-1" aria-labelledby="exampleModalLabel" style="display: none" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel2">
                        Alert Message
                    </h5>
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close" data-bs-original-title="" title=""></button>
                </div>

                <div class="modal-body">

                    <div class="row mb-3">
                        <form action="{{route('admin.alert_msg_store')}}" method="POST" id="alert_msg_from" name="alert_msg_from">
                            @csrf
                            <div class="row mb-3">
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <label for="title" class="form-label">Title</label>
                                        <input type="text" class="form-control" id="title" name="title" />
                                        @if ($errors->has('title'))
                                        <span class="text-danger invalid">{{ $errors->first('title') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <label for="message" class="form-label">Message</label>
                                        <div class="form-floating" id="message_textarea">
                                            <textarea class="form-control" placeholder="Message " id="message" name="message" style="height: 100px"></textarea>
                                            <!-- <label for="floatingTextarea2"></label> -->
                                        </div>
                                        @if ($errors->has('message'))
                                        <span class="text-danger invalid">{{ $errors->first('message') }}</span>
                                        @endif
                                        <label id="message-error" class="error" for="message"></label>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <label for="is_show" class="form-label">status</label>
                                        <div class="form-floating">
                                            <input type="checkbox" data-toggle="toggle" data-width="100" id="is_show" name="is_show" data-on="Show" data-off="Hide" data-onstyle="success" data-offstyle="danger" >
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
</div>
@endsection
@section('script')
<script type="text/javascript" src="{{ asset('admin_assets/custom/careers.js') }}"></script>
@endsection
