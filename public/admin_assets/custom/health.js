create_ck_editor(document.getElementById("details_1"), "details_1");
create_ck_editor(document.getElementById("details_2"), "details_2");
create_ck_editor(document.getElementById("details_3"), "details_3");
$("form[name='store_statutory_form']").on('submit', function (e) {
    e.preventDefault();
}).validate({
    rules: {
        title_1: {
            required:true,
            normalizer: function (value) {
                return $.trim(value);
            },
            nospecialchar:true,
        },
        document: {
            required:true,
            extension: "jpg|jpeg|png|pdf"
        },
    },
    messages: {
        title_1: {
            required: "Title is required",
            maxlength: "Title is too big",
        },
        document: {
            required:"File is required.",
            extension: "File not supported Valid image - jpg, jpeg, png, pdf"
        },
    },
    submitHandler: function (form) {
        // var formData = new FormData(form);
        $("#store_statutory_form button[type='submit']").attr('disabled', true);
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
                    $("#add_statutory_model").modal('hide');
                    $('#store_statutory_form').trigger("reset");
                    $('.statutory_compliance_list').DataTable().ajax.reload(null, false)
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
        $("#store_statutory_form button[type='submit']").attr('disabled', false);
    }
});
$(document).on('click', '.edit_Compliance', function (e) {
    e.preventDefault();
    id = $(this).attr("data-id");
    $.ajax({
        type: 'GET',
        url: base_url + '/admin/health/' + id + '/edit',
        success: function (data) {
            $('.crop-image-preview-container').hide();
            $('#edit_document_viewer').hide()
            $('#crop-image').attr('src','')
            $('#edit_document_viewer').attr('src','')
            $("#edit_statutory_model").modal('show');
            let elem = document.getElementById('edit_statutory_form');
            elem.setAttribute("action", base_url + '/admin/health/' + data.id)
            // elem.setAttribute("data_id", data.id)
            document.getElementById("edit_title_1").value = data.title_1
            var extension = data.document.split('.')[1]
            console.log(extension);
            var source = base_url.replace('/public', '') + '/storage/app/public/uploads/health_information/' + data.document;
            if (extension == "jpg" || extension == "jpeg" || extension == "png") {
                $('.crop-image-preview-container').show();
                $('#crop-image').attr('src',source)
            }else{
                $('#edit_document_viewer').show()
                $('#edit_document_viewer').attr('src',source)
            }
           
        }
    });
});
$("form[name='edit_statutory_form']").on('submit', function (e) {
    e.preventDefault();
}).validate({
    rules: {
        title_1: {
            required:true,
            normalizer: function (value) {
                return $.trim(value);
            },
            nospecialchar:true,
        },
        document: {
            extension: "jpg|jpeg|png|pdf"
        },
    },
    messages: {
        title_1: {
            required: "Title is required",
            maxlength: "Title is too big",
        },
        document: {
            extension: "File not supported Valid image - jpg, jpeg, png, pdf"
        },
    },
    submitHandler: function (form) {
        // var formData = new FormData(form);
        $("#edit_statutory_form button[type='submit']").attr('disabled', true);
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
                    $("#edit_statutory_model").modal('hide');
                    $('#edit_statutory_form').trigger("reset");
                    $('.statutory_compliance_list').DataTable().ajax.reload(null, false)
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
        $("#edit_statutory_form button[type='submit']").attr('disabled', false);
    }
});
$("form[name='add_health_information_form']").on('submit', function (e) {
    e.preventDefault();
}).validate({
    debug: false,
    ignore: [],
    rules: {
        title_1: {
            normalizer: function (value) {
                return $.trim(value);
            },
            nospecialchar:true,
        },
        title_2: {
            normalizer: function (value) {
                return $.trim(value);
            },
            nospecialchar:true,
        },
        title_3: {
            normalizer: function (value) {
                return $.trim(value);
            },
            nospecialchar:true,
        },
        info_type: {
            required: true,
        },
        cover_image: {
            extension: "jpg|jpeg|png|ico|bmp|gif|svg"
        },
        document: {
            extension: "jpg|jpeg|png|pdf"
        },
    },
    messages: {
        title_1: {
            // required: "First Name is required",
            maxlength: "Title is too big",
        },
        title_2: {
            // required: "First Name is required",
            maxlength: "Title is too big",
        },
        title_3: {
            // required: "First Name is required",
            maxlength: "Title is too big",
        },
        info_type: {
            // required: "Select Department",
        },
        cover_image: {
            extension: "File not supported Valid image - jpg, jpeg, png, ico, bmp, gif, svg"
        },
        document: {
            extension: "File not supported Valid image - jpg, jpeg, png, pdf"
        },
    },
    submitHandler: function (form) {
        // var formData = new FormData(form);
        $("#add_health_information_form button[type='submit']").attr('disabled', true);
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
                    // window.location.href = base_url + '/admin/event';
                    if (response.data.info_type == 'tip') {
                        window.location.href = base_url + '/admin/health';
                    } else {
                        window.location.href = base_url + '/admin/statutory_compliance';
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
        $("#add_health_information_form button[type='submit']").attr('disabled', false);
    }
});

$("form[name='update_health_information_form']").on('submit', function (e) {
    e.preventDefault();
}).validate({
    debug: false,
    ignore: [],
    rules: {
        title_1: {
            required:true,
            normalizer: function (value) {
                return $.trim(value);
            },
            nospecialchar:true,
        },
        title_2: {
            required:true,
            normalizer: function (value) {
                return $.trim(value);
            },
            nospecialchar:true,
        },
        title_3: {
            required:true,
            normalizer: function (value) {
                return $.trim(value);
            },
            nospecialchar:true,
        },
        info_type: {
            required: true,
        },
        cover_image: {
            extension: "jpg|jpeg|png|ico|bmp|gif|svg"
        },

    },
    messages: {
        title_1: {
            required: "Title is required",
            maxlength: "Title is too big",
        },
        title_2: {
            required: "Title is required",
            maxlength: "Title is too big",
        },
        title_3: {
            required: "Title is required",
            maxlength: "Title is too big",
        },
        info_type: {
            // required: "Select Department",
        },
        cover_image: {
            extension: "File not supported Valid image - jpg, jpeg, png, ico, bmp, gif, svg"
        },
    },
    submitHandler: function (form) {
        // var formData = new FormData(form);
        $("#update_health_information_form button[type='submit']").attr('disabled', true);
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
        $("#update_health_information_form button[type='submit']").attr('disabled', false);
    }
});

$(document).ready(function () {
    var numItems = $('.content_card').length + 1;


    let table1 = $('.health_tip_list');
    /*console.log(table);*/
    document.dataTable1 = table1.DataTable({
        dom: 'Bfrtp',
        processing: false,
        serverSide: true,
        responsive: true,
        destroy: true,
        "order": [],
        ajax: {
            url: base_url + '/admin/health/health_tip_list',
            type: 'post'
        },
        columns: [{
            data: 'DT_RowIndex',
            orderable: false,
            searchable: false
        },
        {
            data: 'title_1',
        },
        {
            data: 'photo',
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
                                location.reload();
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

    let table2 = $('.statutory_compliance_list');
    /*console.log(table);*/
    document.dataTable2 = table2.DataTable({
        dom: 'Bfrtp',
        processing: false,
        serverSide: true,
        responsive: true,
        destroy: true,
        "order": [],
        ajax: {
            url: base_url + '/admin/statutory_compliance_list',
            type: 'post'
        },
        columns: [{
            data: 'DT_RowIndex',
            orderable: false,
            searchable: false
        },
        {
            data: 'title_1',
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

    $(document).on('change', '#cover_image', function (event) {
        event.preventDefault();
        // console.log("cover");
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

    $(document).on('change', '#document', function (event) {
        event.preventDefault();
        var file = event.target.files[0];
        var fileName = event.target.files[0].name;
        var Extension = fileName.substring(fileName.lastIndexOf('.') + 1).toLowerCase();
        if (Extension == "jpg" || Extension == "jpeg" || Extension == "png" || Extension == "pdf") {
            if (file) {
                if (Extension == "jpg" || Extension == "jpeg" || Extension == "png") {
                    document.getElementById('document_viewer').style.display = "none";
                    var image_element_name = '#' + $(this).attr('id');
                    image_crop(image_element_name);
                } else {
                    $(".crop-image-preview-container").remove();
                    let reader = new FileReader();
                    reader.onload = function (event) {
                        document.getElementById('document_viewer').style.display = "block";
                        $('#document_viewer').attr('src', event.target.result);
                    }
                    reader.readAsDataURL(file);
                    document.getElementById('cover_image_show').style.display = "none";
                }
            }
        } else {
            this.value = "";
            $.notify('Photo only allows file types of JPG, JPEG, PNG and PDF. ', {
                type: 'danger'
            });
        }
    });

    $(document).on('change', '#edit_document', function (event) {
        event.preventDefault();
        var file = event.target.files[0];
        var fileName = event.target.files[0].name;
        var Extension = fileName.substring(fileName.lastIndexOf('.') + 1).toLowerCase();
        if (Extension == "jpg" || Extension == "jpeg" || Extension == "png" || Extension == "pdf") {
            if (file) {
                if (Extension == "jpg" || Extension == "jpeg" || Extension == "png") {
                    document.getElementById('edit_document_viewer').style.display = "none";
                    var image_element_name = '#' + $(this).attr('id');
                    image_crop(image_element_name);
                } else {
                    $(".crop-image-preview-container").remove();
                    let reader = new FileReader();
                    reader.onload = function (event) {
                        document.getElementById('edit_document_viewer').style.display = "block";
                        $('#edit_document_viewer').attr('src', event.target.result);
                    }
                    reader.readAsDataURL(file);
                }
            }
        } else {
            this.value = "";
            $.notify('Photo only allows file types of JPG, JPEG, PNG and PDF. ', {
                type: 'danger'
            });
        }
    });

});

$(document).on('change', '.status_btn', function (e) {
    e.preventDefault();
    id = this.value;
    $.ajax({
        type: 'POST',
        url: base_url + '/admin/health/' + id + '/activate/toggle',
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
$(document).on('click', '.add_data', function (e) {
    $('#add_statutory_model').modal('show');
});

$(document).ajaxComplete(function () {
    $('input[type=checkbox][data-toggle^=toggle]').bootstrapToggle();
});
