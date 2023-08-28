@extends('admin.layouts.login_after')
@section('content')
<div class="page-body">
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-6">
                    <h3>Hospital Tour Video</h3>
                </div>
            </div>
        </div>
    </div>
    <!-- ------ -->
    <div class="container-fluid doctors_profile">
        <div class="card">
            <div class="card-body">
                <form action="{{route('admin.hosp_tour.store')}}" method="POST" id="hosp_tour_form" name="hosp_tour_form" enctype="multipart/form-data">
                    @csrf
                    <div class="row mb-3">
                        <input id="id" name="id" value="@if($tour_video){{$tour_video->id}} @endif" type="hidden">
                        <div class="col-lg-12">
                            <div class="mb-3">
                                <label for="title" class="form-label">Top Heading</label>
                                <input type="text" class="form-control" id="heading" name="heading" value="@if($tour_video){{$tour_video->heading}} @endif">
                            </div>
                        </div>
                        <div class="col-lg-12">
                            @php
                            if($tour_video){
                            $image = str_replace("/public","",url('/')).'/storage/'.$tour_video->image_path.$tour_video->cover_image;
                            } @endphp
                            <div class="mb-3">
                                <div class="crop-image-preview-container image-preview-container @if($tour_video && $image) show @else hide  @endif">
                                    <img id="crop-image" @if($tour_video && $image) src="{{$image}}" @endif />
                                </div>
                                <label for="cover_image" class="form-label">Top Banner Image</label>
                                <input type="file" accept="image/*" class="form-control" id="cover_image" name="cover_image" />
                                <input type="text" class="form-control" id="cover_image_url" name="cover_image_url" hidden />
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="mb-3">
                                <label for="title" class="form-label">Bottom Heading</label>
                                <input type="text" class="form-control" id="bottom_heading" name="bottom_heading" value="@if($tour_video){{$tour_video->bottom_heading}} @endif" />
                            </div>
                        </div>
                        <div class="col-lg-12">
                            @php
                            if($tour_video){
                            $image = str_replace("/public","",url('/')).'/storage/'.$tour_video->image_path.$tour_video->bottom_cover_image;
                            } @endphp
                            <div class="mb-3">
                                <div class="crop-image-preview-container image-preview-container1 @if($tour_video && $image) show @else hide  @endif">
                                    <img id="crop-image" @if($tour_video && $image) src="{{$image}}" @endif />
                                </div>
                                <label for="bottom_cover_image" class="form-label">Bottom Banner Image</label>
                                <input type="file" accept="image/*" class="form-control" id="bottom_cover_image" name="bottom_cover_image" />
                                <input type="text" class="form-control" id="bottom_cover_image_url" name="bottom_cover_image_url" hidden />
                            </div>
                        </div>
                        <div class="row" id="add_Video_inputs">
                            <div class="col-lg-12">
                                <h6>Top Banner Videos</h6>
                            </div>
                            @if($tour_video)
                            @php $videos = unserialize($tour_video->object);@endphp
                            @php $i=0; @endphp
                            @foreach ($videos as $key => $video)
                            <div class="col-lg-12 box video_card_{{++$i}} ">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="mb-3">
                                            <label for="video_caption  video_card_{{$i}}" class="form-label">Video caption</label>
                                            <input type="text" class="form-control" id="video_caption_{{$i}}" name="video_caption[]" value="@if($tour_video){{$video['caption']}} @endif" />
                                        </div>
                                    </div>
                                    <div class="col-5">
                                        <div class="mb-3">
                                            <label for="video_url" class="form-label">Video url</label>
                                            <input type="text" class="form-control" id="video_url_{{$i}}" name="video_url[]" value="@if($tour_video){{$video['url']}}@endif" />
                                        </div>
                                    </div>
                                    <div class="col-1">
                                        @if($key==0)
                                        <div class="" style="margin: 0;position: absolute;top: 50%;-ms-transform: translateY(-50%);transform: translateY(-50%);">
                                            <button type="button" class="btn btn-success btn-rounded btn-icon" id="add_Video"><i class="fa fa-solid fa-plus"></i></button>
                                        </div>
                                        @else
                                        <div class="" style="margin: 0;position: absolute;top: 50%;-ms-transform: translateY(-50%);transform: translateY(-50%);">
                                            <button type="button" class="btn btn-danger btn-icon-text delete_video" id="delete" data-id="{{$i}}"> <i class="fa fa-solid fa-trash"></i></button>
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            @else
                            <div class="col-lg-12 box video_card_1 ">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="mb-3">
                                            <label for="video_caption" class="form-label">Video caption</label>
                                            <input type="text" class="form-control" id="video_caption_1" name="video_caption[]" value="@if($tour_video){{ trim($tour_video->video_caption)}}@endif" />
                                        </div>
                                    </div>
                                    <div class="col-5">
                                        <div class="mb-3">
                                            <label for="video_url" class="form-label">Video url</label>
                                            <input type="text" class="form-control" id="video_url_1" name="video_url[]" value="@if($tour_video){{$tour_video->url}}@endif" />
                                        </div>
                                    </div>
                                    <div class="col-1">
                                        <div class="" style="margin: 0;position: absolute;top: 50%;-ms-transform: translateY(-50%);transform: translateY(-50%);">
                                            <button type="button" class="btn btn-success btn-rounded btn-icon" id="add_Video"><i class="fa fa-solid fa-plus"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endif
                        </div>
                        <div class="row" id="add_bottom_video_inputs">
                            <div class="col-lg-12">
                                <h6>Bottom Banner Videos</h6>
                            </div>
                            @if($tour_video && !empty(unserialize($tour_video->bottom_videos_object)) && unserialize($tour_video->bottom_videos_object)!=null)
                            @php $bottom_videos = unserialize($tour_video->bottom_videos_object);@endphp
                            @php $j=0; @endphp
                            @foreach ($bottom_videos as $key => $video)
                            <div class="col-lg-12 box bottom_box bottom_vdo_card_{{++$j}} ">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="mb-3">
                                            <label for="bottom_video_caption_{{$j}}" class="form-label">Video caption</label>
                                            <input type="text" class="form-control" id="bottom_video_caption_{{$j}}" name="bottom_video_caption[]" value="@if($tour_video){{$video['caption']}} @endif" />
                                        </div>
                                    </div>
                                    <div class="col-5">
                                        <div class="mb-3">
                                            <label for="bottom_video_url_{{$j}}" class="form-label">Video url</label>
                                            <input type="text" class="form-control" id="bottom_video_url_{{$j}}" name="bottom_video_url[]" value="@if($tour_video){{$video['url']}}@endif" />
                                        </div>
                                    </div>
                                    <div class="col-1">
                                        @if($key==0)
                                        <div class="" style="margin: 0;position: absolute;top: 50%;-ms-transform: translateY(-50%);transform: translateY(-50%);">
                                            <button type="button" class="btn btn-success btn-rounded btn-icon" id="add_bottom_video"><i class="fa fa-solid fa-plus"></i></button>
                                        </div>
                                        @else
                                        <div class="" style="margin: 0;position: absolute;top: 50%;-ms-transform: translateY(-50%);transform: translateY(-50%);">
                                            <button type="button" class="btn btn-danger btn-icon-text delete_bottom_video" id="vid_delete" data-id="{{$j}}"> <i class="fa fa-solid fa-trash"></i></button>
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            @else
                            <div class="col-lg-12 box bottom_box  bottom_vdo_card_1 ">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="mb-3">
                                            <label for="bottom_video_caption_1" class="form-label">Video caption</label>
                                            <input type="text" class="form-control" id="bottom_video_caption_1" name="bottom_video_caption[]" />
                                        </div>
                                    </div>
                                    <div class="col-5">
                                        <div class="mb-3">
                                            <label for="bottom_video_url_1" class="form-label">Video url</label>
                                            <input type="text" class="form-control" id="bottom_video_url_1" name="bottom_video_url[]" />
                                        </div>
                                    </div>
                                    <div class="col-1">
                                        <div class="" style="margin: 0;position: absolute;top: 50%;-ms-transform: translateY(-50%);transform: translateY(-50%);">
                                            <button type="button" class="btn btn-success btn-rounded btn-icon" id="add_bottom_video"><i class="fa fa-solid fa-plus"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endif
                        </div>
                        <div>
                            <button class="btn btn_green" type="submit">
                                UPDATE
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
<script src="{{ asset('admin_assets/custom/hosp_tour.js') }}"></script>
@endsection