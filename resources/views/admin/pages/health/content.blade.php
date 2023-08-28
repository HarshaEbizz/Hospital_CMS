<div class="content_card mb-3" id="sub_description_{{$count}}">
    <div class="card-body">
        <div class="card-title">
            <button type="button" class="btn btn-danger btn-icon-text delete_box" data_id="{{$count}}" style="float: right;">
                <i class="fa fa-solid fa-trash"></i></button>
        </div>
        <div class="row mb-3">
            <div class="col-lg-12">
                <div class="mb-3">
                    <label for="name" class="form-label">Sub Title</label>
                    <input type="text" class="form-control" id="sub_title_{{$count}}" name="sub_title_{{ $title == 'title_2'? '2' : '3' }}[]" class="content_title" />
                </div>
            </div>
            <div class="col-lg-12">
                <div class="mb-3">
                    <label for="details" class="form-label">Details</label>
                    <textarea class="form-control content_details" placeholder="Message " id="details_{{$count}}" name="details_{{ $title == 'title_2'? '2' : '3' }}[]" style="height: 100px"></textarea>
                </div>
                <label id="details_{{$count}}-error" class="error" for="details_{{$count}}"></label>
            </div>
        </div>
    </div>
</div>
