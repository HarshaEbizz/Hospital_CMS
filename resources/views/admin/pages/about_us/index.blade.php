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
                    <h3>About Us</h3>
                </div>
            </div>
        </div>
    </div>
    <!-- ------ -->
    <div class="accordion accordion-flush" id="accordionFlushExample">
        <div class="accordion-item news_accordion">
            <h2 class="accordion-header" id="flush-headingOne">
                <button class="accordion-button collapsed news_accro_btn" type="button" data-bs-toggle="collapse" data-bs-target="#collapseone" aria-expanded="true" aria-controls="collapseone">
                    About Us
                </button>
            </h2>
            <div id="collapseone" class="accordion-collapse collapse " aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                <div class="accordion-body">
                    <div class="container-fluid doctors_profile">
                        <div class="row">
                            <div class="card">
                                <div class="card-body">
                                    <form action="{{route('admin.about_us.store')}}" method="POST" id="about_us_form" name="about_us_form" enctype="multipart/form-data">
                                        @csrf
                                        <div class="row mb-3">
                                            <div class="col-lg-12">
                                                <div class="mb-3">
                                                    <label for="heading" class="form-label">Top Heading</label>
                                                    <input type="text" class="form-control" id="top_heading" name="top_heading" value="@if($about_us){{$about_us->top_heading}} @endif" />
                                                </div>
                                            </div>

                                            <div class="col-lg-12">
                                                <div class="mb-3">
                                                    @php
                                                    if($about_us){
                                                    $top_cover_image = str_replace("/public","",url('/')).'/storage/'.$about_us->image_path.$about_us->top_cover_image;
                                                    } @endphp
                                                    <div class="crop-image-preview-container @if($about_us && $top_cover_image) show @else hide  @endif" id="top_cover_image-container">
                                                        <img id="crop-image" @if($about_us && $top_cover_image) src="{{$top_cover_image}}" @endif />
                                                    </div>
                                                    <label for="top_cover_image" class="form-label">Top Banner Image</label>
                                                    <input type="file" accept="image/*" class="form-control image" id="top_cover_image" name="top_cover_image"   />
                                                    <input type="text" class="form-control image" id="top_cover_image_url" name="top_cover_image_url" hidden />
                                                </div>
                                            </div>

                                            <div class="col-lg-12">
                                                <div class="mb-3">
                                                    <label for="bottom_heading" class="form-label">Bottom heading</label>
                                                    <input type="text" class="form-control" id="bottom_heading" name="bottom_heading" value="@if($about_us){{$about_us->bottom_heading}} @endif" />
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="mb-3">
                                                    <label for="bottom_sub_heading" class="form-label">Bottom sub heading</label>
                                                    <input type="text" class="form-control" id="bottom_sub_heading" name="bottom_sub_heading" value="@if($about_us){{$about_us->bottom_sub_heading}} @endif" />
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="mb-3">
                                                    <label for="bottom_banner_status" class="form-label">Bottom banner status</label>
                                                    <div class="form-floating">
                                                        @if($about_us)
                                                        @if($about_us->bottom_banner_status == 1)
                                                        <input class="tgl bottom_banner_status_btn" type="checkbox" data-toggle="toggle" data-width="100" id="bottom_banner_status" name="bottom_banner_status" data-on="Show" data-off="Hide" data-onstyle="success" data-offstyle="danger" value="{{$about_us->id}}" checked>
                                                        @else
                                                        <input class="tgl bottom_banner_status_btn" type="checkbox" data-toggle="toggle" data-width="100" id="bottom_banner_status" name="bottom_banner_status" data-on="Show" data-off="Hide" data-onstyle="success" data-offstyle="danger" value="{{$about_us->id}}">
                                                        @endif
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="mb-3">
                                                    @php
                                                    if($about_us){
                                                    $bottom_cover_image = str_replace("/public","",url('/')).'/storage/'.$about_us->image_path.$about_us->bottom_cover_image;
                                                    } @endphp
                                                    <div class="crop-image-preview-container @if($about_us && $bottom_cover_image) show @else hide  @endif" id="bottom_cover_image-container">
                                                        <img id="crop-image" @if($about_us && $bottom_cover_image) src="{{$bottom_cover_image}}" @endif />
                                                    </div>
                                                    <label for="bottom_cover_image" class="form-label">Bottom Banner Image</label>
                                                    <input type="file" accept="image/*" class="form-control image" id="bottom_cover_image" name="bottom_cover_image"  />
                                                    <input type="text" class="form-control image" id="bottom_cover_image_url" name="bottom_cover_image_url" hidden />
                                                </div>
                                            </div>
                                            <div>
                                                <button class="btn btn_green" type="submit">
                                                    UPDATE
                                                </button>
                                                <button class="btn btn-primary" type="button" data-bs-dismiss="modal">
                                                    Cancel
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ------ -->
        <div class="accordion-item news_accordion">
            <h2 class="accordion-header" id="flush-headingTwo">
                <button class="accordion-button collapsed news_accro_btn" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                    Vision & Mission
                </button>
            </h2>
            <div id="collapseTwo" class="accordion-collapse collapse " aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="table-responsive big tableinsidetable">
                                        <table class="display vision_mission_table" id="vision_mission_basic_1">
                                            <a class="btn right_pop_btn" type="button" href="{{ url('/admin/about_us/vision_mission_add') }}">
                                                Add
                                            </a>
                                            <thead>
                                                <tr>
                                                    <th>Sr No.</th>
                                                    <th>title</th>
                                                    <th style="width: 900px;">description</th>
                                                    <th>Status</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ------ -->
        <div class="accordion-item news_accordion">
            <h2 class="accordion-header" id="flush-headingThree">
                <button class="accordion-button collapsed news_accro_btn" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
                    Chairman Speak
                </button>
            </h2>
            <div id="collapseThree" class="accordion-collapse collapse " aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
                <div class="container-fluid doctors_profile">
                    <div class="row">
                        <div class="card">
                            <div class="card-body">
                                <form action="{{ url('/admin/chairman_speak') }}" method="POST" id="chairman_speak_form " name="chairman_speak_form" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row mb-3">
                                        <div class="col-lg-12">
                                            <div class="mb-3">
                                                <label for="heading" class="form-label">Heading</label>
                                                <input type="text" class="form-control" id="heading" name="heading" value="@if($speak){{$speak->heading}}@endif" />
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="mb-3">
                                                <label for="sub_heading" class="form-label">Sub heading</label>
                                                <input type="text" class="form-control" id="sub_heading" name="sub_heading" value="@if($speak){{$speak->sub_heading}}@endif" />
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="mb-3">
                                                <label for="paragraph_1" class="form-label">Paragraph-1</label>
                                                <textarea class="form-control" placeholder="Paragraph " id="paragraph_1" name="paragraph_1" style="height: 100px">@if($speak){{$speak->paragraph_1}} @endif</textarea>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="mb-3">
                                                <label for="paragraph_2" class="form-label">Paragraph-2</label>
                                                <textarea class="form-control" placeholder="Paragraph " id="paragraph_2" name="paragraph_2" style="height: 100px">@if($speak){{$speak->paragraph_2}} @endif</textarea>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="mb-3">
                                                <label for="paragraph_3" class="form-label">Paragraph-3</label>
                                                <textarea class="form-control" placeholder="Paragraph " id="paragraph_3" name="paragraph_3" style="height: 100px">@if($speak){{$speak->paragraph_3}} @endif</textarea>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="mb-3">
                                                @php
                                                if($speak){
                                                $person_photo = str_replace("/public","",url('/')).'/storage/'.$speak->image_path.$speak->person_photo;
                                                } @endphp
                                                <div class="crop-image-preview-container  @if($speak && $person_photo) show @else hide  @endif" id="person_photo-container">
                                                    <img id="crop-image" @if($speak && $person_photo) src="{{$person_photo}}" @endif />
                                                </div>
                                                <label for="person_photo" class="form-label">Person Photo</label>
                                                <input type="file" accept="image/*" class="form-control image" id="person_photo" name="person_photo" />
                                                <input type="text" class="form-control image" id="person_photo_url" name="person_photo_url" hidden />
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="mb-3">
                                                @php
                                                if($speak){
                                                $signature_photo = str_replace("/public","",url('/')).'/storage/'.$speak->image_path.$speak->signature_photo;
                                                } @endphp
                                                <div class="crop-image-preview-container @if($speak && $signature_photo) show @else hide  @endif" id="signature_photo-container">
                                                    <img id="crop-image" @if($speak && $signature_photo) src="{{$signature_photo}}" @endif />
                                                </div>
                                                <label for="signature_photo" class="form-label">Signature Photo</label>
                                                <input type="file" accept="image/*" class="form-control image" id="signature_photo" name="signature_photo" />
                                                <input type="text" class="form-control image" id="signature_photo_url" name="signature_photo_url" hidden />
                                            </div>
                                        </div>
                                        <div>
                                            <button class="btn btn_green" type="submit">
                                                ADD
                                            </button>
                                            <button class="btn btn-primary" type="button" data-bs-dismiss="modal">
                                                Cancel
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ------ -->
        <div class="accordion-item news_accordion">
            <h2 class="accordion-header" id="flush-headingfour">
                <button class="accordion-button collapsed news_accro_btn" type="button" data-bs-toggle="collapse" data-bs-target="#collapsefour" aria-expanded="true" aria-controls="collapsefour">
                    Chairman Message
                </button>
            </h2>
            <div id="collapsefour" class="accordion-collapse collapse " aria-labelledby="flush-headingfour" data-bs-parent="#accordionFlushExample">

                <div class="container-fluid doctors_profile">
                    <div class="row">
                        <div class="card">
                            <div class="card-body">
                                <form action="{{ url('/admin/chairman_message') }}" method="POST" id="chairman_message_form " name="chairman_message_form" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row mb-3">
                                        <div class="col-lg-12">
                                            <div class="mb-3">
                                                <label for="message_heading" class="form-label">Heading</label>
                                                <input type="text" class="form-control" id="message_heading" name="message_heading" value="@if($message){{$message->message_heading}} @endif" />
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="mb-3">
                                                <label for="message_sub_heading" class="form-label">Sub heading</label>
                                                <input type="text" class="form-control" id="message_sub_heading" name="message_sub_heading" value="@if($message){{$message->message_sub_heading}} @endif" />
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="mb-3">
                                                <label for="message_paragraph_1" class="form-label">Paragraph-1</label>
                                                <textarea class="form-control" placeholder="Paragraph " id="message_paragraph_1" name="message_paragraph_1" style="height: 100px">"@if($message){{$message->message_paragraph_1}} @endif</textarea>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="mb-3">
                                                <label for="paragraph_2" class="form-label">Paragraph-2</label>
                                                <textarea class="form-control" placeholder="Paragraph " id="message_paragraph_2" name="message_paragraph_2" style="height: 100px">"@if($message){{$message->message_paragraph_2}} @endif</textarea>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="mb-3">
                                                @php
                                                if($message){
                                                $message_person_photo = str_replace("/public","",url('/')).'/storage/'.$message->image_path.$message->message_person_photo;
                                                } @endphp
                                                <div class="crop-image-preview-container @if($message && $message_person_photo) show @else hide  @endif" id="message_person_photo-container">
                                                    <img id="crop-image" @if($message && $message_person_photo) src="{{$message_person_photo}}" @endif />
                                                </div>
                                                <label for="message_person_photo" class="form-label">Person Photo</label>
                                                <input type="file" accept="image/*" class="form-control image" id="message_person_photo" name="message_person_photo" />
                                                <input type="text" class="form-control image" id="message_person_photo_url" name="message_person_photo_url" hidden />
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="mb-3">
                                                @php
                                                if($message){
                                                $message_signature_photo = str_replace("/public","",url('/')).'/storage/'.$message->image_path.$message->message_signature_photo;
                                                } @endphp
                                                <div class="crop-image-preview-container  @if($message && $message_signature_photo) show @else hide  @endif" id="message_signature_photo-container">
                                                    <img id="crop-image" @if($message && $message_signature_photo) src="{{$message_signature_photo}}" @endif />
                                                </div>
                                                <label for="message_signature_photo" class="form-label">Signature Photo</label>
                                                <input type="file" accept="image/*" class="form-control image" id="message_signature_photo" name="message_signature_photo" />
                                                <input type="text" class="form-control image" id="message_signature_photo_url" name="message_signature_photo_url" hidden />
                                            </div>
                                        </div>
                                        <div>
                                            <button class="btn btn_green" type="submit">
                                                ADD
                                            </button>
                                            <button class="btn btn-primary" type="button" data-bs-dismiss="modal">
                                                Cancel
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="accordion-item news_accordion">
            <h2 class="accordion-header" id="flush-headingFive">
                <button class="accordion-button collapsed news_accro_btn  border border-bottom-1" type="button" data-bs-toggle="collapse" data-bs-target="#collapsefive" aria-expanded="true" aria-controls="collapsefive">
                    Management Message
                </button>
            </h2>
            <div id="collapsefive" class="accordion-collapse collapse " aria-labelledby="flush-headingFive" data-bs-parent="#accordionFlushExample">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="table-responsive big tableinsidetable">
                                        <table class="display management_message_table" id="management_message_basic_1">
                                            <a class="btn right_pop_btn" type="button" href="{{ url('/admin/about_us/management_message_add') }}">
                                                Add
                                            </a>
                                            <thead>
                                                <tr>
                                                    <th>Sr No.</th>
                                                    <th>Name</th>
                                                    <th>Designation</th>
                                                    <th>Status</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
</div>
@endsection

@section('script')
@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-colorpicker/3.4.0/js/bootstrap-colorpicker.min.js" integrity="sha512-94dgCw8xWrVcgkmOc2fwKjO4dqy/X3q7IjFru6MHJKeaAzCvhkVtOS6S+co+RbcZvvPBngLzuVMApmxkuWZGwQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script type="text/javascript" src="{{ asset('admin_assets/custom/about_us.js') }}"></script>
@endsection