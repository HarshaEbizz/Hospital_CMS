$(document).ready(function () {
    $("#expertise_textarea").html('');
    $("#expertise_textarea").html('<textarea class="form-control" placeholder="Message " id="expertise" name="expertise" style="height: 100px"></textarea>');
    create_ck_editor(document.getElementById("expertise"), "expertise");
    $("#professional_highlight_textarea").html('');
    $("#professional_highlight_textarea").html('<textarea class="form-control" placeholder="Message " id="professional_highlight" name="professional_highlight" style="height: 100px"></textarea>');
    create_ck_editor(document.getElementById("professional_highlight"), "professional_highlight");
    $("#edit_expertise_textarea").html('');
    $("#edit_expertise_textarea").html('<textarea class="form-control" placeholder="Message " id="edit_expertise" name="edit_expertise" style="height: 100px"></textarea>');
    create_ck_editor(document.getElementById("edit_expertise"), "edit_expertise", $('#expertise_data').val());
    $("#edit_professional_highlight_textarea").html('');
    $("#edit_professional_highlight_textarea").html('<textarea class="form-control" placeholder="Message " id="edit_professional_highlight" name="edit_professional_highlight" style="height: 100px"></textarea>');
    create_ck_editor(document.getElementById("edit_professional_highlight"), "edit_professional_highlight", $('#professional_highlights_data').val());
});
$("form[name='management_person_form']").on('submit', function (e) {
    e.preventDefault();
}).validate({
    rules: {
        debug: false,
        name: {
            required: true,
            // validname: true,
            normalizer: function (value) {
                return $.trim(value);
            },
        },
        designation: {
            required: true,
        },
        management_photo: {
            required: true,
            extension: "jpg|jpeg|png|ico|bmp|jfif"
        },
        // expertise: {
        //     required: true,
        // },
        // professional_highlights: {
        //     required: true,
        // },
        message: {
            required: true,
        },
    },
    messages: {
        name: {
            required: "Name is required",
        },
        designation: {
            required: "Designation is required",
        },
        management_photo: {
            required: "Please upload photo.",
            extension: "Please upload file in these format only (jpg, jpeg, png, ico, bmp,jfif)."
        },
        // expertise: {
        //     required: "Expertise is required",
        // },
        // professional_highlights: {
        //     required: "Professional Highlights is required",
        // },
        message: {
            required: "Message is required",
        },
    },
    submitHandler: function (form) {
        var form_data = new FormData(form);
        $("#management_person_form button[type='submit']").attr('disabled', true);
        $.ajax({
            url: $(form).attr("action"),
            type: 'post',
            data: form_data,
            contentType: false,
            processData: false,
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
                    window.location.href = base_url + '/admin/about_us';
                }else if (!response.success) {
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
        $("#management_person_form button[type='submit']").attr('disabled', false);
    }
});

$("form[name='edit_management_person_form']").on('submit', function (e) {
    e.preventDefault();
}).validate({
    rules: {
        debug: false,
        edit_name: {
            required: true,
            // validname: true,
            normalizer: function (value) {
                return $.trim(value);
            },
        },
        edit_designation: {
            required: true,
        },
        edit_management_photo: {
            extension: "jpg|jpeg|png|ico|bmp|jfif"
        },
        // edit_expertise: {
        //     required: true,
        // },
        // edit_professional_highlight: {
        //     required: true,
        // },
        edit_message: {
            required: true,
        },
    },
    messages: {
        edit_name: {
            required: "Name is required",
        },
        edit_designation: {
            required: "Designation is required",
        },
        edit_management_photo: {
            extension: "Please upload file in these format only (jpg, jpeg, png, ico, bmp,jfif)."
        },
        // edit_expertise: {
        //     required: "Expertise is required",
        // },
        // edit_professional_highlight: {
        //     required: "Professional Highlights is required",
        // },
        edit_message: {
            required: "Message is required",
        },
    },
    submitHandler: function (form) {
        var form_data = new FormData(form);
        $("#edit_management_person_form button[type='submit']").attr('disabled', true);
        $.ajax({
            url: $(form).attr("action"),
            type: 'post',
            data: form_data,
            contentType: false,
            processData: false,
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
                    window.location.href = base_url + '/admin/about_us';
                } else if (!response.success) {
                    $.notify(response.message, {
                        type: 'danger'
                    });
                }else {
                    $.notify('Something went wrong', {
                        type: 'danger'
                    });
                }
            }
        });
        $("#edit_management_person_form button[type='submit']").attr('disabled', false);
    }
});


$(document).on('change', '#management_photo', function (event) {
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

$(document).on('change', '#edit_management_photo', function (event) {
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
