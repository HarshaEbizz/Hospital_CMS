$(document).ready(function () {
    $('.faq_table').DataTable({
        processing: true,
        serverSide: true,
        responsive: true,
        destroy: true,
        "order": [],
        ajax: {
            url: base_url + '/admin/faq/list',
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
            data: 'question',
            name: 'question'
        },
        {
            data: 'answer',
            name: 'answer'
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

$("form[name='add_faq_from']").on('submit', function (e) {
    e.preventDefault();
}).validate({
    rules: {
        question: {
            required: true,
            nospecialchar:true,
        },
        answer: {
            required: true,
        },
    },
    messages: {
        question: {
            required: "Question is required",
        },
        answer: {
            required: "Answer is required",
        },
    },
    submitHandler: function (form) {
        var form_data = $(form).serialize();
        $("#add_faq_from button[type='submit']").attr('disabled', true);
        $.ajax({
            url: $(form).attr("action"),
            type: 'post',
            data: form_data,
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
                    $("#add_faq_modal").modal('hide');
                    $('#add_faq_from').trigger("reset");
                    $('.faq_table').DataTable().ajax.reload(null, false)
                    $('.tgl').bootstrapToggle()
                } else if (!response.success) {
                    $.notify(response.message, {
                        type: 'danger'
                    });
                }  else {
                    $.notify('Something went wrong', {
                        type: 'danger'
                    });
                }
            }
        });
        $("#add_faq_from button[type='submit']").attr('disabled', false);
    }
});

$(document).on('click', '.edit_faq', function (e) {
    e.preventDefault();
    // id = this.value;
    let link = this;
    $.ajax({
        type: 'GET',
        // url: base_url + '/admin/faq/' + id + '/edit',
        url: link.href,
        success: function (data) {
            $("#edit_faq_model").modal('show');
            let elem = document.getElementById('edit_faq_form');
            elem.setAttribute("action", base_url + '/admin/faq/' + data.id)
            elem.setAttribute("data_id", data.id)
            document.getElementById("edit_question").value = data.question
            document.getElementById("edit_answer").value = data.answer
            if (data.is_show == "1") {
                // $('#edit_is_show').prop('checked', true);
                $('#edit_is_show').parent().removeClass("btn-danger off");
                $('#edit_is_show').parent().addClass("btn-success");
            }
            else {
                // $('#edit_is_show').prop('checked', false);
                $('#edit_is_show').parent().removeClass("btn-success");
                $('#edit_is_show').parent().addClass("btn-danger off");
            }
        }
    });
});

// $(document).on('click', '.view_faq', function(e) {
//     e.preventDefault();
//     id = this.value;
//     $.ajax({
//         type: 'GET',
//         url: base_url +'/admin/faq/view_faq/' + id,
//         success: function(data) {
//             console.log(data);
//             $("#view_faq_model").modal('show');
//             document.getElementById("view_question").value = data.question
//             document.getElementById("view_answer").value = data.answer
//             if (data.is_show == "1") {
//                 $('#view_is_show').prop('checked', true);
//             }
//             else {
//                 $('#view_is_show').prop('checked', false);
//             }
//         }
//     });
// });

$("form[name='edit_faq_form']").on('submit', function (e) {
    e.preventDefault();
}).validate({
    rules: {
        edit_question: {
            required: true,
            nospecialchar:true,
        },
        edit_answer: {
            required: true,
        },
    },
    messages: {
        edit_question: {
            required: "Question is required",
        },
        edit_answer: {
            required: "Answer is required",
        },
    },
    submitHandler: function (form) {
        var form_data = $(form).serialize();
        $("#edit_faq_form button[type='submit']").attr('disabled', true);
        $.ajax({
            url: $(form).attr("action"),
            type: 'post',
            data: form_data,
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
                    $("#edit_faq_model").modal('hide');
                    $('.faq_table').DataTable().ajax.reload(null, false)
                    $('.tgl').bootstrapToggle()
                }else if (!response.success) {
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
        $("#edit_faq_form button[type='submit']").attr('disabled', false);
    }
});

$(document).on('change', '.status_btn', function (e) {
    e.preventDefault();
    id = this.value;
    $.ajax({
        type: 'GET',
        url: base_url + '/admin/faq/status/' + id,
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

$(document).on('click', '.delete_faq', function (e) {
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
                    // url: base_url + '/admin/faq/' + id,
                    url: link.href,
                    success: function (response) {
                        if (response.success) {
                            $.notify(response.message, {
                                type: 'success'
                            });
                            $('.faq_table').DataTable().ajax.reload(null, false)
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
