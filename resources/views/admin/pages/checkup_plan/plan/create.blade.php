@extends('admin.layouts.login_after')
@section('style')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.6.2/chosen.css">
@endsection
@section('content')
<div class="page-body">
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-6">
                    <h3>Create Health CheckUp Plan</h3>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid doctors_profile">
        <div class="card">
            <div class="card-body">
                <form action="{{route('admin.health_checkup_plan.store')}}" method="POST" id="add_checkup_plan_form" name="add_checkup_plan_form">
                    @csrf
                    <div class="row mb-3">
                        <div class="col-lg-12">
                            <div class="mb-3">
                                <label for="name" class="form-label">Plan Name</label>
                                <input type="text" class="form-control" id="name" name="name" />
                                @if ($errors->has('name'))
                                <span class="text-danger invalid">{{ $errors->first('name') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="mb-3">
                                <label for="price" class="form-label">Price in Rs.</label>
                                <input type="text" class="form-control" id="price" name="price" />
                                @if ($errors->has('price'))
                                <span class="text-danger invalid">{{ $errors->first('price') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="mb-3">
                                <label for="file" class="form-label">File</label>
                                <input type="file" accept="image/*" class="form-control" id="file" name="file[]"  multiple/>
                                @if ($errors->has('file'))
                                <span class="text-danger invalid">{{ $errors->first('file') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="row" id="add_test_box">
                            <div class="col-lg-12 test_box_0">
                                <div class="row box">
                                    <div class="col-5">
                                        <div class="mb-3">
                                            <label for="test_type" class="form-label">Test type</label>
                                            <select class="form-select custom_select test_type" id="test_type" name="test_type[]" data-id="0" multiple>
                                                <option value="" disabled>Select test type</option>
                                                @foreach($test_type as $type)
                                                <option value="{{$type->id}}">{{$type->test_name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <!-- <div class="col-5">
                                        <div class="mb-3">
                                            <label for="sub_test_type" class="form-label">Sub Test type</label>
                                            <select class="form-select form-control" id="sub_test_type_0" name="sub_test_type[]" multiple="true">
                                            </select>
                                        </div>
                                        <label id="sub_test_type_0-error" class="error" for="sub_test_type_0"></label>
                                    </div> -->
                                    <!-- <div class="col-1">
                                        <div class="" style="margin: 0;position: absolute;top: 50%;-ms-transform: translateY(-50%);transform: translateY(-50%);">
                                            <button type="button" class="btn btn-success btn-rounded btn-icon" id="add_test_type"><i class="fa fa-solid fa-plus"></i></button>
                                        </div>
                                    </div> -->
                                </div>
                            </div>
                        </div>

                        <!-- <div class="col-lg-12">
                            <div class="mb-3">
                                <label for="is_show" class="form-label">status</label>
                                <div class="form-floating">
                                    <input type="checkbox" checked data-toggle="toggle" data-width="100" id="is_show" name="is_show" data-on="Show" data-off="Hide" data-onstyle="success" data-offstyle="danger" >
                                </div>
                            </div>
                        </div> -->
                        <div>
                            <button class="btn btn_green" type="submit" title="">
                                ADD
                            </button>
                            <a class="btn btn-secondary modelbtn" type="button" href="{{ route('admin.health_checkup_plan.index') }}">
                                Close
                            </a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.6.2/chosen.jquery.js"></script>
<script src="{{ asset('admin_assets/custom/checkupplan.js') }}"></script>
@endsection