@if ($content_type == 'image_content')
<div class="content_card specialiti_img_section" id="content_card_{{ $count }}" style="margin-bottom: 10px;" data-id="{{$content_type}}">
    <div class="card-body">
        <div class="card-title">
            <button type="button" class="btn btn-danger btn-icon-text delete_box" data_id="{{ $count }}" style="float: right;">
                <i class="fa fa-solid fa-trash"></i></button>
        </div>
        <input type="hidden" name="content_for[]" id="content_for" value="image_content">
        <input type="hidden" id="title_{{ $count }}" name="title[]" value="null" hidden/>
        <div class="row mb-3">
            <div class="col-lg-12 pe-2">
                <div class="mb-3">
                    <label for="direction" class="form-label">Image direction</label>
                    <select class="form-select custom_select" name="direction[]" id="direction_{{$count}}" required>
                        <option value="right" selected>Right</option>
                        <option value="left">Left</option>
                        <option value="center">Center</option>
                    </select>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="mb-3">
                    <label for="image" class="form-label">Image</label>
                    <input type="file" accept="image/*" class="form-control content_image testing" id="image_{{$count}}" name="image[]" data_id="{{ $count }}" required>
                    <input type="text" class="hello_test" id="image_{{$count}}_url" name="image_{{$count}}_url" hidden>
                    {{-- <input type="text" id="image_url_{{$count}}" name="image_url_{{$count}}" > --}}
                </div>
            </div>

            <div class="col-lg-12">
                <div class="mb-3">
                    <label for="details" class="form-label">Details</label>
                    <textarea class="form-control content_details" placeholder="Message " id="details_{{ $count }}" name="details[]" style="height: 100px" required></textarea>
                </div>
                <label id="details_{{ $count }}-error" class="error" for="details_{{ $count }}"></label>
            </div>

        </div>
    </div>
</div>
@elseif ($content_type == 'content')
<div class="content_card" id="content_card_{{ $count }}" style="margin-bottom: 10px;" data-id="{{$content_type}}">
    <div class="card-body">
        <div class="card-title">
            <button type="button" class="btn btn-danger btn-icon-text delete_box" data_id="{{ $count }}" style="float: right;">
                <i class="fa fa-solid fa-trash"></i></button>
        </div>
        <input type="hidden" name="content_for[]" id="content_for" value="content">
        <input type="hidden" id="direction_{{$count}}" name="direction[]" value="null" hidden>
        <input type="hidden" id="image_{{$count}}" name="image[]" value="null" hidden>
        {{-- <input type="hidden" id="image_{{$count}}_url" name="image_{{$count}}_url" value="null" hidden> --}}
        <input type="hidden" id="image_url_{{$count}}" name="image_url_{{$count}}" value="null" hidden>

        <div class="col-lg-12">
            <div class="mb-3">
                <label for="name" class="form-label">Title</label>
                <input type="text" class="form-control" id="title_{{ $count }}" name="title[]" class="content_title" required />
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-lg-12">
                <div class="mb-3">
                    <label for="details" class="form-label">Details</label>
                    <textarea class="form-control content_details" placeholder="Message " id="details_{{ $count }}" name="details[]" style="height: 100px" required></textarea>
                </div>
                <label id="details_{{ $count }}-error" class="error" for="details_{{ $count }}"></label>
            </div>
        </div>
    </div>
</div>
@elseif ($content_type == 'image')
<div class="content_card specialiti_img_section" id="content_card_{{ $count }}" style="margin-bottom: 10px;" data-id="{{$content_type}}">
    <div class="card-body">
        <div class="card-title">
            <button type="button" class="btn btn-danger btn-icon-text delete_box" data_id="{{ $count }}" style="float: right;">
                <i class="fa fa-solid fa-trash"></i></button>
        </div>
        <input type="hidden" name="content_for[]" id="content_for" value="image">
        <input type="hidden" id="title_{{ $count }}" name="title[]" value="null" hidden />
        <input type="hidden" id="details_{{ $count }}" name="details[]" value="null" hidden />
        <input type="hidden" id="direction_{{ $count }}" name="direction[]" value="null" hidden><br>
        <div class="row mb-3">
            <div class="col-lg-12">
                <div class="mb-3">
                    <label for="video_url" class="form-label">Video URL</label>
                    <input type="text" class="form-control content_image" id="video_url_{{ $count }}" name="video_url[]" data_id="{{ $count }}">
                    {{-- <input type="text" id="video_url" name="video_url" hidden> --}}
                </div>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-lg-12">
                <div class="mb-3">
                    <label for="image" class="form-label">Image</label>
                    <input type="file" accept="image/*" class="form-control content_image" id="image_{{ $count }}" name="image[]" data_id="{{ $count }}" required>
                    <input type="text" id="image_{{ $count }}_url" name="image_{{ $count }}_url" hidden>
                </div>
            </div>
        </div>
    </div>
</div>
@endif

