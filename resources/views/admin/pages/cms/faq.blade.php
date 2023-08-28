@extends('admin.layouts.login_after')
@section('content')

<div class="page-body">
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-6">
                    <h3>FAQ's</h3>
                </div>
            </div>
        </div>
    </div>
    <!-- ------ -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive big tableinsidetable">
                            <table class="display faq_table" id="basic-1">
                                <button class="btn right_pop_btn" type="button" data-bs-toggle="modal" data-bs-target="#add_faq_modal" data-whatever="@mdo" data-bs-original-title="" title="">
                                    Add
                                </button>
                                <thead>
                                    <tr>
                                        <th>Sr No.</th>
                                        <th>Question</th>
                                        <th>Answer</th>
                                        <th>Status</th>
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
    <!-- ---- -->

    <div class="modal fade" id="add_faq_modal" tabindex="-1" aria-labelledby="exampleModalLabel" style="display: none" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel2">
                        Add FAQ
                    </h5>
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close" data-bs-original-title="" title=""></button>
                </div>

                <div class="modal-body">
                    <form action="{{route('admin.faq.store')}}" method="POST" id="add_faq_from" name="add_faq_from">
                        @csrf
                        <div class="row mb-3">
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <label for="title" class="form-label">Question</label>
                                    <input type="text" class="form-control" id="question" name="question" />
                                    @if ($errors->has('question'))
                                    <span class="text-danger invalid">{{ $errors->first('question') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <label for="answer" class="form-label">Answer</label>
                                    <div class="">
                                        <textarea class="form-control" placeholder="Answer " id="answer" name="answer" style="height: 100px"></textarea>
                                        <!-- <label for="floatingTextarea2"></label> -->
                                    </div>
                                    @if ($errors->has('answer'))
                                    <span class="text-danger invalid">{{ $errors->first('answer') }}</span>
                                    @endif
                                    <label id="answer-error" class="error" for="answer"></label>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <label for="is_show" class="form-label">status</label>
                                    <div class="">
                                        <input type="checkbox" checked data-toggle="toggle" data-width="100" id="is_show" name="is_show" data-on="Show" data-off="Hide" data-onstyle="success" data-offstyle="danger">
                                    </div>
                                </div>
                            </div>
                            <div>
                                <button class="btn btn_green" type="submit" title="">
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
    <div class="modal fade" id="edit_faq_model" tabindex="-1" aria-labelledby="exampleModalLabel" style="display: none" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel2">
                        Edit FAQ
                    </h5>
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close" data-bs-original-title="" title=""></button>
                </div>

                <div class="modal-body">
                    <form action="#" method="POST" id="edit_faq_form" name="edit_faq_form">
                        @csrf
                        <div class="row mb-3">
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <label for="edit_question" class="form-label">Question</label>
                                    <input type="text" class="form-control" id="edit_question" name="edit_question" />
                                    @if ($errors->has('edit_question'))
                                    <span class="text-danger invalid">{{ $errors->first('edit_question') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <label for="edit_answer" class="form-label">Answer</label>
                                    <div class="">
                                        <textarea class="form-control" placeholder="Answer " id="edit_answer" name="edit_answer" style="height: 100px"></textarea>
                                        <!-- <label for="floatingTextarea2"></label> -->
                                    </div>
                                    @if ($errors->has('edit_answer'))
                                    <span class="text-danger invalid">{{ $errors->first('edit_answer') }}</span>
                                    @endif
                                    <label id="edit_answer-error" class="error" for="edit_answer"></label>
                                </div>
                            </div>
                            <div>
                                <button class="btn btn_green" type="submit" title="">
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
    <!-- <div class="modal fade" id="view_faq_model" tabindex="-1" aria-labelledby="exampleModalLabel" style="display: none" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel2">
                        View FAQ
                    </h5>
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close" data-bs-original-title="" title=""></button>
                </div>

                <div class="modal-body">
                    <div class="row mb-3">
                        <div class="col-lg-12">
                            <div class="mb-3">
                                <label for="view_question" class="form-label">Question</label>
                                <input type="text" class="form-control" id="view_question" name="view_question" readonly />
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="mb-3">
                                <label for="answer" class="form-label">Answer</label>
                                <div class="form-floating">
                                    <textarea class="form-control" placeholder="Answer " id="view_answer" name="view_answer" style="height: 100px" readonly></textarea>
                                </div>
                                <label id="answer-error" class="error" for="answer"></label>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="mb-3">
                                <label for="is_show" class="form-label">status</label>
                                <div class="form-floating">
                                    <input type="checkbox" checked data-toggle="toggle" data-width="100" id="view_is_show" name="view_is_show" data-on="Show" data-off="Hide" data-onstyle="success" data-offstyle="danger" >
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> -->

</div>

@endsection

@section('script')
<script src="{{ asset('admin_assets/custom/faq.js') }}"></script>
@endsection