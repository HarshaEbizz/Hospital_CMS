@extends('admin.layouts.login_after')
@section('content')


<div class="page-body">
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-6">
                    <h3>Specialities</h3>
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
                            <table class="display specialities_list" id="basic-1">
                                <a class="btn right_pop_btn" type="button" href="{{route('admin.specialities.create')}}">
                                    ADD
                                </a>
                                <thead>
                                    <tr>
                                        <th>Sr No.</th>
                                        <th>Name</th>
                                        <th>Description</th>
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
</div>
@endsection
@section('script')
<script>
    $(document).ready(function() {
        $('.specialities_list').DataTable({
            processing: true,
            serverSide: true,
            responsive: true,
            destroy: true,
            "order": [],
            ajax: {
                url: base_url + '/admin/specialities_list',
                type: 'post',
                data: {},
            },
            "initComplete": function(settings, json) {
                $('.tgl').bootstrapToggle()
            },
            columns: [{
                    data: 'DT_RowIndex',
                    orderable: false,
                    searchable: false
                },
                {
                    data: 'name',
                    name: 'name'
                },
                {
                    data: 'description',
                    name: 'description'
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

    $(document).on('click', '.delete_specialities', function(e) {
        e.preventDefault();
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
                    $.ajax({
                        type: 'DELETE',
                        url: link.href,
                        success: function(response) {
                            if (response.success) {
                                $.notify(response.message, {
                                    type: 'success'
                                });
                                $('.specialities_list').DataTable().ajax.reload(null, false)
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

    $(document).on('change', '.status_btn', function(e) {
        e.preventDefault();
        id = this.value;
        $.ajax({
            type: 'GET',
            url: base_url + '/admin/specialities/status/' + id,
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
    $(document).ajaxComplete(function() {
        $('input[type=checkbox][data-toggle^=toggle]').bootstrapToggle();
    });
</script>

@endsection