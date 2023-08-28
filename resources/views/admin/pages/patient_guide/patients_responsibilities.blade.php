@extends('admin.layouts.login_after')

@section('content')
<div class="page-body">
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-6">
                    <h3>Patient’s Rights & Responsibilities</h3>
                </div>
            </div>
        </div>
    </div>
    <!-- ------ -->
    <div class="container-fluid doctors_profile">
        <div class="card">
            <div class="card-body">
                <form action="{{route('admin.patients_responsibilities.store')}}" method="POST" id="patients_responsibilities_form" name="patients_responsibilities_form" enctype="multipart/form-data">
                    @csrf
                    <div class="row mb-3">
                        <input id="id" name="id" value="@if($rights_responsibilities){{$rights_responsibilities->id}} @endif" type="hidden">
                        <div class="col-lg-12">
                            <div class="mb-3">
                                <label for="title" class="form-label">Heading</label>
                                <input type="text" class="form-control" id="heading" name="heading" value="@if($rights_responsibilities){{$rights_responsibilities->heading}} @endif" />
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="mb-3">
                                <label for="title" class="form-label">Title</label>
                                <input type="text" class="form-control" id="title" name="title" value="@if($rights_responsibilities) {{$rights_responsibilities->title}} @endif" />
                            </div>
                        </div>
                        <div class="col-lg-12">
                            @php
                            if($rights_responsibilities){
                            $image = str_replace("/public","",url('/')).'/storage/'.$rights_responsibilities->image_path.$rights_responsibilities->image_name;
                            } @endphp
                            <div class="mb-3">
                                <div class="crop-image-preview-container image-preview-container  @if($rights_responsibilities && $image) show @else hide  @endif">
                                    <img id="crop-image" @if($rights_responsibilities && $image) src="{{$image}}" @endif />
                                </div>
                                <label for="image" class="form-label">Image</label>
                                <input type="file" accept="image/*" class="form-control" id="image" name="image" />
                                <input type="text" class="form-control" id="image_url" name="image_url" hidden />
                            </div>
                        </div>
                        <div class="col-lg-12">
                            @php
                            if($rights_responsibilities){
                            $image = str_replace("/public","",url('/')).'/storage/'.$rights_responsibilities->image_path.$rights_responsibilities->cover_image;
                            } @endphp
                            <div class="mb-3">
                                <div class="crop-image-preview-container cover-image-preview-container  @if($rights_responsibilities && $image) show @else hide  @endif">
                                    <img id="crop-image" @if($rights_responsibilities && $image) src="{{$image}}" @endif />
                                </div>
                                <label for="image" class="form-label">Cover Image</label>
                                <input type="file" accept="image/*" class="form-control" id="cover_image" name="cover_image" />
                                <input type="text" class="form-control" id="cover_image_url" name="cover_image_url" hidden/>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="mb-3">
                                <label for="rights" class="form-label">Patient Rights</label>
                                <textarea class="form-control" placeholder="Message " id="rights" name="rights" style="height: 100px">@if($rights_responsibilities) {!! $rights_responsibilities->rights !!} @endif</textarea>
                            </div>
                            <label id="rights-error" class="error" for="rights"></label>
                        </div>
                        <div class="col-lg-12">
                            <div class="mb-3">
                                <label for="responsibilities" class="form-label">Patient Responsibilities</label>
                                <textarea class="form-control" placeholder="Message " id="responsibilities" name="responsibilities" style="height: 100px">@if($rights_responsibilities) {!! $rights_responsibilities->responsibilities !!} @endif</textarea>
                            </div>
                            <label id="responsibilities-error" class="error" for="responsibilities"></label>
                        </div>
                        <div>
                            <button class="btn btn_green" type="submit" data-bs-dismiss="modal" data-bs-original-title="" title="">
                                UPDATE
                            </button>
                            <a class="btn btn-secondary modelbtn" type="button" href="{{ route('admin.patients_guide_service.index') }}">
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
<script src="{{ asset('admin_assets/custom/patients_responsibilities.js') }}"></script>
@endsection