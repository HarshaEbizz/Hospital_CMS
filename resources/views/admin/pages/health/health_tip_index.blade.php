@extends('admin.layouts.login_after')
@section('content')
    <div class="page-body">
        <div class="container-fluid">
            <div class="page-title">
                <div class="row">
                    <div class="col-6">
                        <h3>Health Tip's</h3>
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
                                <table class="display health_tip_list" id="basic-1">
                                    @if(!$health)
                                    <a class="btn right_pop_btn" type="button" href="{{ route('admin.health.create') }}">
                                        Add Details
                                    </a>
                                    @endif
                                    <thead>
                                        <tr>
                                            <th>Sr No.</th>
                                            <th>Heading</th>
                                            <th>Image</th>
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
    </div>
@endsection


@section('script')
    <script src="{{ asset('admin_assets/custom/health.js') }}"></script>
@endsection
