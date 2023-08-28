@if($message_reviews && $message_reviews->count() > 0 && $video_reviews && $video_reviews->count() > 0)
<section class="testis padding_tb_100">
    <div class="container">
        <div class="title_max">
            <div class="title">
                <p class="red_title">Here Some Of</p>
                <h2 class="blue_sub_title">Patients Speak</h2>
                <svg class="line" width="90" height="9" viewBox="0 0 90 9" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M2.02431 7.09212C30.0244 6.09216 52.5242 0.592169 87.8787 2.46593" stroke="#02BB9A" stroke-width="3" stroke-linecap="round"></path>
                </svg>
                <p class="small_gray_text text-center">And Share Their Experiences
                </p>
            </div>
        </div>
        <div class="review_tabs">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="photo_tab" data-bs-toggle="tab" data-bs-target="#Photos_tabs" type="button" role="tab" aria-controls="Photos_tabs" aria-selected="true">Photos</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="videos_tab" data-bs-toggle="tab" data-bs-target="#videos_tabs" type="button" role="tab" aria-controls="videos_tabs" aria-selected="false">videos</button>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="Photos_tabs" role="tabpanel" aria-labelledby="photo_tab">
                    <div class="slick-slider_testis">
                        @php $is_message = false; @endphp
                        @foreach($message_reviews as $key=>$message_review)
                        @php $is_message = true; @endphp
                        <div class="element element-1">
                            <div class="each_testimo">
                                @php
                                if($message_review->image_name){
                                $photo = str_replace("/public","",url('/')).'/storage/'.$message_review->image_path.$message_review->image_name;
                                }else{
                                $photo = asset('assets/images/logo_avtar.png');
                                }
                                @endphp
                                <img src="{{ $photo }}" alt="" style="cursor: default;">
                                <div class="ms-lg-3 testi_content">
                                    <svg width="60" height="60" viewBox="0 0 60 60" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <rect width="60" height="60" rx="30" fill="#ED1C24" />
                                        <path d="M44.9938 25.5799C44.9938 25.5769 44.9941 25.5738 44.9941 25.5708C44.9941 21.8896 42.01 18.9055 38.3288 18.9055C34.6476 18.9055 31.6636 21.8896 31.6636 25.5708C31.6636 29.2521 34.648 32.2361 38.3289 32.2361C39.0854 32.2361 39.8096 32.1042 40.4872 31.8719C38.9876 40.4745 32.2792 46.0223 38.4978 41.4563C45.3935 36.3932 45.0015 25.7742 44.9938 25.5799Z" fill="white" />
                                        <path d="M23.6653 32.2361C24.4218 32.2361 25.146 32.1042 25.824 31.8718C24.324 40.4745 17.6156 46.0223 23.8343 41.4563C30.7299 36.3932 30.338 25.7742 30.3302 25.5799C30.3302 25.5769 30.3305 25.5738 30.3305 25.5708C30.3305 21.8896 27.3465 18.9055 23.6653 18.9055C19.9841 18.9055 17 21.8896 17 25.5708C17 29.2521 19.9844 32.2361 23.6653 32.2361Z" fill="white" />
                                    </svg>
                                    <div class="testi_content_text">
                                        <div class="rate " style="width: 100%; display:flex">
                                            <input type="radio" id="star5_{{$key}}" name="rating_{{$key}}" value="5" @if($message_review->rating==5) checked @endif disabled/>
                                            <label for="star5_{{$key}}" title="text">5 stars</label>
                                            <input type="radio" id="star4_{{$key}}" name="rating_{{$key}}" value="4" @if($message_review->rating==4) checked @endif disabled/>
                                            <label for="star4_{{$key}}" title="text">4 stars</label>
                                            <input type="radio" id="star3_{{$key}}" name="rating_{{$key}}" value="3" @if($message_review->rating==3) checked @endif disabled/>
                                            <label for="star3_{{$key}}" title="text">3 stars</label>
                                            <input type="radio" id="star2_{{$key}}" name="rating_{{$key}}" value="2" @if($message_review->rating==2) checked @endif disabled/>
                                            <label for="star2_{{$key}}" title="text">2 stars</label>
                                            <input type="radio" id="star1_{{$key}}" name="rating_{{$key}}" value="1" @if($message_review->rating==1) checked @endif disabled/>
                                            <label for="star1_{{$key}}" title="text">1 star</label>
                                        </div>
                                        <div>
                                            <p class="addReadMore showlesscontent"  >{{$message_review->message}}</p>
                                        </div>
                                        <h5>{{$message_review->first_name}} {{$message_review->last_name}}</h5>

                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        @if($is_message==false)
                        <div class="container">
                            <div class="row align-items-center">
                                No Message Review Found.
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
                <div class="tab-pane fade" id="videos_tabs" role="tabpanel" aria-labelledby="videos_tab">
                    <div class="row py-lg-5 py-3">
                        @php $is_video = false; @endphp
                        @foreach($video_reviews as $key=>$video_review)
                        @php $is_video = true; @endphp
                        <div class="col-lg-3" style="margin-bottom: 20px;">
                            <div class="card form_video_card" id="form_video_card_{{$video_review->id}}">
                                <div class="card-body p-0 video_review">
                                    <img src="{{$video_review->thumb_image}}" alt="" class="w-100">
                                </div>
                                <button id="button" class="video_load" data-id="{{$video_review->id}}"><i class="fa fa-play" aria-hidden="true"></i></button>
                            </div>
                        </div>
                        @endforeach
                        @if($is_video==false)
                        <div class="container">
                            <div class="row align-items-center">
                                No Video Found.
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endif