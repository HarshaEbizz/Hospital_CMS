$(document).ready(function () {
    $('#careers_table').DataTable({
        processing: true,
        serverSide: true,
        responsive: true,
        destroy: true,
        "order": [],
        ajax: {
            url: base_url + '/admin/careers/list',
            type: 'post',
            data: {},
        },
        "initComplete": function (settings, json) {
            $('.tgl').bootstrapToggle()
        },
        columns: [{
            data: 'DT_RowIndex',
            orderable: false,
            searchable: false
        },
        {
            data: 'department_name',
            name: 'department_name',
        },
        {
            data: 'designation',
            name: 'designation',
        },
        {
            data: 'opening',
            name: 'opening',
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

$(document).on('click', '.alert_message', function (e) {
    $.ajax({
        type: 'GET',
        url: base_url + '/admin/alert_msg_data/',
        success: function (data) {
            $("#addAlertMsgModal").modal('show');
            let elem = document.getElementById('alert_msg_from');
            if (data.title) {
                document.getElementById("title").value = data.title
            } else {
                document.getElementById("title").value = '';
            }
            $("#message_textarea").html('');
            $("#message_textarea").html('<textarea class="form-control" placeholder="Message " id="message" name="message" style="height: 100px"></textarea>');
            create_ck_editor(document.getElementById("message"), "message", data.message);
            // document.getElementById("message").value = data.message
            if (data.status == "1") {
                $('#is_show').parent().removeClass("btn-danger off");
                $('#is_show').parent().addClass("btn-success");
            }
            else {
                $('#is_show').parent().removeClass("btn-success");
                $('#is_show').parent().addClass("btn-danger off");
            }
        }
    });
});

$("form[name='alert_msg_from']").on('submit', function (e) {
    e.preventDefault();
}).validate({
    debug: false,
    rules: {
        "title": {
            required: true,
            nospecialcharnumber: true,
        },
        "message": {
            required: true,
        },
    },
    messages: {
        "title": {
            required: "Title is required.",
        },
        "message": {
            required: "Message is required.",
        },
    },
    submitHandler: function (form) {
        var formData = new FormData(form);
        $("#alert_msg_from button[type='submit']").attr('disabled', true);
        $.ajax({
            url: $(form).attr("action"),
            type: 'post',
            data: formData,
            processData: false,
            cache: false,
            contentType: false,
            beforeSend: function () {
                $(".loader").show();
            },
            complete: function () {
                $(".loader").hide();
            },
            success: function (response) {
                if (response.success) {
                    $.notify(response.message, {
                        type: 'success'
                    });
                    $("#addAlertMsgModal").modal('hide');
                    $('#alert_msg_from').trigger("reset");
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
        $("#alert_msg_from button[type='submit']").attr('disabled', false);
    }
});

$("form[name='add_opening_form']").on('submit', function (e) {
    e.preventDefault();
}).validate({
    rules: {
        "recuirement_dept": {
            required: true,
        },
        "department_name": {
            required: true,
            // validname: true,
        },
        "designation": {
            required: true,
        },
        "location": {
            required: true,
        },
        "opening": {
            required: true,
            number: true,
            range: [0, 100]
        },
        "experience": {
            required: true,
        },
        "qualification": {
            required: true,
        },
        "description": {
            required: true,
        },

    },
    messages: {
        "recuirement_dept": {
            required: "Select Recuirement department",
        },
        "department_name": {
            required: "Enter department name",
            // validname: "Enter valid department name"
        },
        "designation": {
            required: "Enter designation name",
        },
        "location": {
            required: "Enter location",
        },
        "opening": {
            required: "Enter no. of opening",
            number: "Enter no. of opening in digits.",
        },
        "experience": {
            required: "Enter Experience",
        },
        "qualification": {
            required: "Enter qualification",
        },
        "description": {
            required: "Enter description",
        },
    },
    submitHandler: function (form) {
        var formData = new FormData(form);
        $("#add_opening_form button[type='submit']").attr('disabled', true);
        $.ajax({
            url: $(form).attr("action"),
            type: 'post',
            data: formData,
            processData: false,
            cache: false,
            contentType: false,
            beforeSend: function () {
                $(".loader").show();
            },
            complete: function () {
                $(".loader").hide();
            },
            success: function (response) {
                if (response.success) {
                    $.notify(response.message, {
                        type: 'success'
                    });
                    $("#addOpeningModal").modal('hide');
                    $('#add_opening_form').trigger("reset");
                    $('#careers_table').DataTable().ajax.reload(null, false);
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
        $("#add_opening_form button[type='submit']").attr('disabled', false);
    }
});

$(document).on('click', '.edit_opening', function (e) {
    e.preventDefault();
    // id = this.value;
    let link = this;
    $.ajax({
        type: 'GET',
        // url: base_url + '/admin/careers/' + id + '/edit',
        url: link.href,
        success: function (data) {
            $("#editOpeningModal").modal('show');
            let elem = document.getElementById('edit_opening_form');
            elem.setAttribute("action", base_url + '/admin/careers/' + data.id)
            elem.setAttribute("data_id", data.id)
            $("#edit_recuirement_dept option[value='" + data.recuirement_dept + "']").attr('selected', true);
            document.getElementById("edit_department_name").value = data.department_name
            document.getElementById("edit_designation").value = data.designation
            document.getElementById("edit_location").value = data.location
            document.getElementById("edit_opening").value = data.opening
            document.getElementById("edit_experience").value = data.experience
            document.getElementById("edit_qualification").value = data.qualification
            document.getElementById("edit_description").value = data.description

        }
    });
});

$("form[name='edit_opening_form']").on('submit', function (e) {
    e.preventDefault();
}).validate({
    rules: {
        "edit_recuirement_dept": {
            required: true,
        },
        "edit_department_name": {
            required: true,
        },
        "edit_designation": {
            required: true,
        },
        "edit_location": {
            required: true,
        },
        "edit_opening": {
            required: true,
            number: true,
            range: [0, 100]
        },
        "edit_experience": {
            required: true,
        },
        "edit_qualification": {
            required: true,
        },
        "edit_description": {
            required: true,
        },

    },
    messages: {
        "edit_recuirement_dept": {
            required: "Select Recuirement department",
        },
        "edit_department_name": {
            required: "Enter department name",
        },
        "edit_designation": {
            required: "Enter designation name",
        },
        "edit_location": {
            required: "Enter location",
        },
        "edit_opening": {
            required: "Enter no. of opening",
            number: "Enter no. of opening in digits.",
        },
        "edit_experience": {
            required: "Enter Experience",
        },
        "edit_qualification": {
            required: "Enter qualification",
        },
        "edit_description": {
            required: "Enter description",
        },
    },
    submitHandler: function (form) {
        var formData = new FormData(form);
        $("#edit_opening_form button[type='submit']").attr('disabled', true);
        $.ajax({
            url: $(form).attr("action"),
            type: 'post',
            data: formData,
            processData: false,
            cache: false,
            contentType: false,
            beforeSend: function () {
                $(".loader").show();
            },
            complete: function () {
                $(".loader").hide();
            },
            success: function (response) {
                if (response.success) {
                    $.notify(response.message, {
                        type: 'success'
                    });
                    $("#editOpeningModal").modal('hide');
                    $('#edit_opening_form').trigger("reset");
                    $('#careers_table').DataTable().ajax.reload(null, false);
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
        $("#edit_opening_form button[type='submit']").attr('disabled', false);
    }
});

$(document).on('change', '.status_btn', function (e) {
    e.preventDefault();
    id = this.value;
    $.ajax({
        type: 'GET',
        url: base_url + '/admin/careers/status/' + id,
        "initComplete": function (settings, json) {
            $('.tgl').bootstrapToggle()
        },
        success: function (response) {
            $.notify(response.message, {
                type: 'success'
            });
        }
    });
});

$(document).on('click', '.delete_opening', function (e) {
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
                    // url: base_url + '/admin/careers/' + id,
                    url: link.href,
                    success: function (response) {
                        if (response.success) {
                            $.notify(response.message, {
                                type: 'success'
                            });
                            $('#careers_table').DataTable().ajax.reload(null, false)
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

$(document).ajaxComplete(function () {
    $('input[type=checkbox][data-toggle^=toggle]').bootstrapToggle();
});
