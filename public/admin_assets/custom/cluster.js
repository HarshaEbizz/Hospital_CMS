$("#addClusterModal").on('hidden.bs.modal', function() {
    $("#add_cluster_form").trigger("reset");
 });

$(document).ready(function () {
    $('#cluster_table').DataTable({
        processing: false,
        serverSide: true,
        responsive: true,
        destroy: true,
        "order": [],
        ajax: {
            url: base_url + '/admin/cluster/list',
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
            data: 'cluster',
            name: 'cluster',
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

$("form[name='add_cluster_form']").on('submit', function (e) {
    e.preventDefault();
}).validate({
    rules: {
        "cluster": {
            required: true,
            nospecialchar:true,
        }
    },
    messages: {
        "cluster": {
            required: "Please enter cluster title",
        },
    },
    submitHandler: function (form) {
        var formData = new FormData(form);
        $("#add_cluster_form button[type='submit']").attr('disabled',true);
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
                    $("#addClusterModal").modal('hide');
                    $('#add_cluster_form').trigger("reset");
                    $('#cluster_table').DataTable().ajax.reload(null, false);
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
        $("#add_cluster_form button[type='submit']").attr('disabled',false);
    }
});

$(document).on('click', '.edit_cluster', function (e) {
    e.preventDefault();
    id = $(this).attr("data-id");
    // console.log(id);
    $.ajax({
        type: 'GET',
        url: base_url + '/admin/cluster/' + id + '/edit',
        success: function (data) {
            $("#editClusterModal").modal('show');
            let elem = document.getElementById('edit_cluster_form');
            elem.setAttribute("action", base_url + '/admin/cluster/' + data.id)
            elem.setAttribute("data_id", data.id)
            document.getElementById("edit_cluster").value = data.cluster
        }
    });
});

$("form[name='edit_cluster_form']").on('submit', function (e) {
    e.preventDefault();
}).validate({
    rules: {
        "edit_cluster": {
            required: true,
            nospecialchar:true,
        }
    },
    messages: {
        "edit_cluster": {
            required: "Please enter cluster title",
        },
    },
    submitHandler: function (form) {
        var formData = new FormData(form);
        $("#edit_cluster_form button[type='submit']").attr('disabled',true);
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
                    $("#editClusterModal").modal('hide');
                    $('#edit_cluster_form').trigger("reset");
                    $('#cluster_table').DataTable().ajax.reload(null, false);
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
        $("#edit_cluster_form button[type='submit']").attr('disabled',false);
    }
});

$(document).on('change', '.status_btn', function (e) {
    e.preventDefault();
    id = this.value;
    $.ajax({
        type: 'GET',
        url: base_url + '/admin/cluster/status/' + id,
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

$(document).on('click', '.delete_cluster', function (e) {
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
                    url: link.href,
                    success: function (response) {
                        if (response.success) {
                            $.notify(response.message, {
                                type: 'success'
                            });
                            $('#cluster_table').DataTable().ajax.reload(null, false)
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

$(document).ajaxComplete(function() {
    $('input[type=checkbox][data-toggle^=toggle]').bootstrapToggle();
});


