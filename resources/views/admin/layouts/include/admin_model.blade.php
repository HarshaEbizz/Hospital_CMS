{{-- crop image model start --}}
<div class="modal fade" id="ImageCropmodal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Crop Image Before Upload</h5>
                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <input type="hidden" name="img_tag" id="img_tag" value="">
            <div class="modal-body">
                <div class="img-container">
                    <div class="row">
                        <div class="col-md-8">
                            <img src="" id="sample_image" style="width: 100%;" />
                        </div>
                        <div class="col-md-4">
                            <div class="preview"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" id="crop" class="btn btn-primary">Crop</button>
                <button class="btn btn-primary" type="button" id="close_crop_img_modal" data-bs-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>
{{-- crop image model end --}}
