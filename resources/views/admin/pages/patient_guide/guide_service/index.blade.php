@extends('admin.layouts.login_after')
@section('content')
<div class="page-body">
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-6">
                    <h3>Patients Guide & Services</h3>
                </div>
            </div>
        </div>
    </div>
    <!-- ------ -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <a class="btn btn-primary right_pop_btn guide_button" type="button" href="{{route('admin.patients_responsibilities.index')}}">
                    Patient’s Rights & Responsibilities
                </a>
                <a class="btn btn-primary right_pop_btn guide_button" type="button" href="{{route('admin.dos_donts.index')}}">
                    Do’s & Don’ts
                </a>
                <a class="btn btn-primary right_pop_btn guide_button" type="button" href="{{route('admin.visiting_hours.index')}}">
                    Visiting Hours
                </a>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive big tableinsidetable">
                            <table class="display service_guide_table" id="basic-1">
                                <a class="btn right_pop_btn" type="button" href="{{route('admin.patients_guide_service.create')}}">
                                    ADD
                                </a>
                                <thead>
                                    <tr>
                                        <th>Sr No.</th>
                                        <th>Heading </th>
                                        <th>Cover Image</th>
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
</div>
@endsection
@section('script')
<script src="{{ asset('admin_assets/custom/guide_service.js') }}"></script>
<script>
    $(document).ready(function() {
        $('.service_guide_table').DataTable({
            processing: true,
            serverSide: true,
            responsive: true,
            destroy: true,
            "order": [],
            ajax: {
                url: base_url + '/admin/patients_guide_service/list',
                type: 'post',
                data: {},
            },
            columns: [{
                    data: 'DT_RowIndex',
                    orderable: false,
                    searchable: false
                },
                {
                    data: 'heading',
                    name: 'heading'
                },
                {
                    data: 'image',
                    name: 'image'
                },
                {
                    data: 'status',
                    name: 'status',
                    orderable: false,
                    searchable: false
                },
                {
                    data: 'actions',
                    orderable: false,
                    searchable: false
                },
            ]
        });
    });
    $(document).on('change', '.status_btn', function(e) {
        e.preventDefault();
        id = this.value;
        let link = this;
        $.ajax({
            type: 'GET',
            url: base_url + '/admin/patients_guide_service/status/' + id,
            // url: link.href,
            "initComplete": function(settings, json) {
                $('.tgl').bootstrapToggle()
            },
            success: function(response) {
                $.notify(response.message, {
                    type: 'success'
                });
            }
        });
    });
    $(document).on('click', '.delete_guide_service', function(e) {
        e.preventDefault();
        // console.log("delete");
        let link = this;
        swal({
                title: `Are you sure you want to delete this record?`,
                text: "If you delete this, it will be gone forever.",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    id = this.value;
                    console.log(id);
                    $.ajax({
                        type: 'DELETE',
                        // url: base_url + '/admin/patients_guide_service/' + id,
                        url: link.href,
                        success: function(response) {
                            if (response.success) {
                                $.notify(response.message, {
                                    type: 'success'
                                });
                                $('.service_guide_table').DataTable().ajax.reload(null, false)
                                $('.tgl').bootstrapToggle()
                            } else if (!response.success) {
                                $.notify(response.message, {
                                    type: 'danger'
                                });
                            } else {
                                $.notify('Something went wrong', {
                                    type: 'danger'
                                });
                            }
                        }
                    });
                }
            });

    });
    $(document).ajaxComplete(function() {
        $('input[type=checkbox][data-toggle^=toggle]').bootstrapToggle();
    });
</script>
@endsection