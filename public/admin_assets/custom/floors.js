$("form[name='add_floor_form']").on('submit', function (e) {
    e.preventDefault();
}).validate({
    rules: {
        "floor_title": {
            required: true,
            nospecialchar:true,
        }
    },
    messages: {
        "floor_title": {
            required: "Please enter floor title",
        },
    },
    submitHandler: function (form) {
        var formData = new FormData(form);
        $("#add_floor_form button[type='submit']").attr('disabled', true);
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
                    $("#addFloorModal").modal('hide');
                    $('#add_floor_form').trigger("reset");
                    $('#floor-table').DataTable().ajax.reload(null, false);
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
        $("#add_floor_form button[type='submit']").attr('disabled', false);
    }
});

$("form[name='edit_floor_form']").on('submit', function (e) {
    e.preventDefault();
}).validate({
    rules: {
        "floor_title": {
            required: true,
            nospecialchar:true,
        }
    },
    messages: {
        "floor_title": {
            required: "Please enter floor title",
        },
    },
    submitHandler: function (form) {
        var formData = new FormData(form);
        $("#edit_floor_form button[type='submit']").attr('disabled', true);
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
                    $("#updateFloorModal").modal('hide');
                    $('#edit_floor_form').trigger("reset");
                    $('#floor-table').DataTable().ajax.reload(null, false);
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
        $("#edit_floor_form button[type='submit']").attr('disabled', false);
    }
});

$(document).ready(function() {
    $('#floor-table').DataTable({
        processing: true,
        serverSide: true,
        responsive: true,
        destroy: true,
        "order": [],
        ajax: {
            url: base_url + '/admin/floors/list',
            type: 'post',
            data: {},
        },
        columns: [{
                data: 'DT_RowIndex',
                orderable: false,
                searchable: false
            },
            {
                data: 'floor_title',
                name: 'floor_title'
            },
            {
                data: 'actions',
                orderable: false,
                searchable: false
            },
        ]
    });
});

$(document).on('click', '.edit_floor', function (e) {
    e.preventDefault();
    // var id = $(this).val();
    let link = this;
    $.ajax({
        // url: base_url+"/admin/floors/"+id,
        url: link.href,
        type: "GET",
        success: function(res){
            $("#edit_floor_form #edit_floor_id").val(res.data.id);
            $("#edit_floor_form #edit_floor_title").val(res.data.floor_title);
            $("#updateFloorModal").modal('show');

        }
    })
});

$(document).on('click', '.delete_floor', function (e) {
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
                // url: base_url + '/admin/floors/' + id,
                url: link.href,
                success: function (response) {
                    if (response.success) {
                        $.notify(response.message, {
                            type: 'success'
                        });
                        $('#floor-table').DataTable().ajax.reload(null, false)
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
