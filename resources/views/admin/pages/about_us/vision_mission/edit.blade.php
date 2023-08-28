@extends('admin.layouts.login_after')
@section('style')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-colorpicker/3.4.0/css/bootstrap-colorpicker.min.css" integrity="sha512-m/uSzCYYP5f55d4nUi9mnY9m49I8T+GUEe4OQd3fYTpFU9CIaPazUG/f8yUkY0EWlXBJnpsA7IToT2ljMgB87Q==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection
@section('content')
<div class="page-body">
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-6">
                    <h3>Edit</h3>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid doctors_profile">
        <div class="row">
            <div class="card">
                <div class="card-body">
                    <form action="{{ url('/admin/about_us/vision_mission/update',$vision_mission->id) }}" method="POST" id="edit_vision_mission_form" name="edit_vision_mission_form">
                        @csrf
                        <div class="row mb-3">
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <label for="name" class="form-label">Title</label>
                                    <input type="text" class="form-control" id="edit_title" name="edit_title" value="{{$vision_mission->title}}" />
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <label for="color_code" class="form-label">Color</label>
                                    <div id="Add_color">
                                        <input type="text" class="form-control" id="edit_color_code" name="edit_color_code" value="{{$vision_mission->color_code}}" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <label for="description" class="form-label">Description</label>
                                    <textarea class="form-control" placeholder="Message" id="edit_description" name="edit_description" style="height: 100px">{{$vision_mission->description}}</textarea>
                                </div>
                                <label id="description-error" class="error" for="edit_description"></label>
                            </div>
                            <div class="col-lg-12">
                                <div class="mb-3">
                                @php $image = str_replace("/public","",url('/')).'/storage/'.$vision_mission->image_path.$vision_mission->image_name;@endphp
                                <div class="crop-image-preview-container @if($image) show @else hide  @endif" id="edit_vision_photo-container">
                                    <img id="crop-image"  @if($image) src="{{$image}}" @endif />
                                </div>
                                    <label for="image" class="form-label">Image</label>
                                    <input type="file" accept="image/*" class="form-control " id="edit_vision_image" name="edit_vision_image" data_id="">
                                    <input type="text" class="form-control" id="edit_vision_image_url" name="edit_vision_image_url" hidden>
                                </div>
                            </div>
                            <div>
                                <button class="btn btn_green" type="submit">
                                    Update
                                </button>
                                <a class="btn btn-primary" type="button" href="{{ url('/admin/about_us') }}">
                                    Close
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-colorpicker/3.4.0/js/bootstrap-colorpicker.min.js" integrity="sha512-94dgCw8xWrVcgkmOc2fwKjO4dqy/X3q7IjFru6MHJKeaAzCvhkVtOS6S+co+RbcZvvPBngLzuVMApmxkuWZGwQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script type="text/javascript" src="{{ asset('admin_assets/custom/vision_mission.js') }}"></script>
@endsection