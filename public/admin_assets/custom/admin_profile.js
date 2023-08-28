$("form[name='profile_form']").on('submit', function (e) {
    e.preventDefault();
}).validate({
    rules: {
        first_name: {
            required: true,
            maxlength: 30,
            validname: true,
        },
        last_name: {
            required: true,
            maxlength: 30
        },
        image: {
            extension: "jpg|jpeg|png",
        },
        email: {
            required: true,
            email: true
        },
    },
    messages: {
        first_name: {
            required: "First Name is required",
            maxlength: "First Name is too big",
        },
        last_name: {
            required: "Last Name is required",
            maxlength: "Last Name is too big",
        },
        image: {
            extension: "Select valid Image",
        },
        email: {
            required: "Email is required",
            email: "Please enter a valid email address."
        },
    },
    submitHandler: function (form) {
        var form_data = new FormData(form)
        $("#profile_form button[type='submit']").attr('disabled', true);
        $.ajax({
            url: $(form).attr("action"),
            type: 'post',
            data: form_data,
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
                    setTimeout(() => {
                        window.location.reload();
                    }, 2000);

                } else {
                    $.notify('Something went wrong', {
                        type: 'danger'
                    });
                }
            }
        });
        $("#profile_form button[type='submit']").attr('disabled', false);
    }
});

$("form[name='update_password_form']").on('submit', function (e) {
    e.preventDefault();
}).validate({
    rules: {
        current_password: {
            required: true,
        },
        new_password: {
            required: true,
            minlength: 6,
        },
        new_password_confirmation: {
            required: true,
            equalTo: "#new_password"
        },
    },
    messages: {
        current_password: {
            required: "Current password is required",
        },
        new_password: {
            required: "New Password is required",
            minlength: "Password must be at least 6 characters",
        },
        new_password_confirmation: {
            required: "Confirm password is required",
            equalTo: "Password and confirm password don't match."
        },
    },
    submitHandler: function (form) {
        var form_data = new FormData(form)
        $("#update_password_form button[type='submit']").attr('disabled', true);
        $.ajax({
            url: $(form).attr("action"),
            type: 'post',
            data: form_data,
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
                    $("form[name='update_password_form']").trigger('reset');
                } else {
                    $.notify(response.message, {
                        type: 'danger'
                    });
                }
            }
        });
        $("#update_password_form button[type='submit']").attr('disabled', false);
    }
});

$(document).on('change', '#file', function (event) {
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

$(document).on('click', '.delete_photo', function (event) {
    event.preventDefault();
    console.log(this);
    $.ajax({
        type: 'GET',
        url: base_url + '/admin/profile_photo/remove',
        success: function (data) {
            $(".profilr_pic").attr('src','../admin_assets/images/logo_avtar.png')
        }
    });
});