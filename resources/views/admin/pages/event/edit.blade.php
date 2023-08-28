@extends('admin.layouts.login_after')

@section('content')
    <div class="page-body">
        <div class="container-fluid">
            <div class="page-title">
                <div class="row">
                    <div class="col-6">
                        <h3>Edit Event</h3>
                    </div>
                </div>
            </div>
        </div>

        <div class="container-fluid doctors_profile">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin.event.update', $event_details->id) }}" method="POST" id="update_event_form"
                        name="update_event_form" class="form-inline" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        @php
                            if ($event_details) {
                                $image = str_replace('/public', '', url('/')) . '/storage/' . $event_details->storage_path;
                        } @endphp
                        <div class="col-lg-12 pe-2">
                            <div class="mb-3">
                                <label for="event_title" class="form-label">Event Title</label>
                                <input type="text" class="form-control" id="event_title" name="event_title"
                                    placeholder="Event Title" value="{{ $event_details->event_title }}" />
                            </div>
                        </div>
                        <div class="col-lg-6 pe-2">
                            <div class="mb-3">
                                <label for="event_type" class="form-label">Event Type</label>
                                <select class="form-select custom_select" name="event_type" id="event_type"
                                    onchange="add_details()">
                                    <option value="" selected disabled>Select Type</option>
                                    <option value="form" {{ $event_details->event_type == 'form' ? 'selected' : '' }}>Form
                                    </option>
                                    <option value="file" {{ $event_details->event_type == 'file' ? 'selected' : '' }}>File
                                    </option>
                                    <option value="url" {{ $event_details->event_type == 'url' ? 'selected' : '' }}>URL
                                    </option>
                                    <option value="number" {{ $event_details->event_type == 'number' ? 'selected' : '' }}>
                                        Phone Number</option>
                                </select>
                            </div>
                        </div>
                        {{-- event_type = Form --}}
                        <div class="col-lg-12 pe-2" id="form"
                            style="display: {{ $event_details->event_type == 'form' ? 'block' : 'none' }}">
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <div
                                        class="crop-image-preview-container event_banner_show @if ($event_details->event_banner) show @else hide @endif">
                                        <img id="crop-image"
                                            @if ($event_details->event_banner) src="{{ $image }}{{ $event_details->event_banner }}" @endif />
                                    </div>
                                    <label for="event_banner" class="form-label">Event Banner</label>
                                    <input type="file" class="form-control" id="event_banner" name="event_banner" />
                                    <input type="text" id="event_banner_url" name="event_banner_url" hidden />
                                </div>
                            </div>
                            <input type="hidden" id="get_form_details" name="get_form_details"
                                value="{{ $event_details->form_field }}">
                            <div name="form_bulider_data" id="form_bulider_data">

                            </div>
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <label for="description" class="form-label">Description</label>
                                    <textarea class="form-control" placeholder="Message " id="description" name="description" style="height: 100px">{!! $event_details->description !!}</textarea>
                                </div>
                                <label id="description-error" class="error" for="description"></label>
                            </div>
                        </div>

                        {{-- event_type = File --}}
                        <div class="col-lg-12 pe-2" id="file"
                            style="display: {{ $event_details->event_type == 'file' ? 'block' : 'none' }}">
                            <div>
                                <label for="document" class="form-label">Document</label>
                            </div>
                            <div class="col-lg-6 pe-2">
                                <div class="mb-3">
                                    <input type="file" class="dropify" name="document" id="document" data-height="100"
                                        value="{{ $event_details->document }}" />
                                    <input type="text" name="document_url" id="document_url" hidden />
                                </div>

                                <label id="document-error" class="error" for="document" style="display: none"></label>
                            </div>
                            <div class="col-lg-6 pe-2">
                                <div class="mb-3">
                                    <iframe name="document_viewer" id="document_viewer" width="1000px" height="600px"
                                        style="display: {{ $event_details->event_type == 'file' ? 'block' : 'none' }}"
                                        @if ($event_details->document) src="{{ $image }}{{ $event_details->document }}" @endif></iframe>
                                </div>
                            </div>
                        </div>
                        {{-- event_type = url --}}
                        <div class="col-lg-12 pe-2" id="url"
                            style="display: {{ $event_details->event_type == 'url' ? 'block' : 'none' }}">
                            <div class="mb-3">
                                <label for="url" class="form-label">URL</label>
                                <input type="url" class="form-control" id="url" name="url"
                                    placeholder="Enter URL" required="true" value="{{ $event_details->url }}" />
                            </div>
                        </div>

                        {{-- event_type = Number --}}
                        <div class="col-lg-12 pe-2" id="number"
                            style="display: {{ $event_details->event_type == 'number' ? 'block' : 'none' }}">
                            <div class="mb-3">
                                <label for="mobile_no" class="form-label">Contact No</label>
                                <input type="number" class="form-control" id="mobile_no" name="mobile_no"
                                    placeholder="9945XXXXXX" value="{{ $event_details->mobile_no }}" />
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <div class="mb-3">
                                <a class="btn btn-secondary modelbtn" type="button"
                                    href="{{ route('admin.event.index') }}">
                                    Close
                                </a>
                                <button class="btn btn-primary" type="submit" title=""> Update </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('script')
    {{-- <script src="https://cdn.ckeditor.com/4.20.1/standard/ckeditor.js"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/35.3.2/super-build/ckeditor.js"></script> --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.13.2/jquery-ui.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jQuery-formBuilder/3.8.3/form-builder.min.js"></script>
    <script src="{{ asset('admin_assets/custom/event.js') }}"></script>
    <script>
        function add_details() {
            var event_type = document.getElementById("event_type");
            var chk_event = event_type.value;
            if (chk_event == 'form') {
                document.getElementById('form').style.display = "block";
                document.getElementById('file').style.display = "none";
                document.getElementById('number').style.display = "none";
                document.getElementById('url').style.display = "none";
                document.getElementById("document").required = false;
                document.getElementById("mobile_no").required = false;
                $(".stage-wrap").css('min-height', "521px");
                // document.getElementById("form_bulider_data").innerHTML = "";
                // var fbEditor = document.getElementById('form_bulider_data');
                // var defaultFields = $('#get_form_details').val();
                // // var formBuilder1 = $(fbEditor).formBuilder();
                // var container = document.getElementById("form_bulider_data");
                // var defaultFields = JSON.parse($('#get_form_details').val())

                // var options = {
                //     defaultFields,
                // };

                // var formBuilder1 = $(container).formBuilder(options);

            } else if (chk_event == 'file') {
                document.getElementById('file').style.display = "block";
                document.getElementById('form').style.display = "none";
                document.getElementById('number').style.display = "none";
                document.getElementById('url').style.display = "none";

                document.getElementById("document").required = true;
                document.getElementById("mobile_no").required = false;
            } else if (chk_event == 'number') {
                document.getElementById('number').style.display = "block";
                document.getElementById('url').style.display = "none";
                document.getElementById('file').style.display = "none";
                document.getElementById('form').style.display = "none";

                document.getElementById("mobile_no").required = true;
                document.getElementById("document").required = false;
            } else {
                document.getElementById('url').style.display = "block";
                document.getElementById('number').style.display = "none";
                document.getElementById('file').style.display = "none";
                document.getElementById('form').style.display = "none";

                document.getElementById("url").required = true;
                document.getElementById("document").required = false;
            }
        }
    </script>
@endsection
