@extends('admin.layouts.login_after')
@section('style')
<style>
    .rate {
        float: left;
        height: 46px;
        padding: 0 10px;
    }

    .rate:not(:checked)>input {
        position: absolute;
        top: -9999px;
    }

    .rate:not(:checked)>label {
        float: right;
        width: 1em;
        overflow: hidden;
        white-space: nowrap;
        cursor: pointer;
        font-size: 30px;
        color: #ccc;
    }

    .rate:not(:checked)>label:before {
        content: '★ ';
    }

    .rate>input:checked~label {
        color: #ffc700;
    }

    .rate:not(:checked)>label:hover,
    .rate:not(:checked)>label:hover~label {
        color: #deb217;
    }

    .rate>input:checked+label:hover,
    .rate>input:checked+label:hover~label,
    .rate>input:checked~label:hover,
    .rate>input:checked~label:hover~label,
    .rate>label:hover~input:checked~label {
        color: #c59b08;
    }
</style>
@endsection
@section('content')
<div class="page-body">
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-6">
                    <h3>Patient reviews</h3>
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
                            <table class="display" id="review_table">
                                <button class="btn right_pop_btn" type="button" data-bs-toggle="modal" data-bs-target="#addReviewModal">
                                    Add Review
                                </button>

                                <thead>
                                    <tr>
                                        <th>Sr No.</th>
                                        <th>Feedback type</th>
                                        <th>Speciality</th>
                                        <!-- <th>Status</th> -->
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
    <div class="modal fade" id="addReviewModal" tabindex="-1" aria-labelledby="exampleModalLabel" style="display: none" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">

            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel2">
                        Add Review
                    </h5>
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <div class="row mb-3">
                        <form action="{{ url('/admin/patient_reviews') }}" method="POST" id="add_review_form" name="add_review_form" class="form-inline" enctype="multipart/form-data">
                            @csrf
                            <div class="col-lg-6 pe-2">
                                <div class="mb-3">
                                    <label for="speciality_id" class="form-label">Feedback Type</label>
                                    <select id="feedback_type" class="js-states form-select custom_select" name="feedback_type" required>
                                        <option value="write" selected>Write Message</option>
                                        <option value="video">Video Message</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6 pe-2">
                                <div class="mb-3">
                                    <label for="speciality_id" class="form-label">Speciality</label>
                                    <select id="speciality_id" class="js-states form-select custom_select" name="speciality_id" required>
                                        <option value="" selected disabled>Select Speciality</option>
                                        @foreach ($specialities as $specialitie)
                                        <option value="{{ $specialitie->id }}">{{ $specialitie->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6 pe-2">
                            </div>
                            <div class="col-lg-6 pe-2">
                                <label id="speciality_id-error" class="error" for="speciality_id" style="display:none"></label>
                            </div>
                            <div id="form_content" class="row col-lg-12">

                            </div>
                            <div class="col-lg-12">
                                <button class="btn btn_green" type="submit">
                                    ADD
                                </button>
                                <button class="btn btn-primary" type="button" data-bs-dismiss="modal">
                                    Cancel
                                </button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="EditReviewModal" tabindex="-1" aria-labelledby="exampleModalLabel" style="display: none" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">

            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel2">
                        Edit Review
                    </h5>
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <div class="row mb-3">
                        <form action="#" method="POST" id="edit_review_form" name="edit_review_form" class="form-inline" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="col-lg-6 pe-2">
                                <div class="mb-3">
                                    <label for="edit_feedback_type" class="form-label">Feedback Type</label>
                                    <select id="edit_feedback_type" class="js-states form-select custom_select" name="edit_feedback_type" required>
                                        <option value="write" >Write Message</option>
                                        <option value="video">Video Message</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6 pe-2">
                                <div class="mb-3">
                                    <label for="edit_speciality_id" class="form-label">Speciality</label>
                                    <select id="edit_speciality_id" class="js-states form-select custom_select" name="edit_speciality_id" required>
                                        <option value="" selected disabled>Select Speciality</option>
                                        @foreach ($specialities as $specialitie)
                                        <option value="{{ $specialitie->id }}">{{ $specialitie->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6 pe-2">
                            </div>
                            <div class="col-lg-6 pe-2">
                                <label id="edit_speciality_id-error" class="error" for="edit_speciality_id" style="display:none"></label>
                            </div>
                            <div id="edit_form_content" class="row col-lg-12">

                            </div>


                            <div class="col-lg-12">
                                <button class="btn btn_green" type="submit">
                                    Update
                                </button>
                                <button class="btn btn-primary" type="button" data-bs-dismiss="modal">
                                    Cancel
                                </button>
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
<script type="text/javascript" src="{{ asset('admin_assets/custom/patient_reviews.js') }}"></script>
@endsection
