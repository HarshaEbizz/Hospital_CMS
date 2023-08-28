@extends('admin.layouts.login_after')
@section('content')
    <div class="page-body">
        <div class="container-fluid">
            <div class="page-title">
                <div class="row">
                    <div class="col-6">
                        <h3>Edit Form</h3>
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
                            <form action="{{route('admin.form_builder.update', $form_details->id)}}" method="POST"
                                id="edit_form_builder" name="edit_form_builder" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="row mb-3">
                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <label for="form_name" class="form-label">Form Name</label>
                                            <input type="text" class="form-control" id="form_name" name="form_name"
                                                value="{{ $form_details->form_name }}" />
                                        </div>
                                        <input type="hidden" id="get_form_details" name="get_form_details"
                                            value="{{ $form_details->form_details }}">
                                        <div name="form_bulider_data" id="form_bulider_data">

                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <a class="btn btn-secondary modelbtn" type="button"
                                        href="{{ route('admin.form_builder.index') }}">
                                        Close
                                    </a>
                                    <button class="btn btn-primary" type="submit" title=""> Update </button>
                                </div>
                            </form>
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

    <script>
        // jQuery(function($) {
        //     var container = document.getElementById("form_bulider_data");

        //     var defaultFields = JSON.parse($('#get_form_details').val())

        //     var options = {
        //         stickyControls: {
        //             enable: false
        //         },
        //         typeUserDisabledAttrs: {
        //             "checkbox-group": [
        //                 "description",
        //                 "inline",
        //                 "toggle",
        //                 "access",
        //                 "other",
        //                 "className"
        //             ],
        //             "radio-group": [
        //                 "description",
        //                 "inline",
        //                 "toggle",
        //                 "access",
        //                 "other",
        //                 "className"
        //             ],
        //             button: ["description", "required", "access", "style", "value"],
        //             text: ["access", "value", "subtype"]
        //         },
        //         controlPosition: "right",
        //         showActionButtons: true,
        //         controlOrder: [
        //             "autocomplete",
        //             "button",
        //             "checkbox-group",
        //             "date",
        //             "file",
        //             "header",
        //             "hidden",
        //             "number",
        //             "paragraph",
        //             "radio-group",
        //             "select",
        //             "text",
        //             "textarea"
        //         ],

        //         defaultFields,

        //     };

        //     formBuilderObj = $(container).formBuilder(options);
        // });
    </script>
@endsection
