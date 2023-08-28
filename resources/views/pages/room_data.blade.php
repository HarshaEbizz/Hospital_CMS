@foreach($rooms AS $key=>$room)
<div class="col-lg-4 mb-5 rooms">
    <div class="card tour_card border-0">
        <div class="card-body">
            @php
            $image = str_replace("/public","",url('/')).'/storage/'.$room->image_path.$room->image_name;
            @endphp
            <div id="room_image_data">
                <a href="{{ $image }}" data-fancybox="gallery"  data-caption="{{$room->room_name}}" class="example-image">
                    <img class="example-image" src="{{ $image }}" alt="{{$room->room_name}}" />
                </a>
                <!-- <img src="{{ $image }}" alt="{{$room->room_name}}" class="w-100 " data-lightbox="example-set"> -->
            </div>
            <div class="pt-3">
                <h5 class="mb-0 tour_title">{{$room->room_name}}</h5>
                <p class="mb-0 tour_text">{{$room->description}}</p>
            </div>
        </div>
    </div>
</div>
@endforeach