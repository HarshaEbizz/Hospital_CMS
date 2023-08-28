$(document).ready(function () {
    $.validator.addMethod("customemail",
        function (value, element) {
            return /^\w+([-+.']\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/.test(value);
        },
        "Please enter a valid email address."
    );
    $.validator.addMethod("validname", function (value, element) {
        return /^(\u00a9|\u00ae|[\u2000-\u3300]|\ud83c[\ud000-\udfff]|\ud83d[\ud000-\udfff]|\ud83e[\ud000-\udfff])*?[a-zA-Z]+(([',. -][a-zA-Z ])?[a-zA-Z]?[0-9]*?[a-zA-Z]*?(\u00a9|\u00ae|[\u2000-\u3300]|\ud83c[\ud000-\udfff]|\ud83d[\ud000-\udfff]|\ud83e[\ud000-\udfff])*?[a-zA-Z]?[0-9]*)?(\u00a9|\u00ae|[\u2000-\u3300]|\ud83c[\ud000-\udfff]|\ud83d[\ud000-\udfff]|\ud83e[\ud000-\udfff]|[a-zA-Z]|[0-9])*$/.test(value);
    }, "Please enter valid name");
    $.validator.addMethod("extension", function (value, element, param) {
        param = typeof param === "string" ? param.replace(/,/g, '|') : "png|jpe?g|gif";
        return this.optional(element) || value.match(new RegExp(".(" + param + ")$", "i"));
    }, "Select valied input file format");

});

$("form[name='help_form']").on('submit', function (e) {
    e.preventDefault();
}).validate({
    rules: {
        help_name: {
            required: true,
            maxlength: 30,
            validname: true,
            normalizer: function (value) {
                return $.trim(value);
            }
        },
        help_email: {
            required: true,
            customemail: true,
        },
        help_comment: {
            required: true,
            normalizer: function (value) {
                return $.trim(value);
            }
        },
        help_contact: {
            required: true,
            maxlength: 10,
            minlength: 10,
            number: true
        },
        help_treatment_name: {
            required: true,
            normalizer: function (value) {
                return $.trim(value);
            }
        },
    },
    // highlight: function(input) {
    //     $(input).addClass('error');
    // },
    // errorPlacement: function(error, element){},
    messages: {
        help_name: {
            required: "Name is required",
            maxlength: "Name is too big",
            validname: "Please enter valid name.",
        },
        help_email: {
            required: "Email is required",
            customemail: "Please enter a valid email address."
        },
        help_comment: {
            required: "Comment is required",
        },
        help_contact: {
            required: "Mobile number is required",
            maxlength: "Mobile number is too big",
            number: "Please enter contact in digits",
        },
        help_treatment_name: {
            required: "Treatment name is required",
        },
    },
    // errorPlacement: function (error, element) {
    //     // element.css("border", "solid 1px #ff0000");
    // },
    submitHandler: function (form) {
        var help_country_code_mobile = $("#help_contact").intlTelInput("getSelectedCountryData").dialCode;
        $("#help_country_code_mobile").val(help_country_code_mobile);
        var form_data = $(form).serialize();
        $.ajax({
            url: $(form).attr("action"),
            type: 'post',
            data: form_data,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (response) {
                if (response.success) {
                    // $.notify(response.message, {
                    //     type: 'success'
                    // });
                    toastr.success('We will contact you soon!!');
                    $(".enquire_wrppp_detl").removeClass("show");
                    $(".enquire_wrppp_detl").addClass("hide");
                    $('#help_form').trigger("reset");
                } else {
                    $.notify('Something went wrong', {
                        type: 'danger'
                    });
                }
            }
        });
    }
});

$("form[name='login_form']").on('submit', function (e) {
    e.preventDefault();
}).validate({
    rules: {
        login_email: {
            required: true,
            customemail: true,
        },
        login_password: {
            required: true,
            minlength: 6,
        },
    },
    messages: {
        login_email: {
            required: "Email is required",
            customemail: "Please enter a valid email address."
        },
        login_password: {
            required: "Password is required",
            minlength: "Password must be at least 6 characters",
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

$("form[name='recover_mail_form']").on('submit', function (e) {
    e.preventDefault();
}).validate({
    rules: {
        recover_email: {
            required: true,
            customemail: true,
        },
    },
    messages: {
        recover_email: {
            required: "Email is required",
            customemail: "Please enter a valid email address."
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

// var value1=$('#signup_contact').val();
// var value2=$('#country_code').val();

$("form[name='signup_form']").on('submit', function (e) {
    e.preventDefault();
}).validate({
    rules: {
        signup_name: {
            required: true,
            maxlength: 30,
            validname: true,
            normalizer: function (value) {
                return $.trim(value);
            },
        },
        signup_email: {
            required: true,
            customemail: true,
            remote: {
                url: base_url + '/uniqueemail',
                type: "post",
                data: {
                    signup_email: function (value) {
                        return $('#signup_email').val();
                    },
                }
            }
        },
        signup_password: {
            required: true,
            minlength: 6,
        },
        signup_contact: {
            required: true,
            number: true,
            remote: {
                url: base_url + '/uniquemobile',
                type: "post",
                data: {
                    contact_no: function (value) {
                        return $('#signup_contact').val();
                    },
                    country_code: function (value) {
                        return $('#country_code').val();
                    },
                }
            }
        },
        state: {
            required: true,
        },
        city: {
            required: true,
        },
        signup_agree: {
            required: true,
        },
    },
    errorPlacement: function (error, element) {
        if (element.is(":checkbox")) {
            error.appendTo('#errors-list');
        } else {
            error.insertAfter(element);
        }
    },
    messages: {
        signup_name: {
            required: "Name is required",
            maxlength: "Name is too big",
            validname: "Please enter valid name.",
        },
        signup_email: {
            required: "Email is required",
            customemail: "Please enter a valid email address.",
            remote: "Email already taken. Try with different email"
        },
        signup_password: {
            required: "Password is required",
            minlength: "Password must be at least 6 characters",
        },
        signup_contact: {
            required: "Contact number is required",
            number: "Please enter contact in digits",
            remote: "Mobile no already taken. Try with different mobile no"
        },
        state: {
            required: "Select your state",
        },
        city: {
            required: "select your city",
        },
        signup_agree: {
            required: "Terms and conditions is required",
        },
    },
    submitHandler: function (form) {
        var form_data = new FormData(form)
        $.ajax({
            url: $(form).attr("action"),
            type: 'POST',
            data: $('#signup_form').serialize(),
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (response) {
                if (response.success) {
                    $.notify(response.message, {
                        type: 'success'
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

$("form[name='otp_verification_form']").on('submit', function (e) {
    e.preventDefault();
}).validate({
    rules: {
        verification_contact: {
            required: true,
            number: true,
        },
        verification_code: {
            required: true,
        },
    },
    messages: {
        verification_contact: {
            required: "Contact number is required",
            number: "Please enter contact in digits",
        },
        verification_code: {
            required: "Code is required",
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
        hospital: {
            required: true,
        },
        doctor: {
            required: true,
        },
        date: {
            required: true,
        },
        time: {
            required: true,
        },
        email: {
            required: true,
            customemail: true,
        },
        appointment_contact: {
            required: true,
            number: true,
            minlength:10,
            maxlength:10,
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
        hospital: {
            required: "Please select hospital",
        },
        doctor: {
            required: "Please select doctor",
        },
        date: {
            required: "Please select date",
        },
        time: {
            required: "Please select time",
        },
        email: {
            required: "Email is required",
            customemail: "Please enter a valid email address."
        },
        appointment_contact: {
            required: "Mobile number is required",
            number: "Please enter mobile number in numbers.",
            maxlength: "Please enter no more than 10 numbers",
            minlength: "Please enter at least 10 numbers.",
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

$("form[name='booking_form']").on('submit', function (e) {
    e.preventDefault();
}).validate({
    rules: {
        first_name: {
            required: true,
            maxlength: 30,
            validname: true,
            normalizer: function (value) {
                return $.trim(value);
            },
        },
        last_name: {
            required: true,
            maxlength: 30,
            validname: true,
            normalizer: function (value) {
                return $.trim(value);
            },
        },
        email: {
            required: true,
            customemail: true,
        },
        country: {
            required: true,
        },
        contact: {
            required: true,
            number: true,
        },
        specialities: {
            required: true,
        },
        date: {
            required: true,
        },
        time: {
            required: true,
        },
        booking_type: {
            required: true,
        },
        file: {
            required: true,
            extension: "docx|doc|pdf|png|jpg|jpeg"
        },
    },
    messages: {
        first_name: {
            required: "First Name is required",
            maxlength: "First Name is too big",
            validname: "Please enter valid name.",
        },
        last_name: {
            required: "Last Name is required",
            maxlength: "Last Name is too big",
            validname: "Please enter valid name.",
        },
        email: {
            required: "Email is required",
            customemail: "Please enter a valid email address."
        },
        country: {
            required: "Select your country",
        },
        contact: {
            required: "Contact number is required",
            number: "Please enter contact in digits",
        },
        specialities: {
            required: "Please select specialities",
        },
        date: {
            required: "Please select date",
        },
        time: {
            required: "Please select time",
        },
        booking_type: {
            required: "Select booking type",
        },
        file: {
            required: "File is required",
            extension: "Select valied input file format"
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

$("form[name='visit_booking_form']").on('submit', function (e) {
    e.preventDefault();
}).validate({
    rules: {
        first_name: {
            required: true,
            maxlength: 30,
            validname: true,
            normalizer: function (value) {
                return $.trim(value);
            },
        },
        last_name: {
            required: true,
            maxlength: 30,
            validname: true,
            normalizer: function (value) {
                return $.trim(value);
            },
        },
        age: {
            required: true,
            number: true,
        },
        email: {
            required: true,
            customemail: true,
        },
        contact: {
            required: true,
            number: true,
        },
        address: {
            required: true,
        },
        state: {
            required: true,
        },
        city: {
            required: true,
        },
        area: {
            required: true,
            normalizer: function (value) {
                return $.trim(value);
            },
        },
        pin_code: {
            required: true,
            number: true,
            maxlength: 6,
            minlength: 6,
            normalizer: function (value) {
                return $.trim(value);
            },
        },
        test_type: {
            required: true,
        },
        date: {
            required: true,
        },
        time: {
            required: true,
        },
    },
    messages: {
        first_name: {
            required: "First Name is required",
            maxlength: "First Name is too big",
            validname: "Please enter valid name.",
        },
        last_name: {
            required: "Last Name is required",
            maxlength: "Last Name is too big",
            validname: "Please enter valid name.",
        },
        age: {
            required: "Enter your age",
            number: "Enter age in digits",
        },
        email: {
            required: "Email is required",
            customemail: "Please enter a valid email address."
        },
        contact: {
            required: "Contact number is required",
            number: "Please enter contact in digits",
        },
        address: {
            required: "Address is required",
        },
        state: {
            required: "Select your state",
        },
        city: {
            required: "Select your city",
        },
        area: {
            required: "Enter Area",
        },
        pin_code: {
            required: "Pincode is required",
            number: "Please enter pin code in digits",
            maxlength: "Pincode must be 6 Digits",
            minlength: "Pincode must be 6 Digits",
        },
        test_type: {
            required: "Select test type",
        },
        test_type: {
            required: "Select test type",
        },
        date: {
            required: "Please select date",
        },
        time: {
            required: "Please select time",
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

function Validate() {
    var department_id = document.getElementById("department_id");
    var dr_id = document.getElementById("dr_id");
    if (department_id.value == "0" && dr_id.value == "0") {
        $("#select_one").css("display", "block");
        $("#select_one").text("Please select an option!");
        return false;
    }else{
        setTimeout(function(){
            $(".find_doctor_wrppp_detl").removeClass('show');
            $('#commom_find_doctor')[0].reset();
            var department_id = $("#department_id").val();
            get_common_dr(department_id);
         }, 100);
    }
    return true;
}

$('#department_id').on('change', function() {
    $("#select_one").css("display", "none");
    $("#select_one").text("");
});

$('#dr_id').on('change', function() {
    $("#select_one").css("display", "none");
    $("#select_one").text("");
});
