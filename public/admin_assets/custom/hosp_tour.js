var heading = $.trim($('#heading').val());
var bottom_heading = $.trim($('#bottom_heading').val());
var top_video_obj = {};
var bottom_video_obj = {}
for (var i = 1; i <= $('[name="video_caption[]"]').length; i++) {
    top_video_obj['video_caption_' + i] = $.trim($('#video_caption_' + i).val());
    top_video_obj['video_url_' + i] = $.trim($('#video_url_' + i).val());
}
for (var i = 1; i <= $('[name="bottom_video_caption[]"]').length; i++) {
    bottom_video_obj['bottom_video_caption_' + i] = $.trim($('#bottom_video_caption_' + i).val());
    bottom_video_obj['bottom_video_url_' + i] = $.trim($('#bottom_video_url_' + i).val());
}
$('input[type="file"]').change(function () {
    if ($(this).val() != '') {
        $(':button[type="submit"]').prop('disabled', false);
    }
});

$('form').each(function () {
    $(this).data('serialized', $(this).serialize())
})
    .on('keyup input', function (e) {

        if (e.key === ' ' || e.key === 'Spacebar') {
            $(this).find('input:submit, button:submit').attr('disabled', true)
            return false;
        } else if (heading != $.trim($('#heading').val())) {
            $(this).find('input:submit, button:submit').attr('disabled', false)
        } else if (bottom_heading != $.trim($('#bottom_heading').val())) {
            $(this).find('input:submit, button:submit').attr('disabled', false)
        } else {
            for (var i = 1; i <= $('[name="video_caption[]"]').length; i++) {
                if (top_video_obj['video_caption_' + i] != $.trim($('#video_caption_' + i).val())) {
                    $(this).find('input:submit, button:submit').attr('disabled', false)
                    return false;
                }
                if (top_video_obj['video_url_' + i] != $.trim($('#video_url_' + i).val())) {
                    $(this).find('input:submit, button:submit').attr('disabled', false)
                    return false;
                }
            }
            for (var i = 1; i <= $('[name="bottom_video_caption[]"]').length; i++) {
                if (bottom_video_obj['bottom_video_caption_' + i] != $.trim($('#bottom_video_caption_' + i).val())) {
                    $(this).find('input:submit, button:submit').attr('disabled', false)
                    return false;
                }
                if (bottom_video_obj['bottom_video_url_' + i] != $.trim($('#bottom_video_url_' + i).val())) {
                    $(this).find('input:submit, button:submit').attr('disabled', false)
                    return false;
                }
            }
            $(this).find('input:submit, button:submit').attr('disabled', true)
        }
    }).find('input:submit, button:submit').attr('disabled', true);

function valid_input() {
    var html = '';
    var is_valid = true;
    $("[name='video_caption[]']").each(function () {
        if ($(this).val() == '') {
            html = '<label id="' + $(this).attr('id') + '-error" class="error" for="' + $(this).attr('id') + '" style="">Video Caption is required.</label>'
            $(this).parent().append(html);
            is_valid = false;
            return false;
        }
    });
    $("[name='bottom_video_caption[]']").each(function () {
        if ($(this).val() == '') {
            html = '<label id="' + $(this).attr('id') + '-error" class="error" for="' + $(this).attr('id') + '" style="">Video Caption is required.</label>'
            $(this).parent().append(html);
            is_valid = false;
            return false;
        }
    });
    $("[name='video_url[]']").each(function () {
        if ($(this).val() == '') {
            html = '<label id="' + $(this).attr('id') + '-error" class="error" for="' + $(this).attr('id') + '" style="">Video url required.</label>'
            $(this).parent().append(html);
            is_valid = false;
            return false;
        }
    });
    $("[name='bottom_video_url[]']").each(function () {
        if ($(this).val() == '') {
            html = '<label id="' + $(this).attr('id') + '-error" class="error" for="' + $(this).attr('id') + '" style="">Video url required.</label>'
            $(this).parent().append(html);
            is_valid = false;
            return false;
        }
    });
    return is_valid;
}
$("form[name='hosp_tour_form']").on('submit', function (e) {
    e.preventDefault();
}).validate({
    // debug: false,
    ignore: [],
    rules: {
        heading: {
            required: true,
            nospecialchar: true,
        },
        cover_image: {
            extension: 'jpg|jpeg|png|gif',
        },
        'bottom_heading': {
            required: true,
            nospecialcharnumber: true,
        },
        'video_caption[]': {
            required: true,
        },
        'bottom_video_caption[]': {
            required: true,
        },
        'video_url[]': {
            required: true,
            video_url: true,
        },
        'bottom_video_url[]': {
            required: true,
            video_url: true,
        },
    },
    messages: {
        heading: {
            required: "Heading is required",
        },
        cover_image: {
            required: "Cover Image is required.",
            extension: 'Please upload file in these format only (jpg, jpeg, png,gif).',
        },
        'bottom_heading': {
            required: "Bottom heading is required",
        },
        'video_caption[]': {
            required: "Video Caption is required.",
        },
        'bottom_video_caption[]': {
            required: "Video Caption is required.",
        },
        'video_url[]': {
            required: "Video url required.",
            video_url: "Enter valid youtube video url",
        },
        'bottom_video_url[]': {
            required: true,
            video_url: "Enter valid youtube video url",
        },
    },
    submitHandler: function (form) {
        var form_data = new FormData(form);
        $("#hosp_tour_form button[type='submit']").attr('disabled', true);
        console.log("s");
        if (valid_input()) {
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
                        // window.location.href = base_url + '/admin/specialities';
                    } else {
                        $.notify('Something went wrong', {
                            type: 'danger'
                        });
                    }
                }
            });
        }
        $("#hosp_tour_form button[type='submit']").attr('disabled', false);
    }
});

$(document).on('click', '#add_Video', function (e) {
    e.preventDefault();
    console.log($(".box").length);
    var i = $(".box").length;
    i++;
    var data = '<div class="col-lg-12 box video_card_' + i + '" ><div class="row"><div class="col-6"><div class="mb-3"><label for="video_caption" class="form-label">Video caption</label><input type="text" class="form-control" id="video_caption_' + i + '" name="video_caption[]" value="" required/></div></div><div class="col-5"><div class="mb-3"><label for="video_url" class="form-label">Video url</label><input type="text" class="form-control" id="video_url_' + i + '" name="video_url[]" value="" required/></div></div><div class="col-1"><div class="" style="margin: 0;position: absolute;top: 50%;-ms-transform: translateY(-50%);transform: translateY(-50%);"><button type="button" class="btn btn-danger btn-icon-text delete_video" id="delete" data-id="' + i + '"> <i class="fa fa-solid fa-trash"></i></button></div></div></div></div>'
    $("#add_Video_inputs").append(data);
});
$(document).on('click', '#add_bottom_video', function (e) {
    e.preventDefault();
    // console.log($(".bottom_box").length);
    var i = $(".bottom_box").length;
    i++;
    var data = '<div class="col-lg-12 bottom_box video_card_' + i + '" ><div class="row"><div class="col-6"><div class="mb-3"><label for="bottom_video_caption_' + i + '" class="form-label">Video caption</label><input type="text" class="form-control" id="bottom_video_caption_' + i + '" name="bottom_video_caption[]" value="" required/></div></div><div class="col-5"><div class="mb-3"><label for="video_url" class="form-label">Video url</label><input type="text" class="form-control" id="bottom_video_url_' + i + '" name="bottom_video_url[]" value="" required/></div></div><div class="col-1"><div class="" style="margin: 0;position: absolute;top: 50%;-ms-transform: translateY(-50%);transform: translateY(-50%);"><button type="button" class="btn btn-danger btn-icon-text delete_bottom_video" data-id="' + i + '"> <i class="fa fa-solid fa-trash"></i></button></div></div></div></div>'
    $("#add_bottom_video_inputs").append(data);
});
$(document).on('click', '.delete_video', function (e) {
    e.preventDefault();
    value = $(this).attr('data-id')
    $(".video_card_" + value).remove();
});
$(document).on('click', '.delete_bottom_video', function (e) {
    e.preventDefault();
    value = $(this).attr('data-id')
    $(".video_card_" + value).remove();
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
$(document).on('change', '#bottom_cover_image', function (event) {
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
