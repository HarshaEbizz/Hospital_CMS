@extends('admin.layouts.login_after')

@section('content')
<div class="page-body">
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-6">
                    <h3>Edit Health Information</h3>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid doctors_profile">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('admin.health.update',$health_details->id) }}" method="POST" id="update_health_information_form" name="update_health_information_form" class="form-inline" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    @php
                    if ($health_details) {
                    $image = str_replace('/public', '', url('/')) . '/storage/' . $health_details->storage_path;
                    } @endphp
                    <div class="col-lg-12">
                        <div class="mb-3">
                            <label for="title_1" class="form-label">Title - 1</label>
                            <input type="text" class="form-control" id="title_1" name="title_1" value="{{ $health_details->title_1 }}" />
                        </div>
                    </div>
                    <div class="col-lg-12 pe-2">
                        <div class="mb-3">
                            <label for="company_name" class="form-label">Information Type</label>
                            {{-- @if($health)disabled @endif --}}
                            @if ($health_details->info_type == 'tip')
                            <input type="hidden" class="form-control" id="info_type" name="info_type" value="{{ $health_details->info_type }}" />
                            <input type="text" class="form-control" id="old_type" name="old_type" value="Health Tip's" readonly />
                            @else
                            <select class="form-select custom_select" name="info_type" id="info_type" onchange="add_details()">
                                <option value="" selected disabled>Select</option>
                                <option value="tip" {{ $health_details->info_type == 'tip'? 'selected' : '' }} @if($health)disabled @endif>Health Tip's</option>
                                <option value="compliance" {{ $health_details->info_type == 'compliance'? 'selected' : '' }}>Statutory Compliance</option>
                            </select>
                            @endif

                            {{-- @if($health)
                                <input type="hidden" class="form-control" id="info_type" name="info_type" value="{{ $health_details->info_type }}"/>
                            <input type="text" class="form-control" id="old_type" name="old_type" value="Health Tip's" readonly />
                            @else
                            <select class="form-select custom_select" name="info_type" id="info_type" onchange="add_details()">
                                <option value="" selected disabled>Select</option>
                                <option value="tip" {{ $health_details->info_type == 'tip'? 'selected' : '' }} @if($health)disabled @endif>Health Tip's</option>
                                <option value="compliance" {{ $health_details->info_type == 'compliance'? 'selected' : '' }}>Statutory Compliance</option>
                            </select>
                            @endif --}}
                        </div>
                    </div>
                    <div class="col-lg-12 pe-2" id="image_upload" style="display: {{ $health_details->info_type == 'tip' ? 'block' : 'none' }}">
                        <div class="col-lg-12">
                            <div class="mb-3">
                                <label for="details_1" class="form-label">Details - 1</label>
                                <textarea class="form-control" placeholder="Message " id="details_1" name="details_1" style="height: 100px">{!! $health_details->details_1 !!}</textarea>
                            </div>
                            <label id="details_1-error" class="error" for="details_1"></label>
                        </div>

                        <div class="col-lg-12">
                            <div class="mb-3">
                            <div class="crop-image-preview-container cover_image_show @if ($health_details->cover_image) show @else hide @endif">
                                <img id="crop-image" @if ($health_details->cover_image) src="{{ $image }}{{ $health_details->cover_image }}" @endif/>
                            </div>
                                <label for="cover_image" class="form-label">Cover Image</label>
                                <input type="file" accept="image/*" class="form-control" id="cover_image" name="cover_image" />
                                <input type="text" class="form-control" id="cover_image_url" name="cover_image_url" hidden />
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <div class="mb-3">
                                <label for="title_2" class="form-label">Title - 2</label>
                                <input type="text" class="form-control" id="title_2" name="title_2" value="{{ $health_details->title_2 }}" />
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="mb-3">
                                <label for="details_2" class="form-label">Details - 2</label>
                                <textarea class="form-control" placeholder="Message " id="details_2" name="details_2" style="height: 100px">{!! $health_details->details_2 !!}</textarea>
                            </div>
                            <label id="details_2-error" class="error" for="details_2"></label>
                        </div>

                        <div class="col-lg-12">
                            <div class="mb-3">
                                <label for="title_3" class="form-label">Title - 3</label>
                                <input type="text" class="form-control" id="title_3" name="title_3" value="{{ $health_details->title_3 }}" />
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="mb-3">
                                <label for="details_3" class="form-label">Details - 3</label>
                                <textarea class="form-control" placeholder="Message " id="details_3" name="details_3" style="height: 100px">{!! $health_details->details_3 !!}</textarea>
                            </div>
                            <label id="details_3-error" class="error" for="details_3"></label>
                        </div>
                    </div>

                    <div class="col-lg-12 pe-2" id="file_upload" style="display: {{ $health_details->info_type == 'compliance' ? 'block' : 'none' }}">
                        <div>
                            <label for="document" class="form-label">Document</label>
                        </div>
                        <div class="col-lg-6 pe-2">
                            <div class="mb-3">
                                <input type="file" accept="image/*" class="dropify" name="document" id="document" data-height="100" />
                                <input type="text"  name="document_url" id="document_url"  hidden/>
                            </div>
                            <label id="document-error" class="error" for="document" style="display: none"></label>
                        </div>
                        <div class="col-lg-6 pe-2">
                            <div class="mb-3">
                                <iframe name="document_viewer" id="document_viewer" width="1000px" height="600px" style="display: {{ $health_details->info_type == 'compliance' ? 'block' : 'none' }}" @if ($health_details->document) src="{{ $image }}{{ $health_details->document }}" @endif></iframe>
                            </div>
                        </div>
                    </div>


                    <div class="col-lg-12">
                        <div class="mb-3">
                            <a class="btn btn-secondary modelbtn" type="button" href="{{ $health_details->info_type == 'tip' ? route('admin.health.index')  : route('admin.statutory_compliance_index')  }}">
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
<script src="{{ asset('admin_assets/custom/health.js') }}"></script>

<script>
    function add_details() {
        var event_type = document.getElementById("info_type");
        var chk_event = event_type.value;
        if (chk_event == 'tip') {
            document.getElementById('image_upload').style.display = "block";
            document.getElementById('file_upload').style.display = "none";

            document.getElementById("title_1").required = true;
            document.getElementById("details_1").required = true;
            document.getElementById("title_2").required = true;
            document.getElementById("details_2").required = true;
            document.getElementById("title_3").required = true;
            document.getElementById("details_3").required = true;
            document.getElementById("cover_image").required = true;
            document.getElementById("document").required = false;
        } else if (chk_event == 'compliance') {
            document.getElementById('file_upload').style.display = "block";
            document.getElementById('image_upload').style.display = "none";

            document.getElementById("title_1").required = false;
            document.getElementById("details_1").required = false;
            document.getElementById("title_2").required = false;
            document.getElementById("details_2").required = false;
            document.getElementById("title_3").required = false;
            document.getElementById("details_3").required = false;
            document.getElementById("cover_image").required = false;
            document.getElementById("document").required = true;
        }
    }
</script>
@endsection