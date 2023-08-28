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
                    <h3>Add</h3>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid doctors_profile">
        <div class="row">
            <div class="card">
                <div class="card-body">
                    <form action="{{ url('/admin/about_us/vision_mission') }}" method="POST" id="vision_mission_form" name="vision_mission_form">
                        @csrf
                        <div class="row mb-3">
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <label for="name" class="form-label">Title</label>
                                    <input type="text" class="form-control" id="title" name="title" />
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <label for="color_code" class="form-label">Color</label>
                                    <div id="Add_color">
                                        <input type="text" class="form-control" id="color_code" name="color_code" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <label for="description" class="form-label">Description</label>
                                    <textarea class="form-control" placeholder="Message" id="description" name="description" style="height: 100px"></textarea>
                                </div>
                                <label id="description-error" class="error" for="description"></label>
                            </div>
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <label for="image" class="form-label">Image</label>
                                    <input type="file" accept="image/*" class="form-control" id="vision_image" name="vision_image" data_id="">
                                    <input type="text" class="form-control" id="vision_image_url" name="vision_image_url" hidden>
                                </div>
                            </div>
                            <div>
                                <button class="btn btn_green" type="submit">
                                    ADD
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