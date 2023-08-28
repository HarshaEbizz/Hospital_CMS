@extends('admin.layouts.login_after')
@section('content')
<div class="page-body">
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-6">
                    <h3>Home Content</h3>
                </div>
            </div>
        </div>
    </div>
    <!-- ------ -->
    <div class="container-fluid doctors_profile">
        <div class="row">
            <div class="card">
                <div class="card-body">
                    <input type="hidden" id="message_data" name="message_data" value="@if($home_content) {{$home_content->message_iamge}} @endif">
                    <input type="hidden" id="content_data" name="content_data" value="@if($home_content) {{$home_content->content}} @endif">
                    <form action="{{route('admin.home_content.store')}}" method="POST" id="home_content_form" name="home_content_form" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-3">
                            <div class="row">
                                @php
                                if($home_content){
                                $front_iamge = str_replace("/public","",url('/')).'/storage/'.$home_content->image_path.$home_content->front_iamge;
                                $back_image = str_replace("/public","",url('/')).'/storage/'.$home_content->image_path.$home_content->back_image;
                                } @endphp
                                <!-- <div class="col-lg-6">
                                    <div class="crop-image-preview-container front-image-container  @if($home_content && $front_iamge) show @else hide  @endif">
                                        Front Image
                                        <img id="crop-image" @if($home_content && $front_iamge) src="{{$front_iamge}}" @endif />
                                    </div>
                                </div> -->
                                <!-- <div class="col-lg-6">
                                    <div class="crop-image-preview-container back-image-container @if($home_content && $back_image) show @else hide  @endif">
                                        Back Image
                                        <img id="crop-image" @if($home_content && $back_image) src="{{$back_image}}" @endif />
                                    </div>
                                </div> -->
                            </div>
                            <div class="col-lg-12">
                                <div class="crop-image-preview-container front-image-container  @if($home_content && $front_iamge) show @else hide  @endif">
                                    Front Image
                                    <img id="crop-image" @if($home_content && $front_iamge) src="{{$front_iamge}}" @endif />
                                </div>
                                <div class="mb-3">
                                    <label for="front_iamge" class="form-label">Front Image</label>
                                    <input type="file" accept="image/*" class="form-control image" id="front_iamge" name="front_iamge" />
                                    <input type="text" class="form-control image" id="front_iamge_url" name="front_iamge_url" hidden />
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="crop-image-preview-container back-image-container @if($home_content && $back_image) show @else hide  @endif">
                                    Back Image
                                    <img id="crop-image" @if($home_content && $back_image) src="{{$back_image}}" @endif />
                                </div>
                                <div class="mb-3">
                                    <label for="back_image" class="form-label">Back Image</label>
                                    <input type="file" accept="image/*" class="form-control image" id="back_image" name="back_image" />
                                    <input type="text" class="form-control image" id="back_image_url" name="back_image_url" hidden />
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <label for="message_iamge" class="form-label">Message of Images</label>
                                    <div class="form-floating">
                                        <textarea class="form-control" placeholder="Message " id="message_iamge" name="message_iamge" style="height: 100px"></textarea>
                                    </div>
                                    <label id="message_iamge-error" class="error" for="message_iamge"></label>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <label for="content" class="form-label">Content</label>
                                    <div class="form-floating" id="">
                                        <textarea class="form-control" placeholder=" " id="content" name="content" style="height: 100px"></textarea>
                                    </div>
                                    <label id="content-error" class="error" for="content"></label>
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
@endsection
@section('script')
<script src="{{ asset('admin_assets/custom/home_content.js') }}"></script>
@endsection