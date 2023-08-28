create_ck_editor(document.getElementById("details_2"), "details_2");

$("form[name='add_scheme_form']").on('submit', function (e) {
    e.preventDefault();
}).validate({
    debug: false,
    ignore: [],
    rules: {
        scheme_name: {
            required: true,
            normalizer: function (value) {
                return $.trim(value);
            }
        },
        scheme_image: {
            required: true,
            extension: "jpg|jpeg|png|ico|bmp|gif|svg"
        },
        scheme_note: {
            required: true,
            normalizer: function (value) {
                return $.trim(value);
            }
        }
    },
    messages: {
        scheme_name: {
            // required: "First Name is required",
        },
        scheme_image: {
            extension: "File not supported Valid image - jpg, jpeg, png, ico, bmp, gif, svg"
        },
    },
    submitHandler: function (form) {
        // var formData = new FormData(form);
        $("#add_scheme_form button[type='submit']").attr('disabled', true);
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
                    window.location.href = base_url + '/admin/goverment_scheme';
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
        $("#add_scheme_form button[type='submit']").attr('disabled', false);
    }
});

$("form[name='update_scheme_form']").on('submit', function (e) {
    e.preventDefault();
}).validate({
    debug: false,
    ignore: [],
    rules: {
        scheme_name: {
            required: true,
            normalizer: function (value) {
                return $.trim(value);
            }
        },
        scheme_image: {
            extension: "jpg|jpeg|png|ico|bmp|gif|svg"
        },
        scheme_note: {
            required: true,
            normalizer: function (value) {
                return $.trim(value);
            }
        }
    },
    messages: {
        scheme_name: {
            // required: "First Name is required",
        },
        scheme_image: {
            extension: "File not supported Valid image - jpg, jpeg, png, ico, bmp, gif, svg"
        },
    },
    submitHandler: function (form) {
        // var formData = new FormData(form);
        $("#update_scheme_form button[type='submit']").attr('disabled', true);
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
                    window.location.href = base_url + '/admin/goverment_scheme';
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
        $("#update_scheme_form button[type='submit']").attr('disabled', false);
    }
});

$(document).ready(function () {
    var numItems = $('.content_card').length + 1;

    let table1 = $('.scheme_list');
    /*console.log(table);*/
    document.dataTable1 = table1.DataTable({
        dom: 'Bfrtp',
        processing: true,
        serverSide: true,
        responsive: true,
        destroy: true,
        "order": [],
        ajax: {
            url: base_url + '/admin/scheme_list',
            type: 'post'
        },
        columns: [{
            data: 'DT_RowIndex',
            orderable: false,
            searchable: false
        },
        {
            data: 'scheme_name',
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

    $(document).on('change', '#scheme_image', function (event) {
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

});

$(document).on('change', '.status_btn', function (e) {
    e.preventDefault();
    id = this.value;
    $.ajax({
        type: 'POST',
        url: base_url + '/admin/scheme/' + id + '/activate/toggle',
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

