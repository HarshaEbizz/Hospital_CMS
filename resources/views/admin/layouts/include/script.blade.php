<!-- latest jquery-->
<script src="{{ asset('admin_assets/js/jquery-3.5.1.min.js') }}"></script>

<!-- Bootstrap js-->
<script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>
<script src="{{ asset('admin_assets/js/bootstrap/bootstrap.bundle.min.js') }}"></script>

<!-- feather icon js-->
<script src="{{ asset('admin_assets/js/icons/feather-icon/feather.min.js') }}"></script>
<script src="{{ asset('admin_assets/js/icons/feather-icon/feather-icon.js') }}"></script>

<!-- scrollbar js-->
<script src="{{ asset('admin_assets/js/jquery.ui.sortable-animation.js') }}"></script>
<script src="{{ asset('admin_assets/js/sidebar-menu.js') }}"></script>
<script src="{{ asset('admin_assets/js/scrollbar/simplebar.js') }}"></script>
<script src="{{ asset('admin_assets/js/scrollbar/custom.js') }}"></script>
<script src="{{ asset('admin_assets/js/config.js') }}"></script>

<!-- ckeditor jquery-->
<script src="https://cdn.ckeditor.com/ckeditor5/35.3.2/super-build/ckeditor.js"></script>
<script src="{{ asset('admin_assets/js/ckeditor.js') }}"></script>
<!-- end-->

<!-- Crop image jquery-->
<script src="https://unpkg.com/dropzone"></script>
<script src="https://unpkg.com/cropperjs"></script>
<script src="{{ asset('admin_assets/custom/crop_image.js') }}"></script>
<!-- end-->

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script>
<script src="{{ asset('admin_assets/custom/validation_method.js') }}"></script>
<script src="{{ asset('admin_assets/custom/form_validate.js') }}"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.1/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.9/sweetalert2.min.js"></script>
<script src="{{ asset('admin_assets/js/script.js') }}"></script>

<script src="{{ asset('admin_assets/js/datatable/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('admin_assets/js/datatable/datatables/datatable.custom.js') }}"></script>
<script src="{{ asset('admin_assets/js/tooltip-init.js') }}"></script>

<script src="{{ asset('admin_assets/js/notify/bootstrap-notify.min.js') }}"></script>
<script src="{{ asset('admin_assets/js/notify/index.js') }}"></script>

<script type="text/javascript">
    $(document).ready(function() {

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        // $("#ImageCropmodal").on('shown.bs.modal', function() {
        $('#ImageCropmodal').modal({
            backdrop: 'static',
            keyboard: false
        });
        // });
        $('.modal').on('hidden.bs.modal', function() {
            $(this).find('form').trigger('reset');
            // $('.crop-image-preview-container').remove();
            $(this)
            .find("input,textarea,select").val('').end()
            // .find('.crop-image-preview-container').remove().end()
            .find("input[type=checkbox], input[type=radio]").prop("checked", "").end();
        })
    });
</script>
