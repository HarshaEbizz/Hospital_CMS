@extends('admin.layouts.login_after')
@section('content')
<div class="page-body">
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-6">
                    <h3>Add Health Information</h3>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid doctors_profile">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('admin.health.store') }}" method="POST" id="add_health_information_form" name="add_health_information_form" class="form-inline" enctype="multipart/form-data">
                    @csrf
                    <div class="col-lg-12">
                        <div class="mb-3">
                            <label for="title_1" class="form-label">Title - 1</label>
                            <input type="text" class="form-control" id="title_1" name="title_1" />
                        </div>
                    </div>
                    <div class="col-lg-12 pe-2">
                        <div class="mb-3">
                            <label for="company_name" class="form-label">Information Type</label>
                            <select class="form-select form-select custom_select" name="info_type" id="info_type" onchange="add_details()">
                                <option value="" selected disabled>Select</option>
                                @if(!$health)
                                <option value="tip">Health Tip's</option>
                                @endif
                                <option value="compliance">Statutory Compliance</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-12 pe-2" id="image_upload" style="display: none">
                        <div class="col-lg-12">
                            <div class="mb-3">
                                <label for="details_1" class="form-label">Details - 1</label>
                                <textarea class="form-control" placeholder="Message " id="details_1" name="details_1" style="height: 100px"></textarea>
                            </div>
                            <label id="details_1-error" class="error" for="details_1"></label>
                        </div>
                        <div class="col-lg-12">
                            <div class="crop-image-preview-container cover_image_show">
                                <img id="crop-image" />
                            </div>
                            <div class="mb-3">
                                <label for="cover_image" class="form-label">Cover Image</label>
                                <input type="file" accept="image/*" class="form-control" id="cover_image" name="cover_image" />
                                <input type="text" class="form-control" id="cover_image_url" name="cover_image_url" hidden />
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="mb-3">
                                <label for="title_2" class="form-label">Title - 2</label>
                                <input type="text" class="form-control" id="title_2" name="title_2" />
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="mb-3">
                                <label for="details_2" class="form-label">Details - 2</label>
                                <textarea class="form-control" placeholder="Message " id="details_2" name="details_2" style="height: 100px"></textarea>
                            </div>
                            <label id="details_2-error" class="error" for="details_2"></label>
                        </div>
                        <div class="col-lg-12">
                            <div class="mb-3">
                                <label for="title_3" class="form-label">Title - 3</label>
                                <input type="text" class="form-control" id="title_3" name="title_3" />
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="mb-3">
                                <label for="details_3" class="form-label">Details - 3</label>
                                <textarea class="form-control" placeholder="Message " id="details_3" name="details_3" style="height: 100px"></textarea>
                            </div>
                            <label id="details_3-error" class="error" for="details_3"></label>
                        </div>
                    </div>
                    <div class="col-lg-12 pe-2" id="file_upload" style="display: none">
                        <div>
                            <label for="document" class="form-label">Document</label>
                        </div>
                        <div class="col-lg-12 pe-2">
                            <div class="mb-3">
                                <input type="file" accept="image/*" class="form-control" name="document" id="document" data-height="100" />
                                <input type="text"  name="document_url" id="document_url"  hidden/>
                            </div>
                            <label id="document-error" class="error" for="document" style="display: none"></label>
                        </div>
                        <div class="col-lg-12 pe-2">
                            <div class="mb-3">
                                <iframe name="document_viewer" id="document_viewer" src="" width="1000px" height="600px" style="display: none"></iframe>
                            </div>
                        </div>
                    </div>


                    <div class="col-lg-12">
                        <div class="mb-3">
                            <a class="btn btn-secondary modelbtn" type="button" href="{{ route('admin.health.index') }}">
                                Close
                            </a>
                            <button class="btn btn-primary" type="submit" title=""> Add </button>
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
