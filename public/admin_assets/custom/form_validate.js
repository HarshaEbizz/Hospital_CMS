
$("form[name='login_form']").on('submit', function (e) {
    e.preventDefault();
}).validate({
    rules: {
        login_email: {
            required: true,
            customemail: true,
            noSpace: true,
            normalizer: function (value) {
                return $.trim(value);
            },
        },
        login_password: {
            required: true,
            noSpace: true,
            minlength: 6,
            normalizer: function (value) {
                return $.trim(value);
            },
        },
    },
    messages: {
        login_email: {
            required: "Email is required",
            noSpace: "Email is required",
            customemail: "Please enter a valid email address."
        },
        login_password: {
            required: "Password is required",
            noSpace: "Password is required",
            minlength: "Password must be at least 6 characters",
        },
    },
    submitHandler: function (form) {
        var form_data = $(form).serialize();
        $("#login_form button[type='submit']").attr('disabled', true);
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
                    window.location.href = base_url + '/admin/home';
                    $.notify(response.message, {
                        type: 'success'
                    });
                } else if (!response.success) {
                    $.notify(response.message, {
                        type: 'danger'
                    });
                } else {
                    $.notify('Something went wrong', {
                        type: 'danger'
                    });
                }
            }, fail: function (xhr, status, error) {
                $.each(xhr.responseJSON.errors, function (key, item) {
                    $.notify(item, {
                        type: 'danger'
                    });
                });

            }
        });
        $("#login_form button[type='submit']").attr('disabled', false);
    }
});

$("form[name='change_password_form']").on('submit', function (e) {
    e.preventDefault();
}).validate({
    rules: {
        email: {
            required: true,
            customemail: true,
        },
    },
    messages: {
        email: {
            required: "Email is required",
            customemail: "Please enter a valid email address."
        },
    },
    submitHandler: function (form) {
        var form_data = $(form).serialize();
        $("#change_password_form button[type='submit']").attr('disabled', true);
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
                    setTimeout(function () {
                        window.location.href = base_url + '/admin/login';
                    }, 2000);
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
        $("#change_password_form button[type='submit']").attr('disabled', false);
    }
});

$("form[name='reset_password_form']").on('submit', function (e) {
    e.preventDefault();
}).validate({
    rules: {
        password: {
            required: true,
            minlength: 6,
        },
        confirm_pass: {
            required: true,
            equalTo: "#password"
        },
    },
    messages: {
        password: {
            required: "Password is required",
            minlength: "Password must be at least 6 characters",
        },
        confirm_pass: {
            required: "Confirm password is required",
            equalTo: "Password and confirm password don't match."
        },
    },
    submitHandler: function (form) {
        var form_data = $(form).serialize();
        $("#reset_password_form button[type='submit']").attr('disabled', true);
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
        $("#reset_password_form button[type='submit']").attr('disabled', false);

    }
});


$("form[name='treatment_emergency_form']").on('submit', function (e) {
    e.preventDefault();
}).validate({
    rules: {
        specialities_title: {
            required: true,
            nospecialchar:true,
        },
        emergency_no: {
            required: true,
        },
    },
    messages: {
        specialities_title: {
            required: "Specialities Name is required",
        },
        emergency_no: {
            required: "Emergency no. is required",
        },
    },
    submitHandler: function (form) {
        // var form_data = new FormData(form)
        // $.ajax({
        //     url: $(form).attr("action"),
        //     type: 'post',
        //     data: form_data,
        //     headers: {
        //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        //     },
        //     success: function (res) {
        //         // code...
        //     }
        // });
    }
});

$("form[name='appointment_form']").on('submit', function (e) {
    e.preventDefault();
}).validate({
    rules: {
        first_name: {
            required: true,
            maxlength: 20,
            validname: true,
            normalizer: function (value) {
                return $.trim(value);
            },
        },
        last_name: {
            required: true,
            maxlength: 20,
            validname: true,
            normalizer: function (value) {
                return $.trim(value);
            },
        },
        birth_date: {
            required: true,
        },
        gender: {
            required: true,
        },
        email: {
            required: true,
            customemail: true,
        },
        contact: {
            required: true,
            number: true,
        },
        service: {
            required: true,
        },
        doctor: {
            required: true,
        },
        date: {
            required: true,
        },
        description: {
            required: true,
        },
    },
    messages: {
        first_name: {
            required: "First Name is required",
            maxlength: "First Name can't be more than 20 characters",
            validname: "Please enter valid name.",
        },
        last_name: {
            required: "Last Name is required",
            maxlength: "Last Name can't be more than 20 characters",
            validname: "Please enter valid name.",
        },
        birth_date: {
            required: "Birth day is required",
        },
        gender: {
            required: "Select gender.",
        },
        email: {
            required: "Email is required",
            customemail: "Please enter a valid email address."
        },
        contact: {
            required: "Contact number is required",
            number: "Please enter contact in digits",
        },
        service: {
            required: "Select service",
        },
        doctor: {
            required: "select doctor",
        },
        date: {
            required: "choose date",
        },
        description: {
            required: "Description is required",
        },
    },
    submitHandler: function (form) {
        // var form_data = new FormData(form)
        // $.ajax({
        //     url: $(form).attr("action"),
        //     type: 'post',
        //     data: form_data,
        //     headers: {
        //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        //     },
        //     success: function (res) {
        //         // code...
        //     }
        // });
    }
});

