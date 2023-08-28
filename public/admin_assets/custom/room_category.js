$("form[name='add_room_cat_form']").on('submit', function (e) {
    e.preventDefault();
}).validate({
    rules: {
        "name": {
            required: true,
            nospecialchar:true,
        }
    },
    messages: {
        "name": {
            required: "Please enter room category",
        },
    },
    submitHandler: function (form) {
        var formData = new FormData(form);
        $("#add_room_cat_form button[type='submit']").attr('disabled', true);
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
                    $("#addRoomCatModal").modal('hide');
                    $('#add_room_cat_form').trigger("reset");
                    $('#room-category-table').DataTable().ajax.reload(null, false);
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
        $("#add_room_cat_form button[type='submit']").attr('disabled', false);
    }
});

$("form[name='edit_room_cat_form']").on('submit', function (e) {
    e.preventDefault();
}).validate({
    rules: {
        "name": {
            required: true,
            nospecialchar:true,
        }
    },
    messages: {
        "name": {
            required: "Please enter room category",
        },
    },
    submitHandler: function (form) {
        var formData = new FormData(form);
        $("#edit_room_cat_form button[type='submit']").attr('disabled', true);
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
                    $("#updateRoomCatModal").modal('hide');
                    $('#edit_room_cat_form').trigger("reset");
                    $('#room-category-table').DataTable().ajax.reload(null, false);
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
        $("#edit_room_cat_form button[type='submit']").attr('disabled', false);
    }
});

$(document).ready(function() {
    $('#room-category-table').DataTable({
        processing: true,
        serverSide: true,
        responsive: true,
        destroy: true,
        "order": [],
        ajax: {
            url: base_url + '/admin/room_categories/list',
            type: 'post',
            data: {},
        },
        columns: [{
                data: 'DT_RowIndex',
                orderable: false,
                searchable: false
            },
            {
                data: 'name',
                name: 'name '
            },
            {
                data: 'actions',
                orderable: false,
                searchable: false
            },
        ]
    });
});

$(document).on('click', '.edit_room_category', function (e) {
    e.preventDefault();
    // var id = $(this).val();
    let link = this;
    $.ajax({
        // url: base_url+"/admin/room_categories/"+id,
        url: link.href,
        type: "GET",
        success: function(res){
            $("#edit_room_cat_form #edit_room_cat_id").val(res.data.id);
            $("#edit_room_cat_form #edit_name").val(res.data.name);
            $("#updateRoomCatModal").modal('show');

        }
    })
});

$(document).on('click', '.delete_room_category', function (e) {
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
                // url: base_url + '/admin/room_categories/' + id,
                url: link.href,
                success: function (response) {
                    if (response.success) {
                        $.notify(response.message, {
                            type: 'success'
                        });
                        $('#room-category-table').DataTable().ajax.reload(null, false)
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
