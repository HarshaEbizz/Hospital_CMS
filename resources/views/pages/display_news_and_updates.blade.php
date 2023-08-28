@if($news_list)
@foreach($news_list as $news)
    <div class="col-lg-6">
        <div class="accordion-item mb-4 news_accordion">
            <h2 class="accordion-header" id="headingOne">
                <button class="accordion-button collapsed" type="bu news_accro_btntton" data-bs-toggle="collapse" data-bs-target="#collapse{{ $news->id }}" aria-expanded="true" aria-controls="collapseOne">
                    {{ $news->title }}
                </button>
            </h2>
            <div id="collapse{{ $news->id }}" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    <div class="news_logo d-flex">
                        <div>
                            <svg width="25" height="25" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M19.0889 4.15234H5.08887C3.9843 4.15234 3.08887 5.04777 3.08887 6.15234V20.1523C3.08887 21.2569 3.9843 22.1523 5.08887 22.1523H19.0889C20.1934 22.1523 21.0889 21.2569 21.0889 20.1523V6.15234C21.0889 5.04777 20.1934 4.15234 19.0889 4.15234Z" stroke="#2DBF78" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M16.0889 2.15234V6.15234" stroke="#2DBF78" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M8.08887 2.15234V6.15234" stroke="#2DBF78" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M3.08887 10.1523H21.0889" stroke="#2DBF78" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </div>
                        <div class="ms-2">
                            <p>{{ \Carbon\Carbon::parse($news->posted_date)->format('jS \of F Y')}}</p>
                        </div>
                    </div>
                    <div>
                        @php
                            $image = str_replace("/public","",url('/')).'/storage/'.$news->image_path . $news->image_name;
                        @endphp
                        <img src="{{ $image }}" alt="" class="w-100">
                    </div>
                    <div>
                        <p>{{ $news->description }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endforeach
@endif
