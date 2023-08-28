
$("form[name='terms_and_condition_form']").on('submit', function (e) {
    e.preventDefault();
}).validate({
    debug: false,
    ignore: [],
    rules: {
        sub_title: {
            required: true,
            nospecialchar:true,
        },
        description: {
            required: true,
        },
    },
    messages: {
        sub_title: {
            required: "Title is required",
        },
        description: {
            required: "Description is required",
        },
    },
    submitHandler: function (form) {
        var form_data = $(form).serialize();
        $("#terms_and_condition_form button[type='submit']").attr('disabled', true);
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
                    window.location.href = base_url + '/admin/terms_and_condition';
                }
                else if (!response.success) {
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
        $("#terms_and_condition_form button[type='submit']").attr('disabled', false);
    }
});


$("form[name='edit_terms_and_condition_form']").on('submit', function (e) {
    e.preventDefault();
}).validate({
    ignore: [],
    debug: false,
    rules: {
        sub_title: {
            required: true,
            nospecialchar:true,
        },
        description: {
            required: true,
        },
    },
    messages: {
        sub_title: {
            required: "Title is required",
        },
        description: {
            required: "Description is required",
        },
    },
    submitHandler: function (form) {
        var form_data = $(form).serialize();
        $("#edit_terms_and_condition_form button[type='submit']").attr('disabled', true);
        $.ajax({
            url: $(form).attr("action"),
            type: 'PUT',
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
                    window.location.href = base_url + '/admin/terms_and_condition';
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
        $("#edit_terms_and_condition_form button[type='submit']").attr('disabled', false);
    }
});