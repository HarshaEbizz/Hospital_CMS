@extends('admin.layouts.login_after')
@section('content')
<div class="page-body">
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-6">
                    <h3>Terms And Conditions</h3>
                </div>
            </div>
        </div>
    </div>
    <!-- ------ -->
    <div class="container-fluid doctors_profile">
        <div class="card">
            <div class="card-body">
                <form class="" method="POST" action="{{route('admin.terms_and_condition.store')}}" id="terms_and_condition_form" name="terms_and_condition_form">
                    @csrf
                    <div class="row mb-3">
                        <div class="col-lg-12">
                            <div class="mb-3">
                                <label for="sub_title" class="form-label">Sub Title</label>
                                <input type="text" class="form-control" id="sub_title" name="sub_title" value="{{ old('sub_title') }}" />
                                @if ($errors->has('title'))
                                <span class="text-danger invalid">{{ $errors->first('title') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="mb-3">
                                <label for="message" class="form-label">Description</label>
                                <div class="form-floating">
                                    <textarea class="form-control" placeholder="Message " id="description" name="description">{!! old('description') !!}</textarea>
                                </div>
                                <label id="description-error" class="error" for="description"></label>
                                @if ($errors->has('description'))
                                <span class="text-danger invalid">{{ $errors->first('description') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="mb-3">
                                <label for="is_show" class="form-label">status</label>
                                <div class="form-floating">
                                    <input type="checkbox" checked data-toggle="toggle" data-width="100" id="is_show" name="is_show" data-on="Show" data-off="Hide" data-onstyle="success" data-offstyle="danger" data-width="150">
                                </div>
                            </div>
                        </div>
                        <div>
                            <button class="btn btn_green" type="submit" data-bs-dismiss="modal" data-bs-original-title="" title="">
                                CREATE
                            </button>
                            <a class="btn btn-secondary modelbtn" type="button" href="{{ route('admin.terms_and_condition.index') }}">
                                Close
                            </a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- ---- -->
</div>
@endsection

@section('script')
<script>
    create_ck_editor(document.getElementById("description"), "description");
</script>
<script src="{{ asset('admin_assets/custom/termsconditon.js') }}"></script>

@endsection