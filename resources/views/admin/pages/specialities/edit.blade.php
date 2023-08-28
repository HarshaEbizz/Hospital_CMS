@extends('admin.layouts.login_after')
@section('style')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.0.1/min/dropzone.min.css" rel="stylesheet">
    <style type="text/css">
        .dropzone .dz-preview .dz-image {
            width: 150px;
            height: 150px;
        }

        .dropzone .dz-preview .dz-image img {
            height: inherit !important;
        }
    </style>
@endsection
@section('content')
    <div class="page-body">
        <div class="container-fluid">
            <div class="page-title">
                <div class="row">
                    <div class="col-6">
                        <h3>Edit Specialities</h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid doctors_profile">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin.specialities.update', $specialities->id) }}" method="POST"
                        id="edit_specialities_form " name="edit_specialities_form" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row mb-3">
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <label for="name" class="form-label">Specialities Name</label>
                                    <input type="text" class="form-control" id="name" name="name"
                                        value="{{ $specialities->name }}" />
                                </div>
                            </div>
                            <div class="col-lg-12">
                                @php
                                    if ($specialities->top_cover_image) {
                                        $top_cover_image = str_replace('/public', '', url('/')) . '/storage/' . $specialities->image_path . $specialities->top_cover_image;
                                    }
                                @endphp
                                <div class="mb-3">
                                    <div class="crop-image-preview-container show">
                                        <img id="crop-image" class="top_img_preview" src="@if($specialities->top_cover_image){{ $top_cover_image }} @endif" />
                                    </div>
                                    <label for="top_cover_image" class="form-label">Top Banner Image</label>
                                    <input type="file" accept="image/*" class="form-control image" id="top_cover_image"
                                        name="top_cover_image" />
                                    <input type="text" class="form-control image" id="top_cover_image_url"
                                        name="top_cover_image_url" hidden />
                                </div>
                            </div>
                            <div class="col-lg-12">
                                @php
                                    if ($specialities->bottom_cover_image) {
                                        $bottom_cover_image = str_replace('/public', '', url('/')) . '/storage/' . $specialities->image_path . $specialities->bottom_cover_image;
                                    }
                                @endphp
                                <div class="mb-3">
                                    <div class="crop-image-preview-container show">
                                        <img id="crop-image" class="bottom_img_preview" src="@if($specialities->bottom_cover_image){{ $bottom_cover_image }} @endif" />
                                    </div>
                                    <label for="bottom_cover_image" class="form-label">Bottom Banner Image</label>
                                    <input type="file" accept="image/*" class="form-control image" id="bottom_cover_image"
                                        name="bottom_cover_image" />
                                    <input type="text" class="form-control image" id="bottom_cover_image_url"
                                        name="bottom_cover_image_url" hidden />
                                </div>
                            </div>
                            <input type="hidden" name="specialities_id" id="specialities_id"
                                value="{{ $specialities->id }}">
                            <input type="hidden" name="slug" id="slug" value="{{ $specialities->slug }}">
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <label for="banner_text" class="form-label">Banner text</label>
                                    <textarea class="form-control" placeholder="Message " id="banner_text" name="banner_text" style="height: 100px">{{ $specialities->banner_text }}</textarea>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <label for="description" class="form-label">Description</label>
                                    <textarea class="form-control" placeholder="Message " id="description" name="description" style="height: 100px">{{ $specialities->description }}</textarea>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <label for="bottom_banner_status" class="form-label">Bottom banner status</label>
                                    <div class="form-floating">
                                        <input class="tgl bottom_banner_status_btn" type="checkbox" data-toggle="toggle"
                                            data-width="100" id="bottom_banner_status" name="bottom_banner_status"
                                            data-on="Show" data-off="Hide" data-onstyle="success" data-offstyle="danger"
                                            @if ($specialities->bottom_banner_status == 1) checked @endif>
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
                                    {{-- <label for="content_type" class="form-label">Content Type</label> --}}
                                    <h6>Content Type</h6>
                                    <select class="form-select form-select custom_select" name="content_type"
                                        id="content_type">
                                        <option value="" selected disabled>Select Content Type</option>
                                        <option value="image_content">Image & Content</option>
                                        <option value="content">Content</option>
                                        <option value="image">Image</option>
                                        {{-- <option value="multipal_image">Multipal Image</option> --}}
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
                            @if (
                                $specialities->slug == 'cancer_oncology_oncosurgery' ||
                                    $specialities->slug == 'oncology' ||
                                    $specialities->slug == 'plastic_reconstructive_surgery' ||  $specialities->slug == 'bariatric_surgery_weight_loss_surgery')
                                <div class="col-lg-6">
                                    <div class="mb-3" style="margin-top: 28px;">
                                        <a type="button" class="btn btn-success btn-rounded btn-icon spec_img_btn"
                                            target="_blank" href="{{ route('admin.tab_content', $specialities->id) }}"
                                            id="edit_tab_content" style="height: 38px;">Edit tab content &nbsp;
                                            {{-- <i class="fa fa-solid fa-plus" ></i> --}}</a>
                                    </div>
                                </div>
                            @endif
                            <div class="row" id="add_content_inputs">
                                @if (count($specialities->Content) > 0)
                                    @foreach ($specialities->Content as $key => $content)
                                        @if ($content->content_type == 'image_content')
                                            <div class="content_card" id="content_card_{{ $content->id }}"
                                                style="margin-bottom: 10px;" data-id="{{ $content->content_type }}">
                                                <div class="card-body">
                                                    <div class="card-title">
                                                        <button type="button"
                                                            class="btn btn-danger btn-icon-text delete_box_content"
                                                            data_id="{{ $content->id }}" style="float: right;">
                                                            <i class="fa fa-solid fa-trash"></i></button>
                                                    </div>
                                                    <input type="hidden" name="content_for[]" id="content_for"
                                                        value="image_content">
                                                    <input type="hidden" id="title_{{ $content->id }}" name="title[]"
                                                        value="null" hidden />
                                                    <input type="hidden" id="content_id[{{ $content->id }}]"
                                                        name="content_id[]" value="{{ $content->id }}">
                                                    <div class="row mb-3">
                                                        <div class="col-lg-12 pe-2">
                                                            <div class="mb-3">
                                                                <label for="direction" class="form-label">Image
                                                                    direction</label>
                                                                <select class="form-select custom_select"
                                                                    name="direction[]" id="direction_{{ $content->id }}"
                                                                    required>
                                                                    <option value="right"
                                                                        @if ($content->direction == 'right') selected @endif>
                                                                        Right</option>
                                                                    <option value="left"
                                                                        @if ($content->direction == 'left') selected @endif>
                                                                        Left</option>
                                                                    <option value="center"
                                                                        @if ($content->direction == 'center') selected @endif>
                                                                        Center</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-12">
                                                            @php
                                                                if ($content->image_name) {
                                                                    $image = str_replace('/public', '', url('/')) . '/storage/' . $content->image_path . $content->image_name;
                                                            } @endphp
                                                            <div class="mb-3">
                                                                <div
                                                                    class="crop-image-preview-container cover-image-preview-container @if ($content->image_name) show @else hide @endif">
                                                                    <img id="crop-image"
                                                                        @if ($content->image_name) src="{{ $image }}" @endif />
                                                                </div>
                                                                <label for="image" class="form-label">Image</label>
                                                                <input type="file" accept="image/*" class="form-control content_image"
                                                                    id="image_{{ $content->id }}" name="image[]"
                                                                    data_id="{{ $content->id }}">
                                                                <input type="text" id="image_{{ $content->id }}_url"
                                                                    name="image_{{ $content->id }}_url" hidden>
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-12">
                                                            <div class="mb-3">
                                                                <label for="details" class="form-label">Details</label>
                                                                <textarea class="form-control content_details" placeholder="Message " id="details_{{ $content->id }}"
                                                                    name="details[]" style="height: 100px" required>{!! $content->details !!}</textarea>
                                                            </div>
                                                            <label id="details_{{ $content->id }}-error" class="error"
                                                                for="details_{{ $content->id }}"></label>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                        @if ($content->content_type == 'content')
                                            <div class="content_card" id="content_card_{{ $content->id }}"
                                                style="margin-bottom: 10px;" data-id="{{ $content->content_type }}">
                                                <div class="card-body">
                                                    <div class="card-title">
                                                        <button type="button"
                                                            class="btn btn-danger btn-icon-text delete_box_content"
                                                            data_id="{{ $content->id }}" style="float: right;">
                                                            <i class="fa fa-solid fa-trash"></i></button>
                                                    </div>
                                                    <input type="hidden" name="content_for[]" id="content_for"
                                                        value="content">
                                                    <input type="hidden" id="content_id[{{ $content->id }}]"
                                                        name="content_id[]" value="{{ $content->id }}">
                                                    <input type="hidden" id="direction_{{ $content->id }}"
                                                        name="direction[]" value="null" hidden>
                                                    <input type="hidden" id="image_{{ $content->id }}" name="image[]"
                                                        value="null" hidden>
                                                    <input type="hidden" id="image_{{ $content->id }}_url"
                                                        name="image_{{ $content->id }}_url" value="null" hidden>
                                                    <div class="col-lg-12">
                                                        <div class="mb-3">
                                                            <label for="name" class="form-label">Title</label>
                                                            <input type="text" class="form-control"
                                                                id="title_{{ $content->id }}" name="title[]"
                                                                class="content_title" value="{{ $content->title }}"
                                                                required />
                                                        </div>
                                                    </div>

                                                    <div class="row mb-3">
                                                        <div class="col-lg-12">
                                                            <div class="mb-3">
                                                                <label for="details" class="form-label">Details</label>
                                                                <textarea class="form-control content_details" placeholder="Message " id="details_{{ $content->id }}"
                                                                    name="details[]" style="height: 100px" required>{!! $content->details !!}</textarea>
                                                            </div>
                                                            <label id="details_{{ $content->id }}-error" class="error"
                                                                for="details_{{ $content->id }}"></label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                        @if ($content->content_type == 'image')
                                            <div class="content_card" id="content_card_{{ $content->id }}"
                                                style="margin-bottom: 10px;" data-id="{{ $content->content_type }}">
                                                <div class="card-body">
                                                    <div class="card-title">
                                                        <button type="button"
                                                            class="btn btn-danger btn-icon-text delete_box_content"
                                                            data_id="{{ $content->id }}" style="float: right;">
                                                            <i class="fa fa-solid fa-trash"></i></button>
                                                    </div>
                                                    <input type="hidden" name="content_for[]" id="content_for"
                                                        value="image">
                                                    <input type="hidden" id="title_{{ $content->id }}" name="title[]"
                                                        value="null" hidden />
                                                    <input type="hidden" id="details_{{ $content->id }}"
                                                        name="details[]" value="null" hidden />
                                                    <input type="hidden" id="direction_{{ $content->id }}"
                                                        name="direction[]" value="null" hidden>
                                                    <input type="hidden" id="content_id[{{ $content->id }}]"
                                                        name="content_id[]" value="{{ $content->id }}">
                                                    <div class="row mb-3">
                                                        <div class="col-lg-12">
                                                            <div class="mb-3">
                                                                <label for="video_url" class="form-label">Video
                                                                    URL</label>
                                                                {{-- <input type="text" id="video_url" name="video_url" hidden> --}}
                                                                <input type="text" class="form-control"
                                                                    id="video_url_{{ $content->id }}" name="video_url[]"
                                                                    value="{{ $content->video_url }}" />
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row mb-3">
                                                        <div class="col-lg-12">
                                                            @php
                                                                if ($content->image_name) {
                                                                    $image = str_replace('/public', '', url('/')) . '/storage/' . $content->image_path . $content->image_name;
                                                            } @endphp
                                                            <div class="mb-3">
                                                                <div
                                                                    class="crop-image-preview-container cover-image-preview-container @if ($content->image_name) show @else hide @endif">
                                                                    <img id="crop-image"
                                                                        @if ($content->image_name) src="{{ $image }}" @endif />
                                                                </div>
                                                                <label for="image" class="form-label">Image</label>
                                                                <input type="file" accept="image/*" class="form-control content_image"
                                                                    id="image" name="image"
                                                                    data_id="{{ $content->id }}">
                                                                <input type="text" id="image" name="image"
                                                                    hidden>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    @endforeach
                                @endif
                            </div>
                            <div>
                                <button class="btn btn_green" type="submit">
                                    UPDATE
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
        <div class="row">
            <div class="col-6">
                <h3>Add Multipal Image</h3>
            </div>
        </div>
        @php
            $count = App\Models\SpecialitiesContent::where('content_type', 'multipal_image')
                ->where('specialities_id', $specialities->id)
                ->count();
        @endphp

        <div class="col-lg-12">
            <div class="mb-3">
                <div class="form-floating">
                    <input class="tgl multipal_image_btn" type="checkbox" data-toggle="toggle" data-width="100"
                        id="multipal_image" name="multipal_image" data-on="Yes" data-off="No" data-onstyle="success"
                        data-offstyle="danger" @if ($count > 0) checked @endif>
                </div>
            </div>
        </div>
        {{-- <div class="multipal_img_section" style="margin-bottom: 10px; display:none; width: 98.5%;"> --}}
        <div class="multipal_img_section" id="multipal_img_section"
            style="margin-bottom: 10px;width: 98.5%; display:{{ $count > 0 ? 'block' : 'none' }}">
            <div class="card-body">
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                <form method="post" action="{{ route('admin.specialities_image_store', $specialities->id) }}"
                    enctype="multipart/form-data" class="dropzone" id="dropzone">
                    @csrf
                </form>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.2.0/min/dropzone.min.js"></script>
    <script src="{{ asset('admin_assets/custom/specialities.js') }}"></script>

    <script type="text/javascript">
        var all_image_url = "{{ route('admin.specialities_image_all') }}";
        // console.log(url);
        var id = $('#specialities_id').val();
        var delete_url = "{{ route('admin.specialities_image_delete') }}";
        var myDropzone;

        $(document).on('change', '.multipal_image_btn', function(e) {
            if ($(this).is(":checked")) {
                $(".multipal_img_section").show();
            } else {
                $(".multipal_img_section").hide();
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type: 'POST',
                    url: delete_url,
                    data: {
                        filename: "all",
                        _token: "{{ csrf_token() }}",
                        'specialities_id': id
                    },
                    success: function(data) {
                        //alert(data.success +" File has been successfully removed!");
                        $("div.dz-preview").remove();
                    },
                    error: function(e) {
                        console.log(e);

                    }
                });

            }
        });



        Dropzone.options.dropzone = {
            maxFiles: 100,
            maxFilesize: 5,
            acceptedFiles: ".jpeg,.jpg,.png,.gif",
            addRemoveLinks: true,
            timeout: 50000,
            init: function() {
                // Get images
                myDropzone = this;
                $.ajax({
                    url: all_image_url,
                    type: 'GET',
                    dataType: 'json',
                    data: {
                        'specialities_id': id
                    },
                    success: function(data) {
                        // console.log(data);
                        $.each(data, function(key, value) {
                            var file = {
                                name: value.image_name,
                                size: value.size
                            };
                            console.log(file);
                            myDropzone.options.addedfile.call(myDropzone, file);
                            myDropzone.options.thumbnail.call(myDropzone, file, value
                                .image_path);
                            myDropzone.emit("complete", file);
                        });
                    }
                });
            },
            removedfile: function(file) {
                if (this.options.dictRemoveFile) {
                    /*return Dropzone.confirm("Are You Sure to "+this.options.dictRemoveFile, function() {*/
                    if (file.previewElement.id != "") {
                        var name = file.previewElement.id;
                    } else {
                        var name = file.name;
                    }
                    //console.log(name);
                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        type: 'POST',
                        url: delete_url,
                        data: {
                            filename: name,
                            _token: "{{ csrf_token() }}",
                            'specialities_id': id
                        },
                        success: function(data) {
                            //alert(data.success +" File has been successfully removed!");
                        },
                        error: function(e) {
                            console.log(e);
                        }
                    });
                    var fileRef;
                    return (fileRef = file.previewElement) != null ?
                        fileRef.parentNode.removeChild(file.previewElement) : void 0;
                    //});
                }
            },

            success: function(file, response) {
                file.previewElement.id = response.success;
                console.log(file);
                // set new images names in dropzone’s preview box.
                var olddatadzname = file.previewElement.querySelector("[data-dz-name]");
                file.previewElement.querySelector("img").alt = response.success;
                olddatadzname.innerHTML = response.success;
            },
            error: function(file, response) {
                if ($.type(response) === "string")
                    var message = response; //dropzone sends it's own error messages in string
                else
                    var message = response.message;
                file.previewElement.classList.add("dz-error");
                _ref = file.previewElement.querySelectorAll("[data-dz-errormessage]");
                _results = [];
                for (_i = 0, _len = _ref.length; _i < _len; _i++) {
                    node = _ref[_i];
                    _results.push(node.textContent = message);
                }
                return _results;
            },
            resetFiles: function() {
                console.log('hello');
                if (this.files.length != 0) {
                    for (i = 0; i < this.files.length; i++) {
                        this.files[i].previewElement.remove();
                    }
                    this.files.length = 0;
                }
            }


        };

        // $(document).on("click", function(event) {
        //     var data = $(event.target).children('div .dz-filename').children('span')[0].innerHTML;
        //     if (data != '') {
        //         var img = "{{ asset('storage/image/') }}/" + data;

        //         var $temp = $("<input>");
        //         $("body").append($temp);
        //         $temp.val(img).select();
        //         document.execCommand("copy");
        //         $temp.remove();

        //         alert("Copied!");
        //     }


        // })


        $(document).ready(function() {
            $('.dz-image').click(function(e) {
                alert($(this).attr('class'));
                e.stopPropagation();
            });
        });
    </script>
@endsection
