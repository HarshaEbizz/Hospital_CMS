@extends('admin.layouts.login_after')
@section('style')
<style>
    .price_data_each div {
        display: -webkit-box;
    }
    .price_data_each div p {
        margin-right: 20px;
    }

    /* Style the tab */
    .tab {
        overflow: hidden;
        border: 1px solid #ccc;
        background-color: #f1f1f1;
        margin-top: 30px;
    }

    /* Style the buttons inside the tab */
    .tab button {
        background-color: inherit;
        float: left;
        border: none;
        outline: none;
        cursor: pointer;
        padding: 14px 16px;
        transition: 0.3s;
        font-size: 17px;
    }

    /* Change background color of buttons on hover */
    .tab button:hover {
        background-color: #ddd;
    }

    /* Create an active/current tablink class */
    .tab button.active {
        background-color: #ccc;
    }

    /* Style the tab content */
    .tabcontent {
        display: none;
        padding: 6px 12px;
        border: 1px solid #ccc;
        border-top: none;
    }
</style>
@endsection
@section('content')
<div class="page-body">
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-6">
                    <h3>Edit Specialities tab content</h3>
                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">

                    <div class="card-body">
                        <div class="table-responsive big tableinsidetable">
                            <button class="btn left_pop_btn add_tab_topics" type="button" style="background-color: burlywood;" data-bs-toggle="modal" data-bs-target="#addtopicModal">
                                ADD TAB CONTENT TOPIC
                            </button>
                            <button class="btn right_pop_btn add_tab_content" type="button" data-id="{{$specialities->id}}">
                                ADD TAB CONTENT
                            </button>
                        </div>

                        <div class="tab">
                            @if(count($topics)>0)
                            @foreach($topics as $key=>$topic)
                            <button class="tablinks" onclick="opentab(this,'{{$topic->topic_name}}')" data_id="{{$topic->id}}">{{$topic->topic_name}}</button>
                            @endforeach
                            @endif
                        </div>

                        <div class="nav-tabContent">
                            @if(count($topics)>0)
                            @foreach($topics as $key=>$topic)
                            <div id="{{$topic->topic_name}}" class="tabcontent tab_{{$topic->id}}">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <h3 class="tab_heading" data-id="{{$topic->id}}">{{$topic->topic_name}}</h3>
                                    </div>
                                    <div class="col-lg-2" style="width:10%">
                                        <input class="tgl status_btn" type="checkbox" data-toggle="toggle" data-width="100" id="is_show" name="is_show" data-on="Show" data-off="Hide" data-onstyle="success" data-offstyle="danger" value="{{$topic->id}}" checked>
                                    </div>
                                    <div class="col-lg-2" style="width:100px">
                                        <button type="button" class="btn btn-primary btn-icon-text edit_topic" data-id="{{$topic->id}}">
                                            <i class="fa fa-solid fa-pencil"></i></button>
                                    </div>
                                    <div class="col-lg-2" style="width:100px">
                                        <button type="button" class="btn btn-danger btn-icon-text delete_topic" data-id="{{$topic->id}}">
                                            <i class="fa fa-solid fa-trash"></i></button>
                                    </div>
                                </div>
                                @php $tab_contents =''; $tab_contents = App\Models\SpecialitiesTabContent::where('topic_id',$topic->id)->orderby('order')->get();@endphp
                                <div class="row all_tab_contents" id="all_tab_contents" data-id="{{$topic->id}}">
                                    @foreach($tab_contents as $key=>$tab_content)
                                    <div class="col-sm-3"  id="content_card_{{$tab_content->id}}" data-id="{{$tab_content->id}}">
                                        <div class="card " style="width: 22rem;">
                                            @if($tab_content->image_name)
                                            @php $image = str_replace("/public","",url('/')).'/storage/'.$tab_content->image_path.$tab_content->image_name; @endphp
                                            <img class="card-img-top" src="{{$image}}" alt="Card image cap">
                                            @endif
                                            <div class="card-body">
                                                @if(isset($tab_content->tab_title)) <h5 class="card-title"> {{$tab_content->tab_title}}</h5> @endif
                                                <!-- @php $first_tag = explode(' ',trim($tab_content->tab_details)); @endphp
                                                @if( $first_tag[0]=="<p") {!! \Illuminate\Support\Str::limit($tab_content->tab_details,100) !!}
                                                    @else
                                                    {!! \Illuminate\Support\Str::limit($tab_content->tab_details,2000) !!}
                                                    @endif -->
                                                {!! $tab_content->tab_details !!}
                                            </div>
                                            <div class="card-body">
                                                <a class="card-link edit_box_content" data-id="{{$tab_content->id}}" style="cursor: pointer;">Edit</a>
                                                <a class="card-link delete_box_content" data-id="{{$tab_content->id}}" style="cursor: pointer;">Delete</a>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                            @endforeach
                            @endif
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- Container-fluid Ends-->
    <div class="modal fade" id="addtopicModal" tabindex="-1" aria-labelledby="exampleModalLabel" style="display: none" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel2">
                        Add Topics
                    </h5>
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close" data-bs-original-title="" title=""></button>
                </div>
                <div class="modal-body">
                    <div class="row mb-3">
                        <form action="{{route('admin.specialities.topics.store',$specialities->id)}}" method="POST" id="add_topics_from" name="add_topics_from" enctype="multipart/form-data">
                            @csrf
                            <div class="row mb-3">
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <label for="top_cover_image" class="form-label">Tab content topics</label>
                                        <input type="text" class="form-control image" id="topic_name" name="topic_name" />
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
    </div>
    <div class="modal fade" id="edittopicModal" tabindex="-1" aria-labelledby="exampleModalLabel" style="display: none" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel2">
                        Edit Topics
                    </h5>
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close" data-bs-original-title="" title=""></button>
                </div>
                <div class="modal-body">
                    <div class="row mb-3">
                        <form action="#" method="POST" id="edit_topics_from" name="edit_topics_from" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row mb-3">
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <label for="top_cover_image" class="form-label">Tab content topics</label>
                                        <input type="text" class="form-control image" id="edit_topic_name" name="edit_topic_name" />
                                    </div>
                                </div>
                                <div>
                                    <button class="btn btn_green" type="submit" title="">
                                        UPDATE
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
    <div class="modal fade" id="addtabcontentModal" tabindex="-1" aria-labelledby="exampleModalLabel" style="display: none" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document" style="overflow-y: initial !important">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel2">
                        Add tab Contents
                    </h5>
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close" data-bs-original-title="" title=""></button>
                </div>
                <div class="modal-body" style="    max-height: calc(100vh - 170px);overflow-y: auto;">
                    <div class="row mb-3">
                        <form action="{{route('admin.specialities.tab_content.store',$specialities->id)}}" method="POST" id="add_tab_content_from" name="add_tab_content_from" enctype="multipart/form-data">
                            @csrf
                            <div class="row mb-3">
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="topic_id" class="form-label">Topic name</label>
                                        <select class="form-select form-select custom_select" name="topic_id" id="topic_id">
                                            <!-- <option value="" selected disabled>Select topic name</option> -->
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="content_type" class="form-label">Content Type</label>
                                        <select class="form-select form-select custom_select" name="tab_content_type" id="tab_content_type">
                                            <option value="" selected disabled>Select Content Type</option>
                                            <option value="image_content">Image & Content</option>
                                            <option value="content">Content</option>
                                            @if($specialities->slug=='bariatric_surgery_weight_loss_surgery')
                                            <option value="image">image</option>
                                            <option value="banner_image">Bannner image</option>
                                            <option value="question_answer">Question answer</option>
                                            <option value="content_direction">Content direction</option>
                                            @endif
                                        </select>
                                    </div>
                                </div>
                                <div class="tab_content_field"></div>
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
    </div>
    <div class="modal fade" id="edittabcontentModal" tabindex="-1" aria-labelledby="exampleModalLabel" style="display: none" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document" style="overflow-y: initial !important">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel2">
                        Edit tab Contents
                    </h5>
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close" data-bs-original-title="" title=""></button>
                </div>
                <div class="modal-body" style="    max-height: calc(100vh - 170px);overflow-y: auto;">
                    <div class="row mb-3">
                        <form action="#" method="POST" id="edit_tab_content_from" name="edit_tab_content_from" enctype="multipart/form-data" data_id="">
                            @csrf
                            @method('PUT')
                            <div class="row mb-3">
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="edit_topic_id" class="form-label">Topic name</label>
                                        <select class="form-select form-select custom_select" name="edit_topic_id" id="edit_topic_id">
                                            @foreach($topics as $key=>$topic)
                                            <option value="{{$topic->id}}">{{$topic->topic_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="edit_tab_content_type" class="form-label">Content Type</label>
                                        <select class="form-select form-select custom_select" name="edit_tab_content_type" id="edit_tab_content_type">
                                            <option value="" selected disabled>Select Content Type</option>
                                            <option value="image_content">Image & Content</option>
                                            <option value="content">Content</option>
                                            @if($specialities->slug=='bariatric_surgery_weight_loss_surgery')
                                            <option value="image">image</option>
                                            <option value="banner_image">Bannner image</option>
                                            <option value="question_answer">Question answer</option>
                                            <option value="content_direction">Content direction</option>
                                            @endif
                                        </select>
                                    </div>
                                </div>
                                <div class="edit_tab_content_field"></div>
                                <div>
                                    <button class="btn btn_green" type="submit" title="">
                                        UPDATE
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
@endsection
@section('script')
<script type="text/javascript" src="//code.jquery.com/ui/1.12.1/jquery-ui.js" ></script>    
<script src="{{ asset('admin_assets/custom/specialities_tab.js') }}"></script>
@endsection