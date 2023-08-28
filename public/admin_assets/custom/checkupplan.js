// $('select[name="sub_test_type[]"]').chosen({ width: "100%", disable_search: false });

// $(document).on('change', 'select[name="test_type[]"]', function(){
// // $('select[name="test_type[]"]').on('change', function () {
//     var testid = $(this).val();
//     var id = $(this).attr('data-id');
//     if (testid) {
//         $.ajax({
//             url: base_url + '/admin/get_subtest/' + testid,
//             type: "GET",
//             dataType: "json",
//             beforeSend: function () { $('#sub_test_type_' + id).empty(); },
//             success: function (data) {
//                 $('#sub_test_type_' + id).empty();
//                 $.each(data, function (key, value) {
//                     $('#sub_test_type_' + id).append('<option value=" ' + value.id + '">' + value.test_name + '</option>');
//                 })
//                 $('#sub_test_type_' + id).chosen({ width: "100%", disable_search: false });
//                 $('#sub_test_type_' + id).trigger("chosen:updated");
//                 // $("#sub_test_type").trigger("liszt:updated");
//             }
//         })
//     } else {
//         $('#sub_test_type_' + testid).empty();
//     }
// });
// $(document).on('click', '#add_test_type', function (e) {
//     e.preventDefault();
//     console.log($(".box").length);
//     var i = $(".box").length;
//     // i++;
//     $.ajax({
//         type: 'GET',
//         url: base_url + '/admin/add_test_field/' + i,
//         success: function (response) {
//             $("#add_test_box").append(response.html);
//             $('#sub_test_type_' + i).chosen({ width: "100%", disable_search: false });

//             $('#sub_test_type_' + i).trigger("chosen:updated");
//         }
//     });
    // var data = '<div class="col-lg-12 box video_card_' + i + '" ><div class="row"><div class="col-6"><div class="mb-3"><label for="video_caption" class="form-label">Video caption</label><input type="text" class="form-control" id="video_caption_' + i + '" name="video_caption[]" value="" /></div></div><div class="col-5"><div class="mb-3"><label for="video_url" class="form-label">Video url</label><input type="text" class="form-control" id="video_url_' + i + '" name="video_url[]" value="" /></div></div><div class="col-1"><div class="" style="margin: 0;position: absolute;top: 50%;-ms-transform: translateY(-50%);transform: translateY(-50%);"><button type="button" class="btn btn-danger btn-icon-text delete_video" id="delete" data-id="' + i + '"> <i class="fa fa-solid fa-trash"></i></button></div></div></div></div>'
//     // $("#add_test_box").append(data);
// });
// $(document).on('click', '.delete_test', function (e) {
//     e.preventDefault();
//     value = $(this).attr('data-id')
//     $(".test_box_" + value).remove();
// });

$('select[name="test_type[]"]').chosen({ width: "100%", disable_search: false });
$('<li><i class="fa fa-angle-down" /></li>').css({position: "absolute", right: "10px", top: "5px" }).appendTo('ul.chosen-choices');
$("form[name='add_checkup_plan_form']").on('submit', function (e) {
    e.preventDefault();
}).validate({
    debug: false,
    ignore: [],
    rules: {
        "name": {
            required: true,
            nospecialchar:true,
        },
        "price": {
            required: true,
            number: true,
        },
        "file": {
            required: true,
            extension: 'jpg|jpeg|png',
        },
        "test_type[]": {
            required: true,
        },
        // "sub_test_type[]": {
        //     required: true,
        // }
    },
    messages: {
        "name": {
            required: "Plan name is required.",
        },
        "price": {
            required: "Price is required.",
            number: "Only Digits",
        },
        "file": {
            required: "File is required.",
            extension: "Please upload file in these format only (jpg, jpeg, png,gif).",
        },
        "test_type[]": {
            required: "Select test type.",
        },
        // "sub_test_type[]": {
        //     required: "select sub test type",
        // }
    },
    submitHandler: function (form) {
        var formData = new FormData(form);
        $("#add_checkup_plan_form button[type='submit']").attr('disabled', true);
        $.ajax({
            url: $(form).attr("action"),
            type: 'post',
            data: formData,
            processData: false,
            cache: false,
            contentType: false,
            success: function (response) {
                if (response.success) {
                    $.notify(response.message, {
                        type: 'success'
                    });
                    window.location.href = base_url + '/admin/health_checkup_plan';
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
        $("#add_checkup_plan_form button[type='submit']").attr('disabled', false);
    }
});

$("form[name='edit_checkup_plan_form']").on('submit', function (e) {
    e.preventDefault();
}).validate({
    debug: false,
    ignore: [],
    rules: {
        "name": {
            required: true,
            nospecialchar:true,
        },
        "price": {
            required: true,
            number: true,
        },
        "file": {
            extension: 'jpg|jpeg|png',
        },
        "test_type[]": {
            required: true,
        },
        // "sub_test_type[]": {
        //     required: true,
        // }
    },
    messages: {
        "name": {
            required: "Plan name is required.",
        },
        "price": {
            required: "Price is required.",
            number: "Only Digits",
        },
        "file": {
            extension: "Please upload file in these format only (jpg, jpeg, png,gif).",
        },
        "test_type[]": {
            required: "Select test type.",
        },
        // "sub_test_type[]": {
        //     required: "select sub test type",
        // }
    },
    submitHandler: function (form) {
        var formData = new FormData(form);
        $("#edit_checkup_plan_form button[type='submit']").attr('disabled', true);
        $.ajax({
            url: $(form).attr("action"),
            type: 'post',
            data: formData,
            beforeSend: function () {
                $(".loader").show();
            },
            complete: function () {
                $(".loader").hide();
            },
            processData: false,
            cache: false,
            contentType: false,
            success: function (response) {
                if (response.success) {
                    $.notify(response.message, {
                        type: 'success'
                    });
                    window.location.href = base_url + '/admin/health_checkup_plan';
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
        $("#edit_checkup_plan_form button[type='submit']").attr('disabled', false);
    }
});

$(document).ready(function () {
    $('.plan_list').DataTable({
        processing: true,
        serverSide: true,
        responsive: true,
        destroy: true,
        "order": [],
        ajax: {
            url: base_url + '/admin/health_checkup_plan/list',
            type: 'post',
            data: {},
        },
        "initComplete": function (settings, json) {
            $('.tgl').bootstrapToggle()
        },
        columns: [{
            data: 'DT_RowIndex',
            orderable: false,
            searchable: false
        },
        {
            data: 'name',
            name: 'name'
        },
        {
            data: 'price',
            name: 'price'
        },
        {
            data: 'status',
            name: 'status',
            orderable: false,
            searchable: false
        },
        {
            data: 'actions',
            orderable: false,
            searchable: false
        },
        ]
    });
});

$(document).on('change', '.status_btn', function (e) {
    e.preventDefault();
    id = this.value;
    $.ajax({
        type: 'GET',
        url: base_url + '/admin/health_checkup_plan/status/' + id,
        "initComplete": function (settings, json) {
            $('.tgl').bootstrapToggle()
        },
        success: function (response) {
            $.notify(response.message, {
                type: 'success'
            });
            // $('.faq_table').DataTable().ajax.reload(null, false)
        }
    });
});

$(document).on('click', '.delete_plan', function (e) {
    e.preventDefault();
    let link = this;
    swal({
        title: `Are you sure you want to delete this record?`,
        text: "If you delete this, it will be gone forever.",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    })
        .then((willDelete) => {
            if (willDelete) {
                id = this.value;
                $.ajax({
                    type: 'DELETE',
                    // url: base_url + '/admin/health_checkup_plan/' + id,
                    url: link.href,
                    success: function (response) {
                        if (response.success) {
                            $.notify(response.message, {
                                type: 'success'
                            });
                            $('.plan_list').DataTable().ajax.reload(null, false)
                            $('.tgl').bootstrapToggle()
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
            }
        });

});

$(document).on('change', '#file', function (event) {
    event.preventDefault();
    var file = event.target.files[0];
    var fileName = event.target.files[0].name;
    var filesAmount = event.target.files.length;
    var Extension = fileName.substring(
        fileName.lastIndexOf('.') + 1).toLowerCase();
    if (Extension == "gif" || Extension == "png" || Extension == "bmp" || Extension == "jpeg" || Extension == "jpg") {
        if (file) {
            if (filesAmount <= 2) {
                return true;
            } else {
                this.value = "";
                $.notify('You can select only 2 images.', {
                    type: 'danger'
                });
            }

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
