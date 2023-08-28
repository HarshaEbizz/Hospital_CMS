create_ck_editor(document.getElementById("note"), "note");

$("form[name='visiting_hours_form']").on('submit', function (e) {
    e.preventDefault();
}).validate({
    debug: false,
    ignore: [],
    rules: {
        heading: {
            required: true,
            nospecialchar:true,
        },
        title: {
            required: true,
            nospecialchar:true,
        },
        // note: {
        //     required: true,
        // },
        cover_image: {
            // required: true,
            extension: 'jpg|jpeg|png|gif',
        },
        morning_open_time: {
            required: true,
        },
        morning_close_time: {
            required: true,
        },
        evening_open_time: {
            required: true,
        },
        evening_close_time: {
            required: true,
        },
    },
    messages: {
        heading: {
            required: "Heading is required",
        },
        title: {
            required: "Title Name is required",
        },
        contact_no: {
            required: "Contact number is required",
            // number: "Please enter contact in digits",
        },
        cover_image: {
            // required : "Image is required.",
            extension: "Please upload file in these format only (jpg, jpeg, png,gif).",
        },
        morning_open_time: {
            required: "Please add morning time",
        },
        morning_close_time: {
            required: "Please add morning time",
        },
        evening_open_time: {
            required: "Please add evening time",
        },
        evening_close_time: {
            required: "Please add evening time",
        },

    },
    submitHandler: function (form) {
        var form_data = new FormData(form);
        $("#visiting_hours_form button[type='submit']").attr('disabled', true);
        $.ajax({
            url: $(form).attr("action"),
            type: 'POST',
            data: form_data,
            beforeSend: function () {
                $(".loader").show();
            },
            complete: function () {
                $(".loader").hide();
            },
            contentType: false,
            cache: false,
            processData: false,
            success: function (response) {
                console.log(response);
                if (response.success) {
                    $.notify(response.message, {
                        type: 'success'
                    });
                } else {
                    $.notify('Something went wrong', {
                        type: 'danger'
                    });
                }
            }
        });
        $("#visiting_hours_form button[type='submit']").attr('disabled', false);
    }
});
$(document).on('change', '#cover_image', function (event) {
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