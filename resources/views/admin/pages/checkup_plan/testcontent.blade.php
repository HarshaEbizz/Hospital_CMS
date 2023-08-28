<div class="col-lg-12 test_box_{{$count}}">
    <div class="row box">
        <div class="col-5">
            <div class="mb-3">
                <label for="test_type" class="form-label">Test type</label>
                <select class="form-select test_type custom_select" id="test_type_{{$count}}" name="test_type[]" data-id="{{$count}}">
                    <option value="">Select test type</option>
                    @foreach($test_type as $type)
                    <option value="{{$type->id}}">{{$type->test_name}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-5">
            <div class="mb-3">
                <label for="sub_test_type" class="form-label">Sub Test type</label>
                <select class="form-select form-control custom_select" id="sub_test_type_{{$count}}" name="sub_test_type[]" multiple="true">
                </select>
            </div>
            <label id="sub_test_type_{{$count}}-error" class="error" for="sub_test_type_{{$count}}"></label>
        </div>
        <div class="col-1"> 
            <div class="" style="margin: 0;position: absolute;top: 50%;-ms-transform: translateY(-50%);transform: translateY(-50%);">
                <button type="button" class="btn btn-danger btn-icon-text delete_test" id="delete" data-id="{{$count}}"> <i class="fa fa-solid fa-trash"></i></button>
            </div>
        </div>
    </div>
</div>