@extends('admin.layouts.login_after')
@section('content')
<div class="page-body">
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-6">
                    <h3>Job Applier list</h3>
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
                        <div class="form-group">
                            <label><strong>All Job Position:</strong></label>
                            <select id='job_position' class="form-control form-select custom_select" style="width: max-content;margin-bottom: 10px;">
                                <option value="">Select All</option>
                                @if($opening && $opening->count() > 0)
                                @foreach($opening as $opening_list)
                                <option value="{{$opening_list->designation}}">{{$opening_list->designation}}</option>
                                @endforeach
                                @endif
                            </select>
                        </div>
                        <div class="table-responsive big tableinsidetable">
                            <a href="{{route('admin.job_applier_export')}}">
                                <button class="btn right_pop_btn" type="button">
                                    Export Database
                                </button>
                            </a>
                            <table class="display" id="applier_list">
                                <thead>
                                    <tr>
                                        <th>Sr No.</th>
                                        <th>Designation</th>
                                        <th>Application Type</th>
                                        <th>Candidate Name</th>
                                        <th>Candidate Email</th>
                                        <!-- <th>Status</th> -->
                                        <th>View</th>
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
    <div class="modal fade" id="ViewAppliergModal" tabindex="-1" aria-labelledby="exampleModalLabel" style="display: none" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel2">
                        Job Applier View
                    </h5>
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close" data-bs-original-title="" title=""></button>
                </div>

                <div class="modal-body">
                    <div class="row mb-3">
                        <div class="col-lg-6 ">
                            <div class="mb-3">
                                <label for="application_type" class="form-label">Application Type</label>
                                <input type="text" class="form-control" id="application_type" name="application_type" disabled />
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="full_name" class="form-label">Name</label>
                                <input type="text" class="form-control" id="full_name" name="full_name" disabled>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="date" class="form-label">Date</label>
                                <input type="text" class="form-control" id="date" name="date" disabled>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="gender" class="form-label">Gender</label>
                                <input type="text" class="form-control" id="gender" name="gender" disabled>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="marital_status" class="form-label">Marital Status</label>
                                <input type="text" class="form-control" id="marital_status" name="marital_status" disabled>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="text" class="form-control" id="email" name="email" disabled>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="contact" class="form-label">Contact</label>
                                <input type="text" class="form-control" id="contact" name="contact" disabled>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="job_position" class="form-label">Job Position</label>
                                <input type="text" class="form-control" id="job_position1" name="job_position1" disabled>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="qualification" class="form-label">Qualification</label>
                                <input type="text" class="form-control" id="qualification" name="qualification" disabled>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="experience_year" class="form-label">Total Experience</label>
                                <input type="text" class="form-control" id="experience_year" name="experience_year" disabled>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="last_organization" class="form-label">Last Organization</label>
                                <input type="text" class="form-control" id="last_organization" name="last_organization" disabled>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="last_ctc" class="form-label">Last CTC</label>
                                <input type="text" class="form-control" id="last_ctc" name="last_ctc" disabled>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="last_designation" class="form-label">Last Designation</label>
                                <input type="text" class="form-control" id="last_designation" name="last_designation" disabled>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="information" class="form-label">Optional Information: </label>
                                <input type="text" class="form-control" id="information" name="information" disabled>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <a class="btn btn-success  resume_file_link" id="resume_file_link" target="_blank">Resume File</a>
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
        var table = $('#applier_list').DataTable({
            processing: true,
            serverSide: true,
            responsive: true,
            destroy: true,
            "order": [],
            ajax: {
                url: base_url + '/admin/job_applier/list',
                type: 'post',
                data: function(d) {
                    d.job_position = $('#job_position').val()
                    d.search = $('input[type="search"]').val()
                }
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
                    data: 'job_position',
                    name: 'job_position',
                },
                {
                    data: 'application_type',
                    name: 'application_type',
                },
                {
                    data: 'full_name',
                    name: 'full_name',
                },
                {
                    data: 'email',
                    name: 'email'
                },
                // {
                //     data: 'status',
                //     name: 'status',
                //     searchable: false
                // },
                {
                    data: 'view',
                    name: 'view',
                    orderable: false,
                    searchable: false,
                },
            ]
        });
        $('#job_position').change(function() {
            table.draw();
            // console.log($('#job_position').val());
            // $('#applier_list').DataTable().ajax.reload(null, false);
        });
        $('input[type="search"]').keyup(function() {
            table.draw();
        });
        $(document).on('click', '.view_appiler_details', function(e) {
            e.preventDefault();
            id = $(this).data('id');
            console.log(id);
            $.ajax({
                type: 'GET',
                url: base_url + '/admin/job_applier/view/' + id,
                success: function(data) {
                    $("#ViewAppliergModal").modal('show');
                    document.getElementById("application_type").value = data.application_type
                    document.getElementById("full_name").value = data.full_name
                    document.getElementById("date").value = data.date
                    document.getElementById("gender").value = data.gender
                    document.getElementById("marital_status").value = data.marital_status
                    document.getElementById("email").value = data.email
                    document.getElementById("contact").value = "+" + data.country_code + " " + data.contact
                    document.getElementById("job_position1").value = data.job_position
                    document.getElementById("qualification").value = data.qualification
                    document.getElementById("experience_year").value = data.experience_year
                    document.getElementById("last_organization").value = data.last_organization
                    document.getElementById("last_ctc").value = data.last_ctc
                    document.getElementById("last_designation").value = data.last_designation
                    document.getElementById("information").value = data.information
                    var file_link = base_url.replace("/public", "") + "/storage/" + data.file_path + data.resume_file
                    document.getElementById("resume_file_link").href = file_link
                }
            });
        });
    });
</script>
@endsection
