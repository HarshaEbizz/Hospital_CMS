
create_ck_editor(document.getElementById("description"), "description");

var defaultFields = $('#get_form_details').val();

if (defaultFields != undefined) {
    var container = document.getElementById("form_bulider_data");
    var defaultFields = JSON.parse($('#get_form_details').val())

    var options = {
        defaultFields,
    };

    var formBuilder1 = $(container).formBuilder(options);
}
else {
    var fbEditor = document.getElementById('form_bulider_data');
    var formBuilder1 = $(fbEditor).formBuilder();
}

$("form[name='add_event_form']").on('submit', function (e) {
    e.preventDefault();
}).validate({
    debug: false,
    ignore: [],
    rules: {
        event_title: {
            required: true,
            normalizer: function (value) {
                return $.trim(value);
            },
        },
        event_type: {
            required: true,
        },
        event_banner: {
            extension: "jpg|jpeg|png|ico|bmp|gif|svg"
        },
        document: {
            extension: "jpg|jpeg|png|ico|bmp|gif|svg|pdf"
        },
    },
    messages: {
        event_title: {
            required: "Event title is required",
            maxlength: "Event title is too big",
        },
        event_type: {
            // required: "Select Department",
        },
        event_banner: {
            extension: "File not supported Valid image - jpg, jpeg, png, ico, bmp, gif, svg"
        },
        document: {
            extension: "File not supported Valid image - jpg, jpeg, png, ico, bmp, gif, svg, pdf"
        },
    },
    submitHandler: function (form) {
        // var event_title = $('#event_title').val();
        // var event_type = $('#event_type').val();
        // var event_banner = $('#event_banner').val();
        // var description = $('#description').val();
        // var document = $('#document').val();
        // var mobile_no = $('#mobile_no').val();
        // console.log(formBuilder1);
        var formData = new FormData(form);
        formData.append('form_details', formBuilder1.formData);
        $("#add_event_form button[type='submit']").attr('disabled', true);
        $.ajax({
            url: $(form).attr("action"),
            type: 'POST',
            data: formData,
            // data: new FormData(form),
            // data:  {
            //     'event_title': event_title,
            //     'event_type': event_type,
            //     'event_banner': event_banner,
            //     'form_details': formBuilder1.formData,
            //     'description': description,
            //     'document': document,
            //     'mobile_no': mobile_no
            // },
            processData: false,
            cache: false,
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
                    window.location.href = base_url + '/admin/event';
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
        $("#add_event_form button[type='submit']").attr('disabled', false);
    }
});

$("form[name='update_event_form']").on('submit', function (e) {
    e.preventDefault();
}).validate({
    debug: false,
    ignore: [],
    rules: {
        event_title: {
            required: true,
            nospecialchar:true,
            normalizer: function (value) {
                return $.trim(value);
            },
        },
        event_type: {
            required: true,
        },
        event_banner: {
            extension: "jpg|jpeg|png|ico|bmp|gif|svg"
        },
        document: {
            extension: "jpg|jpeg|png|ico|bmp|gif|svg|pdf"
        },
    },
    messages: {
        event_title: {
            // required: "First Name is required",
            maxlength: "First Name is too big",
        },
        event_type: {
            // required: "Select Department",
        },
        event_banner: {
            extension: "File not supported Valid image - jpg, jpeg, png, ico, bmp, gif, svg"
        },
        document: {
            extension: "File not supported Valid image - jpg, jpeg, png, ico, bmp, gif, svg, pdf"
        },
    },
    submitHandler: function (form) {
        var formData = new FormData(form);
        formData.append('form_details', formBuilder1.formData);
        $("#update_event_form button[type='submit']").attr('disabled', true);
        $.ajax({
            url: $(form).attr("action"),
            type: 'POST',
            data: formData,
            processData: false,
            cache: false,
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
                    // $("#update_doctor_profile_popup").modal('hide');
                    // $('.doctor_profile_list').DataTable().ajax.reload(null, false)
                    window.location.href = base_url + '/admin/event';
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
        $("#update_event_form button[type='submit']").attr('disabled', false);
    }
});

$(document).ready(function () {
    let table = $('.event_list');
    /*console.log(table);*/
    document.dataTable = table.DataTable({
        dom: 'Bfrtp',
        processing: false,
        serverSide: true,
        responsive: true,
        destroy: true,
        "order": [],
        fnCreatedRow: function (nRow, data, iDataIndex) {
            $(nRow).attr("id", data.id);
        },
        ajax: {
            url: base_url + '/admin/event/event_list',
            type: 'post'
        },
        columns: [{
            data: 'DT_RowIndex',
            orderable: false,
            searchable: false
        },
        {
            data: 'event_title',
        },
        {
            data: 'event_type',
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

    table.on('click', '.activate-link', function (e) {
        e.preventDefault();
        let link = this;

        swal({
            title: "Are you sure?",
            text: link.getAttribute('data-title'),
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
            .then((result) => {
                if (result) {
                    $.ajax({
                        url: link.href,
                        type: 'post',
                        dataType: 'json',
                        success: function (response) {
                            if (response.success) {
                                $.notify(response.message, { type: 'success' });
                                document.dataTable.draw();
                            } else if (!response.success) {
                                $.notify(response.message, { type: 'danger' });
                            } else {
                                $.notify(response.message, { type: 'danger' });
                            }
                        },
                        error: function (response) {
                            let errors = response.responseJSON.errors;

                            if (errors) {
                                $.notify(Object.values(errors)[0], { type: 'danger' });
                            }
                        }
                    })
                }
            });
    })

    table.on('click', '.delete-link', function (e) {
        e.preventDefault();
        let link = this;

        swal({
            title: "Are you sure?",
            text: "You won't be able to revert this!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
            .then((result) => {
                if (result) {
                    $.ajax({
                        url: link.href,
                        type: 'delete',
                        dataType: 'json',
                        success: function (response) {
                            if (response.success) {
                                $.notify(response.message, { type: 'success' });
                                document.dataTable.draw();
                            } else if (!response.success) {
                                $.notify(response.message, { type: 'danger' });
                            } else {
                                $.notify('Something went wrong', { type: 'danger' });
                            }
                        },
                        error: function (response) {
                            let errors = response.responseJSON.errors;

                            if (errors) {
                                $.notify(Object.values(errors)[0], { type: 'danger' });
                            }
                        }
                    })
                }
            });

    });

    $(document).on('change', '#event_banner', function (event) {
        event.preventDefault();
        // console.log("cover");
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

    $(document).on('change', '#document', function (event) {
        event.preventDefault();
        // console.log("cover");
        var file = event.target.files[0];
        var fileName = event.target.files[0].name;
        // alert(fileName)
        var Extension = fileName.substring(
            fileName.lastIndexOf('.') + 1).toLowerCase();
        if (Extension == "jpg" || Extension == "jpeg" || Extension == "png" || Extension == "pdf") {
            if (file) {
                if (Extension == "jpg" || Extension == "jpeg" || Extension == "png") {
                    var image_element_name = '#' + $(this).attr('id');
                    image_crop(image_element_name);
                    $('#document_viewer').remove();
                } else {
                    let reader = new FileReader();
                    reader.onload = function (event) {
                       document.getElementById('document_viewer').style.display = "block";
                       $('#document_viewer').attr('src', event.target.result);
                    }
                    reader.readAsDataURL(file);
                }
            }
        } else {
            this.value = "";
            $.notify('Photo only allows file types of PNG, JPG, JPEG and PDF. ', {
                type: 'danger'
            });
        }
    });

});

$("#tablecontents").sortable({
    items: "tr",
    cursor: "move",
    opacity: 0.6,
    update: function () {
        sendOrderToServer();
    },
});
function sendOrderToServer() {
    var order = [];
    $("tr").each(function (index, element) {
        if ($(this).attr("id")) {
            order.push({
                id: $(this).attr("id"),
                position: index + 1,
            });
        }
    });
    $.ajax({
        type: "POST",
        dataType: "json",
        url: base_url + "/admin/event/order",
        data: {
            order: order,
        },
        success: function (response) {
            if (response.success) {
                $.notify(response.message, {
                    type: "success",
                });
            } else {
                $.notify("Something went wrong", {
                    type: "danger",
                });
            }
        },
    });
}
$(document).on('change', '.status_btn', function (e) {
    e.preventDefault();
    id = this.value;
    $.ajax({
        type: 'POST',
        url: base_url + '/admin/event/' + id + '/activate/toggle',
        "initComplete": function (settings, json) {
            $('.tgl').bootstrapToggle()
        },
        success: function (response) {
            $.notify(response.message, {
                type: 'success'
            });
        }
    });
});

$(document).ajaxComplete(function () {
    $('input[type=checkbox][data-toggle^=toggle]').bootstrapToggle();
});
