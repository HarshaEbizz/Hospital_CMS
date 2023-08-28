create_ck_editor(document.getElementById("rights"), "rights");
create_ck_editor(document.getElementById("responsibilities"), "responsibilities");

$("form[name='patients_responsibilities_form']").on('submit', function (e) {
    e.preventDefault();
}).validate({
    debug: false,
    ignore: [],
    rules: {
        heading: {
            required: true,
            nospecialchar:false,
        },
        title: {
            required: true,
            nospecialchar:false,
        },
        cover_image: {
            extension: 'jpg|jpeg|png|gif',
        },
        image: {
            extension: 'jpg|jpeg|png|gif',
        },
        rights: {
            required: true,
        },
        responsibilities: {
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
        cover_image: {
            extension: 'Please upload file in these format only (jpg, jpeg, png,gif).',
        },
        image: {
            extension: "Please upload file in these format only (jpg, jpeg, png,gif).",
        },
        rights: {
            required: "Patient Rights is reequired",
        },
        responsibilities: {
            required: "Patient Responsibilities is reequired",
        },
    },
    submitHandler: function (form) {
        var form_data = new FormData(form);
        $("#patients_responsibilities_form button[type='submit']").attr('disabled', true);
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
                    // window.location.href = base_url + '/admin/specialities';
                } else {
                    $.notify('Something went wrong', {
                        type: 'danger'
                    });
                }
            }
        });
        $("#patients_responsibilities_form button[type='submit']").attr('disabled', false);
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