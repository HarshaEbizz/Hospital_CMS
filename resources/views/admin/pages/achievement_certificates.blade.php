@extends('admin.layouts.login_after')
@section('content')

<div class="page-body">
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-6">
                    <h3>Manage Achievment Certifications</h3>
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
                            <table class="display" id="certificate-table">
                                <button class="btn right_pop_btn" type="button" data-bs-toggle="modal" data-bs-target="#addCertificateModal" data-bs-original-title="" title="">
                                    Add Achievement Certificate
                                </button>

                                <thead>
                                    <tr>
                                        <th>Sr No.</th>
                                        <th>Certificate Title</th>
                                        <th>Image</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody id="tablecontents">
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
    <div class="modal fade" id="addCertificateModal" tabindex="-1" aria-labelledby="exampleModalLabel" style="display: none" aria-hidden="true">
        <div class="modal-dialog" role="document">

            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel2">
                        Add Achievement Certificate
                    </h5>
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close" data-bs-original-title="" title=""></button>
                </div>

                <div class="modal-body">

                    <div class="row mb-3">
                        <form action="{{ url('/admin/home/certificates') }}" method="POST" id="add_certificate_form" name="add_certificate_form" class="form-inline" enctype="multipart/form-data">

                            <div class="col-lg-12 ">
                                <div class="mb-3">
                                    <label for="certificate_title" class="form-label">Certificate Title</label>
                                    <input type="text" class="form-control" id="certificate_title" name="certificate_title" />
                                </div>
                            </div>

                            <div class="col-lg-12 ">
                                <div class="mb-3">
                                    <label for="Image" class="form-label">Select Certificate Image</label>
                                    <input type="file" accept="image/*" class="form-control" id="certificate_image" name="certificate_image" />
                                    <input type="text" class="form-control" id="certificate_image_url" name="certificate_image_url" hidden />
                                </div>
                            </div>

                            <div class="col-lg-12 ">
                                <div class="mb-3">
                                    <label for="detail" class="form-label">Details</label>
                                    <textarea class="form-control" placeholder="Details" id="detail" name="detail" style="height: 100px"></textarea>
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

    <div class="modal fade" id="updateCertificateModal" tabindex="-1" aria-labelledby="exampleModalLabel" style="display: none" aria-hidden="true">
        <div class="modal-dialog" role="document">

            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel2">
                        Edit Achievement Certificate
                    </h5>
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close" data-bs-original-title="" title=""></button>
                </div>

                <div class="modal-body">

                    <div class="row mb-3">
                        <form action="{{ url('/admin/home/update/certificate') }}" method="POST" id="edit_certificate_form" name="edit_certificate_form" class="form-inline" enctype="multipart/form-data">
                            <input type="hidden" name="id" id="edit_certificate_id" />
                            <div class="col-lg-12 ">
                                <div class="mb-3">
                                    <label for="certificate_title" class="form-label">Certificate Title</label>
                                    <input type="text" class="form-control" id="edit_certificate_title" name="certificate_title" />
                                </div>
                            </div>
                            <div class="col-lg-12 ">
                                <div class="mb-3">
                                    <div class="crop-image-preview-container ">
                                        <img id="crop-image" class="certificate_img_preview" />
                                    </div>
                                    <label for="Image" class="form-label">Select Certificate Image</label>
                                    <input type="file" accept="image/*" class="form-control" id="edit_certificate_image" name="certificate_image" />
                                    <input type="text" class="form-control" id="edit_certificate_image_url" name="edit_certificate_image_url" hidden />
                                </div>
                            </div>
                            <div class="col-lg-12 ">
                                <div class="mb-3">
                                    <label for="detail" class="form-label">Details</label>
                                    <textarea class="form-control" placeholder="Details" id="edit_detail" name="detail" style="height: 100px"></textarea>
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
<script type="text/javascript" src="//code.jquery.com/ui/1.12.1/jquery-ui.js" ></script>
<script type="text/javascript" src="{{ asset('admin_assets/custom/achievement_certificates.js') }}"></script>
@endsection