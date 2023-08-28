@extends('admin.layouts.login_after')
@section('style')
<style>
    .image-preview-container {
        width: 50%;
        margin: 0 auto;
        border: 1px solid rgba(0, 0, 0, 0.1);
        padding: 3rem;
        border-radius: 20px;
        display: none;
    }

    .image-preview-container img {
        width: 100%;
        margin-bottom: 10px;
    }

    .cover-image-preview-container {
        width: 50%;
        margin: 0 auto;
        border: 1px solid rgba(0, 0, 0, 0.1);
        padding: 3rem;
        border-radius: 20px;
        display: none;
    }

    .cover-image-preview-container img {
        width: 100%;
        margin-bottom: 10px;
    }

    .show {
        display: block;
    }

    .hide {
        display: none;
    }
</style>
@endsection
@section('content')
<div class="page-body">
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-6">
                    <h3>Kiran Academics</h3>
                </div>
            </div>
        </div>
    </div>
    <!-- ------ -->
    <div class="container-fluid doctors_profile">
        <div class="row">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin.medic.store') }}" method="POST" id="medic_add_update_form" name="medic_add_update_form" enctype="multipart/form-data">
                        @csrf
                        @php
                        if ($medic_details) {
                        $image = str_replace('/public', '', url('/')) . '/storage/' . $medic_details->image_path;
                        } @endphp

                        <div class="row mb-3">
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <label for="title" class="form-label">Heading</label>
                                    <input type="text" class="form-control" id="heading" name="heading" value="@if($medic_details){{$medic_details->heading}} @endif" />
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <div class="crop-image-preview-container cover_img_pc @if ($medic_details) show @else hide @endif">
                                        <img id="crop-image" @if ($medic_details) src="{{ $image }}{{ $medic_details->cover_image }}" @endif/>
                                    </div>
                                    <label for="cover_image" class="form-label">Cover Image</label>
                                    <input type="file" accept="image/*" class="form-control" id="cover_image" name="cover_image" @if(!$medic_details) required @endif/>
                                    <input type="text" id="cover_image_url" name="cover_image_url" hidden />
                                </div>
                            </div>
                            <h5>Description - 1</h5>
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <label for="title_1" class="form-label">Title</label>
                                    <input type="text" class="form-control" id="title_1" name="title_1" value="@if($medic_details){{$medic_details->title_1}} @endif" />
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <div class="crop-image-preview-container image_1_pc @if ($medic_details) show @else hide @endif">
                                        <img id="crop-image" @if ($medic_details) src="{{ $image }}{{ $medic_details->image_1 }}" @endif />
                                    </div>
                                    <label for="image_1" class="form-label">Image</label>
                                    <input type="file" accept="image/*" class="form-control" id="image_1" name="image_1"  @if(!$medic_details) required @endif/>
                                    <input type="text" id="image_1_url" name="image_1_url" hidden />
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <label for="description_1" class="form-label">Description</label>
                                    <textarea class="form-control" placeholder="Message " id="description_1" name="description_1" style="height: 100px">@if($medic_details) {!! $medic_details->description_1 !!} @endif</textarea>
                                </div>
                                <label id="description-error" class="error" for="description_1"></label>
                            </div>
                            <h5>Description - 2</h5>
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <label for="title_2" class="form-label">Title</label>
                                    <input type="text" class="form-control" id="title_2" name="title_2" value=" @if($medic_details) {{ $medic_details->title_2 }} @endif" />
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <div class="crop-image-preview-container image_2_pc @if ($medic_details) show @else hide @endif">
                                        <img id="crop-image" @if ($medic_details) src="{{ $image }}{{ $medic_details->image_2 }}" @endif />
                                    </div>
                                    <label for="image_2" class="form-label">Image</label>
                                    <input type="file" accept="image/*" class="form-control" id="image_2" name="image_2"  @if(!$medic_details) required @endif/>
                                    <input type="text" class="form-control" id="image_2_url" name="image_2_url" hidden />
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <label for="description_2" class="form-label">Description</label>
                                    <textarea class="form-control" placeholder="Message " id="description_2" name="description_2" style="height: 100px"> @if($medic_details){!! $medic_details->description_2 !!} @endif </textarea>
                                </div>
                                <label id="description-error" class="error" for="description_2"></label>
                            </div>
                            <div>
                                <button class="btn btn_green" type="submit" title="" id="medic_btn">
                                    @if($medic_details) Update @else Add @endif
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
<script src="{{ asset('admin_assets/custom/medic.js') }}"></script>
@endsection
