$(function() {
    $('#addTimelineModal').on('shown.bs.modal', function (e) {
        $('#cp1').colorpicker({
            inline: true,
            container: true,
            "color": "#16813D",
            extensions: [
                {
                name: 'swatches', // extension name to load
                options: { // extension options
                    colors: {
                    'black': '#000000',
                    'gray': '#888888',
                    'white': '#ffffff',
                    'red': 'red',
                    'default': '#777777',
                    'primary': '#337ab7',
                    'success': '#5cb85c',
                    'info': '#5bc0de',
                    'warning': '#f0ad4e',
                    'danger': '#d9534f'
                    },
                    namesAsValues: true
                }
                }
            ]
        });
    });
});

$("form[name='add_timeline_form']").on('submit', function (e) {
    e.preventDefault();
}).validate({
    debug:false,
    ignore:[],
    rules: {
        "title": {
            required: true,
            nospecialchar:true,
        },
        "color_code": {
            required: true,
        },
        "year": {
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
        "color_code": {
            required: "Please select color",
        },
        "year": {
            required: "Please select year",
        },
        "image": {
            required: "Please select image",
            extension: "Please select valid image",
        }
    },
    submitHandler: function (form) {
        var formData = new FormData(form);
        $("#add_timeline_form button[type='submit']").attr('disabled', true);
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
                    $("#addTimelineModal").modal('hide');
                    $('#add_timeline_form').trigger("reset");
                    $('#timeline-table').DataTable().ajax.reload(null, false);
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
        $("#add_timeline_form button[type='submit']").attr('disabled', false);
    }
});

$("form[name='edit_timeline_form']").on('submit', function (e) {
    e.preventDefault();
}).validate({
    rules: {
        "title": {
            required: true,
            nospecialchar:true,
        },
        "color_code": {
            required: true,
        },
        "year": {
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
        "color_code": {
            required: "Please select color",
        },
        "year": {
            required: "Please select year",
        },
        "image": {
            extension: "Please select valid image",
        }
    },
    submitHandler: function (form) {
        var formData = new FormData(form);
        $("#edit_timeline_form button[type='submit']").attr('disabled', true);
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

                    $("#updateTimelineModal").modal('hide');
                    $('#edit_timeline_form').trigger("reset");
                    $('#timeline-table').DataTable().ajax.reload(null, false);
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
        $("#edit_timeline_form button[type='submit']").attr('disabled', false);
    }
});

$(document).ready(function() {
    $('#timeline-table').DataTable({
        processing: true,
        serverSide: true,
        responsive: true,
        destroy: true,
        "order": [],
        ajax: {
           url: base_url + '/admin/hospital_timelines/list',
           type:"POST",
           data:{}
        },
        columns: [
           {
            data: 'DT_RowIndex',
            orderable: false,
            searchable: false
            },
           { data: 'title' },
           { data: 'year' },
           {
                data: 'color_code',
                orderable: false,
           },
           {
                data: 'image',
                orderable: false,
                searchable: false
            },
            {
                data: 'direction',
            },
           {
            data: 'actions',
            orderable: false,
            searchable: false
        },
        ]
     });


});

$(document).on('click', '.edit_timeline', function (e) {
    e.preventDefault();
    // var id = $(this).val();
    let link = this;
    $.ajax({
        // url: base_url+"/admin/hospital_timelines/"+id,
        url: link.href,
        type: "GET",
        success: function(res){
            $("#edit_timeline_form #edit_timeline_id").val(res.data.id);
            $("#edit_timeline_form #edit_title").val(res.data.title);
            $("#edit_timeline_form #edit_year option[value='"+res.data.year+"']").prop("selected",true);
            $("#edit_timeline_form #edit_direction option[value='"+res.data.direction+"']").prop("selected",true);
            $("#edit_timeline_form #edit_color_code").val(res.data.color_code);
            $("#edit_timeline_form .img_preview").attr("src",base_url.replace("/public","")+"/storage/"+res.data.image_path+res.data.image_name);
            $('#cp2').colorpicker({
                inline: true,
                container: true,
                color: res.data.color_code,
                extensions: [
                    {
                    name: 'swatches', // extension name to load
                    options: { // extension options
                        colors: {
                        'black': '#000000',
                        'gray': '#888888',
                        'white': '#ffffff',
                        'red': 'red',
                        'default': '#777777',
                        'primary': '#337ab7',
                        'success': '#5cb85c',
                        'info': '#5bc0de',
                        'warning': '#f0ad4e',
                        'danger': '#d9534f'
                        },
                        namesAsValues: true
                    }
                    }
                ]
            });

            $("#updateTimelineModal").modal('show');
            $('#cp2').colorpicker('setValue', res.data.color_code);
        }
    })
});

$(document).on('click', '.delete_timeline', function (e) {
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
                // url: base_url + '/admin/hospital_timelines/' + id,
                url: link.href,
                success: function (response) {
                    if (response.success) {
                        $.notify(response.message, {
                            type: 'success'
                        });
                        $('#timeline-table').DataTable().ajax.reload(null, false)
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
