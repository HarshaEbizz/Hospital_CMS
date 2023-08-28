@extends('admin.layouts.login_after')
@section('content')
    <div class="page-body">
        <div class="container-fluid">
            <div class="page-title">
                <div class="row">
                    <div class="col-6">
                        <h3>Create Form</h3>
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
                            <form action="{{ route('admin.form_builder.store') }}" method="POST" id="add_form_builder"
                                name="add_form_builder" enctype="multipart/form-data">
                                @csrf
                                <div class="row mb-3">
                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <label for="form_name" class="form-label">Form Name</label>
                                            <input type="text" class="form-control" id="form_name" name="form_name" />
                                        </div>
                                        <input type="hidden" id="get_form_details" name="get_form_details"
                                            value="0">
                                        <div name="form_bulider_data" id="form_bulider_data">

                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <a class="btn btn-secondary modelbtn" type="button"
                                        href="{{ route('admin.form_builder.index') }}">
                                        Close
                                    </a>
                                    <button class="btn btn-primary" type="submit" title=""> Add </button>
                                </div>
                            </form>
                            {{-- <button id="getXML" type="button">Get XML Data</button>
                                    <button id="getJSON" type="button">Get JSON Data</button>
                                    <button id="getJS" type="button">Get JS Data</button> --}}
                            {{-- <div class="form_builder" style="margin-top: 25px" id="form_bulider_data">

                            </div> --}}
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.13.2/jquery-ui.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jQuery-formBuilder/3.8.3/form-builder.min.js"></script>
    <script src="{{ asset('admin_assets/custom/form_builder.js') }}"></script>
@endsection
