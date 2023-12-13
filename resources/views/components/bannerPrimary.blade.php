<div {{$attributes->merge(['class'=>'min-height-300 position-absolute w-100'])}} @if (isset($image))
    style="background-image: url({{$image}}); background-position-y: 50%;" @endif>
    @if (isset($image))
        <span class="mask bg-primary opacity-6"></span>
    @endif
</div>
