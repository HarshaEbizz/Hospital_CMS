$("form[name='add_section_form']").on('submit', function (e) {
    e.preventDefault();
}).validate({
    rules: {
        "section_name": {
            required: true,
            nospecialchar:true,
        }
    },
    messages: {
        "section_name": {
            required: "Please enter section name",
        },
    },
    submitHandler: function (form) {
        var formData = new FormData(form);
        $("#add_section_form button[type='submit']").attr('disabled', true);
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
                    $("#addSectionModal").modal('hide');
                    $('#add_section_form').trigger("reset");
                    $('#section-table').DataTable().ajax.reload(null, false);
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
        $("#add_section_form button[type='submit']").attr('disabled', false);
    }
});

$("form[name='edit_section_form']").on('submit', function (e) {
    e.preventDefault();
}).validate({
    rules: {
        "section_name": {
            required: true,
            nospecialchar:true,
        }
    },
    messages: {
        "section_name": {
            required: "Please enter section name",
        },
    },
    submitHandler: function (form) {
        var formData = new FormData(form);
        $("#edit_section_form button[type='submit']").attr('disabled', true);
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
                    $("#updateSectionModal").modal('hide');
                    $('#edit_section_form').trigger("reset");
                    $('#section-table').DataTable().ajax.reload(null, false);
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
        $("#edit_section_form button[type='submit']").attr('disabled', false);
    }
});

$(document).ready(function() {
    $('#section-table').DataTable({
        processing: true,
        serverSide: true,
        responsive: true,
        destroy: true,
        "order": [],
        ajax: {
            url: base_url + '/admin/sections/list',
            type: 'post',
            data: {},
        },
        columns: [{
                data: 'DT_RowIndex',
                orderable: false,
                searchable: false
            },
            {
                data: 'section_name',
                name: 'section_name '
            },
            {
                data: 'actions',
                orderable: false,
                searchable: false
            },
        ]
    });
});

$(document).on('click', '.edit_section', function (e) {
    e.preventDefault();
    // var id = $(this).val();
    let link = this;
    $.ajax({
        // url: base_url+"/admin/sections/"+id,
        url: link.href,
        type: "GET",
        success: function(res){
            $("#edit_section_form #edit_section_id").val(res.data.id);
            $("#edit_section_form #edit_section_name").val(res.data.section_name);
            $("#updateSectionModal").modal('show');

        }
    })
});

$(document).on('click', '.delete_section', function (e) {
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
                // url: base_url + '/admin/sections/' + id,
                url: link.href,
                success: function (response) {
                    if (response.success) {
                        $.notify(response.message, {
                            type: 'success'
                        });
                        $('#section-table').DataTable().ajax.reload(null, false)
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
