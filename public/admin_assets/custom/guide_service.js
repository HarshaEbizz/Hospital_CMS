create_ck_editor(document.getElementById("description"), "description");
create_ck_editor(document.getElementById("details"), "details");

$("form[name='guide_services_form']").on('submit', function (e) {
    e.preventDefault();
}).validate({
    debug: false,
    ignore: [],
    rules: {
        heading: {
            required: true,
            nospecialcharnumber: true,
        },
        cover_image: {
            required: true,
            extension: 'jpg|jpeg|png|gif',
        },
        title: {
            // required: true,
            nospecialcharnumber: true,
        },
        contact_no: {
            // required: true,
            number: true,
            maxlength: 10,
            minlength: 10,
            normalizer: function (value) {
                return $.trim(value);
            },
        },
        description: {
            // required: true,
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
            required: "Cover image is required.",
            extension: 'Please upload file in these format only (jpg, jpeg, png,gif).',
        },
        title: {
            // required: "Title Name is required",
        },
        contact_no: {
            // required: "Contact number is required",
            // number: "Please enter contact in digits",
        },
        description: {
            // required: "Description is required",
        },
        image: {
            extension: "Please upload file in these format only (jpg, jpeg, png,gif).",
        }
    },
    submitHandler: function (form) {
        var country_code_mobile = $("#contact_no").intlTelInput("getSelectedCountryData").dialCode;
        $("#country_code").val(country_code_mobile);
        var form_data = new FormData(form);
        $("#guide_services_form button[type='submit']").attr('disabled', true);
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
                    window.location.href = base_url + '/admin/patients_guide_service';
                } else if (!response.success) {
                    $.notify(response.message, {
                        type: 'danger'
                    });
                    // window.location.href = base_url + '/admin/patients_guide_service';
                } else {
                    $.notify('Something went wrong', {
                        type: 'danger'
                    });
                }
            }
        });
        $("#guide_services_form button[type='submit']").attr('disabled', false);
    }
});

$("form[name='edit_guide_services_form']").on('submit', function (e) {
    e.preventDefault();
}).validate({
    debug: false,
    ignore: [],
    rules: {
        heading: {
            required: true,
            nospecialcharnumber: true,
        },
        cover_image: {
            extension: 'jpg|jpeg|png|gif',
        },
        title: {
            // required: true,
            nospecialcharnumber: true,
        },
        contact_no: {
            // required: true,
            number: true,
            // maxlength:10,
            // minlength:10,
            normalizer: function (value) {
                return $.trim(value);
            },
        },
        description: {
            // required: true,
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
            // required: "Cover image is required.",
            extension: 'Please upload file in these format only (jpg, jpeg, png,gif).',
        },
        title: {
            // required: "Title Name is required",
        },
        contact_no: {
            // required: "Contact number is required",
            // number: "Please enter contact in digits",
        },
        description: {
            // required: "Description is required",
        },
        image: {
            extension: "Please upload file in these format only (jpg, jpeg, png,gif).",
        }
    },
    submitHandler: function (form) {
        var country_code_mobile = $("#contact_no").intlTelInput("getSelectedCountryData").dialCode;
        $("#country_code").val(country_code_mobile);
        var form_data = new FormData(form);
        $("#edit_guide_services_form button[type='submit']").attr('disabled', true);
        $.ajax({
            url: $(form).attr("action"),
            type: 'POST',
            data: form_data,
            contentType: false,
            cache: false,
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
                    window.location.href = base_url + '/admin/patients_guide_service';
                } else if (!response.success) {
                    $.notify(response.message, {
                        type: 'danger'
                    });
                    // window.location.href = base_url + '/admin/patients_guide_service';
                } else {
                    $.notify('Something went wrong', {
                        type: 'danger'
                    });
                }
            }
        });
        $("#edit_guide_services_form button[type='submit']").attr('disabled', false);
    }
});

$(document).on('change', '#add_content', function (e) {
    e.preventDefault();
    $(".content_card").toggleClass("hide");
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
            // if ((file)) {
            //     var _URL = window.URL || window.webkitURL;
            //     img = new Image();
            //     img.onload = function () {
            //         var height = this.height;
            //         var width = this.width;
            //         if (width >= 1900 && height >= 530) {
            //             // console.log("valid");
            //         } else {
            //             $.notify('Cover image should be greater than 1900px*530px.', {
            //                 type: 'danger'
            //             });
            //             return false;
            //         }
            //         console.log("before image crop  " + this.width + " " + this.height);
            //     };
            //     img.src = _URL.createObjectURL(file);
            // }
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
