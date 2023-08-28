create_ck_editor(document.getElementById("description_1"), "description_1");
create_ck_editor(document.getElementById("description_2"), "description_2");

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

$(document).on('change', '#image_1', function (event) {
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

$(document).on('change', '#image_2', function (event) {
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

$(document).ready(function () {
    $("form[name='medic_add_update_form']").on('submit', function (e) {
        e.preventDefault();
    }).validate({
        debug: false,
        ignore: [],
        rules: {
            heading: {
                required: true,
                maxlength: 30,
                normalizer: function (value) {
                    return $.trim(value);
                },
                nospecialchar:true,
            },
            cover_image: {
                // required: true,
                extension: "jpg|jpeg|png|ico|bmp|gif|svg"
            },
            title_1: {
                required: true,
                maxlength: 30,
                normalizer: function (value) {
                    return $.trim(value);
                },
                nospecialchar:true,
            },
            image_1: {
                // required: true,
                extension: "jpg|jpeg|png|ico|bmp|gif|svg"
            },
            description_1: {
                required: true,
            },
            title_2: {
                required: true,
                maxlength: 30,
                normalizer: function (value) {
                    return $.trim(value);
                },
                nospecialchar:true,
            },
            image_2: {
                // required: true,
                extension: "jpg|jpeg|png|ico|bmp|gif|svg"
            },
            description_2: {
                required: true,
            },

        },
        messages: {
            heading: {
                // required: "First Name is required",
                maxlength: "First Name is too big",
            },
            cover_image: {
                required: "Upload file",
                extension: "File not supported Valid image - jpg, jpeg, png, ico, bmp, gif, svg"
            },
            title_1: {
                maxlength: "Title is too big",
            },
            image_1: {
                required: "Upload file",
                extension: "File not supported Valid image - jpg, jpeg, png, ico, bmp, gif, svg"
            },
            description_1: {
                // required: "Description is required",
            },
            title_2: {
                maxlength: "Title is too big",
            },
            image_2: {
                required: "Upload file",
                extension: "File not supported Valid image - jpg, jpeg, png, ico, bmp, gif, svg"
            },
            description_2: {
                // required: "Description is required",
            },
        },
        submitHandler: function (form) {
            // var form_data = new FormData(form)
            $("#medic_add_update_form button[type='submit']").attr('disabled', true);
            $.ajax({
                url: $(form).attr("action"),
                type: 'POST',
                data: new FormData(form),
                processData: false,
                dataType: 'json',
                contentType: false,
                beforeSend: function () {
                    $(".loader").show();
                },
                complete: function () {
                    $(".loader").hide();
                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function (response) {
                    if (response.success) {
                        $.notify(response.message, {
                            type: 'success'
                        });
                        $("#medic_btn").html('Update');
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
            $("#medic_add_update_form button[type='submit']").attr('disabled', false);
        }
    });
});
