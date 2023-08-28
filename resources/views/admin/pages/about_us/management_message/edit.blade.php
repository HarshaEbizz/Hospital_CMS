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
                    <input id="expertise_data" name="expertise_data" value="{{$mangement_msg->expertise}}" type="hidden">
                    <input id="professional_highlights_data" name="professional_highlights_data" value="{{$mangement_msg->professional_highlights}}" type="hidden">
                    <form action="{{ url('/admin/about_us/management_message_update',$mangement_msg->id) }}" method="POST" id="edit_management_person_form" name="edit_management_person_form">
                        @csrf
                        <div class="row mb-3">
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="edit_name" class="form-label">Name</label>
                                    <input type="text" class="form-control" id="edit_name" name="edit_name" value="{{$mangement_msg->name}}">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="edit_designation" class="form-label">Designation</label>
                                    <input type="text" class="form-control" id="edit_designation" name="edit_designation" value="{{$mangement_msg->designation}}">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                @php $image = str_replace("/public","",url('/')).'/storage/'.$mangement_msg->image_path.$mangement_msg->image_name;@endphp
                                <div class="crop-image-preview-container  @if($image) show @else hide  @endif" id="edit_management_photo-container">
                                    <img id="crop-image" @if($image) src="{{$image}}" @endif />
                                </div>
                                    <label for="edit_photo" class="form-label">Upload Photo</label>
                                    <input class="form-control" type="file" accept="image/*" id="edit_management_photo" name="edit_management_photo">
                                    <input class="form-control" type="text" id="edit_management_photo_url" name="edit_management_photo_url" hidden>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <label for="edit_message" class="form-label">Message</label>
                                    <div class="form-floating">
                                        <textarea class="form-control" placeholder="Message " id="edit_message" name="edit_message" style="height: 100px">{{$mangement_msg->message}}</textarea>
                                    </div>
                                    <label id="message-error" class="error" for="message"></label>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <label for="edit_expertise" class="form-label">Expertise</label>
                                    <div class="form-floating" id="edit_expertise_textarea">
                                        <textarea class="form-control" placeholder="Message " id="edit_expertise" name="edit_expertise" style="height: 100px"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <label for="edit_professional_highlight" class="form-label">Professional Highlights</label>
                                    <div class="form-floating" id="edit_professional_highlight_textarea">
                                        <textarea class="form-control" placeholder="Message " id="edit_professional_highlight" name="edit_professional_highlight" style="height: 100px"></textarea>
                                    </div>
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
<script type="text/javascript" src="{{ asset('admin_assets/custom/management_message.js') }}"></script>
@endsection