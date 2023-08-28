@extends('admin.layouts.login_after')
@section('content')
    <div class="page-body">
        <div class="container-fluid">
            <div class="page-title">
                <div class="row">
                    <div class="col-6">
                        <h3>Add Specialities</h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid doctors_profile">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin.specialities.store') }}" method="POST" id="add_specialities_form "
                        name="add_specialities_form" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-3">
                            <input type="hidden" name="specialities_id" id="specialities_id" value="0">
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <label for="name" class="form-label">Specialities Name</label>
                                    <input type="text" class="form-control" id="name" name="name" />
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <div class="crop-image-preview-container">
                                        <img id="crop-image" class="top_img_preview" />
                                    </div>
                                    <label for="top_cover_image" class="form-label">Top Banner Image</label>
                                    <input type="file" accept="image/*" class="form-control image" id="top_cover_image"
                                        name="top_cover_image" />
                                    <input type="text" class="form-control image" id="top_cover_image_url"
                                        name="top_cover_image_url" hidden />
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <div class="crop-image-preview-container">
                                        <img id="crop-image" class="bottom_img_preview" />
                                    </div>
                                    <label for="bottom_cover_image" class="form-label">Bottom Banner Image</label>
                                    <input type="file" accept="image/*" class="form-control image" id="bottom_cover_image"
                                        name="bottom_cover_image" />
                                    <input type="text" class="form-control image" id="bottom_cover_image_url"
                                        name="bottom_cover_image_url" hidden />
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <label for="banner_text" class="form-label">Banner text</label>
                                    <textarea class="form-control" placeholder="Message " id="banner_text" name="banner_text" style="height: 100px"></textarea>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <label for="description" class="form-label">Description</label>
                                    <textarea class="form-control" placeholder="Message " id="description" name="description" style="height: 100px"></textarea>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <label for="bottom_banner_status" class="form-label">Bottom banner status</label>
                                    <div class="form-floating">
                                        <input class="tgl bottom_banner_status_btn" type="checkbox" data-toggle="toggle"
                                            data-width="100" id="bottom_banner_status" name="bottom_banner_status"
                                            data-on="Show" data-off="Hide" data-onstyle="success" data-offstyle="danger">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <h3>Content</h3>
                                </div>
                            </div>
                            <div class="col-lg-4 pe-2">
                                <div class="mb-3">
                                    <label for="content_type" class="form-label">Content Type</label>
                                    <select class="form-select form-select custom_select" name="content_type"
                                        id="content_type" required>
                                        <option value="" selected disabled>Select Content Type</option>
                                        <option value="image_content">Image & Content</option>
                                        <option value="content">Content</option>
                                        <option value="image">Image</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="mb-3" style="margin-top: 28px;">
                                    <button type="button" class="btn btn-success btn-rounded btn-icon spec_img_btn"
                                        id="add_content" style="height: 38px;">Add Content &nbsp;
                                        {{-- <i class="fa fa-solid fa-plus" ></i> --}}
                                    </button>
                                </div>
                            </div>
                            <div class="row" id="add_content_inputs">
                            </div>
                            <div>
                                <button class="btn btn_green" type="submit">
                                    ADD
                                </button>
                                <a class="btn btn-secondary modelbtn" type="button"
                                    href="{{ route('admin.specialities.index') }}">
                                    Close
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script src="{{ asset('admin_assets/custom/specialities.js') }}"></script>
@endsection
