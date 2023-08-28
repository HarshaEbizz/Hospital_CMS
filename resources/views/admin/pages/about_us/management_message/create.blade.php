@extends('admin.layouts.login_after')
@section('content')
<div class="page-body">
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-6">
                    <h3>Add</h3>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid doctors_profile">
        <div class="row">
            <div class="card">
                <div class="card-body">
                    <form action="{{ url('/admin/about_us/management_message') }}" method="POST" id="management_person_form" name="management_person_form">
                        @csrf
                        <div class="row mb-3">
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="name" class="form-label">Name</label>
                                    <input type="text" class="form-control" id="name" name="name">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="designation" class="form-label">Designation</label>
                                    <input type="text" class="form-control" id="designation" name="designation">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="photo" class="form-label">Upload Photo</label>
                                    <input class="form-control" type="file" accept="image/*" id="management_photo" name="management_photo">
                                    <input class="form-control" type="text" id="management_photo_url" name="management_photo_url" hidden>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <label for="message" class="form-label">Message</label>
                                    <div>
                                        <textarea class="form-control" placeholder="Message " id="message" name="message" style="height: 100px"></textarea>
                                    </div>
                                    <label id="message-error" class="error" for="message"></label>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <label for="expertise" class="form-label">Expertise</label>
                                    <div class="form-floating" id="expertise_textarea">
                                        <textarea class="form-control" placeholder="Message " id="expertise" name="expertise" style="height: 100px"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Professional Highlights</label>
                                    <div class="form-floating" id="professional_highlight_textarea">
                                        <textarea class="form-control" placeholder="Message " id="professional_highlight" name="professional_highlight" style="height: 100px"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <button class="btn btn_green" type="submit">
                                    ADD
                                </button>
                                <a class="btn btn-primary" type="button" href="{{ url('/admin/about_us') }}">
                                    Close
                                </a>
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
<script type="text/javascript" src="{{ asset('admin_assets/custom/management_message.js') }}"></script>
@endsection