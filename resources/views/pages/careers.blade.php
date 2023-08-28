@extends('layouts.master')
@section('content')
    <!-- first section -->
    <section class="page_heading_floor career_section">
        <div class="container">
            <h1 class="career_title">
                Careers
            </h1>
            <nav style="--bs-breadcrumb-divider: '>>';" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('/home') }}" class="text-dark">Home</a></li>
                    <li class="breadcrumb-item " aria-current="page">Careers</li>
                </ol>
                <div class="d-sm-flex">
                    <div class="career_info me-sm-4 mb-sm-0 mb-3">
                        <!-- <p class="mb-2">Phone no.</p> -->
                        <div class="d-flex align-items-center">
                            <svg width="20" height="21" viewBox="0 0 20 21" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M9.53174 10.9724C13.5208 14.9604 14.4258 10.3467 16.9656 12.8848C19.4143 15.3328 20.8216 15.8232 17.7192 18.9247C17.3306 19.237 14.8616 22.9943 6.1846 14.3197C-2.49348 5.644 1.26158 3.17244 1.57397 2.78395C4.68387 -0.326154 5.16586 1.08938 7.61449 3.53733C10.1544 6.0765 5.54266 6.98441 9.53174 10.9724Z"
                                    stroke="#10357C" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                            <a class="call" href="tel: +91-261-7161111"><p class="mb-0 career_text ms-1">+91-261-7161111</p></a>
                        </div>
                    </div>
                    <div class="career_info ms-sm-3">
                        <!-- <p class="mb-2">Email</p> -->
                        <div class="d-flex align-items-center">
                            <svg width="22" height="20" viewBox="0 0 22 20" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M16.9033 6.85156L12.46 10.4646C11.6205 11.1306 10.4394 11.1306 9.59992 10.4646L5.11914 6.85156"
                                    stroke="#10357C" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M15.9089 19C18.9502 19.0084 21 16.5095 21 13.4384V6.57001C21 3.49883 18.9502 1 15.9089 1H6.09114C3.04979 1 1 3.49883 1 6.57001V13.4384C1 16.5095 3.04979 19.0084 6.09114 19H15.9089Z"
                                    stroke="#10357C" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                            <a class="call" href="mailto:careers@kiranhospital.com "><p class="mb-0 career_text ms-1"><p class="mb-0 career_text ms-1">careers@kiranhospital.com </p></a>
                        </div>
                    </div>
                </div>
            </nav>
        </div>

    </section>
    <!-- first section end-->
    <!-- second section -->
    <div class="container pt-5">
        <div class="row align-items-center">
            <div class="col-lg-4 mb-sm-0 mb-3">
                <div class="dropdown_max">
                    <!-- <label for="exampleInputEmail1" class="form-label">City </label> -->
                    <div class="form-group inline_drop">

                        {{-- <svg class="right-aro" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M4.24106 7.7459C4.53326 7.44784 4.99051 7.42074 5.31272 7.66461L5.40503 7.7459L12 14.4734L18.595 7.7459C18.8872 7.44784 19.3444 7.42074 19.6666 7.66461L19.7589 7.7459C20.0511 8.04396 20.0777 8.51037 19.8386 8.83904L19.7589 8.93321L12.582 16.2541C12.2898 16.5522 11.8325 16.5793 11.5103 16.3354L11.418 16.2541L4.24106 8.93321C3.91965 8.60534 3.91965 8.07376 4.24106 7.7459Z" fill="#130F26" />
                    </svg> --}}
                        <select class="form-select mb-0" id="job_opening_type">
                            <option value="all" selected>All Openings</option>
                            <option value="clinical">Clinical Openings</option>
                            <option value="non_clinical">Non-Clinical Openings</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 mb-sm-0 mb-3">
                <div class="checkbox-dropdown mb-0">
                    All Job Categories
                    <ul class="checkbox-dropdown-list">
                        <div id="job_categories">
                        </div>
                        <!-- <li> <label> <input type="checkbox" class="me-2 select_all">Select all</label> </li>
                        @if ($opening && $opening->count() > 0)
    @foreach ($opening as $opening_list)
    <li><label> <input type="checkbox" class="me-2" name="job_dept_id[]" id="{{ $opening_list->id }}" value="{{ $opening_list->id }}">{{ $opening_list->department_name }}</label></li>
    @endforeach
    @endif -->
                    </ul>
                </div>
            </div>

            <div class="col-lg-4 mb-sm-0 mb-3" onSubmit="return false;">
                <form class="d-flex">
                    <input class="form-control me-2 mb-0" type="search" placeholder="Search" id="search"
                        aria-label="Search">
                </form>
            </div>
        </div>
    </div>
    <section class="hosp_tour_tabs padding_tb_100">
        @if ($opening && $opening->count() > 0)
        @endif
    </section>
    <!-- secound section end -->
    <!-- Third section -->
    @include('layouts.include.map')
    <!-- third section end -->
@endsection
@section('script')
    <script>
        var data = [];
        $(".checkbox-dropdown").click(function() {
            $(this).toggleClass("is-active");
        });
        $(document).on('change', '.checkbox-dropdown .me-2', function() {
            $(".checkbox-dropdown").addClass("is-active");
            var is_check = $(this).prop("checked");
            // console.log(is_check);
            if ($(this).hasClass("select_all")) {
                console.log(is_check);
                if (is_check == true) {
                    $('input[name="job_dept_id[]"]').each(function() {
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
        $(".checkbox-dropdown").click(function(e) {
            e.stopPropagation();
        });
        $("document").ready(function() {
            search = $("#search").val();
            var data = [];
            $('input[name="job_dept_id[]"]:checked').each(function() {
                (this.value);
            });
            get_job_categories("all")
            filter_job_post("all", data, search);
        })
        $(document).click(function() {
            $(".checkbox-dropdown").removeClass("is-active");
        });
        $(document).on('change', '#job_opening_type', function(e) {
            e.preventDefault();
            search = $("#search").val();
            get_job_categories($(this).val())
            var data = [];
            $('input[name="job_dept_id[]"]').each(function() {
                if ($(this).attr('checked') == 'checked') {
                    data.push($(this).val());
                }
            });
            filter_job_post($(this).val(), data, search)
        });
        $(document).on('change', '.check_box', function(e) {
            e.preventDefault();
            search = $("#search").val();
            var data = [];
            $('input[name="job_dept_id[]"]').each(function() {
                if ($(this).attr('checked') == 'checked') {
                    data.push($(this).val());
                }
            });
            filter_job_post($('#job_opening_type').val(), data, search)
        })
        $(document).on('keyup','#search', function(e) {
            e.preventDefault();
            search = $(this).val();
            var data = [];
            $('input[name="job_dept_id[]"]').each(function() {
                if ($(this).attr('checked') == 'checked') {
                    data.push($(this).val());
                }
            });
            filter_job_post($('#job_opening_type').val(), data, search)
        })

        $('#search').on('input', function(e) {
            search = $(this).val();
            var data = [];
            $('input[name="job_dept_id[]"]').each(function() {
                if ($(this).attr('checked') == 'checked') {
                    data.push($(this).val());
                }
            });
            filter_job_post($('#job_opening_type').val(), data, search)
        });

        function get_job_categories(job_opening_type) {
            $('#job_categories').html('');
            $.ajax({
                url: 'get_job_categories/' + job_opening_type,
                type: "GET",
                dataType: "json",
                success: function(data) {
                    if (data) {
                        var html = '';
                        if (data.length > 0) {
                            html +=
                                '<li> <label> <input type="checkbox" class="me-2 select_all check_box" name="job_dept_id[]" value="all">Select all</label> </li>'
                            for (var i = 0; i < data.length; i++) {
                                html +=
                                    '<li><label> <input type="checkbox" class="me-2 check_box" name="job_dept_id[]" id="' +
                                    data[i].id + '" value="' + data[i].id + '">' + data[i].department_name +
                                    '</label></li>'
                            }
                        } else {
                            html += '<li> <label>No Job Opening</label> </li>'
                        }
                    }
                    $('#job_categories').html(html);
                }
            })
        }

        function filter_job_post(job_opening_type, job_dept_id, search) {
            $.ajax({
                url: 'careers',
                type: "POST",
                data: {
                    job_opening_type: job_opening_type,
                    job_dept_id: job_dept_id,
                    search: search,
                },
                dataType: "json",
                success: function(response) {
                    if (response.success) {
                        $(".hosp_tour_tabs").html('');
                        $(".hosp_tour_tabs").append(response.html);
                        // $(".checkbox-dropdown").removeClass("is-active");
                    } else {
                        $(".hosp_tour_tabs").html('');
                        $(".hosp_tour_tabs").append(
                            ' <div class="container"><div class="row align-items-center">No Job Opening</div></div>'
                            );
                    }
                }
            })
        }
    </script>
@endsection
