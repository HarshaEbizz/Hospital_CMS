@extends('admin.layouts.login_after')
@section('content')

<div class="page-body">
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-6">
                    <h3>Manage Rooms</h3>
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
                            <table class="display" id="room-table">
                                <button class="btn right_pop_btn" type="button" data-bs-toggle="modal" data-bs-target="#addRoomModal" data-bs-original-title="" title="">
                                    Add Room
                                </button>

                                <thead>
                                    <tr>
                                        <th>Sr No.</th>
                                        <th>Room Name</th>
                                        <th>Room Category</th>
                                        <th>Room Image</th>
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
    <div class="modal fade" id="addRoomModal" tabindex="-1" aria-labelledby="exampleModalLabel" style="display: none" aria-hidden="true">
        <div class="modal-dialog" role="document">

            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel2">
                        Add Room
                    </h5>
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close" data-bs-original-title="" title=""></button>
                </div>

                <div class="modal-body">

                    <div class="row mb-3">
                        <form action="{{ url('/admin/rooms') }}" method="POST" id="add_room_form" name="add_room_form" class="form-inline" enctype="multipart/form-data">
                            <div class="col-lg-12 ">
                                <div class="mb-3">
                                    <label for="room_name" class="form-label">Room Name</label>
                                    <input type="text" class="form-control" id="room_name" name="room_name" />
                                </div>
                                <div class="mb-3">
                                    <label for="description" class="form-label">Description</label>
                                    <textarea class="form-control" id="description" name="description"></textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="room_category" class="form-label">Select Room Category</label>
                                    <select class="form-select custom_select" name="room_category" id="room_category">
                                        <option value="" selected disabled>Select</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="room_image" class="form-label">Room Image</label>
                                    <input type="file" accept="image/*" class="form-control" id="room_image" name="room_image" />
                                    <input type="text" class="form-control" id="room_image_url" name="room_image_url" hidden />
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
    <div class="modal fade" id="updateRoomModal" tabindex="-1" aria-labelledby="exampleModalLabel" style="display: none" aria-hidden="true">
        <div class="modal-dialog" role="document">

            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel2">
                        Edit Room Details
                    </h5>
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close" data-bs-original-title="" title=""></button>
                </div>

                <div class="modal-body">

                    <div class="row mb-3">
                        <form action="{{ url('/admin/update/rooms') }}" method="POST" id="edit_room_form" name="edit_room_form" class="form-inline">
                            <input type="hidden" name="id" id="edit_room_id" />
                            <div class="col-lg-12 ">
                                <div class="mb-3">
                                    <label for="edit_room_name" class="form-label">Room Name</label>
                                    <input type="text" class="form-control" id="edit_room_name" name="room_name" />
                                </div>
                                <div class="mb-3">
                                    <label for="edit_description" class="form-label">Description</label>
                                    <textarea class="form-control" id="edit_description" name="description"></textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="edit_room_category" class="form-label">Select Room Category</label>
                                    <select class="form-control form-select custom_select" name="room_category" id="edit_room_category">
                                        <option value="" selected disabled>Select</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <div class="crop-image-preview-container ">
                                        <img id="crop-image" class="room_img_preview"/>
                                    </div>
                                    <label for="edit_room_image" class="form-label">Room Image</label>
                                    <input type="file" accept="image/*" class="form-control" id="edit_room_image" name="room_image" />
                                    <input type="text" class="form-control" id="edit_room_image_url" name="edit_room_image_url" hidden />
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <button class="btn btn-primary" type="submit">
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
<script type="text/javascript" src="{{ asset('admin_assets/custom/rooms.js') }}"></script>
@endsection