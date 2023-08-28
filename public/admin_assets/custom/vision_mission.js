$(document).ready(function () {
    $('#Add_color').colorpicker({
        inline: true,
        container: true,
        // "color": "#16813D",
        extensions: [
            {
                name: 'swatches', // extension name to load
                options: { // extension options
                    colors: {
                        'black': '#000000',
                        'gray': '#888888',
                        'white': '#ffffff',
                        'red': 'red',
                        'default': '#777777',
                        'primary': '#337ab7',
                        'success': '#5cb85c',
                        'info': '#5bc0de',
                        'warning': '#f0ad4e',
                        'danger': '#d9534f'
                    },
                    namesAsValues: true
                }
            }
        ]
    });
});
$("form[name='vision_mission_form']").on('submit', function (e) {
    e.preventDefault();
}).validate({
    rules: {
        'title': {
            required: true,
            nospecialcharnumber:true,
        },
        'description': {
            required: true,
        },
        'color_code': {
            required: true,
        },
        'vision_image': {
            required: true,
            extension: 'jpg|jpeg|png|gif',
        }
    },
    messages: {
        'title': {
            required: "Title is required",
        },
        'description': {
            required: "Description is required",
        },
        'color_code': {
            required: "Please select color",
        },
        'vision_image': {
            required: "image is required.",
            extension: "Please upload file in these format only (jpg, jpeg, png,gif).",
        }
    },
    submitHandler: function (form) {
        var form_data = new FormData(form);
        $("#vision_mission_form button[type='submit']").attr('disabled', true);
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
                    window.location.href = base_url + '/admin/about_us';
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
        $("#vision_mission_form button[type='submit']").attr('disabled', false);
    }
});

$("form[name='edit_vision_mission_form']").on('submit', function (e) {
    e.preventDefault();
}).validate({
    rules: {
        'edit_title': {
            required: true,
            nospecialcharnumber:true,
        },
        'edit_color_code': {
            required: true,
        },
        'edit_description': {
            required: true,
        },
        'edit_vision_image': {
            extension: 'jpg|jpeg|png|gif',
        }
    },
    messages: {
        'edit_title': {
            required: "Title is required",
        },
        'edit_color_code': {
            required: "Description is required",
        },
        'edit_description': {
            required: "Please select color",
        },
        'edit_vision_image': {
            extension: "Please upload file in these format only (jpg, jpeg, png,gif).",
        }
    },
    submitHandler: function (form) {
        var form_data = new FormData(form);
        $("#edit_vision_mission_form button[type='submit']").attr('disabled', true);
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
                    window.location.href = base_url + '/admin/about_us';
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
        $("#edit_vision_mission_form button[type='submit']").attr('disabled', false);
    }
});

$(document).on('change', '#vision_image', function (event) {
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

$(document).on('change', '#edit_vision_image', function (event) {
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