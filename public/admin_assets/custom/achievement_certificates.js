$("form[name='add_certificate_form']").on('submit', function (e) {
    e.preventDefault();
}).validate({
    rules: {
        "certificate_title": {
            required: true,
            nospecialchar:true,
        },
        "certificate_image": {
            required: true,
            extension: "jpg|jpeg|png",
        }
    },
    messages: {
        "certificate_title": {
            required: "Please enter certificate title",
        },
        "certificate_image": {
            required: "Please select image",
            extension: "Please select only images"
        },
    },
    submitHandler: function (form) {
        var formData = new FormData(form);
        $("#add_certificate_form button[type='submit']").attr('disabled', true);
        $.ajax({
            url: $(form).attr("action"),
            type: 'post',
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
            success: function (response) {
                if (response.success) {
                    $.notify(response.message, {
                        type: 'success'
                    });
                    $("#addCertificateModal").modal('hide');
                    $('#add_certificate_form').trigger("reset");
                    $('#certificate-table').DataTable().ajax.reload(null, false);
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
        $("#add_certificate_form button[type='submit']").attr('disabled', false);
    }
});
$("form[name='edit_certificate_form']").on('submit', function (e) {
    e.preventDefault();
}).validate({
    rules: {
        "certificate_title": {
            required: true,
            nospecialchar:true,
        },
        "certificate_image": {
            extension: "jpg|jpeg|png",
        }
    },
    messages: {
        "certificate_title": {
            required: "Please enter certificate title",
        },
        "certificate_image": {
            extension: "Please select only images"
        },
    },
    submitHandler: function (form) {
        var formData = new FormData(form);
        $("#edit_certificate_form button[type='submit']").attr('disabled', true);
        $.ajax({
            url: $(form).attr("action"),
            type: 'post',
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
            success: function (response) {
                if (response.success) {
                    $.notify(response.message, {
                        type: 'success'
                    });
                    $("#updateCertificateModal").modal('hide');
                    $('#edit_certificate_form').trigger("reset");
                    $('#certificate-table').DataTable().ajax.reload(null, false);
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
        $("#edit_certificate_form button[type='submit']").attr('disabled', false);
    }
});
$(document).ready(function() {
    $('#certificate-table').DataTable({
        processing: true,
        serverSide: true,
        responsive: true,
        destroy: true,
        "order": [],
        ajax: {
            url: base_url + '/admin/home/certificates/list',
            type: 'post',
            data: {},
        },
        fnCreatedRow: function (nRow, data, iDataIndex) {
            $(nRow).attr("id", data.id);
        },
        columns: [{
                data: 'DT_RowIndex',
                orderable: false,
                searchable: false
            },
            {
                data: 'certificate_title',
                name: 'certificate_title'
            },
            {
                data: 'image',
                name: 'image',
                orderable: false,
                searchable: false
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
        url: base_url + "/admin/home/certificates/order",
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
        type: 'GET',
        url: base_url + '/admin/home/certificates/status/' + id,
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

$(document).on('click', '.delete_image', function (e) {
    e.preventDefault();
    let link = this;
    swal({
        title: `Are you sure you want to delete this image?`,
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
                // url: base_url + '/admin/home/certificates/' + id,
                url: link.href,
                success: function (response) {
                    if (response.success) {
                        $.notify(response.message, {
                            type: 'success'
                        });
                        $('#certificate-table').DataTable().ajax.reload(null, false)
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

$(document).on('click', '.edit_image', function (e) {
    e.preventDefault();
    // var id = $(this).val();
    var id = $(this).attr("data-id");
    $.ajax({
        url: base_url+"/admin/home/certificates/"+id,
        type: "GET",
        success: function(res){
            $("#edit_certificate_form #edit_certificate_id").val(res.data.id);
            $("#edit_certificate_form #edit_certificate_title").val(res.data.certificate_title);
            $("#edit_certificate_form #edit_detail").val(res.data.detail);
            $("#edit_certificate_form .certificate_img_preview").attr("src",base_url.replace("/public","")+"/storage/"+res.data.image_path+res.data.image_name);
            $("#updateCertificateModal").modal('show');

        }
    })
});
$(document).ajaxComplete(function () {
    $('input[type=checkbox][data-toggle^=toggle]').bootstrapToggle();
});

$(document).on('change', '#certificate_image', function (event) {
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

$(document).on('change', '#edit_certificate_image', function (event) {
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
