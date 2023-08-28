@extends('admin.layouts.login_after')
@section('style')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.6.2/chosen.css">
<style>
    .image-preview-container {
        width: 50%;
        margin: 0 auto;
        border: 1px solid rgba(0, 0, 0, 0.1);
        padding: 1rem;
        border-radius: 20px;
    }

    .image-preview-container img {
        width: 100%;
        /* margin-bottom: 30px; */
    }

    /* .image-preview-container input {
        /* display: none; 
    } */
</style>
@endsection
@section('content')
<div class="page-body">
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-6">
                    <h3>Edit Health CheckUp Plan</h3>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid doctors_profile">
        <div class="card">
            <div class="card-body">
                <form action="{{route('admin.health_checkup_plan.update',$plan->id)}}" method="POST" id="edit_checkup_plan_form" name="edit_checkup_plan_form">
                    @csrf
                    @method('PUT')
                    <div class="row mb-3">
                        <div class="col-lg-12">
                            <div class="mb-3">
                                <label for="name" class="form-label">Plan Name</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{$plan->name}}" />
                                @if ($errors->has('name'))
                                <span class="text-danger invalid">{{ $errors->first('name') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="mb-3">
                                <label for="price" class="form-label">Price in Rs.</label>
                                <input type="text" class="form-control" id="price" name="price" value="{{$plan->price}}" />
                                @if ($errors->has('price'))
                                <span class="text-danger invalid">{{ $errors->first('price') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="row">
                                @php $file_name = $plan ? unserialize($plan->file_name) : ''; @endphp
                                @if((!empty($file_name)))
                                @foreach ($file_name as $key => $f_name)
                                @php $image = str_replace("/public","",url('/')).'/storage/'.$plan->file_path.$f_name; @endphp
                                <div class="col-lg-6">
                                    <div class="image-preview-container">
                                        <img id="preview-selected-image" src="{{ $image }}" />
                                    </div>
                                </div>
                                @endforeach
                                @endif
                            </div>
                            <div class="mb-3">
                                <label for="file" class="form-label">File</label>
                                <input type="file" accept="image/*" class="form-control" id="file" name="file[]" multiple />
                                @if ($errors->has('file'))
                                <span class="text-danger invalid">{{ $errors->first('file') }}</span>
                                @endif
                            </div>
                        </div>
                        @php $test = explode(",", $plan->test_type); @endphp
                        @php $sub_test = explode(",", $plan->sub_test_type); @endphp
                        <!--<div class="row" id="add_test_box">
                            @for($i = 0; $i <(count($test)); $i++) 
                            <div class="col-lg-12 test_box_{{$i}}">
                                <div class="row box">
                                    <div class="col-5">
                                        <div class="mb-3">
                                            <label for="test_type" class="form-label">Test type</label>
                                            <select class="form-select test_type" id="test_type_{{$i}}" name="test_type[]" data-id="1">
                                                <option value="">Select test type</option>
                                                @foreach($test_type as $type)
                                                <option value="{{$type->id}}" @if($test[$i]==$type->id) selected @endif>{{$type->test_name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                <div class="col-5">
                                        <div class="mb-3">
                                            <label for="sub_test_type" class="form-label">Sub Test type</label>
                                            <select class="form-select form-control" id="sub_test_type_{{$i}}" name="sub_test_type[]" multiple="true">
                                                @php $sub_type = \App\Models\SubTestType::where('test_id',$test[$i])->get(); @endphp
                                                @foreach($sub_type as $type)
                                                <option value="{{$type->id}}" @for($j=0; $j <(count($sub_test)); $j++) @if($sub_test[$j]==$type->id) selected @endif
                                                    @endfor>{{$type->test_name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <label id="sub_test_type_{{$i}}-error" class="error" for="sub_test_type_{{$i}}"></label>
                                    </div> 
                                    @if($i==0)
                                    <div class="col-1">
                                        <div class="" style="margin: 0;position: absolute;top: 50%;-ms-transform: translateY(-50%);transform: translateY(-50%);">
                                            <button type="button" class="btn btn-success btn-rounded btn-icon" id="add_test_type"><i class="fa fa-solid fa-plus"></i></button>
                                        </div>
                                    </div>
                                    @else
                                    <div class="col-1">
                                        <div class="" style="margin: 0;position: absolute;top: 50%;-ms-transform: translateY(-50%);transform: translateY(-50%);">
                                            <button type="button" class="btn btn-danger btn-icon-text delete_test" id="delete" data-id="{{$i}}"> <i class="fa fa-solid fa-trash"></i></button>
                                        </div>
                                    </div>
                                    @endif
                                </div>
                        </div>
                        @endfor
                    </div> -->
                        <div class="row" id="add_test_box">
                            <div class="col-lg-12 test_box_0">
                                <div class="row box">
                                    <div class="col-5">
                                        <div class="mb-3">
                                            <label for="test_type" class="form-label">Test type</label>
                                            <select class="form-select custom_select test_type" id="test_type" name="test_type[]" data-id="0" multiple>
                                                <option value="" disabled>Select test type</option>
                                                @foreach($test_type as $type)
                                                <option value="{{$type->id}}" @for($i=0; $i <(count($test)); $i++) @if($test[$i]==$type->id) selected @endif @endfor >{{$type->test_name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div>
                            <button class="btn btn_green" type="submit" title="">
                                Update
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