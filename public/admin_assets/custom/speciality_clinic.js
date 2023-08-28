$("form[name='speciality_clinic_form']").on('submit', function (e) {
    e.preventDefault();
}).validate({
    rules: {
        'heading': {
            required: true,
            nospecialchar:true,
        },
        'title': {
            required: true,
            nospecialchar:true,
        },
        'description': {
            required: true,
        },
        'cover_image': {
            // required: true,
            extension: 'jpg|jpeg|png|gif',
        },
    },
    messages: {
        'heading': {
            required: "Heading is required",
        },
        'title': {
            required: "Title is required",
        },
        'description': {
            required: "Description is required.",
        },
        'cover_image': {
            // required: "Person photo is required",
            extension: "Please upload file in these format only (jpg, jpeg, png,gif).",
        },
    },
    submitHandler: function (form) {
        var form_data = new FormData(form);
        $("#speciality_clinic_form button[type='submit']").attr('disabled', true);
        $.ajax({
            url: $(form).attr("action"),
            type: 'post',
            data: form_data,
            contentType: false,
            processData: false,
            beforeSend: function () {
                $(".loader").show();
            },
            complete: function () {
                $(".loader").hide();
            },
            success: function (response) {
                console.log(response);
                if (response.success) {
                    $.notify(response.message, {
                        type: 'success'
                    });
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
        $("#speciality_clinic_form button[type='submit']").attr('disabled', false);
    }
});

$(document).on('change', '#cover_image', function (event) {
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

$(document).on('change', '#image', function (event) {
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

$(document).on('change', '#edit_image', function (event) {
    event.preventDefault();
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

$("form[name='add_clinic_form']").on('submit', function (e) {
    e.preventDefault();
}).validate({
    rules: {
        'name': {
            required: true,
            nospecialchar:true,
        },
        'location': {
            required: true,
        },
        'description': {
            required: true,
        },
        'image': {
            required: true,
            extension: 'jpg|jpeg|png|gif',
        },
    },
    messages: {
        'name': {
            required: "Name is required",
        },
        'location': {
            required: "Location is required",
        },
        'description': {
            required: "Description is required.",
        },
        'image': {
            required: "Image is required",
            extension: "Please upload file in these format only (jpg, jpeg, png,gif).",
        },
    },
    submitHandler: function (form) {
        var form_data = new FormData(form);
        $("#add_clinic_form button[type='submit']").attr('disabled', true);
        $.ajax({
            url: $(form).attr("action"),
            type: 'post',
            data: form_data,
            contentType: false,
            processData: false,
            beforeSend: function () {
                $(".loader").show();
            },
            complete: function () {
                $(".loader").hide();
            },
            success: function (response) {
                console.log(response);
                if (response.success) {
                    $.notify(response.message, {
                        type: 'success'
                    });
                    $("#add_clinic_model").modal('hide');
                    $('.image-preview-container').hide();
                    $('#preview-selected-image').attr('src', '');
                    $('#add_clinic_form').trigger("reset");
                    $('.clinic_list').DataTable().ajax.reload(null, false)
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
        $("#add_clinic_form button[type='submit']").attr('disabled', false);
    }
});

$(document).ready(function () {
    $('.clinic_list').DataTable({
        processing: true,
        serverSide: true,
        responsive: true,
        destroy: true,
        "order": [],
        ajax: {
            url: base_url + '/admin/clinic/list',
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
            data: 'image',
            name: 'image'
        },
        {
            data: 'name',
            name: 'name'
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

$(document).on('click', '.edit_clinic', function (e) {
    e.preventDefault();
    // id = this.value;
    let link = this;
    $.ajax({
        type: 'GET',
        // url: base_url + '/admin/clinic/' + id + '/edit',
        url: link.href,
        success: function (data) {
            console.log(data.name);
            $("#edit_clinic_model").modal('show');
            let elem = document.getElementById('edit_clinic_form');
            elem.setAttribute("action", base_url + '/admin/clinic/' + data.id)
            elem.setAttribute("data_id", data.id)
            document.getElementById("edit_name").value = data.name
            document.getElementById("edit_location").value = data.location
            document.getElementById("edit_description").value = data.description
            $('.edit_image-preview-container').show();
            url = base_url.replace('/public', '')
            $("#edit_clinic_form .edit_preview-selected-image").attr("src", url + '/storage/' + data.image_path + "/" + data.image_name)
        }
    });
});

$("form[name='edit_clinic_form']").on('submit', function (e) {
    e.preventDefault();
}).validate({
    rules: {
        'edit_name': {
            required: true,
            nospecialchar:true,
        },
        'edit_location': {
            required: true,
        },
        'edit_description': {
            required: true,
        },
        'edit_image': {
            extension: 'jpg|jpeg|png|gif',
        },
    },
    messages: {
        'edit_name': {
            required: "Name is required",
        },
        'edit_location': {
            required: "Location is required",
        },
        'edit_description': {
            required: "Description is required.",
        },
        'edit_image': {
            extension: "Please upload file in these format only (jpg, jpeg, png,gif).",
        },
    },
    submitHandler: function (form) {
        var form_data = new FormData(form);
        $("#edit_clinic_form button[type='submit']").attr('disabled', true);
        $.ajax({
            url: $(form).attr("action"),
            type: 'post',
            data: form_data,
            contentType: false,
            processData: false,
            beforeSend: function () {
                $(".loader").show();
            },
            complete: function () {
                $(".loader").hide();
            },
            success: function (response) {
                console.log(response);
                if (response.success) {
                    $.notify(response.message, {
                        type: 'success'
                    });
                    $("#edit_clinic_model").modal('hide');
                    $('#add_clinic_form').trigger("reset");
                    $('#edit_clinic_form').trigger("reset");
                    $('.clinic_list').DataTable().ajax.reload(null, false)
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
        $("#edit_clinic_form button[type='submit']").attr('disabled', false);
    }
});

$(document).on('change', '.status_btn', function (e) {
    e.preventDefault();
    id = this.value;
    console.log(id);
    $.ajax({
        type: 'GET',
        url: base_url + '/admin/clinic/status/' + id,
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

$(document).on('click', '.delete_clinic', function (e) {
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
                    // url: base_url + '/admin/clinic/' + id,
                    url: link.href,
                    success: function (response) {
                        if (response.success) {
                            $.notify(response.message, {
                                type: 'success'
                            });
                            $('.clinic_list').DataTable().ajax.reload(null, false)
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
