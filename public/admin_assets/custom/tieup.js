$(document).ready(function () {
    let table1 = $('.corporate_tieup_list');
    /*console.log(table);*/
    document.dataTable1 = table1.DataTable({
        dom: 'Bfrtp',
        processing: true,
        serverSide: true,
        responsive: true,
        destroy: true,
        "order": [],
        ajax: {
            url: base_url + '/admin/tieup/corporate_tieup_list',
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
            data: 'company_name',
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

    table1.on('click', '.activate-link', function (e) {
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
                                document.dataTable1.draw();
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

    table1.on('click', '.delete-link', function (e) {
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
                                document.dataTable1.draw();
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

    let table2 = $('.tpa_tieup_list');
    /*console.log(table);*/
    document.dataTable2 = table2.DataTable({
        dom: 'Bfrtp',
        processing: true,
        serverSide: true,
        responsive: true,
        destroy: true,
        "order": [],
        ajax: {
            url: base_url + '/admin/tieup/tpa_tieup_list',
            type: 'post'
        },
        columns: [{
           data: 'DT_RowIndex',
            orderable: false,
            orderable: false,
            searchable: false
        },
        {
            data: 'photo',
        },
        {
            data: 'company_name',
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

    table2.on('click', '.activate-link', function (e) {
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
                                document.dataTable2.draw();
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

    table2.on('click', '.delete-link', function (e) {
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
                                document.dataTable2.draw();
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

    $("form[name='corporate_page_contain_form']").on('submit', function (e) {
        e.preventDefault();
    }).validate({
        debug: false,
        ignore: [],
        rules: {
            title: {
                required: true,
                normalizer: function (value) {
                    return $.trim(value);
                },
                nospecialchar:true,
            },
        },
        messages: {
            title: {
                // required: "First Name is required",
            },
        },
        submitHandler: function (form) {
            // var formData = new FormData(form);
            $("#corporate_page_contain_form button[type='submit']").attr('disabled', true);
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
                        $("#corporate_btn").html('Update');
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
            $("#corporate_page_contain_form button[type='submit']").attr('disabled', false);
        }
    });

    $("form[name='tpa_page_contain_form']").on('submit', function (e) {
        e.preventDefault();
    }).validate({
        debug: false,
        ignore: [],
        rules: {
            title: {
                required: true,
                normalizer: function (value) {
                    return $.trim(value);
                },
                nospecialchar:true,
            },
        },
        messages: {
            title: {
                // required: "First Name is required",
            },
        },
        submitHandler: function (form) {
            // var formData = new FormData(form);
            $("#tpa_page_contain_form button[type='submit']").attr('disabled', true);
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
                        $("#tpa_btn").html('Update');
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
            $("#tpa_page_contain_form button[type='submit']").attr('disabled', false);
        }
    });

    $("form[name='store_tieup_form']").on('submit', function (e) {
        e.preventDefault();
    }).validate({
        debug: false,
        ignore: [],
        rules: {
            company_name: {
                required: true,
                normalizer: function (value) {
                    return $.trim(value);
                },
                nospecialchar:true,
            },
            company_logo: {
                required: true,
                extension: "jpg|jpeg|png|ico|bmp|gif|svg"
            },
        },
        messages: {
            company_name: {
                // required: "First Name is required",
            },
            company_logo: {
                extension: "File not supported Valid image - jpg, jpeg, png, ico, bmp, gif, svg"
            },
        },
        submitHandler: function (form) {
            // var formData = new FormData(form);
            $("#store_tieup_form button[type='submit']").attr('disabled', true);
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
                        $('#add_tieup_model').modal('hide');
                        $('#store_tieup_form').trigger("reset");
                        $('#company_logo_preview').attr('src', '');
                        $('.company_logo_show').hide();
                        if (response.data.tieup_type == 'corporate') {
                            // console.log("corporate_in");
                            $('#corporate_basic_1').DataTable().ajax.reload(null, false);
                        } else {
                            // console.log("tpa_in");
                            $('#tpa_basic_1').DataTable().ajax.reload(null, false);
                        }


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
            $("#store_tieup_form button[type='submit']").attr('disabled', false);
        }
    });

    $("form[name='update_tieup_form']").on('submit', function (e) {
        e.preventDefault();
    }).validate({
        debug: false,
        ignore: [],
        rules: {
            company_name: {
                required: true,
                normalizer: function (value) {
                    return $.trim(value);
                },
                nospecialchar:true,
            },
            company_logo: {
                extension: "jpg|jpeg|png|ico|bmp|gif|svg"
            },
        },
        messages: {
            company_name: {
                // required: "First Name is required",
            },
            company_logo: {
                extension: "File not supported Valid image - jpg, jpeg, png, ico, bmp, gif, svg"
            },
        },
        submitHandler: function (form) {
            // var formData = new FormData(form);
            $("#update_tieup_form button[type='submit']").attr('disabled', true);
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
                        $('#edit_tieup_model').modal('hide');
                        $('#store_tieup_form').trigger("reset");
                        $('#company_logo_preview').attr('src', '');
                        $('.company_logo_show').hide();
                        if (response.data.tieup_type == 'corporate') {
                            // console.log("corporate_in");
                            $('#corporate_basic_1').DataTable().ajax.reload(null, false);
                        } else {
                            // console.log("tpa_in");
                            $('#tpa_basic_1').DataTable().ajax.reload(null, false);
                        }


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
            $("#update_tieup_form button[type='submit']").attr('disabled', false);
        }
    });

    $(document).on('click', '.edit_tieup_data', function (e) {
        e.preventDefault();
        // id = $(this).attr("data-id");
        let link = this;
        $.ajax({
            type: 'GET',
            // url: base_url + '/admin/tieup_edit/edit/' + id,
            url: link.href,
            success: function (data) {
                $('#update_tieup_form').trigger("reset");
                $("#edit_tieup_model").modal('show');
                let elem = document.getElementById('update_tieup_form');
                elem.setAttribute("action", base_url + '/admin/tieup_update/update/' + data.id)
                elem.setAttribute("data_id", data.id)
                document.getElementById("edit_company_name").value = data.company_name;
                document.getElementById("edit_tieup_type").value = data.tieup_type;
                $('.edit_company_logo_show').show();
                $("#edit_company_logo_preview").attr("src", base_url.replace("/public", "") + "/storage/" + data.image_path + data.company_logo);
            }
        });
    });
});

$(document).on('change', '#company_logo', function (event) {
    event.preventDefault();
    // console.log("cover");
    var file = event.target.files[0];
    var fileName = event.target.files[0].name;
    // alert(fileName)
    var Extension = fileName.substring(
        fileName.lastIndexOf('.') + 1).toLowerCase();
    if (Extension == "jpg" || Extension == "jpeg" || Extension == "png" || Extension == "ico" || Extension == "bmp") {
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

$(document).on('change', '#edit_company_logo', function (event) {
    event.preventDefault();
    // console.log("cover");
    var file = event.target.files[0];
    var fileName = event.target.files[0].name;
    // alert(fileName)
    var Extension = fileName.substring(
        fileName.lastIndexOf('.') + 1).toLowerCase();
    if (Extension == "jpg" || Extension == "jpeg" || Extension == "png" || Extension == "ico" || Extension == "bmp") {
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

$(document).on('click', '.add_data', function (e) {
    $('#add_tieup_model').modal('show');
    var tieup_type = $(this).attr("data-id");
    // console.log(tieup_type);

    $("#model_title").text(tieup_type)
    $("#tieup_type").val(tieup_type);
});

$(document).on('change', '.status_btn', function (e) {
    e.preventDefault();
    id = this.value;
    $.ajax({
        type: 'POST',
        url: base_url + '/admin/tieup/' + id + '/activate/toggle',
        "initComplete": function (settings, json) {
            $('.tgl').bootstrapToggle()
        },
        success: function (response) {
            $.notify(response.message, {
                type: 'success'
            });
        }
    });
});

$(document).ajaxComplete(function () {
    $('input[type=checkbox][data-toggle^=toggle]').bootstrapToggle();
});
