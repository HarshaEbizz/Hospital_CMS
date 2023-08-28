@extends('admin.layouts.login_after')
@section('content')

<div class="page-body">
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-6">
                    <h3>Speciality Clinic</h3>
                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid starts-->

    <div class="accordion accordion-flush" id="accordionFlushExample">
        <div class="accordion-item news_accordion">
            <h2 class="accordion-header" id="flush-headingOne">
                <button class="accordion-button collapsed news_accro_btn" type="button" data-bs-toggle="collapse" data-bs-target="#collapseone" aria-expanded="true" aria-controls="collapseone">
                    Speciality Clinic Data
                </button>
            </h2>
            <div id="collapseone" class="accordion-collapse collapse " aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                <div class="accordion-body">
                    <div class="container-fluid doctors_profile">
                        <div class="row">
                            <div class="card">
                                <div class="card-body">
                                    <form action="{{ url('/admin/speciality_clinic') }}" method="POST" id="speciality_clinic_form" name="speciality_clinic_form" enctype="multipart/form-data">
                                        @csrf
                                        <div class="row mb-3">
                                            <div class="col-lg-12">
                                                <div class="mb-3">
                                                    <label for="title" class="form-label">Heading</label>
                                                    <input type="text" class="form-control" id="heading" name="heading" value="@if($speciality_clinic){{$speciality_clinic->heading}}@endif" />
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                @php
                                                if($speciality_clinic){
                                                $cover_image = str_replace("/public","",url('/')).'/storage/'.$speciality_clinic->image_path.$speciality_clinic->cover_image;
                                                } @endphp
                                                <div class="mb-3">
                                                    <div class="crop-image-preview-container cover-image-preview-container  @if($speciality_clinic && $cover_image) show @else hide  @endif ">
                                                        <img id="crop-image" @if($speciality_clinic && $cover_image) src="{{$cover_image}}" @endif />
                                                    </div>
                                                    <label for="cover_image" class="form-label">Cover Image</label>
                                                    <input type="file" accept="image/*" class="form-control" id="cover_image" name="cover_image" />
                                                    <input type="text" id="cover_image_url" name="cover_image_url" hidden />
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="mb-3">
                                                    <label for="title" class="form-label">Title</label>
                                                    <input type="text" class="form-control" id="title" name="title" value="@if($speciality_clinic){{$speciality_clinic->title}}@endif" />
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="mb-3">
                                                    <label for="description" class="form-label">Description</label>
                                                    <textarea class="form-control" placeholder="Message " id="description" name="description" style="height: 100px">@if($speciality_clinic){{$speciality_clinic->description}}@endif</textarea>
                                                </div>
                                                <label id="description-error" class="error" for="description"></label>
                                            </div>
                                            <div>
                                                <button class="btn btn_green" type="submit">
                                                    UPDATE
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
        <div class="accordion-item news_accordion">
            <h2 class="accordion-header" id="flush-headingTwo">
                <button class="accordion-button collapsed news_accro_btn border border-bottom-1" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                    Clinic list
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
                                            <table class="display clinic_list" id="basic-1">
                                                <button class="btn right_pop_btn" type="button" data-bs-toggle="modal" data-bs-target="#add_clinic_model" data-whatever="@mdo">
                                                    Add
                                                </button>
                                                <thead>
                                                    <tr>
                                                        <th>Sr No.</th>
                                                        <th>Image</th>
                                                        <th>Clinic Name</th>
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
    <div class="modal fade" id="add_clinic_model" tabindex="-1" aria-labelledby="exampleModalLabel" style="display: none" aria-hidden="true">
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
                            <form action="{{route('admin.clinic.store')}}" method="POST" id="add_clinic_form" name="add_clinic_form" enctype="multipart/form-data">
                                @csrf
                                <div class="row mb-3">
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="name" class="form-label">Clinic name</label>
                                            <input type="text" class="form-control" id="name" name="name">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="Location" class="form-label">Location</label>
                                            <input type="text" class="form-control" id="location" name="location">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="image" class="form-label">Upload Clinic Image</label>
                                            <input class="form-control" type="file" accept="image/*" id="image" name="image">
                                            <input type="text" id="image_url" name="image_url" hidden>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <label for="Description" class="form-label">Description</label>
                                            <div class="form-floating">
                                                <textarea class="form-control" placeholder="Message " id="description" name="description" style="height: 100px"></textarea>
                                            </div>
                                            <label id="description-error" class="error" for="description"></label>
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
    <div class="modal fade" id="edit_clinic_model" tabindex="-1" aria-labelledby="exampleModalLabel" style="display: none" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel2">
                        Edit
                    </h5>
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="card">
                        <div class="card-body">
                            <form action="#" method="POST" id="edit_clinic_form" name="edit_clinic_form" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="row mb-3">
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="edit_name" class="form-label">Clinic name</label>
                                            <input type="text" class="form-control" id="edit_name" name="edit_name">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="edit_location" class="form-label">Location</label>
                                            <input type="text" class="form-control" id="edit_location" name="edit_location">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <div class="crop-image-preview-container image-preview-container">
                                                <img id="crop-image" class="edit_preview-selected-image" />
                                            </div>
                                            <label for="image" class="form-label">Upload Clinic Image</label>
                                            <input class="form-control" type="file" accept="image/*" id="edit_image" name="edit_image">
                                            <input class="form-control" type="text" id="edit_image_url" name="edit_image_url" hidden>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <label for="Description" class="form-label">Description</label>
                                            <div class="form-floating">
                                                <textarea class="form-control" placeholder="Message " id="edit_description" name="edit_description" style="height: 100px"></textarea>
                                            </div>
                                            <label id="description-error" class="error" for="description"></label>
                                        </div>
                                    </div>
                                    <div>
                                        <button class="btn btn_green" type="submit">
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
    <!-- Container-fluid Ends-->
</div>
@endsection
@section('script')
<script src="{{ asset('admin_assets/custom/speciality_clinic.js') }}"></script>
@endsection