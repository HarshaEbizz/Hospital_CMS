@extends('admin.layouts.login_after')
@section('style')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-colorpicker/3.4.0/css/bootstrap-colorpicker.min.css" integrity="sha512-m/uSzCYYP5f55d4nUi9mnY9m49I8T+GUEe4OQd3fYTpFU9CIaPazUG/f8yUkY0EWlXBJnpsA7IToT2ljMgB87Q==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection
@section('content')

<div class="page-body">
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-6">
                    <h3>Manage Hospital Timeline</h3>
                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="row">
            <!-- Zero Configuration  Starts-->
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive big tableinsidetable">
                            <table class="display" id="timeline-table">
                                <button class="btn right_pop_btn" type="button" data-bs-toggle="modal" data-bs-target="#addTimelineModal" data-bs-original-title="" title="">
                                    Add Timeline
                                </button>

                                <thead>
                                    <tr>
                                        <th>Sr No.</th>
                                        <th>Title</th>
                                        <th>Year</th>
                                        <th>Color</th>
                                        <th>Image</th>
                                        <th>Direction</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Zero Configuration  Ends-->
        </div>
    </div>
    <!-- Container-fluid Ends-->
    <div class="modal fade" id="addTimelineModal" tabindex="-1" aria-labelledby="exampleModalLabel" style="display: none" aria-hidden="true">
        <div class="modal-dialog" role="document">

            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel2">
                        Add Timeline
                    </h5>
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close" data-bs-original-title="" title=""></button>
                </div>

                <div class="modal-body">

                    <div class="row mb-3">
                        <form action="{{ url('/admin/hospital_timelines') }}" method="POST" id="add_timeline_form" name="add_timeline_form" class="form-inline" enctype="multipart/form-data">
                            <div class="col-lg-12 ">
                                <div class="mb-3">
                                    <label for="title" class="form-label">Title</label>
                                    <input type="text" class="form-control" id="title" name="title" />
                                </div>
                            </div>
                            <div class="col-lg-12 ">
                                <div class="mb-3">
                                    <label for="year" class="form-label">Year</label>
                                    <select class="form-control form-select custom_select" name="year" id="year">
                                        <option value="">Select Year</option>
                                        @if(count($years_range) > 0)
                                        @foreach($years_range as $year)
                                        <option value="{{ $year }}">{{ $year }}</option>
                                        @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-12 ">
                                <div class="mb-3">
                                    <label for="color_code" class="form-label">Color</label>
                                    <div id="cp1">
                                        <input type="text" class="pr-2 form-control" id="color_code" name="color_code" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 ">
                                <div class="mb-3">
                                    <label for="direction" class="form-label">Direction</label>
                                    <select class="form-control form-select custom_select" name="direction" id="direction">
                                        <option value="left" selected>Left</option>
                                        <option value="right">Right</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-12 ">
                                <div class="mb-3">
                                    <label for="image" class="form-label">Image</label>
                                    <input type="file" accept="image/*" class="form-control" id="image" name="image" />
                                    <input type="text" class="form-control" id="image_url" name="image_url" hidden />
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <button class="btn btn-primary" type="submit" data-bs-original-title="" title="">
                                        Add
                                    </button>
                                    <button class="btn btn-secondary modelbtn" type="button" data-bs-dismiss="modal">
                                        Close
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="updateTimelineModal" tabindex="-1" aria-labelledby="exampleModalLabel" style="display: none" aria-hidden="true">
        <div class="modal-dialog" role="document">

            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel2">
                        Edit Timeline
                    </h5>
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close" data-bs-original-title="" title=""></button>
                </div>

                <div class="modal-body">

                    <div class="row mb-3">
                        <form action="{{ url('/admin/update/timeline') }}" method="POST" id="edit_timeline_form" name="edit_timeline_form" class="form-inline" enctype="multipart/form-data">
                            <input type="hidden" name="id" id="edit_timeline_id" />
                            <div class="col-lg-12 ">
                                <div class="mb-3">
                                    <label for="edit_title" class="form-label">Title</label>
                                    <input type="text" class="form-control" id="edit_title" name="title" />
                                </div>
                            </div>
                            <div class="col-lg-12 ">
                                <div class="mb-3">
                                    <label for="edit_year" class="form-label">Year</label>
                                    <select class="form-control form-select custom_select" id="edit_year" name="year">
                                        <option value="">Select Year</option>
                                        @if(count($years_range) > 0)
                                        @foreach($years_range as $year)
                                        <option value="{{ $year }}">{{ $year }}</option>
                                        @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-12 ">
                                <div class="mb-3">
                                    <label for="color_code" class="form-label">Color</label>
                                    <div id="cp2">
                                        <input type="text" class="form-control" id="edit_color_code" name="color_code" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 ">
                                <div class="mb-3">
                                    <label for="direction" class="form-label">Direction</label>
                                    <select class="form-control form-select custom_select" id="edit_direction" name="direction">
                                        <option value="left">Left</option>
                                        <option value="right">Right</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-12 ">
                                <div class="mb-3">
                                    <div class="crop-image-preview-container ">
                                        <img id="crop-image" class="img_preview" />
                                    </div>
                                    <label for="edit_image" class="form-label">Image</label>
                                    <input type="file" accept="image/*" class="form-control" id="edit_image" name="image" />
                                    <input type="text" class="form-control" id="edit_image_url" name="edit_image_url" hidden />
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <button class="btn btn-primary" type="submit" data-bs-original-title="" title="">
                                        Update
                                    </button>
                                    <button class="btn btn-secondary modelbtn" type="button" data-bs-dismiss="modal">
                                        Close
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-colorpicker/3.4.0/js/bootstrap-colorpicker.min.js" integrity="sha512-94dgCw8xWrVcgkmOc2fwKjO4dqy/X3q7IjFru6MHJKeaAzCvhkVtOS6S+co+RbcZvvPBngLzuVMApmxkuWZGwQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script type="text/javascript" src="{{ asset('admin_assets/custom/hospital_timeline.js') }}"></script>

@endsection