@if($event->event_banner != '')
    @php
        $image = str_replace('/public', '', url('/')) . '/storage/' . $event->storage_path;
    @endphp
    <div>
        <img id="reg_img_banner" src="{{ $image.$event->event_banner }}" alt="" class="w-100">
    </div>
@endif

<form id="event_form_submit" class="event_form_submit" method="post" action="#">
     @csrf
    <input type="hidden" name="event_id" id="event_id" value="{{ $event->id }}">
    <div class="row mt-5" id="form_fields"></div>
    <div>
        {!! $event->description !!}
    </div>
    <div class="d-flex justify-content-center pt-lg-4">
        <button type="submit" class="btn btn-green_block w-25">Submit</button>
    </div>
</form>
