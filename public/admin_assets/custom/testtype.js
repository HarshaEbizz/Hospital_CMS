$(document).ready(function () {
    $('.testtype_list').DataTable({
        processing: true,
        serverSide: true,
        responsive: true,
        destroy: true,
        "order": [],
        ajax: {
            url: base_url + '/admin/test_type/list',
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
            data: 'test_name',
            name: 'test_name'
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

$("form[name='add_testtype_from']").on('submit', function (e) {
    e.preventDefault();
}).validate({
    rules: {
        test_name: {
            required: true,
            nospecialchar:true,
        },
    },
    messages: {
        test_name: {
            required: "Name is required",
        },
    },
    submitHandler: function (form) {
        var form_data = $(form).serialize();
        $("#add_testtype_from button[type='submit']").attr('disabled', true);
        $.ajax({
            url: $(form).attr("action"),
            type: 'post',
            data: form_data,
            beforeSend: function () {
                $(".loader").show();
            },
            complete: function () {
                $(".loader").hide();
            },
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (response) {
                if (response.success) {
                    $.notify(response.message, {
                        type: 'success'
                    });
                    $("#add_testtype_modal").modal('hide');
                    $('#add_testtype_from').trigger("reset");
                    $('.testtype_list').DataTable().ajax.reload(null, false)
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
        $("#add_testtype_from button[type='submit']").attr('disabled', false);
    }
});

$(document).on('click', '.edit_testtype', function (e) {
    e.preventDefault();
    // id = this.value;
    // var id = $(this).attr("data-id");
    let link = this;
    $.ajax({
        type: 'GET',
        // url: base_url + '/admin/test_type/' + id + '/edit',
        url: link.href,
        success: function (data) {
            $("#edit_testtype_modal").modal('show');
            let elem = document.getElementById('edit_testtype_from');
            elem.setAttribute("action", base_url + '/admin/test_type/' + data.id)
            elem.setAttribute("data_id", data.id)
            document.getElementById("edit_test_name").value = data.test_name
        }
    });
});

$("form[name='edit_testtype_from']").on('submit', function (e) {
    e.preventDefault();
}).validate({
    rules: {
        edit_test_name: {
            required: true,
            nospecialchar:true,
        },
    },
    messages: {
        edit_test_name: {
            required: "Name is required",
        },
    },
    submitHandler: function (form) {
        var form_data = $(form).serialize();
        $("#edit_testtype_from button[type='submit']").attr('disabled', true);
        $.ajax({
            url: $(form).attr("action"),
            type: 'post',
            data: form_data,
            beforeSend: function () {
                $(".loader").show();
            },
            complete: function () {
                $(".loader").hide();
            },
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (response) {
                if (response.success) {
                    $.notify(response.message, {
                        type: 'success'
                    });
                    $("#edit_testtype_modal").modal('hide');
                    $('#edit_testtype_from').trigger("reset");
                    $('.testtype_list').DataTable().ajax.reload(null, false)
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
        $("#edit_testtype_from button[type='submit']").attr('disabled', false);
    }
});

$(document).on('click', '.delete_testtype', function (e) {
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
                    // url: base_url + '/admin/test_type/' + id,
                    url: link.href,
                    success: function (response) {
                        if (response.success) {
                            $.notify(response.message, {
                                type: 'success'
                            });
                            $('.testtype_list').DataTable().ajax.reload(null, false)
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

$(document).on('change', '.status_btn', function (e) {
    e.preventDefault();
    id = this.value;
    $.ajax({
        type: 'GET',
        url: base_url + '/admin/test_type/status/' + id,
        "initComplete": function (settings, json) {
            $('.tgl').bootstrapToggle()
        },
        success: function (response) {
            $.notify(response.message, {
                type: 'success'
            });
            // $('.faq_table').DataTable().ajax.reload(null, false)
        }
    });
});

$(document).ajaxComplete(function () {
    $('input[type=checkbox][data-toggle^=toggle]').bootstrapToggle();
});
