@section('style')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.6.2/chosen.css" />
@endsection

@extends('admin.layouts.login_after')
@section('content')
    <div class="page-body">
        <div class="container-fluid">
            <div class="page-title">
                <div class="row">
                    <div class="col-6">
                        <h3>Update Doctor's Profile</h3>
                    </div>
                </div>
            </div>
        </div>

        <div class="container-fluid doctors_profile">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin.doctor.update', $profile_details->id) }}" method="POST"
                        id="update_doctor_profile_form" name="update_doctor_profile_form" class="form-inline"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="col-lg-1 pe-2">
                            <div class="mb-3">
                                <label for="full_name" class="form-label">Full Name</label>
                                {{-- <input type="text" class="form-control" value="Dr." disabled/> --}}
                                <select name="prefix" class="form-select">
                                    <option value="Dr." {{ $profile_details->prefix == 'Dr.' ? 'selected' : '' }}>Dr.
                                    </option>
                                    <option value="Mr." {{ $profile_details->prefix == 'Mr.' ? 'selected' : '' }}>Mr.
                                    </option>
                                    <option value="Ms." {{ $profile_details->prefix == 'Ms.' ? 'selected' : '' }}>Ms.
                                    </option>
                                    <option value="Mrs." {{ $profile_details->prefix == 'Mrs.' ? 'selected' : '' }}>Mrs.
                                    </option>
                                    <option value="" {{ $profile_details->prefix == '' ? 'selected' : '' }}></option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-11 pe-2">
                            <div class="mb-3">
                                <label for="full_name" class="form-label"></label>
                                <input type="text" class="form-control" id="full_name" name="full_name"
                                    placeholder="Full name" value="{{ $profile_details->full_name }}"
                                    style="margin-top: 6px;" />
                            </div>
                        </div>
                        <div class="col-lg-1">
                        </div>
                        <div class="col-lg-11">
                            <label id="full_name-error" class="error" for="full_name" style="display: none"></label>
                        </div>
                        <div class="col-lg-6 pe-2">
                            <div class="mb-3">
                                <label for="qualification" class="form-label">Qualification</label>
                                <input type="text" class="form-control" id="qualification" name="qualification"
                                    placeholder="MB, MBBS, ECFMG-USA" value="{{ $profile_details->qualification }}" />
                            </div>
                        </div>
                        <div class="col-lg-6 pe-2">
                            <div class="mb-3">
                                <label for="speciality_id" class="form-label">Speciality</label>
                                <select id="speciality_id" class="js-states form-control" name="speciality_id[]" multiple
                                    required>
                                    @php $get_speciality_ids = explode(',', $profile_details->speciality_id); @endphp
                                    @foreach ($specialities as $specialitie)
                                        <option value="{{ $specialitie->id }}"
                                            @foreach ($get_speciality_ids as $get_speciality_id) {{ $specialitie->id == $get_speciality_id ? 'selected' : '' }} @endforeach>
                                            {{ $specialitie->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <label id="qualification-error" class="error" for="qualification"
                                style="display: none"></label>
                        </div>
                        <div class="col-lg-6">
                            <label id="speciality_id-error" class="error" for="speciality_id"
                                style="display: none"></label>
                        </div>
                        <div class="col-lg-6 pe-2">
                            <div class="mb-3">
                                <label for="cluster_id" class="form-label">Cluster</label>
                                <select class="form-select" name="cluster_id" id="cluster_id">
                                    <option value="" selected disabled>Select Cluster</option>
                                    @foreach ($clusters as $cluster)
                                        <option value="{{ $cluster->id }}"
                                            {{ $cluster->id == $profile_details->cluster_id ? 'selected' : '' }}>
                                            {{ $cluster->cluster }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6 pe-2">
                            <div class="mb-3">
                                <label for="language_known" class="form-label">Language Known</label>
                                <input type="text" class="form-control" id="language_known" name="language_known"
                                    placeholder="English, Hindi, Gujarati"
                                    value="{{ $profile_details->language_known }}" />
                            </div>
                        </div>
                        <div class="col-lg-6">
                        </div>
                        <div class="col-lg-6">
                            <label id="language_known-error" class="error" for="language_known"
                                style="display: none"></label>
                        </div>
                        <div class="col-lg-6 pe-2">
                            <div class="mb-3">
                                <label for="department_id" class="form-label">Department</label>
                                <select class="form-select" name="department_id" id="department_id" required>
                                    <option value="" selected disabled>Select Department</option>
                                    @foreach ($departments as $department)
                                        <option value="{{ $department->id }}"
                                            {{ $department->id == $profile_details->department_id ? 'selected' : '' }}>
                                            {{ $department->department_name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6 pe-2">
                            <div class="mb-3">
                                <label for="designation" class="form-label">Designation</label>
                                <input type="text" class="form-control" id="designation" name="designation"
                                    value="{{ $profile_details->designation }}" />
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <label id="department_id-error" class="error" for="department_id"
                                style="display: none"></label>
                        </div>
                        <div class="col-lg-6">
                            <label id="designation-error" class="error" for="designation"
                                style="display: none"></label>
                        </div>
                        <div class="col-lg-6 pe-2">
                            <div class="mb-3">
                                <label for="mobile_no" class="form-label">Mobile No</label>
                                <input type="text" class="form-control" id="mobile_no" name="mobile_no"
                                    placeholder="9945XXXXXX" value="{{ $profile_details->mobile_no }}" />
                            </div>
                        </div>
                        <div class="col-lg-3 pe-2">
                            <div class="mb-3">
                                <label for="gender" class="form-label">Gender</label>
                                <select class="form-select" id="gender" name="gender"
                                    aria-label="Default select example">
                                    <option value="" selected disabled>Select gender</option>
                                    <option value="male" {{ $profile_details->gender == 'male' ? 'selected' : '' }}>Male
                                    </option>
                                    <option value="female" {{ $profile_details->gender == 'female' ? 'selected' : '' }}>
                                        Female</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-3 pe-2">
                            <div class="mb-3">
                                <label for="opd_number" class="form-label">OPD Number</label>
                                <input type="text" class="form-control" id="opd_number" name="opd_number"
                                    value="{{ $profile_details->opd_number }}" />
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <label id="mobile_no-error" class="error" for="mobile_no" style="display: none"></label>
                        </div>
                        <div class="col-lg-3">
                            <label id="gender-error" class="error" for="gender" style="display: none"></label>
                        </div>
                        <div class="col-lg-3">
                        </div>

                        @php
                            $morning_timing = explode('To', $profile_details->opd_timings_morning);
                            $eveining_timimg = explode('To', $profile_details->opd_timings_eveining);
                        @endphp

                        <div class="col-lg-6 pe-2">
                            <div class="mb-3">
                                <label for="opd_timing_morning" class="form-label">OPD Timing (Morning)</label>
                                <input type="checkbox" id="opd_morning_yes" name="opd_morning_yes"
                                    style="margin-left: 10px;"
                                    value="{{ $profile_details->opd_timings_morning == null ? '0' : '1' }}"
                                    @if ($profile_details->opd_timings_morning != null) checked @endif>
                            </div>
                            {{-- <label id="opd_morning_yes-error" class="error" for="opd_morning_yes"><label> --}}
                        </div>
                        <div class="col-lg-6 pe-2">
                            <div class="mb-3">
                                <label for="opd_timing_eveining" class="form-label">OPD Timing (Evening)</label>
                                <input type="checkbox" id="opd_evening_yes" name="opd_evening_yes"
                                    style="margin-left: 10px;"
                                    value="{{ $profile_details->opd_timings_eveining == null ? '0' : '1' }}"
                                    @if ($profile_details->opd_timings_eveining != null) checked @endif>
                            </div>
                            {{-- <label id="opd_evening_yes-error" class="error" for="opd_evening_yes"><label> --}}
                        </div>
                        <div class="col-lg-6">
                            <label id="opd_morning_yes-error" class="error" for="opd_morning_yes"
                                style="display: none"><label>
                        </div>
                        <div class="col-lg-6">
                            <label id="opd_evening_yes-error" class="error" for="opd_evening_yes"
                                style="display: none"><label>
                        </div>

                        <div class="row testing" style="display: contents;">
                            <div class="col-lg-3 pe-2 removable1">
                                <div class="mb-3">
                                    <input type="time" class="form-control" id="opd_morning_from_time"
                                        name="opd_morning_from_time"
                                        value="{{ $profile_details->opd_timings_morning != null ? trim($morning_timing[0]) : '' }}"
                                        min="06:00" max="13:30" />
                                </div>
                            </div>
                            <div class="col-lg-3 pe-2 removable1">
                                <div class="mb-3">
                                    <input type="time" class="form-control" id="opd_morning_to_time"
                                        name="opd_morning_to_time"
                                        value="{{ $profile_details->opd_timings_morning != null ? trim($morning_timing[1]) : '' }}"
                                        min="06:00" max="14:00" />
                                </div>
                            </div>
                        </div>
                        <div class="row testing2" style="display: contents;">
                            <div class="col-lg-3 pe-2 removable2">
                                <div class="mb-3">
                                    <input type="time" class="form-control" id="opd_evening_from_time"
                                        name="opd_evening_from_time"
                                        value="{{ $profile_details->opd_timings_eveining != null ? trim($eveining_timimg[0]) : '' }}"
                                        min="14:00" max="22:30" />
                                </div>
                            </div>
                            <div class="col-lg-3 pe-2 removable2">
                                <div class="mb-3">
                                    <input type="time" class="form-control" id="opd_evening_to_time"
                                        name="opd_evening_to_time"
                                        value="{{ $profile_details->opd_timings_eveining != null ? trim($eveining_timimg[1]) : '' }}"
                                        min="14:00" max="23:00" />
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <label id="opd_morning_from_time-error" class="error" for="opd_morning_from_time"
                                style="display: none"></label>
                        </div>
                        <div class="col-lg-3">
                            <label id="opd_morning_to_time-error" class="error" for="opd_morning_to_time"
                                style="display: none"></label>
                        </div>
                        <div class="col-lg-3">
                            <label id="opd_evening_from_time-error" class="error" for="opd_evening_from_time"
                                style="display: none"></label>
                        </div>
                        <div class="col-lg-3">
                            <label id="opd_evening_to_time-error" class="error" for="opd_evening_to_time"
                                style="display: none"></label>
                        </div>

                        <div class="col-lg-12 pe-2">
                            @php
                                if ($profile_details) {
                                    $image = str_replace('/public', '', url('/')) . '/storage/' . $profile_details->image_path . $profile_details->profile_photo;
                            } @endphp
                            <div class="mb-3">
                                <div class="crop-image-preview-container  show" id="edit_profile_image-container">
                                    <img id="crop-image" src="{{ $image }}" />
                                </div>
                                <input type="file" accept="image/*" class="form-control image" id="edit_upload_image"
                                    name="edit_upload_image" />
                                <input type="text" class="form-control" id="edit_upload_image_url"
                                    name="edit_upload_image_url" hidden>
                            </div>
                        </div>


                        <div class="col-lg-12 pe-2">
                            <div class="mb-3">
                                <label for="experience" class="form-label">Experience</label>
                                <textarea class="form-control" placeholder="Experience" id="experience" name="experience" style="height: 100px"> {!! $profile_details->experience !!} </textarea>
                                <label id="experience-error" class="error" for="experience"></label>
                            </div>

                        </div>
                        <div class="col-lg-12">
                            <div class="mb-3">
                                <label for="professional_highlight" class="form-label">Professional Highlights</label>
                                <textarea class="form-control" placeholder="Professional Highlights" id="professional_highlight"
                                    name="professional_highlight" style="height: 100px"> {!! $profile_details->professional_highlight !!} </textarea>
                                <label id="professional_highlights-error" class="error"
                                    for="professional_highlights"><label>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="mb-3">
                                <a class="btn btn-secondary modelbtn" type="button"
                                    href="{{ route('admin.doctor.index') }}">
                                    Close
                                </a>
                                <button class="btn btn-primary" type="submit" title=""> Update </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection


@section('script')
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.6.2/chosen.jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fecha/2.3.1/fecha.min.js"></script>
    <script src="{{ asset('admin_assets/custom/doctor_profile.js') }}"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $("#speciality_id").chosen();
            $('<li><i class="fa fa-angle-down" /></li>').css({
                position: "absolute",
                right: "10px",
                top: "5px"
            }).appendTo('ul.chosen-choices');

            if ($("#opd_morning_yes").val() == '0') {
                $('#opd_morning_from_time').prop("disabled", true);
                $('#opd_morning_to_time').prop("disabled", true);
            }

            if ($("#opd_evening_yes").val() == '0') {
                $('#opd_evening_from_time').prop("disabled", true);
                $('#opd_evening_to_time').prop("disabled", true);
            }

        });

        $(document).on('click', '#opd_morning_yes', function(event) {
            if ($("#opd_morning_yes").is(':checked')) {
                $('#opd_morning_yes').val('1');
                $('#opd_morning_from_time').prop("disabled", false);
                // $('#opd_morning_to_time').prop("disabled", false);
            } else {
                $('#opd_morning_yes').val('0');
                $(".removable1").remove();

                var newRowAdd =
                    '<div class="col-lg-3 pe-2 removable1">' +
                    '<div class="mb-3">' +
                    '<input type="time" class="form-control" id="opd_morning_from_time" name="opd_morning_from_time" value="" disabled />' +
                    '</div>' +
                    '</div>' +
                    '<div class="col-lg-3 pe-2 removable1">' +
                    '<div class="mb-3">' +
                    '<input type="time" class="form-control" id="opd_morning_to_time" name="opd_morning_to_time" value="" disabled />' +
                    '</div>' +
                    '</div>';
                $('.testing').append(newRowAdd);

                $('#opd_morning_from_time').prop("disabled", true);
                $('#opd_morning_to_time').prop("disabled", true);

            }
        });

        $(document).on('click', '#opd_evening_yes', function(event) {
            if ($("#opd_evening_yes").is(':checked')) {
                $('#opd_evening_yes').val('1');
                $('#opd_evening_from_time').prop("disabled", false);
                // $('#opd_evening_to_time').prop("disabled", false);
            } else {
                $('#opd_evening_yes').val('0');
                $(".removable2").remove();
                var newRowAdd1 =
                    '<div class="col-lg-3 pe-2 removable2">' +
                    '<div class="mb-3">' +
                    '<input type="time" class="form-control" id="opd_evening_from_time" name="opd_evening_from_time" value="" disabled />' +
                    '</div>' +
                    '</div>' +
                    '<div class="col-lg-3 pe-2 removable2">' +
                    '<div class="mb-3">' +
                    '<input type="time" class="form-control" id="opd_evening_to_time" name="opd_evening_to_time" value="" disabled />' +
                    '</div>' +
                    '</div>';
                $('.testing2').append(newRowAdd1);

                $('#opd_evening_from_time').prop("disabled", true);
                $('#opd_evening_to_time').prop("disabled", true);

            }
        });

        $(document).on('change', '#opd_morning_from_time', function(event) {
            var duration = 30;
            var d = fecha.parse($(this).val(), 'HH:mm');

            d.setMinutes(d.getMinutes() + duration);
            var min = fecha.format(d, 'HH:mm')

            if ($(this).val()) {
                $('#opd_morning_to_time').prop("disabled", false);
                $("#opd_morning_to_time").prop('min', min);
                // $("#opd_morning_to_time").attr({"min": $(this).val()});
            }
        });

        $(document).on('change', '#opd_evening_from_time', function(event) {
            var duration = 30;
            var d = fecha.parse($(this).val(), 'HH:mm');

            d.setMinutes(d.getMinutes() + duration);
            var min = fecha.format(d, 'HH:mm')

            if ($(this).val()) {
                $('#opd_evening_to_time').prop("disabled", false);
                $("#opd_evening_to_time").prop('min', min);
            }
        });
    </script>
@endsection
