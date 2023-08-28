// $("input").keyup(function() {
//     if($(this).val()==''){
//         html = '<label id="' + $(this).attr('id') + '-error" class="error" for="' + $(this).attr('id') + '" style="">Video Caption is required.</label>'
//         $(this).parent().append(html);
//         console.log("error");
//     }
    
//     // $(this).siblings(".form-group__bar").hide()
//   });
$("form[name='about_us_form']").on('submit', function (e) {
    e.preventDefault();
}).validate({
    rules: {
        'top_heading': {
            required: true,
            nospecialcharnumber:true,
        },
        'bottom_heading': {
            required: true,
            nospecialcharnumber:true,
        },
        'bottom_sub_heading': {
            required: true,
            nospecialcharnumber:true,
        },
        'top_cover_image': {
            // required: true,
            extension: 'jpg|jpeg|png|gif',
        },
        'bottom_cover_image': {
            // required: true,
            extension: 'jpg|jpeg|png|gif',
        },
    },
    messages: {
        'top_heading': {
            required: "Top Heading is required",
        },
        'bottom_heading': {
            required: "Bottom heading is required",
        },
        'bottom_sub_heading': {
            required: "Bottom sub heading is required.",
        },
        'top_cover_image': {
            // required: "Person photo is required",
            extension: "Please upload file in these format only (jpg, jpeg, png,gif).",
        },
        'bottom_cover_image': {
            // required: "Signature photo is required",
            extension: "Please upload file in these format only (jpg, jpeg, png,gif).",
        },
    },
    submitHandler: function (form) {
        var form_data = new FormData(form);
        $("#about_us_form button[type='submit']").attr('disabled', true);
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
            contentType: false,
            processData: false,
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
        $("#about_us_form button[type='submit']").attr('disabled', false);
    }
});

$(document).on('change', '#top_cover_image', function (event) {
    event.preventDefault();
    var file = this.files[0];
    var _URL = window.URL || window.webkitURL;
    var fileName = event.target.files[0].name;
    var Extension = fileName.substring(
        fileName.lastIndexOf('.') + 1).toLowerCase();
    if (Extension == "gif" || Extension == "png" || Extension == "bmp" || Extension == "jpeg" || Extension == "jpg") {
        if (file) {
            if ((file)) {
                img = new Image();
                img.onload = function() {
                    console.log("before image crop  "+this.width + " " + this.height);
                };
                img.src = _URL.createObjectURL(file);
            }
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

$(document).on('change', '#bottom_cover_image', function (event) {
    event.preventDefault();
    var file = event.target.files[0];
    var fileName = event.target.files[0].name;
    var Extension = fileName.substring(
        fileName.lastIndexOf('.') + 1).toLowerCase();
    if (Extension == "gif" || Extension == "png" || Extension == "bmp" || Extension == "jpeg" || Extension == "jpg" || Extension == "svg") {
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

$(document).on('change', '.bottom_banner_status_btn', function (e) {
    e.preventDefault();
    id = this.value;
    $.ajax({
        type: 'GET',
        url: base_url + '/admin/bottom_banner_status/' + id,
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

$("form[name='chairman_speak_form']").on('submit', function (e) {
    e.preventDefault();
}).validate({
    rules: {
        'heading': {
            required: true,
            nospecialcharnumber:true,
        },
        'sub_heading': {
            required: true,
            nospecialcharnumber:true,
        },
        'paragraph_1': {
            required: true,
        },
        'paragraph_2': {
            required: true,
        },
        'paragraph_3': {
            required: true,
        },
        'person_photo': {
            // required: true,
            extension: 'jpg|jpeg|png|gif',
        },
        'signature_photo': {
            // required: true,
            extension: 'jpg|jpeg|png|gif|svg',
        },

    },
    messages: {
        'heading': {
            required: "Heading is required",
        },
        'sub_heading': {
            required: "Sub heading is required",
        },
        'paragraph_1': {
            required: "Paragraph-1 is required",
        },
        'paragraph_2': {
            required: "Paragraph-2 is required",
        },
        'paragraph_3': {
            required: "Paragraph-3 is required",
        },
        'person_photo': {
            // required: "Person photo is required",
            extension: "Please upload file in these format only (jpg, jpeg, png,gif).",
        },
        'signature_photo': {
            // required: "Signature photo is required",
            extension: "Please upload file in these format only (jpg, jpeg, png,gif,svg).",
        },
    },
    submitHandler: function (form) {
        var form_data = new FormData(form);
        $("#chairman_speak_form button[type='submit']").attr('disabled', true);
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
            contentType: false,
            processData: false,
            success: function (response) {
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
        $("#chairman_speak_form button[type='submit']").attr('disabled', false);
    }
});

$(document).on('change', '#person_photo', function (event) {
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

$(document).on('change', '#signature_photo', function (event) {
    event.preventDefault();
    console.log("cover");
    var file = event.target.files[0];
    var fileName = event.target.files[0].name;
    var Extension = fileName.substring(
        fileName.lastIndexOf('.') + 1).toLowerCase();
    if (Extension == "gif" || Extension == "png" || Extension == "bmp" || Extension == "jpeg" || Extension == "jpg" || Extension == "svg") {
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

$("form[name='chairman_message_form']").on('submit', function (e) {
    e.preventDefault();
}).validate({
    rules: {
        'message_heading': {
            required: true,
            nospecialcharnumber:true,
        },
        'message_sub_heading': {
            required: true,
            nospecialcharnumber:true,
        },
        'message_paragraph_1': {
            required: true,
        },
        'message_paragraph_2': {
            required: true,
        },
        'message_person_photo': {
            // required: true,
            extension: 'jpg|jpeg|png|gif',
        },
        'message_signature_photo': {
            // required: true,
            extension: 'jpg|jpeg|png|gif|svg',
        },

    },
    messages: {
        'message_heading': {
            required: "Heading is required",
        },
        'message_sub_heading': {
            required: "Sub heading is required",
        },
        'message_paragraph_1': {
            required: "Paragraph-1 is required",
        },
        'message_paragraph_2': {
            required: "Paragraph-2 is required",
        },
        'message_person_photo': {
            // required: "Person photo is required",
            extension: "Please upload file in these format only (jpg, jpeg, png,gif).",
        },
        'message_signature_photo': {
            // required: "Signature photo is required",
            extension: "Please upload file in these format only (jpg, jpeg, png,gif,svg).",
        },
    },
    submitHandler: function (form) {
        var form_data = new FormData(form);
        $("#chairman_message_form button[type='submit']").attr('disabled', true);
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
            contentType: false,
            processData: false,
            success: function (response) {
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
        $("#chairman_message_form button[type='submit']").attr('disabled', false);
    }
});

$(document).on('change', '#message_person_photo', function (event) {
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

$(document).on('change', '#message_signature_photo', function (event) {
    event.preventDefault();
    console.log("cover");
    var file = event.target.files[0];
    var fileName = event.target.files[0].name;
    var Extension = fileName.substring(
        fileName.lastIndexOf('.') + 1).toLowerCase();
    if (Extension == "gif" || Extension == "png" || Extension == "bmp" || Extension == "jpeg" || Extension == "jpg" || Extension == "svg") {
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

$(document).ready(function () {
    create_ck_editor(document.getElementById("paragraph_1"), "paragraph_1");
    create_ck_editor(document.getElementById("paragraph_2"), "paragraph_2");
    create_ck_editor(document.getElementById("paragraph_3"), "paragraph_3");
    create_ck_editor(document.getElementById("message_paragraph_1"), "message_paragraph_1");
    create_ck_editor(document.getElementById("message_paragraph_2"), "message_paragraph_2");
    $('#vision_mission_basic_1').DataTable({
        processing: true,
        serverSide: true,
        responsive: true,
        destroy: true,
        "order": [],
        ajax: {
            url: base_url + '/admin/about_us/vision_mission/list',
            type: 'post',
            data: {},
        },
        "initComplete": function (settings, json) {
            $('.tgl').bootstrapToggle()
        },
        columns: [{
            data: 'DT_RowIndex',
            orderable: false,
        },
        {
            data: 'title',
            name: 'title'
        },
        {
            data: 'description',
            name: 'description'
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
    $('.management_message_table').DataTable({
        processing: true,
        serverSide: true,
        responsive: true,
        destroy: true,
        "order": [],
        ajax: {
            url: base_url + '/admin/about_us/management_message_list',
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
            data: 'designation',
            name: 'designation'
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


$(document).on('click', '.delete_data', function (e) {
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
                    type: 'GET',
                    // url: base_url + '/admin/about_us/vision_mission/delete/' + id,
                    url: link.href,
                    success: function (response) {
                        if (response.success) {
                            $.notify(response.message, {
                                type: 'success'
                            });
                            $('#vision_mission_basic_1').DataTable().ajax.reload(null, false)
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


$(document).on('change', '.mission_status_btn', function (e) {
    e.preventDefault();
    id = this.value;
    $.ajax({
        type: 'GET',
        url: base_url + '/admin/about_us/vision_mission/status/' + id,
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


$(document).on('change', '.message_status_btn', function (e) {
    e.preventDefault();
    id = this.value;
    $.ajax({
        type: 'GET',
        url: base_url + '/admin/about_us/management_message_status/' + id,
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

$(document).on('click', '.delete_message', function (e) {
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
                    type: 'GET',
                    // url: base_url + '/admin/about_us/management_message_delete/' + id,
                    url: link.href,
                    success: function (response) {
                        if (response.success) {
                            $.notify(response.message, {
                                type: 'success'
                            });
                            $('#management_message_basic_1').DataTable().ajax.reload(null, false)
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

