@extends('admin.layouts.login_after')
@section('content')
<div class="page-body">
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-6">
                    <h3>CheckUp Plan</h3>
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
                            <table class="display plan_list" id="basic-1">
                                <a class="btn right_pop_btn" type="button" href="{{route('admin.health_checkup_plan.create')}}">
                                    Create Health CheckUp Plan</a>
                                <thead>
                                    <tr>
                                        <th>Sr No.</th>
                                        <th>Plan name</th>
                                        <th>Price</th>
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
</div>
@endsection
@section('script')
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.6.2/chosen.jquery.js"></script>
<script src="{{ asset('admin_assets/custom/checkupplan.js') }}"></script>
@endsection