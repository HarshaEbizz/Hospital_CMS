<div class="content_card" id="content_card_{{$count}}">
    <div class="card-body">
        <div class="card-title">
            <button type="button" class="btn btn-danger btn-icon-text delete_box" data_id="{{$count}}" style="float: right;">
                <i class="fa fa-solid fa-trash"></i></button>
        </div>
        <div class="row mb-3">
            <div class="col-lg-12">
                <div class="mb-3">
                    <label for="subtitle" class="form-label">SUB Title</label>
                    <input type="text" class="form-control" id="subtitle_{{$count}}" name="subtitle[]" class="content_title" />
                </div>
            </div>
            <div class="col-lg-12">
                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea class="form-control content_description" placeholder="Message " id="description_{{$count}}" name="description[]" style="height: 100px"></textarea>
                </div>
                <label id="description_{{$count}}-error" class="error" for="description_{{$count}}"></label>
            </div>
        </div>
    </div>
</div>