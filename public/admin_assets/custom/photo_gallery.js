$(document).ready(function () {
    $('#photo_table').DataTable({
        processing: true,
        serverSide: true,
        responsive: true,
        destroy: true,
        "order": [],
        ajax: {
            url: base_url + '/admin/photo_gallery/list',
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
            data: 'name',
            name: 'name'
        },
        {
            data: 'date',
            name: 'date'
        },
        {
            data: 'image',
            name: 'image',
            orderable: false,
            searchable: false
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

$("form[name='add_event_form']").on('submit', function (e) {
    e.preventDefault();
}).validate({
    rules: {
        "name": {
            required: true,
            nospecialchar:true,
        },
        "description": {
            required: true,
        },
        "date": {
            required: true,
        },
        "main_image": {
            required: true,
            extension: 'jpg|jpeg|png|gif',
        }
    },
    messages: {
        "name": {
            required: "enter name",
        },
        "description": {
            required: "enter description",
        },
        "date": {
            required: "Select date",
        },
        "main_image": {
            required: "Choose Cover image",
            extension: "Please upload file in these format only (jpg, jpeg, png,gif).",
        }
    },
    submitHandler: function (form) {
        var formData = new FormData(form);
        $("#add_event_form button[type='submit']").attr('disabled', true);
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
                    window.location.href = base_url + '/admin/photo_gallery';
                    // $("#addRoomCatModal").modal('hide');
                    // $('#add_room_cat_form').trigger("reset");
                    // $('#room-category-table').DataTable().ajax.reload(null, false);
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
        $("#add_event_form button[type='submit']").attr('disabled', false);
    }
});

$("form[name='edit_event_form']").on('submit', function (e) {
    e.preventDefault();
}).validate({
    rules: {
        "name": {
            required: true,
            nospecialchar:true,
        },
        "description": {
            required: true,
        },
        "date": {
            required: true,
        },
        "main_image": {
            extension: 'jpg|jpeg|png|gif',
        }
    },
    messages: {
        "name": {
            required: "enter name",
        },
        "description": {
            required: "enter description",
        },
        "date": {
            required: "Select date",
        },
        "main_image": {
            extension: "Please upload file in these format only (jpg, jpeg, png,gif).",
        }
    },
    submitHandler: function (form) {
        var formData = new FormData(form);
        $("#edit_event_form button[type='submit']").attr('disabled', true);
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
                    window.location.href = base_url + '/admin/photo_gallery';
                    // $("#addRoomCatModal").modal('hide');
                    // $('#add_room_cat_form').trigger("reset");
                    // $('#room-category-table').DataTable().ajax.reload(null, false);
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
        $("#edit_event_form button[type='submit']").attr('disabled', false);
    }
});

$(document).on('change', '.status_btn', function (e) {
    e.preventDefault();
    id = this.value;
    console.log(id);
    $.ajax({
        type: 'GET',
        url: base_url + '/admin/photo_gallery/status/' + id,
        "initComplete": function (settings, json) {
            $('.tgl').bootstrapToggle()
        },
        success: function (response) {
            $.notify(response.message, {
                type: 'success'
            });
            // $('.term_table').DataTable().ajax.reload(null, false)
        }
    });
});

$(document).on('change', '#main_image', function (event) {
    event.preventDefault();
    console.log("cover");
    var file = event.target.files[0];
    var fileName = event.target.files[0].name;
    var Extension = fileName.substring(
        fileName.lastIndexOf('.') + 1).toLowerCase();
    if (Extension == "gif" || Extension == "png" || Extension == "bmp" || Extension == "jpeg" || Extension == "jpg") {
        if (file) {
            var image_element_name = '#' + $(this).attr('id');
            image_crop(image_element_name);
        }
    } else {
        this.value = "";
        $.notify('Photo only allows file types of GIF, PNG, JPG, JPEG and BMP. ', {
            type: 'danger'
        });
    }
});

$(document).on('click', '.delete_gallery', function (e) {
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
                    // url: base_url + '/admin/photo_gallery/' + id,
                    url: link.href,
                    success: function (response) {
                        if (response.success) {
                            $.notify(response.message, {
                                type: 'success'
                            });
                            $('#photo_table').DataTable().ajax.reload(null, false)
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
