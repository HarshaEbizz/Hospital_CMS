@extends('admin.layouts.login_after')
@section('content')
<div class="page-body">
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-6">
                    <h3>Add Schemes</h3>
                </div>
            </div>
        </div>
    </div>
    <!-- ------ -->
    <div class="container-fluid doctors_profile">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('admin.goverment_scheme.store') }}" method="POST" id="add_scheme_form" name="add_scheme_form" enctype="multipart/form-data">
                    @csrf
                    <div class="row mb-3">
                        <div class="col-lg-12">
                            <div class="mb-3">
                                <label for="scheme_name" class="form-label">Scheme Name</label>
                                <input type="text" class="form-control" id="scheme_name" name="scheme_name" />
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="mb-3">
                                <label for="scheme_note" class="form-label">Scheme Note</label>
                                <input type="text" class="form-control" id="scheme_note" name="scheme_note" />
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="mb-3">
                                <label for="scheme_image" class="form-label">Scheme Image</label>
                                <input type="file" accept="image/*" class="form-control" id="scheme_image" name="scheme_image" />
                                <input type="text" class="form-control" id="scheme_image_url" name="scheme_image_url" hidden />
                            </div>
                        </div>

                        <h4>Services</h4>
                        <div class="col-lg-12">
                            <div class="mb-3">
                                <label for="title_1" class="form-label">Title</label>
                                <input type="text" class="form-control" id="title_1" name="title_1" required />
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="mb-3">
                                <label for="note_1" class="form-label">Note</label>
                                <input type="text" class="form-control" id="note_1" name="note_1" />
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="mb-3">
                                <label for="details_1" class="form-label">Details</label>
                                <textarea class="form-control" placeholder="Add fetaure using COMMA(,)  example-> ABC, XYZ" id="details_1" name="details_1" style="height: 100px" required></textarea>
                            </div>
                            <label id="details_1-error" class="error" for="details_1"></label>
                        </div>

                        <h4>Key Features</h4>
                        <div class="col-lg-12">
                            <div class="mb-3">
                                <label for="title_2" class="form-label">Title</label>
                                <input type="text" class="form-control" id="title_2" name="title_2" />
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="mb-3">
                                <label for="details_2" class="form-label">Details</label>
                                <textarea class="form-control" placeholder="Message " id="details_2" name="details_2" style="height: 100px"></textarea>
                            </div>
                            <label id="details_2-error" class="error" for="details_2"></label>
                        </div>

                        <div>
                            <a class="btn btn-secondary modelbtn" type="button" href="{{route('admin.goverment_scheme.index')}}">
                                Close
                            </a>
                            <button class="btn btn-primary" type="submit" title=""> Add </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>
@endsection
@section('script')
<script src="{{ asset('admin_assets/custom/goverment_scheme.js') }}"></script>
@endsection