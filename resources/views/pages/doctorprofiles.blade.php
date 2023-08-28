@extends('layouts.master')
@section('style')
    {{-- <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/virtual-select.min.css') }}"> --}}
@endsection
@section('content')
    <!-- first section -->
    <section class="page_heading_doc text-white docprofile_head">
        <div class="container">
            <h1>
                Doctor's Profiles
            </h1>
            <nav style="--bs-breadcrumb-divider: '>>';" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('/home') }}" class="text-white">Home</a></li>
                    <li class="breadcrumb-item " aria-current="page">Patients & Visitors</li>
                    <li class="breadcrumb-item" aria-current="page">Doctor's Profiles</li>
                </ol>
                <p>
                </p>
                <a href="{{ url('/contact_us') }}" style="    display: inline-block;" class="green_btn">Contact us
                    <svg width="22" height="21" viewBox="0 0 25 24" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M8.2459 19.7589C7.94784 19.4667 7.92074 19.0095 8.16461 18.6873L8.2459 18.595L14.9734 12L8.2459 5.40503C7.94784 5.11283 7.92074 4.65558 8.16461 4.33338L8.2459 4.24106C8.54396 3.94887 9.01037 3.9223 9.33904 4.16137L9.43321 4.24106L16.7541 11.418C17.0522 11.7102 17.0793 12.1675 16.8354 12.4897L16.7541 12.582L9.43321 19.7589C9.10534 20.0804 8.57376 20.0804 8.2459 19.7589Z"
                            fill="white" />
                    </svg>
                </a>
            </nav>
        </div>
    </section>
    <!-- first section end-->
    <section class="find_doc padding_tb_100">
        <div class="container">
            <div class="jus_texts text-center">
                <!-- <p class="red_title">Delivering world class health care</p> -->
                <h2 class="blue_sub_title">Find a Doctor</h2>
                <svg class="line" width="90" height="9" viewBox="0 0 90 9" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path d="M2.02431 7.09212C30.0244 6.09216 52.5242 0.592169 87.8787 2.46593" stroke="#02BB9A"
                        stroke-width="3" stroke-linecap="round"></path>
                </svg>
                <p class="small_gray_text"> </p>
            </div>

            <form action="{{ route('find_doctor') }}" method="POST" id="find_doctor_form" name="find_doctor_form">
                @csrf
                <div class="row">
                    <div class="col-lg-4">
                        <div class="dropdown_max">
                            <!-- <label for="exampleInputEmail1" class="form-label">City </label> -->
                            <div class="form-group inline_drop">

                                {{-- <svg class="right-aro" width="24" height="24" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M4.24106 7.7459C4.53326 7.44784 4.99051 7.42074 5.31272 7.66461L5.40503 7.7459L12 14.4734L18.595 7.7459C18.8872 7.44784 19.3444 7.42074 19.6666 7.66461L19.7589 7.7459C20.0511 8.04396 20.0777 8.51037 19.8386 8.83904L19.7589 8.93321L12.582 16.2541C12.2898 16.5522 11.8325 16.5793 11.5103 16.3354L11.418 16.2541L4.24106 8.93321C3.91965 8.60534 3.91965 8.07376 4.24106 7.7459Z"
                                        fill="#130F26" />
                                </svg> --}}
                                <select class="form-select" name="master_department_id" id="master_department_id">
                                    <option value="0" selected>Select Department</option>
                                    @foreach ($departments as $department)
                                        <option value="{{ $department->id }}"
                                            @if (isset($common_department_id)) {{ $common_department_id == $department->id ? 'selected' : '' }} @endif>
                                            {{ $department->department_name }}
                                        </option>
                                    @endforeach
                                </select>
                                <input type="hidden" name="common_department_id" id="common_department_id"
                                    value="@if (isset($common_department_id)) {{ $common_department_id }} @else 0 @endif ">
                                <input type="hidden" name="common_dr_id" id="common_dr_id"
                                    value="@if (isset($common_dr_id)) {{ $common_dr_id }} @else 0 @endif ">
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="checkbox-dropdown">
                            <label id="chk_selected"> Select Doctor Name </label>
                            <ul class="checkbox-dropdown-list">
                                <div id="drp_dr_list" name="drp_dr_list">
                                </div>
                            </ul>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <button class="btn btn-green_block" type="submit" title=""> SUBMIT </button>
                    </div>
                </div>
            </form>
        </div>


    </section>

    <section class="all_docs padding_tb_100">
        <div class="container">
            <div class="row doctor_filter" id="doctor_filter">

            </div>
            <div class="auto-load text-center" style="display: none;">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round" class="feather feather-loader">
                    <line x1="12" y1="2" x2="12" y2="6"></line>
                    <line x1="12" y1="18" x2="12" y2="22"></line>
                    <line x1="4.93" y1="4.93" x2="7.76" y2="7.76"></line>
                    <line x1="16.24" y1="16.24" x2="19.07" y2="19.07"></line>
                    <line x1="2" y1="12" x2="6" y2="12"></line>
                    <line x1="18" y1="12" x2="22" y2="12"></line>
                    <line x1="4.93" y1="19.07" x2="7.76" y2="16.24"></line>
                    <line x1="16.24" y1="7.76" x2="19.07" y2="4.93"></line>
                </svg>
            </div>
        </div>
    </section>

    <!-- Patients Speak start -->
    @include('layouts.include.reviews')
    <!-- Patients Speak end -->
@endsection

@section('script')
    {{-- <script src="{{ asset('assets/js/virtual-select.min.js') }} "></script> --}}
    <script>
        var dep_id = $("#common_department_id").val();
        var common_dr_id = $("#common_dr_id").val();
        $("document").ready(function() {
            var page = 1,
                last_page = 2;
            var prev_page = 1;
            LoadDoctorData(prev_page, dep_id, common_dr_id);
            getDoctor(dep_id, common_dr_id);
        });

        $(".checkbox-dropdown").click(function() {
            $(this).toggleClass("is-active");
        });

        $(document).on('change', '.checkbox-dropdown .me-2', function() {
            var is_check = $(this).prop("checked");
            $(".checkbox-dropdown").addClass("is-active");
            // console.log(is_check);
            if ($(this).hasClass("select_all")) {
                console.log(is_check);
                if (is_check == true) {
                    $('input[name="dr_id[]"]').each(function() {
                        this.checked = true;
                        $(this).attr('checked', 'checked')
                    });
                } else {
                    $(".checkbox-dropdown .me-2").attr('checked', false);
                    $(this).removeAttr('checked')
                }
            } else {
                if ($(".checkbox-dropdown .select_all").prop("checked")) {
                    $(".checkbox-dropdown .select_all").attr('checked', false);
                }
                console.log(is_check);
                if ($(this).attr('checked') == 'checked' == true) {
                    $(this).removeAttr('checked')
                } else {
                    $(this).attr('checked', true);
                }
            }
            $("#chk_selected").text($(".chk_chk:checked").length + ' Selected');
        })

        $(document).click(function() {
            $(".checkbox-dropdown").removeClass("is-active");
        });

        $(".checkbox-dropdown").click(function(e) {
            e.stopPropagation();
        });

        $(document).ajaxStop(function() {
            $(window).scroll(function() { //detect page scroll
                if ($(window).scrollTop() + $(window).height() > $(document).height() - 1100) {
                    $(window).unbind('scroll');
                    prev_page = prev_page + 1; //page number increment
                    if (prev_page > 1 && prev_page <= last_page) {
                        var href = window.location.href;
                        if (base_url + "/common_find_doctor" == href) {
                            LoadDoctorData(prev_page, dep_id, common_dr_id); //load content
                        } else {
                            var master_dep_id = $("#master_department_id").val();
                            var dr_id = [];
                            $('input[name="dr_id[]"]').each(function() {
                                if ($(this).attr('checked') == 'checked') {
                                    dr_id.push($(this).val());
                                }
                            });
                            LoadDoctorData(prev_page, master_dep_id, dr_id);
                        }
                    }
                }
            });
        });

        $(document).on('change', '#master_department_id', function() {
            $("#chk_selected").text('Select Doctor Name');
            var department_ID = $(this).val();
            getDoctor(department_ID, 0);
        });

        function getDoctor(department_ID, common_dr_id) {
            if (department_ID) {
                var html = '';
                // console.log(common_dr_id);
                $.ajax({
                    url: 'get_doctor/' + department_ID,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        if (data) {
                            // console.log(data.length)
                            if (data.length > 0) {
                                html += '<li>';
                                html += '   <label>';
                                html +=
                                    '       <input type="checkbox" class="me-2 select_all" />Select all</label>';
                                html += '   </label>';
                                html += '</li>';
                                for (var i = 0; i < data.length; i++) {
                                    if(data[i].prefix == null){
                                        data[i].prefix = '';
                                    }
                                    html += '<li>';
                                    html += '   <label>';
                                    html +=
                                        '       <input type="checkbox" class="me-2 chk_chk" name="dr_id[]"id="' +
                                        data[i].id + '" value="' + data[i].id + '"' + (common_dr_id == data[i]
                                            .id ? 'checked' : '') + ' > ' + data[i].prefix + ' ' + data[i]
                                        .full_name;
                                    html += '   </label>';
                                    html += '</li>';
                                }
                            } else {
                                html += '<li>';
                                html += '   <label>';
                                html += '        No Record Found';
                                html += '   </label>';
                                html += '</li>';
                            }
                            $('#drp_dr_list').html(html);
                        }

                    }
                });
            }
            // $(this).attr('checked', true);
            // console.log($(".me-2:checked").length);
            // $("#chk_selected").text($(".me-2:checked").length + ' Selected');
        }

        $("#find_doctor_form").submit(function(e) {

            e.preventDefault(); // avoid to execute the actual submit of the form.
            var form = $(this);
            var actionUrl = form.attr('action');
            var page = 1;
            var master_dep_id = $("#master_department_id").val();
            var dr_id = [];
            $('input[name="dr_id[]"]').each(function() {
                if ($(this).attr('checked') == 'checked') {
                    dr_id.push($(this).val());
                }
            });
            LoadDoctorData(page, master_dep_id, dr_id);
        });

        function LoadDoctorData(page, department_id, common_dr_id) {
            $.ajax({
                url: base_url + "/load_doctor_data?page=" + page,
                datatype: "html",
                type: "post",
                data: {
                    "dep_id": department_id,
                    "common_dr_id": common_dr_id,
                },
                beforeSend: function() {
                    $('.auto-load').show();
                },
                complete: function() {
                    $(".auto-load").hide();
                },
                success: function(response) {
                    if (response.cnt_select) {
                        $("#chk_selected").text(response.cnt_select + ' Selected');
                    } else {
                        $("#chk_selected").text('Select Doctor Name');
                    }
                    if (page == 1 && response.html == '') {
                        prev_page = 1;
                        $(".doctor_filter").html('');
                    }
                    if (page == 1 && response.html != '') {
                        prev_page = 1;
                        $(".doctor_filter").html('');
                    }
                    if (response.data.last_page == response.data.current_page) {
                        // $('.doctor_filter').html("");
                    }
                    $(".doctor_filter").append(response.html);
                    last_page = response.data.last_page;
                }
            });
        }
    </script>
@endsection
