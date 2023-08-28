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
                    <h5>Update</h5>
                    <form action="{{ route('admin.patients_guide_service.update', $guide_service->id) }}" method="POST"
                        id="edit_guide_services_form" name="edit_guide_services_form" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row mb-3">
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <label for="title" class="form-label">Heading</label>
                                    <input type="text" class="form-control" id="heading" name="heading"
                                        value="{{ $guide_service->heading }}" />
                                </div>
                            </div>
                            <div class="col-lg-12">
                                @php
                                    if ($guide_service) {
                                        $image = str_replace('/public', '', url('/')) . '/storage/' . $guide_service->image_path . $guide_service->cover_image;
                                } @endphp
                                <div class="mb-3">
                                    <div
                                        class="crop-image-preview-container cover-image-preview-container @if ($guide_service->cover_image) show @else hide @endif">
                                        <img id="crop-image"
                                            @if ($guide_service->cover_image) src="{{ $image }}" @endif />
                                    </div>
                                    <label for="cover_image" class="form-label">Cover Image</label>
                                    <input type="file" accept="image/*" class="form-control" id="cover_image" name="cover_image" />
                                    <input type="text" class="form-control" id="cover_image_url" name="cover_image_url"
                                        hidden />
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <label for="title" class="form-label">Title</label>
                                    <input type="text" class="form-control" id="title" name="title"
                                        value="{{ $guide_service->title }}" />
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <label for="contact_no" class="form-label">Mobile Number</label>
                                    @php $code = (explode('-',trim($guide_service->contact_no))); @endphp
                                    <input type="hidden" name="field_phone" id="field_phone"
                                        @if ($guide_service->contact_no) value="+{{ $code[0] }}{{ $code[1] }}" @endif />
                                    <input type="hidden" name="country_code" id="country_code" value="" />
                                    <div class="form-group inline_drop">
                                        <input class="form-control left_icon_input" type="number" name="contact_no"
                                            id="contact_no"
                                            @if ($guide_service->contact_no) value="{{ $code[1] }}" @endif />
                                    </div>
                                </div>
                                <label id="contact_no-error" class="error" for="contact_no"></label>
                            </div>
                            <div class="col-lg-12">
                                @php
                                    if ($guide_service) {
                                        $image = str_replace('/public', '', url('/')) . '/storage/' . $guide_service->image_path . $guide_service->image_name;
                                } @endphp
                                <div class="mb-3">
                                    <div
                                        class="crop-image-preview-container image-preview-container @if ($guide_service->image_name) show @else hide @endif">
                                        <img id="crop-image"
                                            @if ($guide_service->image_name) src="{{ $image }}" @endif />
                                    </div>
                                    <label for="image" class="form-label">Image</label>
                                    <input type="file" accept="image/*" class="form-control" id="image" name="image" />
                                    <input type="text" class="form-control" id="image_url" name="image_url" hidden />
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <label for="description" class="form-label">Description</label>
                                    <textarea class="form-control" placeholder="Message " id="description" name="description" style="height: 100px">{!! $guide_service->description !!}</textarea>
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
                                </div>
                            </div>
                            <div class="row" id="add_content_inputs">
                                <div class="content_card  @if ($guide_service->sub_title) @else hide @endif "
                                    id="content_card">
                                    <div class="card-body">
                                        <div class="row mb-3">
                                            <div class="col-lg-12">
                                                <div class="mb-3">
                                                    <label for="name" class="form-label">Title</label>
                                                    <input type="text" class="form-control" id="sub_title"
                                                        name="sub_title" class="content_title"
                                                        value="{{ $guide_service->sub_title }}" />
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="mb-3">
                                                    <label for="details" class="form-label">Details</label>
                                                    <textarea class="form-control content_details" placeholder="Message " id="details" name="details"
                                                        style="height: 100px">{{ $guide_service->details }}</textarea>
                                                </div>
                                                <label id="details-error" class="error" for="details"></label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <button class="btn btn_green" type="submit">
                                    Update
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
        var input = document.getElementById("#contact_no");
        $('#contact_no').intlTelInput("setNumber", $("#field_phone").val());
        var iti = $('#contact_no').intlTelInput({
            autoPlaceholder: "polite",
            hiddenInput: "full_phone",
            allowExtensions: true,
            formatOnDisplay: false,
            autoFormat: false,
            autoHideDialCode: false,
            autoPlaceholder: true,
            defaultCountry: "auto",
            ipinfoToken: "yolo",
            nationalMode: true,
            numberType: "MOBILE",
            preferredCountries: ['in'],
            preventInvalidNumbers: true,
            separateDialCode: true,
            initialCountry: "auto",
            utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/11.0.9/js/utils.js",
        });
        $('#contact_no').intlTelInput("setNumber", $("#field_phone").val());
    </script>
    <script src="{{ asset('admin_assets/custom/guide_service.js') }}"></script>
@endsection
