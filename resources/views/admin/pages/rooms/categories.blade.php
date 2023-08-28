@extends('admin.layouts.login_after')
@section('content')

<div class="page-body">
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-6">
                    <h3>Manage Room Categories</h3>
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
                            <table class="display" id="room-category-table">
                                <button class="btn right_pop_btn" type="button" data-bs-toggle="modal" data-bs-target="#addRoomCatModal"  data-bs-original-title="" title="">
                                    Add Room Category
                                </button>

                                <thead>
                                    <tr>
                                        <th>Sr No.</th>
                                        <th>Name</th>
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
    <div class="modal fade" id="addRoomCatModal" tabindex="-1" aria-labelledby="exampleModalLabel" style="display: none" aria-hidden="true">
        <div class="modal-dialog" role="document">

            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel2">
                        Add Room Category
                    </h5>
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close" data-bs-original-title="" title=""></button>
                </div>

                <div class="modal-body">

                    <div class="row mb-3">
                        <form action="{{ url('/admin/room_categories') }}" method="POST" id="add_room_cat_form" name="add_room_cat_form" class="form-inline" enctype="multipart/form-data">
                            <div class="col-lg-12 ">
                                <div class="mb-3">
                                    <label for="name" class="form-label">Name</label>
                                    <input type="text" class="form-control" id="name" name="name"  />
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
    <div class="modal fade" id="updateRoomCatModal" tabindex="-1" aria-labelledby="exampleModalLabel" style="display: none" aria-hidden="true">
        <div class="modal-dialog" role="document">

            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel2">
                        Edit Room Category
                    </h5>
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close" data-bs-original-title="" title=""></button>
                </div>

                <div class="modal-body">

                    <div class="row mb-3">
                        <form action="{{ url('/admin/update/room_category') }}" method="POST" id="edit_room_cat_form" name="edit_room_cat_form" class="form-inline" >
                            <input type="hidden" name="id" id="edit_room_cat_id" />
                            <div class="col-lg-12 ">
                                <div class="mb-3">
                                    <label for="name" class="form-label">Name</label>
                                    <input type="text" class="form-control" id="edit_name" name="name" />
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
<script type="text/javascript" src="{{ asset('admin_assets/custom/room_category.js') }}"></script>
@endsection
