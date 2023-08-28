$(document).ready(function () {
    $(".setting_list").DataTable({
        processing: true,
        serverSide: true,
        responsive: true,
        destroy: true,
        "order": [],
        ajax: {
            url: base_url + "/admin/setting/list",
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
                data: "setting_key",
                name: "setting key",
            },
            {
                data: "setting_value",
                name: "setting value",
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
 $("#add_setting").on('hidden.bs.modal', function() {
    $("#add_setting_from").trigger("reset");
 });
$("form[name='add_setting_from']")
    .on("submit", function (e) {
        e.preventDefault();
    })
    .validate({
        rules: {
            setting_key: {
                required: true,
                nospecialchar: true,
            },
            setting_value: {
                required: true,
            },
        },
        messages: {
            setting_key: {
                required: "Key is required",
            },
            setting_value: {
                required: "Value is required",
            },
        },
        submitHandler: function (form) {
            var form_data = $(form).serialize();
            $("#add_setting_from button[type='submit']").attr("disabled", true);
            $.ajax({
                url: $(form).attr("action"),
                type: "post",
                data: form_data,
                beforeSend: function () {
                    $(".loader").show();
                },
                complete: function () {
                    $(".loader").hide();
                },
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                        "content"
                    ),
                },
                success: function (response) {
                    if (response.success) {
                        $.notify(response.message, {
                            type: "success",
                        });
                        $("#add_setting").modal("hide");
                        $("#add_setting_from").trigger("reset");
                        $(".setting_list").DataTable().ajax.reload(null, false);
                        $(".tgl").bootstrapToggle();
                    } else {
                        $("#add_setting").modal("hide");
                        $.notify("Something went wrong", {
                            type: "danger",
                        });
                    }
                },
            });
            $("#add_setting_from button[type='submit']").attr(
                "disabled",
                false
            );
        },
    });
$(document).on("click", ".edit_setting", function (e) {
    e.preventDefault();
    // id = this.value;
    let link = this;
    $.ajax({
        type: "GET",
        // url: base_url + '/admin/setting/' + id + '/edit',
        url: link.href,
        success: function (data) {
            $("#edit_setting_model").modal("show");
            let elem = document.getElementById("edit_setting_form");
            elem.setAttribute("action", base_url + "/admin/setting/" + data.id);
            elem.setAttribute("data_id", data.id);
            document.getElementById("setting_key_edit").value =
                data.setting_key;
            document.getElementById("setting_value_edit").value =
                data.setting_value;
        },
    });
});

$(document).on("change", ".status_btn", function (e) {
    e.preventDefault();
    id = this.value;
    $.ajax({
        type: "GET",
        url: base_url + "/admin/setting/status/" + id,
        initComplete: function (settings, json) {
            $(".tgl").bootstrapToggle();
        },
        success: function (response) {
            $.notify(response.message, {
                type: "success",
            });
        },
    });
});

$("form[name='edit_setting_form']")
    .on("submit", function (e) {
        e.preventDefault();
    })
    .validate({
        rules: {
            setting_key: {
                required: true,
                nospecialchar: true,
            },
            setting_value: {
                required: true,
            },
        },
        messages: {
            setting_key: {
                required: "Key is required",
            },
            setting_value: {
                required: "Value is required",
            },
        },
        submitHandler: function (form) {
            console.log("here");
            var form_data = $(form).serialize();
            $("#edit_setting_form button[type='submit']").attr(
                "disabled",
                true
            );
            $.ajax({
                url: $(form).attr("action"),
                type: "post",
                data: form_data,
                beforeSend: function () {
                    $(".loader").show();
                },
                complete: function () {
                    $(".loader").hide();
                },
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                        "content"
                    ),
                },
                success: function (response) {
                    if (response.success) {
                        $.notify(response.message, {
                            type: "success",
                        });
                        $("#edit_setting_model").modal("hide");
                        $(".setting_list").DataTable().ajax.reload(null, false);
                        $(".tgl").bootstrapToggle();
                    } else {
                        $.notify("Something went wrong", {
                            type: "danger",
                        });
                    }
                },
            });
            $("#edit_setting_form button[type='submit']").attr(
                "disabled",
                false
            );
        },
    });

$(document).on("click", ".delete_setting", function (e) {
    e.preventDefault();
    let link = this;
    swal({
        title: `Are you sure you want to delete this record?`,
        text: "If you delete this, it will be gone forever.",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    }).then((willDelete) => {
        if (willDelete) {
            id = this.value;
            $.ajax({
                type: "DELETE",
                // url: base_url + '/admin/setting/' + id,
                url: link.href,
                success: function (response) {
                    if (response.success) {
                        $.notify(response.message, {
                            type: "success",
                        });
                        $(".setting_list").DataTable().ajax.reload(null, false);
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

$(document).on("click", ".hospital_logo", function (e) {
    id = this.id;
    $.ajax({
        type: "GET",
        url: base_url + "/admin/setting/" + id + "/edit",
        success: function (data) {
            console.log(data);
            $("#hospital_logo_modal").modal("show");
            let elem = document.getElementById("update_logo_from");
            elem.setAttribute("action", base_url + "/admin/setting/" + data.id);
            elem.setAttribute("data_id", data.id);
            $("#update_logo_from .img_preview").attr("src", base_url.replace("/public", "") + "/storage/" + data.setting_value);
            if (data.status == "1") {
                $('#status').parent().removeClass("btn-danger off");
                $('#status').parent().addClass("btn-success");
            }
            else {
                $('#status').parent().removeClass("btn-success");
                $('#status').parent().addClass("btn-danger off");
            }
        },
    });
});


$("form[name='update_logo_from']")
    .on("submit", function (e) {
        e.preventDefault();
    })
    .validate({
        rules: {
            logo: {
                extension: "jpg|jpeg|png",
            },
        },
        messages: {
            logo: {
                extension: "Please select valid image",
            },
        },
        submitHandler: function (form) {
            var form_data = new FormData(form);
            $("#update_logo_from button[type='submit']").attr(
                "disabled",
                true
            );
            $.ajax({
                url: $(form).attr("action"),
                type: "post",
                data: form_data,
                beforeSend: function () {
                    $(".loader").show();
                },
                complete: function () {
                    $(".loader").hide();
                },
                contentType: false,
                processData: false,
                success: function (response) {
                    if (response.success) {
                        $.notify(response.message, {
                            type: "success",
                        });
                        $("#hospital_logo_modal").modal("hide");
                    } else {
                        $.notify("Something went wrong", {
                            type: "danger",
                        });
                    }
                },
            });
            $("#update_logo_from button[type='submit']").attr(
                "disabled",
                false
            );
        },
    });

$(document).ajaxComplete(function () {
    $("input[type=checkbox][data-toggle^=toggle]").bootstrapToggle();
});
