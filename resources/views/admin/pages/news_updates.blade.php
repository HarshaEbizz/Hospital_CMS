@extends('admin.layouts.login_after')
@section('style')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.6.2/chosen.css">
@endsection
@section('content')

<div class="page-body">
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-6">
                    <h3>News And Media</h3>
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
                            <table class="display" id="news_updates_table">
                                <button class="btn right_pop_btn" type="button" data-bs-toggle="modal" data-bs-target="#addNewsUpdates" data-bs-original-title="" title="">
                                    Add News/Updates
                                </button>
                                <thead>
                                    <tr>
                                        <th>Sr. No.</th>
                                        <th>Title</th>
                                        <th>Posted Date</th>
                                        <th>Image</th>
                                        <th>Actions</th>
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
    <div class="modal fade" id="addNewsUpdates" tabindex="-1" aria-labelledby="exampleModalLabel" style="display: none" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel2">
                        Add News/Updates
                    </h5>
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close" data-bs-original-title="" title=""></button>
                </div>
                <form action="{{ url('/admin/news_and_updates') }}" method="POST" id="add_news_update" name="add_news_update" class="form-inline" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="row mb-3">
                            <div class="col-lg-12 mb-3">
                                <label for="title" class="form-label">Title</label>
                                <input type="text" class="form-control" id="title" name="title" />
                            </div>
                            <div class="col-lg-12 mb-3">
                                <label for="description" class="form-label">Description</label>
                                <textarea class="form-control" id="description" name="description"></textarea>
                            </div>
                            <div class="col-lg-12 mb-3">
                                <label for="Image" class="form-label">Select Image</label>
                                <input type="file" accept="image/*" class="form-control" id="image" name="image" />
                                <input type="text"  id="image_url" name="image_url" hidden />
                            </div>
                            <div class="col-lg-12 mb-3">
                                <label for="posted_date" class="form-label">News/Update Date</label>
                                <input type="date" class="form-control" id="posted_date" name="posted_date" max="<?php echo date("Y-m-d"); ?>"/>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-lg-12 mb-3">
                                <button class="btn btn-secondary modelbtn" type="button" data-bs-dismiss="modal" data-bs-original-title="" title="">
                                    Close
                                </button>
                                <button class="btn btn-primary" type="submit" data-bs-original-title="" title="">
                                    Add
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="updateNewsUpdates" tabindex="-1" aria-labelledby="exampleModalLabel" style="display: none" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel2">
                        Update News/Updates
                    </h5>
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close" data-bs-original-title="" title=""></button>
                </div>
                <form action="#" method="POST" id="update_news_update_form" name="update_news_update_form" class="form-inline">
                    @method('PUT')
                    <div class="modal-body">
                        <div class="row mb-3">
                            <input type="hidden" name="id" id="edit_news_update_id" value="" />
                            <div class="col-lg-12 mb-3">
                                <label for="edit_title" class="form-label">Title</label>
                                <input type="text" class="form-control" id="edit_title" name="title" />
                            </div>
                            <div class="col-lg-12 mb-3">
                                <label for="edit_description" class="form-label">Description</label>
                                <textarea class="form-control" id="edit_description" name="description"></textarea>
                            </div>
                            <div class="col-lg-12 mb-3">
                                <div class="crop-image-preview-container ">
                                    <img id="crop-image" class="img_preview" />
                                </div>
                                <label for="edit_image" class="form-label">Select Image</label>
                                <input type="file" accept="image/*" class="form-control" id="edit_image" name="image" />
                                <input type="text"  id="edit_image_url" name="edit_image_url" hidden />
                            </div>
                            <div class="col-lg-12 mb-3">
                                <label for="edit_posted_date" class="form-label">News/Update Date</label>
                                <input type="date" class="form-control" id="edit_posted_date" name="posted_date" max="<?php echo date("Y-m-d"); ?>"/>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-lg-12 mb-3">
                                <button class="btn btn-secondary modelbtn" type="button" data-bs-dismiss="modal" data-bs-original-title="" title="">
                                    Close
                                </button>
                                <button class="btn btn-primary" type="submit" data-bs-original-title="" title="">
                                    Update
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>

@endsection
@section('script')
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.6.2/chosen.jquery.js"></script>
<script type="text/javascript" src="{{ asset('admin_assets/custom/news_updates.js') }}"></script>
@endsection
