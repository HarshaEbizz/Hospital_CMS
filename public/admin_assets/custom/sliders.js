$("form[name='add_slider_form']")
    .on("submit", function (e) {
        e.preventDefault();
    })
    .validate({
        rules: {
            "slider_image[]": {
                required: true,
                extension: "jpg|jpeg|png",
            },
        },
        messages: {
            "slider_image[]": {
                required: "Please select image(s)",
                extension: "Please select only images",
            },
        },
        submitHandler: function (form) {
            var formData = new FormData(form);
            const totalImages = $("#slider_image")[0].files.length;
            var images = $("#slider_image")[0];

            for (var i = 0; i < totalImages; i++) {
                formData.append("slider_image" + i, images.files[i]);
            }
            formData.append("totalImages", totalImages);
            $("#add_slider_form button[type='submit']").attr("disabled", true);
            $.ajax({
                url: $(form).attr("action"),
                type: "post",
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
                            type: "success",
                        });
                        $("#addSliderModal").modal("hide");
                        $("#add_slider_form").trigger("reset");
                        $("#slider-table").DataTable().ajax.reload(null, false);
                        $(".tgl").bootstrapToggle();
                    } else if (!response.success) {
                        $.notify(response.message, {
                            type: "danger",
                        });
                    } else {
                        $.notify("Something went wrong", {
                            type: "danger",
                        });
                    }
                },
            });
            $("#add_slider_form button[type='submit']").attr("disabled", false);
        },
    });
$(document).ready(function () {
    $("#slider-table").DataTable({
        processing: true,
        serverSide: true,
        responsive: true,
        destroy: true,
        // searching: false,
        // draggable: true,
        "order": [],
        ajax: {
            url: base_url + "/admin/home/slider/list",
            type: "post",
            data: {},
        },
        initComplete: function (settings, json) {
            $(".tgl").bootstrapToggle();
        },
        fnCreatedRow: function (nRow, data, iDataIndex) {
            $(nRow).attr("id", data.id);
        },
        columns: [
            {
                data: "DT_RowIndex",
                orderable: false,
                searchable: false,
            },
            {
                data: "image",
                name: "image",
                orderable: false,
                searchable: false,
            },
            {
                data: "is_show_register",
                name: "is_show_register",
                orderable: false,
                searchable: false,
            },
            {
                data: "status",
                name: "status",
                orderable: false,
                searchable: false,
            },
            {
                data: "actions",
                orderable: false,
                searchable: false,
            },
        ],
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
        url: base_url + "/admin/home/slider/order",
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
$(document).on("change", ".status_btn", function (e) {
    e.preventDefault();
    id = this.value;
    $.ajax({
        type: "GET",
        url: base_url + "/admin/home/slider/status/" + id,
        initComplete: function (settings, json) {
            $(".tgl").bootstrapToggle();
        },
        success: function (response) {
            $.notify(response.message, {
                type: "success",
            });
            // $('.faq_table').DataTable().ajax.reload(null, false)
        },
    });
});

$(document).on("click", ".delete_image", function (e) {
    e.preventDefault();
    let link = this;
    swal({
        title: `Are you sure you want to delete this image?`,
        text: "If you delete this, it will be gone forever.",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    }).then((willDelete) => {
        if (willDelete) {
            id = this.value;
            $.ajax({
                type: "DELETE",
                // url: base_url + '/admin/home/slider/' + id,
                url: link.href,
                success: function (response) {
                    if (response.success) {
                        $.notify(response.message, {
                            type: "success",
                        });
                        $("#slider-table").DataTable().ajax.reload(null, false);
                        $(".tgl").bootstrapToggle();
                    } else if (!response.success) {
                        $.notify(response.message, {
                            type: "danger",
                        });
                    } else {
                        $.notify("Something went wrong", {
                            type: "danger",
                        });
                    }
                },
            });
        }
    });
});
$(document).on("change", ".register_status_btn", function (e) {
    e.preventDefault();
    var id = this.value;
    $.ajax({
        type: "GET",
        url: base_url + "/admin/home/slider/register_status/" + id,
        initComplete: function (settings, json) {
            $(".tgl").bootstrapToggle();
        },
        success: function (response) {
            $.notify(response.message, {
                type: "success",
            });
            // $('.faq_table').DataTable().ajax.reload(null, false)
        },
    });
});
$(document).on("change", "#slider_image", function (event) {
    event.preventDefault();
    console.log("cover");
    var file = event.target.files[0];
    var fileName = event.target.files[0].name;
    var Extension = fileName
        .substring(fileName.lastIndexOf(".") + 1)
        .toLowerCase();
    if (
        Extension == "gif" ||
        Extension == "png" ||
        Extension == "bmp" ||
        Extension == "jpeg" ||
        Extension == "jpg" ||
        Extension == "svg"
    ) {
        if (file) {
            // var image_element_name = '#' + $(this).attr('id');
            // image_crop(image_element_name);
        }
    } else {
        this.value = "";
        $.notify(
            "Photo only allows file types of GIF, PNG, JPG, JPEG and BMP. ",
            {
                type: "danger",
            }
        );
    }
});
$(document).ajaxComplete(function () {
    $("input[type=checkbox][data-toggle^=toggle]").bootstrapToggle();
});
