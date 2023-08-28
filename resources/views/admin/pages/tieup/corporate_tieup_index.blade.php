@extends('admin.layouts.login_after')
@section('style')
<style>
    .image-preview-container {
        width: 50%;
        margin: 0 auto;
        border: 1px solid rgba(0, 0, 0, 0.1);
        padding: 3rem;
        border-radius: 20px;
        display: none;
    }

    .image-preview-container img {
        width: 100%;
        margin-bottom: 10px;
    }

    .cover-image-preview-container {
        width: 50%;
        margin: 0 auto;
        border: 1px solid rgba(0, 0, 0, 0.1);
        padding: 3rem;
        border-radius: 20px;
        display: none;
    }

    .cover-image-preview-container img {
        width: 100%;
        margin-bottom: 10px;
    }

    .show {
        display: block;
    }

    .hide {
        display: none;
    }
</style>
@endsection
@section('content')
<div class="page-body">
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-6">
                    <h3>Empanelled Corporates</h3>
                </div>
            </div>
        </div>
    </div>
    <!-- ------ -->
    <div class="accordion accordion-flush" id="accordionFlushExample">
        <div class="accordion-item news_accordion">
            <h2 class="accordion-header" id="flush-headingOne">
                <button class="accordion-button collapsed news_accro_btn" type="button" data-bs-toggle="collapse" data-bs-target="#collapseone" aria-expanded="true" aria-controls="collapseone">
                    Page Contain
                </button>
            </h2>
            <div id="collapseone" class="accordion-collapse collapse " aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                <div class="accordion-body">
                    <div class="container-fluid doctors_profile">
                        <div class="row">
                            <div class="card">
                                <div class="card-body">
                                    <form action="{{route('admin.tieup.store')}}" method="POST" id="corporate_page_contain_form" name="corporate_page_contain_form" enctype="multipart/form-data">
                                        @csrf
                                        <div class="row mb-3">
                                            <div class="col-lg-12">
                                                <input type="hidden" class="form-control" id="contain_for" name="contain_for" value="corporate" />
                                                <div class="mb-3">
                                                    <label for="title" class="form-label">Title</label>
                                                    <input type="text" class="form-control" id="title" name="title" value="@if($corporate_contain){{$corporate_contain->title}} @endif" />
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="mb-3">
                                                    <label for="note" class="form-label">Note</label>
                                                    <input type="text" class="form-control" id="note" name="note" value="@if($corporate_contain){{$corporate_contain->note}} @endif" />
                                                </div>
                                            </div>
                                            <div>
                                                <button class="btn btn_green" type="submit" id="corporate_btn">
                                                    @if($corporate_contain) Update @else Add @endif
                                                </button>
                                                <button class="btn btn-primary" type="button" data-bs-dismiss="modal">
                                                    Cancel
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ------ -->
        <div class="accordion-item news_accordion">
            <h2 class="accordion-header" id="flush-headingTwo">
                <button class="accordion-button collapsed news_accro_btn  border border-bottom-1" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                    Add Tie-up
                </button>
            </h2>
            <div id="collapseTwo" class="accordion-collapse collapse " aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="table-responsive big tableinsidetable">
                                        <table class="display corporate_tieup_list" id="corporate_basic_1">
                                            <button class="btn right_pop_btn add_data" type="button" data-id="corporate">
                                                Add Tie-Up
                                            </button>
                                            <thead>
                                                <tr>
                                                    <th>Sr No.</th>
                                                    <th>Company Logo</th>
                                                    <th>Company Name</th>
                                                    <th>status</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ------ -->

        {{-- Add Model Start --}}
        <div class="modal fade" id="add_tieup_model" tabindex="-1" aria-labelledby="exampleModalLabel" style="display: none" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel2">
                            Add Tie-up
                        </h5>
                        <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">
                        <form action="{{ route('admin.tieup_store') }}" method="POST" id="store_tieup_form" name="store_tieup_form">
                            @csrf
                            <input type="hidden" class="form-control" id="tieup_type" name="tieup_type" value="" />
                            <div class="row mb-3">
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <label for="company_name" class="form-label">Company Name</label>
                                        <input type="text" class="form-control" id="company_name" name="company_name" placeholder="Company Name" />
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <label for="company_logo" class="form-label">Company Logo</label>
                                        <input type="file" accept="image/*" class="form-control" id="company_logo" name="company_logo" />
                                        <input type="text" id="company_logo_url" name="company_logo_url" hidden />
                                    </div>
                                </div>
                                <div>
                                    <button class="btn btn_green" type="submit">
                                        ADD
                                    </button>
                                    <button class="btn btn-primary" type="button" data-bs-dismiss="modal">
                                        Cancel
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        {{-- Add Model End --}}

        {{-- Edit Model Start --}}
        <div class="modal fade" id="edit_tieup_model" tabindex="-1" aria-labelledby="exampleModalLabel" style="display: none" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel2">
                            EDIT Tie-up
                        </h5>
                        <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="" method="POST" id="update_tieup_form" name="update_tieup_form">
                            @csrf
                            <input type="hidden" class="form-control" id="edit_tieup_type" name="edit_tieup_type" value="" />
                            <div class="row mb-3">
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <label for="edit_company_name" class="form-label">Company Name</label>
                                        <input type="text" class="form-control" id="edit_company_name" name="edit_company_name" />
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <div class="crop-image-preview-container edit_company_logo_show">
                                            <img id="edit_company_logo_preview" />
                                        </div>
                                        <label for="edit_company_logo" class="form-label">Company Logo</label>
                                        <input type="file" accept="image/*" class="form-control" id="edit_company_logo" name="edit_company_logo" />
                                        <input type="text" id="edit_company_logo_url" name="edit_company_logo_url" hidden />
                                    </div>
                                </div>
                                <div>
                                    <button class="btn btn_green" type="submit">
                                        Update
                                    </button>
                                    <button class="btn btn-primary" type="button" data-bs-dismiss="modal">
                                        Cancel
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        {{-- Edit Model End --}}

    </div>
</div>
@endsection

@section('script')
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-colorpicker/3.4.0/js/bootstrap-colorpicker.min.js" integrity="sha512-94dgCw8xWrVcgkmOc2fwKjO4dqy/X3q7IjFru6MHJKeaAzCvhkVtOS6S+co+RbcZvvPBngLzuVMApmxkuWZGwQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> --}}
<script type="text/javascript" src="{{ asset('admin_assets/custom/tieup.js') }}"></script>
@endsection