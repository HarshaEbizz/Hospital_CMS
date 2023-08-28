@if($filter=="write")
<div class="row">
    @php $is_message = false; @endphp
    @foreach($reviews as $key=>$review)
    @if($review->feedback_type=="write")
    @php $is_message = true; @endphp
    <div class="col-lg-6">
        <div class="element element-1" style="">
            <div class="each_testimo">
                @php
                if($review->image_name){
                $photo = str_replace("/public","",url('/')).'/storage/'.$review->image_path.$review->image_name;
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
                        <div class="rate" style="width: 100%; display:flex">
                            <input type="radio" id="star5_{{$key}}" name="rating_{{$key}}" value="5" @if($review->rating==5) checked @endif disabled/>
                            <label for="star5_{{$key}}" title="text">5 stars</label>
                            <input type="radio" id="star4_{{$key}}" name="rating_{{$key}}" value="4" @if($review->rating==4) checked @endif disabled/>
                            <label for="star4_{{$key}}" title="text">4 stars</label>
                            <input type="radio" id="star3_{{$key}}" name="rating_{{$key}}" value="3" @if($review->rating==3) checked @endif disabled/>
                            <label for="star3_{{$key}}" title="text">3 stars</label>
                            <input type="radio" id="star2_{{$key}}" name="rating_{{$key}}" value="2" @if($review->rating==2) checked @endif disabled/>
                            <label for="star2_{{$key}}" title="text">2 stars</label>
                            <input type="radio" id="star1_{{$key}}" name="rating_{{$key}}" value="1" @if($review->rating==1) checked @endif disabled/>
                            <label for="star1_{{$key}}" title="text">1 star</label>
                        </div>
                        <div>
                            <p class="addReadMore showlesscontent">{{$review->message}}</p>
                        </div>
                        <h5>{{$review->first_name}} {{$review->last_name}}</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif
    @endforeach
    @if($is_message==false)
    <div class="container">
        <div class="row align-items-center">
            No Review Found.
        </div>
    </div>
    @endif
</div>
@else
<div class="row py-lg-5 py-3" id="form_video_card">
    @php $is_video = false; @endphp
    @foreach($reviews as $key=>$review)
    @if($review->video_url!=null)
    @php $is_video = true; @endphp
    <div class="col-lg-3" style="margin-bottom: 20px;">
        <div class="card form_video_card" id="form_video_card_{{$review->id}}">
            <div class="card-body p-0 video_review">
                <img src="{{$review->thumb_image}}" alt="" class="w-100">
            </div>
            <button id="button" class="video_load" data-id="{{$review->id}}"><i class="fa fa-play" aria-hidden="true"></i></button>
        </div>
    </div>
    @endif
    @endforeach
    @if($is_video==false)
    <div class="container">
        <div class="row align-items-center">
            No Video Found.
        </div>
    </div>
    @endif
</div>
@endif