create_ck_editor(document.getElementById("experience"), "experience");
create_ck_editor(document.getElementById("professional_highlight"), "professional_highlight");


$(document).ready(function () {
    $("form[name='add_doctor_profile_form']").on('submit', function (e) {
        e.preventDefault();
    }).validate({
        debug: false,
        ignore: [],
        rules: {
            full_name: {
                required: true,
                maxlength: 30,
                nospecialcharnumber:true,
                normalizer: function (value) {
                    return $.trim(value);
                },
            },
            qualification: {
                required: true,
            },
            "speciality_id[]": {
                required: true,
            },
            // cluster_id: {
            //     required: true,
            // },
            language_known: {
                required: true,
            },
            department_id: {
                required: true,
            },
            designation: {
                required: true,
            },
            mobile_no: {
                required: true,
                number: true,
                maxlength:10,
                minlength:10,
                normalizer: function (value) {
                    return $.trim(value);
                },
            },
            gender: {
                required: true,
            },
            // opd_number: {
            //     required: true,
            // },
            opd_morning_yes: {
                required : function(element) {
                    var action1 = $("#opd_morning_yes").val();
                    var action2 = $("#opd_evening_yes").val();
                    if(action1 == "0" && action2 == "0") {
                        return true;
                    } else {
                        return false;
                    }
                }
            },
            opd_morning_from_time: {
                required: true,
            },
            opd_morning_to_time: {
                required: true,
            },
            opd_evening_from_time: {
                required: true,
            },
            opd_evening_to_time: {
                required: true,
            },
            upload_image: {
                required: true,
                extension: "jpg|jpeg|png|ico|bmp|gif|svg"
            },
            // experience: {
            //     required: true,
            // },
            // professional_highlight: {
            //     required: true,
            // },
        },
        messages: {
            full_name: {
                required: "First Name is required",
                maxlength: "First Name is too big",
                nospecialcharnumber:"Please enter valid name.",
            },
            qualification: {
                required: "Qualification is required",
            },
            "speciality_id[]": {
                required: "Speciality is required",
            },
            // cluster_id: {
            //     required: "Cluster is required",
            // },
            language_known: {
                required: "Language is required",
            },
            department_id: {
                required: "Select Department",
            },
            designation: {
                required: "Designation is required",
            },
            mobile_no: {
                required: "Mobile number is required",
                number: "Please enter contact in digits",
                maxlength: "Please enter no more than 10 digit",
                minlength: "Please enter at least 10 digit.",
            },
            gender: {
                required: "Select gender",
            },
            // opd_number: {
            //     required: "OPD number is required",
            // },
            opd_morning_yes: {
                required: "Please Select atlest morning or eveining time",
            },
            opd_morning_from_time: {
                required: "Please add morning time",
            },
            opd_morning_to_time: {
                required: "Please add morning time",
            },
            opd_evening_from_time: {
                required: "Please add evening time",
            },
            opd_evening_to_time: {
                required: "Please add evening time",
            },
            upload_image: {
                required: "Upload file",
                extension: "File not supported Valid image - jpg, jpeg, png, ico, bmp, gif, svg"
            },
            // experience: {
            //     required: "Enter experience",
            // },
            // professional_highlight: {
            //     required: "Enter Professional highlights",
            // },
        },
        submitHandler: function (form) {
            // var form_data = new FormData(form)
            $("#add_doctor_profile_form button[type='submit']").attr('disabled', true);
            $.ajax({
                url: $(form).attr("action"),
                type: 'POST',
                data: new FormData(form),
                processData: false,
                dataType: 'json',
                contentType: false,
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
                        // $("#add_doctor_profile_popup").modal('hide');
                        // $('.doctor_profile_list').DataTable().ajax.reload(null, false)
                        window.location.href = base_url + '/admin/doctor';
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
            $("#add_doctor_profile_form button[type='submit']").attr('disabled', false);
        }
    });

    $("form[name='update_doctor_profile_form']").on('submit', function (e) {
        e.preventDefault();
    }).validate({
        debug: false,
        ignore: [],
        rules: {
            full_name: {
                required: true,
                maxlength: 30,
                nospecialcharnumber:true,
                normalizer: function (value) {
                    return $.trim(value);
                },
            },
            qualification: {
                required: true,
            },
            speciality_id: {
                required: true,
            },
            // cluster_id: {
            //     required: true,
            // },
            language_known: {
                required: true,
            },
            department_id: {
                required: true,
            },
            designation: {
                required: true,
            },
            mobile_no: {
                required: true,
                number: true,
                maxlength:10,
                minlength:10,
                normalizer: function (value) {
                    return $.trim(value);
                },
            },
            gender: {
                required: true,
            },
            // opd_number: {
            //     required: true,
            // },
            opd_morning_yes: {
                required : function(element) {
                    var action1 = $("#opd_morning_yes").val();
                    var action2 = $("#opd_evening_yes").val();
                    if(action1 == "0" && action2 == "0") {
                        return true;
                    } else {
                        return false;
                    }
                }
            },
            opd_morning_from_time: {
                required: true,
            },
            opd_morning_to_time: {
                required: true,
            },
            opd_evening_from_time: {
                required: true,
            },
            opd_evening_to_time: {
                required: true,
            },
            upload_image: {
                // required: true,
                extension: "jpg|jpeg|png|ico|bmp|gif|svg"
            },
            // experience: {
            //     required: true,
            // },
            // professional_highlights: {
            //     required: true,
            // },
        },
        messages: {
            full_name: {
                required: "First Name is required",
                maxlength: "First Name is too big",
                nospecialcharnumber:"Please enter valid name.",
            },
            qualification: {
                required: "Qualification is required",
            },
            speciality_id: {
                required: "Speciality is required",
            },
            // cluster: {
            //     required: "Cluster is required",
            // },
            language_known: {
                required: "Language is required",
            },
            department_id: {
                required: "Select Department",
            },
            designation: {
                required: "Designation is required",
            },
            mobile_no: {
                required: "Mobile number is required",
                number: "Please enter contact in digits",
                maxlength: "Please enter no more than 10 digit",
                minlength: "Please enter at least 10 digit.",
            },
            gender: {
                required: "Select gender",
            },
            // opd_number: {
            //     required: "OPD number is required",
            // },
            opd_morning_yes: {
                required: "Please Select atlest morning or eveining time",
            },
            opd_morning_from_time: {
                required: "Please add morning time",
            },
            opd_morning_to_time: {
                required: "Please add morning time",
            },
            opd_evening_from_time: {
                required: "Please add evening time",
            },
            opd_evening_to_time: {
                required: "Please add evening time",
            },
            upload_image: {
                required: "Upload file",
                extension: "File not supported Valid image - jpg, jpeg, png, ico, bmp, gif, svg"
            },
            // experience: {
            //     required: "Enter experience",
            // },
            // professional_highlights: {
            //     required: "Enter Professional highlights",
            // },
        },
        submitHandler: function (form) {
            $("#update_doctor_profile_form button[type='submit']").attr('disabled', true);
            $.ajax({
                url: $(form).attr("action"),
                type: 'POST',
                data: new FormData(form),
                processData: false,
                dataType: 'json',
                contentType: false,
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
                        // $("#update_doctor_profile_popup").modal('hide');
                        // $('.doctor_profile_list').DataTable().ajax.reload(null, false)
                        window.location.href = base_url + '/admin/doctor';
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
            $("#update_doctor_profile_form button[type='submit']").attr('disabled', false);
        }
    });

    let table = $('.doctor_profile_list');
    /*console.log(table);*/
    document.dataTable = table.DataTable({
        dom: 'Bfrtp',
        processing: false,
        serverSide: true,
        responsive: true,
        "bDestroy": true,
        "order": [],
        ajax: {
            url: base_url + '/admin/doctor_profile/profile_list',
            type: 'post'
        },
        columns: [{
            data: 'DT_RowIndex',
            orderable: false,
            searchable: false
        },
        {
            data: 'photo',
        },
        {
            data: 'full_name',
        },
        {
            data: 'department',
        },
        /* {
            data: 'speciality',
        },
        {
            data: 'mobile_no',
        },
        {
            data: 'opd_timimg',
        },
        {
            data: 'qualification',
            name: 'qualification'
        }, */
        {
            data: 'opd_number',
            name: 'opd_number'
        },
        {
            data: 'designation',
            name: 'designation'
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

    table.on('click', '.activate-link', function (e) {
        e.preventDefault();
        let link = this;

        swal({
            title: "Are you sure?",
            text: link.getAttribute('data-title'),
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
            .then((result) => {
                if (result) {
                    $.ajax({
                        url: link.href,
                        type: 'post',
                        dataType: 'json',
                        success: function (response) {
                            if (response.success) {
                                $.notify(response.message, { type: 'success' });
                                document.dataTable.draw();
                            } else if (!response.success) {
                                $.notify(response.message, { type: 'danger' });
                            } else {
                                $.notify(response.message, { type: 'danger' });
                            }
                        },
                        error: function (response) {
                            let errors = response.responseJSON.errors;

                            if (errors) {
                                $.notify(Object.values(errors)[0], { type: 'danger' });
                            }
                        }
                    })
                }
            });
    })

    table.on('click', '.delete-link', function (e) {
        e.preventDefault();
        let link = this;

        swal({
            title: "Are you sure?",
            text: "You won't be able to revert this!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
            .then((result) => {
                if (result) {
                    $.ajax({
                        url: link.href,
                        type: 'delete',
                        dataType: 'json',
                        success: function (response) {
                            if (response.success) {
                                $.notify(response.message, { type: 'success' });
                                document.dataTable.draw();
                            } else if (!response.success) {
                                $.notify(response.message, { type: 'danger' });
                            } else {
                                $.notify('Something went wrong', { type: 'danger' });
                            }
                        },
                        error: function (response) {
                            let errors = response.responseJSON.errors;

                            if (errors) {
                                $.notify(Object.values(errors)[0], { type: 'danger' });
                            }
                        }
                    })
                }
            });

    });

    $(document).on('change', '#profile_photo', function (event) {
        event.preventDefault();
        // console.log("cover");
        var file = event.target.files[0];
        var fileName = event.target.files[0].name;
        var Extension = fileName.substring(
            fileName.lastIndexOf('.') + 1).toLowerCase();
        if (Extension == "gif" || Extension == "png" || Extension == "bmp" || Extension == "jpeg" || Extension == "jpg") {
            if (file) {
                let reader = new FileReader();
                reader.onload = function (event) {
                    document.getElementById('photo_viewer').style.display = "block";
                    $('#photo_viewer').attr('src', event.target.result);
                }
                reader.readAsDataURL(file);
            }
        } else {
            this.value = "";
            $.notify('Photo only allows file types of GIF, PNG, JPG, JPEG and BMP. ', {
                type: 'danger'
            });
        }
    });
});

$(document).on('change', '.status_btn', function(e) {
    e.preventDefault();
    id = this.value;
    $.ajax({
        type: 'POST',
        url: base_url + '/admin/doctor_profile/' + id + '/activate/toggle',
        "initComplete": function(settings, json) {
            $('.tgl').bootstrapToggle()
        },
        success: function(response) {
            $.notify(response.message, {
                type: 'success'
            });
        }
    });
});

$(document).on('change', '#upload_image', function (event) {
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

$(document).on('change', '#edit_upload_image', function (event) {
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

$(document).ajaxComplete(function () {
    $('input[type=checkbox][data-toggle^=toggle]').bootstrapToggle();
});
