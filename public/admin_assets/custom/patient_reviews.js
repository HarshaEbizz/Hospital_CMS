
$(document).ready(function () {
    $('#review_table').DataTable({
        processing: true,
        serverSide: true,
        responsive: true,
        destroy: true,
        "order": [],
        ajax: {
            url: base_url + '/admin/patient_reviews/list',
            type: 'post',
            data: {},
        },
        "initComplete": function (settings, json) {
            $('.tgl').bootstrapToggle()
        },
        columns: [{
            data: 'DT_RowIndex',
            orderable: false,
            searchable: false
        },
        {
            data: 'feedback_type',
            name: 'feedback_type',
        },
        {
            data: 'speciality',
            name: 'speciality'
        },
        {
            data: 'actions',
            orderable: false,
            searchable: false
        },
        ]
    });
});
$('#addReviewModal').on('shown.bs.modal', function (e) {
    $('#form_content').html('');
    $('#add_review_form').trigger("reset");
    var html = '<div class="col-lg-6"><div class="mb-3"><label for="first_name" class="form-label">First Name</label><input type="text" class="form-control" id="first_name" name="first_name"></div></div><div class="col-lg-6"><div class="mb-3"><label for="last_name" class="form-label">Last Name</label><input type="text" class="form-control" id="last_name" name="last_name"></div></div><div class="col-lg-6"><div class="mb-3"><label for="photo" class="form-label">Upload Photo</label><input class="form-control" type="file" accept="image/*" id="photo" name="photo"><input type="text" id="photo_url" name="photo_url" hidden></div></div><div class="col-lg-6"><div class="mb-3" style="display: inline-flex;"><label for="rating" class="form-label">Rating :- </label><div class="rate"><input type="radio" id="star5" name="rating" value="5" /><label for="star5" title="text">5 stars</label><input type="radio" id="star4" name="rating" value="4" /><label for="star4" title="text">4 stars</label><input type="radio" id="star3" name="rating" value="3" /><label for="star3" title="text">3 stars</label><input type="radio" id="star2" name="rating" value="2" /><label for="star2" title="text">2 stars</label><input type="radio" id="star1" name="rating" value="1" /><label for="star1" title="text">1 star</label></div><label id="rating-error" class="error" for="rating"></label></div></div><div class="col-lg-12"><div class="mb-3"><label for="message" class="form-label">Message</label><div class="form-floating"><textarea class="form-control" placeholder="Message " id="message" name="message" style="height: 200px"></textarea><label for="floatingTextarea2"></label></div><label id="message-error" class="error" for="message"></label></div></div>';
    $('#form_content').append(html);
});
$(document).on('change', '#feedback_type', function (e) {
    $('#form_content').html('');
    var val = this.value;
    if (val == "write") {
        var html = '<div class="col-lg-6"><div class="mb-3"><label for="first_name" class="form-label">First Name</label><input type="text" class="form-control" id="first_name" name="first_name"></div></div><div class="col-lg-6"><div class="mb-3"><label for="last_name" class="form-label">Last Name</label><input type="text" class="form-control" id="last_name" name="last_name"></div></div><div class="col-lg-6"><div class="mb-3"><label for="photo" class="form-label">Upload Photo</label><input class="form-control" type="file" accept="image/*" id="photo" name="photo"><input type="text" id="photo_url" name="photo_url" hidden></div></div><div class="col-lg-6"><div class="mb-3" style="display: inline-flex;"><label for="rating" class="form-label">Rating :- </label><div class="rate"><input type="radio" id="star5" name="rating" value="5" /><label for="star5" title="text">5 stars</label><input type="radio" id="star4" name="rating" value="4" /><label for="star4" title="text">4 stars</label><input type="radio" id="star3" name="rating" value="3" /><label for="star3" title="text">3 stars</label><input type="radio" id="star2" name="rating" value="2" /><label for="star2" title="text">2 stars</label><input type="radio" id="star1" name="rating" value="1" /><label for="star1" title="text">1 star</label></div><label id="rating-error" class="error" for="rating"></label></div></div><div class="col-lg-12"><div class="mb-3"><label for="message" class="form-label">Message</label><div class="form-floating"><textarea class="form-control" placeholder="Message " id="message" name="message" style="height: 200px"></textarea><label for="floatingTextarea2"></label></div><label id="message-error" class="error" for="message"></label></div></div>';
        $('#form_content').append(html);
    } else {
        var html = '<div class="col-lg-12"><div class="mb-3"><label for="video_url" class="form-label">Video url</label><input type="text" class="form-control" id="video_url" name="video_url" /></div></div>'
        $('#form_content').append(html);
    }
});
$("form[name='add_review_form']").on('submit', function (e) {
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
        photo: {
            // required: true,
            extension: "jpg|jpeg|png|ico|bmp|jfif"
        },
        video_url: {
            required: true,
            video_url: true,

        },
        speciality_id: {
            required: true,
        },
        rating: {
            required: true,
        },
        message: {
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
        photo: {
            // required: "Please upload photo.",
            extension: "Please upload file in these format only (jpg, jpeg, png, ico, bmp,jfif)."
        },
        video_url: {
            required: "Please youtube video url.",
            video_url: "Enter valid youtube video url",
        },
        speciality_id: {
            required: "Choose Speciality",
        },
        rating: {
            required: "Add rating",
        },
        message: {
            required: "Message is required",
        },
    },
    submitHandler: function (form) {
        var formData = new FormData(form);
        $("#add_review_form button[type='submit']").attr('disabled', true);
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
                    $("#addReviewModal").modal('hide');
                    $('#add_review_form').trigger("reset");
                    $('#review_table').DataTable().ajax.reload(null, false);
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
        $("#add_review_form button[type='submit']").attr('disabled', false);
    }
});
$(document).on('click', '.edit_review', function (e) {
    e.preventDefault();
    $('#edit_review_form').trigger("reset");
    // $("#edit_feedback_type").attr('selected', false);
    console.log($("#edit_feedback_type").val());
    id = this.value;
    $.ajax({
        type: 'GET',
        url: base_url + '/admin/patient_reviews/' + id + '/edit',
        success: function (data) {
            let elem = document.getElementById('edit_review_form');
            elem.setAttribute("action", base_url + '/admin/patient_reviews/' + data.id)
            elem.setAttribute("data_id", data.id)
            $("#edit_speciality_id option[value=" + data.speciality_id + "]").attr('selected', true);
            $('#edit_form_content').html('');
            if (data.feedback_type == "write") {
                $("#edit_feedback_type option[value='video']").attr('selected', false);
                $("#edit_feedback_type option[value=" + data.feedback_type + "]").attr('selected', true);
                var html = '<div class="col-lg-6"><div class="mb-3"><label for="edit_first_name" class="form-label">First Name</label><input type="text" class="form-control" id="edit_first_name" name="edit_first_name"></div></div><div class="col-lg-6"><div class="mb-3"><label for="edit_last_name" class="form-label">Last Name</label><input type="text" class="form-control" id="edit_last_name" name="edit_last_name"></div></div><div class="col-lg-6"><div class="mb-3"> <div class="crop-image-preview-container image-preview-container"><img id="crop-image" class="edit_preview-selected-image" /> </div><label for="edit_photo" class="form-label">Upload Photo</label><input class="form-control" type="file" accept="image/*" id="edit_photo" name="edit_photo"><input type="text" id="edit_photo_url" name="edit_photo_url" hidden></div></div><div class="col-lg-6"><div class="mb-3" style="display: inline-flex;"><label for="edit_rating" class="form-label">Rating :- </label><div class="rate"><input type="radio" id="edit_star5" name="edit_rating" value="5" /><label for="edit_star5" title="text">5 stars</label><input type="radio" id="edit_star4" name="edit_rating" value="4" /><label for="edit_star4" title="text">4 stars</label><input type="radio" id="edit_star3" name="edit_rating" value="3" /><label for="edit_star3" title="text">3 stars</label><input type="radio" id="edit_star2" name="edit_rating" value="2" /><label for="edit_star2" title="text">2 stars</label><input type="radio" id="edit_star1" name="edit_rating" value="1" /><label for="edit_star1" title="text">1 star</label></div><label id="edit_rating-error" class="error" for="edit_rating"></label></div></div><div class="col-lg-12"><div class="mb-3"><label for="edit_message" class="form-label">Message</label><div class="form-floating"><textarea class="form-control" placeholder="Message " id="edit_message" name="edit_message" style="height: 200px"></textarea><label for="floatingTextarea2"></label></div><label id="edit_message-error" class="error" for="message"></label></div></div>';
                $('#edit_form_content').append(html);
                document.getElementById("edit_first_name").value = data.first_name
                document.getElementById("edit_last_name").value = data.last_name
                document.getElementById("edit_message").value = data.message
                $("#edit_star" + data.rating).prop("checked", true);
                if (data.image_name) {
                    $('.edit_image-preview-container').show();
                    var url = base_url.replace('/public', '')
                    $("#edit_review_form .edit_preview-selected-image").attr("src", url + '/storage/' + data.image_path + "/" + data.image_name)
                }
            } else {
                $("#edit_feedback_type option[value='write']").attr('selected', false);
                $("#edit_feedback_type option[value=" + data.feedback_type + "]").attr('selected', true);
                var html = '<div class="col-lg-12"><div class="mb-3"><label for="edit_video_url" class="form-label">Video url</label><input type="text" class="form-control" id="edit_video_url" name="edit_video_url" /></div></div>'
                $('#edit_form_content').append(html);
                document.getElementById("edit_video_url").value = data.video_url
            }
            $("#EditReviewModal").modal('show');
        }
    });
});
$(document).on('change', '#edit_feedback_type', function (e) {
    $('#edit_form_content').html('');
    var id = $('#edit_review_form').attr('data_id');
    var val = this.value;
    $.ajax({
        type: 'GET',
        url: base_url + '/admin/patient_reviews/' + id + '/edit',
        success: function (data) {
            if (val == "write") {
                var html = '<div class="col-lg-6"><div class="mb-3"><label for="edit_first_name" class="form-label">First Name</label><input type="text" class="form-control" id="edit_first_name" name="edit_first_name"></div></div><div class="col-lg-6"><div class="mb-3"><label for="edit_last_name" class="form-label">Last Name</label><input type="text" class="form-control" id="edit_last_name" name="edit_last_name"></div></div><div class="col-lg-6"><div class="mb-3"> <div class="crop-image-preview-container image-preview-container"><img id="crop-image" class="edit_preview-selected-image" /> </div><label for="edit_photo" class="form-label">Upload Photo</label><input class="form-control" type="file" accept="image/*" id="edit_photo" name="edit_photo"><input type="text" id="edit_photo_url" name="edit_photo_url" hidden></div></div><div class="col-lg-6"><div class="mb-3" style="display: inline-flex;"><label for="edit_rating" class="form-label">Rating :- </label><div class="rate"><input type="radio" id="edit_star5" name="edit_rating" value="5" /><label for="edit_star5" title="text">5 stars</label><input type="radio" id="edit_star4" name="edit_rating" value="4" /><label for="edit_star4" title="text">4 stars</label><input type="radio" id="edit_star3" name="edit_rating" value="3" /><label for="edit_star3" title="text">3 stars</label><input type="radio" id="edit_star2" name="edit_rating" value="2" /><label for="edit_star2" title="text">2 stars</label><input type="radio" id="edit_star1" name="edit_rating" value="1" /><label for="edit_star1" title="text">1 star</label></div><label id="edit_rating-error" class="error" for="edit_rating"></label></div></div><div class="col-lg-12"><div class="mb-3"><label for="edit_message" class="form-label">Message</label><div class="form-floating"><textarea class="form-control" placeholder="Message " id="edit_message" name="edit_message" style="height: 200px"></textarea><label for="floatingTextarea2"></label></div><label id="edit_message-error" class="error" for="message"></label></div></div>';
                $('#edit_form_content').append(html);
                document.getElementById("edit_first_name").value = data.first_name
                document.getElementById("edit_last_name").value = data.last_name
                document.getElementById("edit_message").value = data.message
                $("#edit_star" + data.rating).prop("checked", true);
                if (data.image_name) {
                    $('.edit_image-preview-container').show();
                    var url = base_url.replace('/public', '')
                    $("#edit_review_form .edit_preview-selected-image").attr("src", url + '/storage/' + data.image_path + "/" + data.image_name)
                }
            } else {
                var html = '<div class="col-lg-12"><div class="mb-3"><label for="edit_video_url" class="form-label">Video url</label><input type="text" class="form-control" id="edit_video_url" name="edit_video_url" /></div></div>'
                $('#edit_form_content').append(html);
                document.getElementById("edit_video_url").value = data.video_url
            }
        }
    });

});
$("form[name='edit_review_form']").on('submit', function (e) {
    e.preventDefault();
}).validate({
    rules: {
        edit_first_name: {
            required: true,
            maxlength: 30,
            validname: true,
            normalizer: function (value) {
                return $.trim(value);
            },
        },
        edit_last_name: {
            required: true,
            maxlength: 30,
            validname: true,
            normalizer: function (value) {
                return $.trim(value);
            },
        },
        edit_photo: {
            extension: "jpg|jpeg|png|ico|bmp|jfif"
        },
        edit_video_url: {
            required: true,
            video_url: true,

        },
        edit_speciality_id: {
            required: true,
        },
        edit_rating: {
            required: true,
        },
        edit_message: {
            required: true,
        },
    },
    messages: {
        edit_first_name: {
            required: "First Name is required",
            maxlength: "First Name is too big",
            validname: "Please enter valid name.",
        },
        edit_last_name: {
            required: "Last Name is required",
            maxlength: "Last Name is too big",
            validname: "Please enter valid name.",
        },
        edit_photo: {
            extension: "Please upload file in these format only (jpg, jpeg, png, ico, bmp,jfif)."
        },
        edit_video_url: {
            required: "Please youtube video url.",
            video_url: "Enter valid youtube video url",
        },
        edit_speciality_id: {
            required: "Choose Speciality",
        },
        edit_rating: {
            required: "Add rating",
        },
        edit_message: {
            required: "Message is required",
        },
    },
    submitHandler: function (form) {
        var formData = new FormData(form);
        $("#edit_review_form button[type='submit']").attr('disabled', true);
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
                    $("#EditReviewModal").modal('hide');
                    $('#edit_review_form').trigger("reset");
                    $('#review_table').DataTable().ajax.reload(null, false);
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
        $("#edit_review_form button[type='submit']").attr('disabled', false);
    }
});
$(document).on('click', '.delete_review', function (e) {
    e.preventDefault();
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
                    url: base_url + '/admin/patient_reviews/' + id,
                    success: function (response) {
                        if (response.success) {
                            $.notify(response.message, {
                                type: 'success'
                            });
                            $('#review_table').DataTable().ajax.reload(null, false)
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
            }
        });

});
$(document).on('change', '#photo', function (event) {
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
$(document).on('change', '#edit_photo', function (event) {
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
