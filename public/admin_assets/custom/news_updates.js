$("form[name='add_news_update']").on('submit', function (e) {
    e.preventDefault();
}).validate({
    debug: false,
    ignore: [],
    rules: {
        "title": {
            required: true,
        },
        "posted_date": {
            required: true,
        },
        "image": {
            required: true,
            extension: "jpg|jpeg|png",
        }
    },
    messages: {
        "title": {
            required: "Please enter title",
        },
        "posted_date": {
            required: "Please select date",
        },
        "image": {
            required: "Please select an image",
            extension: "Please select a valid image",
        }
    },
    submitHandler: function (form) {
        var formData = new FormData(form);
        $("#add_news_update button[type='submit']").attr('disabled', true);
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
                    $("#addNewsUpdates").modal('hide');
                    $('#add_news_update').trigger("reset");
                    $('#news_updates_table').DataTable().ajax.reload(null, false);
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
        $("#add_news_update button[type='submit']").attr('disabled', false);
    }
});

$("form[name='update_news_update_form']").on('submit', function (e) {
    e.preventDefault();
}).validate({
    debug: false,
    ignore: [],
    rules: {
        "title": {
            required: true,
        },
        "posted_date": {
            required: true,
        },
        "image": {
            extension: "jpg|jpeg|png",
        }
    },
    messages: {
        "title": {
            required: "Please enter title",
        },
        "posted_date": {
            required: "Please select date",
        },
        "image": {
            extension: "Please select a valid image",
        }
    },
    submitHandler: function (form) {
        var formData = new FormData(form);
        $("#update_news_update_form button[type='submit']").attr('disabled', true);
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
                    $("#updateNewsUpdates").modal('hide');
                    $('#update_news_update').trigger("reset");
                    $('#news_updates_table').DataTable().ajax.reload(null, false);
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
        $("#update_news_update_form button[type='submit']").attr('disabled', false);
    }
});

$(document).ready(function () {
    
    $('#news_updates_table').DataTable({
        processing: true,
        serverSide: true,
        responsive: true,
        destroy: true,
        "order": [],
        ajax: {
            url: base_url + '/admin/news_and_updates/list',
            type: "POST",
            data: {}
        },
        columns: [
            {
                data: 'DT_RowIndex',
                orderable: false,
                searchable: false
            },
            { data: 'title' },
            {
                data: 'posted_date',
            },
            {
                data: 'image',
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

$(document).on('click', '.edit_news_update', function (e) {
    e.preventDefault();
    // var id = $(this).val();
    var id = $(this).attr("data-id");;
    console.log(id);;
    let link = this;
    $.ajax({
        // url: base_url+"/admin/news_and_updates/"+id,
        url: link.href,
        type: "GET",
        success: function (res) {
            console.log(base_url + '/admin/news_and_updates/' + id);
            $("#update_news_update_form").attr('action', base_url + '/admin/news_and_updates/' + id);
            $("#update_news_update_form #edit_news_update_id").val(res.data.id);
            $("#update_news_update_form #edit_title").val(res.data.title);
            $("#update_news_update_form #edit_description").val(res.data.description);
            var myDate = new Date(res.data.posted_date);
            var d = ("0" + myDate.getDate()).slice(-2);
            var m = ("0" + (myDate.getMonth() + 1)).slice(-2);
            var y = myDate.getFullYear();

            var newdate = y + "-" + m + "-" + d;
            $("#update_news_update_form #edit_posted_date").val(newdate);
            $("#update_news_update_form .img_preview").attr("src", base_url.replace("/public", "") + "/storage/" + res.data.image_path + res.data.image_name);

            $("#updateNewsUpdates").modal('show');
        }
    })
});

$(document).on('click', '.delete_news_update', function (e) {
    e.preventDefault();
    let link = this;
    swal({
        title: `Are you sure you want to delete this record?`,
        text: "If you delete this, it will be gone forever.",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        allowOutsideClick: false
    })
        .then((willDelete) => {
            if (willDelete) {
                id = this.value;
                $.ajax({
                    type: 'DELETE',
                    // url: base_url + '/admin/news_and_updates/' + id,
                    url: link.href,
                    success: function (response) {
                        if (response.success) {
                            $.notify(response.message, {
                                type: 'success'
                            });
                            $('#news_updates_table').DataTable().ajax.reload(null, false)
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

        }).catch(swal.noop);
});

$(document).on('change', '#image', function (event) {
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

$(document).on('change', '#edit_image', function (event) {
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