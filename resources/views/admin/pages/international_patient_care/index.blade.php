@extends('admin.layouts.login_after')
@section('content')
<div class="page-body">
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-6">
                    <h3>International Patient Care</h3>
                </div>
            </div>
        </div>
    </div>
    <!-- ------ -->
    <div class="accordion accordion-flush" id="accordionFlushExample">
        <div class="accordion-item news_accordion">
            <h2 class="accordion-header" id="flush-headingOne">
                <button class="accordion-button collapsed news_accro_btn" type="button" data-bs-toggle="collapse" data-bs-target="#collapseone" aria-expanded="true" aria-controls="collapseone">
                    International Patient Care
                </button>
            </h2>
            <div id="collapseone" class="accordion-collapse collapse " aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                <div class="accordion-body">
                    <div class="container-fluid doctors_profile">
                        <div class="row">
                            <div class="card">
                                <div class="card-body">
                                    <form action="{{ url('/admin/international_patient_care/main') }}" method="POST" id="patient_cares_form" name="patient_cares_form" enctype="multipart/form-data">
                                        @csrf
                                        <div class="row mb-3">
                                            <div class="col-lg-12">
                                                <div class="mb-3">
                                                    <label for="title" class="form-label">Heading</label>
                                                    <input type="text" class="form-control" id="heading" name="heading" value="@if($patient_cares){{$patient_cares->heading}}@endif" />
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                @php
                                                if($patient_cares){
                                                $cover_image = str_replace("/public","",url('/')).'/storage/'.$patient_cares->image_path.$patient_cares->cover_image;
                                                } @endphp
                                                <div class="mb-3">
                                                    <div class="crop-image-preview-container cover-image-preview-container  @if($patient_cares && $cover_image) show @else hide  @endif ">
                                                        <img id="crop-image" @if($patient_cares && $cover_image) src="{{$cover_image}}" @endif />
                                                    </div>
                                                    <label for="cover_image" class="form-label">Cover Image</label>
                                                    <input type="file" accept="image/*" class="form-control" id="cover_image" name="cover_image" />
                                                    <input type="text" class="form-control" id="cover_image_url" name="cover_image_url" hidden />
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="mb-3">
                                                    <label for="title" class="form-label">Title</label>
                                                    <input type="text" class="form-control" id="title" name="title" value="@if($patient_cares){{$patient_cares->title}}@endif" />
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="mb-3">
                                                    <label for="description" class="form-label">Description</label>
                                                    <textarea class="form-control" placeholder="Message " id="description" name="description" style="height: 100px">@if($patient_cares){{$patient_cares->description}}@endif</textarea>
                                                </div>
                                                <label id="description-error" class="error" for="description"></label>
                                            </div>
                                            <div class="col-lg-12">
                                                @php
                                                if($patient_cares){
                                                $image_name = str_replace("/public","",url('/')).'/storage/'.$patient_cares->image_path.$patient_cares->image_name;
                                                } @endphp
                                                <div class="mb-3">
                                                    <div class="crop-image-preview-container image-preview-container  @if($patient_cares && $image_name) show @else hide  @endif ">
                                                        <img id="crop-image" @if($patient_cares && $image_name) src="{{$image_name}}" @endif />
                                                    </div>
                                                    <label for="image" class="form-label">Image</label>
                                                    <input type="file" accept="image/*" class="form-control" id="image" name="image" />
                                                    <input type="text" class="form-control" id="image_url" name="image_url" hidden />
                                                </div>
                                            </div>
                                            <div>
                                                <button class="btn btn_green" type="submit">
                                                    UPDATE
                                                </button>
                                                <!-- <button class="btn btn-primary" type="button" data-bs-dismiss="modal">
                                                    Cancel
                                                </button> -->
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="accordion-item news_accordion">
            <h2 class="accordion-header" id="flush-headingTwo">
                <button class="accordion-button collapsed news_accro_btn  border border-bottom-1" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                    International Patient Care Content
                </button>
            </h2>
            <div id="collapseTwo" class="accordion-collapse collapse " aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                <div class="accordion-body">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="table-responsive big tableinsidetable">
                                            <table class="display caretopic_table" id="basic-1">
                                                <button class="btn right_pop_btn add_message" type="button" data-bs-toggle="modal" data-bs-target="#add_content_model" data-whatever="@mdo">
                                                    Add
                                                </button>
                                                <thead>
                                                    <tr>
                                                        <th>Sr No.</th>
                                                        <th>Topic</th>
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="add_content_model" tabindex="-1" aria-labelledby="exampleModalLabel" style="display: none" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel2">
                        ADD
                    </h5>
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ url('/admin/international_patient_care') }}" method="POST" id="patient_cares_content_form" name="patient_cares_content_form">
                                @csrf
                                <div class="row mb-3">
                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <label for="topic" class="form-label">Topic</label>
                                            <input type="text" class="form-control" id="topic" name="topic">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <label for="details" class="form-label">Details</label>
                                            <div class="form-floating" id="details_textarea">
                                                <textarea class="form-control" placeholder="details " id="details" name="details" style="height: 100px"></textarea>
                                            </div>
                                            <label id="details-error" class="error" for="details"></label>
                                        </div>
                                    </div>
                                    <div>
                                        <button class="btn btn_green" type="submit">
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
        </div>
    </div>
    <div class="modal fade" id="edit_content_model" tabindex="-1" aria-labelledby="exampleModalLabel" style="display: none" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel2">
                        ADD
                    </h5>
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="card">
                        <div class="card-body">
                            <form action="" method="POST" id="edit_patient_cares_content_form" name="edit_patient_cares_content_form">
                                @csrf
                                @method('PUT')
                                <div class="row mb-3">
                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <label for="edit_topic" class="form-label">Topic</label>
                                            <input type="text" class="form-control" id="edit_topic" name="edit_topic">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="mb-3 ">
                                            <label for="edit_details" class="form-label">Details</label>
                                            <div class="form-floating" id="edit_details_textarea">
                                                <textarea class="form-control" placeholder="details " id="edit_details" name="edit_details" style="height: 100px"></textarea>
                                            </div>
                                            <label id="edit_details-error" class="error" for="edit_details"></label>
                                        </div>
                                    </div>
                                    <div>
                                        <button class="btn btn_green" type="submit">
                                            Update
                                        </button>
                                        <button class="btn btn-primary" data-bs-dismiss="modal" type="button">
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
</div>
@endsection
@section('script')
<script src="{{ asset('admin_assets/custom/international_patient_care.js') }}"></script>
@endsection