
$(document).ready(function () {
    defineCKEditor();
});
function defineCKEditor() {
    if (document.getElementsByClassName("content_details").length > 0) {
        var CKEclassName = document.getElementsByClassName("content_details");
        for (var i = 0; i <= CKEclassName.length; ++i) {
            create_ck_editor(CKEclassName[i], "content_details");
        }
    }
}

function DetailsCkEditor(count) {
    create_ck_editor(document.getElementById("details_" + count), "details")
};
function DetailscontentCkEditor(count) {
    create_ck_editor(document.getElementById("only_content_" + count), "only_content")
};

var i = -1;
$(document).on('click', '#add_content', function (e) {
    console.log(i);
    console.log("in");
    $(".content_card").each(function () {
        if ((($(this).hasClass('dyna_con')))) {
            console.log("in");
            i++;
        } else {
            console.log("out");
            $i = 0;
        }
    });
    //  i = ($('.content_card').length)+1;
    console.log(i);
    var content_type = $('#content_type').val();
    var chk_class = $("div").hasClass("specialiti_img_section");
    var chk_multipal_class = $("div").hasClass("multipal_img_section");
    var slug = $('#slug').val();
    // alert(chk_multipal_class)
    if (content_type != null) {
        var exist_content_image = false;
        $(".content_card").each(function () {
            if ($(this).data('id') == 'image_content' || $(this).data('id') == 'image') {
                exist_content_image = true;
            }
        });
        if (chk_class == false || content_type == 'content' || slug == 'pathology_blood_bank' || slug == 'radiology') {
            $('#add_content').attr('disabled','true');
            e.preventDefault();
            i++;
            $.ajax({
                type: 'GET',
                url: base_url + '/admin/specialities/content/' + i + '/' + content_type,
                // url: base_url + '/admin/specialities/content/' + i + '/' + content_type + '/' + specialities_id,
                success: function (response) {
                    $.notify("New box added at bottom !!", {
                        type: 'primary'
                    });
                    $("#add_content_inputs").append(response.html);
                    $('#add_content').removeAttr('disabled');
                    if (content_type == 'content' || content_type == 'image_content') {
                        DetailsCkEditor(i);
                    }
                    if(content_type == 'image_content'){
                        $('.testing').each(function(i){
                            var val = i;
                            $(this).closest('.row').find("input[class^='form-control content_image testing']").first().attr("id",'image_'+val);
                            $(this).closest('.row').find("input[class^='form-control content_image testing']").first().attr("data_id",+val);
                            $(this).closest('.row').find("input[class^='hello_test']").first().attr("id",'image_'+val+'_url');
                            $(this).closest('.row').find("input[class^='hello_test']").first().attr("name",'image_'+val+'_url');
                        });
                    }
                }
            });
        }else{
            $.notify("Sorry.. You can select only one time image !!", {
                type: 'danger'
            });
        }
    } else {
        $.notify("Please select content type first", {
            type: 'danger'
        });
    }

    // // if(chk_multipal_class == false && content_type == 'multipal_image'){
        // //     alert("1");
        // //     test()
        // // }else if (chk_class == false || content_type == 'content') {
        // //  if ((chk_class == false || content_type == 'content') || (chk_multipal_class == false && content_type == 'multipal_image')) {
        //  if ((chk_class == false || content_type == 'content')) {
        //     e.preventDefault();
        //     i++;
        //     $.ajax({
        //         type: 'GET',
        //         // url: base_url + '/admin/specialities/content/' + i + '/' + content_type,
        //         url: base_url + '/admin/specialities/content/' + i + '/' + content_type + '/' + specialities_id,
        //         success: function (response) {
        //             $("#add_content_inputs").prepend(response.html);
        //             if (content_type == 'content' || content_type == 'image_content') {
        //                 DetailsCkEditor(i);
        //             }
        //             // if(specialities_id != 0){
        //             //     test()
        //             // }
        //         }
        //     });
        // }else
        // // if(chk_multipal_class == true){
        //     $.notify("Sorry.. You can select only one time image OR you can select Multipal image option.", {
        //         type: 'danger'
        //     });
        // // }else {
        // //     // alert("Sorry.. You can select only one image")
        // //     $.notify("Sorry.. You can select only one time image OR you can select Multipal image option.", {
        // //         type: 'danger'
        // //     });
        // // }
});
// function Add_form() {
$("form[name='add_specialities_form']").on('submit', function (e) {
    e.preventDefault();
}).validate({
    debug: false,
    ignore: [],
    rules: {
        name: {
            required: true,
        },
        'top_cover_image': {
            required: true,
            extension: 'jpg|jpeg|png|gif',
        },
        'bottom_cover_image': {
            // required: true,
            extension: 'jpg|jpeg|png|gif',
        },
        'title[]': {
            required: true,
        },
        'details[]': {
            required: true,
        },
        'image': {
            required: true,
            extension: 'jpg|jpeg|png|gif',
        },
    },
    messages: {
        name: {
            required: "Specialities Name is required",
        },
        'top_cover_image': {
            required: "Top banner image is required",
            extension: "Please upload file in these format only (jpg, jpeg, png,gif).",
        },
        'bottom_cover_image': {
            // required: "Bottom Banner Image is required",
            extension: "Please upload file in these format only (jpg, jpeg, png,gif).",
        },
        'title[]': {
            required: "Title is required",
        },
        'details[]': {
            required: "Details is required",
        },
        'image': {
            required: "select image",
            extension: "Please upload file in these format only (jpg, jpeg, png,gif).",
        },
    },
    submitHandler: function (form) {
        // Add_form();
        var form_data = new FormData(form);
        $("#add_specialities_form button[type='submit']").attr('disabled', true);
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
                    window.location.href = base_url + '/admin/specialities';
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
        $("#add_specialities_form button[type='submit']").attr('disabled', false);
    }
});
// }

// function Edit_form() {
$("form[name='edit_specialities_form']").on('submit', function (e) {
    e.preventDefault();
}).validate({
    // ignore: [],
    rules: {
        name: {
            required: true,
        },
        'top_cover_image': {
            extension: 'jpg|jpeg|png|gif',
        },
        'bottom_cover_image': {
            extension: 'jpg|jpeg|png|gif',
        },
        'title[]': {
            required: true,
        },
        'details[]': {
            required: true,
        },
        'image': {
            extension: 'jpg|jpeg|png|gif',
        },
    },
    messages: {
        name: {
            required: "Specialities Name is required",
        },
        'top_cover_image': {
            extension: "Please upload file in these format only (jpg, jpeg, png,gif).",
        },
        'bottom_cover_image': {
            extension: "Please upload file in these format only (jpg, jpeg, png,gif).",
        },
        'title[]': {
            required: "Title is required",
        },
        'details[]': {
            required: "Details is required",
        },
        'image': {
            extension: "Please upload file in these format only (jpg, jpeg, png,gif).",
        },
    },
    submitHandler: function (form) {
        // Edit_form();
        var form_data = new FormData(form);
        $("#edit_specialities_form button[type='submit']").attr('disabled', true);
        $.ajax({
            url: $(form).attr("action"),
            type: 'POST',
            data: form_data,
            contentType: false,
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
                    window.location.href = base_url + '/admin/specialities';
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
        $("#edit_specialities_form button[type='submit']").attr('disabled', true);
    }
});

$(document).on('click', '.delete_box', function (e) {
    e.preventDefault();
    value = $(this).attr('data_id');
    $("#content_card_" + value).remove();

    $('.testing').each(function(i){
        var val = i;
        $(this).closest('.row').find("input[class^='form-control content_image testing']").first().attr("id",'image_'+val);
        $(this).closest('.row').find("input[class^='form-control content_image testing']").first().attr("data_id",+val);
        $(this).closest('.row').find("input[class^='hello_test']").first().attr("id",'image_'+val+'_url');
        $(this).closest('.row').find("input[class^='hello_test']").first().attr("name",'image_'+val+'_url');
    });
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
                console.log(id);
                $.ajax({
                    type: 'GET',
                    url: base_url + '/admin/specialities/content_delete/' + id,
                    "initComplete": function (settings, json) {
                        $('.tgl').bootstrapToggle()
                    },
                    success: function (response) {
                        console.log(response);
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

$(document).on('change', '.content_image', function (e) {
    e.preventDefault();
    var file = event.target.files[0];
    var fileName = e.target.files[0].name;
    var Extension = fileName.substring(
        fileName.lastIndexOf('.') + 1).toLowerCase();
    if (Extension == "gif" || Extension == "png" || Extension == "bmp" || Extension == "jpeg" || Extension == "jpg") {
        if (file) {
            var image_element_name = '#' + $(this).attr('id');
            // console.log(image_element_name);
            image_crop(image_element_name);
            // $('.content_img_'+$(this).attr('data_id')).remove()
        }
    } else {
        this.value = "";
        $.notify('Photo only allows file types of GIF, PNG, JPG, JPEG and BMP. ', {
            type: 'danger'
        });
    }
});
$(document).on('change', '#top_cover_image', function(event) {
    event.preventDefault();
    var file = this.files[0];
    var _URL = window.URL || window.webkitURL;
    var fileName = event.target.files[0].name;
    var Extension = fileName.substring(
        fileName.lastIndexOf('.') + 1).toLowerCase();
    if (Extension == "gif" || Extension == "png" || Extension == "bmp" || Extension == "jpeg" || Extension == "jpg") {
        if (file) {
            if ((file)) {
                img = new Image();
                img.onload = function() {
                    console.log("before image crop  " + this.width + " " + this.height);
                };
                img.src = _URL.createObjectURL(file);
            }
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

$(document).on('change', '#bottom_cover_image', function(event) {
    event.preventDefault();
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
$(document).ajaxComplete(function () {
    $('input[type=checkbox][data-toggle^=toggle]').bootstrapToggle();
});

// $(document).on('change', '.multipal_image_btn', function(e) {
//     if($(this).is(":checked")) {
//         $(".multipal_img_section").show();
//         // test()

//     } else {
//         $(".multipal_img_section").hide();
//     }
// });
