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
                    <h3>Manage Floor Plans</h3>
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
                            <table class="display" id="floor_plan_table">
                                <button class="btn right_pop_btn" type="button" data-bs-toggle="modal" data-bs-target="#addFloorPlan"  data-bs-original-title="" title="">
                                   Add Floor Plan
                                </button>
                                <thead>
                                    <tr>
                                        <th>Sr. No.</th>
                                        <th>Floor Name</th>
                                        <th>Wing Name</th>
                                        <th>Sections</th>
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
    <div class="modal fade" id="addFloorPlan" tabindex="-1" aria-labelledby="exampleModalLabel" style="display: none" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel2">
                       Add Floor Plan
                    </h5>
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close" data-bs-original-title="" title=""></button>
                </div>
                <form action="#" method="POST" id="add_floor_plan" name="add_floor_plan" class="form-inline">
                    <div class="modal-body">
                        <div class="row mb-3">
                            <div class="col-lg-6 mb-3">
                                <label for="floor_id" class="form-label">Select Floor</label>
                                <select class="form-select custom_select" id="floor_id" name="floor_id" aria-label="Default select example">
                                    <option value="" disabled>Select floor</option>
                                    @if($floors && $floors->count()>0)
                                        @foreach($floors as $floor)
                                            <option value="{{ $floor->id }}">{{ $floor->floor_title }}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                            <div class="col-lg-6 mb-3">
                                <label for="wing_id" class="form-label">Select Wing</label>
                                <select class="form-select custom_select" id="wing_id" name="wing_id" aria-label="Default select example">
                                    <option value="" disabled>Select wing</option>
                                    @if($wings && $wings->count()>0)
                                        @foreach($wings as $wing)
                                            <option value="{{ $wing->id }}">{{ $wing->wing_title }}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                            <div class="col-lg-12 mb-3">
                                <label for="section_ids" class="form-label">Select Section(s)</label>
                                <select class="form-control custom_select" id="section_ids" name="section_ids[]" data-placeholder="Select section(s)" multiple>
                                    <option value="" disabled >Select Section(s)</option>
                                    @if($sections && $sections->count()>0)
                                        @foreach($sections as $section)
                                            <option value="{{ $section->id }}">{{ $section->section_name }}</option>
                                        @endforeach
                                    @endif
                                </select>
                                <label id="section_ids-error" class="error" for="section_ids"></label>
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

    <div class="modal fade" id="updateFloorPlan" tabindex="-1" aria-labelledby="exampleModalLabel" style="display: none" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel2">
                       Update Floor Plan
                    </h5>
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close" data-bs-original-title="" title=""></button>
                </div>
                <form action="{{ url('/admin/update/floor_plan') }}" method="POST" id="update_floor_plan" name="update_floor_plan" class="form-inline">
                    <div class="modal-body">
                        <div class="row mb-3">
                            <input type="hidden" name="id" id="edit_floor_plan_id" value="" />
                            <div class="col-lg-6 mb-3">
                                <label for="edit_floor_id" class="form-label">Select Floor</label>
                                <select class="form-select custom_select" id="edit_floor_id" name="floor_id" aria-label="Default select example" disabled>
                                    <option value="" disabled >Select floor</option>
                                    @if($floors && $floors->count()>0)
                                        @foreach($floors as $floor)
                                            <option value="{{ $floor->id }}">{{ $floor->floor_title }}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                            <div class="col-lg-6 mb-3">
                                <label for="edit_wing_id" class="form-label">Select Wing</label>
                                <select class="form-select custom_select" id="edit_wing_id" name="wing_id" aria-label="Default select example" disabled>
                                    <option value="" disabled>Select wing</option>
                                    @if($wings && $wings->count()>0)
                                        @foreach($wings as $wing)
                                            <option value="{{ $wing->id }}">{{ $wing->wing_title }}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                            <div class="col-lg-12 mb-3">
                                <label for="edit_section_ids" class="form-label">Select Section(s)</label>
                                <select class="js-states form-control custom_select" id="edit_section_ids" name="section_ids[]"  multiple>
                                    <option value="" disabled>Select Section(s)</option>
                                    @if($sections && $sections->count()>0)
                                        @foreach($sections as $section)
                                            <option value="{{ $section->id }}">{{ $section->section_name }}</option>
                                        @endforeach
                                    @endif
                                </select>
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
<script type="text/javascript" src="{{ asset('admin_assets/custom/floor_plans.js') }}"></script>
@endsection
