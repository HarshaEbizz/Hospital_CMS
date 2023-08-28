$("#adddepartmentModal").on('hidden.bs.modal', function() {
    $("#add_department_form").trigger("reset");
 });

$(document).ready(function () {
    $('#department_table').DataTable({
        processing: false,
        serverSide: true,
        responsive: true,
        destroy: true,
        "order": [],
        ajax: {
            url: base_url + '/admin/department/list',
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
            data: 'actions',
            orderable: false,
            searchable: false
        },
        ]
    });
});
$("form[name='add_department_form']").on('submit', function (e) {
    e.preventDefault();
}).validate({
    rules: {
        "department_name": {
            required: true,
            nospecialcharnumber:true,
        }
    },
    messages: {
        "department_name": {
            required: "Please enter department title",
        },
    },
    submitHandler: function (form) {
        var formData = new FormData(form);
        $("#add_department_form button[type='submit']").attr('disabled',true);
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
                    $("#adddepartmentModal").modal('hide');
                    $('#add_department_form').trigger("reset");
                    $('#department_table').DataTable().ajax.reload(null, false);
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
        $("#add_department_form button[type='submit']").attr('disabled',false);
    }
});

$(document).on('click', '.edit_department', function (e) {
    e.preventDefault();
    // id = this.value;
    id = $(this).attr("data-id");
    // console.log(id);
    $.ajax({
        type: 'GET',
        url: base_url + '/admin/department/' + id + '/edit',
        success: function (data) {
            $("#editdepartmentModal").modal('show');
            let elem = document.getElementById('edit_department_form');
            elem.setAttribute("action", base_url + '/admin/department/' + data.id)
            elem.setAttribute("data_id", data.id)
            document.getElementById("edit_department_name").value = data.department_name
        }
    });
});

$("form[name='edit_department_form']").on('submit', function (e) {
    e.preventDefault();
}).validate({
    rules: {
        "edit_department_name": {
            required: true,
            nospecialcharnumber:true,
        }
    },
    messages: {
        "edit_department_name": {
            required: "Please enter department title",
        },
    },
    submitHandler: function (form) {
        var formData = new FormData(form);
        $("#edit_department_form button[type='submit']").attr('disabled',true);
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
                    $("#editdepartmentModal").modal('hide');
                    $('#edit_department_form').trigger("reset");
                    $('#department_table').DataTable().ajax.reload(null, false);
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
        $("#edit_department_form button[type='submit']").attr('disabled',false);
    }
});

$(document).on('click', '.delete_department', function (e) {
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
                    // url: base_url + '/admin/department/' + id,
                    url: link.href,
                    success: function (response) {
                        if (response.success) {
                            $.notify(response.message, {
                                type: 'success'
                            });
                            $('#department_table').DataTable().ajax.reload(null, false)
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
