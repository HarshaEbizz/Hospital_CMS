@extends('admin.layouts.login_after')
@section('content')

<div class="page-body">
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-6">
                    <h3>Add Details</h3>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid doctors_profile">
        <div class="card">
            <div class="card-body">
                <form action="{{route('admin.photo_gallery.store')}}" method="POST" id="add_event_form " name="add_event_form" enctype="multipart/form-data">
                    @csrf
                    <div class="row mb-3">
                        <div class="col-lg-12">
                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" class="form-control" id="name" name="name" />
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="mb-3">
                                <label for="description" class="form-label">Description</label>
                                <textarea class="form-control" placeholder="Message " id="description" name="description" style="height: 100px"></textarea>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="mb-3">
                                <label for="date" class="form-label">Year</label>
                                <input type="date" class="form-control" id="date" name="date" max="@php echo date("Y-m-d"); @endphp"/>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="mb-3">
                                <label for="main_image" class="form-label">Cover Image</label>
                                <input type="file" accept="image/*" class="form-control" id="main_image" name="main_image" />
                                <input type="text" class="form-control" id="main_image_url" name="main_image_url" hidden />
                            </div>
                        </div>
                        <div>
                            <button class="btn btn_green" type="submit">
                                ADD
                            </button>
                            <a class="btn btn-secondary modelbtn" type="button" href="{{ route('admin.photo_gallery.index') }}">
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
<script src="{{ asset('admin_assets/custom/photo_gallery.js') }}"></script>
@endsection