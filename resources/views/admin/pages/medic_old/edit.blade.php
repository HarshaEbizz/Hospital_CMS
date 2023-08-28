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
                        <h3>Update Page Content</h3>
                    </div>
                </div>
            </div>
        </div>
        <!-- ------ -->
        <div class="container-fluid doctors_profile">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin.medic.update',$medic_details->id) }}" method="POST" id="medic_update_form" name="medic_update_form"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        @php
                            if ($medic_details) {
                                $image = str_replace('/public', '', url('/')) . '/storage/' . $medic_details->image_path;
                        } @endphp

                        <div class="row mb-3">
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <label for="title" class="form-label">Heading</label>
                                    <input type="text" class="form-control" id="heading" name="heading"
                                        value="{{ $medic_details->heading }}" />
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="cover-image-preview-container cover_img_pc @if ($medic_details->cover_image) show @else hide @endif">
                                    <img id="preview-selected-cover-image" @if ($medic_details->cover_image) src="{{ $image }}{{ $medic_details->cover_image }}" @endif/>
                                </div>
                                <div class="mb-3">
                                    <label for="cover_image" class="form-label">Cover Image</label>
                                    <input type="file" accept="image/*" class="form-control" id="cover_image" name="cover_image"
                                        aria-describedby="emailHelp" />
                                </div>
                            </div>
                            <h5>Description - 1</h5>
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <label for="title_1" class="form-label">Title</label>
                                    <input type="text" class="form-control" id="title_1" name="title_1"
                                        value="{{ $medic_details->title_1 }}" />
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div
                                    class="cover-image-preview-container image_1_pc @if ($medic_details->image_1) show @else hide @endif">
                                    <img id="image_1_preview_selected_image"
                                        @if ($medic_details->image_1) src="{{ $image }}{{ $medic_details->image_1 }}" @endif />
                                </div>
                                <div class="mb-3">
                                    <label for="image_1" class="form-label">Image</label>
                                    <input type="file" accept="image/*" class="form-control" id="image_1" name="image_1" />
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <label for="description_1" class="form-label">Description</label>
                                    <textarea class="form-control" placeholder="Message " id="description_1" name="description_1" style="height: 100px">{!! $medic_details->description_1 !!}</textarea>
                                </div>
                                <label id="description-error" class="error" for="description_1"></label>
                            </div>
                            <h5>Description - 2</h5>
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <label for="title_2" class="form-label">Title</label>
                                    <input type="text" class="form-control" id="title_2" name="title_2"
                                        value="{{ $medic_details->title_2 }}" />
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="cover-image-preview-container image_2_pc @if ($medic_details->image_2) show @else hide @endif">
                                    <img id="image_2_preview_selected_image" @if ($medic_details->image_2) src="{{ $image }}{{ $medic_details->image_2 }}" @endif />
                                </div>
                                <div class="mb-3">
                                    <label for="image_2" class="form-label">Image</label>
                                    <input type="file" accept="image/*" class="form-control" id="image_2" name="image_2" />
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <label for="description_2" class="form-label">Description</label>
                                    <textarea class="form-control" placeholder="Message " id="description_2" name="description_2" style="height: 100px">{!! $medic_details->description_2 !!}</textarea>
                                </div>
                                <label id="description-error" class="error" for="description_2"></label>
                            </div>
                            <div>
                                <a class="btn btn-secondary modelbtn" type="button"
                                    href="{{ route('admin.medic.index') }}">
                                    Close
                                </a>
                                <button class="btn btn-primary" type="submit" title=""> Update </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
@endsection
@section('script')
    <script src="{{ asset('admin_assets/custom/medic.js') }}"></script>
@endsection
