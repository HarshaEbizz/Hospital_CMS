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
<input type="hidden" name="gallery_id" id="gallery_id" value="{{$gallery->id}}">
<div class="page-body">
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-6">
                    <h3>Add Details</h3>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid doctors_profile">
        <div class="card">
            <div class="card-body">
                <form action="{{route('admin.photo_gallery.update',$gallery->id)}}" method="POST" id="edit_event_form " name="edit_event_form" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row mb-3">
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{$gallery->name}}" />
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="date" class="form-label">Year</label>
                                <input type="date" class="form-control" id="date" name="date" value="{{$gallery->date}}">
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="mb-3">
                                <label for="description" class="form-label">Description</label>
                                <textarea class="form-control" placeholder="Message " id="description" name="description" style="height: 100px">{{$gallery->description}}</textarea>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                @php $image = str_replace("/public","",url('/')).'/storage/'.$gallery->image_path.$gallery->main_image; @endphp
                                <div class="crop-image-preview-container cover-image-preview-container main_image_show @if ($gallery->main_image) show @else hide @endif">
                                    <img id="crop-image" @if ($gallery->main_image) src="{{ $image }}" @endif/>
                                </div>
                                <label for="main_image" class="form-label">Cover Image</label>
                                <input type="file" accept="image/*" class="form-control" id="main_image" name="main_image" />
                                <input type="text" class="form-control" id="main_image_url" name="main_image_url" hidden />
                            </div>
                        </div>
                        <div>
                            <button class="btn btn_green" type="submit">
                                Update
                            </button>
                            <a class="btn btn-secondary modelbtn" type="button" href="{{ route('admin.photo_gallery.index') }}">
                                Close
                            </a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-6">
                    <h3>Images</h3>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row mb-3">
                                <div class="col-12">
                                    <div class="right-pop">
                                        <!-- Button trigger modal -->
                                    </div>
                                </div>
                            </div>
                            <h4 class="text-blue h4">Upload Images</h4>
                            <p class="mb-30">(Drag and drop image or select images)</p>

                            @if (session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('success') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            @endif
                            <form method="post" action="{{ route('admin.gallery_image_store',$gallery->id) }}" enctype="multipart/form-data" class="dropzone" id="dropzone">
                                @csrf
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.2.0/min/dropzone.min.js"></script>
<script src="{{ asset('admin_assets/custom/photo_gallery.js') }}"></script>
<script type="text/javascript">
    // var gallery = '{{route('admin.gallery_image_all','')}}' + "/" + id;
    var gallery = "{{ route('admin.gallery_image_all') }}";
    var id = $('#gallery_id').val();
    var delete_url = "{{ route('admin.gallery_image_delete') }}";
    var myDropzone;
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
                url: gallery,
                type: 'GET',
                dataType: 'json',
                data: {
                    'gallery_id': id
                },
                success: function(data) {
                    console.log(data);
                    $.each(data, function(key, value) {
                        var file = {
                            name: value.name,
                            size: value.size
                        };
                        console.log(file);
                        myDropzone.options.addedfile.call(myDropzone, file);
                        myDropzone.options.thumbnail.call(myDropzone, file, value.path);
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
                        'gallery_id': id
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

    /*function getcategoryimage()
    {
        $('.dz-preview').remove();
        $.ajax({
            url: gallery,
            type: 'GET',
            dataType: 'json',
            data: {},
            success: function(data){
                //console.log(data);

                $.each(data, function (key, value) {
                    var file = {name: value.name, size: value.size};
                    myDropzone.options.addedfile.call(myDropzone, file);
                    myDropzone.options.thumbnail.call(myDropzone, file, value.path);
                    myDropzone.emit("complete", file);
                });
            }
        });
    }
    getcategoryimage();*/

    $(document).on("click", function(event) {

        var data = $(event.target).children('div .dz-filename').children('span')[0].innerHTML;
        if (data != '') {
            var img = "{{ asset('storage/image/') }}/" + data;

            var $temp = $("<input>");
            $("body").append($temp);
            $temp.val(img).select();
            document.execCommand("copy");
            $temp.remove();

            alert("Copied!");
        }


    })
    

    $(document).ready(function() {
        $('.dz-image').click(function(e) {
            alert($(this).attr('class'));
            e.stopPropagation();
        });
    });
</script>
@endsection