$(document).ready(function() {
    $.ajax({
        url: base_url+"/admin/get/dropdown/category",
        type: "POST",
        data: {},
        success: function(res){
            $("#add_room_form #room_category").html(res.data);
            $("#edit_room_form #edit_room_category").html(res.data);
        }
    });
    $('#room-table').DataTable({
        processing: true,
        serverSide: true,
        responsive: true,
        destroy: true,
        "order": [],
        ajax: {
           url: base_url + '/admin/rooms/list',
           type:"POST",
           data:{}
        },
        columns: [
           {
            data: 'DT_RowIndex',
            orderable: false,
            searchable: false
            },
           { data: 'room_name' },
           { data: 'category_name' },
           {
                data: 'image',
                searchable: false,
                orderable: false,
           },
           {
            data: 'actions',
            orderable: false,
            searchable: false
        },
        ]
     });
});

$("form[name='add_room_form']").on('submit', function (e) {
    e.preventDefault();
}).validate({
    rules: {
        "room_name": {
            required: true,
            nospecialchar:true,
        },
        "room_category": {
            required: true,
        },
        "room_image": {
            required: true,
            extension: "jpg|jpeg|png",
        }
    },
    messages: {
        "room_name": {
            required: "Please enter room name",
        },
        "room_category": {
            required: "Please select room category",
        },
        "room_image": {
            required: "Please select room image",
            extension: "Please select only image",
        }
    },
    submitHandler: function (form) {
        var formData = new FormData(form);
        $("#add_room_form button[type='submit']").attr('disabled', true);
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
                    $("#addRoomModal").modal('hide');
                    $('#add_room_form').trigger("reset");
                    $("#add_room_form #crop-image").attr("src",'');
                    $('#room-table').DataTable().ajax.reload(null, false);
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
        $("#add_room_form button[type='submit']").attr('disabled', false);
    }
});

$("form[name='edit_room_form']").on('submit', function (e) {
    e.preventDefault();
}).validate({
    rules: {
        "room_name": {
            required: true,
            nospecialchar:true,
        },
        "room_category": {
            required: true,
        },
        "room_image": {
            extension: "jpg|jpeg|png",
        }
    },
    messages: {
        "room_name": {
            required: "Please enter room name",
        },
        "room_category": {
            required: "Please select room category",
        },
        "room_image": {
            extension: "Please select only image",
        }
    },
    submitHandler: function (form) {
        var formData = new FormData(form);
        $("#edit_room_form button[type='submit']").attr('disabled', true);
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
                    $("#updateRoomModal").modal('hide');
                    $('#edit_room_form').trigger("reset");
                    $('#room-table').DataTable().ajax.reload(null, false);
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
        $("#edit_room_form button[type='submit']").attr('disabled', false);
    }
});

$(document).on('click', '.delete_room', function (e) {
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
                // url: base_url + '/admin/rooms/' + id,
                url: link.href,
                success: function (response) {
                    if (response.success) {
                        $.notify(response.message, {
                            type: 'success'
                        });
                        $('#room-table').DataTable().ajax.reload(null, false)
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

$(document).on('click', '.edit_room', function (e) {
    e.preventDefault();
    // var id = $(this).val();
    let link = this;
    $.ajax({
        // url: base_url+"/admin/rooms/"+id,
        url: link.href,
        type: "GET",
        success: function(res){
            $("#edit_room_form #edit_room_id").val(res.data.id);
            $("#edit_room_form #edit_room_name").val(res.data.room_name);
            $("#edit_room_form #edit_description").val(res.data.description);
            $('#edit_room_form #edit_room_category option[value='+res.data.room_category_id+']').attr('selected',true);
            $("#edit_room_form .room_img_preview").attr("src",base_url.replace("/public","")+"/storage/"+res.data.image_path+res.data.image_name);
            $("#updateRoomModal").modal('show');

        }
    })
});

$(document).on('change', '#room_image', function (event) {
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
$(document).on('change', '#edit_room_image', function (event) {
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
