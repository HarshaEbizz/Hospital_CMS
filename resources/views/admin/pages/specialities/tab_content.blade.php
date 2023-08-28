@if($tab_content_type =="image_content")
<div class="content_card specialiti_img_section_{{$topic_id}}" id="content_card_{{$count}}" style="margin-bottom: 10px;" data-id="image_content">
    <div class="card-body">
        <div class="card-title">
            <button type="button" class="btn btn-danger btn-icon-text p" data_id="{{$count}}" style="float: right;">
                <i class="fa fa-solid fa-trash"></i></button>
        </div>
        <div class="row mb-3">
            <input type="hidden" name="tab_content_for[]" id="tab_content_for_{{$count}}" value="image_content">
            <input type="hidden" id="tab_title_{{ $count }}" name="tab_title[]" value="null" hidden />
            <input type="hidden" id="split_content_{{ $count }}" name="split_content[]" value="null" hidden />
            <div class="col-lg-12">
                <div class="mb-3">
                    <label for="image" class="form-label">Image</label>
                    <input type="file" accept="image/*" class="form-control content_image tab_image_{{$topic_id}}" id="tab_image_{{$topic_id}}" name="tab_image_{{$topic_id}}" data_id="{{$count}}" required>
                    <input type="text" id="tab_image_{{$topic_id}}_url" name="tab_image_{{$topic_id}}_url" hidden>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="mb-3">
                    <label for="details" class="form-label">Details</label>
                    <textarea class="form-control content_details tab_details_{{$topic_id}}" placeholder="Message " id="tab_details_{{$count}}" name="tab_details[]" style="height: 100px" required></textarea>
                </div>
                <label id="details_{{$count}}-error" class="error" for="details_{{$count}}"></label>
            </div>

        </div>
    </div>
</div>
@endif
@if($tab_content_type =="content")
<div class="content_card" id="content_card_{{$count}}" style="margin-bottom: 10px;" data-id="content">
    <div class="card-body">
        <div class="card-title">
            <button type="button" class="btn btn-danger btn-icon-text delete_box" data_id="{{$count}}" style="float: right;">
                <i class="fa fa-solid fa-trash"></i>
            </button>
        </div>
        <div class="row mb-3">
            <input type="hidden" name="tab_content_for[]" id="tab_content_for_{{$count}}" value="content">
            <div class="col-lg-12">
                <div class="mb-3">
                    <label for="split_content" class="form-label">Split Content</label>
                    <select class="form-select form-select custom_select" name="split_content[]" id="split_content_{{$count}}" data-id="{{$count}}">
                        <option value="full" selected>Full</option>
                        <option value="divide">Divide</option>
                    </select>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="mb-3">
                    <label for="name" class="form-label">Title</label>
                    <input type="text" class="form-control tab_title_{{$topic_id}}" id="tab_title_{{$count}}" name="tab_title[]" class="content_title" required />
                </div>
            </div>
            <div class="col-lg-12">
                <div class="mb-3">
                    <label for="details" class="form-label">Details</label>
                    <textarea class="form-control content_details tab_details_{{$topic_id}}" placeholder="Message " id="tab_details_{{$count}}" name="tab_details[]" style="height: 100px" required></textarea>
                </div>
                <label id="tab_details_{{$count}}-error" class="error" for="tab_details_{{$count}}"></label>
            </div>
        </div>
    </div>
</div>
@endif