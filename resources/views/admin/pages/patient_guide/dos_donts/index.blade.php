@extends('admin.layouts.login_after')
@section('content')
<div class="page-body">
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-6">
                    <h3>Do’s & Don’ts</h3>
                </div>
            </div>
        </div>
    </div>
    <!-- ------ -->
    <div class="container-fluid doctors_profile">
        <div class="card">
            <div class="card-body">
                <form action="{{route('admin.dos_donts.store')}}" method="POST" id="dos_donts_form" name="dos_donts_form" enctype="multipart/form-data">
                    @csrf
                    <div class="row mb-3">
                        <input id="id" name="id" value="@if($do_and_donts){{$do_and_donts->id}} @endif" type="hidden">
                        <div class="col-lg-12">
                            <div class="mb-3">
                                <label for="title" class="form-label">Heading</label>
                                <input type="text" class="form-control" id="heading" name="heading" value="@if($do_and_donts){{$do_and_donts->heading}} @endif" />
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="mb-3">
                                <label for="title" class="form-label">Title</label>
                                <input type="text" class="form-control" id="title" name="title" value="@if($do_and_donts) {{$do_and_donts->title}} @endif" />
                            </div>
                        </div>
                        <div class="col-lg-12">
                            @php
                            if($do_and_donts){
                            $image = str_replace("/public","",url('/')).'/storage/'.$do_and_donts->image_path.$do_and_donts->cover_image;
                            } @endphp
                            <div class="mb-3">
                                <div class="crop-image-preview-container image-preview-container @if($do_and_donts && $image) show @else hide  @endif">
                                    <img id="crop-image" @if($do_and_donts && $image) src="{{$image}}" @endif />
                                </div>
                                <label for="cover_image" class="form-label">Cover Image</label>
                                <input type="file" accept="image/*" class="form-control" id="cover_image" name="cover_image" />
                                <input type="text" class="form-control" id="cover_image_url" name="cover_image_url" hidden/>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="mb-3">
                                <label for="do" class="form-label">Do’s</label>
                                <textarea class="form-control" placeholder="Message " id="do" name="do" style="height: 100px">@if($do_and_donts) {!! $do_and_donts->do !!} @endif</textarea>
                            </div>
                            <label id="do-error" class="error" for="do"></label>
                        </div>
                        <div class="col-lg-12">
                            <div class="mb-3">
                                <label for="donts" class="form-label">Don’ts</label>
                                <textarea class="form-control" placeholder="Message " id="donts" name="donts" style="height: 100px">@if($do_and_donts) {!! $do_and_donts->donts !!} @endif</textarea>
                            </div>
                            <label id="donts-error" class="error" for="donts"></label>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <h3>Content</h3>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="mb-3">
                                <button type="button" class="btn btn-success btn-rounded btn-icon" id="add_content">Content &nbsp;<i class="fa fa-solid fa-plus"></i></button>
                            </div>
                        </div>
                        <div class="row" id="add_content_inputs">
                            @if($do_and_donts)
                            @foreach($do_and_donts->Content as $content)
                            <div class="content_card" id="content_card_{{$content->id}}">
                                <div class="card-body">
                                    <div class="card-title">
                                        <button type="button" class="btn btn-danger btn-icon-text delete_box_content" data_id="{{$content->id}}" style="float: right;">
                                            <i class="fa fa-solid fa-trash"></i></button>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-lg-12">
                                            <input type="hidden" id="content_id[{{$content->id}}]" name="content_id[]" value="{{$content->id}}">
                                            <div class="mb-3">
                                                <label for="subtitle" class="form-label">Sub title</label>
                                                <input type="text" class="form-control" id="subtitle[{{$content->id}}]" name="subtitle[]" class="content_title" value="{{$content->subtitle}}" />
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="mb-3">
                                                <label for="description" class="form-label">description</label>
                                                <textarea class="form-control content_description" placeholder="Message " id="description[{{$content->id}}]" name="description[]" style="height: 100px">{!! $content->description !!}</textarea>
                                            </div>
                                            <label id="description[{{$content->id}}]-error" class="error" for="description[{{$content->id}}]"></label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            @endif
                        </div>
                        <div>
                            <button class="btn btn_green" type="submit">
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
<script src="{{ asset('admin_assets/custom/dos_donts.js') }}"></script>
@endsection