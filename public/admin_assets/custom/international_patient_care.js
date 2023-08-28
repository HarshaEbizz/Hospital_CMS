create_ck_editor(document.getElementById("description"), "description");

$("form[name='patient_cares_form']").on('submit', function (e) {
    e.preventDefault();
}).validate({
    debug: false,
    ignore: [],
    rules: {
        heading: {
            required: true,
            nospecialchar:true,
        },
        cover_image: {
            extension: 'jpg|jpeg|png|gif',
        },
        title: {
            required: true,
            nospecialchar:true,
        },
        description: {
            required: true,
        },
        image: {
            extension: 'jpg|jpeg|png|gif',
        }
    },
    messages: {
        heading: {
            required: "Heading is required",
        },
        cover_image: {
            extension: 'Please upload file in these format only (jpg, jpeg, png,gif).',
        },
        title: {
            required: "Title Name is required",
        },
        description: {
            required: "Description is required",
        },
        image: {
            extension: "Please upload file in these format only (jpg, jpeg, png,gif).",
        }
    },
    submitHandler: function (form) {
        var form_data = new FormData(form);
        $("#patient_cares_form button[type='submit']").attr('disabled', true);
        $.ajax({
            url: $(form).attr("action"),
            type: 'POST',
            data: form_data,
            contentType: false,
            cache: false,
            processData: false,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            beforeSend: function () {
                // setting a timeout
                for (instance in CKEDITOR.ClassicEditor.instances) {
                    CKEDITOR.ClassicEditor.instances[instance].updateElement();
                }
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
        $("#patient_cares_form button[type='submit']").attr('disabled', false);
    }
});

$("#add_content_model").on('shown.bs.modal', function () {
    $("#details_textarea").html('');
    $("#details_textarea").html('<textarea class="form-control" placeholder="details " id="details" name="details" style="height: 100px"></textarea>');
    create_ck_editor(document.getElementById("details"), "details");
});

$(document).ready(function () {
    $('.caretopic_table').DataTable({
        processing: true,
        serverSide: true,
        responsive: true,
        destroy: true,
        "order": [],
        ajax: {
            url: base_url + '/admin/international_patient_care/list',
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
            data: 'topic',
            name: 'topic'
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

$(document).on('change', '.status_btn', function (e) {
    e.preventDefault();
    id = this.value;
    console.log(id);
    $.ajax({
        type: 'GET',
        url: base_url + '/admin/international_patient_care/status/' + id,
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

$(document).on('click', '.delete_topic', function (e) {
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
                    // url: base_url + '/admin/international_patient_care/' + id,
                    url: link.href,
                    success: function (response) {
                        if (response.success) {
                            $.notify(response.message, {
                                type: 'success'
                            });
                            $('.caretopic_table').DataTable().ajax.reload(null, false)
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

create_ck_editor(document.getElementById("details"), "details");

$(document).on('click', '.edit_topic', function (e) {
    e.preventDefault();
    // id = this.value;
    let link = this;
    $.ajax({
        type: 'GET',
        // url: base_url + '/admin/international_patient_care/' + id + '/edit',
        url: link.href,
        success: function (data) {
            console.log(data.name);
            $("#edit_content_model").modal('show');
            let elem = document.getElementById('edit_patient_cares_content_form');
            elem.setAttribute("action", base_url + '/admin/international_patient_care/' + data.id)
            elem.setAttribute("data_id", data.id)
            document.getElementById("edit_topic").value = data.topic
            $("#edit_details_textarea").html('');
            $("#edit_details_textarea").html('<textarea class="form-control" placeholder="details " id="edit_details" name="edit_details" style="height: 100px"></textarea>');
            create_ck_editor(document.getElementById("edit_details"), "edit_details", data.details);
        }
    });
});

$("form[name='patient_cares_content_form']").on('submit', function (e) {
    e.preventDefault();
}).validate({
    debug: false,
    ignore: [],
    rules: {
        topic: {
            required: true,
        },
        details: {
            required: true,
        },
    },
    messages: {
        topic: {
            required: "Topic Name is required",
        },
        details: {
            required: "Detail is required",
        },
    },
    submitHandler: function (form) {
        var form_data = new FormData(form);
        $("#patient_cares_content_form button[type='submit']").attr('disabled', true);
        $.ajax({
            url: $(form).attr("action"),
            type: 'POST',
            data: form_data,
            contentType: false,
            cache: false,
            processData: false,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            beforeSend: function () {
                // setting a timeout
                for (instance in CKEDITOR.ClassicEditor.instances) {
                    CKEDITOR.ClassicEditor.instances[instance].updateElement();
                }
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
                    $("#add_content_model").modal('hide');
                    $('#patient_cares_content_form').trigger("reset");
                    $('.caretopic_table').DataTable().ajax.reload(null, false)
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
        $("#patient_cares_content_form button[type='submit']").attr('disabled', false);
    }
});

$("form[name='edit_patient_cares_content_form']").on('submit', function (e) {
    e.preventDefault();
}).validate({
    debug: false,
    ignore: [],
    rules: {
        edit_topic: {
            required: true,
        },
        edit_details: {
            required: true,
        },
    },
    messages: {
        edit_topic: {
            required: "Topic Name is required",
        },
        edit_details: {
            required: "Detail is required",
        },
    },
    submitHandler: function (form) {
        var form_data = new FormData(form);
        $("#edit_patient_cares_content_form button[type='submit']").attr('disabled', true);
        $.ajax({
            url: $(form).attr("action"),
            type: 'POST',
            data: form_data,
            contentType: false,
            cache: false,
            processData: false,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            beforeSend: function () {
                // setting a timeout
                for (instance in CKEDITOR.ClassicEditor.instances) {
                    CKEDITOR.ClassicEditor.instances[instance].updateElement();
                }
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
                    $("#edit_content_model").modal('hide');
                    $('#edit_patient_cares_content_form').trigger("reset");
                    $('.caretopic_table').DataTable().ajax.reload(null, false)
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
        $("#edit_patient_cares_content_form button[type='submit']").attr('disabled', false);
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

$(document).ajaxComplete(function () {
    $('input[type=checkbox][data-toggle^=toggle]').bootstrapToggle();
});
