@extends('admin.layouts.login_after')
@section('content')
<div class="page-body">
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-6">
                    <h3>Visiting Hours</h3>
                </div>
            </div>
        </div>
    </div>
    <!-- ------ -->
    <div class="container-fluid doctors_profile">
        <div class="card">
            <div class="card-body">
                <form action="{{route('admin.visiting_hours.store')}}" method="POST" id="visiting_hours_form" name="visiting_hours_form" enctype="multipart/form-data">
                    @csrf
                    <div class="row mb-3">
                        <div class="col-lg-12">
                            <div class="mb-3">
                                <label for="title" class="form-label">Heading</label>
                                <input type="text" class="form-control" id="heading" name="heading" value="@if($hours){{$hours->heading}} @endif" />
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="mb-3">
                                <label for="title" class="form-label">Title</label>
                                <input type="text" class="form-control" id="title" name="title" value="@if($hours) {{$hours->title}} @endif" />
                            </div>
                        </div>
                        <div class="col-lg-12">
                            @php
                            if($hours){
                            $image = str_replace("/public","",url('/')).'/storage/'.$hours->image_path.$hours->cover_image;
                            } @endphp
                            <div class="mb-3">
                                <div class="crop-image-preview-container image-preview-container @if($hours && $image) show @else hide  @endif">
                                    <img id="crop-image" @if($hours && $image) src="{{$image}}" @endif />
                                </div>
                                <label for="image" class="form-label">Cover Image</label>
                                <input type="file" accept="image/*" class="form-control" id="cover_image" name="cover_image" />
                                <input type="text" class="form-control" id="cover_image_url" name="cover_image_url" hidden/>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="mb-3">
                                <label for="note" class="form-label">Note</label>
                                <textarea class="form-control" placeholder="Message " id="note" name="note" style="height: 100px">@if($hours) {!! $hours->note !!} @endif</textarea>
                            </div>
                            <label id="note-error" class="error" for="note"></label>
                        </div>
                        <div class="col-lg-12">
                            @if($hours)
                            @php $morning_timing = explode('To', $hours->morning_timing); @endphp
                            @endif
                            <div class="mb-3 row">
                                <label for="opd_timing" class="form-label">Morning Time</label>
                                <div class="col-lg-6">
                                    <input type="time" class="form-control" id="morning_open_time" name="morning_open_time" value="@if($hours){{(trim($morning_timing[0]))}}@endif" />
                                </div>
                                <div class="col-lg-6">
                                    <input type="time" class="form-control" id="morning_close_time" name="morning_close_time" value="@if($hours){{trim($morning_timing[1])}}@endif" />
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            @if($hours)
                            @php $eveining_timimg = explode('To', $hours->eveining_timimg); @endphp
                            @endif
                            <div class="mb-3 row">
                                <label for="opd_timing" class="form-label">Evening Time</label>
                                <div class="col-lg-6">
                                    <input type="time" class="form-control" id="evening_open_time" name="evening_open_time" value="@if($hours){{trim($eveining_timimg[0])}}@endif" />
                                </div>
                                <div class="col-lg-6">
                                    <input type="time" class="form-control" id="evening_close_time" name="evening_close_time" value="@if($hours){{trim($eveining_timimg[1])}}@endif" />
                                </div>
                            </div>
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
<script src="{{ asset('admin_assets/custom/visiting_hours.js') }}"></script>
@endsection