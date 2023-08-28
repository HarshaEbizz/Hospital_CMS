@extends('admin.layouts.login_after')
@section('content')
    <div class="page-body">
        <div class="container-fluid">
            <div class="page-title">
                <div class="row">
                    <div class="col-6">
                        <h3>Healh Information</h3>
                    </div>
                </div>
            </div>
        </div>
        <!-- ------ -->
        <div class="accordion accordion-flush" id="accordionFlushExample">
            <div class="accordion-item news_accordion">
                <h2 class="accordion-header" id="flush-headingTwo">
                    <button class="accordion-button collapsed news_accro_btn" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapseone" aria-expanded="true" aria-controls="collapseone">
                        Health Tip's
                    </button>
                </h2>
                <div id="collapseone" class="accordion-collapse collapse " aria-labelledby="flush-headingTwo"
                    data-bs-parent="#accordionFlushExample">
                    <div class="container-fluid doctors_profile">
                        <div class="card">
                            <div class="card-body">
                                <form action="{{ route('admin.health.update', $health_details->id) }}" method="POST"
                                    id="update_health_information_form" name="update_health_information_form"
                                    class="form-inline" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    @php
                                        if ($health_details) {
                                            $image = str_replace('/public', '', url('/')) . '/storage/' . $health_details->storage_path;
                                    } @endphp
                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <label for="title_1" class="form-label">Title - 1</label>
                                            <input type="text" class="form-control" id="title_1" name="title_1"
                                                value="{{ $health_details->title_1 }}" />
                                        </div>
                                    </div>
                                    <input name="info_type" id="info_type" value="tip" hidden>
                                    <div class="col-lg-12 pe-2" id="image_upload">
                                        <div class="col-lg-12">
                                            <div class="mb-3">
                                                <label for="details_1" class="form-label">Details - 1</label>
                                                <textarea class="form-control" placeholder="Message " id="details_1" name="details_1" style="height: 100px">{!! $health_details->details_1 !!}</textarea>
                                            </div>
                                            <label id="details_1-error" class="error" for="details_1"></label>
                                        </div>

                                        <div class="col-lg-12">
                                            <div class="mb-3">
                                                <div
                                                    class="crop-image-preview-container cover_image_show @if ($health_details->cover_image) show @else hide @endif">
                                                    <img id="crop-image"
                                                        @if ($health_details->cover_image) src="{{ $image }}{{ $health_details->cover_image }}" @endif />
                                                </div>
                                                <label for="cover_image" class="form-label">Cover Image</label>
                                                <input type="file" accept="image/*" class="form-control" id="cover_image"
                                                    name="cover_image" />
                                                <input type="text" class="form-control" id="cover_image_url"
                                                    name="cover_image_url" hidden />
                                            </div>
                                        </div>

                                        <div class="col-lg-12">
                                            <div class="mb-3">
                                                <label for="title_2" class="form-label">Title - 2</label>
                                                <input type="text" class="form-control" id="title_2" name="title_2"
                                                    value="{{ $health_details->title_2 }}" />
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="mb-3">
                                                <label for="details_2" class="form-label">Details - 2</label>
                                                <textarea class="form-control" placeholder="Message " id="details_2" name="details_2" style="height: 100px">{!! $health_details->details_2 !!}</textarea>
                                            </div>
                                            <label id="details_2-error" class="error" for="details_2"></label>
                                        </div>

                                        <div class="col-lg-12">
                                            <div class="mb-3">
                                                <label for="title_3" class="form-label">Title - 3</label>
                                                <input type="text" class="form-control" id="title_3" name="title_3"
                                                    value="{{ $health_details->title_3 }}" />
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="mb-3">
                                                <label for="details_3" class="form-label">Details - 3</label>
                                                <textarea class="form-control" placeholder="Message " id="details_3" name="details_3" style="height: 100px">{!! $health_details->details_3 !!}</textarea>
                                            </div>
                                            <label id="details_3-error" class="error" for="details_3"></label>
                                        </div>
                                    </div>


                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <a class="btn btn-secondary modelbtn" type="button"
                                                href="{{ $health_details->info_type == 'tip' ? route('admin.health.index') : route('admin.statutory_compliance_index') }}">
                                                Close
                                            </a>
                                            <button class="btn btn-primary" type="submit" title=""> Update
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ------ -->
            <div class="accordion-item news_accordion">
                <h2 class="accordion-header" id="flush-headingTwo">
                    <button class="accordion-button collapsed news_accro_btn" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                        Statutory Compliance
                    </button>
                </h2>
                <div id="collapseTwo" class="accordion-collapse collapse " aria-labelledby="flush-headingTwo"
                    data-bs-parent="#accordionFlushExample">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="table-responsive big tableinsidetable">
                                            <table class="display statutory_compliance_list" id="corporate_basic_1">
                                                <button class="btn right_pop_btn add_data" type="button"
                                                    data-id="corporate">
                                                    Add Statutory Compliance
                                                </button>
                                                <thead>
                                                    <tr>
                                                        <th>Sr No.</th>
                                                        <th>Title</th>
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
            <div class="modal fade" id="add_statutory_model" tabindex="-1" aria-labelledby="exampleModalLabel"
                style="display: none" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel2">
                                Add Statutory Compliance
                            </h5>
                            <button class="btn-close" type="button" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>

                        <div class="modal-body">
                            <form action="{{ route('admin.health.store') }}" method="POST" id="store_statutory_form"
                                name="store_statutory_form">
                                @csrf
                                <input name="info_type" id="info_type" value="compliance" hidden>
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <label for="title_1" class="form-label">Title - 1</label>
                                        <input type="text" class="form-control" id="title_1" name="title_1" />
                                    </div>
                                </div>
                                <div>
                                    <label for="document" class="form-label">Document</label>
                                </div>
                                <div class="col-lg-12 pe-2">
                                    <div class="mb-3">
                                        <input type="file" class="form-control" name="document" id="document"
                                            data-height="100" />
                                        <input type="text" name="document_url" id="document_url" hidden />
                                    </div>
                                    <label id="document-error" class="error" for="document"
                                        style="display: none"></label>
                                </div>
                                <div class="col-lg-12 pe-2">
                                    <div class="mb-3">
                                        <iframe name="document_viewer" id="document_viewer" src=""
                                            width="500px" height="500px" style="display: none"></iframe>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <button class="btn btn-primary" type="submit" title=""> Add </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            {{-- Add Model End --}}

            {{-- Edit Model Start --}}
            <div class="modal fade" id="edit_statutory_model" tabindex="-1" aria-labelledby="exampleModalLabel"
                style="display: none" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel2">
                                Add Statutory Compliance
                            </h5>
                            <button class="btn-close" type="button" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>

                        <div class="modal-body">
                            <form action="#" method="POST" id="edit_statutory_form" name="edit_statutory_form">
                                @csrf
                                @method('PUT')
                                <input name="info_type" id="info_type" value="compliance" hidden>
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <label for="title_1" class="form-label">Title - 1</label>
                                        <input type="text" class="form-control" id="edit_title_1"
                                            name="edit_title_1" />
                                    </div>
                                </div>
                                <div class="col-lg-12 pe-2">
                                    <div class="mb-3">
                                        <div class="crop-image-preview-container cover_image_show">
                                            <img id="crop-image" />
                                        </div>
                                        <label for="edit_document" class="form-label">Document</label>
                                        <input type="file" class="form-control" name="edit_document"
                                            id="edit_document" data-height="100" />
                                        <input type="text" name="edit_document_url" id="edit_document_url" hidden />
                                    </div>
                                    <label id="document-error" class="error" for="document"
                                        style="display: none"></label>
                                </div>
                                <div class="col-lg-12 pe-2">
                                    <div class="mb-3">
                                        <iframe name="edit_document_viewer" id="edit_document_viewer" src=""
                                            width="500px" height="500px" style="display: none"></iframe>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <button class="btn btn-primary" type="submit" title=""> Update </button>
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
    <script src="{{ asset('admin_assets/custom/health.js') }}"></script>
@endsection
