@extends('admin.layouts.login_after')
@section('style')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/16.0.8/css/intlTelInput.css" />
    <style>
        .iti {
            width: 100%;
        }
    </style>
@endsection
@section('content')
    <div class="page-body">
        <div class="container-fluid">
            <div class="page-title">
                <div class="row">
                    <div class="col-6">
                        <h3>Patients Guide & Services</h3>
                    </div>
                </div>
            </div>
        </div>
        <!-- ------ -->
        <div class="container-fluid doctors_profile">
            <div class="card">
                <div class="card-body">
                    <h5>Create</h5>
                    <form action="{{ route('admin.patients_guide_service.store') }}" method="POST" id="guide_services_form"
                        name="guide_services_form" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-3">
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <label for="title" class="form-label">Heading</label>
                                    <input type="text" class="form-control" id="heading" name="heading" />
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <label for="cover_image" class="form-label">Cover Image</label>
                                    <input type="file" accept="image/*" class="form-control" id="cover_image" name="cover_image" />
                                    <input type="text" class="form-control" id="cover_image_url" name="cover_image_url"
                                        hidden />
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <label for="title" class="form-label">Title</label>
                                    <input type="text" class="form-control" id="title" name="title" />
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <label for="contact_no" class="form-label">Mobile Number</label>
                                    <input type="hidden" name="country_code" id="country_code" />
                                    <div class="form-group inline_drop">
                                        <input class="form-control left_icon_input" type="number" name="contact_no"
                                            id="contact_no" />
                                    </div>
                                </div>
                                <label id="contact_no-error" class="error" for="contact_no"></label>
                            </div>
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <label for="image" class="form-label">Image</label>
                                    <input type="file" accept="image/*" class="form-control" id="image" name="image" />
                                    <input type="text" class="form-control" id="image_url" name="image_url" hidden />
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <label for="description" class="form-label">Description</label>
                                    <textarea class="form-control" placeholder="Message " id="description" name="description" style="height: 100px"></textarea>
                                </div>
                                <label id="description-error" class="error" for="description"></label>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <h3>Content</h3>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <input class="tgl " type="checkbox" data-toggle="toggle" data-width="200"
                                        data-height="30" id="add_content" name="add_content" data-on="Add content"
                                        data-off="Remove content" data-onstyle="success" data-offstyle="danger" checked>
                                    {{-- <button type="button" class="btn btn-success btn-rounded btn-icon" id="add_content">Content &nbsp;<i class="fa fa-solid fa-plus"></i></button> --}}
                                </div>
                            </div>
                            <div class="row" id="add_content_inputs">
                                <div class="content_card hide" id="content_card">
                                    <div class="card-body">
                                        <div class="row mb-3">
                                            <div class="col-lg-12">
                                                <div class="mb-3">
                                                    <label for="name" class="form-label">Title</label>
                                                    <input type="text" class="form-control" id="sub_title"
                                                        name="sub_title" class="content_title" />
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="mb-3">
                                                    <label for="details" class="form-label">Details</label>
                                                    <textarea class="form-control content_details" placeholder="Message " id="details" name="details"
                                                        style="height: 100px"></textarea>
                                                </div>
                                                <label id="details-error" class="error" for="details"></label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <button class="btn btn_green" type="submit">
                                    Create
                                </button>
                                <a class="btn btn-secondary modelbtn" type="button"
                                    href="{{ route('admin.patients_guide_service.index') }}">
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/16.0.8/js/intlTelInput-jquery.min.js"></script>
    <script>
        $('#contact_no').intlTelInput({
            preferredCountries: ['in'],
            separateDialCode: true,
            utilsScript: "//cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.3/js/utils.js"
        });
    </script>
    <script src="{{ asset('admin_assets/custom/guide_service.js') }}"></script>
@endsection
