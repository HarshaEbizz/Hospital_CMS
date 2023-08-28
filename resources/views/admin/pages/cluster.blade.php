@extends('admin.layouts.login_after')
@section('content')
<div class="page-body">
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-6">
                    <h3>Manage Cluster</h3>
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
                            <table class="display" id="cluster_table">
                                <button class="btn right_pop_btn" type="button" data-bs-toggle="modal" data-bs-target="#addClusterModal" data-bs-original-title="" title="">
                                    Add Cluster
                                </button>

                                <thead>
                                    <tr>
                                        <th>Sr No.</th>
                                        <th>Cluster</th>
                                        <th>Status</th>
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
    <div class="modal fade" id="addClusterModal" tabindex="-1" aria-labelledby="exampleModalLabel" style="display: none" aria-hidden="true">
        <div class="modal-dialog" role="document">

            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel2">
                        Add Cluster
                    </h5>
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close" data-bs-original-title="" title=""></button>
                </div>

                <div class="modal-body">

                    <div class="row mb-3">
                        <form action="{{ url('/admin/cluster') }}" method="POST" id="add_cluster_form" name="add_cluster_form" class="form-inline" enctype="multipart/form-data">
                            @csrf
                            <div class="col-lg-12 ">
                                <div class="mb-3">
                                    <label for="cluster" class="form-label">Cluster</label>
                                    <input type="text" class="form-control" id="cluster" name="cluster" />
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
    <div class="modal fade" id="editClusterModal" tabindex="-1" aria-labelledby="exampleModalLabel" style="display: none" aria-hidden="true">
        <div class="modal-dialog" role="document">

            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel2">
                        Edit Cluster
                    </h5>
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close" data-bs-original-title="" title=""></button>
                </div>

                <div class="modal-body">

                    <div class="row mb-3">
                        <form action="#" method="POST" id="edit_cluster_form" name="edit_cluster_form" class="form-inline" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="col-lg-12 ">
                                <div class="mb-3">
                                    <label for="edit_cluster" class="form-label">Cluster</label>
                                    <input type="text" class="form-control" id="edit_cluster" name="edit_cluster" />
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
<script type="text/javascript" src="{{ asset('admin_assets/custom/cluster.js') }}"></script>
@endsection
