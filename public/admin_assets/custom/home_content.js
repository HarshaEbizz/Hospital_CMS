
$("form[name='home_content_form']").on('submit', function (e) {
    e.preventDefault();
    console.log("va");
}).validate({
    debug: false,
    ignore: [],
    rules: {
        'message_iamge': {
            required: true,
        },
        'content': {
            required: true,
        },
        'front_iamge': {
            // required: true,
            extension: 'jpg|jpeg|png|gif',
        },
        'back_image': {
            // required: true,
            extension: 'jpg|jpeg|png|gif',
        },
    },
    messages: {
        'message_iamge': {
            required: "Message is required",
        },
        'content': {
            required: "Content is required",
        },
        'front_iamge': {
            // required: "Person photo is required",
            extension: "Please upload file in these format only (jpg, jpeg, png,gif).",
        },
        'back_image': {
            // required: "Signature photo is required",
            extension: "Please upload file in these format only (jpg, jpeg, png,gif).",
        },
    },
    submitHandler: function (form) {
        var form_data = new FormData(form);
        // $("#home_content_form button[type='submit']").attr('disabled', true);
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
        $("#home_content_form button[type='submit']").attr('disabled', false);
    }
});
var content_data = $('#content_data').val();
var message_data = $('#message_data').val();
create_ck_editor(document.getElementById("message_iamge"), "message_iamge",message_data);
create_ck_editor(document.getElementById("content"), "content",content_data);

$(document).on('change', '#front_iamge', function (event) {
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
            let reader = new FileReader();
        }
    } else {
        this.value = "";
        $.notify('Photo only allows file types of GIF, PNG, JPG, JPEG and BMP. ', {
            type: 'danger'
        });
    }
});
$(document).on('change', '#back_image', function (event) {
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