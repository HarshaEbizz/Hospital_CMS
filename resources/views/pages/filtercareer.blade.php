{{-- @if ($opening && $opening->count() > 0)
    @if ($filter['job_opening_type'] == 'clinical' || $filter['job_opening_type'] == 'all')
        @php $clinical_data = false; @endphp
        @foreach ($opening as $opening_list)
            @if ($opening_list->recuirement_dept == 'clinical')
                @php $clinical_data = true; @endphp
            @endif
        @endforeach
        @if ($clinical_data == true)
            <div class="container" id="clinical_opening">
                <div class="row align-items-center">
                    <div class="col-lg-8">
                        <div class="pb-4 contact_us_details">
                            <h2 class="blue_sub_title">Clinical Department</h2>
                            <svg class="line" width="90" height="9" viewBox="0 0 90 9" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path d="M2.02431 7.09212C30.0244 6.09216 52.5242 0.592169 87.8787 2.46593"
                                    stroke="#02BB9A" stroke-width="3" stroke-linecap="round"></path>
                            </svg>
                        </div>
                    </div>
                </div>
                <div class="row mt-sm-0 mt-4">
                    @foreach ($opening as $opening_list)
                        @if ($opening_list->recuirement_dept == 'clinical')
                            <div class="col-lg-4 mb-4">
                                <div class="career1_card">
                                    <div class="card w-100 border-0 career1_card_bg">
                                        <div class="card-body p-0">
                                            <div class="px-4 pt-4 pb-4">
                                                <h2 class="blue_card_title">{{ $opening_list->department_name }}</h2>
                                                <p class="career1_text">{{ $opening_list->designation }}</p>
                                            </div>
                                            <div class="read-more_btn d-xxl-flex justify-content-between">
                                                <div class="career_opning">
                                                    <p>No of Vacancy : {{ $opening_list->opening }}</p>
                                                </div>
                                                <div class="text-end">
                                                    <a href="{{ route('career_form', $opening_list->slug) }}"
                                                        class="career_link">Read More <svg width="15" height="21"
                                                            viewBox="0 0 25 24" fill="none"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M8.2459 19.7589C7.94784 19.4667 7.92074 19.0095 8.16461 18.6873L8.2459 18.595L14.9734 12L8.2459 5.40503C7.94784 5.11283 7.92074 4.65558 8.16461 4.33338L8.2459 4.24106C8.54396 3.94887 9.01037 3.9223 9.33904 4.16137L9.43321 4.24106L16.7541 11.418C17.0522 11.7102 17.0793 12.1675 16.8354 12.4897L16.7541 12.582L9.43321 19.7589C9.10534 20.0804 8.57376 20.0804 8.2459 19.7589Z"
                                                                fill="black"></path>
                                                        </svg>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        @endif
    @endif
    @if ($filter['job_opening_type'] == 'non_clinical' || $filter['job_opening_type'] == 'all')
        @php $non_clinical_data = false; @endphp
        @foreach ($opening as $opening_list)
            @if ($opening_list->recuirement_dept == 'non_clinical')
                @php $non_clinical_data = true; @endphp
            @endif
        @endforeach
        @if ($non_clinical_data == true)
            <div class="container" id="non_clinical_opening">
                <div class="row align-items-center pt-5">
                    <div class="col-lg-8">
                        <div class="pb-4 contact_us_details">
                            <h2 class="blue_sub_title">Non-Clinical department</h2>
                            <svg class="line" width="90" height="9" viewBox="0 0 90 9" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path d="M2.02431 7.09212C30.0244 6.09216 52.5242 0.592169 87.8787 2.46593"
                                    stroke="#02BB9A" stroke-width="3" stroke-linecap="round"></path>
                            </svg>
                        </div>
                    </div>

                </div>

                <div class="row mt-sm-0 mt-4">
                    @foreach ($opening as $opening_list)
                        @if ($opening_list->recuirement_dept == 'non_clinical')
                            <div class="col-lg-4 mb-4">
                                <div class="career1_card">
                                    <div class="card w-100 border-0 career1_card_bg">
                                        <div class="card-body p-0">
                                            <div class="px-4 pt-4 pb-5">
                                                <h2 class="blue_card_title">{{ $opening_list->department_name }}</h2>
                                                <p class="career1_text">{{ $opening_list->designation }}</p>
                                            </div>
                                            <div class="read-more_btn d-xxl-flex justify-content-between">
                                                <div class="career_opning">
                                                    <p>No of Vacancy : {{ $opening_list->opening }}</p>
                                                </div>
                                                <div class="text-end">
                                                    <a href="{{ route('career_form', $opening_list->slug) }}"
                                                        class="career_link">Read More <svg width="15" height="21"
                                                            viewBox="0 0 25 24" fill="none"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M8.2459 19.7589C7.94784 19.4667 7.92074 19.0095 8.16461 18.6873L8.2459 18.595L14.9734 12L8.2459 5.40503C7.94784 5.11283 7.92074 4.65558 8.16461 4.33338L8.2459 4.24106C8.54396 3.94887 9.01037 3.9223 9.33904 4.16137L9.43321 4.24106L16.7541 11.418C17.0522 11.7102 17.0793 12.1675 16.8354 12.4897L16.7541 12.582L9.43321 19.7589C9.10534 20.0804 8.57376 20.0804 8.2459 19.7589Z"
                                                                fill="black"></path>
                                                        </svg>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        @endif
    @endif
@endif --}}

@if ($opening && $opening->count() > 0)
    @if ($filter['job_opening_type'] == 'clinical' || $filter['job_opening_type'] == 'all')
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-8">
                    <div class="pb-4 contact_us_details">
                        <h2 class="blue_sub_title">Clinical Department</h2>
                        <svg class="line" width="90" height="9" viewBox="0 0 90 9" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path d="M2.02431 7.09212C30.0244 6.09216 52.5242 0.592169 87.8787 2.46593" stroke="#02BB9A"
                                stroke-width="3" stroke-linecap="round"></path>
                        </svg>
                    </div>
                </div>
            </div>
            <div>
                <div class="tab-content py-md-5 py-3" id="myTabContent">
                    <div class="tab-pane fade show active" id="floor" role="tabpanel" aria-labelledby="floor-tab">
                        <div class="table-responsive opd_table">
                            <table class="table">
                                <thead>
                                    <tr class="floor_row">
                                        <th scope="col" class="px-3 py-4">S.No</th>
                                        <th scope="col" class="px-3 py-4">Opening type</th>
                                        <th scope="col" class="px-3 py-4">Department name</th>
                                        <th scope="col" class="px-3 py-4">Designation</th>
                                        <th scope="col" class="px-3 py-4">NO. of opening</th>
                                        <th scope="col" class="px-3 py-4">Apply</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $i=0; @endphp
                                    @foreach ($opening as $opening_list)
                                        @if ($opening_list->recuirement_dept == 'clinical')
                                            <tr>
                                                <th scope="row" class="px-3 py-4">{{ ++$i }}</th>
                                                <td class="px-3 py-4">
                                                    @if ($opening_list->recuirement_dept == 'non_clinical')
                                                        Non-Clinical
                                                    @else
                                                        Clinical
                                                    @endif
                                                </td>
                                                <td class="px-3 py-4">
                                                    <p>{{ $opening_list->department_name }}</p>
                                                </td>
                                                <td class="px-3 py-4">
                                                    <p>{{ $opening_list->designation }}</p>
                                                </td>
                                                <td class="px-3 py-4">
                                                    <p>{{ $opening_list->opening }}</p>
                                                </td>
                                                <td>
                                                    <div class="text-end">
                                                        <a href="{{ route('career_form', $opening_list->slug) }}"
                                                            class="btn btn-primary" class="career_link">Apply
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endif
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
    @if ($filter['job_opening_type'] == 'non_clinical' || $filter['job_opening_type'] == 'all')
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-8">
                    <div class="pb-4 contact_us_details">
                        <h2 class="blue_sub_title">Non clinical Department</h2>
                        <svg class="line" width="90" height="9" viewBox="0 0 90 9" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path d="M2.02431 7.09212C30.0244 6.09216 52.5242 0.592169 87.8787 2.46593" stroke="#02BB9A"
                                stroke-width="3" stroke-linecap="round"></path>
                        </svg>
                    </div>
                </div>
            </div>
            <div>
                <div class="tab-content py-md-5 py-3" id="myTabContent">
                    <div class="tab-pane fade show active" id="floor" role="tabpanel" aria-labelledby="floor-tab">
                        <div class="table-responsive opd_table">
                            <table class="table">
                                <thead>
                                    <tr class="floor_row">
                                        <th scope="col" class="px-3 py-4">S.No</th>
                                        <th scope="col" class="px-3 py-4">Opening type</th>
                                        <th scope="col" class="px-3 py-4">Department name</th>
                                        <th scope="col" class="px-3 py-4">Designation</th>
                                        <th scope="col" class="px-3 py-4">NO. of opening</th>
                                        <th scope="col" class="px-3 py-4">Apply</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $i=0; @endphp
                                    @foreach ($opening as $opening_list)
                                        @if ($opening_list->recuirement_dept == 'non_clinical')
                                            <tr>
                                                <th scope="row" class="px-3 py-4">{{ ++$i }}</th>
                                                <td class="px-3 py-4">
                                                    @if ($opening_list->recuirement_dept == 'non_clinical')
                                                        Non-Clinical
                                                    @else
                                                        Clinical
                                                    @endif
                                                </td>
                                                <td class="px-3 py-4">
                                                    <p>{{ $opening_list->department_name }}</p>
                                                </td>
                                                <td class="px-3 py-4">
                                                    <p>{{ $opening_list->designation }}</p>
                                                </td>
                                                <td class="px-3 py-4">
                                                    <p>{{ $opening_list->opening }}</p>
                                                </td>
                                                <td>
                                                    <div class="text-end">
                                                        <a href="{{ route('career_form', $opening_list->slug) }}"
                                                            class="btn btn-primary" class="career_link">Apply
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endif
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
@endif
