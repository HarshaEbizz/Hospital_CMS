$("form[name='add_floor_plan']").on('submit', function (e) {
    e.preventDefault();
}).validate({
    debug: false,
    ignore: [],
    rules: {
        "floor_id": {
            required: true,
        },
        "wing_id": {
            required: true,
        },
        "section_ids[]": {
            required: true,
        }
    },
    messages: {
        "floor_id": {
            required: "Please select floor",
        },
        "wing_id": {
            required: "Please select wing",
        },
        "section_ids[]": {
            required: "Please select sections",
        }
    },
    submitHandler: function (form) {
        var formData = new FormData(form);
        $("#add_floor_plan button[type='submit']").attr('disabled', true);
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
                    $("#addFloorPlan").modal('hide');
                    $('#add_floor_plan').trigger("reset");
                    $('#floor_plan_table').DataTable().ajax.reload(null, false);
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
        $("#add_floor_plan button[type='submit']").attr('disabled', false);
    }
});

$("form[name='update_floor_plan']").on('submit', function (e) {
    e.preventDefault();
}).validate({
    rules: {
        "section_ids[]": {
            required: true,
        }
    },
    messages: {
        "section_ids[]": {
            required: "Please select sections",
        },
    },
    submitHandler: function (form) {
        var formData = new FormData(form);
        $("#update_floor_plan button[type='submit']").attr('disabled', true);
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
                    $("#updateFloorPlan").modal('hide');
                    $('#update_floor_plan').trigger("reset");
                    $('#floor_plan_table').DataTable().ajax.reload(null, false);
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
        $("#update_floor_plan button[type='submit']").attr('disabled', false);
    }
});

$(document).ready(function () {
    //$("#section_ids").chosen();
    $('#floor_plan_table').DataTable({
        processing: true,
        serverSide: true,
        responsive: true,
        destroy: true,
        "order": [],
        ajax: {
            url: base_url + '/admin/floor_plans/list',
            type: "POST",
            data: {}
        },
        columns: [
            {
                data: 'DT_RowIndex',
                orderable: false,
                searchable: false
            },
            { data: 'floor_title' },
            { data: 'wing_title' },
            {
                data: 'section_ids',
                searchable: false,
                orderable: false,
            },
            {
                data: 'actions',
                orderable: false,
                searchable: false
            },
        ]
    });
    $("#section_ids").chosen({ width: "100%", placeholder_text_multiple: "Select Section(s)", disable_search: false });
    $('#addFloorPlan').on('shown.bs.modal', function (e) {
        $("#section_ids").trigger("chosen:updated");
        $('<li><i class="fa fa-angle-down" /></li>').css({ position: "absolute", right: "10px", top: "5px" }).appendTo('ul.chosen-choices');
    })
});

$(document).on('click', '.edit_plan', function (e) {
    e.preventDefault();
    // var id = $(this).val();
    let link = this;
    $.ajax({
        // url: base_url+"/admin/floor_plans/"+id,
        url: link.href,
        type: "GET",
        success: function (res) {
            $("#update_floor_plan #edit_floor_plan_id").val(res.data.id);
            $("#update_floor_plan #edit_floor_id").val(res.data.floor_id);
            $("#update_floor_plan #edit_wing_id").val(res.data.wing_id);
            //$("#update_floor_plan #edit_section_ids").val([(res.data.section_ids).split(",")]);
            $("#update_floor_plan #edit_section_ids option").prop("selected", "");
            $.each((res.data.section_ids).split(","), function (i, val) {
                $("#update_floor_plan #edit_section_ids option[value='" + val + "']").prop("selected", true);
            })
            $("#edit_section_ids").chosen({ width: "100%" });
            $("#edit_section_ids").trigger("chosen:updated");
            $('<li><i class="fa fa-angle-down" /></li>').css({ position: "absolute", right: "10px", top: "5px" }).appendTo('ul.chosen-choices');

            // $("#edit_section_ids").chosen();
            $("#updateFloorPlan").modal('show');


        }
    })
});

$(document).on('click', '.delete_plan', function (e) {
    e.preventDefault();
    let link = this;
    swal({
        title: `Are you sure you want to delete this record?`,
        text: "If you delete this, it will be gone forever.",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        allowOutsideClick: false
    })
        .then((willDelete) => {
            if (willDelete) {
                id = this.value;
                $.ajax({
                    type: 'DELETE',
                    // url: base_url + '/admin/floor_plans/' + id,
                    url: link.href,
                    success: function (response) {
                        if (response.success) {
                            $.notify(response.message, {
                                type: 'success'
                            });
                            $('#floor_plan_table').DataTable().ajax.reload(null, false)
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

        }).catch(swal.noop);
});
