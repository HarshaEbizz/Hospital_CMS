// $(document).ready(function () {
//     defineCKEditor();
// });
// function defineCKEditor() {
//     if (document.getElementsByClassName("content_details").length > 0) {
//         var CKEclassName = document.getElementsByClassName("content_details");
//         for (var i = 0; i <= CKEclassName.length; ++i) {
//             create_ck_editor(CKEclassName[i], "content_details");
//         }
//     }
// }

// function DetailscontentCkEditor(count) {
//     create_ck_editor(document.getElementById("tab_details_" + count), "tab_details")
// };
// function DetailscontentCkEditor(count) {
//     create_ck_editor(document.getElementById("tab_details"), "tab_details")
// };
$(".all_tab_contents").sortable({
    connectWith: ".col-sm-3",
    cursor: "move",
    opacity: 0.6,
    update: function () {
        sendOrderToServer($(this).attr('data-id'));
    },
});
function sendOrderToServer(topic_id) {
    var order = [];
    $(".col-sm-3").each(function (index, element) {
        if ($(this).attr("data-id")) {
            order.push({
                id: $(this).attr("data-id"),
                position: index + 1,
            });
        }
        console.log(topic_id);
    });
    $.ajax({
        type: "POST",
        dataType: "json",
        url: base_url + "/admin/specialities/tab_content/order/"+topic_id,
        data: {
            order: order,
        },
        success: function (response) {
            if (response.success) {
                $.notify(response.message, {
                    type: "success",
                });
            } else {
                $.notify("Something went wrong", {
                    type: "danger",
                });
            }
        },
    });
}
var i = 0;
$(document).on('change', '#tab_content_type', function (e) {
    var val = this.value;
    console.log(val);
    $('.tab_content_field').html('');
    if (val == "content") {
        var html = ' <div class="col-lg-12"><div class="mb-3"><label for="split_content" class="form-label">Split Content</label><select class="form-select form-select custom_select" name="split_content" id="split_content"><option value="divide" selected>Divide</option><option value="full" >Full</option></select></div></div><div class="col-lg-12"><div class="mb-3"><label for="tab_title" class="form-label">Title</label><input type="text" class="form-control" id="tab_title" name="tab_title" class="content_title" required /></div></div><div class="col-lg-12"><div class="mb-3"> <label for="details" class="form-label">Details</label><textarea class="form-control content_details" placeholder="Message " id="tab_details" name="tab_details" style="height: 100px" required></textarea></div><label id="tab_details-error" class="error" for="tab_details"></label></div>';

    } else if (val == "image_content") {
        var html = '<div class="col-lg-12"><div class="mb-3"><label for="image" class="form-label">Image</label><input type="file" accept="image/*" class="form-control content_image" id="tab_image" name="tab_image" required><input type="text" id="tab_image_url" name="tab_image_url" hidden></div></div><div class="col-lg-12"><div class="mb-3"><label for="details" class="form-label">Details</label><textarea class="form-control content_details" placeholder="Message " id="tab_details" name="tab_details" style="height: 100px" required></textarea> </div><label id="tab_details_-error" class="error" for="tab_details"></label></div>'
    } else if (val == 'image') {
        var html = '<div class="col-lg-12"><div class="mb-3"><label for="image" class="form-label">Image</label><input type="file" accept="image/*" class="form-control content_image" id="tab_image" name="tab_image" required><input type="text" id="tab_image_url" name="tab_image_url" hidden></div></div>'
    } else if (val == 'banner_image') {
        var html = '<div class="col-lg-12"><div class="mb-3"><label for="image" class="form-label">Image</label><input type="file" accept="image/*" class="form-control content_image" id="tab_image" name="tab_image" required><input type="text" id="tab_image_url" name="tab_image_url" hidden></div></div><div class="col-lg-12"><div class="mb-3"><label for="tab_title" class="form-label">Title</label><input type="text" class="form-control" id="tab_title" name="tab_title" class="content_title" required /></div></div>'
    } else if (val == 'question_answer') {
        var html = '<div class="col-lg-12"><div class="mb-3"><label for="tab_title" class="form-label">Title</label><input type="text" class="form-control" id="tab_title" name="tab_title" /></div></div><div class="col-lg-12"><div class="mb-3"><label for="sub_title" class="form-label">Sub title</label><input type="text" class="form-control" id="sub_title" name="sub_title" /></div></div><div class="col-lg-12"><div class="mb-3"><label for="question" class="form-label">Question</label><input type="text" class="form-control" id="question" name="question" class="content_title" required /></div></div><div class="col-lg-12"><div class="mb-3"><label for="image" class="form-label">Image</label><input type="file" accept="image/*" class="form-control content_image" id="tab_image" name="tab_image" ><input type="text" id="tab_image_url" name="tab_image_url" hidden></div></div><div class="col-lg-12"><div class="mb-3"><label for="video_url" class="form-label">Video url</label><input type="text" class="form-control " id="video_url" name="video_url" ></div></div><div class="col-lg-12"><div class="mb-3"> <label for="details" class="form-label">Details</label><textarea class="form-control content_details" placeholder="Message " id="tab_details" name="tab_details" style="height: 100px" required></textarea></div><label id="tab_details-error" class="error" for="tab_details"></label></div>'
    } else if (val == 'content_direction') {
        var html = '<div class="col-lg-12"><div class="mb-3"><label for="tab_title" class="form-label">Title</label><input type="text" class="form-control" id="tab_title" name="tab_title" class="content_title"  /></div></div><div class="col-lg-12"><div class="mb-3"><label for="video_url" class="form-label">Video url</label><input type="text" class="form-control " id="video_url" name="video_url" ></div></div><div class="col-lg-12"><div class="mb-3"><label for="image" class="form-label">Image</label><input type="file" accept="image/*" class="form-control content_image" id="tab_image" name="tab_image" ><input type="text" id="tab_image_url" name="tab_image_url" hidden></div></div><div class="col-lg-12"><div class="mb-3"><label for="direction" class="form-label">Image direction</label><select class="form-select custom_select" name="direction" id="direction"><option value="right" selected>Right</option><option value="left">Left</option><option value="center">Center</option></select></div></div ><div class="col-lg-12"><div class="mb-3"><label for="details" class="form-label">Details</label><textarea class="form-control content_details" placeholder="Message " id="tab_details" name="tab_details" style="height: 100px" ></textarea> </div><label id="tab_details_-error" class="error" for="tab_details"></label></div>'
    }
    $('.tab_content_field').append(html);
    create_ck_editor(document.getElementById("tab_details"), "tab_details")
});

$(document).on('click', '.add_tab_content', function (e) {
    var id = $(this).data('id');
    console.log(id);
    $.ajax({
        type: 'GET',
        url: base_url + '/admin/specialities/get_tab_topics/' + id,
        success: function (response) {
            $('#topic_id option').each(function () {
                $(this).remove();
            });
            if (response.success) {
                $('#topic_id').append(`<option value="" selected disabled>Select topic name</option>`);
                for (var i = 0; i < response.data.length; i++) {
                    $('#topic_id').append(`<option value="${response.data[i].id}">${response.data[i].topic_name}</option>`);
                }
                $("#addtabcontentModal").modal("show");
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
})
$(document).on('click', '.edit_box_content', function (e) {
    e.preventDefault();
    id = $(this).attr("data-id");
    $.ajax({
        type: 'GET',
        url: base_url + '/admin/tab_content/' + id + '/edit',
        success: function (data) {
            $('.edit_tab_content_field').html('');
            console.log(data);
            let elem = document.getElementById('edit_tab_content_from');
            elem.setAttribute("action", base_url + '/admin/tab_content/' + data.id)
            elem.setAttribute("data_id", data.id)
            $("#edit_tab_content_from #edit_topic_id option[value='" + data.topic_id + "']").prop("selected", true);
            $("#edit_tab_content_from #edit_tab_content_type option[value='" + data.tab_content_type + "']").prop("selected", true);
            if (data.tab_content_type == "content") {
                var html = ' <div class="col-lg-12"><div class="mb-3"><label for="edit_split_content" class="form-label">Split Content</label><select class="form-select form-select custom_select" name="edit_split_content" id="edit_split_content"><option value="divide">Divide</option><option value="full" >Full</option></select></div></div><div class="col-lg-12"><div class="mb-3"><label for="edit_tab_title" class="form-label">Title</label><input type="text" class="form-control" id="edit_tab_title" name="edit_tab_title" value="" required /></div></div> <div class="col-lg-12"><div class="mb-3" id="edit_tab_details_textarea"><label for="edit_tab_details" class="form-label">Details</label><textarea class="form-control content_details" placeholder="Message " id="edit_tab_details" name="edit_tab_details" style="height: 100px" required></textarea></div><label id="edit_tab_details-error" class="error" for="edit_tab_details"></label></div>';
                $('.edit_tab_content_field').prepend(html);
                $("#edit_tab_content_from #edit_split_content option[value='" + data.split_content + "']").prop("selected", true);
                $("#edit_tab_content_from #edit_tab_title").attr('value', data.tab_title)
            } else if (data.tab_content_type == "image_content") {
                var html = '<div class="col-lg-12"><div class="mb-3"><div class="crop-image-preview-container "><img id="crop-image" class="edit_preview-selected-image" /></div><label for="image" class="form-label">Image</label><input type="file" accept="image/*" class="form-control content_image" id="edit_tab_image" name="edit_tab_image" ><input type="text" id="edit_tab_image_url" name="edit_tab_image_url" hidden></div></div> <div class="col-lg-12"><div class="mb-3" id="edit_tab_details_textarea"><label for="edit_tab_details" class="form-label">Details</label><textarea class="form-control content_details" placeholder="Message " id="edit_tab_details" name="edit_tab_details" style="height: 100px" required></textarea></div><label id="edit_tab_details-error" class="error" for="edit_tab_details"></label></div>'
                $('.edit_tab_content_field').prepend(html);
                $("#edit_tab_content_from .edit_preview-selected-image").attr("src", base_url.replace("/public", "") + "/storage/" + data.image_path + data.image_name);
            } else if (data.tab_content_type == 'image') {
                var html = '<div class="col-lg-12"><div class="mb-3"><div class="crop-image-preview-container "><img id="crop-image" class="edit_preview-selected-image" /></div><label for="image" class="form-label">Image</label><input type="file" accept="image/*" class="form-control content_image" id="edit_tab_image" name="edit_tab_image" ><input type="text" id="edit_tab_image_url" name="edit_tab_image_url" hidden></div></div>'
                $('.edit_tab_content_field').prepend(html);
                $("#edit_tab_content_from .edit_preview-selected-image").attr("src", base_url.replace("/public", "") + "/storage/" + data.image_path + data.image_name);
            } else if (data.tab_content_type == 'banner_image') {
                var html = '<div class="col-lg-12"><div class="mb-3"><div class="crop-image-preview-container "><img id="crop-image" class="edit_preview-selected-image" /></div><label for="image" class="form-label">Image</label><input type="file" accept="image/*" class="form-control content_image" id="edit_tab_image" name="edit_tab_image" ><input type="text" id="edit_tab_image_url" name="edit_tab_image_url" hidden></div></div><div class="col-lg-12"><div class="mb-3"><label for="edit_tab_title" class="form-label">Title</label><input type="text" class="form-control" id="edit_tab_title" name="edit_tab_title" value="" required /></div></div>'
                $('.edit_tab_content_field').prepend(html);
                $("#edit_tab_content_from #edit_tab_title").attr('value', data.tab_title)
                $("#edit_tab_content_from .edit_preview-selected-image").attr("src", base_url.replace("/public", "") + "/storage/" + data.image_path + data.image_name);
            } else if (data.tab_content_type == 'question_answer') {
                var html = '<div class="col-lg-12"><div class="mb-3"><label for="edit_tab_title" class="form-label">Title</label><input type="text" class="form-control" id="edit_tab_title" name="edit_tab_title" class="content_title" /></div></div><div class="col-lg-12"><div class="mb-3"><label for="edit_sub_title" class="form-label">Sub title</label><input type="text" class="form-control" id="edit_sub_title" name="edit_sub_title" /></div></div><div class="col-lg-12"><div class="mb-3"><label for="edit_question" class="form-label">Question</label><input type="text" class="form-control" id="edit_question" name="edit_question" class="" required /></div></div><div class="col-lg-12"><div class="mb-3"><div class="crop-image-preview-container "><img id="crop-image" class="edit_preview-selected-image" /></div><label for="image" class="form-label">Image</label><input type="file" accept="image/*" class="form-control content_image" id="edit_tab_image" name="edit_tab_image" ><input type="text" id="edit_tab_image_url" name="edit_tab_image_url" hidden></div></div><div class="col-lg-12"><div class="mb-3"><label for="edit_video_url" class="form-label">Video url</label><input type="text" class="form-control " id="edit_video_url" name="edit_video_url" ></div></div><div class="col-lg-12"><div class="mb-3" id="edit_tab_details_textarea"> <label for="details" class="form-label">Details</label><textarea class="form-control content_details" placeholder="Message " id="edit_tab_details" name="edit_tab_details" style="height: 100px" required></textarea></div><label id="edit_tab_details-error" class="error" for="edit_tab_details"></label></div>'
                $('.edit_tab_content_field').prepend(html);
                $("#edit_tab_content_from #edit_video_url").attr('value', data.video_url)
                $("#edit_tab_content_from #edit_tab_title").attr('value', data.tab_title)
                $("#edit_tab_content_from #edit_question").attr('value', data.question)
                $("#edit_tab_content_from #edit_sub_title").attr('value', data.sub_title)
                $("#edit_tab_content_from .edit_preview-selected-image").attr("src", base_url.replace("/public", "") + "/storage/" + data.image_path + data.image_name);
            } else if (data.tab_content_type == 'content_direction') {
                var html = '<div class="col-lg-12"><div class="mb-3"><label for="edit_tab_title" class="form-label">Title</label><input type="text" class="form-control" id="edit_tab_title" name="edit_tab_title" class="content_title"  /></div></div><div class="col-lg-12"><div class="mb-3"><label for="edit_video_url" class="form-label">Video url</label><input type="text" class="form-control " id="edit_video_url" name="edit_video_url" ></div></div><div class="col-lg-12"><div class="mb-3"><div class="crop-image-preview-container "><img id="crop-image" class="edit_preview-selected-image" /></div><label for="image" class="form-label">Image</label><input type="file" accept="image/*" class="form-control content_image" id="edit_tab_image" name="edit_tab_image" ><input type="text" id="edit_tab_image_url" name="edit_tab_image_url" hidden></div></div><div class="col-lg-12"><div class="mb-3"><label for="edit_direction" class="form-label">Image direction</label><select class="form-select custom_select" name="edit_direction" id="edit_direction"><option value="right" selected>Right</option><option value="left">Left</option><option value="center">Center</option></select></div></div ><div class="col-lg-12"><div class="mb-3"  id="edit_tab_details_textarea"><label for="details" class="form-label">Details</label><textarea class="form-control content_details" placeholder="Message " id="edit_tab_details" name="edit_tab_details" style="height: 100px" ></textarea> </div><label id="edit_tab_details-error" class="error" for="edit_tab_details"></label></div>'
                $('.edit_tab_content_field').prepend(html);
                $("#edit_tab_content_from #edit_video_url").attr('value', data.video_url)
                $("#edit_tab_content_from #edit_tab_title").attr('value', data.tab_title)
                $("#edit_tab_content_from #edit_direction option[value='" + data.direction + "']").prop("selected", true);
                $("#edit_tab_content_from .edit_preview-selected-image").attr("src", base_url.replace("/public", "") + "/storage/" + data.image_path + data.image_name);
            }
            $("#edit_tab_details_textarea").html('');
            $("#edit_tab_details_textarea").html('<label for="edit_tab_details" class="form-label">Details</label><textarea class="form-control" id="edit_tab_details" name="edit_tab_details" style="height: 100px"></textarea>');
            create_ck_editor(document.getElementById("edit_tab_details"), "edit_tab_details", data.tab_details)
            // create_ck_editor(document.getElementById("edit_tab_details"),"edit_tab_details",data.tab_details)
            $("#edittabcontentModal").modal('show');
        }
    });
});

$(document).on('change', '#edit_tab_content_type', function (e) {
    e.preventDefault();
    var id = $('#edit_tab_content_from').attr('data_id');
    var val = this.value;
    $.ajax({
        type: 'GET',
        url: base_url + '/admin/tab_content/' + id + '/edit',
        success: function (data) {
            $('.edit_tab_content_field').html('');
            // console.log(data);
            let elem = document.getElementById('edit_tab_content_from');
            elem.setAttribute("action", base_url + '/admin/tab_content/' + data.id)
            elem.setAttribute("data_id", data.id)
            if (val == "content") {
                var html = ' <div class="col-lg-12"><div class="mb-3"><label for="edit_split_content" class="form-label">Split Content</label><select class="form-select form-select custom_select" name="edit_split_content" id="edit_split_content"><option value="divide">Divide</option><option value="full" >Full</option></select></div></div><div class="col-lg-12"><div class="mb-3"><label for="edit_tab_title" class="form-label">Title</label><input type="text" class="form-control" id="edit_tab_title" name="edit_tab_title" value="" required /></div></div> <div class="col-lg-12"><div class="mb-3" id="edit_tab_details_textarea"><label for="edit_tab_details" class="form-label">Details</label><textarea class="form-control content_details" placeholder="Message " id="edit_tab_details" name="edit_tab_details" style="height: 100px" required></textarea></div><label id="edit_tab_details-error" class="error" for="edit_tab_details"></label></div>';
                $('.edit_tab_content_field').prepend(html);
                $("#edit_tab_content_from #edit_split_content option[value='" + data.split_content + "']").prop("selected", true);
                $("#edit_tab_content_from #edit_tab_title").attr('value', data.tab_title)
            } else if (val == "image_content") {
                var html = '<div class="col-lg-12"><div class="mb-3"><div class="crop-image-preview-container "><img id="crop-image" class="edit_preview-selected-image" /></div><label for="image" class="form-label">Image</label><input type="file" accept="image/*" class="form-control content_image" id="edit_tab_image" name="edit_tab_image" ><input type="text" id="edit_tab_image_url" name="edit_tab_image_url" hidden></div></div> <div class="col-lg-12"><div class="mb-3" id="edit_tab_details_textarea"><label for="edit_tab_details" class="form-label">Details</label><textarea class="form-control content_details" placeholder="Message " id="edit_tab_details" name="edit_tab_details" style="height: 100px" required></textarea></div><label id="edit_tab_details-error" class="error" for="edit_tab_details"></label></div>'
                $('.edit_tab_content_field').prepend(html);
                $("#edit_tab_content_from .edit_preview-selected-image").attr("src", base_url.replace("/public", "") + "/storage/" + data.image_path + data.image_name);
            } else if (val == 'image') {
                var html = '<div class="col-lg-12"><div class="mb-3"><div class="crop-image-preview-container "><img id="crop-image" class="edit_preview-selected-image" /></div><label for="image" class="form-label">Image</label><input type="file" accept="image/*" class="form-control content_image" id="edit_tab_image" name="edit_tab_image" ><input type="text" id="edit_tab_image_url" name="edit_tab_image_url" hidden></div></div>'
                $('.edit_tab_content_field').prepend(html);
                $("#edit_tab_content_from .edit_preview-selected-image").attr("src", base_url.replace("/public", "") + "/storage/" + data.image_path + data.image_name);
            } else if (val == 'banner_image') {
                var html = '<div class="col-lg-12"><div class="mb-3"><div class="crop-image-preview-container "><img id="crop-image" class="edit_preview-selected-image" /></div><label for="image" class="form-label">Image</label><input type="file" accept="image/*" class="form-control content_image" id="edit_tab_image" name="edit_tab_image" ><input type="text" id="edit_tab_image_url" name="edit_tab_image_url" hidden></div></div><div class="col-lg-12"><div class="mb-3"><label for="edit_tab_title" class="form-label">Title</label><input type="text" class="form-control" id="edit_tab_title" name="edit_tab_title" value="" required /></div></div>'
                $('.edit_tab_content_field').prepend(html);
                $("#edit_tab_content_from #edit_tab_title").attr('value', data.tab_title)
                $("#edit_tab_content_from .edit_preview-selected-image").attr("src", base_url.replace("/public", "") + "/storage/" + data.image_path + data.image_name);
            } else if (val == 'question_answer') {
                var html = '<div class="col-lg-12"><div class="mb-3"><label for="edit_tab_title" class="form-label">Title</label><input type="text" class="form-control" id="edit_tab_title" name="edit_tab_title" class="content_title" /></div></div><div class="col-lg-12"><div class="mb-3"><label for="sub_title" class="form-label">Sub title</label><input type="text" class="form-control" id="sub_title" name="sub_title" /></div></div><div class="col-lg-12"><div class="mb-3"><label for="edit_question" class="form-label">Question</label><input type="text" class="form-control" id="edit_question" name="edit_question" class="" required /></div></div><div class="col-lg-12"><div class="mb-3"><div class="crop-image-preview-container "><img id="crop-image" class="edit_preview-selected-image" /></div><label for="image" class="form-label">Image</label><input type="file" accept="image/*" class="form-control content_image" id="edit_tab_image" name="edit_tab_image" ><input type="text" id="edit_tab_image_url" name="edit_tab_image_url" hidden></div></div><div class="col-lg-12"><div class="mb-3"><label for="edit_video_url" class="form-label">Video url</label><input type="text" class="form-control " id="edit_video_url" name="edit_video_url" ></div></div><div class="col-lg-12"><div class="mb-3" id="edit_tab_details_textarea"> <label for="details" class="form-label">Details</label><textarea class="form-control content_details" placeholder="Message " id="edit_tab_details" name="edit_tab_details" style="height: 100px" required></textarea></div><label id="edit_tab_details-error" class="error" for="edit_tab_details"></label></div>'
                $('.edit_tab_content_field').prepend(html);
                $("#edit_tab_content_from #edit_video_url").attr('value', data.video_url)
                $("#edit_tab_content_from #edit_tab_title").attr('value', data.tab_title)
                $("#edit_tab_content_from #edit_question").attr('value', data.question)
                $("#edit_tab_content_from .edit_preview-selected-image").attr("src", base_url.replace("/public", "") + "/storage/" + data.image_path + data.image_name);
            }else if (val == 'content_direction') {
                var html = '<div class="col-lg-12"><div class="mb-3"><label for="edit_tab_title" class="form-label">Title</label><input type="text" class="form-control" id="edit_tab_title" name="edit_tab_title" class="content_title"  /></div></div><div class="col-lg-12"><div class="mb-3"><label for="edit_video_url" class="form-label">Video url</label><input type="text" class="form-control " id="edit_video_url" name="edit_video_url" ></div></div><div class="col-lg-12"><div class="mb-3"><div class="crop-image-preview-container "><img id="crop-image" class="edit_preview-selected-image" /></div><label for="image" class="form-label">Image</label><input type="file" accept="image/*" class="form-control content_image" id="edit_tab_image" name="edit_tab_image" ><input type="text" id="edit_tab_image_url" name="edit_tab_image_url" hidden></div></div><div class="col-lg-12"><div class="mb-3"><label for="edit_direction" class="form-label">Image direction</label><select class="form-select custom_select" name="edit_direction" id="edit_direction"><option value="right" selected>Right</option><option value="left">Left</option><option value="center">Center</option></select></div></div ><div class="col-lg-12"><div class="mb-3"  id="edit_tab_details_textarea"><label for="details" class="form-label">Details</label><textarea class="form-control content_details" placeholder="Message " id="edit_tab_details" name="edit_tab_details" style="height: 100px" ></textarea> </div><label id="edit_tab_details-error" class="error" for="edit_tab_details"></label></div>'
                $('.edit_tab_content_field').prepend(html);
                $("#edit_tab_content_from #edit_video_url").attr('value', data.video_url)
                $("#edit_tab_content_from #edit_tab_title").attr('value', data.tab_title)
                $("#edit_tab_content_from #edit_direction option[value='" + data.direction + "']").prop("selected", true);
                $("#edit_tab_content_from .edit_preview-selected-image").attr("src", base_url.replace("/public", "") + "/storage/" + data.image_path + data.image_name);
            }
            $("#edit_tab_details_textarea").html('');
            $("#edit_tab_details_textarea").html('<label for="edit_tab_details" class="form-label">Details</label><textarea class="form-control" id="edit_tab_details" name="edit_tab_details" style="height: 100px"></textarea>');
            create_ck_editor(document.getElementById("edit_tab_details"), "edit_tab_details", data.tab_details)
        }
    });

})
$("form[name='edit_tab_content_from']").on('submit', function (e) {
    e.preventDefault();
}).validate({
    debug: false,
    ignore: [],
    rules: {
        edit_topic_id: {
            required: true,
        },
        edit_tab_content_type: {
            required: true,
        },
        edit_split_content: {
            required: true,
        },
        // edit_tab_title: {
        //     required: true,
        // },
        // edit_tab_details: {
        //     required: true,
        // },
        // edit_video_url: {
        //     video_url: true,
        // },
    },
    messages: {
        edit_topic_id: {
            required: "topic Name is required",
        },
        edit_tab_content_type: {
            required: "Select content type",
        },
        edit_split_content: {
            required: "Select content part type",
        },
        // edit_tab_title: {
        //     required: "title is required.",
        // },
        // edit_tab_details: {
        //     required: "Details is required.",
        // },
        // edit_video_url: {
        //     video_url: "Enter valid youtube video url",
        // },
    },
    submitHandler: function (form) {
        var form_data = new FormData(form);
        $("#edit_tab_content_from button[type='submit']").attr('disabled', true);
        $.ajax({
            url: $(form).attr("action"),
            type: 'POST',
            data: form_data,
            contentType: false,
            processData: false,
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
                    location.reload();
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
        $("#edit_tab_content_from button[type='submit']").attr('disabled', false);
    }
});
$("form[name='add_tab_content_from']").on('submit', function (e) {
    e.preventDefault();
}).validate({
    debug: false,
    ignore: [],
    rules: {
        topic_id: {
            required: true,
        },
        tab_content_type: {
            required: true,
        },
        split_content: {
            required: true,
        },
        // tab_title: {
        //     required: true,
        // },
        // tab_details: {
        //     required: true,
        // },
        // tab_image: {
        //     required: true,
        // },
        // video_url: {
        //     video_url: true,
        // },
    },
    messages: {
        topic_id: {
            required: "topic Name is required",
        },
        tab_content_type: {
            required: "Select content type",
        },
        split_content: {
            required: "Select content part type",
        },
        // tab_title: {
        //     required: "title is required.",
        // },
        // tab_details: {
        //     required: "Details is required.",
        // },
        // tab_image: {
        //     required: "image is required.",
        // },
        // video_url: {
        //     video_url: "Enter valid youtube video url",
        // },
    },
    submitHandler: function (form) {
        var form_data = new FormData(form);
        $("#add_topics_from button[type='submit']").attr('disabled', true);
        $.ajax({
            url: $(form).attr("action"),
            type: 'POST',
            data: form_data,
            contentType: false,
            processData: false,
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
                    location.reload();
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
        $("#add_topics_from button[type='submit']").attr('disabled', false);
    }
});
$("form[name='add_topics_from']").on('submit', function (e) {
    e.preventDefault();
}).validate({
    rules: {
        topic_name: {
            required: true,
        },
    },
    messages: {
        topic_name: {
            required: "topic Name is required",
        },
    },
    submitHandler: function (form) {
        var form_data = $(form).serialize();
        $("#add_topics_from button[type='submit']").attr('disabled', true);
        $.ajax({
            url: $(form).attr("action"),
            type: 'POST',
            data: form_data,
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
                    var name = "'" + response.data.topic_name + "'";
                    // console.log(name);
                    $('.tab').append('<button class="tablinks" onclick="opentab(this,' + name + ')" data_id="' + response.data.id + '">' + response.data.topic_name + '</button>')
                    $('.nav-tabContent').append('<div id="' + response.data.topic_name + '" class="tabcontent tab_' + response.data.id + '"><div class="row"><div class="col-lg-6"><h3 class="tab_heading" data-id="' + response.data.id + '">' + response.data.topic_name + '</h3></div><div class="col-lg-2" style="width:10%"><input class="tgl status_btn" type="checkbox" data-toggle="toggle" data-width="100" id="is_show" name="is_show" data-on="Show" data-off="Hide" data-onstyle="success" data-offstyle="danger" value="' + response.data.id + '" checked></div><div class="col-lg-2" style="width:100px"><button type="button" class="btn btn-primary btn-icon-text edit_topic" data-id="' + response.data.id + '"><i class="fa fa-solid fa-pencil"></i></button></div><div class="col-lg-2" style="width:100px"><button type="button" class="btn btn-danger btn-icon-text delete_topic" data-id="' + response.data.id + '"><i class="fa fa-solid fa-trash"></i></button></div></div></div>')
                    $('.tgl').bootstrapToggle()
                    $("#addtopicModal").modal("hide");
                    $('#add_topics_from').trigger("reset");

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
        $("#add_topics_from button[type='submit']").attr('disabled', false);
    }
});

$(document).on('click', '.edit_topic', function (e) {
    e.preventDefault();
    id = $(this).attr("data-id");
    // console.log(id);
    $.ajax({
        type: 'GET',
        url: base_url + '/admin/topics/' + id + '/edit',
        success: function (data) {
            $("#edittopicModal").modal('show');
            let elem = document.getElementById('edit_topics_from');
            elem.setAttribute("action", base_url + '/admin/topics/' + data.id)
            elem.setAttribute("data_id", data.id)
            document.getElementById("edit_topic_name").value = data.topic_name
        }
    });
});
$("form[name='edit_topics_from']").on('submit', function (e) {
    e.preventDefault();
}).validate({
    rules: {
        edit_topic_name: {
            required: true,
        },
    },
    messages: {
        edit_topic_name: {
            required: "topic Name is required",
        },
    },
    submitHandler: function (form) {
        var form_data = $(form).serialize();
        $("#edit_topics_from button[type='submit']").attr('disabled', true);
        $.ajax({
            url: $(form).attr("action"),
            type: 'POST',
            data: form_data,
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
                    var name = "'" + response.data.topic_name + "'";
                    // console.log(name);
                    $(".tablinks").each(function () {
                        if ((($(this).attr('data_id')) == id)) {
                            $(this).html(response.data.topic_name)
                        }
                    });
                    $(".tab_heading").each(function () {
                        console.log($(this));
                        if ((($(this).attr('data-id')) == id)) {
                            $(this).html(response.data.topic_name)
                        }
                    });
                    // $('.tab').append('<button class="tablinks" onclick="opentab(this,' + name + ')">' + response.data.topic_name + '</button>')
                    // $('.nav-tabContent').append('<div id="' + response.data.topic_name + '" class="tabcontent"><h3>' + response.data.topic_name + '</h3><div class="row"><div class="col-lg-4 pe-2"><div class="mb-3"><label for="tab_content_type" class="form-label">Content Type</label><select class="form-select form-select custom_select" name="tab_content_type" id="tab_content_type_' + response.data.id + '"><option value="" selected disabled>Select Content Type</option> <option value="image_content">Image & Content</option><option value="content">Content</option></select></div></div><div class="col-lg-6"><div class="mb-3" style="margin-top: 28px;"><button type="button" class="btn btn-success btn-rounded btn-icon spec_img_btn" id="add_content" style="height: 38px;" data-id="' + response.data.id + '">Add Content &nbsp;</button></div></div></div> <div class="row" id="add_content_inputs_' + response.data.id + '"><form action="#" method="POST" id="edit_tab_content_form_' + response.data.id + '" name="edit_tab_content_form[]" enctype="multipart/form-data" style="display:none"><input type="hidden" name="topic_id[]" id="topic_id_' + response.data.id + '" value="' + response.data.id + '"><div><button class="btn btn_green" type="submit" disabled >UPDATE</button></div></form></div></div>')
                    $("#edittopicModal").modal("hide");
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
        $("#edit_topics_from button[type='submit']").attr('disabled', false);
    }
});
$(document).on('click', '.delete_topic', function (e) {
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
                id = $(this).attr('data-id');
                $.ajax({
                    type: 'DELETE',
                    url: base_url + '/admin/topics/' + id,
                    "initComplete": function (settings, json) {
                        $('.tgl').bootstrapToggle()
                    },
                    success: function (response) {
                        console.log(response);
                        if (response.success) {
                            $.notify(response.message, {
                                type: 'success'
                            });
                            $(".tablinks").each(function () {
                                if ((($(this).attr('data_id')) == id)) {
                                    $(this).remove();
                                }
                            });
                            $(".tabcontent").each(function () {
                                if ((($(this).hasClass('tab_' + id)))) {
                                    $(this).remove();
                                }
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
$(document).on('click', '.delete_box_content', function (e) {
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
                id = $(this).attr('data-id');
                console.log(id);
                $.ajax({
                    type: 'DELETE',
                    url: base_url + '/admin/tab_content/' + id,
                    "initComplete": function (settings, json) {
                        $('.tgl').bootstrapToggle()
                    },
                    success: function (response) {
                        console.log(response);
                        if (response.success) {
                            $.notify(response.message, {
                                type: 'success'
                            });
                            console.log($("#content_card_" + id));
                            $("#content_card_" + id).remove();
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

$(document).on('change', '.status_btn', function (e) {
    e.preventDefault();
    id = this.value;
    $.ajax({
        type: 'GET',
        url: base_url + '/admin/specialities/topics/status/' + id,
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

function opentab(evt, topic) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(topic).style.display = "block";
    // evt.currentTarget.className += " active";
}

$(document).on('change', '.content_image', function (e) {
    e.preventDefault();
    var file = event.target.files[0];
    var fileName = e.target.files[0].name;
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

// function valid_input(topic_id) {
//     // $("#edit_tab_content_form_" + topic_id).validate({
//     var is_valid = true;
//     $(".tab_title_" + topic_id).each(function () {
//         if ($(this).val() == '') {
//             $.notify('"Title is required."', {
//                 type: 'danger'
//             });
//             is_valid = false;
//             return false;
//         }
//     });
//     $(".tab_details_" + topic_id).each(function () {
//         if ($(this).val() == '') {
//             $.notify('"Details is required."', {
//                 type: 'danger'
//             });
//             is_valid = false;
//             return false;
//         }
//     });
//     if ($(".tab_image_" + topic_id).val() == '') {
//         var pre_tag_class = document.getElementById("tab_image_" + topic_id).parentElement.firstElementChild;
//         console.log(pre_tag_class);
//         if (!pre_tag_class.className.includes("crop-image-preview-container")) {
//             $.notify('"Image is required."', {
//                 type: 'danger'
//             });
//             // alert('"Image is required."');
//             is_valid = false;
//             return false;
//         }

//     }
//     return is_valid;
//     // });
// }
// function valid_form(topic_id) {
//     // console.log(topic_id);
//     // console.log($("#edit_tab_content_form_" + topic_id));
//     if (valid_input(topic_id)) {
//         console.log("in");
//         var form_name = "edit_tab_content_form_" + topic_id;
//         console.log(form_name);
//         var form_data = new FormData(document.getElementById(form_name));
//         console.log(form_data);
//         // var form_data = new FormData(form);
//         $("#edit_tab_content_form_" + topic_id).attr('disabled', true);
//         $.ajax({
//             url: $('#' + form_name).attr("action"),
//             type: 'POST',
//             data: form_data,
//             contentType: false,
//             processData: false,
//             beforeSend: function () {
//                 $(".loader").show();
//             },
//             complete: function () {
//                 $(".loader").hide();
//             },
//             success: function (response) {
//                 if (response.success) {
//                     $.notify(response.message, {
//                         type: 'success'
//                     });
//                     location.reload();
//                 } else if (!response.success) {
//                     $.notify(response.message, {
//                         type: 'danger'
//                     });
//                 } else {
//                     $.notify('Something went wrong', {
//                         type: 'danger'
//                     });
//                 }
//             }
//         });
//         $("#edit_tab_content_form_" + topic_id).attr('disabled', false);
//     }
// }
// $(document).on('click', '#add_content', function (e) {
//     var topic_id = $(this).data('id');
//     var tab_content_type = $('#tab_content_type_' + topic_id).val();
//     var chk_class = $("div").hasClass("specialiti_img_section_" + topic_id);
//     if (tab_content_type != null) {
//         if (chk_class == false || tab_content_type == 'content') {
//             e.preventDefault();
//             i++;
//             $.ajax({
//                 type: 'GET',
//                 url: base_url + '/admin/specialities/tab_content/' + i + '/' + tab_content_type + '/' + topic_id,
//                 success: function (response) {
//                     $("#add_content_inputs_" + topic_id).prepend(response.html);
//                     DetailscontentCkEditor(i);
//                     $('#edit_tab_content_form_' + topic_id).show();
//                 }
//             });
//         } else {
//             // alert("Sorry.. You can select only one image")
//             $.notify("Sorry.. You can select only one time image.", {
//                 type: 'danger'
//             });
//         }
//     } else {
//         $.notify("Please select content type first", {
//             type: 'danger'
//         });
//     }
// });
// $(document).on('click', '.delete_box', function (e) {
//     e.preventDefault();
//     value = $(this).attr('data_id');
//     $("#content_card_" + value).remove();
// });
