$(document).ready(function () {
    $('.sub_test_list').DataTable({
        processing: true,
        serverSide: true,
        responsive: true,
        destroy: true,
        "order": [],
        ajax: {
            url: base_url + '/admin/sub_test_type/list',
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
            data: 'type',
            name: 'type'
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


$("form[name='add_sub_test_form']").on('submit', function (e) {
    e.preventDefault();
}).validate({
    rules: {
        test_type:{
            required: true,
        },
        test_name: {
            required: true,
            nospecialchar:true,
        },
    },
    messages: {
        test_type:{
            required: "Select test type",
        },
        test_name: {
            required: "Name is required",
        },
    },
    submitHandler: function (form) {
        var form_data = $(form).serialize();
        $("#add_sub_test_form button[type='submit']").attr('disabled', true);
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
                    $("#add_sub_test_modal").modal('hide');
                    $('#add_sub_test_form').trigger("reset");
                    $('.sub_test_list').DataTable().ajax.reload(null, false)
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
        $("#add_sub_test_form button[type='submit']").attr('disabled', false);
    }
});

$(document).on('click', '.edit_subtype', function (e) {
    e.preventDefault();
    // id = this.value;
    let link = this;
    $.ajax({
        type: 'GET',
        // url: base_url + '/admin/sub_test_type/' + id + '/edit',
        url: link.href,
        success: function (data) {
            $("#edit_sub_test_modal").modal('show');
            let elem = document.getElementById('edit_sub_test_form');
            elem.setAttribute("action", base_url + '/admin/sub_test_type/' + data.id)
            elem.setAttribute("data_id", data.id)
            document.getElementById("edit_test_name").value = data.test_name
            console.log($("#test_type option[value="+data.test_id+"]"));
             $("#edit_test_type option[value="+data.test_id+"]").attr('selected',true);
            if (data.is_show == "1") {
                // $('#edit_is_show').prop('checked', true);
                $('#edit_is_show').parent().removeClass("btn-danger off");
                $('#edit_is_show').parent().addClass("btn-success");
            }
            else {
                // $('#edit_is_show').prop('checked', false);
                $('#edit_is_show').parent().removeClass("btn-success");
                $('#edit_is_show').parent().addClass("btn-danger off");
            }
        }
    });
});

$("form[name='edit_sub_test_form']").on('submit', function (e) {
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
        $("#edit_sub_test_form button[type='submit']").attr('disabled', true);
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
                    $("#edit_sub_test_modal").modal('hide');
                    $('#edit_sub_test_form').trigger("reset");
                    $('.sub_test_list').DataTable().ajax.reload(null, false)
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
        $("#edit_sub_test_form button[type='submit']").attr('disabled', false);
    }
});

$(document).on('click', '.delete_subtype', function (e) {
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
                    // url: base_url + '/admin/sub_test_type/' + id,
                    url: link.href,
                    success: function (response) {
                        if (response.success) {
                            $.notify(response.message, {
                                type: 'success'
                            });
                            $('.sub_test_list').DataTable().ajax.reload(null, false)
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
        url: base_url + '/admin/sub_test_type/status/' + id,
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
