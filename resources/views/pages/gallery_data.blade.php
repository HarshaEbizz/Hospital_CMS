@php $i=0; @endphp
@foreach($galleries as $key=>$gallery)
@php $i++; @endphp
<div class="col-lg-4 mb-sm-5 mb-3 px-lg-3 @if($i==2) mt-lg-5 @endif">
    <div class="card tour_card gallary_hover custom_tour_card">
        <div class="card-body">
            <div class="tour_card_img">
                <a @if(count($gallery->Images) > 0) href="{{route('get_gallery_image',$gallery->slug)}}" @endif class="example-image">
                    @php $img = str_replace("/public", "", url('/')) . '/storage/' . $gallery->image_path . $gallery->main_image; @endphp
                    <img class="example-image" src="{{$img}}" alt="" class="w-100">
                </a>
            </div>
            <div class="pt-3">
                <h5 class="mb-0 tour_title">{{$gallery->name}}</h5>
                <p class="mb-0 tour_text">{{$gallery->date}}</p>
            </div>
        </div>

    </div>
</div>
@php if($i == 3){ $i=0; } @endphp
@endforeach