@extends('admin.layouts.login_after')
@section('content')
<div class="page-body">
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-6">
                    <h3>Enquiry</h3>
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
                            <table class="display" id="enquiry_table">
                                <thead>
                                    <tr>
                                        <th>Sr No.</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Contact</th>
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
    <div class="modal fade" id="EnquiryDataModal" tabindex="-1" aria-labelledby="exampleModalLabel" style="display: none" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel2">
                        Enquiry Details
                    </h5>
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close" data-bs-original-title="" title=""></button>
                </div>

                <div class="modal-body">
                    <div class="row mb-3">
                        <div class="col-lg-6 ">
                            <div class="mb-3">
                                <label for="edit_help_name" class="form-label">Name</label>
                                <input type="text" class="form-control" id="edit_help_name" name="edit_help_name" disabled />
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="edit_help_email" class="form-label">Email</label>
                                <input type="text" class="form-control" id="edit_help_email" name="edit_help_email" disabled>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="edit_help_contact" class="form-label">Contact</label>
                                <input type="text" class="form-control" id="edit_help_contact" name="edit_help_contact" disabled>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="edit_help_treatment_name" class="form-label">Treatment Name</label>
                                <input type="text" class="form-control" id="edit_help_treatment_name" name="edit_help_treatment_name" disabled>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="mb-3">
                                <label for="edit_help_comment" class="form-label">Comment</label>
                                <textarea class="form-control" id="edit_help_comment" name="edit_help_comment" disabled></textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
<script>
    $(function() {
        var table = $('#enquiry_table').DataTable({
            processing: true,
            serverSide: true,
            responsive: true,
            destroy: true,
            "order": [],
            ajax: {
                url: base_url + '/admin/enquiry/list',
                type: 'post',
                // data: function(d) {
                //     d.job_position = $('#job_position').val()
                // }
            },
            columns: [{
                    data: 'DT_RowIndex',
                    orderable: false,
                    searchable: false
                },
                {
                    data: 'help_name',
                    name: 'help_name',
                },
                {
                    data: 'help_email',
                    name: 'help_email',
                },
                {
                    data: 'contact',
                    name: 'contact'
                },
                {
                    data: 'view',
                    name: 'view',
                    orderable: false,
                    searchable: false,
                },
            ]
        });
        $(document).on('click', '.view_enquiery_data', function(e) {
            e.preventDefault();
            id = $(this).data('id');
            $.ajax({
                type: 'GET',
                url: base_url + '/admin/enquiry/' + id,
                success: function(data) {
                    console.log(data);
                    $("#EnquiryDataModal").modal('show');
                    document.getElementById("edit_help_name").value = data.help_name
                    document.getElementById("edit_help_email").value = data.help_email
                    document.getElementById("edit_help_contact").value = "+" + data.country_code + " " + data.help_contact
                    document.getElementById("edit_help_treatment_name").value = data.help_treatment_name
                    $("#edit_help_comment").val(data.help_comment);
                }
            });
        });
    });
</script>
@endsection
