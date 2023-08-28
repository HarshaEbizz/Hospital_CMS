$("form[name='add_wing_form']").on('submit', function (e) {
    e.preventDefault();
}).validate({
    rules: {
        "wing_title": {
            required: true,
            nospecialchar:true,
        }
    },
    messages: {
        "wing_title": {
            required: "Please enter wing title",
        },
    },
    submitHandler: function (form) {
        var formData = new FormData(form);
        $("#add_wing_form button[type='submit']").attr('disabled', true);
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
                    $("#addWingModal").modal('hide');
                    $('#add_wing_form').trigger("reset");
                    $('#wing-table').DataTable().ajax.reload(null, false);
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
        $("#add_wing_form button[type='submit']").attr('disabled', false);
    }
});

$("form[name='update_wing_form']").on('submit', function (e) {
    e.preventDefault();
}).validate({
    rules: {
        "wing_title": {
            required: true,
            nospecialchar:true,
        }
    },
    messages: {
        "wing_title": {
            required: "Please enter wing title",
        },
    },
    submitHandler: function (form) {
        var formData = new FormData(form);
        $("#update_wing_form button[type='submit']").attr('disabled', true);
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
                    $("#updateWingModal").modal('hide');
                    $('#update_floor_form').trigger("reset");
                    $('#wing-table').DataTable().ajax.reload(null, false);
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
        $("#update_wing_form button[type='submit']").attr('disabled', false);
    }
});

$(document).ready(function() {
    $('#wing-table').DataTable({
        processing: true,
        serverSide: true,
        responsive: true,
        destroy: true,
        "order": [],
        ajax: {
            url: base_url + '/admin/wings/list',
            type: 'post',
            data: {},
        },
        columns: [{
                data: 'DT_RowIndex',
                orderable: false,
                searchable: false
            },
            {
                data: 'wing_title',
                name: 'wing_title'
            },
            {
                data: 'actions',
                orderable: false,
                searchable: false
            },
        ]
    });
});

$(document).on('click', '.edit_wing', function (e) {
    e.preventDefault();
    // var id = $(this).val();
    let link = this;
    $.ajax({
        // url: base_url+"/admin/wings/"+id,
        url: link.href,
        type: "GET",
        success: function(res){
            $("#update_wing_form #edit_wing_id").val(res.data.id);
            $("#update_wing_form #edit_wing_title").val(res.data.wing_title);
            $("#updateWingModal").modal('show');

        }
    })
});

$(document).on('click', '.delete_wing', function (e) {
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
                // url: base_url + '/admin/wings/' + id,
                url: link.href,
                success: function (response) {
                    if (response.success) {
                        $.notify(response.message, {
                            type: 'success'
                        });
                        $('#wing-table').DataTable().ajax.reload(null, false)
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
