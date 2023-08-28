@extends('admin.layouts.login_after')
@section('content')
<div class="page-body">
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-6">
                    <h3>Test Type</h3>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive big tableinsidetable">
                            <table class="display testtype_list" id="basic-1">
                                <button class="btn right_pop_btn" type="button" data-bs-toggle="modal" data-bs-target="#add_testtype_modal" data-whatever="@mdo" data-bs-original-title="" title="">
                                    Add
                                </button>
                                <thead>
                                    <tr>
                                        <th>Sr No.</th>
                                        <th>Test name</th>
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
        </div>
    </div>
    <!-- ---- -->
    <div class="modal fade" id="add_testtype_modal" tabindex="-1" aria-labelledby="exampleModalLabel" style="display: none" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel2">
                        Add Test type
                    </h5>
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close" data-bs-original-title="" title=""></button>
                </div>

                <div class="modal-body">
                    <form action="{{route('admin.test_type.store')}}" method="POST" id="add_testtype_from" name="add_testtype_from">
                        @csrf
                        <div class="row mb-3">
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <label for="test_name" class="form-label">Test Name</label>
                                    <input type="text" class="form-control" id="test_name" name="test_name" />
                                    @if ($errors->has('test_name'))
                                    <span class="text-danger invalid">{{ $errors->first('test_name') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <label for="is_show" class="form-label">status</label>
                                    <div class="form-floating">
                                        <input type="checkbox" checked data-toggle="toggle" data-width="100" id="is_show" name="is_show" data-on="Show" data-off="Hide" data-onstyle="success" data-offstyle="danger" >
                                    </div>
                                </div>
                            </div>
                            <div>
                                <button class="btn btn_green" type="submit" title="">
                                    ADD
                                </button>
                                <button class="btn btn-primary" type="button" data-bs-dismiss="modal">
                                    Cancel
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
     <!-- ---- -->
     <div class="modal fade" id="edit_testtype_modal" tabindex="-1" aria-labelledby="exampleModalLabel" style="display: none" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel2">
                        Edit Test type
                    </h5>
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close" data-bs-original-title="" title=""></button>
                </div>

                <div class="modal-body">
                    <form action="#" method="POST" id="edit_testtype_from" name="edit_testtype_from">
                        @csrf
                        @method('PUT')
                        <div class="row mb-3">
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <label for="test_name" class="form-label">Test Name</label>
                                    <input type="text" class="form-control" id="edit_test_name" name="edit_test_name" />
                                    @if ($errors->has('test_name'))
                                    <span class="text-danger invalid">{{ $errors->first('test_name') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div>
                                <button class="btn btn_green" type="submit" title="">
                                    Update
                                </button>
                                <button class="btn btn-primary" type="button" data-bs-dismiss="modal">
                                    Cancel
                                </button>
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
<script src="{{ asset('admin_assets/custom/testtype.js') }}"></script>
@endsection