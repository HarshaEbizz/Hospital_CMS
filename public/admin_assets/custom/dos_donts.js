create_ck_editor(document.getElementById("do"), "do_");
create_ck_editor(document.getElementById("donts"), "donts");

function DescriptionCkEditor(count) {
    create_ck_editor(document.getElementById("description_" + count), "description")
};
$(document).ready(function () {
    defineCKEditor();
});

function defineCKEditor() {
    if (document.getElementsByClassName("content_description").length > 0) {
        var CKEclassName = document.getElementsByClassName("content_description");
        for (var i = 0; i <= CKEclassName.length; ++i) {
            create_ck_editor(CKEclassName[i], "content_description");
        }
    }
}

$("form[name='dos_donts_form']").on('submit', function (e) {
    e.preventDefault();
}).validate({
    debug: false,
    ignore: [],
    rules: {
        heading: {
            required: true,
        },
        title: {
            required: true,
            nospecialchar:true,
        },
        cover_image: {
            extension: 'jpg|jpeg|png|gif',
        },
        do: {
            required: true,
        },
        donts: {
            required: true,
        },
        'subtitle[]': {
            required: true,
            nospecialchar:true,
        },
        'description[]': {
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
        do: {
            required: "Do's is reequired",
        },
        donts: {
            required: "Don'ts is reequired",
        },
        'subtitle[]': {
            required: "Sub title is required.",
        },
        'description[]': {
            required: "Description is required.",
        },
    },
    submitHandler: function (form) {
        var form_data = new FormData(form);
        $("#dos_donts_form button[type='submit']").attr('disabled', true);
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
                    //window.location.href = base_url + '/admin/specialities';
                } else {
                    $.notify('Something went wrong', {
                        type: 'danger'
                    });
                }
            }
        });
        $("#dos_donts_form button[type='submit']").attr('disabled', false);
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
var i = 0;
$(document).on('click', '#add_content', function (e) {
    e.preventDefault();
    i++;
    $.ajax({
        type: 'GET',
        url: base_url + '/admin/dos_donts/content/' + i,
        success: function (response) {
            $("#add_content_inputs").append(response.html);
            DescriptionCkEditor(i);
        }
    });
});
$(document).on('click', '.delete_box', function (e) {
    e.preventDefault();
    value = $(this).attr('data_id');
    $("#content_card_" + value).remove();
});
$(document).on('click', '.delete_box_content', function (e) {
    e.preventDefault();
    swal({
        title: `Are you sure you want to delete this record?`,
        text: "If you delete this, it will be gone forever.",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    })
        .then((willDelete) => {
            if (willDelete) {
                id = $(this).attr('data_id');
                $.ajax({
                    type: 'GET',
                    url: base_url + '/admin/dos_donts/content/delete/' + id,
                    "initComplete": function (settings, json) {
                        $('.tgl').bootstrapToggle()
                    },
                    success: function (response) {
                        if (response.success) {
                            $.notify(response.message, {
                                type: 'success'
                            });
                            console.log($("#content_card_" + id));
                            $("#content_card_" + id).remove();
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

